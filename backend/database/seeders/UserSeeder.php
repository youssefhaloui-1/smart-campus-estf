<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'prenom' => 'ESTF',
                'email' => 'admin@estf.ac.ma',
                'password' => Hash::make('password123'),
                'role' => 'ADMINISTRATEUR',
            ],
            [
                'name' => 'Bennis',
                'prenom' => 'Lamyae',
                'email' => 'l.bennis@estf.ac.ma',
                'password' => Hash::make('password123'),
                'role' => 'ENSEIGNANT',
            ],
            [
                'name' => 'Club',
                'prenom' => 'Informatique',
                'email' => 'club.info@estf.ac.ma',
                'password' => Hash::make('password123'),
                'role' => 'RESPONSABLE_CLUB',
            ],
            [
                'name' => 'Haloui',
                'prenom' => 'Youssef',
                'email' => 'y.haloui@estf.ac.ma',
                'password' => Hash::make('password123'),
                'role' => 'ETUDIANT',
            ],
        ];

        foreach ($users as $user) {
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}