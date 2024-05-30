<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Admin account default
        DB::table('users')->insert
        ([
            'username' => 'admin',
            'password' => Hash::make('123456'),
            'name' => 'Administrator',
            'title' => 'Mr. ',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        $faker = Factory::create();
        for ($i = 0; $i < 4; $i++) {
            DB::table('users')->insert
            ([
                'username' => $faker->userName,
                'password' => Hash::make('123456'),
                'name' => $faker->name,
                'title' => $faker->title,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
