<x-mentor-layout>
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

        .publication-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .publication-table th, .publication-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .publication-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .back-btn {
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 4px;
            margin-top: 20px;
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <table class="publication-table">
            <tbody>
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
                    <th>Date of Publish</th>
                    <td>{{ $publication->PB_Date }}</td>
                </tr>
                <tr>
                    <th>Detail</th>
                    <td>{{ $publication->PB_Detail }}</td>
                </tr>
                <tr>
                    <th>File</th>
                    <td><a href="{{ url('storage/' . $publication->file_path) }}" target="_blank" class="text-green-600 hover:text-green-900 ml-2">View File</a></td>
                </tr>
            </tbody>
        </table>

        <a href="{{ route('mentor.viewPlatinumPublications', $publication->P_platinumID) }}" class="back-btn">Back</a>
    </div>
</x-mentor-layout>
