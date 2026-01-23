<?php include('student_header.php'); ?>
<?php include("..\connection.php");?>
<?php 
    $name = $_SESSION['username'];
    if(isset($_POST['submit'])){
        $username= $_POST['username'];
        $dics= $_POST['description'];
        $cat= $_POST['category'];

        $query = "INSERT INTO `complaints`(`username`, `category`, `c_description`, `c_date`, `c_action`) VALUES ('$username','$cat','$dics',current_timestamp(),'pending');";
        $result = mysqli_query($con,$query);

        if($result){
            echo "<script>";
            echo "alert('complaits Sent Successfully');"; // PHP value inside JavaScript
            echo "</script>";
        }else{
            echo"<script>";
            echo"alert('failed to register complait try again');";
            echo"</script>";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complaint Management</title>
    <style>
          body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
        }
        .ff{
            border-radius:1rem;
            color:black;
        }
        .ee{
            border-left:2px solid red;
            color:red;
        }
    </style>
</head>
<body>
    
    <form action="" method="post" class="container mt-5 ff bg-white p-3">
            <h3 class="rt text-center mt-3 bg-primary p-3 mb-5 text-light">Complains Form</h3>
                <label class="form-label ml-5 d-block">Username</label>
                <input type="text" name="username" placeholder="Enter username" required class="form-control" />
                <br>
                <label class="form-label ml-5 d-block">Description</label>
                <textarea name="description" placeholder="Enter Description" required class="form-control"></textarea>
                <br>
                <div class="mb-3">
                    <label for="form-label d-block"> Category</label>
                    <select name="category" required class="form-select">
                        <option> select type</option>
                        <option value="Food">Food</option>
                        <option value="Maintenance">Maintenance</option>
                        <option value="Cleanliness">Cleanliness</option>
                        <option value="Security">Security</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
          
            <div class="d-flex justify-content-center mb-3">
                <input type="submit" class="submit mt-5 form-control d-block bg-primary w-50 p-3 font-weight-bold text-uppercase text-light" name="submit"> 
            </div>   
        </form>
    
        <?php
            $sql = "select * from complaints where username = '$name'";
            $r = mysqli_query($con,$sql);
            // $row = mysqli_fetch_array($r); 
            $count = mysqli_num_rows($r);

            if($count >0){
                echo '<table class="table w-100 container mt-5 table-striped table-bordered">';  
                    echo '<thead class="table-dark">';  
                    echo '<tr>';  
                    echo '<th>Username</th>';  
                    echo '<th>Description</th>';  
                    echo '<th>Category</th>'; 
                    echo '<th>Date</th>';
                    echo '<th>Actions</th>'; 
                    echo '</tr>';  
                    echo '</thead>';  
                    echo '<tbody>';  

                    while ($row = mysqli_fetch_assoc($r)):
                        echo '<tr>';  
                                echo '<td>' . $row['username'] . '</td>';  
                                echo '<td>' . $row['c_description'] . '</td>';
                                echo '<td>' . $row['category'] .'</td>';  
                                echo '<td>' . $row['c_date'] . '</td>'; 
                                if($row['c_action'] == 'in process'){
                                    echo "<td><button class='btn btn-warning'>proccessing </button></td>";
                                }else if($row['c_action'] == 'resolved'){
                                    echo "<td><button class='btn btn-success'>resolved successfully </button></td>";
                                }else if($row['c_action'] == 'pending'){
                                    echo "<td><button class='btn btn-danger'>pending </button></td>";
                                 }else{
                                    echo '<td><div class="d-flex justify-content-center"> <a href="delete.php?id='.$row['c_id'].'" class="btn btn-danger me-2">Delete</a><a href="update.php?id='.$row['c_id'].'" class="btn btn-primary">Update</a> </div></td>';
                                 }
                        echo '</tr>';
                    endwhile;
            }else{
                echo "<div class='container mt-5 ee'> 
                    <h4>No Complaints </h4>
                </div>";
            }

        ?>
    </table>
    <?php include('student_footer.php'); ?>
</body>
</html>