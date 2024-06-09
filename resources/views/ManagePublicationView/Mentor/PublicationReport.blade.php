<!DOCTYPE html>
<html>
<head>
    <title>Publication Report</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <h2>Publication Report</h2>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Title</th>
                <th>Author</th>
                <th>University</th>
                <th>Type</th>
                <th>Date of Publish</th>
            </tr>
        </thead>
        <tbody>
            @foreach($publications as $index => $publication)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $publication->PB_Title }}</td>
                    <td>{{ $publication->PB_Author }}</td>
                    <td>{{ $publication->PB_Uni }}</td>
                    <td>{{ $publication->PB_Type }}</td>
                    <td>{{ $publication->PB_Date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
