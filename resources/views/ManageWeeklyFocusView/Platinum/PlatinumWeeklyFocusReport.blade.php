<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Weekly Focus List</title>
    <style>
        /* Custom CSS for the card */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin: auto;
            margin-top: 50px; /* Adjust as needed */
            max-width: 800px; /* Adjust as needed */
        }

        .card-header {
            background-color: #FFD700;
            color: white;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-title {
            font-size: 24px;
            margin-bottom: 0;
            text-align: center;
        }

        .card-body {
            padding: 20px;
        }

        /* Custom CSS for the table */
        .table {
            border-radius: 15px;
            overflow: hidden;
        }

        .table thead th {
            background-color: #FFD700;
            color: white;
        }

        .table tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .btn-primary {
            background-color: #333;
            border-color: #333;
        }

        .btn-primary:hover {
            background-color: #2f4f4f;
            border-color: #2f4f4f;
        }

        .d-grid {
            text-align: center;
        }
    </style>
</head>
<body>

<x-platinum-layout>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>Weekly Focus List</h1>
            </div>
            <div class="card-body">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Block type</th>
                            <th scope="col">Thesis Title</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($data as $performance)
                        <tr>
                            <td>{{ $performance->FB_WeeklyFocusID }}</td>
                            <td>{{ $performance->FB_BlockType }}</td>
                            <td>{{ $performance->title }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('weeklyFocusView.index', ['FB_WeeklyFocusID' => $performance->FB_WeeklyFocusID]) }}" class="text-green-600 hover:text-green-900 ml-2">View</a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4">No results found</td>
                        </tr>
                        @endforelse

                        <!-- Dummy Data -->
                        <tr>
                            <td>1</td>
                            <td>Focus Block</td>
                            <td>Weekly Focus Title 1</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('weeklyFocusView.index') }}" class="text-green-600 hover:text-green-900 ml-2">View</a>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Social Block</td>
                            <td>Weekly Focus Title 2</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('weeklyFocusView.index') }}" class="text-green-600 hover:text-green-900 ml-2">View</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-grid gap-2 col-6 mx-auto">
                    <a href="/crmpreport" class="btn btn-primary">Generate Report Weekly Focus</a>
                </div>
            </div>
        </div>
    </div>
</x-platinum-layout>

</body>
</html>
