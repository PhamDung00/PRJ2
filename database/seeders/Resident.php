<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Resident extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            DB::table('residents')->insert([
                'name' => $faker->name,
                'phone_number' => $faker->phoneNumber,
                'motel_id' => rand(1, 10), // Assuming user_id is 1
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
