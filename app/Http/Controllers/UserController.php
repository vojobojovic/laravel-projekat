<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Create new user (show form)
    public function create()
    {
        return view('users.create');
    }

    // Store new user
        public function store(Request $request)
    {
    // Validacija unosa
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8', // 'confirmed' znači da mora da postoji polje password_confirmation u formi
        'role_id' => 'required|integer',
    ]);

    // Kreiranje novog korisnika
    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password), // Šifrujemo lozinku
        'role_id' => $request->role_id,
    ]);

    // Preusmeravanje na dashboard ili stranicu sa porukom o uspešnom dodavanju korisnika
    return redirect()->route('dashboard')->with('success', 'User created successfully');
}


    // Edit user (show edit form)
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    // Update user
    public function update(Request $request, $id)
    {
        // Validacija unosa
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'role_id' => 'required|integer',
        ]);

        // Dohvati korisnika
        $user = User::findOrFail($id);

        // Ažuriraj korisnika
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('dashboard')->with('success', 'User updated successfully');
    }

    // Delete user
    public function destroy($id)
    {
        // Dohvati korisnika
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard')->with('success', 'User deleted successfully');
    }
}

