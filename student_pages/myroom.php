<?php 
// Include the student header and database connection
include('student_header.php'); 
include('../connection.php');  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>my room page</title>
</head>
<body>
    <div style='min-height:72vh;' class="container mt-5"> 
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title">Room Details</h4>
                    </div>
                    <div class="card-body">
                    <?php 

                        $frll = "select * from roomallocation where status = 'pending'";
                        $resultp = mysqli_query($con, $frll);
                        $rowp = mysqli_fetch_assoc($resultp);

                        $frllll = "select * from roomallocation where status = 'rejected'";
                        $resultr = mysqli_query($con, $frllll);
                        $rowr = mysqli_fetch_assoc($resultr);


                        if($row > 0){
                            echo "Room No: " . $row['room_no'] . "<br>";
                        }else if($rowp > 0){
                            echo "Your request is pending";
                        }else if($rowr){
                            echo "request is rejected";
                        }else{

                        }

                        $name = $_SESSION['username'];
                        $frl = "select * from roomallocation where username = '$name' and status = 'approved'";
                        $result = mysqli_query($con, $frl);
                        $row = mysqli_fetch_assoc($result);

                        if($row > 0){
                            echo "Student Name: " . $row['student_name'] . "<br>";
                            echo "Room No: " . $row['room_no'] . "<br>";
                            echo "Contact: " . $row['contact'] . "<br>";
                            echo "Department: " . $row['department'] . "<br>";
                        }
                    ?>
                    </div>
                </div>
                  
            </div>
        </div>
    </div>

    
<?php include('student_footer.php'); ?>
</body>
</html>