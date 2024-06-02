@php
    $layout = 'platinum-layout'; // Default layout

    if (Auth::user()->roleType === 'Staff') {
        $layout = 'staff-layout';
    } elseif (Auth::user()->roleType === 'Mentor') {
        $layout = 'mentor-layout';
    }
@endphp

<x-dynamic-component :component="$layout">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('List Profile') }}
        </h2>
    </x-slot>

    <div class="container" style="max-width: 900px; margin: 20px auto; padding: 20px; background-color: #f8f9fa; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
       
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roleType }}</td>
                        <td>
                            <a href="{{ route('profile.view', $user->id) }}" class="btn btn-primary">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-dynamic-component>
