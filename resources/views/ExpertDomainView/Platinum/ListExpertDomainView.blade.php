<x-platinum-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Expert Domains') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                <style>
                    body {
                        font-family: Arial, sans-serif;
                        margin: 20px;
                    }
                    h1 {
                        color: #333;
                    }
                    .success-message {
                        background-color: #dff0d8;
                        color: #3c763d;
                        padding: 10px;
                        border: 1px solid #d6e9c6;
                        margin-bottom: 20px;
                    }
                    .create-link {
                        margin-bottom: 20px;
                    }
                    .create-link a {
                        text-decoration: none;
                        color: black;
                        background-color: #FFDB58;
                        padding: 10px 15px;
                        border-radius: 5px;
                    }
                    .create-link a:hover {
                        background-color: #4cae4c;
                    }
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        margin-bottom: 20px;
                    }
                    th, td {
                        border: 1px solid #ddd;
                        padding: 8px;
                        text-align: left;
                    }
                    th {
                        background-color: #f2f2f2;
                    }
                    tr:nth-child(even) {
                        background-color: #f9f9f9;
                    }
                    tr:hover {
                        background-color: #f1f1f1;
                    }
                    .view-link, .edit-link, .delete-link input[type="submit"] {
                        text-decoration: none;
                        color: white;
                        background-color: #337ab7;
                        padding: 5px 10px;
                        border-radius: 3px;
                        border: none;
                    }
                    .view-link:hover, .edit-link:hover {
                        background-color: #286090;
                    }
                    .delete-link input[type="submit"] {
                        background-color: #d9534f;
                    }
                    .delete-link input[type="submit"]:hover {
                        background-color: #c9302c;
                    }
                </style>

                <h1>List of Expert Domains</h1>

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>View</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($expertDomains as $index => $expertDomain)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $expertDomain->name }}</td>
                            <td><a class="view-link" href="#">View</a></td>
                            <td><a class="edit-link" href="{{ route('expertDomains.edit', $expertDomain->id) }}">Update</a></td>
                            <td>
                                <form class="delete-link" action="{{ route('expertDomains.destroy', $expertDomain->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

</x-platinum-layout>