<x-staff-layout>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .user-details {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .user-details table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .user-details th, .user-details td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }
        .user-details th {
            background-color: #6495EA;
            color: white;
        }
        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container mx-auto px-4">
        <div class="py-6 header">
            <h1 class="text-2xl font-bold">{{ __('User Details') }}</h1>
        </div>
        <div class="user-details mt-4">
            <table>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>User Type</th>
                    <td>{{ $user->roleType }}</td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td>{{ $user->P_phone }}</td>
                </tr>
                <tr>
                    <th>Type of Registration</th>
                    <td>{{ $user->P_registration_type }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $user->P_title }}</td>
                </tr>
                <tr>
                    <th>Identity Card No.</th>
                    <td>{{ $user->P_identity_card }}</td>
                </tr>
                <tr>
                    <th>Gender</th>
                    <td>{{ $user->P_gender }}</td>
                </tr>
                <tr>
                    <th>Religion</th>
                    <td>{{ $user->P_religion }}</td>
                </tr>
                <tr>
                    <th>Race</th>
                    <td>{{ $user->P_race }}</td>
                </tr>
                <tr>
                    <th>Citizenship</th>
                    <td>{{ $user->P_citizenship }}</td>
                </tr>
                <tr>
                    <th>Current Education Level</th>
                    <td>{{ $user->P_edu_level }}</td>
                </tr>
                <tr>
                    <th>Education Field</th>
                    <td>{{ $user->P_edu_field }}</td>
                </tr>
                <tr>
                    <th>Educational Institute</th>
                    <td>{{ $user->P_edu_institute }}</td>
                </tr>
                <tr>
                    <th>Occupation</th>
                    <td>{{ $user->P_occupation }}</td>
                </tr>
                <tr>
                    <th>Study Sponsorship</th>
                    <td>{{ $user->P_sponsorship }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $user->P_address }}</td>
                </tr>
                <tr>
                    <th>Facebook Name</th>
                    <td>{{ $user->P_fb_name }}</td>
                </tr>
                <tr>
                    <th>Program</th>
                    <td>{{ $user->P_program }}</td>
                </tr>
                <tr>
                    <th>Batch</th>
                    <td>{{ $user->P_batch }}</td>
                </tr>
                <tr>
                    <th>Referral</th>
                    <td>{{ $user->P_referral ? 'Yes' : 'No' }}</td>
                </tr>
                @if($user->P_referral)
                <tr>
                    <th>Referral Name</th>
                    <td>{{ $user->P_referral_name }}</td>
                </tr>
                <tr>
                    <th>Referral Batch</th>
                    <td>{{ $user->P_referral_batch }}</td>
                </tr>
                @endif
            </table>
            <a href="{{ route('users.index') }}" class="back-button">Back</a>
        </div>
    </div>
</x-staff-layout>


