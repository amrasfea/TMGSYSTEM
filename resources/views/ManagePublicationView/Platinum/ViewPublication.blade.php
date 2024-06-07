<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Publications</title>
    <style>
        .container {
            max-width: 900px;
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

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            font-size: 14px;
            font-weight: bold;
            text-align: center;
            text-decoration: none;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('components.topBar')
    
    <div class="container">
        <h2>All Publications</h2>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Date Published</th>
                    <th>Author</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($publications as $publication)
                    <tr>
                        <td>{{ $publication->PB_Title }}</td>
                        <td>{{ $publication->PB_Date }}</td>
                        <td>{{ $publication->PB_Author }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
