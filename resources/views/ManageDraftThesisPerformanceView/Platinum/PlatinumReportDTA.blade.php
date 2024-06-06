<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="viewRegistration.css">
    <title>List of Vehicles</title>
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }
        body {
            display: flex;
            flex-direction: column;
        }
        main {
            flex: 1;
        }
        footer {
            background: #333;
            color: #fff;
            padding: 20px 0;
        }
        footer .container {
            display: flex;
            justify-content: space-between;
        }
        footer .container div {
            flex: 1;
            padding: 0 50px;
            text-align: center;
        }
        footer h5 {
            margin-top: 0;
        }
        footer ul {
            list-style: none;
            padding: 0;
        }
        footer ul li {
            margin: 5px 0;
        }
        footer ul li a {
            color: #fff;
            text-decoration: none;
        }
        footer ul li a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <?php include '../Layout/adminHeader.php'; ?>
    <?php include '../DB_FKPark/dbcon.php'; ?>

    <main>
        <h1 id="main_title">List Of Vehicles</h1>

        <div class="view-container">

            <h2>Focus Block</h2>
            <button type="button" class="btn btn-primary add-button" data-bs-toggle="modal" data-bs-target="#addModal" data-block="Focus">Add Vehicle</button>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr class="view-table-header">
                        <th>WeeklyFocus</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Transmission</th>
                        <th>Grant</th>
                        <th>Student ID</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `Vehicle` WHERE block = 'Focus'";
                        $result = mysqli_query($con, $query);

                        if(!$result){
                            die("Query failed: " . mysqli_error($con));
                        } else {
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['vehicle_numPlate']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_brand']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_transmission']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($row['vehicle_grant']); ?>" alt="Vehicle Grant" width="100"></td>
                            <td><?php echo htmlspecialchars($row['student_ID']); ?></td>
                            <td><button type="button" class="btn btn-warning edit-button" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo htmlspecialchars($row['vehicle_numPlate']); ?>">Edit</button></td>
                            <td><button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo htmlspecialchars($row['vehicle_numPlate']); ?>">Delete</button></td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <h2>Admin Block</h2>
            <button type="button" class="btn btn-primary add-button" data-bs-toggle="modal" data-bs-target="#addModal" data-block="Admin">Add Vehicle</button>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr class="view-table-header">
                        <th>Number Plate</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Transmission</th>
                        <th>Grant</th>
                        <th>Student ID</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `Vehicle` WHERE block = 'Admin'";
                        $result = mysqli_query($con, $query);

                        if(!$result){
                            die("Query failed: " . mysqli_error($con));
                        } else {
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['vehicle_numPlate']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_brand']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_transmission']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($row['vehicle_grant']); ?>" alt="Vehicle Grant" width="100"></td>
                            <td><?php echo htmlspecialchars($row['student_ID']); ?></td>
                            <td><button type="button" class="btn btn-warning edit-button" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo htmlspecialchars($row['vehicle_numPlate']); ?>">Edit</button></td>
                            <td><button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo htmlspecialchars($row['vehicle_numPlate']); ?>">Delete</button></td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <h2>Social Block</h2>
            <button type="button" class="btn btn-primary add-button" data-bs-toggle="modal" data-bs-target="#addModal" data-block="Social">Add Vehicle</button>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr class="view-table-header">
                        <th>Number Plate</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Transmission</th>
                        <th>Grant</th>
                        <th>Student ID</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `Vehicle` WHERE block = 'Social'";
                        $result = mysqli_query($con, $query);

                        if(!$result){
                            die("Query failed: " . mysqli_error($con));
                        } else {
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['vehicle_numPlate']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_brand']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_transmission']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($row['vehicle_grant']); ?>" alt="Vehicle Grant" width="100"></td>
                            <td><?php echo htmlspecialchars($row['student_ID']); ?></td>
                            <td><button type="button" class="btn btn-warning edit-button" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo htmlspecialchars($row['vehicle_numPlate']); ?>">Edit</button></td>
                            <td><button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo htmlspecialchars($row['vehicle_numPlate']); ?>">Delete</button></td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <h2>Recovery Block</h2>
            <button type="button" class="btn btn-primary add-button" data-bs-toggle="modal" data-bs-target="#addModal" data-block="Recovery">Add Vehicle</button>
            <table class="table table-hover table-bordered table-striped">
                <thead>
                    <tr class="view-table-header">
                        <th>Number Plate</th>
                        <th>Type</th>
                        <th>Brand</th>
                        <th>Transmission</th>
                        <th>Grant</th>
                        <th>Student ID</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $query = "SELECT * FROM `Vehicle` WHERE block = 'Recovery'";
                        $result = mysqli_query($con, $query);

                        if(!$result){
                            die("Query failed: " . mysqli_error($con));
                        } else {
                            while($row = mysqli_fetch_assoc($result)){
                    ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['vehicle_numPlate']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_type']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_brand']); ?></td>
                            <td><?php echo htmlspecialchars($row['vehicle_transmission']); ?></td>
                            <td><img src="<?php echo htmlspecialchars($row['vehicle_grant']); ?>" alt="Vehicle Grant" width="100"></td>
                            <td><?php echo htmlspecialchars($row['student_ID']); ?></td>
                            <td><button type="button" class="btn btn-warning edit-button" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?php echo htmlspecialchars($row['vehicle_numPlate']); ?>">Edit</button></td>
                            <td><button type="button" class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#deleteModal" data-id="<?php echo htmlspecialchars($row['vehicle_numPlate']); ?>">Delete</button></td>
                        </tr>
                    <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

        </div>

        <?php
            if (isset($_GET['message'])) {
                echo "<h6>" . htmlspecialchars($_GET['message']) . "</h6>";
            }
        ?>

        <?php
            if (isset($_GET['insert_msg'])) {
                echo "<h6>" . htmlspecialchars($_GET['insert_msg']) . "</h6>";
            }
        ?>

        <?php
        // Handle deletion of vehicle
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['delete_vehicle_numPlate'])) {
            // Retrieve vehicle number plate from the POST data
            $vehicle_numPlate_to_delete = $_POST['delete_vehicle_numPlate'];

            // Construct the SQL delete query to remove the vehicle
            $deleteQuery = "DELETE FROM Vehicle WHERE vehicle_numPlate = '$vehicle_numPlate_to_delete'";

            // Execute the delete query
            $deleteResult = mysqli_query($con, $deleteQuery);

            // Check if the query was successful
            if (!$deleteResult) {
                // If query fails, display error message
                die("Deletion failed: " . mysqli_error($con));
            } else {
                // If query succeeds, redirect to viewRegistration.php with success message
                header('Location:../ManageRegistration/viewRegistration.php?delete_msg=Vehicle has been deleted successfully');
                exit;
            }
        }
        mysqli_close($con);
        ?>
    </main>

    <footer>
        <div class="container">
            <div>
                <h5>About FKPark</h5>
                <p>FKPark is a premier parking management system providing seamless and efficient parking solutions.</p>
            </div>
            <div>
                <h5>Quick Links</h5>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Booking</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div>
                <h5>Contact Us</h5>
                <p>Email: info@fkpark.com<br>Phone: +123 456 7890</p>
            </div>
        </div>
    </footer>

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="addVehicle.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addModalLabel">Add Vehicle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Add vehicle form fields here -->
                        <div class="mb-3">
                            <label for="vehicleNumPlate" class="form-label">Number Plate</label>
                            <input type="text" class="form-control" id="vehicleNumPlate" name="vehicle_numPlate" required>
                        </div>
                        <div class="mb-3">
                            <label for="vehicleType" class="form-label">Type</label>
                            <input type="text" class="form-control" id="vehicleType" name="vehicle_type" required>
                        </div>
                        <div class="mb-3">
                            <label for="vehicleBrand" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="vehicleBrand" name="vehicle_brand" required>
                        </div>
                        <div class="mb-3">
                            <label for="vehicleTransmission" class="form-label">Transmission</label>
                            <input type="text" class="form-control" id="vehicleTransmission" name="vehicle_transmission" required>
                        </div>
                        <div class="mb-3">
                            <label for="vehicleGrant" class="form-label">Grant</label>
                            <input type="file" class="form-control" id="vehicleGrant" name="vehicle_grant" required>
                        </div>
                        <div class="mb-3">
                            <label for="studentID" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="studentID" name="student_ID" required>
                        </div>
                        <input type="hidden" id="vehicleBlock" name="block">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Vehicle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="editVehicle.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Vehicle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Edit vehicle form fields here -->
                        <div class="mb-3">
                            <label for="editVehicleNumPlate" class="form-label">Number Plate</label>
                            <input type="text" class="form-control" id="editVehicleNumPlate" name="vehicle_numPlate" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="editVehicleType" class="form-label">Type</label>
                            <input type="text" class="form-control" id="editVehicleType" name="vehicle_type" required>
                        </div>
                        <div class="mb-3">
                            <label for="editVehicleBrand" class="form-label">Brand</label>
                            <input type="text" class="form-control" id="editVehicleBrand" name="vehicle_brand" required>
                        </div>
                        <div class="mb-3">
                            <label for="editVehicleTransmission" class="form-label">Transmission</label>
                            <input type="text" class="form-control" id="editVehicleTransmission" name="vehicle_transmission" required>
                        </div>
                        <div class="mb-3">
                            <label for="editVehicleGrant" class="form-label">Grant</label>
                            <input type="file" class="form-control" id="editVehicleGrant" name="vehicle_grant">
                        </div>
                        <div class="mb-3">
                            <label for="editStudentID" class="form-label">Student ID</label>
                            <input type="text" class="form-control" id="editStudentID" name="student_ID" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Modal -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="POST" action="viewRegistration.php">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Delete Vehicle</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete this vehicle?</p>
                        <input type="hidden" id="deleteVehicleNumPlate" name="delete_vehicle_numPlate">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBY6pVQZ9GGGPq5Sm9TGaWFRpLQeekb+EN7q50quHVB1WTRi" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+pP05UHkzuw1R1Rtv7yZ9r+8b68i7MycV14zn5kpT8fuFiw7F4BxDO2V9uG9dM" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var addModal = document.getElementById('addModal');
            addModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var block = button.getAttribute('data-block');
                var blockInput = addModal.querySelector('#vehicleBlock');
                blockInput.value = block;
            });

            var editModal = document.getElementById('editModal');
            editModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var vehicleId = button.getAttribute('data-id');

                // Fetch vehicle data from the server using AJAX
                fetch(`getVehicle.php?vehicle_numPlate=${vehicleId}`)
                    .then(response => response.json())
                    .then(data => {
                        editModal.querySelector('#editVehicleNumPlate').value = data.vehicle_numPlate;
                        editModal.querySelector('#editVehicleType').value = data.vehicle_type;
                        editModal.querySelector('#editVehicleBrand').value = data.vehicle_brand;
                        editModal.querySelector('#editVehicleTransmission').value = data.vehicle_transmission;
                        editModal.querySelector('#editStudentID').value = data.student_ID;
                    });
            });

            var deleteModal = document.getElementById('deleteModal');
            deleteModal.addEventListener('show.bs.modal', function (event) {
                var button = event.relatedTarget;
                var vehicleId = button.getAttribute('data-id');
                var deleteInput = deleteModal.querySelector('#deleteVehicleNumPlate');
                deleteInput.value = vehicleId;
            });
        });
    </script>
</body>
</html>
