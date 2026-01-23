<?php include("admin.php"); ?>
<?php include("../connection.php"); ?>

<?php 
    $query = "SELECT * FROM student_registrations";
    $rs = mysqli_query($con, $query);
    $row = mysqli_num_rows($rs);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrations</title>
</head>
<body class="bg-light">
    <?php include('sh.php');?>
    <div class="container mt-5">
        <table class="table table-bordered mt-5 w-100">
            <thead class="bg-light">
                <tr>
                    <th>Full_Name</th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>borth_date</th>
                    <th>Gender</th>
                    <th>Email</th>                  
                    <th>department</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($rs as $row) {
                        echo "<tr>";
                        echo "<td>".$row['full_name']."</td>";
                        echo "<td>".$row['address']."</td>";
                        echo "<td>".$row['number']."</td>";                      
                        echo "<td>".$row['birth_date']."</td>";
                        echo "<td>".$row['gender']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['department']."</td>";
                        echo "<td>".$row['username']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</html>
