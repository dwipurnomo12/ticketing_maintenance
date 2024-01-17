<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role'  => 'superadmin'
        ]);
        Role::create([
            'role'  => 'admin'
        ]);
        Role::create([
            'role'  => 'agen'
        ]);
        Role::create([
            'role'  => 'devops'
        ]);

        User::create([
            'name'      => 'superadmin',
            'email'     => 'superadmin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 1
        ]);
        User::create([
            'name'      => 'admin',
            'email'     => 'admin@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 2
        ]);
        User::create([
            'name'      => 'agen',
            'email'     => 'agen@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 3
        ]);
        User::create([
            'name'      => 'devops',
            'email'     => 'devops@gmail.com',
            'password'  => bcrypt('1234'),
            'role_id'   => 4
        ]);
    }
}
