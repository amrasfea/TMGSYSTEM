<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draft Thesis Performance</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wEmeIV1mKuiNp12sBd0KSBl+8Ywi+65KwgdZ+3ztD4INtq+Pp3HBpLZ9/9PI3xH+" crossorigin="anonymous"></script>
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
        <button type="button" class="btn btn-primary" onclick="openAddModal()">Add</button>
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
                <th style="text-align: center;">Action</th>
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

<!-- Add Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Add Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addForm" method="POST" action="{{ route('addAction') }}">
                    @csrf
                    <!-- Form fields for add record -->
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="end_date" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="days_to_prepare" class="form-label">Days to Prepare</label>
                        <input type="number" class="form-control" id="days_to_prepare" name="days_to_prepare" required>
                    </div>
                    <div class="mb-3">
                        <label for="total_page" class="form-label">Total Page</label>
                        <input type="number" class="form-control" id="total_page" name="total_page" required>
                    </div>
                    <div class="mb-3">
                        <label for="completion_date" class="form-label">Completion Date</label>
                        <input type="date" class="form-control" id="completion_date" name="completion_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="ddc_group" class="form-label">DDC Group</label>
                        <input type="text" class="form-control" id="ddc_group" name="ddc_group" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" method="POST" action="">
                    @csrf
                    @method('PUT')
                    <!-- Form fields for edit record -->
                    <div class="mb-3">
                        <label for="edit_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_start_date" class="form-label">Start Date</label>
                        <input type="date" class="form-control" id="edit_start_date" name="start_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_end_date" class="form-label">End Date</label>
                        <input type="date" class="form-control" id="edit_end_date" name="end_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_days_to_prepare" class="form-label">Days to Prepare</label>
                        <input type="number" class="form-control" id="edit_days_to_prepare" name="days_to_prepare" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_total_page" class="form-label">Total Page</label>
                        <input type="number" class="form-control" id="edit_total_page" name="total_page" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_completion_date" class="form-label">Completion Date</label>
                        <input type="date" class="form-control" id="edit_completion_date" name="completion_date" required>
                    </div>
                    <div class="mb-3">
                        <label for="edit_ddc_group" class="form-label">DDC Group</label>
                        <input type="text" class="form-control" id="edit_ddc_group" name="ddc_group" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-wEmeIV1mKuiNp12sBd0KSBl+8Ywi+65KwgdZ+3ztD4INtq+Pp3HBpLZ9/9PI3xH+" crossorigin="anonymous"></script>
<script>
    function openEditModal(id) {
        fetch(`/getRecord/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_title').value = data.title;
                document.getElementById('edit_start_date').value = data.start_date;
                document.getElementById('edit_end_date').value = data.end_date;
                document.getElementById('edit_days_to_prepare').value = data.days_to_prepare;
                document.getElementById('edit_total_page').value = data.total_page;
                document.getElementById('edit_completion_date').value = data.completion_date;
                document.getElementById('edit_ddc_group').value = data.ddc_group;
                document.getElementById('editForm').action = `/editAction/${id}`;
                var editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            });
    }

    // Function to open the add modal
    function openAddModal() {
        var addModal = new bootstrap.Modal(document.getElementById('addModal'));
        addModal.show();
    }
</script>



</body>
</html>
