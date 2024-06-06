@extends('layouts.platinum-layout')

@section('title', 'My Publications')

@section('content')
<div class="container">
    <div class="top-bar">
        <a href="/dashboard" class="dashboard-link">Dashboard</a>
        <span>{{ Auth::check() ? Auth::user()->name : 'Guest' }}</span>
    </div>
    <h2>My Publications</h2>

    <div class="publications">
        @foreach($publications as $publication)
            <div class="publication">
                <div class="title">{{ $publication->PB_Title }}</div>
                <div class="date">{{ $publication->PB_Date }}</div>
                <a href="{{ route('publications.edit', $publication->id) }}" class="edit-btn">Edit</a>
            </div>
        @endforeach

        @if($publications->isEmpty())
            <p>No publications found.</p>
        @endif
    </div>

    <a href="{{ route('publications.create') }}" class="add-publication-btn">Add Publication</a>
</div>
@endsection


