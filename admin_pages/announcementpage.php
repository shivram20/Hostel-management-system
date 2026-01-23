<?php include('admin.php'); ?>
<?php include('..\connection.php');?>
<?php 
    $query = "select * from announcements";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_array($result);
    $id = -1 || $row['id'];
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css">
</head>
<body>
    <?php include('nah.php'); ?>
    <div class="container">

    <table class="table table-bordered mt-5 w-75 ">
            <thead class="bg-light">
                <tr>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>".$row['a_subject']."</td>";
                        echo "<td>".$row['a_description']."</td>";
                        echo "<td>".$row['a_date']."</td>";
                        echo "<td>";
                        echo '<div class="d-flex justify-content-between align-items-center">';
                        echo'<a class="text-decoration-none" href="editannounc.php?id='.$row['a_id'].'">Edit</a>';
                        echo'<a class="text-decoration-none p-3" href="deleteannounc.php?id='.$row['a_id'].'">Delete</a>';
                        echo'</div>';
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>