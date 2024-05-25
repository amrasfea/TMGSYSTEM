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

            /* Button Styles */

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
    <form method="post" action="{{route('platinum.update', ['platinum' => $platinum])}}">
        @csrf 
        @method('put')

    <div class="form-container">
        <div class="form-section">
            <h2>Platinum Information</h2>
            <label for="registration-type">Type of registration:</label>
            <select id="registration-type" name="P_registration_type">
           <option value="premier" {{ $platinum->P_registration_type === 'premier' ? 'selected' : '' }}>Premier</option>
          <option value="new" {{ $platinum->P_registration_type === 'new' ? 'selected' : '' }}>New</option>
          <option value="upgrade" {{ $platinum->P_registration_type === 'upgrade' ? 'selected' : '' }}>Upgrade (Premier)</option>
          <option value="downgrade" {{ $platinum->P_registration_type === 'downgrade' ? 'selected' : '' }}>Downgrade (Elite)</option>
         <option value="ala_carte" {{ $platinum->P_registration_type === 'ala_carte' ? 'selected' : '' }}>Ala Carte</option>
        </select>


        <label for="title">Title:</label>
            <select id="title" name="P_title">
              <option value="Mr" {{ $platinum->P_title === 'Mr' ? 'selected' : '' }}>Mr</option>
            <option value="Miss" {{ $platinum->P_title === 'Miss' ? 'selected' : '' }}>Miss</option>
            <option value="Mrs" {{ $platinum->P_title === 'Mrs' ? 'selected' : '' }}>Mrs</option>
             <option value="Ms" {{ $platinum->P_title === 'Ms' ? 'selected' : '' }}>Ms</option>
             <option value="Dr" {{ $platinum->P_title === 'Dr' ? 'selected' : '' }}>Dr</option>
             <option value="Prof" {{ $platinum->P_title === 'Prof' ? 'selected' : '' }}>Prof</option>
        </select>


            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="P_full_name" placeholder="Enter your full name" value="{{$platinum->P_full_name}}">

            <label for="identity-card">Identity Card No.:</label>
            <input type="text" id="identity-card" name="P_identity_card" placeholder="Enter your ID card number" value="{{$platinum->P_identity_card}}">

            <label for="gender">Gender:</label>
            <select id="gender" name="P_gender">
           <option value="male" {{ $platinum->P_gender === 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ $platinum->P_gender === 'female' ? 'selected' : '' }}>Female</option>
         </select>


            <label for="religion">Religion:</label>
            <input type="text" id="religion" name="P_religion" placeholder="Enter your religion" value="{{$platinum->P_religion}}">

            <label for="race">Race:</label>
            <input type="text" id="race" name="P_race" placeholder="Enter your race" value="{{$platinum->P_race}}">

            <label for="citizenship">Citizenship:</label>
            <input type="text" id="citizenship" name="P_citizenship" placeholder="Enter your citizenship" value="{{$platinum->P_citizenship}}">

            <h2>Education Information</h2>
            <label for="eduLevel">Current Education Level:</label>
            <input type="text" id="eduLevel" name="P_edu_level" placeholder="Enter your current education level" value="{{$platinum->P_edu_level}}">

            <label for="eduField">Education Field:</label>
            <input type="text" id="eduField" name="P_edu_field" placeholder="Enter your education field" value="{{$platinum->P_edu_field}}">

            <label for="eduInstitute">Educational Institute:</label>
            <input type="text" id="eduInstitute" name="P_edu_institute" placeholder="Enter your educational institute" value="{{$platinum->P_edu_institute}}">

            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="P_occupation" placeholder="Enter your occupation" value="{{$platinum->P_occupation}}">

            <label for="sponsorship">Study Sponsorship:</label>
            <input type="text" id="sponsorship" name="P_sponsorship" placeholder="Enter your sponsorship" value="{{$platinum->P_sponsorship}}">
        </div>

        <div class="form-section">
            <h2>Communication Information</h2>

            <label for="address">Address:</label>
            <input type="text" id="address" name="P_address" placeholder="Enter your address" value="{{$platinum->P_address}}">

            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="P_phone" placeholder="e.g., 019-9336892" value="{{$platinum->P_phone}}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="P_email" placeholder="e.g., amirasofea2@gmail.com" value="{{$platinum->P_email}}">

            <label for="fbName">Facebook Name:</label>
            <input type="text" id="fbName" name="P_fb_name" placeholder="Enter your Facebook name" value="{{$platinum->P_fb_name}}">

            <h2>Program Information</h2>

            <label for="program">Program:</label>
            <select id="program" name="P_program">
             <option value="platinum_professorship" {{ $platinum->P_program === 'platinum_professorship' ? 'selected' : '' }}>Platinum Professorship</option>
              <option value="platinum_premier" {{ $platinum->P_program === 'platinum_premier' ? 'selected' : '' }}>Platinum Premier</option>
              <option value="platinum_elite" {{ $platinum->P_program === 'platinum_elite' ? 'selected' : '' }}>Platinum Elite</option>
              <option value="platinum_dr_jr" {{ $platinum->P_program === 'platinum_dr_jr' ? 'selected' : '' }}>Platinum Dr. Jr.</option>
             <option value="ala_carte" {{ $platinum->P_program === 'ala_carte' ? 'selected' : '' }}>Ala Carte</option>
            </select>


            <label for="batch">Batch:</label>
           <select id="batch" name="P_batch">
               @for ($i = 1; $i <= 10; $i++)
                 <option value="{{ $i }}" {{ $platinum->P_batch == $i ? 'selected' : '' }}>{{ $i }}</option>
                 @endfor
            </select>

            <label for="referral">Referral:</label>
            <select id="referral" name="P_referral" onchange="toggleReferralFields()">
              <option value="1" {{ $platinum->P_referral == 1 ? 'selected' : '' }}>Yes</option>
             <option value="0" {{ $platinum->P_referral == 0 ? 'selected' : '' }}>No</option>
            </select>

            <div id="referralFields" value=" {{ $platinum->P_referral == 1 ? 'display: block;' : 'display: none;' }}">
    <label for="referral-name">Referral Name:</label>
    <input type="text" id="referral-name" name="P_referral_name" placeholder="Enter referral name" value="{{ $platinum->P_referral_name }}">

    <label for="referral-batch">Referral Batch:</label>
    <input type="text" id="referral-batch" name="P_referral_batch" placeholder="Enter referral batch" value="{{ $platinum->P_referral_batch }}">
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
            <input type="submit" value="Update" />
        </div>
        </div>
    </div>
</form>

                    
                </div>
            </div>
        </div>
    </div>
</x-staff-layout>

  
