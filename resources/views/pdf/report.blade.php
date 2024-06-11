<!DOCTYPE html>
<html>
<head>
    <!-- Title of the document -->
    <title>Users Report</title>
    <!-- Internal CSS for styling the document -->
    <style>
        /* Style for the body of the document */
        body {
            font-family: Arial, sans-serif;
        }
        /* Style for the table */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        /* Style for the table header and cells */
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        /* Style for the table header */
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <!-- Main heading of the document -->
    <h1>Users Report</h1>
    <!-- Table to display the user information -->
    <table>
        <!-- Table header -->
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Batch</th>
                <th>University</th>
            </tr>
        </thead>
        <!-- Table body -->
        <tbody>
            <!-- Loop through each user and create a table row -->
            @foreach ($users as $user)
                <tr>
                    <!-- Display user's name -->
                    <td>{{ $user->name }}</td>
                    <!-- Display user's email -->
                    <td>{{ $user->email }}</td>
                    <!-- Display user's role type -->
                    <td>{{ $user->roleType }}</td>
                    <!-- Display user's batch -->
                    <td>{{ $user->P_batch }}</td>
                    <!-- Display user's university -->
                    <td>{{ $user->P_edu_institute }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Display the total number of users -->
    <p>Total Users: {{ $users->count() }}</p>
</body>
</html>
