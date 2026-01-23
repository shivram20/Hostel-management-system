<?php include("../connection.php");?>
<?php include('admin.php'); ?>
<?php 
    $id = $_GET['id'];
    $uquery = "update complaints set c_action='resolved' where c_id='$id'";
    $urs = mysqli_query($con, $uquery);

    if($urs){
        echo "<script>";
        echo "alert('complaits resolved Successfully');"; // PHP value inside JavaScript
        echo "</script>";
        header("location:resolved.php");
    }

?>