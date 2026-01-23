<?php  
    include('../connection.php');
    include('admin.php');

    $id = $_GET['id'];

    $ff = "delete from feedback_db where id = '$id'";
    $fr = mysqli_query($con, $ff);
    
    header("Location: admin_feedbacks.php");
?>