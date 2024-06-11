<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>All Weekly Focus</title>
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
        .btn-group {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-group .btn {
            margin-right: 10px;
        }
    </style>
</head>
<body>

<main>
    <h1 id="main_title">All Weekly Focus</h1>
    <div class="view-container">

    <form action="{{ route('Mentor.report') }}" method="GET" style="display: inline;">
                    <button type="submit" class="btn btn-primary">Report</button>
                </form>
        <h2>Focus Blocks</h2>
        <form class="form-inline">
            <div class="form-group">
                <input type="text" class="form-control" id="searchInput" placeholder="Search">
            </div>
            <button type="button" class="btn btn-primary ml-2" onclick="search()">Search</button>
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
    <tr>
        <td>1</td>
        <td>Focus Block 1</td>
        <td>Description for Focus Block 1</td>
        <td>2024-06-10 to 2024-06-17</td>
        <td>
        <div class="comment">
            <!-- Replace input type text-area with textarea -->
            <textarea class="Comment" rows="4" cols="50"></textarea>
        </div>
        </td>
    </tr>
    <tr>
        <td>2</td>
        <td>Focus Block 2</td>
        <td>Description for Focus Block 2</td>
        <td>2024-06-18 to 2024-06-25</td>
        <td>
        <div class="comment">
            <!-- Replace input type text-area with textarea -->
            <textarea class="Comment" rows="4" cols="50"></textarea>
        </div>
        </td>
    </tr>
    <!-- Add more rows as needed -->
</tbody>
        </table>
    </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-ugnirx3F+4U+bssJ0K1Zom+6jhb+kg6CCZTf46ri4IY0KtF25Mz+dflsRP26Y5AY" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-CYOzCJfAcMNNJT5hcu5l40U/fskCjc3fJ4j1XA8YGH5yybveHjUsPynjNu8Oa8y4" crossorigin="anonymous"></script>

</body>
</html>
