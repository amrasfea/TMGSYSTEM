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
        .publication {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
        .publication-title {
            font-size: 18px;
            font-weight: bold;
        }
        .publication-date {
            font-size: 14px;
            color: #666;
        }
        .actions {
            margin-top: 10px;
        }
    </style>
</head>
<body>

@include('components.topBar')

<div class="container">
    <h1>My Publications</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif
    @foreach($publications as $publication)
        <div class="publication">
            <div class="publication-title">{{ $publication->PB_Title }}</div>
            <div class="publication-date">Published on: {{ $publication->PB_Date }}</div>
            <div class="actions">
                <a href="{{ route('platinum.editPublication', $publication->PB_ID) }}">Edit</a>
            </div>
        </div>
    @endforeach
    <div class="actions">
        <a href="{{ route('platinum.createPublication') }}">Add Publication</a>
    </div>
</div>

</body>
</html>
