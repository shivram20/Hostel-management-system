<?php 
    include("../connection.php");
?>
<?php 
    session_start();
    $name = $_SESSION['username'];
    $admin = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>hostel management system main page</title>    
    <link rel="stylesheet" href=..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css>
    <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css">
    <style>
        .profile-container {
            width: 80px;
            height: 80px;
            overflow: hidden;
            margin-right: 10px;
        }
    </style>
</head>
<body>
   
<!-- Navbar -->
<nav class="navbar navbar-expand-lg bg-primary bg-gradient">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
        <div class="profile-container rounded-circle bg-dark mr-3">
            <?php 
                $query = "SELECT * FROM admin_profile WHERE username = '$admin'";
                $result = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <img src="admin_profile/<?php echo $row['image']; ?>" class="rounded-circle img-fluid rounded-circle w-100 h-100 object-fit-cover" alt="Profile Picture">
                <?php } ?>
        </div>

            <h6 class="text-light"><?php echo $admin; ?></h6>
        </div>
        <button class="navbar-toggler w-30" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

<!-- Include Font Awesome CDN -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <a href="admin_dashboad.php" class="nav-link text-light">
                <i class="fa-solid fa-users"></i> dashboad
            </a>
</div>

    </div>
    <div class="d-flex align-items-center m-2">
        <i class='fi fi-ss-logout'></i>
        <a href="../logout.php" class="btn btn-danger">Logout</a>
    </div>
</nav>
<script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>