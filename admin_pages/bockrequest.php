<?php include("admin.php");?>

<?php 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new room adding page</title>
</head>
<body>
        <div class="container mt-5 p-3 bg-primary d-flex justify-content-between align-items-center">
                        <h4 class="text-white">Booking request</h4>
                        <div class='d-flex gap-3'>
                            <a href='addroom.php' class='btn nav-link text-light'>Add_Room</a>
                            <a href='bockrequest.php' class='btn nav-link text-dark'> Request</a>
                            <a href="bockedroom.php" class="btn nav-link text-light">Allocated </a> 
                        </div>
        </div> 

        <div class="container mt-5">
            <div class="table-container">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">student Name</th>
                            <th scope="col">Room No</th>
                            <th scope="col">contact</th>
                            <th scope="col">Department</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM roomallocation WHERE status = 'pending'";
                            $result = mysqli_query($con, $sql);
                            $count = mysqli_num_rows($result);

                            if($count > 0){
                                foreach ($result as $row) {
                                    echo "<tr>";
                                    echo "<td>" . $row["student_name"] . "</td>";
                                    echo "<td>" . $row["room_no"] . "</td>";
                                    echo "<td>" . $row["contact"] . "</td>";
                                    echo "<td>" . $row["department"] . "</td>"; 
                                    echo "<form action='' method='post'>";
                                    echo "<td><button type='submit' name='confirm' class='btn btn-success'>Confirm</button></td>";
                                    echo "</form>";
                                    echo "</tr>";
    
                                    if(isset($_POST['confirm'])){
        
                                        $fr = "SELECT * FROM rooms WHERE room_no = '$row[room_no]'";
                                        $frresult = mysqli_query($con, $fr);
                                        $frrow = mysqli_fetch_assoc($frresult);

                                        if($frrow['occupied'] == $frrow['capacity']){
                                            $urd = "UPDATE rooms SET status = 'full' WHERE room_no = '$row[room_no]'";
                                            $urdresult = mysqli_query($con, $urd);

                                            echo "<script>alert('Room is full')</script>";
                                            break;
                                        }

                                        $sql = "UPDATE roomallocation SET status = 'approved' WHERE username = '$row[username]'";
                                        $result = mysqli_query($con, $sql);

                                        if($result){

                                            $sqlfroom = "SELECT * FROM rooms WHERE room_no = '$row[room_no]'";
                                            $resultfroom = mysqli_query($con, $sqlfroom);
                                            $rowfroom = mysqli_fetch_assoc($resultfroom);

                                            $occupied = $rowfroom['occupied'] + 1;

                                            $sql = "UPDATE rooms SET occupied = '$occupied'  WHERE room_no = '$row[room_no]'";
                                            $resultu = mysqli_query($con, $sql);

                                            if($resultu){
                                                echo "<h5>Room Allocated Successfully</h5>";
                                            }
                                        }
                                    }
                                }
                            }else{
                                echo"Not request found";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
</body>
</html>