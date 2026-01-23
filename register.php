<?php include('connection.php'); ?>

<?php
    $showalerti = false;
    $showalertu = false;
    $showalerte = false;
    if(isset($_POST['submit']))
    {   
        $fullname = $_POST['fullname'];
        $address = $_POST['address'];
        $birth_date = $_POST['birth_date'];
        $gender = $_POST['gender'];
        $userEmail = $_POST['email'];
        $number = $_POST['number'];
        $department = $_POST['department'];
        $userName = $_POST['uname'];
        $password = $_POST['pass'];
        
        $token = bin2hex(random_bytes(20));



        $query ="select * from student_registrations";
        $un= mysqli_query($con,$query);
        $row = mysqli_fetch_array($un);

        if($number == $row['number'])
        {
            $showalerti = true;
        }
        elseif($userName == $row['username'])
        {
        
            $showalertu = true;
        }
        elseif($userEmail == $row['email'])
        {
            $showalerte = true;
        }
        else
        {
            $queryi = "INSERT INTO `student_registrations`(`full_name`, `address`, `birth_date`, `gender`, `email`, `number`, `department`, `username`, `password`,`token`) VALUES ('$fullname','$address','$birth_date','$gender','$userEmail','$number','$department','$userName','$password','$token')";
            $result = mysqli_query($con,$queryi);

            if($result)
            {
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
    <title>Registration page of hostel management system</title>
    <link rel="stylesheet" href=bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css>
    <style>
         body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
        }
    </style>
</head>
<body>
<div class="container mt-5 p-3">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header text-center text-white py-3 rounded-top">
            <h3 class="mb-0 text-primary">Fill Up Form for Registration</h3>
        </div>
        <div class="card-body p-4">
            <form action="" method="post" >

                <div class="row">
                    <!-- Left Column -->
                    <div class="col-md-6">

                        <!-- Full Name -->
                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control form-control" name="fullname" placeholder="Enter your fullname" required>
                        </div>

                        <!-- Date of Birth -->
                        <div class="mb-3">
                            <label for="pincode" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control form-control" id="pincode" name="birth_date" required>
                        </div>

                        <!-- Gender -->
                        <div class="mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select id="gender" class="form-control form-control-sm" name="gender" required>
                                <option value="">Select</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Phone Number -->
                        <div class="mb-3">
                            <label class="form-label">Phone Number</label>
                            <input type="text" class="form-control form-control" name="number" placeholder="Enter number" required>
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Select Department</label>
                            <select id="department" class="form-control form-control" name="department">
                                <option value="">Select Course</option>
                                <option value="ba">Bachelor of Arts (BA)</option>
                                <option value="ma">Master of Arts (MA)</option>
                                <option value="bca">Bachelor of Computer Applications (BCA)</option>
                                <option value="mca">Master of Computer Applications (MCA)</option>
                                <option value="bsc">Bachelor of Science (BSc)</option>
                                <option value="msc">Master of Science (MSc)</option>
                            </select>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="col-md-6">

                        <!-- Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <textarea id="address" name="address" class="form-control form-control" rows="3" placeholder="Enter your address"></textarea>
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label class="form-label">Enter Email</label>
                            <input type="email" class="form-control form-control" name="email" placeholder="Enter email" required>
                            <?php if(isset($showalerte) && $showalerte): ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <small>Email already exists.</small>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Department Selection -->
                       

                        <!-- Username -->
                        <div class="mb-3">
                            <label class="form-label">Enter Username</label>
                            <input type="text" class="form-control form-control" name="uname" placeholder="Enter username" required>
                            <?php if(isset($showalertu) && $showalertu): ?>
                                <div class="alert alert-danger mt-2" role="alert">
                                    <small>Username already exists.</small>
                                </div>
                            <?php endif; ?>
                        </div>
                        <br>
                        <!-- Password -->
                        <div class="mb-3">
                            <label class="form-label">Enter Password</label>
                            <input type="password" class="form-control form-control" name="pass" placeholder="Enter password" required>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="d-grid d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-50 text-uppercase fw-bold py-2" name="submit">Register</button>
                </div>

                <!-- Login Link -->
                <p class="text-center mt-3">Already have an account? <a href="login.php" class="text-decoration-none">Login</a></p>

            </form>
        </div>
    </div>
</div>

    <script src="bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.min.js"></script>
</body>
</html>

