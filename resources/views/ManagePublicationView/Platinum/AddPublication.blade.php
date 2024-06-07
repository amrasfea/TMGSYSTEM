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
            float: right;
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
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        @endif
                    </div>
                    <form method="post" action="{{ route('publications.store') }}">
                        @csrf
                        @method('post')

                        <div class="form-container">
                            <div class="form-section">
                                <h2>Publication Information</h2>

                                <label for="PB_Type">Type of Publication</label>
                                <select id="PB_Type" name="type-of-publication">
                                    <option value="">Select Type</option>
                                    <option value="Journal">Journal</option>
                                    <option value="Conference">Conference</option>
                                    <option value="Book">Book</option>
                                    <option value="Thesis">Thesis</option>
                                    <option value="Report">Report</option>
                                </select>

                                <label for="PB_Title">Publication Title</label>
                                <input type="text" id="PB_Title" name="title" required>

                                <label for="PB_Author">Author</label>
                                <input type="text" id="PB_Author" name="author" required>

                                <label for="PB_Uni">University</label>
                                <input type="text" id="PB_Uni" name="university" required>

                                <label for="PB_Course">Field/Course</label>
                                <input type="text" id="PB_Course" name="field" required>

                                <label for="PB_Detail">Description</label>
                                <input type="text" id="PB_Detail" name="description" required>

                                <label for="PB_Page">Page Number</label>
                                <input type="text" id="PB_Page" name="pagenumber" required>

                                <label for="PB_Date">Date of Publish</label>
                                <input type="date" id="PB_Date" name="date-of-published" required>

                                <div>
                                    <input type="submit" value="Add Publication">
                                </div>
                            </div>

                            <div class="form-section">
                                <h2>Upload Document</h2>

                                <label for="file_path">Upload File</label>
                                <input type="file" id="file_path" name="file" accept=".pdf,.doc,.docx" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
