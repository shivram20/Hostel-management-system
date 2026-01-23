<?php 
    include('..\connection.php');

    $id = $_GET['id'];
    $delete = "delete from leave_request where id = '$id'";
    $result = mysqli_query($con, $delete);
    echo "<script>alert('Leave Request Delete Successfully');</script>";
    header("location:leavereq.php");
?>