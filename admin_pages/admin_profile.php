<?php include("admin.php"); ?>
<?php include("../connection.php"); ?>
<?php
    $username = $_SESSION['username'];
    $upload = false;

    $qimg ="SELECT * FROM `admin` WHERE username = '$username'";
    $rimage = mysqli_query($con, $qimg);
    $row = mysqli_fetch_array($rimage);

    $fullname = $row['full_name'];
    $number = $row['number'];
    $email = $row['email'];
    $username = $row['username'];
    $password = $row['password'];


    if (isset($_POST['submit'])) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = 'admin_profile/' . $image;

        $qimg = "INSERT INTO admin_profile (`image`, `username`) VALUES ('$image','$username')";
        $rimage = mysqli_query($con, $qimg);
        move_uploaded_file($tmp_name, $folder);

        if ($rimage) {
            echo "<div class='alert alert-success text-center'>Image Uploaded Successfully</div>";
            $upload = true;
        } else {
            echo "<div class='alert alert-danger text-center'>Image Not Uploaded</div>";
        }
    }

    if (isset($_POST['delete'])) {
        $daf = "DELETE FROM admin_profiles WHERE username = '$username'";
        $result = mysqli_query($con, $daf);
        if ($result) {
            echo "<div class='alert alert-success text-center'>Image Deleted Successfully</div>";
        } else {
            echo "<div class='alert alert-danger text-center'>Image Not Deleted</div>";
        }
    }  

    if (isset($_POST['edit'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $update = "UPDATE admin SET password = '$password' WHERE username = '$username'";
        $result = mysqli_query($con, $update);

        if($result){
            echo "<div class='alert alert-success text-center'>username or password Updated Successfully</div>";
        }else{
            echo "<div class='alert alert-danger text-center'> username or Password Not Updated</div>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Profile</title> 
    <link rel="stylesheet" href=..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css>
    <!-- Bootstrap CSS -->
    <style>
        .profile-card {
            max-width: 400px;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .profile-img {
            width: 100%;
            height: 30vh;
            border-radius: 2px;
            object-fit: cover;
            border: 5px solid #fff;
            overflow: hidden;
            margin-right: 10px;
            background-image: url(https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png);
            background-size: cover;
        }
        .ebtn{
            background: #000;
            color: white;
            }

    </style>
</head>
<body class="bg-light">
    

<div class="container mt-5">
    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center bg-primary p-3 text-white rounded">
        <h4 class="mb-0">My Profile</h4>
        <div>
            <a href="admin_register.php" class="nav-link text-white">+ Admin</a>
        </div>
    </div>

    <div class='container w-100 mt-3 p-3 d-flex justify-content-around align-items-center'>
        <div class='profile-card text-center'>
                <?php 
                    $query = "SELECT * FROM admin_profile WHERE username = '$username'";
                    $result = mysqli_query($con, $query);
                    $count = mysqli_num_rows($result);

                    if ($count > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo "<img src='admin_profile/{$row['image']}' class='profile-img' alt='Profile Picture'>";
                    } else {
                        echo "<img src='https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png' class='profile-img' alt='Default Profile'>";
                    }
                ?>
                 <form method="POST" enctype="multipart/form-data" class="mt-3">
                    <input type="file" class="form-control mb-2" name="image">

                        <?php 
                            if ($count < 1 || $upload) {
                                echo "<button type='submit' class='btn btn-primary w-100' name='submit'>Upload</button>";
                            } else {
                                echo "<div class='d-flex justify-content-between'>";
                                echo "<button type='submit' class='btn btn-success w-50 me-2' name='update'>Update</button>";
                                echo "<button type='submit' class='btn btn-danger w-50' name='delete'>Remove</button>";
                                echo "</div>";
                            }
                ?>
            </form>
        </div>
        <div class='ms-5 d-flex justify-content-between'>
            <div class='m-5'>
                <h4 class='fw-bold'><?php echo $fullname; ?></h4>
                <p class='text-muted'><?php echo $email; ?></p>
                <p class='text-muted'><?php echo $number; ?></p>
            </div>
            <div class='bg-white text-light p-3 '>
            <form action="" method='POST'>
                <h5 class='text-center text-dark'>Edit Password</h5>
                <div>
                    <input type="text" class="form-control m-2" name='username' placeholder='Your username' value='<?php echo $username; ?>' readonly>
                </div>
                <div class="position-relative">
                <input type="password" class="form-control m-2" value='<?php echo $password; ?>' name='password' id="password" placeholder='Edit your password' required>
                <button type="button" class="btn btn-outline-secondary position-absolute top-50 end-0 translate-middle-y border-0" onclick="togglePassword()">
                👁
                </button>
</div>
                <div>
                    <button type='submit' class='btn btn-primary m-3 w-50 text-uppercase text-center' name='edit'>Edit</button>
                </div>
            </form>

            </div>
        </div>
    </div>
</div>
    
<script>
    function togglePassword() {
        var passwordInput = document.getElementById("password");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
        } else {
            passwordInput.type = "password";
        }
    }
</script>

<script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
