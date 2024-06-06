<!-- resources/views/expert/show.blade.php -->

<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expert Information') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>{{ $expert->ED_Name }}</h2>
                    <p><strong>Title:</strong> {{ $expert->E_title }}</p>
                    <p><strong>Full Name:</strong> {{ $expert->ED_Name }}</p>
                    <p><strong>Gender:</strong> {{ $expert->ED_gender }}</p>
                    <p><strong>Education Level:</strong> {{ $expert->ED_edu_level }}</p>
                    <p><strong>Education Field:</strong> {{ $expert->ED_edu_field }}</p>
                    <p><strong>Educational Institute:</strong> {{ $expert->ED_Uni }}</p>
                    <p><strong>Occupation:</strong> {{ $expert->ED_occupation }}</p>
                    <p><strong>Sponsorship:</strong> {{ $expert->ED_sponsorship }}</p>
                    <p><strong>Address:</strong> {{ $expert->ED_address }}</p>
                    <p><strong>Phone No:</strong> {{ $expert->ED_PhoneNum }}</p>
                    <p><strong>Email:</strong> {{ $expert->ED_Email }}</p>
                    <p><strong>Facebook Name:</strong> {{ $expert->ED_fbname }}</p>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
