<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dynamicMenuStructure = [
            // 1. SCIENCE & TECHNOLOGY DOMAIN
            'science_and_technology' => [
                'title' => 'Science & Technology Olympiads',
                'children' => [
                    'sof' => [
                        'title' => 'Science Olympiad Foundation (SOF)',
                        'description' => '/organizer/sof',
                        'children' => [
                            ['title' => 'NSO (National Science Olympiad)', 'description' => '/exam/sof/nso'],
                            ['title' => 'ICS (International Computer Science)', 'description' => '/exam/sof/ics'],
                        ],
                    ],
                    'iapt_hbcse' => [
                        'title' => 'HBCSE & IAPT (National Standard Exams)',
                        'description' => '/organizer/iapt-hbcse',
                        'children' => [
                            ['title' => 'NSEP / INPhO (Physics)', 'description' => '/exam/iapt/nsep'],
                            ['title' => 'NSEC / INChO (Chemistry)', 'description' => '/exam/iapt/nsec'],
                            ['title' => 'NSEB / INBO (Biology)', 'description' => '/exam/iapt/nseb'],
                            ['title' => 'NSEJS (Junior Science)', 'description' => '/exam/iapt/nsejs'],
                            ['title' => 'NSEA (Astronomy)', 'description' => '/exam/iapt/nsea'],
                            ['title' => 'NCEWP (Essay Writing in Physics)', 'description' => '/exam/iapt/ncewp'],
                        ],
                    ],
                    'silverzone' => [
                        'title' => 'SilverZone Olympiads',
                        'description' => '/organizer/silverzone',
                        'children' => [
                            ['title' => 'iOS (Science)', 'description' => '/exam/sz/ios'],
                            ['title' => 'iiO (Informatics)', 'description' => '/exam/sz/iio'],
                            ['title' => 'STEM (Science, Tech, Eng, Math)', 'description' => '/exam/sz/stem'],
                        ],
                    ],
                    'unified_council' => [
                        'title' => 'Unified Council',
                        'description' => '/organizer/unified-council',
                        'children' => [
                            ['title' => 'NSTSE (Science Talent Search Exam)', 'description' => '/exam/uc/nstse'],
                            ['title' => 'UCO (Unified Cyber Olympiad)', 'description' => '/exam/uc/uco'],
                        ],
                    ],
                    'space_tech' => [
                        'title' => 'Astronomy & Space Technology',
                        'description' => '/domain/space-tech',
                        'children' => [
                            ['title' => 'IOAA (Intl. Astronomy and Astrophysics)', 'description' => '/exam/ioaa'],
                            ['title' => 'IAO (International Astronomy Olympiad)', 'description' => '/exam/iao'],
                            ['title' => 'International Space Olympiad (ISO)', 'description' => '/exam/iso'],
                            ['title' => 'Indian Space Science Olympiad (ISSO)', 'description' => '/exam/isso'],
                        ],
                    ],
                    'innovations' => [
                        'title' => 'Innovation & Research',
                        'description' => '/domain/innovation',
                        'children' => [
                            ['title' => 'Vidyarthi Vigyan Manthan (VVM)', 'description' => '/exam/vvm'],
                            ['title' => 'INSPIRE-MANAK (Ideas/Innovations)', 'description' => '/scheme/inspire'],
                            ['title' => 'KVPY (Kishore Vaigyanik Protsahan Yojana)', 'description' => '/scheme/kvpy'],
                            ['title' => 'NSD2024 (IDEATHON competition)', 'description' => '/comp/nsd-ideathon'],
                        ],
                    ],
                ],
            ],

            // 2. MATHEMATICS DOMAIN
            'mathematics' => [
                'title' => 'Mathematics & Aptitude',
                'description' => '/competitions/mathematics',
                'children' => [
                    'maths_olympiads' => [
                        'title' => 'Major Math Olympiads',
                        'description' => '/organizer/math-major',
                        'children' => [
                            ['title' => 'IMO (International Mathematical Olympiad)', 'description' => '/exam/sof/imo'],
                            ['title' => 'UIMO (Unified Intl. Maths Olympiad)', 'description' => '/exam/uc/uimo'],
                            ['title' => 'MAESTROMATH OLYMPIAD (MMO)', 'description' => '/exam/mm/mmo'],
                        ],
                    ],
                    'hbcse_advanced' => [
                        'title' => 'HBCSE & Advanced Maths',
                        'description' => '/organizer/hbcse-math',
                        'children' => [
                            ['title' => 'IOQM (Indian Olympiad Qualifier in Maths)', 'description' => '/exam/hbcse/ioqm'],
                        ],
                    ],
                    'amti' => [
                        'title' => 'AMTI Talent Contest',
                        'description' => '/organizer/amti',
                        'children' => [
                            ['title' => 'Gauss, Kaprekar, Bhaskara, Ramanujan, Aryabhata Contests', 'description' => '/exam/amti/contests'],
                        ],
                    ],
                    'other_maths' => [
                        'title' => 'Other Maths Competitions',
                        'description' => '/domain/math-other',
                        'children' => [
                            ['title' => 'iOM (SilverZone Maths)', 'description' => '/exam/sz/iom'],
                            ['title' => 'Ganit Sambodh Pariksha (MCQ)', 'description' => '/exam/ganit-sambodh'],
                            ['title' => 'Numeromagic (Crossword)', 'description' => '/comp/numeromagic'],
                            ['title' => 'iRAO (Reasoning & Aptitude)', 'description' => '/exam/sz/irao'],
                            ['title' => 'FIN-EDU QUEST (Financial Literacy)', 'description' => '/exam/flq'],
                        ],
                    ],
                ],
            ],

            // 3. LANGUAGE ARTS DOMAIN
            'language_arts' => [
                'title' => 'Language & Communication',
                'description' => '/competitions/language-arts',
                'children' => [
                    'english_olympiads' => [
                        'title' => 'English Olympiads & Spelling',
                        'description' => '/domain/english',
                        'children' => [
                            ['title' => 'IEO (SOF English Olympiad)', 'description' => '/exam/sof/ieo'],
                            ['title' => 'UIEO (Unified Intl. English Olympiad)', 'description' => '/exam/uc/uieo'],
                            ['title' => 'iOEL (SilverZone English Olympiad)', 'description' => '/exam/sz/ioel'],
                            ['title' => 'ISB Spelling Bee International', 'description' => '/exam/isb-intl'],
                            ['title' => 'India Spelling Bee', 'description' => '/exam/isb-india'],
                            ['title' => 'Spell Bee (English/Hindi/Bangla)', 'description' => '/exam/spell-bee'],
                        ],
                    ],
                    'other_languages' => [
                        'title' => 'Hindi & Other Languages',
                        'description' => '/domain/languages',
                        'children' => [
                            ['title' => 'IHO (SOF Hindi Olympiad)', 'description' => '/exam/sof/iho'],
                            ['title' => 'ABHA (SilverZone Hindi)', 'description' => '/exam/sz/abha'],
                        ],
                    ],
                    'literary_speech' => [
                        'title' => 'Literary & Communication Competitions',
                        'description' => '/domain/literary',
                        'children' => [
                            ['title' => 'THE NEXT VOICE (Spoken Word/Poetry/Storytelling)', 'description' => '/comp/ht-next-voice'],
                            ['title' => 'Read N Grow competition (Literary)', 'description' => '/comp/read-n-grow'],
                            ['title' => 'Dinanath Dasture Memorial (Storytelling)', 'description' => '/comp/dasture-story'],
                            ['title' => 'Mein Vivekanand bol Raha hu (Speech)', 'description' => '/comp/vivekanand-speech'],
                        ],
                    ],
                ],
            ],

            // 4. SOCIAL STUDIES & COMMERCE DOMAIN
            'social_and_commerce' => [
                'title' => 'Social Studies & Commerce',
                'description' => '/competitions/social-commerce',
                'children' => [
                    'social_studies' => [
                        'title' => 'Social Studies & General Knowledge',
                        'description' => '/domain/social-studies',
                        'children' => [
                            ['title' => 'ISSO (SOF Social Studies)', 'description' => '/exam/sof/isso'],
                            ['title' => 'iSSO (SilverZone Social Studies)', 'description' => '/exam/sz/isso'],
                            ['title' => 'National Social Studies Olympiad (ITO)', 'description' => '/exam/ito/nsso'],
                            ['title' => 'IGKO (SOF General Knowledge)', 'description' => '/exam/sof/igko'],
                            ['title' => 'SKGK (SilverZone General Knowledge)', 'description' => '/exam/sz/skgk'],
                        ],
                    ],
                    'commerce' => [
                        'title' => 'Commerce',
                        'description' => '/domain/commerce',
                        'children' => [
                            ['title' => 'ICO (SOF Commerce Olympiad)', 'description' => '/exam/sof/ico'],
                            ['title' => 'ISCO (SilverZone Commerce Olympiad)', 'description' => '/exam/sz/isco'],
                        ],
                    ],
                ],
            ],

            // 5. ACTIVITIES & SPORTS DOMAIN
            'activities_and_sports' => [
                'title' => 'Co-Curricular Activities & Sports',
                'description' => '/activities',
                'children' => [
                    'debate_quiz' => [
                        'title' => 'Debate & Quiz',
                        'description' => '/activities/debate-quiz',
                        'children' => [
                            ['title' => 'Bhavan\'s Munshi Memorial Inter-School Debate', 'description' => '/activity/bhavans-debate'],
                            ['title' => 'Inter-School Quiz Competition (Theme-based)', 'description' => '/activity/inter-school-quiz'],
                        ],
                    ],
                    'sports_yoga' => [
                        'title' => 'Sports & Physical Activities',
                        'description' => '/activities/sports',
                        'children' => [
                            ['title' => 'Sportathon (Basketball, Football, Table Tennis)', 'description' => '/activity/sportathon'],
                            ['title' => 'Yogasan competition', 'description' => '/activity/yogasan'],
                        ],
                    ],
                ],
            ],
        ];
        foreach ($dynamicMenuStructure as $menuName => $menuItems) {
            $this->createCategory($menuItems);
        }
    }

    /**
     * Recursively creates category records.
     *
     * @param array $data The category data array.
     * @param int|null $parentId The ID of the parent category.
     */
    protected function createCategory(array $data, int $parentId = null): void
    {
        $category = Menu::create([
            'title' => $data['title'],
            'slug' => Str::of($data['title'])->slug('-'),
            'parent_id' => $parentId,
            'type' => 'activity',
        ]);

        $category = Menu::create([
            'title' => $data['title'],
            'slug' => Str::of($data['title'])->slug('-'),
            'parent_id' => $parentId,
            'type' => 'competition',
        ]);
        // Check if there are nested children
        if (isset($data['children']) && is_array($data['children'])) {
            foreach ($data['children'] as $childKey => $childData) {
                // If $childData is a simple array (from the final level, like competition names)
                // use it directly, otherwise it's a key-value array (like the organizer level)
                $childData = Arr::isAssoc($childData) ? $childData : $childData; 
                
                // Recursive call for children
                $this->createCategory($childData, $category->id);
            }
        }
    }
}
