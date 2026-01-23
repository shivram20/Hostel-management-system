<?php include("admin.php");?>
<?php include("../connection.php");?>

<?php 
    $query = "SELECT * FROM `feedback_db`";
    $result = mysqli_query($con,$query);
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Feedback Page</title>
    <link rel="stylesheet" href=..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css>
</head>
<body>

        <!-- Main Content -->
        <div class=" mt-5 mb-5 container">
            <h2 class="text-center">Feedback Management</h2>
            <table class="table table-bordered mt-5 w-75 ">
            <thead class="bg-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Message</th>
                    <th>Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach ($result as $row) {
                        echo "<tr>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>".$row['message']."</td>";
                        echo "<td>".$row['date']."</td>";
                        echo "<td>";
                        echo"</div>"; echo'<a class="text-decoration-none p-3" href="deletefeedback.php?id='.$row['id'].'">Delete</a>';
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
            <?php 
                if($count == 0){
                    echo "<div class='bg-light w-50 p-3'>";
                    echo"<div class='d-flex justify-content-between align-items-center'>";
                    echo"<h3>  Not any Feedback ";
                    echo"</div>";
                    echo "</div>";
                }
            ?>  
        </div>

    <!-- Reply Modal -->
    <div class="modal fade" id="replyModal" tabindex="-1" aria-labelledby="replyModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="replyModalLabel">Reply to Feedback</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="replyMessage" class="form-label">Your Response</label>
                            <textarea class="form-control" id="replyMessage" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Send Reply</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
<script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>
