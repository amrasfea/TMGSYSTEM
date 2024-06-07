<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Publication') }}
        </h2>
    </x-slot>

    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }


        .publications {
            margin-top: 20px;
        }

        .publication {
            padding: 15px;
            margin-bottom: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }

        .publication .title {
            font-weight: bold;
        }

        .publication .date {
            font-size: 0.9em;
            color: #6c757d;
        }

        .publication .edit-btn {
            display: inline-block;
            margin-top: 10px;
            padding: 5px 10px;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
        }

        .add-publication-btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: #ffffff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
    </style>


    <div class="container">
        
        <div class="publications">
            @forelse($publications as $publication)
                <div class="publication">
                    <div class="title">{{ $publication->PB_Title }}</div>
                    <div class="date">{{ $publication->PB_Date }}</div>
                    <a href="{{ route('publications.edit', $publication->id) }}" class="edit-btn">Edit</a>
                </div>
            @empty
                <p>No publications found.</p>
            @endforelse
        </div>

        <a href="{{ route('publications.create') }}" class="add-publication-btn">Add Publication</a>
    </div>

</x-platinum-layout>
