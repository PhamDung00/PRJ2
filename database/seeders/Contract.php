<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Contract extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();
        foreach (range(1, 10) as $index) {
            DB::table('contracts')->insert([
                'contract_number' => $faker->uuid(),
                'start_date' => $faker->date,
                'end_date' => $faker->date,
                'motel_id' => rand(1, 10), // Assuming a range of motels IDs
                'customer_id' => rand(1, 10), // Assuming a range of customers IDs
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
