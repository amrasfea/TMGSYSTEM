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
        $user = User::where('email', 'fikrishahril47@gmail.com')->first();

        $mentor = [
            [
                'id' => $user->id,
                'M_phoneNum' => '0187657900',
            ],
        ];

        foreach ($mentor as $data) {
            Mentor::create($data);
        }
    }
}
