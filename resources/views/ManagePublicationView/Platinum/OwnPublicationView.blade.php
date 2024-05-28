<x-platinum-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Publications</title>
    <style>
        .container {
            padding: 20px;
        }
        .publication-list {
            display: flex;
            flex-direction: column;
        }
        .publication-item {
            padding: 10px;
            border-bottom: 1px solid #ccc;
            margin-bottom: 10px;
        }
        .publication-item a {
            color: #007bff;
            text-decoration: none;
        }
        .publication-item .edit-button {
            margin-top: 10px;
        }
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #f8f9fa;
            border-bottom: 1px solid #dee2e6;
        }
        .top-bar .user-info {
            display: flex;
            align-items: center;
        }
        .top-bar .user-info span {
            margin-left: 10px;
        }
        .add-publication-button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<!-- Include the top bar -->
@include('components.topBar')

<div class="container">
    <div class="top-bar">
        <a href="{{ route('dashboard') }}">Dashboard</a>
        <div class="user-info">
            <span>{{ Auth::user()->name }}</span>
        </div>
    </div>

    <h1>My Publications</h1>
    @if(session('success'))
        <div class="message success">{{ session('success') }}</div>
    @endif
    <div class="publication-list">
        @foreach($publications as $publication)
            <div class="publication-item">
                <h2>{{ $publication->title }}</h2>
                <p><strong>Published Date:</strong> {{ $publication->date_of_published }}</p>
                <a href="{{ route('platinum.editPublication', $publication->id) }}" class="edit-button">Edit</a>
            </div>
        @endforeach
    </div>

    <a href="{{ route('platinum.addPublication') }}" class="add-publication-button">Add Publication</a>
</div>

</body>
</html>
</x-platinum-layout>
