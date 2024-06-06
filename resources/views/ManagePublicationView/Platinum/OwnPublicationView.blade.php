<x-platinum-layout>

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
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            background-color: #343a40;
            color: #ffffff;
        }

        .top-bar .dashboard-link {
            color: #ffffff;
            text-decoration: none;
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
</head>
<body>
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
</body>
</html>
</x-platinum-layout>
