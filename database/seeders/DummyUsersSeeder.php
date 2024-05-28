<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name' => 'Fakkhira Alysa',
                'email' => 'fakhiraalysa03@gmail.com',
                'roleType' => 'Platinum',
                'password' =>bcrypt('12345678'),
            ],
            [
                'name' => 'Amira Sofea',
                'email' => 'sofeaamira51@gmail.com',
                'roleType' => 'Staff',
                'password' =>bcrypt('12345678')
            ],
            [
                'name' => 'Mohd Fikri',
                'email' => 'fikrishahril47@gmail.com',
                'roleType' => 'Mentor',
                'password' =>bcrypt('12345678')
            ],
         ];

         foreach($userData as $key => $val){
            User::create($val);
         }
         
    }
}
