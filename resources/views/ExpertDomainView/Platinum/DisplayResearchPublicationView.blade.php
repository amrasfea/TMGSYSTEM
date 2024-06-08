<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Research and Publication Details') }}
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
                            <h1>Research and Publication Details</h1>
                        </div>

                        <div class="details-section">
                            <div>
                                <p><strong>Research Title:</strong> {{ $research->R_title }}</p>
                            </div>

                            <div>
                                <p><strong>Publication Type:</strong> {{ $publication->PB_Type }}</p>
                                <p><strong>Publication Title:</strong> {{ $publication->PB_Title }}</p>
                                <p><strong>Author:</strong> {{ $publication->PB_Author }}</p>
                                <p><strong>University:</strong> {{ $publication->PB_Uni }}</p>
                                <p><strong>Course:</strong> {{ $publication->PB_Course }}</p>
                                <p><strong>Page:</strong> {{ $publication->PB_Page }}</p>
                                <p><strong>Detail:</strong> {{ $publication->PB_Detail }}</p>
                                <p><strong>Date of Publication:</strong> {{ $publication->PB_Date }}</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>
