<?php include("../connection.php");?>
<?php 
    $fdoner = "select * from complaints where c_action = 'resolved'";
    $frs = mysqli_query($con, $fdoner);
    $row = mysqli_fetch_array($frs);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php include('cheader.php');?>
<div class="container mt-5">
        <table class="table table-bordered mt-5 w-75 ">
            <thead class="bg-light">
                <tr>
                    <th>Username</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($frs as $row) {
                        echo "<tr>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['category']."</td>";
                        echo "<td>".$row['c_description']."</td>";
                        echo "<td>".$row['c_date']."</td>";
                        echo "<td>";
                        echo '<a class="btn btn-success">Resolved successfully</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>