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

                <!-- <div>
                    @if(session()->has('success'))
                        <div class="success-message">
                            {{ session('success') }}
                        </div>
                    @endif
                </div> -->

                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">{{ __('Research & Publications') }}</h1>
                    </div>

                    <!-- Search Form -->
                    <!-- <form method="GET" action="#" class="mb-4">
                        <input type="text" name="search" placeholder="Search by name" class="border rounded py-2 px-4" value="{{ request('search') }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                    </form> -->

                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead>
                        <tr>
                                <th>No</th>
                                <th>Name</th>
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
                                    <td class="py-2 px-4">{{ $expertDomain->research->R_title }}</td> 
                                    <td class="py-2 px-4">{{ $expertDomain->publications->PB_Title }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ route('expertDomains.edit', ['id' => $expertDomain->ED_ID]) }}" class="text-blue-600 hover:text-blue-900">{{ __('Edit') }}</a>
                                        <a href="{{ route('researchPublications.display', ['ED_ID' => $expertDomain->ED_ID]) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                                        <form action="{{ route('researchPublications.destroy', ['ED_ID' => $expertDomain->ED_ID, 'id' => $research->id]) }}" method="POST" class="inline delete-form">
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



</x-platinum-layout>
