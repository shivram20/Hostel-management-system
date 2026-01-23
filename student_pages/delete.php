<?php 
include("..\connection.php");
$id = $_GET['id'];
$query = "DELETE FROM `complaints` WHERE c_id = $id";
$result = mysqli_query($con,$query);
if($result){
    echo "<script>";
    echo "alert('complaits Deleted Successfully');"; // PHP value inside JavaScript
    echo "</script>";
    header("location:complains.php");
}else{
    echo"<script>";
    echo"alert('failed to delete complait try again');";
    echo"</script>";
    header("location:complains.php");
}
?>
