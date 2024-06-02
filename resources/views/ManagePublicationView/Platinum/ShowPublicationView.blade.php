<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $publication->PB_Title }}</title>
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f8f9fa;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .abstract, .description {
            margin-top: 20px;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn-back {
            margin-top: 20px;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>{{ $publication->PB_Title }}</h2>
            <p>Published on {{ $publication->PB_Date }}</p>
            <p>Author: {{ $publication->PB_Author }}</p>
        </div>
        <div class="abstract">
            <h3>Abstract</h3>
            <p>{{ $publication->PB_Course }}</p>
        </div>
        <div class="description">
            <h3>Description</h3>
            <p>{{ $publication->PB_Detail }}</p>
        </div>
        <div class="files">
            @if ($publication->file_path)
                <a class="btn" href="{{ asset('storage/' . $publication->file_path) }}" target="_blank">Download full-text PDF</a>
            @endif
        </div>
        <div class="btn-back">
            <a class="btn" href="{{ route('publications.index') }}">Back</a>
        </div>
    </div>
</body>
</html>

