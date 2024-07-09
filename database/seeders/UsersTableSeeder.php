<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'Jéssica',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'isAdmin' => true,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Ana',
                'email' => 'ana@example.com',
                'password' => Hash::make('password'),
                'isAdmin' => false,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
