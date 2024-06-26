<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Publication') }}
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
        .cancel-btn {
            background-color: #dc3545;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            margin-right: 10px;
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
                    <form action="{{ route('publications.update', $publication->PB_ID) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-container">
                            <div class="form-section">
                                <h2>Publication Information</h2>

                                <label for="type-of-publication">Type of Publication</label>
                                <select id="type-of-publication" name="type-of-publication">
                                    <option value="">Select Type</option>
                                    <option value="Journal" {{ $publication->PB_Type == 'Journal' ? 'selected' : '' }}>Journal</option>
                                    <option value="Conference" {{ $publication->PB_Type == 'Conference' ? 'selected' : '' }}>Conference</option>
                                    <option value="Book" {{ $publication->PB_Type == 'Book' ? 'selected' : '' }}>Book</option>
                                    <option value="Thesis" {{ $publication->PB_Type == 'Thesis' ? 'selected' : '' }}>Thesis</option>
                                    <option value="Report" {{ $publication->PB_Type == 'Report' ? 'selected' : '' }}>Report</option>
                                </select>

                                <label for="title">Publication Title</label>
                                <input type="text" id="title" name="title" value="{{ $publication->PB_Title }}" required>

                                <label for="author">Author</label>
                                <input type="text" id="author" name="author" value="{{ $publication->PB_Author }}" required>

                                <label for="university">University</label>
                                <input type="text" id="university" name="university" value="{{ $publication->PB_Uni }}" required>

                                <label for="field">Field/Course</label>
                                <input type="text" id="field" name="field" value="{{ $publication->PB_Course }}" required>

                                <label for="detail">Description</label>
                                <input type="text" id="detail" name="detail" value="{{ $publication->PB_Detail }}" required>

                                <label for="page-number">Page Number</label>
                                <input type="text" id="page-number" name="page-number" value="{{ $publication->PB_Page }}" required>

                                <label for="date-of-published">Date of Publish</label>
                                <input type="date" id="date-of-published" name="date-of-published" value="{{ $publication->PB_Date }}" required>

                                <div>
                                    <input type="submit" value="Save">
                                    <a href="{{ route('publications.index', $publication->PB_ID) }}" class="cancel-btn">Cancel</a>
                                </div>
                            </div>

                            <div class="form-section">
                                <h2>Upload Document</h2>

                                <label for="file">Upload File</label>
                                <input type="file" id="file" name="file">
                                <p>Current File: <a href="{{ url('storage/' . $publication->file_path) }}" target="_blank">View File</a></p>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
