<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Submit extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Factory::create();

        foreach (range(1, 10) as $index) {
            DB::table('pending_list')->insert
            ([
                'motel_id' => rand(1, 10),
                'customer_id' => rand(1, 10),
                'contract_id' => null,
                'status' => $faker->randomElement(['pending', 'finished', 'cancelled']),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
