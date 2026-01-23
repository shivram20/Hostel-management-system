<?php include("../connection.php");?>
<?php include('admin.php')?>
<?php 
    $query = "select * from complaints where c_action='pending'";
    $rs = mysqli_query($con, $query);
    $row = mysqli_fetch_array($rs);

    if(isset($_POST['submit'])){
        $input = $_POST['search'];
        $query = "SELECT * FROM complaints WHERE username LIKE '%$input%' OR category LIKE '%$input%' OR c_date LIKE '%$input%' OR c_action LIKE '%$input%'";
        $result = mysqli_query($con, $query);
        $row =mysqli_fetch_array($result);
        $id = $row['c_id'];
        header("location:findcomp.php?id=$id");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container d-flex justify-content-between align-items-center bg-primary mt-5 p-2">
        <h6 class='text-light'>complains Management</h6>
        <div class='d-flex justify-content-between align-items-center'>
            <div class="input-group w-100 d-flex align-items-center">
                <form class='input-group w-100 d-flex align-items-center' action="" method='post'>
                    <input type="text" name='search' class="form-control w-50 m-3" placeholder="search">
                    <button name='submit' class="btn btn-primary"><i class="fa-solid fa-magnifying-glass text-light"></i> </button>
                </form>
            </div>
           <div class='d-flex justify-content-between align-items-center'>
                <a href="resolved_done.php" class="submit text-light text-decoration-none p-3">resolved</a>
                <a href="resolved.php" class="submit text-light text-decoration-none p-3">Processed</a>
           </div>
        </div>
    </div>

    <div class="container mt-5">
        <h3>Pending Complains</h3>
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
        if(mysqli_num_rows($rs) == 0){
            echo "<tr>";
            echo "<td colspan='5'>No pending complains</td>";
            echo "</tr>";
        }else{
            foreach ($rs as $row) {
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