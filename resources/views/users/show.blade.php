@extends('layouts.staff')

@section('content')
    <div class="container mx-auto px-4">
        <div class="py-6">
            <h1 class="text-2xl font-bold">{{ __('User Details') }}</h1>
            <div class="mt-4">
                <p><span class="font-semibold">Name:</span> {{ $user->name }}</p>
                <p><span class="font-semibold">Email:</span> {{ $user->email }}</p>
                <p><span class="font-semibold">User Type:</span> {{ $user->roleType }}</p>
                <p><span class="font-semibold">Phone Number:</span> {{ $user->P_phone }}</p>
                <!-- Add more fields as needed -->
            </div>
        </div>
    </div>
@endsection
