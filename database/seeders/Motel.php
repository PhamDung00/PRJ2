<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Motel extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 20) as $index) {
            DB::table('motels')->insert
            ([
                'room_number' => $faker->unique()->numberBetween(100, 999),
                'room_site' => $faker->word,
                'room_type' => $faker->randomElement(['standard', 'luxury', 'superior']),
                'price' => $faker->numberBetween(100000, 10000000),
                'image_url' => "https://picsum.photos/400/300?random=" . $index,
                'details' => $faker->paragraph,
                'description' => $faker->text,
                'user_id' => rand(1, 5), // Assuming you want the same user_id for all rooms
                'status' => $faker->randomElement(['available']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
