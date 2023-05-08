<?php

namespace Database\Seeders;

use App\Models\References\Type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'drinks'
            ],
            [
                'name' => 'foods'
            ]
        ];

        foreach ($data as $item) {
            Type::create($item);
        }   
    }
}
