<?php include("student_header.php");?>
<?php include("..\connection.php");?>

<?php 

    if(isset($_POST['submit'])){
     $student_name = $_POST['student_name'];
     $username = $_POST['username'];
     $room_number = $_POST['room_number'];
     $contact = $_POST['number'];
     $leave_type = $_POST['leave_type'];
     $department = $_POST['department'];
     $number = $_POST['number'];
     $from_date = $_POST['from_date'];
     $to_date = $_POST['To_date'];
     $reason = $_POST['reason'];
     $gc = $_POST['guardian_contact'];


    $query = "INSERT INTO `leave_request`(`name`, `username`, `room_no`, `leave_type`, `department`,`number`, `from_date`, `to_date`, `reason`, `guardian_contact`, `status`) VALUES ('$student_name','$username','$room_number','$leave_type','$department','$number','$from_date','$to_date','$reason','$gc','pending')";
    $result = mysqli_query($con, $query);
    if($result){
        echo "<script>alert('Leave Request Sent Successfully')</script>";
    }
    }

    
    $username = $_SESSION['username'];
    $dept = "SELECT * FROM `student_registrations` WHERE username = '$username'";
    $resultd = mysqli_query($con,$dept);
    $row = mysqli_fetch_assoc($resultd);
    $deptname = $row['department'];
    $full_name = $row['full_name'];
    $num = $row['number'];

    $room = "SELECT * FROM `roomallocation` WHERE username = '$username'";
    $rrrr = mysqli_query($con,$room);
    $row = mysqli_fetch_assoc($rrrr);
    $r = $row['room_no'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <div class="container d-flex justify-content-between text-center bg-primary p-3 mt-5">
        <div>
           <h4 class="text-light"> leave Applications </h4>
        </div>
        <div>
            <a class="nav-link text-light" href="leavereq.php">Rquests</a>
        </div>
    </div>
   
<div class="container shadow p-3">
        <h4 class=" bg-primary text-light p-2 text-center">Leave Request</h4>
        <form action="" method="POST">
            <div class="d-flex justify-content-between gap-5 mt-3">
                <div class='w-75'>
                    <label class="form-label">Student Name</label>
                    <input type="text" name="student_name" value="<?php echo  $full_name?>" class="form-control" placeholder="Student Name" required>
                </div>
                <div class='w-75'>
                    <label class="form-label">Username</label>
                    <input type="text" name="username" class="form-control" value='<?php echo $username?>' placeholder="username" required>
                </div>
            </div>
            <div class="d-flex justify-content-between gap-5 mt-3">
                <div class='w-75'>
                    <label class="form-label d-block">Room Number</label>
                    <input type="text" name="room_number" class="form-control" value="<?php echo $r ?>" placeholder="Room No." required>
                </div>
                <div class='w-75'>
                    <label class="form-label">Contact</label>
                    <input type="text" name="number" class="form-control" value='<?php echo $num ?>' placeholder="Contact" required>
                </div>
            </div>
            <div class="d-flex justify-content-between gap-5 mt-3">
                <div class='w-75'>
                    <section>
                        <label class="form-label d-block">Leave Type</label>
                        <select name="leave_type" class="form-select">
                            <option value="Short Leave">Short Leave</option>
                            <option value="Overnight Leave">Overnight Leave</option>
                            <option value="Long Leave">Long Leave</option>
                    </select>
                </div>
                <div class='w-75'>
                    <label class="form-label">Department</label>
                    <select name="department" class="form-select">
                    <?php ?>
                    <option value="<?php echo $deptname; ?>"><?php echo $deptname; ?></option>
                    </select>
                </div>               
            </div>
            <div class="d-flex justify-content-between gap-5 mt-3">
                <div class='w-75'>
                    <label class="form-label">From Date</label>
                    <input type="date" name="from_date" class="form-control" required>
                </div>
                <div class='w-75'>
                    <label class="form-label">To Date</label>
                    <input type="date" name="To_date" class="form-control" required>
                </div>
            </div>
            <div class="d-flex justify-content-between gap-5 mt-3">
                <div class='w-75'>
                <label class="form-label">Reason</label>
                <textarea name="reason" class="form-control" placeholder="Reason" rows="2" required></textarea>
                </div>
                <div class='w-75'>
                <label class="form-label">Guardian Contact</label>
                <input type="text" name="guardian_contact" class="form-control" placeholder="Guardian Contact" required>
                </div>
                
            </div>
            <div class='d-flex justify-content-center align-items-center mt-5'>
                <button type="submit" name='submit' class="btn btn-primary w-50 text-uppercase">Submit</button>
            </div>
        </form>
    </div>
    <?php include('student_footer.php'); ?>
</body>
</html>