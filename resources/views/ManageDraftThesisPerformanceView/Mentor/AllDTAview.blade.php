<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
            background-color: #0E2238;
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

<div class="container">
    <!-- Button group at the top right of the table -->
<div class="text-right">
    <form class="form-inline">
        <div class="form-group">
            <input type="text" class="form-control" id="searchInput" placeholder="Search">
        </div>
        <button type="button" class="btn btn-primary ml-2" onclick="search()">Search</button>
    </form>
</div>

    <table id="dataTable" class="table table-bordered table-striped">
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
                <div class="comment">
                        <input type="text-area" class="Comment" width="100"></input>
                        <label for="commment" class="Comment"> 
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
                    <div class="comment">
                        <input type="text-area" class="Comment" width="100"></input>
                        <label for="commment" class="Comment"> 
                    </div>
                </td>
            </tr>
            <!-- Add more dummy rows as needed -->
        </tbody>
    </table>
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

@section('scripts')
<script>
    // Function to populate edit modal fields with data
    function openEditModal(id) {
        fetch(`/api/draft-thesis-performance/${id}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('edit_id').value = data.id;
                document.getElementById('edit_title').value = data.title;
                document.getElementById('edit_start_date').value = data.start_date;
                document.getElementById('edit_end_date').value = data.end_date;
                document.getElementById('edit_days_to_prepare').value = data.days_to_prepare;
                document.getElementById('edit_total_page').value = data.total_page;
                document.getElementById('edit_completion_date').value = data.completion_date;
                document.getElementById('edit_ddc_group').value = data.ddc_group;
            });
        $('#editModal').modal('show');
    }

    // Function to handle form submission for adding a new record
    document.getElementById('addForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        // Collect form data
        let formData = new FormData(this);
        // Send AJAX request to add the record
        fetch('{{ route("addAction") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // If data is successfully added, update the table
            if(data.success) {
                let newRow = `<tr id="item-${data.id}">
                                <td>${data.number}</td>
                                <td>${data.title}</td>
                                <td>${data.start_date}</td>
                                <td>${data.end_date}</td>
                                <td>${data.days_to_prepare}</td>
                                <td>${data.total_page}</td>
                                <td>${data.completion_date}</td>
                                <td>${data.ddc_group}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" onclick="openEditModal(${data.id})">Edit</button>
                                        <button type="button" class="btn btn-danger" onclick="deleteAction(${data.id})">Delete</button>
                                    </div>
                                </td>
                            </tr>`;
                document.querySelector('#dataTable tbody').insertAdjacentHTML('beforeend', newRow);
                // Close the modal after successful addition
                $('#addModal').modal('hide');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Function to handle form submission for editing a record
    document.getElementById('editForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        // Collect form data
        let formData = new FormData(this);
        let id = formData.get('id');
        // Send AJAX request to update the record
        fetch(`/api/draft-thesis-performance/${id}`, {
            method: 'PUT',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            // If data is successfully updated, update the corresponding row in the table
            if(data.success) {
                let row = document.getElementById(`item-${data.id}`);
                row.innerHTML = `<td>${data.number}</td>
                                <td>${data.title}</td>
                                <td>${data.start_date}</td>
                                <td>${data.end_date}</td>
                                <td>${data.days_to_prepare}</td>
                                <td>${data.total_page}</td>
                                <td>${data.completion_date}</td>
                                <td>${data.ddc_group}</td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary" onclick="openEditModal(${data.id})">Edit</button>
                                        <button type="button" class="btn btn-danger" onclick="deleteAction(${data.id})">Delete</button>
                                    </div>
                                </td>`;
                // Close the modal after successful update
                $('#editModal').modal('hide');
            }
        })
        .catch(error => console.error('Error:', error));
    });

    // Function to handle deletion of a record
    function deleteAction(id) {
        // Send AJAX request to delete the record
        fetch(`/api/draft-thesis-performance/${id}`, {
            method: 'DELETE'
        })
        .then(response => response.json())
        .then(data => {
            // If data is successfully deleted, remove the corresponding row from the table
            if(data.success) {
                let row = document.getElementById(`item-${id}`);
                row.parentNode.removeChild(row);
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@endsection

</body>
</html>
