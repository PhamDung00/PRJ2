<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(User::class);
//        $this->call(Customer::class);
//        $this->call(Resident::class);
        $this->call(Motel::class);
//        $this->call(Submit::class);
//        $this->call(Contract::class);
//        $this->call(Transaction::class);
    }
}
