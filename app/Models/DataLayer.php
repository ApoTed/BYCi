<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DataLayer
{
    /*public function listBooks($userID) {     
        $books = Book::where('user_id',$userID)->orderBy('title','asc')->get();   
        return $books;
    }

    public function findBookById($id) {
        return Book::find($id);
    }

    public function listAuthors($userID) {  
        $authors = Author::where('user_id',$userID)->orderBy('lastname','asc')
                ->orderBy('firstname','asc')->get();
        return $authors;
    }

    public function findAuthorById($id) {
        return Author::find($id);
    }

    public function getAllCategories() {
        return Category::orderBy('name','asc')->get();
    }

    public function addBook($title, $author_id, $categories, $userID) {
        $book = new Book;
        $book->title = $title;
        $book->author_id = $author_id;
        $book->user_id = $userID;
        $book->save();
        foreach($categories as $cat) {
            $book->categories()->attach($cat);
        }
    }

    public function addAuthor($first_name, $last_name, $userID) {
        $author = new Author;
        $author->firstname = $first_name;
        $author->lastname = $last_name;
        $author->user_id = $userID;
        $author->save();

        //use the factory to randomly generate an address
        Address::factory()->count(1)->create(['author_id' => $author->id]);
    }

    public function editBook($id, $title, $author_id, $categories) {
        $book = Book::find($id);
        $book->title = $title;
        $book->author_id = $author_id;
        $book->save();

        // Cancel the previous list of categories
        $prevCategories = $book->categories;
        foreach($prevCategories as $prevCat) {
            $book->categories()->detach($prevCat->id);
        }

        // Update the list of categories
        foreach($categories as $cat) {
            $book->categories()->attach($cat);
        }
    }

    public function editAuthor($id, $first_name, $last_name) {
        $author = Author::find($id);
        $author->firstname = $first_name;
        $author->lastname = $last_name;
        $author->save();
    }

    public function deleteBook($id) {
        $book = Book::find($id);
        $categories = $book->categories;
        foreach($categories as $cat) {
            $book->categories()->detach($cat->id);
        }
        $book->delete();
    }

    public function deleteAuthor($id) {
        $author = Author::find($id);
        $author->address->delete();
        $author->delete();
    }

    public function findAuthorByNames($first_name, $last_name) {
        $authors = DB::select('select * from author where (firstname = ? AND lastname = ?)',[$first_name, $last_name]);
        if (count($authors) == 0) {
            return false;
        } else {
            return true;
        }
    }

    public function findBookByTitle($title) {
        $books = Book::where('title', $title)->get();
        
        if (count($books) == 0) {
            return false;
        } else {
            return true;
        }
    }
*/
    public function validUser($email, $password) {
        $user = User::where('email', $email)->first();
        
        if($user && Hash::check($password, $user->password))
        {
            return true;
        } else {
            return false;
        }        
    }
    
    public function addUser($name, $password, $email) {
        $user = new User();
        $user->name = $name;
        $user->password = Hash::make($password);
        $user->email = $email;
        $user->role = "registered_user";
        $user->email_verified_at = now();
        $user->save();
    }

    public function getUserID($email) {
        $users = User::where('email',$email)->get(['id']);
        return $users[0]->id;
    }

    public function getUserName($email) {
        $users = User::where('email',$email)->get(['name']);
        return $users[0]->name;
    }

    public function getUserRole($email) {
        $users = User::where('email',$email)->get(['role']);
        return $users[0]->role;
    }

    public function findUserByemail($email) {
        $users = User::where('email', $email)->get();
        
        if (count($users) == 0) {
            return false;
        } else {
            return true;
        }
    }
}
