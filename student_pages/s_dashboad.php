<?php include('..\connection.php'); ?>

<?php
    $a = "SELECT * FROM `announcements`";
    $result = mysqli_query($con, $a);
    $count = mysqli_num_rows($result);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
    <link rel="stylesheet" href="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
    <!-- <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css"> -->
    <style>
         body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
        }
    </style>
</head>
<body>
    <?php include('student_header.php'); ?>
<!-- Main Content -->
<div style="min-height: 70vh;" class="container mt-5">
    <div class="row ">
        <div class="col-md-12">
            <h2 class="text-center text-white">Welcome, <?php  echo $name; ?>!</h2>
            <p class="text-center text-white">This is your Hostel Management System dashboard where you can manage all your hostel-related activities.</p>
        </div>
    </div>
    
    <div class="row mt-4 mb-4">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5>👤 My Profile</h5>
                <p>View and update your profile details, including personal information.</p>
                <a href="profile.php?name=<?php echo $name; ?>" class="btn btn-primary">View Profile</a>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5> My Room</h5>
                <p>Your Room details</p>
                <?php 
     
                    $name = $_SESSION['username'];
                    $sql= "select * from roomallocation where username = '$name'";
                    $result = mysqli_query($con, $sql);

                    $num = mysqli_num_rows($result);
            
                    if($num >0){
                        echo "<a href='myroom.php?name=<?php echo $name; ?>' class='btn btn-primary'>View Room</a>";
                    }else{
                        echo "<a href='roomallocation.php?name=<?php echo $name; ?>' class='btn btn-primary'>Book Room</a>";
                    }
                ?>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card p-3 shadow-sm">
                <h5>📝 Complains  </h5>
                <p>View and manage your hostel details.</p>
                <a href="complains.php" class="btn btn-primary">View Details</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card p-3 shadow-sm">
                <h5>📝 Apply for Leave</h5>
                <p>Submit leave applications and check approval status.</p>
                <a href="leave.php" class="btn btn-primary">Apply Now</a>
            </div>
        </div>
        <div class="col-md-5 mb-5">
            <div class="card p-3 shadow-sm">
                <div class='d-flex'><h5 class='p-2'>📢 Announcements</h5> <span class='p-2'><?php echo $count;?></span></div>
                <p>Stay updated with the latest hostel announcements and notices.</p>
                <a href="announcement.php" class="btn btn-primary">View Announcements</a>
            </div>
        </div>
    </div>
</div>
<?php include('student_footer.php'); ?>
<script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
