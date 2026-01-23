<?php include('student_header.php');?>
<?php 

    include("../connection.php");

    if(isset($_POST['submit'])){
        $decs = $_POST['description'];
        $cat = $_POST['category'];
    
        $id= $_GET['id'];
        $qr = "UPDATE `complaints` SET `c_description`='$decs',`category`='$cat' WHERE c_id ='$id'";
        $ru = mysqli_query($con,$qr);
    
        if($ru){
            echo "<script>";
            echo "alert('complaits updated Successfully');"; // PHP value inside JavaScript
            echo "</script>";
            header("location:complains.php");
        }else{
            echo"<script>";
            echo"alert('failed to update complait try again');";
            echo"</script>";
            header("location:complains.php");
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
        <h2 class="mb-3  mt-5 ">Submit a Complaint</h2>
        <form method="POST" action="">
            <div class="mb-3">
                <textarea name="description" placeholder="Enter Description" required class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <select name="category" required class="form-select">
                    <option> select type</option>
                    <option value="Food">Food</option>
                    <option value="Maintenance">Maintenance</option>
                    <option value="Cleanliness">Cleanliness</option>
                    <option value="Security">Security</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <input type="submit" class="submit mt-5 form-control d-block bg-primary w-50 p-3 font-weight-bold text-uppercase" name="submit"> 
        </form>
    </div>
</body>
</html>