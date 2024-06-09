<x-mentor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Publications Report') }}
        </h2>
    </x-slot>

    <style>
        .report-form {
            margin-top: 20px;
        }

        .report-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .report-form input, .report-form select, .report-form button {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .report-form button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .report-form button:hover {
            background-color: #0056b3;
        }

        .report-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .report-table th, .report-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .report-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .report-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .report-table tbody tr:hover {
            background-color: #ddd;
        }

        .report-table a {
            color: #007bff;
            text-decoration: none;
        }

        .report-table a:hover {
            color: #0056b3;
        }
    </style>

    <div class="container report-form">
        <form method="GET" action="{{ route('mentor.generatePublicationReport') }}">
            <div>
                <label for="title">{{ __('Title') }}</label>
                <input type="text" id="title" name="title" value="{{ request('title') }}">
            </div>
            <div>
                <label for="author">{{ __('Author') }}</label>
                <input type="text" id="author" name="author" value="{{ request('author') }}">
            </div>
            <div>
                <label for="university">{{ __('University') }}</label>
                <input type="text" id="university" name="university" value="{{ request('university') }}">
            </div>
            <div>
                <button type="submit">{{ __('Generate Report') }}</button>
            </div>
        </form>

        @if(isset($publications) && $publications->isNotEmpty())
            <table class="report-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Title</th>
                        <th>Author</th>
                        <th>University</th>
                        <th>Type</th>
                        <th>Date of Publish</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publications as $index => $publication)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $publication->PB_Title }}</td>
                            <td>{{ $publication->PB_Author }}</td>
                            <td>{{ $publication->PB_Uni }}</td>
                            <td>{{ $publication->PB_Type }}</td>
                            <td>{{ $publication->PB_Date }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-mentor-layout>

