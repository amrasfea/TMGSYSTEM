<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Research and Publication') }}
        </h2>
    </x-slot>

    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .form-section {
            width: 100%;
            padding: 20px;
            background-color: #f9f9f9;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .form-section h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: #007bff;
        }
        .form-section label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="tel"],
        input[type="email"],
        input[type="date"],
        input[type="number"],
        select {
            width: calc(100% - 20px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
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
            font-weight: bold;
        }
        .form-section button:hover,
        .form-section input[type="submit"]:hover {
            background-color: #0056b3;
            color: #fff;
        }
        .error-messages {
            color: red;
            margin-bottom: 20px;
        }
        .form-container .submit-button-container {
            text-align: right;
            margin-top: 20px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="error-messages">
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <form method="post" action="{{ route('researchPublications.store') }}">
                        @csrf

                        <div class="form-container">
                            <div class="form-section">
                                <h2>Research Information</h2>

                                <label for="research-title">Research Title:</label>
                                <input type="text" id="research-title" name="R_title" placeholder="Enter the research title" aria-label="Research Title" value="{{ old('R_title') }}">
                            </div>

                            <div class="form-section">
                                <h2>Publication Information</h2>

                                <label for="publication-type">Publication Type:</label>
                                <select id="publication-type" name="PB_Type"> 
                                    <option value="">Select Type</option>
                                    <option value="Journal">Journal</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Book">Book</option>
                                    <option value="Thesis">Thesis</option>
                                    <option value="Report">Report</option>
                                </select>

                                <label for="publication-title">Publication Title:</label>
                                <input type="text" id="publication-title" name="PB_Title" placeholder="Enter the publication title" aria-label="Publication Title" value="{{ old('PB_Title') }}">

                                <label for="publication-author">Author:</label>
                                <input type="text" id="publication-author" name="PB_Author" placeholder="Enter the author's name" aria-label="Author" value="{{ old('PB_Author') }}">

                                <label for="publication-uni">University:</label>
                                <select id="publication-uni" name="PB_Uni">
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

                                <label for="publication-page">Page:</label>
                                <input type="number" id="publication-page" name="PB_Page" placeholder="Enter the page number" aria-label="Page Number" value="{{ old('PB_Page') }}">

                                <label for="publication-detail">Detail:</label>
                                <input type="text" id="publication-detail" name="PB_Detail" placeholder="Enter the publication details" aria-label="Publication Details" value="{{ old('PB_Detail') }}">

                                <label for="publication-date">Date of Publication:</label>
                                <input type="date" id="publication-date" name="PB_Date" aria-label="Publication Date" value="{{ old('PB_Date') }}">
                            </div>

                            <div class="submit-button-container">
                                <input type="submit" value="ADD">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
