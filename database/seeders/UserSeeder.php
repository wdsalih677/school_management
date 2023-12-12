<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->create([
            'name' => "Ahmed Mohammed",
            'email' => 'a7med677.dev@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}
