<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
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

        $role = new Role();
        $role->name = "user";
        $role->slug = "user";
        $role->save();

        $role = new Role();
        $role->name = "admin";
        $role->slug = "admin";
        $role->save();

        $role = new Role();
        $role->name = "dev";
        $role->slug = "dev";
        $role->save();

        $user = new User();
        $user->role_id = 3; // dev
        $user->name = "Jéssica";
        $user->username = "developer";
        $user->email = "developer@f1racing.host";
        $user->password = Hash::make("password");
        $user->save();

        $user = new User();
        $user->role_id = 2; // admin
        $user->name = "Jéssica";
        $user->username = "admin";
        $user->email = "admin@f1racing.host";
        $user->password = Hash::make("password");
        $user->save();

        $user = new User();
        $user->role_id = 1; // user
        $user->name = "John Doe";
        $user->username = "john.doe";
        $user->email = "john.doe@f1racing.host";
        $user->password = Hash::make("password");
        $user->save();
    }
}
