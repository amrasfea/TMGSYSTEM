
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
                                <select id="type-of-publication" name="type-of-publication">
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
                                <input type="text" id="university" name="university" required>

                                <label for="field">Field/Course</label>
                                <input type="text" id="field" name="field" required>

                                <label for="detail">Description</label>
                                <input type="text" id="detail" name="detail" required>

                                <label for="page-number">Page Number</label>
                                <input type="text" id="page-number" name="page-number" required>

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
                                <input type="file" id="file" name="file">
                            </div>

                            <div class="form-section">
                                <h2>Mentor Information</h2>
                                <label for="mentor-id">Mentor ID</label>
                                <input type="text" id="mentor-id" name="mentor-id" required>
                        </div>
                    </form>
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
