<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draft Thesis Performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
        }
        
        .container {
            margin-top: 50px;
        }
        
        .table {
            background-color: yellow;
            border-color: yellow;
        }
        
        .table th,
        .table td {
            border-color: #dee2e6;
        }
        
        .table-hover tbody tr:hover {
            background-color: #fff3cd;
        }
        
        .view-table-header {
            background-color: #ffc107;
            color: white;
        }
        
        .btn-group .btn {
            background-color: #007bff;
            border-color: #007bff;
            color: #fff;
            width: 80px; /* Set a fixed width for all buttons */
            margin-right: 5px; /* Add space between buttons */
            text-align: center;
        }

        .btn-group .btn:last-child {
            margin-right: 0; /* Remove margin from the last button */
        }
        
        .btn-group .btn:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        
        .btn-group .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        
        .btn-group .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        
        .btn-group .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
            color: #212529;
        }
        
        .btn-group .btn-warning:hover {
            background-color: #e0a800;
            border-color: #d39e00;
            color: #212529;
        }
        
        .btn-group .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        
        .btn-group .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Button group at the top right of the table -->
    <div class="d-flex justify-content-end mb-3">
        <div class="btn-group">
            <!-- Add button -->
            <a href="{{ route('addAction') }}" class="btn btn-primary">Add</a>
            <!-- Edit button -->
            <button type="button" class="btn btn-primary" onclick="openEditModal()">Edit</button>
            <!-- Delete button -->
            <button type="button" class="btn btn-danger" onclick="deleteAction()">Delete</button>
        </div>
    </div>

    <table class="table table-hover table-bordered table-striped">
        <thead>
            <tr class="view-table-header">
                <th style="text-align: center;">Number</th>
                <th style="text-align: center;">Title</th>
                <th style="text-align: center;">Start Date</th>
                <th style="text-align: center;">End Date</th>
                <th style="text-align: center;">Days to Prepare</th>
                <th style="text-align: center;">Total Page</th>
                <th style="text-align: center;">Completion Date</th>
                <th style="text-align: center;">DDC Group</th>
            </tr>
        </thead>
        <tbody>
            <!-- Loop through data using Blade syntax -->
            @foreach ($data as $item)
            <tr>
                <td>{{ $item->number }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->start_date }}</td>
                <td>{{ $item->end_date }}</td>
                <td>{{ $item->days_to_prepare }}</td>
                <td>{{ $item->total_page }}</td>
                <td>{{ $item->completion_date }}</td>
                <td>{{ $item->ddc_group }}</td>
                <td style="text-align: center;">
                    <div class="btn-group">
                        <!-- Row-specific Edit button -->
                        <button type="button" class="btn btn-primary" onclick="openEditModal({{ $item->id }})">Edit</button>
        
                        <!-- Row-specific Delete button -->
                        <form action="{{ route('deleteAction', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
        
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wEmeIV1mKuiNp12sBd0KSBl+8Ywi+65KwgdZ+3ztD4INtq+Pp3HBpLZ9/9PI3xH+" crossorigin="anonymous"></script>
<script>
    function openEditModal(id = null) {
        // Implement the functionality to open edit modal
        if (id) {
            alert("Open edit modal for ID: " + id);
        } else {
            alert("Open edit modal");
        }
    }
    
    function deleteAction() {
        // Implement the functionality to handle delete action
        alert("Delete action triggered");
    }
</script>

</body>
</html>
