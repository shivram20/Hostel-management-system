<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>indexpage</title>
    <link rel="stylesheet" href="bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="uicons-solid-straight\css\uicons-solid-straight.css">
    <style>
        .logo{
            font-size: 30px;
            font-weight: bold;
        }
        .container{
            max-width: 100%;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btns{
            color:black;
            border:3px solid white;
            border-radius:0.5rem;
            font-weight:700;
            margin-left:1rem;  
        }
        .btns:hover{
            color:white;
            text-decoration:none;
            border:3px solid white;
        }
        .img{
            width: 100%;
            height: 90vh;
            object-fit: cover;
            filter: brightness(0.6);
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-between bg-primary ">
        <div class="left">
            <h2 class="logo text-light">Hostel Management System</h2>
        </div>
        <div class="right d-flex justify-content-between align-items-center">
            <a href="login.php" class="btns text-center text-light p-2">Login</a>
            <a href="register.php" class="btns text-center text-light p-2">Register</a>
        </div>
    </div>
    <img src="images/img.webp" alt="" class="img mt-1">

 
    <footer class="bg-dark text-light py-4 mt-5">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h5 class="fw-bold text-uppercase text-warning">🏨 Hostel Management System</h5>
            </div>
            <div class="col-12 mt-3">
                <div class="d-flex justify-content-center align-items-center gap-4">
                    <a href="#" class="text-light fs-4 p-2 rounded-circle bg-primary d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fi fi-brands-facebook"><a href=""></a></i>
                    </a>
                    <a href="#" class="text-light fs-4 p-2 rounded-circle bg-danger d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fi fi-brands-instagram"><a href=""></a></i>
                    </a>
                    <a href="#" class="text-light fs-4 p-2 rounded-circle bg-info d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                        <i class="fi fi-brands-linkedin"><a href=""></a></i>
                    </a>
                </div>
            </div>
            <div class="col-12 mt-4">
                <p class="mb-0 small">© 2025 Hostel Management System | All Rights Reserved</p>
            </div>
        </div>
    </div>
</footer>
    <script src="bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.min.js"></script>
</body>
</html>