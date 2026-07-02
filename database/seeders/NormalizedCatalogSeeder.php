<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\MainCategory;
use App\Models\Subcategory;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NormalizedCatalogSeeder extends Seeder
{
    public function run(): void
    {
        // Suppress foreign key constraints safely during database initialization execution runs
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate(); 
        Subcategory::truncate(); 
        MainCategory::truncate(); 
        Department::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Dynamically imports your complete catalog data matrix out of configuration cache memory
        $menuData = config('catalog.menu_data', []);

        // STATIC DYNAMIC IMAGE URL REPOSITORY DICTIONARY 
        $featuredLookup = [
            // Popular Components Array Map Group
            'Armatures'      => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Armatures-700x700.jpg',
            'Components'     => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Components.jpg',
            'Housings'       => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Housings-700x700.jpg',
            'Rectifiers'     => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Rectifiers-700x700.jpg',
            'Regulators'     => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Regulators-700x700.jpg',
            'Rotors'         => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Rotors-700x700.jpg',
            'Solenoids'      => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Solenoids-700x700.jpg',
            'Stators'        => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Stators-700x700.jpg',

            // Popular Accessories Array Map Group
            'Beacons'        => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Beacons-700x700.jpg',
            'Fuses'          => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Fuses-700x700.jpg',
            'Lights'         => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Lights-700x700.jpg',
            'Paint'          => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Paint-700x700.jpg',
            'Relays'         => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Relays-700x700.jpg',
            'Shop Supplies'  => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Shop-Supplies-700x700.jpg',
            'Switches'       => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Switches-700x700.jpg',
            'Terminals'      => 'https://www.jnelectric.com/web-assets/jn_electric/images/home/Terminals-700x700.jpg',
        ];

        $deptOrder = 0;
        foreach ($menuData as $deptName => $groups) {
            $department = Department::create([
                'name' => $deptName,
                'slug' => Str::slug($deptName),
                'sort_order' => $deptOrder++
            ]);

            $isAssociativeTree = (bool) count(array_filter(array_keys($groups), 'is_string'));

            if ($isAssociativeTree) {
                $catOrder = 0;
                foreach ($groups as $mainCardName => $subItems) {
                    $mainCat = $department->mainCategories()->create([
                        'name' => $mainCardName,
                        'slug' => Str::slug($mainCardName),
                        'sort_order' => $catOrder++
                    ]);
                    
                    foreach ($subItems as $subOrder => $subName) {
                        
                        // FIXED: Uses smart keyword matching to map plurals/phrases dynamically
                        $hasFeaturedFlag = false;
                        $featuredImageUrl = null;
                        
                        foreach ($featuredLookup as $keyWord => $url) {
                            if (Str::contains(strtolower($subName), strtolower($keyWord))) {
                                $hasFeaturedFlag = true;
                                $featuredImageUrl = $url;
                                break;
                            }
                        }

                        $subCat = $mainCat->subcategories()->create([
                            'name' => $subName, 
                            'slug' => Str::slug($subName),
                            'is_featured' => $hasFeaturedFlag,
                            'featured_image_url' => $featuredImageUrl,
                            'sort_order' => $subOrder
                        ]);

                        Product::create([
                            'subcategory_id' => $subCat->id,
                            'part_number' => 'JN-' . $subCat->id . '-' . rand(1000, 9999),
                            'type_description' => $subName . ' - Premium Rebuild Unit',
                            'specifications' => 'Industrial Grade Fitment Requirements Meta Track Data.',
                            'warehouse_status' => 'In Stock',
                            'stock_qty' => rand(5, 50),
                            'price' => rand(45, 650) + 0.95
                        ]);
                    }
                }
            } else {
                foreach ($groups as $colIndex => $columnItems) {
                    if (is_array($columnItems)) {
                        $cardLabelName = match($deptName) {
                            'Alternators' => match($colIndex) {
                                0 => 'Alternator Assemblies',
                                1 => 'Premium OE Brands (A-D)',
                                2 => 'High Output Brands (D-J)',
                                3 => 'Global Logistics Labels (L-M)',
                                4 => 'Industrial Specialist Labels (S-W)',
                                default => 'Group ' . ($colIndex + 1)
                            },
                            'Accessories' => match($colIndex) {
                                0 => 'Alarms & Alert Elements',
                                1 => 'Fuel & Delivery Core',
                                2 => 'Lighting & Shop Stock',
                                3 => 'Switches & Toolboards',
                                4 => 'Circuitry & High Wear Items',
                                default => 'Group ' . ($colIndex + 1)
                            },
                            default => "Group " . ($colIndex + 1)
                        };

                        $mainCat = $department->mainCategories()->create([
                            'name' => $cardLabelName,
                            'slug' => Str::slug($cardLabelName),
                            'sort_order' => $colIndex
                        ]);

                        foreach ($columnItems as $subOrder => $subName) {
                            
                            // FIXED: Uses smart keyword matching to map plurals/phrases dynamically
                            $hasFeaturedFlag = false;
                            $featuredImageUrl = null;
                            
                            foreach ($featuredLookup as $keyWord => $url) {
                                if (Str::contains(strtolower($subName), strtolower($keyWord))) {
                                    $hasFeaturedFlag = true;
                                    $featuredImageUrl = $url;
                                    break;
                                }
                            }

                            $subCat = $mainCat->subcategories()->create([
                                'name' => $subName, 
                                'slug' => Str::slug($subName),
                                'is_featured' => $hasFeaturedFlag,
                                'featured_image_url' => $featuredImageUrl,
                                'sort_order' => $subOrder
                            ]);
                            
                            Product::create([
                                'subcategory_id' => $subCat->id,
                                'part_number' => 'JN-' . $subCat->id . '-' . rand(1000, 9999),
                                'type_description' => $subName . ' - Heavy Duty Component',
                                'specifications' => '12-24 Volt System Match Operations Requirements Profile Setup.',
                                'warehouse_status' => 'In Stock',
                                'stock_qty' => rand(2, 25),
                                'price' => rand(120, 890) + 0.50
                            ]);
                        }
                    }
                }
            }
        }
    }
}
