<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Products\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'juice apple',
                'type_id' => 1,
                'sub_type_id' => 1,
                'sugar' => 10.4,
                'calories' => 100,
                'color' => '#FFFFFF',
                'multiplicity' => 5,
                'gasification' => 0.2

            ],
            [
                'name' => 'coco cola',
                'type_id' => 1,
                'sub_type_id' => 1,
                'sugar' => 40.4,
                'calories' => 40,
                'color' => '#FFFFFF',
                'multiplicity' => 2,
                'gasification' => 9.2

            ],
        ];

        foreach($data as $item)
        {
            Product::create($item);
        }
        
    }
}
