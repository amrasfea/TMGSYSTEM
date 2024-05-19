<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Registration') }}
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
        .edit-link, .delete-link input[type="submit"] {
            text-decoration: none;
            color: white;
            background-color: #337ab7;
            padding: 5px 10px;
            border-radius: 3px;
            border: none;
        }
        .delete-link input[type="submit"] {
            background-color: #d9534f;
        }
        .edit-link:hover {
            background-color: #286090;
        }
        .delete-link input[type="submit"]:hover {
            background-color: #c9302c;
        }
    </style>

    <div>
        @if(session()->has('success'))
            <div class="success-message">
                {{ session('success') }}
            </div>
        @endif
    </div>
    <div>
        <div class="create-link">
            <a href="{{ route('platinum.create') }}">Create a Platinum Registration</a>
        </div>
        <table>
            <tr>
                <th>Type Of Registration</th>
                <th>Title</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Education Level</th>
                <th>Phone Number</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach($platinums as $platinum )
                <tr>
                    <td>{{ $platinum->registration_type }}</td>
                    <td>{{ $platinum->title }}</td>
                    <td>{{ $platinum->full_name }}</td>
                    <td>{{ $platinum->gender}}</td>
                    <td>{{ $platinum->edu_level }}</td>
                    <td>{{ $platinum->phone }}</td>
                    <td>
                        <a href="{{route('platinum.edit', ['platinum' => $platinum]) }}" class="edit-link">Edit</a>
                    </td>
                    <td>
                        <form method="post" action="{{route('platinum.destroy', ['platinum' => $platinum])}}" class="delete-link">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" />
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>





