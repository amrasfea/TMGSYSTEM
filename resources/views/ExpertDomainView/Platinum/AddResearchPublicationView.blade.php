<x-platinum-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Research and Publication') }}
        </h2>
    </x-slot>

    <style>
        /* Common styles */
        body {
            font-family: Arial, sans-serif;
        }
        .form-container {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }
        .form-section {
            width: 100%; /* Adjust as needed */
            padding: 20px;
            background-color: #f9f9f9; /* Set the background color */
            margin-bottom: 20px;
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
            color: #000000;
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
                    <form method="post" action="{{ route('researchPublications.store') }}">
                        @csrf
                        @method('post')

                        <div class="form-container">
                            <div class="form-section">
                                <h2>Research Information</h2>

                                <label for="research-title">Research Title:</label>
                                <input type="text" id="research-title" name="R_title" placeholder="Enter the research title">
                            </div>

                            <div class="form-section">
                                <h2>Publication Information</h2>

                                <label for="publication-type">Publication Type:</label>
                                <input type="text" id="publication-type" name="PB_Type" placeholder="Enter the publication type">

                                <label for="publication-title">Publication Title:</label>
                                <input type="text" id="publication-title" name="PB_Title" placeholder="Enter the publication title">

                                <label for="publication-author">Author:</label>
                                <input type="text" id="publication-author" name="PB_Author" placeholder="Enter the author's name">

                                <label for="publication-uni">University:</label>
                                <input type="text" id="publication-uni" name="PB_Uni" placeholder="Enter the university">

                                <label for="publication-course">Course:</label>
                                <input type="text" id="publication-course" name="PB_Course" placeholder="Enter the course">

                                <label for="publication-page">Page:</label>
                                <input type="text" id="publication-page" name="PB_Page" placeholder="Enter the page number">

                                <label for="publication-detail">Detail:</label>
                                <input type="text" id="publication-detail" name="PB_Detail" placeholder="Enter the publication details">

                                <label for="publication-date">Date:</label>
                                <input type="date" id="publication-date" name="PB_Date">
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
