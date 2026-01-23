<?php include("../connection.php"); ?>
<?php 

    if(isset($_POST['submit'])){
        $input = $_POST['search'];
        $query = "SELECT * FROM student_registrations WHERE username LIKE '%$input%' OR email LIKE '%$input%' OR number LIKE '%$input%' OR department LIKE '%$input%'";
        $result = mysqli_query($con, $query);
        $row =mysqli_fetch_array($result);
        $count = mysqli_num_rows($result);

        if($count <= 0){
            echo "<h5 class='text-center text-danger'>No Data Found</h5>";
        }else{
            $id = $row['s_id'];
            header("Location: receives.php?s_id=$id");
            exit();
        }

    }

    // $query = "SELECT * FROM student_registrations";
    // $result = mysqli_query($con, $query);
    // $row = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5 bg-primary d-flex justify-content-between align-items-center">
        <h2 class="text-light"> Registraterd Students</h2>
        <div >
            <form action="" method='post' class='d-flex justify-content-center align-items-center'>
                <input type="text" name='search' class="form-control w-75 m-3" placeholder="search" required>
                <button name='submit' class="btn btn-primary"><i class="fa-solid fa-magnifying-glass text-light"></i> </button>
            </form>
        </div>
    </div>
</body>
</html>