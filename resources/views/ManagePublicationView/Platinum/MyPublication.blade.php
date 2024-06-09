<x-platinum-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Publications') }}
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
                            <a href="{{ route('publications.edit', $publication->PB_ID) }}" class="text-blue-600 hover:text-blue-900">{{ __('Edit') }}</a>
                            <a href="#" class="text-red-600 hover:text-red-900 ml-2" onclick="confirmDelete({{ $publication->PB_ID }})">{{ __('Delete') }}</a>
                            <a href="{{ route('publications.show', ['id' => $publication->PB_ID, 'backUrl' => route('publications.index')]) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('publications.create') }}" class="add-publication-btn">Add New Publication</a>
    </div>

    <script>
        function confirmDelete(id) {
            if(confirm('Are you sure you want to delete this publication?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
    @foreach($publications as $publication)
        <form id="delete-form-{{ $publication->PB_ID }}" action="{{ route('publications.destroy', $publication->PB_ID) }}" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    @endforeach
</x-platinum-layout>

