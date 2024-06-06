<x-platinum-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Expert Domain') }}
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
            background-color: #0062cc;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 30px;
            float: right;
            font-size: 16px;
            font-weight: bold
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
    <form action="{{ route('expertDomains.update', $expertDomain->ED_ID) }}" method="POST">
    @csrf
    @method('put')

    <div class="form-container">
        <div class="form-section">
            <h2>Expert Domain Information</h2>

            <label for="title">Title:</label>
            <select id="title" name="E_title" required>
                <option value="Mr" {{ old('E_title', $expertDomain->E_title) == 'Mr' ? 'selected' : '' }}>Mr</option>
                <option value="Miss" {{ old('E_title', $expertDomain->E_title) == 'Miss' ? 'selected' : '' }}>Miss</option>
                <option value="Mrs" {{ old('E_title', $expertDomain->E_title) == 'Mrs' ? 'selected' : '' }}>Mrs</option>
                <option value="Ms" {{ old('E_title', $expertDomain->E_title) == 'Ms' ? 'selected' : '' }}>Ms</option>
                <option value="Dr" {{ old('E_title', $expertDomain->E_title) == 'Dr' ? 'selected' : '' }}>Dr</option>
                <option value="Prof" {{ old('E_title', $expertDomain->E_title) == 'Prof' ? 'selected' : '' }}>Prof</option>
            </select>

            <label for="full-name">Full Name:</label>
            <input type="text" id="full-name" name="ED_Name" value="{{ old('ED_Name', $expertDomain->ED_Name) }}" required>

            <label for="gender">Gender:</label>
            <select id="gender" name="ED_gender" required>
                <option value="male" {{ old('ED_gender', $expertDomain->ED_gender) == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ old('ED_gender', $expertDomain->ED_gender) == 'female' ? 'selected' : '' }}>Female</option>
            </select>

            <h2>Education Information</h2>
            <label for="eduLevel">Current Education Level:</label>
            <input type="text" id="eduLevel" name="ED_edu_level" value="{{ old('ED_edu_level', $expertDomain->ED_edu_level) }}" required>

            <label for="eduField">Education Field:</label>
            <input type="text" id="eduField" name="ED_edu_field" value="{{ old('ED_edu_field', $expertDomain->ED_edu_field) }}" required>

            <label for="eduInstitute">Educational Institute:</label>
            <input type="text" id="eduInstitute" name="ED_Uni" value="{{ old('ED_Uni', $expertDomain->ED_Uni) }}" required>

            <label for="occupation">Occupation:</label>
            <input type="text" id="occupation" name="ED_occupation" value="{{ old('ED_occupation', $expertDomain->ED_occupation) }}" required>

            <label for="sponsorship">Study Sponsorship:</label>
            <input type="text" id="sponsorship" name="ED_sponsorship" value="{{ old('ED_sponsorship', $expertDomain->ED_sponsorship) }}" required>
        </div>

        <div class="form-section">
            <h2>Communication Information</h2>

            <label for="address">Address:</label>
            <input type="text" id="address" name="ED_address" value="{{ old('ED_address', $expertDomain->ED_address) }}" required>

            <label for="phone">Phone No:</label>
            <input type="text" id="phone" name="ED_PhoneNum" value="{{ old('ED_PhoneNum', $expertDomain->ED_PhoneNum) }}" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="ED_Email" value="{{ old('ED_Email', $expertDomain->ED_Email) }}" required>

            <label for="fbName">Facebook Name:</label>
            <input type="text" id="fbName" name="ED_fbname" value="{{ old('ED_fbname', $expertDomain->ED_fbname) }}" required>

            <div>
                <input type="submit" value="UPDATE">
            </div>
        </div>
    </div>
</form>

                    
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>



