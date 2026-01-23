<?php include("../connection.php"); ?>
<?php include('admin.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <?php include('sh.php');?>
    <div class="container">
            <table class="table table-bordered mt-5 w-100 ">
            <thead class="bg-light">
                <tr>
                    <th>Full_Name</th>
                    <th>Address</th>
                    <th>Number</th>
                    <th>Pincode</th>
                    <th>Gender</th>
                    <th>Email</th>                  
                    <th>department</th>
                    <th>Username</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $id = $_GET['s_id'];
                    $fdoner = "select * from student_registrations where s_id = '$id'";
                    $frs = mysqli_query($con, $fdoner);
                    $row = mysqli_fetch_array($frs);

                    foreach ($frs as $row) {
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
  
</body>
</html>