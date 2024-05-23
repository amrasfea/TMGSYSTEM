{{-- resources/views/platinums/show.blade.php --}}
<x-staff-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registration Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    <style>
                        .details-container {
                            font-family: Arial, sans-serif;
                            margin: 20px;
                        }
                        h1 {
                            color: #333;
                            font-size: 24px;
                            margin-bottom: 20px;
                        }
                        p {
                            font-size: 16px;
                            margin-bottom: 10px;
                        }
                        p strong {
                            color: #555;
                        }
                        .back-button {
                            display: inline-block;
                            margin-top: 20px;
                            padding: 10px 15px;
                            color: white;
                            background-color: #4CAF50;
                            text-decoration: none;
                            border-radius: 5px;
                        }
                        .back-button:hover {
                            background-color: #45a049;
                        }
                    </style>
                    
                    <div class="details-container">
                        <h1>{{ $platinum->P_full_name }}</h1>
                        <p><strong>Type Of Registration:</strong> {{ $platinum->P_registration_type }}</p>
                        <p><strong>Title:</strong> {{ $platinum->P_title }}</p>
                        <p><strong>Identity Card:</strong> {{ $platinum->P_identity_card }}</p>
                        <p><strong>Gender:</strong> {{ $platinum->P_gender }}</p>
                        <p><strong>Religion:</strong> {{ $platinum->P_religion }}</p>
                        <p><strong>Race:</strong> {{ $platinum->P_race }}</p>
                        <p><strong>Citizenship:</strong> {{ $platinum->P_citizenship }}</p>
                        <p><strong>Education Level:</strong> {{ $platinum->P_edu_level }}</p>
                        <p><strong>Education Field:</strong> {{ $platinum->P_edu_field }}</p>
                        <p><strong>Education Institute:</strong> {{ $platinum->P_edu_institute }}</p>
                        <p><strong>Occupation:</strong> {{ $platinum->P_occupation }}</p>
                        <p><strong>Sponsorship:</strong> {{ $platinum->P_sponsorship }}</p>
                        <p><strong>Address:</strong> {{ $platinum->P_address }}</p>
                        <p><strong>Email:</strong> {{ $platinum->P_email }}</p>
                        <p><strong>Phone Number:</strong> {{ $platinum->P_phone }}</p>
                        <p><strong>Facebook Name:</strong> {{ $platinum->P_fb_name }}</p>
                        <p><strong>Program:</strong> {{ $platinum->P_program }}</p>
                        <p><strong>Batch:</strong> {{ $platinum->P_batch }}</p>
                        <p><strong>Referral:</strong> {{ $platinum->P_referral ? 'Yes' : 'No' }}</p>
                        @if($platinum->P_referral)
                            <p><strong>Referral Name:</strong> {{ $platinum->P_referral_name }}</p>
                            <p><strong>Referral Batch:</strong> {{ $platinum->P_referral_batch }}</p>
                        @endif
                        <a href="{{ route('platinum.index') }}" class="back-button">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-staff-layout>
