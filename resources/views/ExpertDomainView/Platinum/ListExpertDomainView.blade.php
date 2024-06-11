<x-platinum-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of My Expert Domains') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                
                <!-- <style>
                    .yellow-row {
                    background-color: #FFDB58; /* Light yellow color */
                    }
                </style> -->

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

                <!-- <h1 class="text-2xl font-bold">{{ __('Users') }}</h1> -->

                
                <!-- <form method="GET" action="{{ route('expertDomains.list') }}" class="mb-4">
                        <input type="text" name="search" placeholder="Search by name" class="border rounded py-2 px-4" value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                    </form>
                
                @if(session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif -->

                <!-- <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>View</th>
                            <th>Update</th>
                            <th>Add Research and Publication</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($expertDomains as $index => $expertDomain)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $expertDomain->ED_Name }}</td>
                            <td><a class="view-link" href="{{ route('expertDomains.view', $expertDomain->ED_ID) }}">View</a></td>
                            <td><a class="edit-link" href="{{ route('expertDomains.edit', $expertDomain->ED_ID) }}">Update</a></td>
                            <td><a class="edit-link" href="{{ route('researchPublications.add', $expertDomain->ED_ID) }}">Add</a></td>
                            <td>
                                <form class="delete-link" action="{{ route('expertDomains.destroy', $expertDomain->ED_ID) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" value="Delete">
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table> -->
                <!-- sofea -->
                <!-- <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">{{ __('No') }}</th>
                                <th class="py-2 px-4">{{ __('Name') }}</th>
                                <th class="py-2 px-4">{{ __('Email') }}</th>
                                <th class="py-2 px-4">{{ __('Phone Number') }}</th>
                                <th class="py-2 px-4">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($expertDomains as $index => $expertDomain)                            
                                <tr>
                                    <td class="py-2 px-4">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4">{{ $expertDomain->ED_Name }}</td>
                                    <td class="py-2 px-4">{{ $expertDomain->ED_Email }}</td>
                                    <td class="py-2 px-4">{{ $expertDomain->ED_PhoneNum }}</td> Assuming 'phone' is a field in your User model -->
                                    <!-- <td class="py-2 px-4">
                                        <a href="{{ route('researchPublications.add', $expertDomain->ED_ID) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('Add Publication') }}</a>
                                        <a href="{{ route('expertDomains.edit', $expertDomain->ED_ID) }}" class="text-blue-600 hover:text-blue-900">{{ __('Edit') }}</a>
                                        <a href="{{ route('expertDomains.view', $expertDomain->ED_ID) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                                        <form action="{{ route('expertDomains.destroy', $expertDomain->ED_ID) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table> -->
                    <!-- start sini -->

                <div>
                    @if(session()->has('success'))
                        <div class="success-message">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">{{ __('Users') }}</h1>
                        <a href="{{ route('expertDomains.add') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Add New Expert') }}
                        </a>
                    </div>

                    
                    <form method="GET" action="{{ route('expertDomains.list') }}" class="mb-4">
                        <input type="text" name="search" placeholder="Search by name" class="border rounded py-2 px-4" value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                    </form>

                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($expertDomains as $index => $expertDomain)                             
                                <tr>
                                <td class="py-2 px-4">{{ $index + 1 }}</td>
                                    <td class="py-2 px-4">{{ $expertDomain->ED_Name }}</td>
                                    <td class="py-2 px-4">{{ $expertDomain->ED_Email }}</td>
                                    <td class="py-2 px-4">{{ $expertDomain->ED_PhoneNum }}</td> 
                                    <td class="py-2 px-4">
                                        <a href="{{ route('researchPublications.add', $expertDomain->ED_ID) }}" class="text-yellow-600 hover:text-yellow-300">{{ __('Add Research') }}</a>
                                        <a href="{{ route('expertDomains.edit', $expertDomain->ED_ID) }}" class="text-blue-600 hover:text-blue-900">{{ __('Edit') }}</a>
                                        <a href="{{ route('expertDomains.view', $expertDomain->ED_ID) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                                        <form action="{{ route('expertDomains.destroy', $expertDomain->ED_ID) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</x-platinum-layout>