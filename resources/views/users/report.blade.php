<x-staff-layout>
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Report') }}
    </h2>
</x-slot>

<style>
    .success-message {
        background-color: #dff0d8;
        color: #3c763d;
        padding: 10px;
        border: 1px solid #d6e9c6;
        margin-bottom: 20px;
    }
</style>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <div>
                    @if(session()->has('success'))
                        <div class="success-message">
                            {{ session('success') }}
                        </div>
                    @endif
                </div>

                <div class="container mx-auto px-4">
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">{{ __('Users') }}</h1>
                        <a href="{{ route('register') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            {{ __('Generate Report') }}
                        </a>
                    </div>

                    <!-- Search Form -->
                    <form method="GET" action="{{ route('users.report') }}" class="mb-4 flex">
                        <input type="text" name="batch" placeholder="Batch" class="border rounded py-2 px-4 mr-2" value="{{ request('batch') }}">
                        <input type="text" name="university" placeholder="University" class="border rounded py-2 px-4 mr-2" value="{{ request('university') }}">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Search</button>
                    </form>

                    <table class="min-w-full bg-white rounded-lg overflow-hidden">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="py-2 px-4">{{ __('Name') }}</th>
                                <th class="py-2 px-4">{{ __('Email') }}</th>
                                <th class="py-2 px-4">{{ __('User Type') }}</th>
                                <th class="py-2 px-4">{{ __('Batch') }}</th>
                                <th class="py-2 px-4">{{ __('University') }}</th>
                                <th class="py-2 px-4">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="py-2 px-4">{{ $user->name }}</td>
                                    <td class="py-2 px-4">{{ $user->email }}</td>
                                    <td class="py-2 px-4">{{ $user->roleType }}</td>
                                    <td class="py-2 px-4">{{ $user->P_batch }}</td> <!-- Assuming 'P_batch' is a field in your User model -->
                                    <td class="py-2 px-4">{{ $user->P_edu_institute }}</td> <!-- Assuming 'P_edu_institute' is a field in your User model -->
                                    <td class="py-2 px-4">
                                        <a href="{{ route('users.edit', $user) }}" class="text-blue-600 hover:text-blue-900">{{ __('Edit') }}</a>
                                        <a href="{{ route('users.show', $user) }}" class="text-green-600 hover:text-green-900 ml-2">{{ __('View') }}</a>
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" class="inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 ml-2">{{ __('Delete') }}</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Pagination Links -->
                    <div class="mt-4">
                        {{ $users->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteForms = document.querySelectorAll('.delete-form');
        deleteForms.forEach(function (form) {
            form.addEventListener('submit', function (event) {
                var confirmed = confirm('Are you sure you want to delete this user?');
                if (!confirmed) {
                    event.preventDefault();
                }
            });
        });
    });
</script>
</x-staff-layout>
