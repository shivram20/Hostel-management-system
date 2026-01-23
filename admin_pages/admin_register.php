<?php include("admin.php");?>
<?php include("../connection.php");?>
<?php 
    $admin = $_SESSION['username'];
    $see= false;
    $sue = false;
    $scp = false;

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['Email'];
        $fname = $_POST['fname'];
        $number = $_POST['number'];

            if($password != $confirm_password){
                $scp = true;
            }
            $fu = "select * from admin where username = '$username'";
            $fresult = mysqli_query($con,$fu);
            $count = mysqli_num_rows($fresult);
            if($count == 1){
                $sue = true;
            }

            $fe = "select * from admin where email = '$email'";
            $feresult = mysqli_query($con,$fe);
            $fcount = mysqli_num_rows($feresult);
            if($fcount == 1){
                $see = true;
            }else{
                $query = "INSERT INTO `admin`(`full_name`, `username`, `password`,`number`,`email`) VALUES ('$fname','$username','$password','$number','$email')";
                $result = mysqli_query($con, $query);
                if($result){
                    header("Location: admin_profile.php");
                }
            }

           
            
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin registration page of hostel management system</title>
    <link rel="stylesheet" href=..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css>
</head>
<body>

<form action="" method="post">
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h2 class="text-center">Admin Registration</h2>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="fulllName">Full_name</label>
                            <input type="text" class="form-control" name="fname" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="enail">Email:</label>
                            <input type="email" class="form-control" name="Email" required> 
                            <?php
                                if($see){
                                    echo"<h5 class='text-center text-danger'>Email Already Exists</h5>";
                                }
                            ?>
                        </div>
                        
                        <div class="form-group">
                            <label for="number">Number</label>
                            <input type="number" class="form-control" name="number" required> 
                        </div>
                        <div class="form-group">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" name="username" required>
                            <?php 
                                if($sue){
                                    echo"<h5 class='text-center text-danger'>Username Already Exists</h5>";
                                }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password:</label>
                            <input type="password" class="form-control" name="confirm_password" required>
                            <?php 
                                if($scp){
                                    echo"<h5 class='text-center text-danger'>Password Not Matched</h5>";
                                }
                            ?>
                        </div>
                       
                        <div class="form-group text-center =">
                            <button type="submit" class="btn btn-primary w-50 mt-3 text-uppercase fw-bold py-2" name="submit">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>