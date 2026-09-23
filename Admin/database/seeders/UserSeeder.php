<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // You can define your user data here
        // Example:
        $input = [
            [
                'name' => 'Admin',
                'email' => 'admin@apaarsambhavana.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Pallavi Dighe',
                'email' => 'pallavi.dighe@apaarsambhavana.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Tushar Dighe',
                'email' => 'tushar.dighe@apaarsambhavana.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Pankaj Chitre',
                'email' => 'pankaj.chitre@apaarsambhavana.com',
                'password' => Hash::make('123456789'),
            ],
            [
                'name' => 'Prachi Chitre',
                'email' => 'prachi.chitre@apaarsambhavana.com',
                'password' => Hash::make('123456789'),
            ],
        ];

        foreach ($input as $user) {
            User::create($user);
        }
    }
}
