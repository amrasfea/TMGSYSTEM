<?php

namespace Database\Seeders;

use App\Models\Staff;
use App\Models\User;
use Illuminate\Database\Seeder;

class StaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::whereIn('email', [
            'sofeaamira51@gmail.com',
        ])->get();

        $staff = [
            [
                'id' => $users->where('email', 'sofeaamira51@gmail.com')->first()->id,
                'S_position' => 'Manager',
                'S_department' => 'Marketing',
                'S_phone' => '01129406033',
                'S_address' => 'Pekan Pahang',
                'S_skills' => 'Collaborative Research Platforms',
                'S_workExperience' => 'Research Assistant, Project Coordinator'
            ],
        ];

        foreach ($staff as $data) {
            Staff::create($data);
        }
    }
}
