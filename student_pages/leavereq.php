<?php include('..\connection.php'); ?>
<?php include('student_header.php');?>
<?php 
    // session_start();
    $name = $_SESSION['username'];
    $frl = "select * from leave_request where username ='$name'";
    $result = mysqli_query($con, $frl);

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Leave Request</title>
</head>
<body>
    <div class="container d-flex justify-content-between text-center bg-primary p-3 mt-5">
        <div>
           <h4 class="text-light"> leave Applications </h4>
        </div>
        <div>
            <a class="nav-link text-light" href="leave.php">new request</a>
        </div>
    </div>
    <div style="min-height: 70vh;" class="container mt-5">
        <?php 
            if($result){
                echo '<table class="table w-100 container mt-5 table-striped table-bordered">';  
                echo '<thead class="table-dark">';  
                echo '<tr>';  
                echo '<th>student Name</th>';  
                echo '<th>username</th>';  
                echo '<th>room No</th>'; 
                echo '<th>leave type</th>'; 
                echo '<th>department</th>'; 
                echo '<th>start date</th>'; 
                echo '<th>End Date</th>'; 
                echo '<th>Reason</th>'; 
                echo '<th>guardian contact</th>';
                echo '<th>Status</th>';
                echo '<th>action</th>';
                echo '</tr>';  
                echo '</thead>';  
                echo '<tbody>'; 
                while ($row = mysqli_fetch_array($result)) { 
                    echo '<tr>';  
                    echo '<td>' . $row['name'] . '</td>';  
                    echo '<td>' . $row['username'] . '</td>';  
                    echo '<td>' . $row['room_no'] . '</td>';
                    echo '<td>' . $row['leave_type'] . '</td>';  
                    echo '<td>' . $row['department'] . '</td>'; 
                    echo '<td>' . $row['from_date'] . '</td>';  
                    echo '<td>' . $row['to_date'] . '</td>';  
                    echo '<td>' . $row['reason'] . '</td>'; 
                    echo '<td>' . $row['guardian_contact'] . '</td>';
                    if( $row['status'] == 'pending'){
                        echo"<td><buuton class='btn btn-warning'>Pending</button></id>";
                    }else{
                        echo"<td><buuton class='btn btn-success'>Confirmed</button></id>";
                    };
                    echo "<td class='d-flex justify-content-center text-center gap-2'>";
                    echo '<a class="btn btn-primary" href="updateleavereq.php?id='.$row['id'].'">Edit</a>';
                    echo '<a class="btn btn-danger" href="leavedelete.php?id='.$row['id'].'">delete</a>';
                    echo '</td>';
                    echo '</tr>';  

                }  
                echo '</tbody>';  
                echo '</table>';  
            }else{
                echo "<h3>No any request for leave </h3>";
            }
        ?>
    </div>
    <?php include('student_footer.php'); ?>
</body>
</html>

