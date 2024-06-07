<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Publications') }}
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

        .edit-btn {
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .view-btn {
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 4px;
        }

        .add-publication-btn {
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
            display: inline-block;
        }
    </style>

    <div class="container">
        <h2>My Publications</h2>

        @if($publications->isEmpty())
            <p>No publications found.</p>
        @else
            <table class="publications-table">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Type</th>
                        <th>Title</th>
                        <th>File</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($publications as $index => $publication)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $publication->PB_Type }}</td>
                            <td>{{ $publication->PB_Title }}</td>
                            <td><a href="{{ Storage::url($publication->file_path) }}" target="_blank">View File</a></td>
                            <td>
                                <a href="{{ route('publications.show', $publication->PB_ID) }}" class="view-btn">View</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <a href="{{ route('publications.create') }}" class="add-publication-btn">Add New Publication</a>
    </div>
</x-platinum-layout>
