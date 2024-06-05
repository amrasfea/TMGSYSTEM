<x-staff-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Registration') }}
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
                       <li>{{$error}}</li>
                      @endforeach
                      </ul>
                       @endif
                 </div>

                    <!-- Default Registration Form -->
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class="form-container">
                            <div class="form-section">
                                <h2>Platinum Information</h2>
                                <label for="registration-type">Type of registration:</label>
                                <select id="registration-type" name="P_registration_type">
                                    <option value="premier">Premier</option>
                                    <option value="new">New</option>
                                    <option value="upgrade">Upgrade (Premier)</option>
                                    <option value="downgrade">Downgrade (Elite)</option>
                                    <option value="ala_carte">Ala Carte</option>
                                </select>

                                <label for="title">Title:</label>
                                <select id="title" name="P_title">
                                    <option value="Mr">Mr</option>
                                    <option value="Miss">Miss</option>
                                    <option value="Mrs">Mrs</option>
                                    <option value="Ms">Ms</option>
                                    <option value="Dr">Dr</option>
                                    <option value="Prof">Prof</option>
                                </select>

                                <label for="identity-card">Identity Card No.:</label>
                                <input type="text" id="identity-card" name="P_identity_card" placeholder="Enter your ID card number">

                                <!-- Name -->
                            <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" placeholder="Enter platinum name"/>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" placeholder="Enter email" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                             </div>

                                <label for="gender">Gender:</label>
                                <select id="gender" name="P_gender">
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
                                </select>

                                <label for="religion">Religion:</label>
<select id="religion" name="P_religion">
    <option value="" disabled selected>Select your religion</option>
    <option value="Islam">Islam</option>
    <option value="Buddhism">Buddhism</option>
    <option value="Christianity">Christianity</option>
    <option value="Hinduism">Hinduism</option>
    <option value="Confucianism">Confucianism</option>
    <option value="Taoism">Taoism</option>
    <option value="Other">Other</option>
</select>

<label for="race">Race:</label>
<select id="race" name="P_race">
    <option value="" disabled selected>Select your race</option>
    <option value="Malay">Malay</option>
    <option value="Chinese">Chinese</option>
    <option value="Indian">Indian</option>
    <option value="Other">Other</option>
</select>

<label for="citizenship">Citizenship:</label>
<select id="P_citizenship" name="P_citizenship">
    <option value="" disabled selected>Select your citizenship</option>
    <option value="Malaysian">Malaysian</option>
    <option value="Non-Malaysian">Non-Malaysian</option>
    <option value="Other">Other</option>
</select>


                                <h2>Education Information</h2>
                                <label for="eduLevel">Current Education Level:</label>
<select id="eduLevel" name="P_edu_level">
    <option value="" disabled selected>Select your current education level</option>
    <option value="Bachelor's Degree">Bachelor's Degree</option>
    <option value="Master's Degree">Master's Degree</option>
    <option value="PhD">PhD</option>
    <option value="Other">Other</option>
</select>

                                <label for="eduField">Education Field:</label>
                                <input type="text" id="eduField" name="P_edu_field" placeholder="Enter your education field">

                                <label for="eduInstitute">Educational Institute:</label>
<select id="eduInstitute" name="P_edu_institute">
    <option value="" disabled selected>Select your educational institute</option>
    <option value="University of Malaya">University of Malaya (UM)</option>
    <option value="Universiti Kebangsaan Malaysia">Universiti Kebangsaan Malaysia (UKM)</option>
    <option value="Universiti Sains Malaysia">Universiti Sains Malaysia (USM)</option>
    <option value="Universiti Putra Malaysia">Universiti Putra Malaysia (UPM)</option>
    <option value="Universiti Teknologi Malaysia">Universiti Teknologi Malaysia (UTM)</option>
    <option value="Universiti Teknologi MARA">Universiti Teknologi MARA (UiTM)</option>
    <option value="Universiti Utara Malaysia">Universiti Utara Malaysia (UUM)</option>
    <option value="Universiti Malaysia Sabah">Universiti Malaysia Sabah (UMS)</option>
    <option value="Universiti Malaysia Pahang">Universiti Malaysia Pahang (UMP)</option>
    <option value="Universiti Pendidikan Sultan Idris">Universiti Pendidikan Sultan Idris (UPSI)</option>
    <option value="Universiti Islam Antarabangsa Malaysia">Universiti Islam Antarabangsa Malaysia (UIAM)</option>
    <option value="Universiti Islam Sains Islam Malaysia">Universiti Sains Islam Malaysia (USIM)</option>
    <option value="Universiti Tun Hussein Onn Malaysia">Universiti Tun Hussein Onn Malaysia (UTHM)</option>
    <option value="Universiti Teknikal Malaysia Melaka">Universiti Teknikal Malaysia Melaka (UTEM)</option>
    <option value="Universiti Sultan Zaina Abidin">Universiti Sultan Zainal Abidin (UniSZA)</option>
    <option value="Universiti Malayia Perlis">Universiti Malaysia Perlis (UniMAP)</option>
    <option value="Universiti Malaysia Kelantan">Universiti Malaysia Kelantan (UMK)</option>
    <option value="Universiti Pertahanan Nasional Malaysia">Universiti Pertahanan Nasional Malaysia (UPNM)</option>
    <option value="Universiti Malaysia Sarawak">Universiti Malaysia Sarawak (UNIMAS)</option>
    <option value="Universiti Malaysia Terengganu">Universiti Malaysia Terengganu (UMT)</option>

    <option value="Other">Other</option>
</select>

                                <label for="occupation">Occupation:</label>
                                <input type="text" id="occupation" name="P_occupation" placeholder="Enter your occupation">

                                <label for="sponsorship">Study Sponsorship:</label>
                                <input type="text" id="sponsorship" name="P_sponsorship" placeholder="Enter your sponsorship">
                            </div>

                            <div class="form-section">
                                <h2>Communication Information</h2>

                                <label for="address">Address:</label>
                                <input type="text" id="address" name="P_address" placeholder="Enter your address">

                                <label for="phone">Phone No:</label>
                                <input type="text" id="phone" name="P_phone" placeholder="e.g., 019-9336892">

                                <label for="fbName">Facebook Name:</label>
                                <input type="text" id="fbName" name="P_fb_name" placeholder="Enter your Facebook name">

                                <h2>Program Information</h2>

                                <label for="program">Program:</label>
                                <select id="program" name="P_program">
                                    <option value="platinum_professorship">Platinum Professorship</option>
                                    <option value="platinum_premier">Platinum Premier</option>
                                    <option value="platinum_elite">Platinum Elite</option>
                                    <option value="platinum_dr_jr">Platinum Dr. Jr.</option>
                                    <option value="ala_carte">Ala Carte</option>
                                </select>

                                <label for="batch">Batch:</label>
                                <select id="batch" name="P_batch">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                </select>

                                <label for="referral">Referral:</label>
                                <select id="referral" name="P_referral" onchange="toggleReferralFields()">
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>

                                <div id="referralFields" style="display: none;">
                                    <label for="referral-name">Referral Name:</label>
                                    <input type="text" id="referral-name" name="P_referral_name" placeholder="Enter referral name">

                                    <label for="referral-batch">Referral Batch:</label>
                                    <input type="text" id="referral-batch" name="P_referral_batch" placeholder="Enter referral batch">
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

                                <div class="flex items-center justify-end mt-4">
                                    

                                    <x-primary-button class="ms-4">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-staff-layout>
