<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            // Define your country data here
            // Example:
            [
                'name' => 'India',
                'code' => 'IN',
                'capital' => 'New Delhi',
                'continent' => 'Asia',
                'currency' => 'Indian Rupee',
                'phone_code' => '+91',
                'status' => 1,
                'timezone' => 'Asia/Kolkata',
                'region' => 'South Asia',
                'subregion' => 'Southern Asia',
                'independent' => true,
            ],

        ];
        // You can loop through $input and create countries if needed
        foreach ($input as $country) {
            Country::create($country);
        }

    }
}
