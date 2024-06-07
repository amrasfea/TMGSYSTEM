<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publication Details') }}
        </h2>
    </x-slot>

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .publication-details {
            margin-bottom: 20px;
        }

        .publication-details table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .publication-details th, .publication-details td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .publication-details th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
        }

        .btn-container button {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .btn-container .edit-btn {
            background-color: #007bff;
            color: #ffffff;
        }

        .btn-container .delete-btn {
            background-color: #dc3545;
            color: #ffffff;
        }

        .btn-container .back-btn {
            background-color: #6c757d;
            color: #ffffff;
        }
    </style>

    <div class="container">
        <h2>Publication Details</h2>

        <div class="publication-details">
            <table>
                <tr>
                    <th>Type</th>
                    <td>{{ $publication->PB_Type }}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{ $publication->PB_Title }}</td>
                </tr>
                <tr>
                    <th>Author</th>
                    <td>{{ $publication->PB_Author }}</td>
                </tr>
                <tr>
                    <th>University</th>
                    <td>{{ $publication->PB_Uni }}</td>
                </tr>
                <tr>
                    <th>Field/Course</th>
                    <td>{{ $publication->PB_Course }}</td>
                </tr>
                <tr>
                    <th>Page Number</th>
                    <td>{{ $publication->PB_Page }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $publication->PB_Detail }}</td>
                </tr>
                <tr>
                    <th>Date of Publish</th>
                    <td>{{ $publication->PB_Date }}</td>
                </tr>
                <tr>
                    <th>File</th>
                    <td><a href="{{ Storage::url($publication->file_path) }}" target="_blank">View File</a></td>
                </tr>
            </table>
        </div>

        <div class="btn-container">
            <form action="{{ route('publications.destroy', $publication->PB_ID) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this publication?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-btn">Delete</button>
            </form>
            <a href="{{ route('publications.edit', $publication->PB_ID) }}" class="edit-btn">Edit</a>
            <a href="{{ route('publications.index') }}" class="back-btn">Back</a>
        </div>
    </div>
</x-platinum-layout>
