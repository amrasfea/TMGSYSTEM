<x-mentor-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Platinum Publications') }}
        </h2>
    </x-slot>

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }

        .publications-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .publications-table th, .publications-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        .publications-table th {
            background-color: #f2f2f2;
            text-align: left;
        }

        .add-publication-btn {
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin-top: 20px;
            display: inline-block;
        }

        .back-btn {
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 4px;
            margin-top: 20px;
            display: inline-block;
            margin-bottom: 20px;
        }
    </style>

    <div class="container">
        <table class="publications-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Type</th>
                    <th>Title</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($publications as $index => $publication)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $publication->PB_Type }}</td>
                        <td>{{ $publication->PB_Title }}</td>
                        <td>
                            <a href="{{ route('mentor.viewPublicationDetails', $publication->PB_ID) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('mentor.viewPlatinumList', $publication->P_platinumID) }}" class="back-btn">Back</a>
    </div>
</x-mentor-layout>
