
   <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Draft Thesis Performance</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <!-- Custom CSS -->
        <style>
            body {
                background-color: #e5e5e5;
            }
            .container {
                max-width: 1200px;
                margin-top: 20px;
            }
            .btn-group {
                margin-bottom: 20px;
            }
            .table th {
                background-color: #ffdc5c;
                color: white;
            }
            .modal-header {
                background-color: #007bff;
                color: white;
            }
            .modal-body {
                max-height: 60vh;
                overflow-y: auto;
            }
            .form-group label {
                font-weight: bold;
            }
            .form-group input {
                margin-bottom: 15px;
            }
        </style>
    </head>
    <body>

    <div class="container mt-5">
        <h1 class="text-center mb-4">Manage Draft Thesis Performance</h1>
        <div class="text-right mb-3">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">Add</button>
        </div>
        <div class="table-responsive">
            <table id="dataTable" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>Number</th>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Days to Prepare</th>
                    <th>Total Page</th>
                    <th>Completion Date</th>
                    <th>DDC Group</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <!-- Dummy data rows -->
                <tr id="item-1">
                    <td>1</td>
                    <td>Thesis Title 1</td>
                    <td>2024-01-01</td>
                    <td>2024-03-01</td>
                    <td>60</td>
                    <td>120</td>
                    <td>2024-03-10</td>
                    <td>DDC Group 1</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" onclick="openEditModal(1)">Edit</button>
                            <form action="{{ route('DTAView.delete', 1) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr id="item-2">
                    <td>2</td>
                    <td>Thesis Title 2</td>
                    <td>2024-02-01</td>
                    <td>2024-04-01</td>
                    <td>60</td>
                    <td>130</td>
                    <td>2024-04-10</td>
                    <td>DDC Group 2</td>
                    <td>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" onclick="openEditModal(2)">Edit</button>
                            <form action="{{ route('DTAView.delete', 2) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete?')">Delete</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <!-- Add more dummy rows as needed -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="addModalLabel">Add Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="addForm">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" id="title" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="start_date">Start Date:</label>
                            <input type="date" id="start_date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="end_date">End Date:</label>
                            <input type="date" id="end_date" name="end_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="days_to_prepare">Days to Prepare:</label>
                            <input type="number" id="days_to_prepare" name="days_to_prepare" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="total_page">Total Page:</label>
                            <input type="number" id="total_page" name="total_page" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="completion_date">Completion Date:</label>
                            <input type="date" id="completion_date" name="completion_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="ddc_group">DDC Group:</label>
                            <input type="text" id="ddc_group" name="ddc_group" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="editModalLabel">Edit Record</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" id="edit_id" name="id">
                        <div class="form-group">
                            <label for="edit_title">Title:</label>
                            <input type="text" id="edit_title" name="title" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_start_date">Start Date:</label>
                            <input type="date" id="edit_start_date" name="start_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_end_date">End Date:</label>
                            <input type="date" id="edit_end_date" name="end_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_days_to_prepare">Days to Prepare:</label>
                            <input type="number" id="edit_days_to_prepare" name="days_to_prepare" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_total_page">Total Page:</label>
                            <input type="number" id="edit_total_page" name="total_page" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_completion_date">Completion Date:</label>
                            <input type="date" id="edit_completion_date" name="completion_date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="edit_ddc_group">DDC Group:</label>
                            <input type="text" id="edit_ddc_group" name="ddc_group" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });

        function openEditModal(id) {
            $.ajax({
                url: '/api/draft_thesis_performance/' + id,
                method: 'GET',
                success: function(data) {
                    $('#edit_id').val(data.id);
                    $('#edit_title').val(data.title);
                    $('#edit_start_date').val(data.start_date);
                    $('#edit_end_date').val(data.end_date);
                    $('#edit_days_to_prepare').val(data.days_to_prepare);
                    $('#edit_total_page').val(data.total_page);
                    $('#edit_completion_date').val(data.completion_date);
                    $('#edit_ddc_group').val(data.ddc_group);
                    $('#editModal').modal('show');
                }
            });
        }

        $('#addForm').on('submit', function(event) {
            event.preventDefault();
            let formData = $(this).serialize();
            $.ajax({
                url: '/api/draft_thesis_performance',
                method: 'POST',
                data: formData,
                success: function(data) {
                    location.reload();
                }
            });
        });

        $('#editForm').on('submit', function(event) {
            event.preventDefault();
            let id = $('#edit_id').val();
            let formData = $(this).serialize();
            $.ajax({
                url: '/api/draft_thesis_performance/' + id,
                method: 'PUT',
                data: formData,
                success: function(data) {
                    location.reload();
                }
            });
        });

        function deleteAction(id) {
            if (confirm('Are you sure you want to delete?')) {
                $.ajax({
                    url: '/api/draft_thesis_performance/' + id,
                    method: 'DELETE',
                    success: function(data) {
                        $('#item-' + id).remove();
                    }
                });
            }
        }
    </script>
    </body>
    </html>
    
