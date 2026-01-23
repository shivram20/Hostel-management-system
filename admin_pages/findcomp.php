<?php include('admin.php');
    include("../connection.php");
?>
<?php 
    $id = $_GET['id'];
    $query = "select * from complaints where c_id = '$id'";
    $result = mysqli_query($con, $query);

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
        <h3>Result ....</h3>
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
        if(mysqli_num_rows($result) == 0){
            echo "<tr>";
            echo "<td colspan='5'>No Any Complains</td>";
            echo "</tr>";
        }else{
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>".$row['username']."</td>";
                echo "<td>".$row['category']."</td>";
                echo "<td>".$row['c_description']."</td>";
                echo "<td>".$row['c_date']."</td>";
                echo "<td>";
                echo "<a href='inprocess.php?id=".$row['c_id']."' class='btn btn-primary m-2'>InProcess</button></a>";            
                // echo '<a class="btn btn-primary" name="resolved.php?id='.$row['id'].'">Resolved</a>';
                echo "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>
    </div>
</body>
</html>