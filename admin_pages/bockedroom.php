<?php include('admin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>new room adding page</title>
</head>
<body>
        <div class="container mt-5">
            <div class="table-container">
                <div class="bg-primary p-3 d-flex justify-content-between align-items-center mb-3">
                    <div class='d-felx justify-content-between align-items-center'>
                        <h4 class="text-white">All Rooms</h4>
                        <div class='d-flex gap-3'>
                            <a href='addroom.php' class='btn nav-link text-light'>Add_Room</a>
                            <a href='bockrequest.php' class='btn nav-link text-light'> Request</a>
                            <a href="bockedroom.php" class="btn nav-link text-dark">Allocated </a> 
                        </div>
                    </div>
                    <form action="" method="post" class="d-flex search-box">
                        <input type="text" name="search" class="form-control me-2" placeholder="Search Room No..." required>
                        <button name="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div> 
        </div> 

        <div class="container">
            <div class="table-container">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Full Name</th>
                            <th scope="col">Room No</th>
                            <th scope="col">Contact</th>
                            <th scope="col">Department</th>
                            <th>request</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                            $sql = "SELECT * FROM roomallocation WHERE status = 'approved'";
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
                                    echo "<td><button type='submit' name='confirm' class='btn btn-success'>Confirmed</button></td>";
                                    echo "</form>";
                                    echo "</tr>";
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