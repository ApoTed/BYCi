<?php

namespace App\Http\Controllers;

use App\Models\DataLayer;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create()
    {
        return view('admin.managerUser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'registration-email' => 'required|string|email|max:255',
            'registration-password' => 'required|string|min:8|confirmed', // 'confirmed' checks password against 'confirm-password'
        ]);
        $dl = new DataLayer();
        if ($dl->findUserByEmail($request->input('registration-email'))) {
            return redirect()->back()->withErrors(['registration-email' => 'L\'email esiste già nel database.'])->withInput();
        }
        $dl->addUser(
            $request->input('name'),
            $request->input('registration-password'),
            $request->input('registration-email')
        );
        
        return redirect()->route('user.list')->with('success', 'User created successfully!');
    }

    public function list()
    {
        $dl=new Datalayer();

        $users = $dl->getUsersExcludingAdmin(); // Paginate with 10 users per page
        return view('admin.deleteUser', compact('users'));
    }

    public function deleteUser($id)
    {
        $dl = new DataLayer();
        $user = User::find($id);
    
        if ($user) {
            // Delete all comments associated with the user
            $dl->deleteCommentsByUserId($id);
            
            // Delete the user
            $user->delete();
        }
    
        return redirect()->route('user.list')->with('success', 'User deleted successfully!');
    }
    public function editUser($id)
{
    $user = User::find($id);
    if (!$user) {
        return redirect()->route('user.list')->withErrors(['user' => 'User not found.']);
    }
    return view('admin.modifyUser', compact('user'));
}

public function updateUser(Request $request, $id)
{
    \Log::info('updateUser called with data: ', $request->all());

    try {
        \Log::info('Starting validation.');
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|confirmed',
        ]);
        \Log::info('Validation passed.');

        $dl = new DataLayer();
        \Log::info('DataLayer instantiated.');

        $dl->updateUser($id, $validatedData['name'], $request->input('password'));

        return redirect()->route('user.list')->with('success', 'User updated successfully!');
    } catch (\Illuminate\Validation\ValidationException $e) {
        \Log::error('Validation failed: ', $e->errors());
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        \Log::error('An unexpected error occurred: ' . $e->getMessage());
        return redirect()->back()->withErrors(['error' => 'An unexpected error occurred.'])->withInput();
    }
}
}

