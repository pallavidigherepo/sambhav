<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            [
                'name' => 'Maharashtra',
                'code' => 'MH',
                'capital' => 'Mumbai',
                'country_id' => 1,
                'status' => 1,
            ],
            [
                'name' => 'Madhya Pradesh',
                'code' => 'MP',
                'capital' => 'Bhopal',
                'country_id' => 1,
                'status' => 1,
            ],
        ];
        // You can loop through $input and create states if needed
        foreach ($input as $state) {
            State::create($state);
        }
    }
}
