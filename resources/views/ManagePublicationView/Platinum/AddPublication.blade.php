<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Publication') }}
        </h2>
    </x-slot>

    <style>
         body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .form-section {
            width: 48%;
            padding: 20px;
            background-color: #f9f9f9;
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
        input[type="date"],
        select,
        input[type="file"] {
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
            font-size: 16px;
            font-weight: bold;
        }
        .form-section button:hover,
        .form-section input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
        }
        .form-section .back-button {
            background-color: #6c757d;
        }
        .form-section .back-button:hover {
            background-color: #5a6268;
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
                    <form action="{{ route('publications.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-container">
        <div class="form-section">
            <h2>Publication Information</h2>

            <label for="type-of-publication">Type of Publication</label>
            <select id="type-of-publication" name="type-of-publication" required>
                <option value="">Select Type</option>
                <option value="Journal">Journal</option>
                <option value="Conference">Conference</option>
                <option value="Book">Book</option>
                <option value="Thesis">Thesis</option>
                <option value="Report">Report</option>
            </select>

            <label for="title">Publication Title</label>
            <input type="text" id="title" name="title" required>

            <label for="author">Author</label>
            <input type="text" id="author" name="author" required>

            <label for="university">University</label>
            <select id="university" name="university" required>
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
                <option value="Universiti Sains Islam Malaysia">Universiti Sains Islam Malaysia (USIM)</option>
                <option value="Universiti Tun Hussein Onn Malaysia">Universiti Tun Hussein Onn Malaysia (UTHM)</option>
                <option value="Universiti Teknikal Malaysia Melaka">Universiti Teknikal Malaysia Melaka (UTEM)</option>
                <option value="Universiti Sultan Zainal Abidin">Universiti Sultan Zainal Abidin (UniSZA)</option>
                <option value="Universiti Malaysia Perlis">Universiti Malaysia Perlis (UniMAP)</option>
                <option value="Universiti Malaysia Kelantan">Universiti Malaysia Kelantan (UMK)</option>
                <option value="Universiti Pertahanan Nasional Malaysia">Universiti Pertahanan Nasional Malaysia (UPNM)</option>
                <option value="Universiti Malaysia Sarawak">Universiti Malaysia Sarawak (UNIMAS)</option>
                <option value="Universiti Malaysia Terengganu">Universiti Malaysia Terengganu (UMT)</option>
                <option value="Other">Other</option>
            </select>

            <label for="field">Field/Course</label>
            <input type="text" id="field" name="field" required>

            <label for="detail">Description</label>
            <input type="text" id="detail" name="detail" required>

            <label for="page-number">Page Number</label>
            <input type="number" id="page-number" name="page-number" required>

            <label for="date-of-published">Date of Publish</label>
            <input type="date" id="date-of-published" name="date-of-published" required>

            <label for="expert-domain">Expert Domain</label>
            <select id="expert-domain" name="expert-domain" required>
                <option value="">Select Expert Domain</option>
                @foreach($expertDomains as $domain)
                    <option value="{{ $domain->ED_ID }}">{{ $domain->ED_Name }}</option>
                @endforeach
            </select>

            <div class="form-actions">
                <button type="button" class="back-button" onclick="confirmBack()">Back</button>
                <input type="submit" value="Add Publication">
            </div>
        </div>

        <div class="form-section">
            <h2>Upload Document</h2>

            <label for="file">Upload File</label>
            <input type="file" id="file" name="file" required>
        </div>
    </div>
</form>
<div>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</div>

                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmBack() {
            if (confirm("Do you want to discard the publication?")) {
                window.location.href = "{{ route('publications.index') }}";
            }
        }
    </script>
</x-platinum-layout>

