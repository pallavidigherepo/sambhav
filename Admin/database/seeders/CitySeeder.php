<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            // Define your city data here
            // Example:
            [
                'name' => 'Nagpur',
                'code' => 'NGP',
                'country_id' => 1,
                'state_id' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Indore',
                'code' => 'IND',
                'country_id' => 1,
                'state_id' => 2,
                'status' => 1,
            ],
        ];
        // You can loop through $input and create cities if needed
        foreach ($input as $city) {
            City::create($city);
        }
    }
}
