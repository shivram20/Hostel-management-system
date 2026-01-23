<?php include('..\connection.php'); ?>

<?php
    $c = "SELECT * FROM `complaints` WHERE c_action = 'pending'";
    $result = mysqli_query($con, $c);
    $count = mysqli_num_rows($result);
    
    $l = "SELECT * FROM `leave_request` WHERE status = 'pending'";
    $result = mysqli_query($con, $l);
    $countl = mysqli_num_rows($result);

      
    $r = "SELECT * FROM `roomallocation` WHERE status = 'pending'";
    $result = mysqli_query($con, $r);
    $countr = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
    <link rel="stylesheet" href="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css">
</head>
<body>
    <?php include('admin.php'); ?>

<div style="min-height: 70vh;" class="container mt-5">
    <div class="row ">
        <div class="col-md-12">
            <h2 class="text-center text-primary">Welcome, <?php echo $name; ?>!</h2>
            <p class="text-center">This is your Hostel Management System admin site dashboard where you can manage all your hostel-related activities.</p>
        </div>
    </div>
    
    <div class="row mt-4 mb-5">
        <div class="col-md-4">
            <div class="card p-3 shadow-sm">
                <h5 class='p-2'>👤 My Profile</h5>
                <p>View and update your profile details.</p>
                <a href="admin_profile.php?name=<?php echo $name; ?>" class="btn btn-primary">View Profile</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card p-3 shadow-sm"> 
                <div class='d-flex'><h5 class='p-2'>📝 Complaints</h5> <span class='p-2'><?php echo $count;?></span></div>
                <p>View and manage students Complaints details.</p>
                <a href="admin_complains.php" class="btn btn-primary">View Details</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card p-3 shadow-sm">
                <div class='d-flex'><h5 class='p-2'>📝  Leave Management</h5> <span class='p-2'><?php echo $countl?></span></div>
                <p>View and manage leave applications.</p>
                <a href="lhead.php" class="btn btn-primary">View Now</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card p-3 shadow-sm">
                <h5 class='p-2'>📢 Announcements Management</h5>
                <p>Make and manage latest announcements and notices.</p>
                <a href="announcementpage.php" class="btn btn-primary">View Announcements</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card p-3 shadow-sm">
                <h5 class='p-2'> 👤 students Management</h5>
                <p>students management details.</p>
                <a href="students.php" class="btn btn-primary">view students</a>
            </div>
        </div>
        <div class="col-md-4 mb-5">
            <div class="card p-3 shadow-sm">
                <div class='d-flex'><h5 class='p-2'> 👤 Room Management</h5> <span class='p-2'><?php echo $countr ?></span></div>
                <p>Room management details.</p>
                <a href="rhead.php" class="btn btn-primary">Room Management</a>
            </div>
        </div>
    </div>
</div>
<?php include('admin_footer.php'); ?>
<script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
