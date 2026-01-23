<?php include("admin.php");?>
<?php include('../connection.php'); ?>

<?php 
    $q= "SELECT * FROM `rooms`";
    $r= mysqli_query($con, $q);
    $row = mysqli_fetch_array($r);
    $c = mysqli_num_rows($r);
    


    if(isset($_POST['submit'])){
        $search = $_POST['search'];
        $qsearch= "SELECT * FROM rooms WHERE room_no LIKE '%$search%' OR floor_no LIKE '%$search%' OR capacity LIKE '%$search%' OR occupied LIKE '%$search%'";
        $rsearch= mysqli_query($con, $qsearch);
        $rowff = mysqli_fetch_array($rsearch);
        $id = $rowff["id"];
        header("location:findrooms.php?id=$id");

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>this is rooms management page</title>
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
                <a href="bockedroom.php" class="btn nav-link text-light">Allocated </a> 
             </div>
            </div>
            <form action="" method="post" class="d-flex search-box">
                <input type="text" name="search" class="form-control me-2" placeholder="Search Room No..." required>
                <button name="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <table class="table table-hover text-center">
            <thead>
                <tr class="table-primary">
                    <th>Room No</th>
                    <th>Floor No</th>
                    <th>Capacity</th>
                    <th>Occupied</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    if($c > 0){
                        foreach ($r as $row) {
                            $status_class = ($row['status'] == 'Available') ? 'status-available' : 'status-full';
                            echo "<tr>";
                            echo "<td>".$row['room_no']."</td>";
                            echo "<td>".$row['floor_no']."</td>";
                            echo "<td>".$row['capacity']."</td>";                      
                            echo "<td>".$row['occupied']."</td>";
                            echo "<td class='$status_class'>".$row['status']."</td>";
                            echo "</tr>";
                        }
                    
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
