<?php 
// Include the student header and database connection
include('student_header.php'); 
include('../connection.php');  
?>

<?php 
    $frms = "select * from rooms where status = 'available'";
    $result = mysqli_query($con, $frms);

    if(isset($_POST['submit'])){
        $fname = $_POST['fullname'];
        $uname = $_POST['username'];  
        $contact = $_POST['contact'];  
        $room = $_POST['room'];
        $dept = $_POST['department'];


        $sql = "INSERT INTO `roomallocation`(`student_name`, `username`, `contact`, `department`, `room_no`, `status`) VALUES ('$fname','$uname','$contact','$dept','$room','pending')";
        $result = mysqli_query($con, $sql);

        if($result){
            echo "<script>alert('Room booking request send Successfully')</script>";
        }

    }
 
    $username = $_SESSION['username'];
    $dept = "SELECT * FROM `student_registrations` WHERE username = '$username'";
    $resultd = mysqli_query($con,$dept);
    $row = mysqli_fetch_assoc($resultd);
    $deptname = $row['department'];
    $full_name = $row['full_name'];
    $num = $row['number'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Allocation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
        }
        .c {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            color: black;
        }
        .btn-submit {
            background: #2575fc;
            border: none;
            transition: 0.3s;
        }
        .btn-submit:hover {
            background: #6a11cb;
        }
        .img-container img {
            width: 100%;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="container c w-50">
        <h2 class="text-center fw-bold mb-4 text-primary">Room Allocation System</h2>

        <div class="row">
            <div class="col-md-6">
                <form action="" method="post">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" class="form-control" value="<?php echo $full_name?>" name="fullname" placeholder="Enter full name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" value="<?php echo $username ?>" name="username" placeholder="Enter username" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input type="number" class="form-control" value="<?php echo $num ?>" name="contact" placeholder="Enter contact number" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Department</label> 
                        <select name="department" class="form-select" required>
                           <?php ?>
                            <option value="<?php echo $deptname; ?>"><?php echo $deptname; ?></option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Room</label>
                        <select name="room" class="form-select" required>
                            <option value="">Select a Room</option>
                            <?php
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $row['room_no'] . '">' . $row['room_no'] . '</option>';
                                }
                            ?>
                        </select>
                    </div>


                    <div class="text-center">
                        <button type="submit" class="btn btn-submit w-100 text-uppercase fw-bold py-2" name="submit">Submit</button>
                    </div>
                </form>
            </div>

            <div class="col-md-6 img-container">
                <img src="img1.jpg" class="img-fluid" alt="Hostel Room">
            </div>
        </div>
    </div>
</div>

<?php include('student_footer.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
