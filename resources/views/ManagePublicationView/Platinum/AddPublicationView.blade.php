<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Publications</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .publication {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .publication:last-child {
            border-bottom: none;
        }

        .btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            border-radius: 4px;
            text-align: center;
            background-color: #007bff;
            color: white;
            text-decoration: none;
        }

        .btn-edit {
            display: inline-block;
            padding: 5px 10px;
            border-radius: 4px;
            background-color: #ffc107;
            color: white;
            text-decoration: none;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    @include('components.topBar')

    <div class="container">
        <h2>My Publications</h2>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @forelse($publications as $publication)
            <div class="publication">
                <h3>{{ $publication->PB_Title }}</h3>
                <p>{{ $publication->PB_Date }}</p>
                <a href="{{ route('publications.edit', $publication->id) }}" class="btn-edit">Edit</a>
            </div>
        @empty
            <p>No publications found.</p>
        @endforelse

        <a href="{{ route('publications.create') }}" class="btn">Add Publication</a>
    </div>
</body>
</html>
