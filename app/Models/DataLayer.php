<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage; // Import the Storage facade

class DataLayer
{
    /*public function listEvents() {     
        $events = Evento::orderBy('titolo','asc')->get();   
        return $events;
    }*/
    public function listEvents() {     
        // Assuming 'created_at' is the column representing the event date
        $events = Evento::orderBy('created_at', 'desc')->get();   
        return $events;
    }
    public function updateUser($id, $name, $password = null)
    {
        \Log::info('DataLayer updateUser called with id: ' . $id . ', name: ' . $name . ', password: ' . ($password ? 'provided' : 'not provided'));
    
        $user = User::find($id);
        if ($user) {
            \Log::info('User found: ' . $user->id);
            $user->name = $name;
            if ($password) {
                $user->password = Hash::make($password);
            }
            $user->save();
            \Log::info('User updated: ' . $user->id);
        } else {
            \Log::error('User not found with id: ' . $id);
        }
    }

    

    public function findEvento($id){
        return Evento::find($id);
    }

    public function addEvento($titolo, $user_id, $contenuto, $immaginePath)
{
    $event = new Evento();
    $event->titolo = $titolo;
    $event->user_id = $user_id;
    $event->contenuto = $contenuto;

    if ($immaginePath) {
        $event->immagine = $immaginePath;
    }

    $event->save();
}

    public function editEvento($id, $titolo, $user_id, $contenuto, $immagine)
    {
        $event = Evento::find($id);
        $event->titolo = $titolo;
        $event->user_id = $user_id;
        $event->contenuto = $contenuto;
    
        if ($immagine) {
            if ($event->immagine) {
                Storage::disk('public')->delete($event->immagine);
            }
    
            $path = $immagine->store('event_images', 'public');
            $event->immagine = $path;
        }
    
        $event->save();
    }
    public function getUsersExcludingAdmin() {
        return User::where('role', '!=', 'admin')->get();
    }
    public function deleteEvento($id){
        $event = Evento::find($id);
        if ($event->immagine) {
            Storage::disk('public')->delete($event->immagine);
        }
        $commenti=Commento::where('evento_id',$id)->get();
        foreach($commenti as $commento){
            $commento->delete();
        }
        $event->delete();
    }

    public function validUser($email, $password) {
        $user = User::where('email', $email)->first();
        
        if ($user && Hash::check($password, $user->password)) {
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
    // New methods for handling comments

    public function addCommento($contenuto, $user_id, $evento_id)
    {
        $commento = new Commento();
        $commento->contenuto = $contenuto;
        $commento->user_id = $user_id;
        $commento->evento_id = $evento_id;
        $commento->save();
    }

    public function deleteCommento($id)
    {
        $commento = Commento::find($id);
        if ($commento) {
            $commento->delete();
        }
    }

    public function listCommentiByEvento($evento_id)
    {
        return Commento::where('evento_id', $evento_id)
                       ->orderBy('created_at', 'asc') // Orders comments from oldest to newest
                       ->get();
    }
    public function deleteCommentsByUserId($user_id)
{
    $comments = Commento::where('user_id', $user_id)->get();
    foreach ($comments as $comment) {
        $comment->delete();
    }
} 
}
