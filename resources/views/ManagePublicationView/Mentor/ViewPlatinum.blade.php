<x-mentor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Platinum Publications') }}
        </h2>
    </x-slot>

    <style>
        html, body {
            height: 100%;
            overflow: auto;
        }

        .platinum-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .platinum-table th, .platinum-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .platinum-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .platinum-table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .platinum-table tbody tr:hover {
            background-color: #ddd;
        }

        .platinum-table a {
            color: #007bff;
            text-decoration: none;
        }

        .platinum-table a:hover {
            color: #0056b3;
        }

        .container {
            overflow: auto;
            max-height: 100vh; /* Ensure the container can scroll */
        }
    </style>

    <div class="container">
        <table class="platinum-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Date of Publish</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($platinums as $index => $platinum)
                    @foreach($platinum->publications as $publication)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $publication->PB_Title }}</td>
                            <td>{{ $publication->PB_Type }}</td>
                            <td>{{ $publication->PB_Date }}</td>
                            <td>
                                <a href="{{ route('mentor.viewPlatinumPublications', $platinum->id) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View Publications') }}</a>
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</x-mentor-layout>

