<?php include('connection.php');?>
<?php 
    $showalert = false;
    if(isset($_POST['submit']))
    {
        $user = $_POST['user'];
        $pass = $_POST['upass'];
        $ut = $_POST['utype'];

        if($ut == 'student'){
            $squery = "select * from student_registrations where username = '$user' AND password = '$pass'";
            $aresult = mysqli_query($con,$squery);
            $arow = mysqli_fetch_array($aresult);
            $acount = mysqli_num_rows($aresult);

            if($acount == 1)
            {
                session_start();
                $_SESSION['username'] = $arow['username'];
                header("location:student_pages/s_dashboad.php");
            }else{
                $showalert = true;
            }

        }elseif($ut == 'admin'){
            $aquery = "select * from admin where username = '$user' AND password = '$pass'";
            $aresult = mysqli_query($con,$aquery);
            $arow = mysqli_fetch_array($aresult);
            $acount = mysqli_num_rows($aresult);

            if($acount == 1)
            {
                session_start();
                $_SESSION['username'] = $arow['username'];
                header("location:admin_pages/admin_dashboad.php");
            }else{
                $showalert = true;
            }
        }
    
    }
?>   

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page of hostel management system</title>
    <link rel="stylesheet" href=bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css>
    <style>
         body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
        }
        .ff{
            border-radius:1rem;
            color:black;
            padding:10px
        }
    </style>
</head>
<body>
    <form action="" method="post" class="container mt-5 bg-white ff">
        <h3 class="rt text-center text-white mt-3 bg-primary p-3 mb-5">Login Form</h3>
            <?php 
                if($showalert){
                    echo '<div class="alert alert-danger w-75 ml-5" role="alert">
                    <small class="text text-center">Invalid username or password</small>
                    </div>';
                }
            ?>
        <label class="form-label ml-5 d-block">Username</label>
        <input type="text" class="form-control ml-5 w-75" name="user" required>
        <label class="form-label ml-5 d-block">Password</label>
        <input type="password" class="form-control ml-5 w-75" name="upass" required>
        <select class="form-select form-control ml-5 w-25 mt-3" name="utype"aria-label="Default select example">
            <option selected value="student">student</option>
            <option value="admin">admin</option>
        </select>
        <p class="text text-start mt-3 ml-5"><a href="send-rl.php">Forgot-password-link</a></p>
        <div class="d-flex justify-content-center mb-3">
        <button type="submit" class="btn btn-primary w-50 text-uppercase fw-bold py-2" name="submit">Login</button>
        </div>   
        <p class="text text-center ">Don't have an account? <a href="register.php">Register</a></p>
    </form>
    <script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.min.js"></script>
</body>
</html>    

