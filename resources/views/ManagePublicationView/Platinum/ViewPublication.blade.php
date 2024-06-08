<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Publications') }}
        </h2>
    </x-slot>

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .publications-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .publications-table th, .publications-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .publications-table th {
            background-color: #f2f2f2;
            text-align: left;
        }
    </style>

    <div class="container">
        <table class="publications-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>User ID</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>University</th>
                    <th>Field</th>
                    <th>File</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($publications as $index => $publication)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $publication->user->id }}</td>
                        <td>{{ $publication->PB_Type }}</td>
                        <td>{{ $publication->PB_Title }}</td>
                        <td>{{ $publication->PB_Author }}</td>
                        <td>{{ $publication->PB_Uni }}</td>
                        <td>{{ $publication->PB_Course }}</td>
                        <td><a href="{{ url('storage/' . $publication->file_path) }}" target="_blank">View File</a></td>
                        <td>
                            <a href="{{ route('publications.show', $publication->PB_ID) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-platinum-layout>

