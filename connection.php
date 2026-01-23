<?php 
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "hms";
    $con = mysqli_connect($host, $user, $pass, $db);

    if($con){
        // echo "connected with database successfully";
    }else{
        echo"Not Connected successfully";
    }
?>