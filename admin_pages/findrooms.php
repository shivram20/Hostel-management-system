<?php include("admin.php");?>
<?php include('../connection.php'); ?>

<?php 
    $id = $_GET['id'];
    $query = "select * from rooms where id = '$id'";
    $result = mysqli_query($con,$query);
    $c = mysqli_num_rows($result);
    $row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container mt-5">
        <h4>Result ....</h4>
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
                        foreach ($result as $row) {
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
</body>
</html>