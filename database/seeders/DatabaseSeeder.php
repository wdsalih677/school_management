<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        UserSeeder::class;
        
        $this->call(BloodSeeder::class);
        $this->call(NationalitieSeeder::class);
        $this->call(ReligionSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(SpecialtySeeder::class);
    }
}
