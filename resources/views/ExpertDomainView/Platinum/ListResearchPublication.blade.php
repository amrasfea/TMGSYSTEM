<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of Research & Publication') }}
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

                    .yellow-row {
                    background-color: #FFDB58; Light yellow color
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
                </style>
                    <div class="container mx-auto px-4">
                        <div class="flex justify-between items-center mb-4">
                            <h1 class="text-2xl font-bold">{{ __('Research & Publications') }}</h1>
                        </div>
                        <!-- search form -->
                    <form method="GET" action="{{ route('researchPublications.list') }}" class="mb-4">
                        <input type="text" name="search" placeholder="Search by name" class="border rounded py-2 px-4" value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                    </form>
                        <table class="min-w-full bg-white rounded-lg overflow-hidden">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Expert Domain Name</th>
                                    <th>Research Field</th>
                                    <th>Publication Title</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach ($expertDomains as $index => $expertDomain)                             
                                    <tr>
                                        <td class="py-2 px-4">{{ $index + 1 }}</td>
                                        <td class="py-2 px-4">{{ $expertDomain->ED_Name }}</td>
                                        <td class="py-2 px-4">{{ $expertDomain->research->R_title ?? 'N/A' }}</td> 
                                        <td class="py-2 px-4">{{ $expertDomain->publications->first()->PB_Title ?? 'N/A' }}</td>
                                        <td class="py-2 px-4">
                                            <a href="#" class="text-blue-600 hover:text-blue-900">{{ __('Edit') }}</a>
                                            <a href="{{ route('researchPublications.display', ['ED_ID' => $expertDomain->ED_ID]) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                                            <form action="{{ route('researchPublications.destroy', ['ED_ID' => $expertDomain->ED_ID, 'id' => $expertDomain->research->R_ID ?? 0]) }}" method="POST" class="inline delete-form">
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
