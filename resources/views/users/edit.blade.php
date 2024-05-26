@extends('layouts.staff')

@section('content')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Registration') }}
        </h2>
    </x-slot>

    <style>
        /* Common styles */
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-section {
            width: 48%; /* Adjust as needed */
            padding: 20px;
            background-color: #f9f9f9; /* Set the background color */
        }
        .form-section h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #007bff; /* Set the color of h2 elements */
        }
        .form-section label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-section button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 30px;
            float:right;
        }

        /* Button Styles */
        .form-section button,
        .form-section input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 30px;
            float: right;
            font-size: 16px;
        }
        .form-section button:hover,
        .form-section input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div>
                        @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>

                    <!-- Edit Registration Form -->
                    <form method="POST" action="{{ route('users.update', $user->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>

                        <!-- Email Address -->
                        <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password (leave blank to keep current)')" />
                            <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <!-- Confirm Password -->
                        <div class="mt-4">
                            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation"
                                autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>

                        <div class="form-container">
                            <div class="form-section">
                                <h2>Platinum Information</h2>
                                <label for="registration-type">Type of registration:</label>
                                <select id="registration-type" name="P_registration_type">
                                    <option value="premier" {{ old('P_registration_type', $user->P_registration_type) == 'premier' ? 'selected' : '' }}>Premier</option>
                                    <option value="new" {{ old('P_registration_type', $user->P_registration_type) == 'new' ? 'selected' : '' }}>New</option>
                                    <option value="upgrade" {{ old('P_registration_type', $user->P_registration_type) == 'upgrade' ? 'selected' : '' }}>Upgrade (Premier)</option>
                                    <option value="downgrade" {{ old('P_registration_type', $user->P_registration_type) == 'downgrade' ? 'selected' : '' }}>Downgrade (Elite)</option>
                                    <option value="ala_carte" {{ old('P_registration_type', $user->P_registration_type) == 'ala_carte' ? 'selected' : '' }}>Ala Carte</option>
                                </select>

                                <label for="title">Title:</label>
                                <select id="title" name="P_title">
                                    <option value="Mr" {{ old('P_title', $user->P_title) == 'Mr' ? 'selected' : '' }}>Mr</option>
                                    <option value="Miss" {{ old('P_title', $user->P_title) == 'Miss' ? 'selected' : '' }}>Miss</option>
                                    <option value="Mrs" {{ old('P_title', $user->P_title) == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                                    <option value="Ms" {{ old('P_title', $user->P_title) == 'Ms' ? 'selected' : '' }}>Ms</option>
                                    <option value="Dr" {{ old('P_title', $user->P_title) == 'Dr' ? 'selected' : '' }}>Dr</option>
                                    <option value="Prof" {{ old('P_title', $user->P_title) == 'Prof' ? 'selected' : '' }}>Prof</option>
                                </select>

                                <label for="identity-card">Identity Card No.:</label>
                                <input type="text" id="identity-card" name="P_identity_card" value="{{ old('P_identity_card', $user->P_identity_card) }}" placeholder="Enter your ID card number">

                                <label for="gender">Gender:</label>
                                <select id="gender" name="P_gender">
                                    <option value="male" {{ old('P_gender', $user->P_gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('P_gender', $user->P_gender) == 'female' ? 'selected' : '' }}>Female</option>
                                </select>

                                <label for="religion">Religion:</label>
                                <input type="text" id="religion" name="P_religion" value="{{ old('P_religion', $user->P_religion) }}" placeholder="Enter your religion">

                                <label for="race">Race:</label>
                                <input type="text" id="race" name="P_race" value="{{ old('P_race', $user->P_race) }}" placeholder="Enter your race">

                                <label for="citizenship">Citizenship:</label>
                                <input type="text" id="P_citizenship" name="P_citizenship" value="{{ old('P_citizenship', $user->P_citizenship) }}" placeholder="Enter your citizenship">

                                <h2>Education Information</h2>
                                <label for="eduLevel">Current Education Level:</label>
                                <input type="text" id="eduLevel" name="P_edu_level" value="{{ old('P_edu_level', $user->P_edu_level) }}" placeholder="Enter your current education level">

                                <label for="eduField">Education Field:</label>
                                <input type="text" id="eduField" name="P_edu_field" value="{{ old('P_edu_field', $user->P_edu_field) }}" placeholder="Enter your education field">

                                <label for="eduInstitute">Educational Institute:</label>
                                <input type="text" id="eduInstitute" name="P_edu_institute" value="{{ old('P_edu_institute', $user->P_edu_institute) }}" placeholder="Enter your educational institute">

                                <label for="occupation">Occupation:</label>
                                <input type="text" id="occupation" name="P_occupation" value="{{ old('P_occupation', $user->P_occupation) }}" placeholder="Enter your occupation">

                                <label for="sponsorship">Study Sponsorship:</label>
                                <input type="text" id="sponsorship" name="P_sponsorship" value="{{ old('P_sponsorship', $user->P_sponsorship) }}" placeholder="Enter your sponsorship">
                            </div>

                            <div class="form-section">
                                <h2>Communication Information</h2>

                                <label for="address">Address:</label>
                                <input type="text" id="address" name="P_address" value="{{ old('P_address', $user->P_address) }}" placeholder="Enter your address">

                                <label for="phone">Phone No:</label>
                                <input type="text" id="phone" name="P_phone" value="{{ old('P_phone', $user->P_phone) }}" placeholder="e.g., 019-9336892">

                                <label for="email">Email:</label>
                                <input type="email" id="email" name="P_email" value="{{ old('P_email', $user->P_email) }}" placeholder="e.g., amirasofea2@gmail.com">

                                <label for="fbName">Facebook Name:</label>
                                <input type="text" id="fbName" name="P_fb_name" value="{{ old('P_fb_name', $user->P_fb_name) }}" placeholder="Enter your Facebook name">

                                <h2>Program Information</h2>

                                <label for="program">Program:</label>
                                <select id="program" name="P_program">
                                    <option value="platinum_professorship" {{ old('P_program', $user->P_program) == 'platinum_professorship' ? 'selected' : '' }}>Platinum Professorship</option>
                                    <option value="platinum_premier" {{ old('P_program', $user->P_program) == 'platinum_premier' ? 'selected' : '' }}>Platinum Premier</option>
                                    <option value="platinum_elite" {{ old('P_program', $user->P_program) == 'platinum_elite' ? 'selected' : '' }}>Platinum Elite</option>
                                    <option value="platinum_dr_jr" {{ old('P_program', $user->P_program) == 'platinum_dr_jr' ? 'selected' : '' }}>Platinum Dr. Jr.</option>
                                    <option value="ala_carte" {{ old('P_program', $user->P_program) == 'ala_carte' ? 'selected' : '' }}>Ala Carte</option>
                                </select>

                                <label for="batch">Batch:</label>
                                <select id="batch" name="P_batch">
                                    <option value="1" {{ old('P_batch', $user->P_batch) == '1' ? 'selected' : '' }}>1</option>
                                    <option value="2" {{ old('P_batch', $user->P_batch) == '2' ? 'selected' : '' }}>2</option>
                                    <option value="3" {{ old('P_batch', $user->P_batch) == '3' ? 'selected' : '' }}>3</option>
                                    <option value="4" {{ old('P_batch', $user->P_batch) == '4' ? 'selected' : '' }}>4</option>
                                    <option value="5" {{ old('P_batch', $user->P_batch) == '5' ? 'selected' : '' }}>5</option>
                                    <option value="6" {{ old('P_batch', $user->P_batch) == '6' ? 'selected' : '' }}>6</option>
                                    <option value="7" {{ old('P_batch', $user->P_batch) == '7' ? 'selected' : '' }}>7</option>
                                    <option value="8" {{ old('P_batch', $user->P_batch) == '8' ? 'selected' : '' }}>8</option>
                                    <option value="9" {{ old('P_batch', $user->P_batch) == '9' ? 'selected' : '' }}>9</option>
                                    <option value="10" {{ old('P_batch', $user->P_batch) == '10' ? 'selected' : '' }}>10</option>
                                </select>

                                <label for="referral">Referral:</label>
                                <select id="referral" name="P_referral" onchange="toggleReferralFields()">
                                    <option value="1" {{ old('P_referral', $user->P_referral) == '1' ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ old('P_referral', $user->P_referral) == '0' ? 'selected' : '' }}>No</option>
                                </select>

                                <div id="referralFields" style="display: none;">
                                    <label for="referral-name">Referral Name:</label>
                                    <input type="text" id="referral-name" name="P_referral_name" value="{{ old('P_referral_name', $user->P_referral_name) }}" placeholder="Enter referral name">

                                    <label for="referral-batch">Referral Batch:</label>
                                    <input type="text" id="referral-batch" name="P_referral_batch" value="{{ old('P_referral_batch', $user->P_referral_batch) }}" placeholder="Enter referral batch">
                                </div>

                                <script>
                                    function toggleReferralFields() {
                                        var referralDropdown = document.getElementById("referral");
                                        var referralFields = document.getElementById("referralFields");

                                        if (referralDropdown.value === "1") {
                                            referralFields.style.display = "block";
                                        } else {
                                            referralFields.style.display = "none";
                                        }
                                    }

                                    // Call the function initially to set the initial state
                                    toggleReferralFields();
                                </script>

                                <div>
                                    <input type="submit" value="Save">
                                </div>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>

                        <div class="flex items-center justify-end mt-4">
                            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                                {{ __('Already registered?') }}
                            </a>

                            <x-primary-button class="ms-4">
                                {{ __('Update') }}
                            </x-primary-button>
                        </div>
                    </form>
@endsection
