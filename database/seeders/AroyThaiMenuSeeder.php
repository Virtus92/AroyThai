<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AroyThaiMenuSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Clear existing demo data
        $this->clearDemoData();
        
        // Seed the menu data
        $this->seedCategories();
        $this->seedOptions();
        $this->seedMenuItems();
        
        $this->command->info('Aroy Thai menu seeded successfully!');
    }

    private function clearDemoData(): void
    {
        $this->command->info('Clearing demo data...');
        
        // Clear in correct order to avoid foreign key constraints
        DB::table('menu_item_option_values')->truncate();
        DB::table('menu_item_options')->truncate();
        DB::table('menu_categories')->truncate();
        DB::table('menus')->truncate();
        DB::table('menu_option_values')->truncate();
        DB::table('menu_options')->truncate();
        DB::table('categories')->truncate();
        
        $this->command->info('Demo data cleared.');
    }

    private function seedCategories(): void
    {
        $this->command->info('Seeding categories...');
        
        $categories = [
            [
                'category_id' => 1,
                'name' => 'Snacks',
                'description' => 'Appetizers and small plates',
                'priority' => 1,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 2,
                'name' => 'Suppen',
                'description' => 'Traditional Thai soups',
                'priority' => 2,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 3,
                'name' => 'Salate',
                'description' => 'Fresh salads with Thai flavors',
                'priority' => 3,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 4,
                'name' => 'Wok',
                'description' => 'Wok-fried dishes',
                'priority' => 4,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 5,
                'name' => 'Currys',
                'description' => 'Traditional Thai curries',
                'priority' => 5,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 6,
                'name' => 'Noodles',
                'description' => 'Noodle dishes and soups',
                'priority' => 6,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('categories')->insert($categories);
    }

    private function seedOptions(): void
    {
        $this->command->info('Seeding menu options...');
        
        // Create main protein option
        DB::table('menu_options')->insert([
            'option_id' => 1,
            'option_name' => 'Protein Choice',
            'display_type' => 'radio',
            'priority' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create portion size option
        DB::table('menu_options')->insert([
            'option_id' => 2,
            'option_name' => 'Portion Size',
            'display_type' => 'radio',
            'priority' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Protein option values
        $proteinValues = [
            [
                'option_value_id' => 1,
                'option_id' => 1,
                'name' => 'Vegetarisch (Tofu)',
                'price' => 0.0000,
                'priority' => 1,
            ],
            [
                'option_value_id' => 2,
                'option_id' => 1,
                'name' => 'Mit Huhn',
                'price' => 1.0000,
                'priority' => 2,
            ],
            [
                'option_value_id' => 3,
                'option_id' => 1,
                'name' => 'Mit Rind',
                'price' => 1.2000,
                'priority' => 3,
            ],
            [
                'option_value_id' => 4,
                'option_id' => 1,
                'name' => 'Mit Garnelen',
                'price' => 1.5000,
                'priority' => 4,
            ],
            [
                'option_value_id' => 5,
                'option_id' => 1,
                'name' => 'Mit Lachs',
                'price' => 2.0000,
                'priority' => 5,
            ],
        ];

        // Portion size values
        $portionValues = [
            [
                'option_value_id' => 6,
                'option_id' => 2,
                'name' => 'Regular Portion',
                'price' => 0.0000,
                'priority' => 1,
            ],
            [
                'option_value_id' => 7,
                'option_id' => 2,
                'name' => 'Kleine Portion',
                'price' => -3.5000,
                'priority' => 2,
            ],
        ];

        DB::table('menu_option_values')->insert(array_merge($proteinValues, $portionValues));
    }

    private function seedMenuItems(): void
    {
        $this->command->info('Seeding menu items...');
        
        $menuItems = [
            // SNACKS/SUPPEN CATEGORY
            [
                'menu_id' => 1,
                'menu_name' => 'TOM YAM',
                'menu_description' => 'Scharf-säuerliche Suppe aufgekocht in Kokosmilch mit Pilzen, Tomaten, Zitronengras und Limette (A,K,F,I)',
                'menu_price' => 5.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 1,
                'categories' => [1, 2],
                'has_options' => true
            ],
            [
                'menu_id' => 2,
                'menu_name' => 'TOM KRA',
                'menu_description' => 'Kokosmilchsuppe mit Galgant, Tomaten, Pilzen, Limettenblättern, Zitronengras und Limette (K,F,I)',
                'menu_price' => 5.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 2,
                'categories' => [1, 2],
                'has_options' => true
            ],
            [
                'menu_id' => 3,
                'menu_name' => 'SATAY',
                'menu_description' => 'Hühnerspieß nach Art des Hauses mit Erdnuss-Curry Soße + Reis (E,H,F)',
                'menu_price' => 2.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 3,
                'categories' => [1],
                'has_options' => false
            ],
            [
                'menu_id' => 4,
                'menu_name' => 'TUNG TOONG',
                'menu_description' => 'Hausgemachte frittierte Teigtaschen gefüllt mit Hühnerfleisch und Sweet-Chilli Dip (A,F,I)',
                'menu_price' => 5.0000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 4,
                'categories' => [1],
                'has_options' => false
            ],
            [
                'menu_id' => 5,
                'menu_name' => 'SUMMERROLLS VEGAN',
                'menu_description' => 'Frische Reispapierfrühlingsrollen gefüllt mit Reisnudeln, Salat, Gurken, Karotten, Röstzwiebeln und Erdnuss-Curry Dip (A,E,H)',
                'menu_price' => 5.0000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 5,
                'categories' => [1],
                'has_options' => false
            ],
            [
                'menu_id' => 6,
                'menu_name' => 'SUMMERROLLS MIT GARNELEN',
                'menu_description' => 'Frische Reispapierfrühlingsrollen mit Garnelen gefüllt mit Reisnudeln, Salat, Gurken, Karotten, Röstzwiebeln und Erdnuss-Curry Dip (A,E,H)',
                'menu_price' => 6.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 6,
                'categories' => [1],
                'has_options' => false
            ],
            [
                'menu_id' => 7,
                'menu_name' => 'TOOD MAN',
                'menu_description' => 'Frittierte Fischlaibchen mariniert in roter Currypaste, Langbohnen und Limettenblättern mit Sweet-Chilli Dip + Reis (A,B,C,F,I)',
                'menu_price' => 8.0000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 7,
                'categories' => [1],
                'has_options' => true
            ],

            // SALATE CATEGORY
            [
                'menu_id' => 8,
                'menu_name' => 'YAM KHAO TOOD',
                'menu_description' => 'Knusprig frittierter Curryreisball auf buntem Salat mit Thai Kräutern, Tomaten, Zwiebeln, Gurken, Erdnüssen und Röstzwiebeln in Chilli-Limetten Dressing (A,C,E,F,H,I)',
                'menu_price' => 6.0000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 1,
                'categories' => [3],
                'has_options' => true
            ],
            [
                'menu_id' => 9,
                'menu_name' => 'YAM WUNSEN',
                'menu_description' => 'Scharf-säuerlicher Glasnudelsalat mit Tomaten, Salat, Röstzwiebeln, Gurken, Zwiebeln, geröstete Reiskörner und Cashewnüssen in Limetten-Chilli Dressing (A,E,F,H,K,I)',
                'menu_price' => 6.0000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 2,
                'categories' => [3],
                'has_options' => true
            ],
            [
                'menu_id' => 10,
                'menu_name' => 'LAAB',
                'menu_description' => 'In Thai Kräutern marinierter Tofu oder Hühnerfleisch mit Limettensaft, Fischsoße, geröstete Reiskörner, Tomaten, Zwiebeln, Gurke und Salat (B,D,F,I)',
                'menu_price' => 7.0000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 3,
                'categories' => [3],
                'has_options' => true
            ],
            [
                'menu_id' => 11,
                'menu_name' => 'AVOCADO-SOJA',
                'menu_description' => 'Salat mit Avocado, Sojasprossen und Karotten mariniert in Sesamöl, Reisessig und Knoblauch (K,F,I)',
                'menu_price' => 5.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 4,
                'categories' => [3],
                'has_options' => false
            ],

            // WOK CATEGORY
            [
                'menu_id' => 12,
                'menu_name' => 'PAD MED MAMUANG',
                'menu_description' => 'Wok mit süßer Chillipaste, Champingons, Spitzpaprika, Jungzwiebeln und Cashewnüssen + Reis (A,E,F,H,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 1,
                'categories' => [4],
                'has_options' => true
            ],
            [
                'menu_id' => 13,
                'menu_name' => 'PAD KRAPAU',
                'menu_description' => 'Wok mit Thai Basilikum, Spitzpaprika und Langbohnen in Chilli-Knoblauch Soße + Reis (F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 2,
                'categories' => [4],
                'has_options' => true
            ],
            [
                'menu_id' => 14,
                'menu_name' => 'PAD TAKAI',
                'menu_description' => 'Wok mit Zitronengras, Broccoli, Auberginen, Karotten, Basilikumblätter und Zwiebeln + Reis (A,F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 3,
                'categories' => [4],
                'has_options' => true
            ],
            [
                'menu_id' => 15,
                'menu_name' => 'PAD KRING',
                'menu_description' => 'Wok mit Ingwer, Champingons, Karotten, Fisolen und Limettenblätter + Reis (A,F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 4,
                'categories' => [4],
                'has_options' => true
            ],
            [
                'menu_id' => 16,
                'menu_name' => 'PAD PAK',
                'menu_description' => 'Wokgemüse der Saison angebraten in Knoblauch-Soja Soße + Reis (F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 5,
                'categories' => [4],
                'has_options' => true
            ],
            [
                'menu_id' => 17,
                'menu_name' => 'PAD PRIEW WAN',
                'menu_description' => 'Wok mit Spitzpaprika, Gurken, Ananas, Tomaten und Zwiebeln in süß-saurer Soße + Reis (F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 6,
                'categories' => [4],
                'has_options' => true
            ],

            // CURRYS CATEGORY
            [
                'menu_id' => 18,
                'menu_name' => 'MASSAMAN CURRY',
                'menu_description' => 'Massaman Currymischung aufgekocht in Kokosmilch mit Kartoffeln, Paprika, Zwiebeln, Erdnusspaste und Limettenblättern + Reis (A,E,F,H,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 1,
                'categories' => [5],
                'has_options' => true
            ],
            [
                'menu_id' => 19,
                'menu_name' => 'KIEW WAN',
                'menu_description' => 'Grüne Currymischung aufgekocht in Kokosmilch mit Zucchini, Bambusstreifen, Auberginen, Broccoli und Karfiol + Reis (A,F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 2,
                'categories' => [5],
                'has_options' => true
            ],
            [
                'menu_id' => 20,
                'menu_name' => 'GAENG PED',
                'menu_description' => 'Rote Currymischung aufgekocht in Kokosmilch mit Spitzpaprika, Bambusstreifen, Auberginen und Thai Basilikumblättern + Reis (A,F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 3,
                'categories' => [5],
                'has_options' => true
            ],
            [
                'menu_id' => 21,
                'menu_name' => 'GAENG LÜANG',
                'menu_description' => 'Gelbe Currymischung aufgekocht in Kokosmilch mit Kürbis, Zucchini und Basilikumblättern + Reis (A,F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 4,
                'categories' => [5],
                'has_options' => true
            ],
            [
                'menu_id' => 22,
                'menu_name' => 'PANANG',
                'menu_description' => 'Panang Currymischung aufgekocht in Kokoscreme mit Spitzpaprika, Limettenblättern und Erdnüssen + Reis (A,E,H,F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 5,
                'categories' => [5],
                'has_options' => true
            ],

            // NOODLES CATEGORY
            [
                'menu_id' => 23,
                'menu_name' => 'PAD THAI',
                'menu_description' => 'In Ei gebratene breite Reisbandnudeln mit Karotten, Sojasprossen, Erdnüssen, Röstzwiebeln, Jungzwiebeln und Limette in süßer Tamarindensoße (A,C,E,F,H,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 1,
                'categories' => [6],
                'has_options' => true
            ],
            [
                'menu_id' => 24,
                'menu_name' => 'PAD WAI WAI',
                'menu_description' => 'In Ei gebratene dünne Reisnudeln mit Karotten, Pak Choi, Sojasprossen, Jungzwiebeln, Erdnüssen und Röstzwiebeln in Knoblauch-Soja-Soße (A,C,E,F,H,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 2,
                'categories' => [6],
                'has_options' => true
            ],
            [
                'menu_id' => 25,
                'menu_name' => 'KANOMJIN TUA',
                'menu_description' => 'Gekochte Reisnudeln mit frischen Sojasprossen, Sauerkraut, Jungzwiebeln, Gurken, Erdnüssen und Röstzwiebeln in Erdnuss-Kokos-Soße (A,E,F,H,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 3,
                'categories' => [6],
                'has_options' => true
            ],
            [
                'menu_id' => 26,
                'menu_name' => 'GUAY TEOW',
                'menu_description' => 'Scharf-sauerliche Reisnudelsuppe mit Chinakohl, Sojasprossen, Jungzwiebeln, frittierte Teigblätter, Erdnüssen und Röstzwiebel in Tom Yum Soße (A,F,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 4,
                'categories' => [6],
                'has_options' => true
            ],
            [
                'menu_id' => 27,
                'menu_name' => 'MIE SATAY',
                'menu_description' => 'Gebratene Weizennudeln mit Karotten, Jungzwiebeln, Paprika, Sojasprossen, Chinakohl, Erdnüssen und Röstzwiebeln in Erdnuss-Kokos-Soße (A,C,E,F,H,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 5,
                'categories' => [6],
                'has_options' => true
            ],
            [
                'menu_id' => 28,
                'menu_name' => 'PAD KEE MAO',
                'menu_description' => 'In Sojasoße gebratene Reisnudeln mit Broccoli, Karotten, Jungzwiebeln, Spitzpaprika, Röstzwiebeln und Basilikumblättern (A,F,H,I)',
                'menu_price' => 8.5000,
                'minimum_qty' => 1,
                'menu_status' => 1,
                'menu_priority' => 6,
                'categories' => [6],
                'has_options' => true
            ],
        ];

        // Insert menu items and relationships
        foreach ($menuItems as $item) {
            $categories = $item['categories'];
            $hasOptions = $item['has_options'];
            unset($item['categories'], $item['has_options']);
            
            $item['created_at'] = now();
            $item['updated_at'] = now();
            
            DB::table('menus')->insert($item);

            // Link to categories using pivot table
            foreach ($categories as $categoryId) {
                DB::table('menu_categories')->insert([
                    'menu_id' => $item['menu_id'],
                    'category_id' => $categoryId
                ]);
            }

            // Add options for items that support protein choices
            if ($hasOptions) {
                // Link protein option to this menu item
                DB::table('menu_item_options')->insert([
                    'option_id' => 1, // Protein choice
                    'menu_id' => $item['menu_id'],
                    'is_required' => 1,
                    'priority' => 1,
                    'min_selected' => 1,
                    'max_selected' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $menuOptionId = DB::getPdo()->lastInsertId();

                // Link portion size option to this menu item  
                DB::table('menu_item_options')->insert([
                    'option_id' => 2, // Portion size
                    'menu_id' => $item['menu_id'],
                    'is_required' => 0,
                    'priority' => 2,
                    'min_selected' => 0,
                    'max_selected' => 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $portionMenuOptionId = DB::getPdo()->lastInsertId();

                // Link all protein option values to this menu item
                for ($i = 1; $i <= 5; $i++) {
                    DB::table('menu_item_option_values')->insert([
                        'menu_option_id' => $menuOptionId,
                        'option_value_id' => $i,
                        'override_price' => null,
                        'priority' => $i,
                        'is_default' => $i === 1 ? 1 : 0, // Tofu is default
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                // Link portion size values
                for ($i = 6; $i <= 7; $i++) {
                    DB::table('menu_item_option_values')->insert([
                        'menu_option_id' => $portionMenuOptionId,
                        'option_value_id' => $i,
                        'override_price' => null,
                        'priority' => $i - 5,
                        'is_default' => $i === 6 ? 1 : 0, // Regular is default
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}