<x-mentor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Generate Publications Report') }}
        </h2>
    </x-slot>

    <style>
        .report-form {
            margin-top: 20px;
        }

        .report-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        .report-form input, .report-form select, .report-form button {
            width: 100%;
            padding: 8px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .report-form button {
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }

        .report-form button:hover {
            background-color: #0056b3;
        }
    </style>

    <div class="container report-form">
        <form method="GET" action="{{ route('mentor.generatePublicationReport') }}">
            <div>
                <label for="start_date">{{ __('Start Date') }}</label>
                <input type="date" id="start_date" name="start_date" value="{{ request('start_date') }}">
            </div>
            <div>
                <label for="end_date">{{ __('End Date') }}</label>
                <input type="date" id="end_date" name="end_date" value="{{ request('end_date') }}">
            </div>
            <div>
                <button type="submit">{{ __('Generate Report') }}</button>
            </div>
        </form>

        @if(isset($publications) && $publications->isNotEmpty())
            <!-- Display the report table here -->
        @endif
    </div>
</x-mentor-layout>
