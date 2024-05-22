<?php

namespace Database\Seeders;

use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $staff = [
            [
                'id' => 4,
                'S_position' => 'Manager',
                'S_department' => 'Marketing',
            ],

        ];
        foreach($staff as $key => $val){
            Staff::create($val);
         }
    }
}
