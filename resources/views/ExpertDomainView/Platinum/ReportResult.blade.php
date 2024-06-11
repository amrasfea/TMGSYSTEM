<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Result Expertise') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-4">Report Details</h3>
                    <p><strong>Report Type:</strong> {{ $data['report_type'] }}</p>
                    <p><strong>Report Date:</strong> {{ $data['report_date'] }}</p>
                    <p><strong>Expertise:</strong> {{ $data['expertise'] }}</p>

                    <h3 class="text-lg font-semibold mt-6 mb-4">Expert Domains</h3>
                    @if($expertDomains->isEmpty())
                        <p>No experts found for the selected expertise.</p>
                    @else
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Gender
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Education Level
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Educational Institute
                                    </th>
                                    <th class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Occupation
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($expertDomains as $expert)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $expert->ED_Name }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $expert->ED_gender }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $expert->ED_edu_level }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $expert->ED_Uni }}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $expert->ED_occupation }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
