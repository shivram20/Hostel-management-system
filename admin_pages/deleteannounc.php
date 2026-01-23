<?php 
include("..\connection.php");
$id = $_GET['id'];
$query = "DELETE FROM `announcements` WHERE a_id = $id";
$result = mysqli_query($con,$query);
if($result){
    echo "<script>";
    echo "alert('Announcement Deleted');"; // PHP value inside JavaScript
    echo "</script>";
    header('location: announcementpage.php');
}else{
    echo"<script>";
    echo"alert('failed to delete try again');";
    echo"</script>";
    header('location: announcementpage.php');
}
?>
