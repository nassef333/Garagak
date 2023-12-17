<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Price;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolesTableSeeder::class,
            UserSeeder::class,
            BrandSeeder::class,
            CarSeriesSeeder::class,
            ModelSeeder::class,
            CouponSeeder::class,
            GarageSeeder::class,
            PriceSeeder::class,
            SlotsSeeder::class,
        ]);
    }
}
