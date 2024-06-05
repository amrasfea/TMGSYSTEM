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
            background-color: #FFDB58;
            color: #000;
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
            color: #fff;
        }
        .error-messages {
            color: red;
            margin-bottom: 20px;
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
                                <input type="text" id="publication-type" name="PB_Type" placeholder="Enter the publication type" aria-label="Publication Type" value="{{ old('PB_Type') }}">

                                <label for="publication-title">Publication Title:</label>
                                <input type="text" id="publication-title" name="PB_Title" placeholder="Enter the publication title" aria-label="Publication Title" value="{{ old('PB_Title') }}">

                                <label for="publication-author">Author:</label>
                                <input type="text" id="publication-author" name="PB_Author" placeholder="Enter the author's name" aria-label="Author" value="{{ old('PB_Author') }}">

                                <label for="publication-uni">University:</label>
                                <input type="text" id="publication-uni" name="PB_Uni" placeholder="Enter the university" aria-label="University" value="{{ old('PB_Uni') }}">

                                <label for="publication-course">Course:</label>
                                <input type="text" id="publication-course" name="PB_Course" placeholder="Enter the course" aria-label="Course" value="{{ old('PB_Course') }}">

                                <label for="publication-page">Page:</label>
                                <input type="number" id="publication-page" name="PB_Page" placeholder="Enter the page number" aria-label="Page Number" value="{{ old('PB_Page') }}">

                                <label for="publication-detail">Detail:</label>
                                <input type="text" id="publication-detail" name="PB_Detail" placeholder="Enter the publication details" aria-label="Publication Details" value="{{ old('PB_Detail') }}">

                                <label for="publication-date">Date:</label>
                                <input type="date" id="publication-date" name="PB_Date" aria-label="Publication Date" value="{{ old('PB_Date') }}">
                            </div>

                            <div>
                                <input type="submit" value="Save">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
