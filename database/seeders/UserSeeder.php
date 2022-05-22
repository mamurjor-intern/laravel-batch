<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name'=>'Admin','slug'=>'admin']);
        Role::create(['name'=>'User','slug'=>'user']);

        User::create([
            'role_id'=>1,
            'name'=>'Admin',
            'username'=>'admin@23',
            'email'=>'a@gmail.com',
            'password'=>Hash::make(12345678),
        ]);

        User::create([
            'role_id'=>2,
            'name'=>'User',
            'username'=>'user@23',
            'email'=>'u@gmail.com',
            'password'=>Hash::make(12345678),
        ]);
    }
}
