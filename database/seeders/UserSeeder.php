<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Role; // Uveri se da si uvezao Role model

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Kreiranje admin korisnika sa odgovarajućom rolom
        $adminRole = Role::where('name', 'admin')->first(); // Nalazi ulogu "admin"
        User::create([
            'name' => 'Admin',
            'email' => 'admin@pwa.rs',
            'password' => Hash::make('password'), // Uvek šifriraj lozinku
            'role_id' => $adminRole->id,
        ]);

        // Kreiranje editor korisnika sa odgovarajućom rolom
        $editorRole = Role::where('name', 'editor')->first(); // Nalazi ulogu "editor"
        User::create([
            'name' => 'Editor',
            'email' => 'editor@pwa.rs',
            'password' => Hash::make('password'),
            'role_id' => $editorRole->id,
        ]);

        // Kreiranje običnog korisnika sa odgovarajućom rolom
        $userRole = Role::where('name', 'user')->first(); // Nalazi ulogu "user"
        User::create([
            'name' => 'User',
            'email' => 'user@pwa.rs',
            'password' => Hash::make('password'),
            'role_id' => $userRole->id,
        ]);
    }
}
