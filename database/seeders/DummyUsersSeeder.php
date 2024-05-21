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
                'name' => 'Umairah Shuhada',
                'email' => 'umairah2@gmail.com',
                'roleType' => 'Platinum',
                'password' =>bcrypt('12345678')
            ],
            [
                'name' => 'Amar Ilham',
                'email' => 'amar31@gmail.com',
                'roleType' => 'Staff',
                'password' =>bcrypt('12345678')
            ],
            [
                'name' => 'Alia Nadhirah',
                'email' => 'alianadhirah@gmail.com',
                'roleType' => 'Mentor',
                'password' =>bcrypt('12345678')
            ],
         ];

         foreach($userData as $key => $val){
            User::create($val);
         }
         
    }
}
