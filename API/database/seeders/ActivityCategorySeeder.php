<?php

namespace Database\Seeders;

use App\Models\ActivityCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ActivityCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $input = [
            // Define your activity category data here
            // Example:
            [
                'name' => 'Academics',
                'code' => 'ACA',
                'description' => "Academics activities include all educational and learning-related tasks, such as attending classes, studying, completing assignments, and participating in academic discussions.",
                'parent_id' => NULL,
                'status' => 1,

            ],
            [
                'name' => 'Science',
                'code' => 'SCI',
                'description' => 'Science activities include all scientific and technological activities, such as conducting experiments, observing natural phenomena, and analyzing data.',
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Sports',
                'code' => 'SPO',
                'description' => 'Sports activities include all physical and athletic tasks, such as playing games, participating in competitions, and engaging in fitness routines.',
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Arts',
                'code' => 'ART',
                'description' => 'Arts activities include all creative and artistic tasks, such as painting, drawing, music, dance, and drama.',
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Community Service',
                'code' => 'COM',
                'description' => 'Community Service activities include all volunteer and service-oriented tasks, such as helping in local communities, participating in charity events, and engaging in social work.',
                'parent_id' => NULL,
                'status' => 1,
            ],
            [
                'name' => 'Others',
                'code' => 'OTH',
                'description' => 'Other activities that do not fall into the above categories, such as personal hobbies, leisure activities, and miscellaneous tasks.',
                'parent_id' => NULL,
                'status' => 1,
            ]
        ];
        // You can loop through $input and create countries if needed
        foreach ($input as $activityCategory) {
            ActivityCategory::create($activityCategory);
        }
    }
}
