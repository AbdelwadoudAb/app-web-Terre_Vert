<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $adminRole = Role::where('name', 'Administrateur')->firstOrFail();
        $userRole = Role::where('name', 'Utilisateur')->firstOrFail();

        User::create([
            'name' => 'Administrateur',
            'email' => 'admin@terreverte.ma',
            'password' => Hash::make('Admin12345'),
            'role_id' => $adminRole->id,
        ]);

        User::create([
            'name' => 'Utilisateur',
            'email' => 'user@terreverte.ma',
            'password' => Hash::make('User12345'),
            'role_id' => $userRole->id,
        ]);
    }
}