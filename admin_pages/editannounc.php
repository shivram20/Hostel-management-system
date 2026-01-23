<?php include('admin.php');?>
<?php 

    include("../connection.php");
    $id= $_GET['id'];

    if(isset($_POST['submit'])){
        $sub= $_POST['subject'];
        $desc = $_POST['description'];   
        $date = $_POST['date']; 
        $qr = "UPDATE `announcements` SET `a_subject`='$sub',`a_description`='$desc',`a_date`= '$date' WHERE $id";
        $ru = mysqli_query($con,$qr);
    
        if($ru){
            echo "<script>";
            echo "alert('Announcement updated Successfully');"; // PHP value inside JavaScript
            echo "</script>";
            header("location:announcementpage.php");
        }else{
            echo"<script>";
            echo"alert('failed to update announcement try again');";
            echo"</script>";
            header("location:announcementpage.php");
        }
    }
   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update complains file</title>

</head>
<body>
<div class="container mt-5 card p-4 mb-4">
        <h2 class="mb-3  mt-5 ">Edit Anncouncement</h2>
        <form method="POST" action="">
            <div class="mb-3">
              <input type="id" class="form-control" value="<?php echo $id; ?>">
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" placeholder="Enter subjet" name="subject">
            </div>
            <div class="mb-3">
                <input type="date" class="form-control" placeholder="Enter date" name="date">
            </div>
            <div class="mb-3">
                <textarea name="description" value="<?php ?>" placeholder="Enter Description" required class="form-control"></textarea>
            </div>
            <input type="submit" class="submit mt-5 form-control d-block bg-primary w-50 p-3 font-weight-bold text-uppercase" name="submit"> 
        </form>
    </div>
</body>
</html>