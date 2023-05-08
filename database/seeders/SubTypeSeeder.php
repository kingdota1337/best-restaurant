<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\References\SubType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SubTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'juice',
            ],
            [
                'name' => 'lemonade', 
            ],
            [
                'name' => 'wine', 
            ]
        ];

        foreach ($data as $item) {
            SubType::firstOrCreate($item);
        }
    }
}
