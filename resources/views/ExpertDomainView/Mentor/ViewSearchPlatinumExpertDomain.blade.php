<x-mentor-layout>
<x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List of All Expert Domains') }}
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

                    .yellow-row {
                    background-color: #FFDB58; /* Light yellow color */
                    }
                </style>

                @if(session('success'))
                    <div class="success-message">
                        {{ session('success') }}
                    </div>
                @endif 

                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">{{ __('Users') }}</h1>
                    </div>

                    <!-- Search Form -->
                    <form method="GET" action="{{ route('expertDomains.listAll') }}" class="mb-4">
                        <input type="text" name="search" placeholder="Search by name" class="border rounded py-2 px-4" value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                    </form>

                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr class="yellow-row">
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
                                    <td class="py-2 px-4">{{ $expertDomain->ED_PhoneNum }}</td> 
                                    <td class="py-2 px-4">
                                    <a href="{{ route('expertDomains.view', $expertDomain->ED_ID) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
</x-mentor/layout>