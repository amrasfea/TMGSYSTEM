<x-staff-layout>
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

                               
                                <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $user->name)" required autofocus autocomplete="name" />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />

                            <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $user->email)" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>

                                <label for="identity-card">Identity Card No.:</label>
                                <input type="text" id="identity-card" name="P_identity_card" value="{{ old('P_identity_card', $user->P_identity_card) }}" placeholder="Enter your ID card number">

                                <label for="gender">Gender:</label>
                                <select id="gender" name="P_gender">
                                    <option value="male" {{ old('P_gender', $user->P_gender) == 'male' ? 'selected' : '' }}>Male</option>
                                    <option value="female" {{ old('P_gender', $user->P_gender) == 'female' ? 'selected' : '' }}>Female</option>
                                </select>

                                <label for="religion">Religion:</label>
                                <select id="religion" name="P_religion">
                                    <option value="" disabled>Select your religion</option>
                                    <option value="Islam" {{ old('P_religion', $user->P_religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                    <option value="Buddhism" {{ old('P_religion', $user->P_religion) == 'Buddhism' ? 'selected' : '' }}>Buddhism</option>
                                    <option value="Christianity" {{ old('P_religion', $user->P_religion) == 'Christianity' ? 'selected' : '' }}>Christianity</option>
                                    <option value="Hinduism" {{ old('P_religion', $user->P_religion) == 'Hinduism' ? 'selected' : '' }}>Hinduism</option>
                                    <option value="Confucianism" {{ old('P_religion', $user->P_religion) == 'Confucianism' ? 'selected' : '' }}>Confucianism</option>
                                    <option value="Taoism" {{ old('P_religion', $user->P_religion) == 'Taoism' ? 'selected' : '' }}>Taoism</option>
                                    <option value="Other" {{ old('P_religion', $user->P_religion) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>

                                <label for="race">Race:</label>
                                <select id="race" name="P_race">
                                    <option value="" disabled>Select your race</option>
                                    <option value="Malay" {{ old('P_race', $user->P_race) == 'Malay' ? 'selected' : '' }}>Malay</option>
                                    <option value="Chinese" {{ old('P_race', $user->P_race) == 'Chinese' ? 'selected' : '' }}>Chinese</option>
                                    <option value="Indian" {{ old('P_race', $user->P_race) == 'Indian' ? 'selected' : '' }}>Indian</option>
                                    <option value="Other" {{ old('P_race', $user->P_race) == 'Other' ? 'selected' : '' }}>Other</option>
                                </select>

                                <label for="citizenship">Citizenship:</label>
                                <select id="P_citizenship" name="P_citizenship">
                                    <option value="" disabled>Select your citizenship</option>
                                    <option value="Malaysian" {{ old('P_citizenship', $user->P_citizenship) == 'Malaysian' ? 'selected' : '' }}>Malaysian</option>
                                    <option value="Non-Malaysian" {{ old('P_citizenship', $user->P_citizenship) == 'Non-Malaysian' ? 'selected' : '' }}>Non-Malaysian</option>
                                </select>

                                
                                <h2 style="margin-top: 20px;">Education Information</h2>
                                <label for="eduLevel">Current Education Level:</label>
                                <select id="eduInstitute" name="P_edu_level">
                                    <option value="Bachelor's Degree" {{ old('P_edu_level', $user->P_edu_level) == "Bachelor's Degree" ? 'selected' : '' }}>Bachelor's Degree</option>
                                    <option value="Master's Degree" {{ old('P_edu_level', $user->P_edu_level) == "Master's Degree" ? 'selected' : '' }}>Master's Degree</option>
                                    <option value="Master's Degree" {{ old('P_edu_level', $user->P_edu_level) == "PHD" ? 'selected' : '' }}>PHD</option>
                                    <option value="Other" {{ old('P_edu_level', $user->P_edu_level) == 'Other' ? 'selected' : '' }}>Other</option>
                                    </select>

                                <label for="eduField">Education Field:</label>
                                <input type="text" id="eduField" name="P_edu_field" value="{{ old('P_edu_field', $user->P_edu_field) }}" placeholder="Enter your education field">

                                <label for="eduInstitute">Educational Institute:</label>
    <select id="eduInstitute" name="P_edu_institute">
    <option value="" disabled selected>Select your educational institute</option>
    <option value="University of Malaya" {{ old('P_edu_institute', $user->P_edu_institute) == "University of Malaya" ? 'selected' : '' }}>University of Malaya (UM)</option>
    <option value="Universiti Kebangsaan Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Kebangsaan Malaysia" ? 'selected' : '' }}>Universiti Kebangsaan Malaysia (UKM)</option>
    <option value="Universiti Sains Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Sains Malaysia" ? 'selected' : '' }}>Universiti Sains Malaysia (USM)</option>
    <option value="Universiti Putra Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Putra Malaysia" ? 'selected' : '' }}>Universiti Putra Malaysia (UPM)</option>
    <option value="Universiti Teknologi Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Teknologi Malaysia" ? 'selected' : '' }}>Universiti Teknologi Malaysia (UTM)</option>
    <option value="Universiti Teknologi MARA" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Teknologi MARA" ? 'selected' : '' }}>Universiti Teknologi MARA (UiTM)</option>
    <option value="Universiti Utara Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Utara Malaysia" ? 'selected' : '' }}>Universiti Utara Malaysia (UUM)</option>
    <option value="Universiti Malaysia Sabah" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Malaysia Sabah" ? 'selected' : '' }}>Universiti Malaysia Sabah (UMS)</option>
    <option value="Universiti Malaysia Pahang" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Malaysia Pahang" ? 'selected' : '' }}>Universiti Malaysia Pahang (UMP)</option>
    <option value="Universiti Pendidikan Sultan Idris" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Pendidikan Sultan Idris" ? 'selected' : '' }}>Universiti Pendidikan Sultan Idris (UPSI)</option>
    <option value="Universiti Islam Antarabangsa Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Islam Antarabangsa Malaysia" ? 'selected' : '' }}>Universiti Islam Antarabangsa Malaysia (UIAM)</option>
    <option value="Universiti Sains Islam Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Sains Islam Malaysia" ? 'selected' : '' }}>Universiti Sains Islam Malaysia (USIM)</option>
    <option value="Universiti Tun Hussein Onn Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Tun Hussein Onn Malaysia" ? 'selected' : '' }}>Universiti Tun Hussein Onn Malaysia (UTHM)</option>
    <option value="Universiti Teknikal Malaysia Melaka" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Teknikal Malaysia Melaka" ? 'selected' : '' }}>Universiti Teknikal Malaysia Melaka (UTEM)</option>
    <option value="Universiti Sultan Zainal Abidin" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Sultan Zainal Abidin" ? 'selected' : '' }}>Universiti Sultan Zainal Abidin (UniSZA)</option>
    <option value="Universiti Malaysia Perlis" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Malaysia Perlis" ? 'selected' : '' }}>Universiti Malaysia Perlis (UniMAP)</option>
    <option value="Universiti Malaysia Kelantan" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Malaysia Kelantan" ? 'selected' : '' }}>Universiti Malaysia Kelantan (UMK)</option>
    <option value="Universiti Pertahanan Nasional Malaysia" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Pertahanan Nasional Malaysia" ? 'selected' : '' }}>Universiti Pertahanan Nasional Malaysia (UPNM)</option>
    <option value="Universiti Malaysia Sarawak" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Malaysia Sarawak" ? 'selected' : '' }}>Universiti Malaysia Sarawak (UNIMAS)</option>
    <option value="Universiti Malaysia Terengganu" {{ old('P_edu_institute', $user->P_edu_institute) == "Universiti Malaysia Terengganu" ? 'selected' : '' }}>Universiti Malaysia Terengganu (UMT)</option>
    <option value="Other" {{ old('P_edu_institute', $user->P_edu_institute) == "Other" ? 'selected' : '' }}>Other</option>
    </select>
 

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

                                <label for="fbName">Facebook Name:</label>
                                <input type="text" id="fbName" name="P_fb_name" value="{{ old('P_fb_name', $user->P_fb_name) }}" placeholder="Enter your Facebook name">

                                <h2 style="margin-top: 10px;">Program Information</h2>

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
 </x-staff-layout>
