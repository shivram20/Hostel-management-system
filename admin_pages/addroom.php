<?php 
    include('admin.php');
     include('../connection.php'); 

    if(isset($_POST['addroom'])){

        $room_number = $_POST['room_number'];
        $floor_number = $_POST['floor_number'];
        $capacity = $_POST['capacity'];
        $occupied = $_POST['occupied'];
        $status =  $_POST['status'];

        $q = "INSERT INTO `rooms`(`room_no`, `floor_no`, `capacity`, `occupied`, `status`) VALUES ('$room_number','$floor_number','$capacity','$occupied','$status')";
        $r= mysqli_query($con, $q);

        if($r){
            echo "room add successsfully";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Room</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .form-container {
            max-width: 500px;
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container mt-5">
        <div class="bg-primary p-3 d-flex justify-content-between align-items-center mb-3">
             <h4 class="text-white">All Rooms</h4>
             <div class='d-flex gap-3'>
                <a href='addroom.php' class='btn nav-link text-dark'>Add_Room</a>
                <a href='bockrequest.php' class='btn nav-link text-light'> Request</a>
                <a href="bockedroom.php" class="btn nav-link text-light">Allocated </a> 
             </div>
        </div>


    <div class="form-container">
        <h4 class="text-center text-primary mb-3">Add Room Details</h4>
        <form action="" method="post">
            <div class="mb-3">
                <label class="form-label">Room Number</label>
                <input type="text" class="form-control" name="room_number" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Floor Number</label>
                <input type="number" class="form-control" name="floor_number" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Capacity</label>
                <input type="number" class="form-control" name="capacity" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Occupied</label>
                <input type="number" class="form-control" name="occupied" required>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Status</label>
                <select class="form-select" name="status" required>
                    <option value="Available">Available</option>
                    <option value="Full">Full</option>
                </select>
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100" name="addroom">Submit</button>
            </div>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
