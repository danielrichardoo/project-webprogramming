<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                "name" => "Admin",
                "email" => "admin@gmail.com",
                "password" => bcrypt("password"),
                "roleID" => 1
            ],
            [
                "name" => "Member",
                "email" => "member@gmail.com",
                "password" => bcrypt("password"),
                "roleID" => 2
            ]
        ]);
    }
}