<?php include('admin.php'); ?>
<?php include("..\connection.php"); ?>
<?php 
    if(isset($_POST['submit'])){
        $sub = $_POST['subject'];
        $desc = $_POST['description'];
        $date = $_POST['date'];

        $query = "INSERT INTO `announcements`(`a_subject`,`a_description`) VALUES ('$sub','$desc')";
        $result = mysqli_query($con, $query);

        if($result){
            echo"<script>";
            echo "alert('Announcement Post Successfully')";
            echo"</script>";
            header('location:announcementpage.php');
        }else{
            echo"<script>";
            echo "alert('Announcement Post error try again')";
            echo"</script>";
            header('location:announcementpage.php');
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css">
</head>
<body>
    <?php include("nah.php");?>
        <form action="" method="post" class="container mt-5 border border-primary">
            <h3 class="rt text-center mt-3 bg-primary p-3 mb-5 text-light">New Announcement</h3>
                <label class="form-label ml-5 d-block">Subject</label>
                <input type="text" name="subject" placeholder="Enter username" required class="form-control" />
                <br>
                <label for="" class="form-label ml-5 d-block"></label>
                <input type="date" name="date" required class="form-control">
                <br>
                <label class="form-label ml-5 d-block">Description</label>
                <textarea name="description" rows="5" placeholder="Enter Description" required class="form-control"></textarea>

            <div class="d-flex justify-content-center mb-3">
                <input type="submit" class="submit mt-5 form-control d-block bg-primary w-50 p-3 font-weight-bold text-uppercase text-light" name="submit"> 
            </div>   
        </form>
    
</body>
</html>