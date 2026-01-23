<?php include('connection.php'); ?>
<?php 
      $showalert = false;
    if(isset($_POST['submit']))
    {
        $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $cpass = $_POST['cpass'];

        if($pass == $cpass){
            $query = "UPDATE `student_registrations` SET password = '$pass' WHERE username = '$uname'";
            $result = mysqli_query($con,$query);
            if($result){
                $showalert = true;
                header("location:login.php");
            }
        }
    }
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>resetpassword page of hostel management system</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
            <?php 
                if($showalert){
                    echo '<div class="alert alert-success text-center mt-3 mb-1 w-100 " role="alert">
                    <small class="text text-center">Password reset successfully</small>
                    </div>';
                }
            ?>
    <form action="" method="post" class="container mt-5 border border-warning">
        <h3 class="rt text-center mt-3 bg-warning p-3 mb-5"> Create a new password</h3>
        <label class="form-label ml-5 d-block">username</label>
        <input type="text" class="form-control ml-5 w-75" name="uname" required>
        <label class="form-label ml-5 d-block">password</label>
        <input type="text" class="form-control ml-5 w-75" name="pass" required>
        <label class="form-label ml-5 d-block">confirm password</label>
        <input type="password" class="form-control ml-5 w-75" name="cpass" required>

        <div class="d-flex justify-content-center mb-3">
            <input type="submit" class="submit mt-5 form-control d-block btn-warning w-50 p-3 font-weight-bold text-uppercase" name="submit"> 
        </div>   
    </form>
</body>
</html>    

