<x-app-layout>

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
            <select id="registration-type" name="registration_type">
           <option value="premier" {{ $platinum->registration_type === 'premier' ? 'selected' : '' }}>Premier</option>
          <option value="new" {{ $platinum->registration_type === 'new' ? 'selected' : '' }}>New</option>
          <option value="upgrade" {{ $platinum->registration_type === 'upgrade' ? 'selected' : '' }}>Upgrade (Premier)</option>
          <option value="downgrade" {{ $platinum->registration_type === 'downgrade' ? 'selected' : '' }}>Downgrade (Elite)</option>
         <option value="ala_carte" {{ $platinum->registration_type === 'ala_carte' ? 'selected' : '' }}>Ala Carte</option>
        </select>


        <label for="title">Title:</label>
            <select id="title" name="title">
              <option value="Mr" {{ $platinum->title === 'Mr' ? 'selected' : '' }}>Mr</option>
            <option value="Miss" {{ $platinum->title === 'Miss' ? 'selected' : '' }}>Miss</option>
            <option value="Mrs" {{ $platinum->title === 'Mrs' ? 'selected' : '' }}>Mrs</option>
             <option value="Ms" {{ $platinum->title === 'Ms' ? 'selected' : '' }}>Ms</option>
             <option value="Dr" {{ $platinum->title === 'Dr' ? 'selected' : '' }}>Dr</option>
             <option value="Prof" {{ $platinum->title === 'Prof' ? 'selected' : '' }}>Prof</option>
        </select>


            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="full_name" placeholder="Enter your full name" value="{{$platinum->full_name}}">

            <label for="identity-card">Identity Card No.:</label>
            <input type="text" id="identity-card" name="identity_card" placeholder="Enter your ID card number" value="{{$platinum->identity_card}}">

            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
           <option value="male" {{ $platinum->gender === 'male' ? 'selected' : '' }}>Male</option>
          <option value="female" {{ $platinum->gender === 'female' ? 'selected' : '' }}>Female</option>
         </select>


            <label for="religion">Religion:</label>
            <input type="text" id="religion" name="religion" placeholder="Enter your religion" value="{{$platinum->religion}}">

            <label for="race">Race:</label>
            <input type="text" id="race" name="race" placeholder="Enter your race" value="{{$platinum->race}}">

            <label for="citizenship">Citizenship:</label>
            <input type="text" id="citizenship" name="citizenship" placeholder="Enter your citizenship" value="{{$platinum->citizenship}}">

            <h2>Education Information</h2>
            <label for="eduLevel">Current Education Level:</label>
            <input type="text" id="eduLevel" name="edu_level" placeholder="Enter your current education level" value="{{$platinum->edu_level}}">

            <label for="eduField">Education Field:</label>
            <input type="text" id="eduField" name="edu_field" placeholder="Enter your education field" value="{{$platinum->edu_field}}">

            <label for="eduInstitute">Educational Institute:</label>
            <input type="text" id="eduInstitute" name="edu_institute" placeholder="Enter your educational institute" value="{{$platinum->edu_institute}}">

            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="occupation" placeholder="Enter your occupation" value="{{$platinum->occupation}}">

            <label for="sponsorship">Study Sponsorship:</label>
            <input type="text" id="sponsorship" name="sponsorship" placeholder="Enter your sponsorship" value="{{$platinum->sponsorship}}">
        </div>

        <div class="form-section">
            <h2>Communication Information</h2>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" placeholder="Enter your address" value="{{$platinum->address}}">

            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="phone" placeholder="e.g., 019-9336892" value="{{$platinum->phone}}">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="e.g., amirasofea2@gmail.com" value="{{$platinum->email}}">

            <label for="fbName">Facebook Name:</label>
            <input type="text" id="fbName" name="fb_name" placeholder="Enter your Facebook name" value="{{$platinum->fb_name}}">

            <h2>Program Information</h2>

            <label for="program">Program:</label>
            <select id="program" name="program">
             <option value="platinum_professorship" {{ $platinum->program === 'platinum_professorship' ? 'selected' : '' }}>Platinum Professorship</option>
              <option value="platinum_premier" {{ $platinum->program === 'platinum_premier' ? 'selected' : '' }}>Platinum Premier</option>
              <option value="platinum_elite" {{ $platinum->program === 'platinum_elite' ? 'selected' : '' }}>Platinum Elite</option>
              <option value="platinum_dr_jr" {{ $platinum->program === 'platinum_dr_jr' ? 'selected' : '' }}>Platinum Dr. Jr.</option>
             <option value="ala_carte" {{ $platinum->program === 'ala_carte' ? 'selected' : '' }}>Ala Carte</option>
            </select>


            <label for="batch">Batch:</label>
           <select id="batch" name="batch">
               @for ($i = 1; $i <= 10; $i++)
                 <option value="{{ $i }}" {{ $platinum->batch == $i ? 'selected' : '' }}>{{ $i }}</option>
                 @endfor
            </select>

            <label for="referral">Referral:</label>
            <select id="referral" name="referral" onchange="toggleReferralFields()">
              <option value="1" {{ $platinum->referral == 1 ? 'selected' : '' }}>Yes</option>
             <option value="0" {{ $platinum->referral == 0 ? 'selected' : '' }}>No</option>
            </select>

            <div id="referralFields" style=" {{ $platinum->referral == 1 ? 'display: block;' : 'display: none;' }}">
    <label for="referral-name">Referral Name:</label>
    <input type="text" id="referral-name" name="referral_name" placeholder="Enter referral name" value="{{ $platinum->referral_name }}">

    <label for="referral-batch">Referral Batch:</label>
    <input type="text" id="referral-batch" name="referral_batch" placeholder="Enter referral batch" value="{{ $platinum->referral_batch }}">
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
</x-app-layout>

  
