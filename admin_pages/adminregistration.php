<?php
include('connection.php');

if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $hostel_name = $_POST['hostel_name'];

    $query = "INSERT INTO `admin_registration`(`username`, `email`, `phone`, `hostel_name`,`password`) VALUES ('$username','$email','$phone','$hostel_name','$password')";
    $result = mysqli_query($con, $query);

    if($result){
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>    
    <link rel="stylesheet" href="bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-primary text-white text-center">
                    <h3>Admin Registration</h3>
                </div>
                <div class="card-body">
                    <form method="post">
                        <div class="mb-3">
                            <label class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" class="form-control" name="phone" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Hostel Name</label>
                            <input type="text" class="form-control" name="hostel_name" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    Already have an account? <a href="login.php">Login Here</a>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.min.js"></script>
</body>
</html>
