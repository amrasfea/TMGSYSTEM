<?php

namespace Database\Seeders;

use App\Models\Mentor;
use App\Models\User;
use Illuminate\Database\Seeder;

class MentorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assuming the mentor user is 'Alia Nadhirah' created in DummyUsersSeeder
        $user = User::where('email', 'alianadhirah@gmail.com')->first();

        $mentor = [
            [
                'id' => $user->id,
                'M_phoneNum' => '01129406033',
            ],
        ];

        foreach ($mentor as $data) {
            Mentor::create($data);
        }
    }
}
