<?php include("../connection.php");?>
<?php 
    $id = $_GET['id'];
    $query = "UPDATE `complaints` SET `c_action`='in process' WHERE c_id = '$id'";
    $result = mysqli_query($con, $query);

    $rs = mysqli_query($con, "select * from complaints where c_action = 'in process'");
    $row = mysqli_fetch_array($rs);

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
                    foreach ($rs as $row) {
                        echo "<tr>";
                        echo "<td>".$row['username']."</td>";
                        echo "<td>".$row['category']."</td>";
                        echo "<td>".$row['c_description']."</td>";
                        echo "<td>".$row['c_date']."</td>";
                        echo "<td>";
                        echo '<a class="btn btn-primary" href="resolved.php?id='.$row['c_id'].'">Resolved</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>