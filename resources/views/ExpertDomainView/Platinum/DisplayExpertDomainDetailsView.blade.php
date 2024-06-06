<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Expert Domain Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <style>
                        .details-container {
                            font-family: Arial, sans-serif;
                            line-height: 1.6;
                            color: #333;
                        }

                        .details-header {
                            background-color: #f8f9fa;
                            padding: 15px;
                            border-bottom: 1px solid #dee2e6;
                            margin-bottom: 20px;
                        }

                        .details-header h1 {
                            font-size: 24px;
                            margin: 0;
                            color: #007bff;
                        }

                        .details-section {
                            display: flex;
                            flex-wrap: wrap;
                            gap: 20px;
                        }

                        .details-section div {
                            flex: 1 1 45%;
                            padding: 10px;
                            background-color: #f9f9f9;
                            border: 1px solid #eaeaea;
                            border-radius: 5px;
                        }

                        .details-section div p {
                            margin: 5px 0;
                        }

                        .details-section div strong {
                            color: #007bff;
                        }
                    </style>

                    <div class="details-container">
                        <div class="details-header">
                            <h1>Expert Domain Details</h1>
                        </div>

                        <div class="details-section">
                            <div>
                                <p><strong>Title:</strong> {{ $expertDomain->E_title }}</p>
                                <p><strong>Full Name:</strong> {{ $expertDomain->ED_Name }}</p>
                                <p><strong>Gender:</strong> {{ $expertDomain->ED_gender }}</p>
                                <p><strong>Current Education Level:</strong> {{ $expertDomain->ED_edu_level }}</p>
                                <p><strong>Education Field:</strong> {{ $expertDomain->ED_edu_field }}</p>
                                <p><strong>Educational Institute:</strong> {{ $expertDomain->ED_Uni }}</p>
                                <p><strong>Occupation:</strong> {{ $expertDomain->ED_occupation }}</p>
                            </div>

                            <div>
                                <p><strong>Study Sponsorship:</strong> {{ $expertDomain->ED_sponsorship }}</p>
                                <p><strong>Address:</strong> {{ $expertDomain->ED_address }}</p>
                                <p><strong>Phone No:</strong> {{ $expertDomain->ED_PhoneNum }}</p>
                                <p><strong>Email:</strong> {{ $expertDomain->ED_Email }}</p>
                                <p><strong>Facebook Name:</strong> {{ $expertDomain->ED_fbname }}</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
