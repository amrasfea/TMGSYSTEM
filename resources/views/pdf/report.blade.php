<!DOCTYPE html>
<html>
<head>
    <title>Users Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Users Report</h1>
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Batch</th>
                <th>University</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->roleType }}</td>
                    <td>{{ $user->P_batch }}</td>
                    <td>{{ $user->P_edu_institute }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <p>Total Users: {{ $users->count() }}</p>
</body>
</html>

