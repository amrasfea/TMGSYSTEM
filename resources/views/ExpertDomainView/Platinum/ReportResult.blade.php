<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Result') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Report Details</h3>
                    <p><strong>Report Type:</strong> {{ $data['report_type'] }}</p>
                    <p><strong>Report Date:</strong> {{ $data['report_date'] }}</p>

                    <!-- You can add more details and the actual report content here -->
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
