<x-platinum-layout>

    <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Report') }}
            </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('platinum.reportResult') }}">
                        @csrf
                        <div class="mb-4">
                            <label for="report_type" class="block text-gray-700 text-sm font-bold mb-2">Select Report Type:</label>
                            <select name="report_type" id="report_type" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                <option value="summary">Summary Report</option>
                                <option value="detailed">Detailed Report</option>
                                <option value="custom">Custom Report</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="report_date" class="block text-gray-700 text-sm font-bold mb-2">Select Date:</label>
                            <input type="date" name="report_date" id="report_date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        </div>

                        <div class="mb-4">
                            <button type="submit" style="background-color: #0062cc; color: white; font-weight: bold; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer;">
                                Generate
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-platinum-layout>