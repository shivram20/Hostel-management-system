<?php include("admin.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href=..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css>
    <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css">
</head>
<body> 
    <div class="container d-flex justify-content-between align-items-center bg-primary mt-5 p-2">
        <h6 class='text-light'>complains Management</h6>
        <div class='d-flex justify-content-between align-items-center'>
            <div class="input-group w-75 d-flex align-items-center">
                <input type="text" name='search' class="form-control w-50 m-3" placeholder="search">
                <button name='search' class="btn btn-primary"><i class="fa-solid fa-magnifying-glass text-light"></i> </button>
            </div>
           <div class='d-flex justify-content-between align-items-center'>
                <a href="resolved_done.php" class="submit text-light text-decoration-none p-3">resolved</a>
                <a href="resolved.php" class="submit text-light text-decoration-none p-3">Processed</a>
           </div>
        </div>
    </div>
    
<script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>