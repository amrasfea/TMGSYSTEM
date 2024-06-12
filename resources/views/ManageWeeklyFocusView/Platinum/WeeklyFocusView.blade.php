<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Weekly Focus</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
            transition: all 0.3s ease;
        }
        main {
            padding: 20px;
        }
        h1, h2 {
            margin-top: 0;
            font-weight: 700;
            color: #333;
            text-align: center;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 15px;
            border-bottom: 1px solid #eee;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
            color: #555;
            text-transform: uppercase;
        }
        .btn {
            margin-right: 10px;
            border-radius: 5px;
            transition: all 0.3s ease;
        }
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>

<x-platinum-layout>
    <main>
        <h1>Weekly Focus</h1>
        <div class="view-container">
            <h2>Focus Blocks</h2>

            <form action="{{ route('Platinum.report') }}" method="GET" style="display: inline;">
                <button type="submit" class="btn btn-primary">Report</button>
            </form>

            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr class="view-table-header">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy data for Focus Blocks -->
                    <tr>
                        <td>1</td>
                        <td>Focus Block 1</td>
                        <td>Description for Focus Block 1</td>
                        <td>2024-06-10 to 2024-06-17</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Add</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Focus Block 2</td>
                        <td>Description for Focus Block 2</td>
                        <td>2024-06-18 to 2024-06-25</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Add</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="view-container">
            <h2>Admin Block Blocks</h2>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr class="view-table-header">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy data for Admin Block Blocks -->
                    <tr>
                        <td>1</td>
                        <td>Admin Block 1</td>
                        <td>Description for Admin Block 1</td>
                        <td>2024-06-10 to 2024-06-17</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Add</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Admin Block 2</td>
                        <td>Description for Admin Block 2</td>
                        <td>2024-06-18 to 2024-06-25</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Add</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="view-container">
            <h2>Social Blocks</h2>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr class="view-table-header">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy data for Social Blocks -->
                    <tr>
                        <td>1</td>
                        <td>Social Block 1</td>
                        <td>Description for Social Block 1</td>
                        <td>2024-06-10 to 2024-06-17</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Add</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Social Block 2</td>
                        <td>Description for Social Block 2</td>
                        <td>2024-06-18 to 2024-06-25</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Add</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="view-container">
            <h2>Recovery Blocks</h2>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr class="view-table-header">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Dummy data for Recovery Blocks -->
                    <tr>
                        <td>1</td>
                        <td>Recovery Block 1</td>
                        <td>Description for Recovery Block 1</td>
                        <td>2024-06-10 to 2024-06-17</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Add</a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Recovery Block 2</td>
                        <td>Description for Recovery Block 2</td>
                        <td>2024-06-18 to 2024-06-25</td>
                        <td>
                            <div class="btn-group">
                                <a href="#" class="text-blue-600 hover:text-blue-900">Edit</a>
                                <form action="#" method="POST" style="display:inline;">
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                                <a href="#" class="text-blue-600 hover:text-blue-900">Add</a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</x-platinum-layout>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-ugnirx3F+4U+bssJ0K1Zom+6jhb+kg6CCZTf46ri4IY0KtF25Mz+dflsRP26Y5AY" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-CYOzCJfAcMNNJT5hcu5l40U/fskCjc3fJ4j1XA8YGH5yybveHjUsPynjNu8Oa8y4" crossorigin="anonymous"></script>

</body>
</html>
