<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminData = [
            'name' => 'kingdota1337',
            'first_name' => 'Andrei',
            'surname' => 'Kuznetsov', 
            'email' => 'kingdota1337@gmail.com',
            'password' => 'kingdota1337@gmail.com',
        ];
        
        $admin = User::firstOrCreate($adminData);

        $admin->assignRole('Admin');
    }
}
