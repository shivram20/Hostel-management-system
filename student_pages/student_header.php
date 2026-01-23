<?php include('..\connection.php'); ?>
<?php 
    session_start();
    $name = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Management System</title>
    <link rel="stylesheet" href="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css">
    <style>
        .profile-container {
            width: 50px;
            height: 50px;
            overflow: hidden;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary d-flex justify-content-between align-items-center">
        <div class="d-flex justify-content-between align-items-center m-2">
            <div class="profile-container rounded-circle bg-dark mr-3">
                <?php 
                    $query = "SELECT * FROM profile_imgs WHERE username = '$name'";
                    $result = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <img src="profileimages/<?php echo $row['image']; ?>" class="rounded-circle img-fluid rounded-circle w-100 h-100 object-fit-cover" alt="Profile Picture">
                <?php } ?>
            </div>

            <h6 class="text-light"><?php echo $name; ?></h6>
        </div>
        
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <a href="s_dashboad.php" class="nav-link text-light">
                <i class="fa-solid fa-users"></i><h5>dashboad</h5>
            </a>
        </div>
        <div class="d-flex justify-content-between text-center m-2 bg-danger">
            <i class='fi fi-ss-logout text-light'></i>
            <a href="..\logout.php"class="btn text-light btn-sm p-2">Logout</a>
        </div>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
</nav>

<script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
