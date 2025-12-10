<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'competition' => [
                // 1. SCIENCE & TECHNOLOGY DOMAIN
                'science_and_technology' => [
                    'title' => 'Science & Technology Olympiads',
                    'slug' => 'science-technology-olympiads',
                    'icon' => 'fa-flask',
                    'children' => [
                        'sof' => [
                            'title' => 'Science Olympiad Foundation (SOF)',
                            'slug' => 'sof',
                            'children' => [
                                ['title' => 'NSO (National Science Olympiad)', 'slug' => 'nso-science'],
                                ['title' => 'ICS (International Computer Science)', 'slug' => 'ics-comp-science'],
                            ],
                        ],
                        'iapt_hbcse' => [
                            'title' => 'HBCSE & IAPT (National Standard Exams)',
                            'slug' => 'hbcse-iapt',
                            'children' => [
                                ['title' => 'NSEP / INPhO (Physics)', 'slug' => 'nsep-inpho-physics', 'icon' => 'fa-atom'],
                                ['title' => 'NSEC / INChO (Chemistry)', 'slug' => 'nsec-incho-chemistry', 'icon' => 'fa-atom'],
                                ['title' => 'NSEB / INBO (Biology)', 'slug' => 'nseb-inbo-biology', 'icon' => 'fa-atom'],
                                ['title' => 'NSEJS (Junior Science)', 'slug' => 'nsejs-jr-science', 'icon' => 'fa-atom'],
                                ['title' => 'NSEA (Astronomy)', 'slug' => 'nsea-astronomy', 'icon' => 'fa-satellite-dish'],
                                ['title' => 'NCEWP (Essay Writing in Physics)', 'slug' => 'ncewp-essay-physics'],
                            ],
                        ],
                        'silverzone' => [
                            'title' => 'SilverZone Olympiads',
                            'slug' => 'silverzone-olympiads',
                            'children' => [
                                ['title' => 'iOS (Science)', 'slug' => 'ios-science'],
                                ['title' => 'iiO (Informatics)', 'slug' => 'iio-informatics', 'icon' => 'fa-laptop-code'],
                                ['title' => 'STEM (Science, Tech, Eng, Math)', 'slug' => 'stem-olympiad', 'icon' => 'fa-atom'],
                            ],
                        ],
                        'unified_council' => [
                            'title' => 'Unified Council',
                            'slug' => 'unified-council',
                            'children' => [
                                ['title' => 'NSTSE (Science Talent Search Exam)', 'slug' => 'nstse-science'],
                                ['title' => 'UCO (Unified Cyber Olympiad)', 'slug' => 'uco-cyber', 'icon' => 'fa-laptop-code'],
                            ],
                        ],
                        'space_tech' => [
                            'title' => 'Astronomy & Space Technology',
                            'slug' => 'space-tech',
                            'icon' => 'fa-satellite-dish',
                            'children' => [
                                ['title' => 'IOAA (Intl. Astronomy and Astrophysics)', 'slug' => 'ioaa'],
                                ['title' => 'IAO (International Astronomy Olympiad)', 'slug' => 'iao'],
                                ['title' => 'International Space Olympiad (ISO)', 'slug' => 'iso-space'],
                                ['title' => 'Indian Space Science Olympiad (ISSO)', 'slug' => 'isso-space'],
                            ],
                        ],
                        'innovations' => [
                            'title' => 'Innovation & Research',
                            'slug' => 'innovation-research',
                            'icon' => 'fa-lightbulb',
                            'children' => [
                                ['title' => 'Vidyarthi Vigyan Manthan (VVM)', 'slug' => 'vvm'],
                                ['title' => 'INSPIRE-MANAK (Ideas/Innovations)', 'slug' => 'inspire-manak'],
                                ['title' => 'KVPY (Kishore Vaigyanik Protsahan Yojana)', 'slug' => 'kvpy'],
                                ['title' => 'NSD2024 (IDEATHON competition)', 'slug' => 'nsd-ideathon'],
                            ],
                        ],
                    ],
                ],

                // 2. MATHEMATICS DOMAIN
                'mathematics' => [
                    'title' => 'Mathematics & Aptitude',
                    'slug' => 'mathematics-aptitude',
                    'icon' => 'fa-calculator',
                    'children' => [
                        'maths_olympiads' => [
                            'title' => 'Major Math Olympiads',
                            'slug' => 'math-major',
                            'children' => [
                                ['title' => 'IMO (International Mathematical Olympiad)', 'slug' => 'imo-math'],
                                ['title' => 'UIMO (Unified Intl. Maths Olympiad)', 'slug' => 'uimo-math'],
                                ['title' => 'MAESTROMATH OLYMPIAD (MMO)', 'slug' => 'mmo-math'],
                            ],
                        ],
                        'hbcse_advanced' => [
                            'title' => 'HBCSE & Advanced Maths',
                            'slug' => 'hbcse-math',
                            'children' => [
                                ['title' => 'IOQM (Indian Olympiad Qualifier in Maths)', 'slug' => 'ioqm-math'],
                            ],
                        ],
                        'amti' => [
                            'title' => 'AMTI Talent Contest',
                            'slug' => 'amti-contest',
                            'children' => [
                                ['title' => 'Gauss, Kaprekar, Bhaskara, Ramanujan, Aryabhata Contests', 'slug' => 'amti-contests'],
                            ],
                        ],
                        'other_maths' => [
                            'title' => 'Other Maths & Financial Competitions',
                            'slug' => 'math-other',
                            'children' => [
                                ['title' => 'iOM (SilverZone Maths)', 'slug' => 'iom-math'],
                                ['title' => 'Ganit Sambodh Pariksha (MCQ)', 'slug' => 'ganit-sambodh'],
                                ['title' => 'Numeromagic (Crossword)', 'slug' => 'numeromagic-crossword'],
                                ['title' => 'iRAO (Reasoning & Aptitude)', 'slug' => 'irao-reasoning', 'icon' => 'fa-puzzle-piece'],
                                ['title' => 'FIN-EDU QUEST (Financial Literacy)', 'slug' => 'finedu-quest', 'icon' => 'fa-chart-line'],
                            ],
                        ],
                    ],
                ],

                // 3. LANGUAGE ARTS DOMAIN
                'language_arts' => [
                    'title' => 'Language & Communication',
                    'slug' => 'language-communication',
                    'icon' => 'fa-book-open',
                    'children' => [
                        'english_olympiads' => [
                            'title' => 'English Olympiads & Spelling',
                            'slug' => 'english-olympiads',
                            'icon' => 'fa-language',
                            'children' => [
                                ['title' => 'IEO (SOF English Olympiad)', 'slug' => 'ieo-english'],
                                ['title' => 'UIEO (Unified Intl. English Olympiad)', 'slug' => 'uieo-english'],
                                ['title' => 'iOEL (SilverZone English Olympiad)', 'slug' => 'ioel-english'],
                                ['title' => 'ISB Spelling Bee International', 'slug' => 'isb-intl'],
                                ['title' => 'India Spelling Bee', 'slug' => 'isb-india'],
                                ['title' => 'Spell Bee (English/Hindi/Bangla)', 'slug' => 'spell-bee'],
                            ],
                        ],
                        'other_languages' => [
                            'title' => 'Hindi & General Knowledge',
                            'slug' => 'hindi-gk',
                            'children' => [
                                ['title' => 'IHO (SOF Hindi Olympiad)', 'slug' => 'iho-hindi'],
                                ['title' => 'ABHA (SilverZone Hindi)', 'slug' => 'abha-hindi'],
                                ['title' => 'IGKO (SOF General Knowledge)', 'slug' => 'igko-gk'],
                                ['title' => 'SKGK (SilverZone General Knowledge)', 'slug' => 'skgk-gk'],
                            ],
                        ],
                        'literary_speech' => [
                            'title' => 'Literary & Communication Competitions',
                            'slug' => 'literary-speech',
                            'icon' => 'fa-microphone-alt',
                            'children' => [
                                ['title' => 'THE NEXT VOICE (Spoken Word/Poetry/Storytelling)', 'slug' => 'ht-next-voice'],
                                ['title' => 'Read N Grow competition (Literary)', 'slug' => 'read-n-grow'],
                                ['title' => 'Dinanath Dasture Memorial (Storytelling)', 'slug' => 'dasture-story'],
                                ['title' => 'Mein Vivekanand bol Raha hu (Speech)', 'slug' => 'vivekanand-speech'],
                            ],
                        ],
                    ],
                ],

                // 4. SOCIAL STUDIES & COMMERCE DOMAIN
                'social_and_commerce' => [
                    'title' => 'Social Studies & Commerce',
                    'slug' => 'social-commerce',
                    'icon' => 'fa-globe-americas',
                    'children' => [
                        'social_studies' => [
                            'title' => 'Social Studies, History & Civics',
                            'slug' => 'social-studies',
                            'icon' => 'fa-university',
                            'children' => [
                                ['title' => 'ISSO (SOF Social Studies)', 'slug' => 'isso-social'],
                                ['title' => 'iSSO (SilverZone Social Studies)', 'slug' => 'isso-social-sz'],
                                ['title' => 'National Social Studies Olympiad (ITO)', 'slug' => 'nsso-ito'],
                            ],
                        ],
                        'commerce' => [
                            'title' => 'Commerce & Financial Literacy',
                            'slug' => 'commerce-finance',
                            'icon' => 'fa-chart-line',
                            'children' => [
                                ['title' => 'ICO (SOF Commerce Olympiad)', 'slug' => 'ico-commerce'],
                                ['title' => 'ISCO (SilverZone Commerce Olympiad)', 'slug' => 'isco-commerce-sz'],
                            ],
                        ],
                    ],
                ],

                // 5. ACTIVITIES & SPORTS DOMAIN
                'activities_and_sports' => [
                    'title' => 'Co-Curricular Activities & Sports',
                    'slug' => 'activities-sports',
                    'icon' => 'fa-running',
                    'children' => [
                        'debate_quiz' => [
                            'title' => 'Debate & Theme Competitions',
                            'slug' => 'debate-quiz',
                            'icon' => 'fa-question-circle',
                            'children' => [
                                ['title' => 'Bhavan\'s Munshi Memorial Inter-School Debate', 'slug' => 'bhavans-debate'],
                                ['title' => 'Inter-School Quiz Competition (Theme-based)', 'slug' => 'inter-school-quiz'],
                            ],
                        ],
                        'sports_yoga' => [
                            'title' => 'Sports & Physical Activities',
                            'slug' => 'sports-yoga',
                            'icon' => 'fa-basketball-ball',
                            'children' => [
                                ['title' => 'Sportathon (Basketball, Football, Table Tennis)', 'slug' => 'sportathon-sports'],
                                ['title' => 'Yogasan competition', 'slug' => 'yogasan-comp'],
                            ],
                        ],
                    ],
                ],

            ],
            'activity' => [
                // 5. ACTIVITIES & SPORTS DOMAIN
                'activities_and_sports' => [
                    'title' => 'Co-Curricular Activities & Sports',
                    'slug' => 'activities-sports',
                    'icon' => 'fa-running',
                    'children' => [
                        'debate_quiz' => [
                            'title' => 'Debate & Theme Competitions',
                            'slug' => 'debate-quiz',
                            'icon' => 'fa-question-circle',
                            'children' => [
                                ['title' => 'Bhavan\'s Munshi Memorial Inter-School Debate', 'slug' => 'bhavans-debate'],
                                ['title' => 'Inter-School Quiz Competition (Theme-based)', 'slug' => 'inter-school-quiz'],
                            ],
                        ],
                        'sports_yoga' => [
                            'title' => 'Sports & Physical Activities',
                            'slug' => 'sports-yoga',
                            'icon' => 'fa-basketball-ball',
                            'children' => [
                                ['title' => 'Sportathon (Basketball, Football, Table Tennis)', 'slug' => 'sportathon-sports'],
                                ['title' => 'Yogasan competition', 'slug' => 'yogasan-comp'],
                            ],
                        ],
                    ],
                ],
            ],
            
        ];
        foreach ($categories as $menuName => $menuItems) {
            foreach ($menuItems as $items) {
                $this->createCategory($items, null, $menuName);
            }
        }
    }

        /**
     * Recursively creates category records.
     *
     * @param array $data The category data array.
     * @param int|null $parentId The ID of the parent category.
     */
    protected function createCategory(array $data, $parentId = null, $type = null): void
    {
        $category = Category::create([
            'name' => $data['title'],
            'slug' => Str::of($data['title'])->slug('-'),
            'description' => $data['description'] ?? null,
            'parent_id' => $parentId,
            'type' => $type,
            'code' => Str::acronym($data['title']),
            'icon' => $data['icon'] ?? null,
        ]);

        // Check if there are nested children
        if (isset($data['children']) && is_array($data['children'])) {
            foreach ($data['children'] as $childKey => $childData) {
                // If $childData is a simple array (from the final level, like competition names)
                // use it directly, otherwise it's a key-value array (like the organizer level)
                $childData = Arr::isAssoc($childData) ? $childData : $childData; 
                
                // Recursive call for children
                $this->createCategory($childData, $category->id, $type);
            }
        }
    }
}
