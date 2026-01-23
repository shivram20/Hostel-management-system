<?php include('student_header.php'); ?>
<?php include('..\connection.php'); ?>
<?php 
    $id = $_GET['id'];
    $frl = "select * from leave_request where id = $id";
    $result = mysqli_query($con, $frl);
    $row = mysqli_fetch_array($result);

    if(isset($_POST['submit'])){
        $from_date = $_POST['from_date'];
        $to_date = $_POST['To_date'];
        $reason = $_POST['reason'];
        $gc = $_POST['guardian_contact'];

        $query = "UPDATE `leave_request` SET `from_date`='$from_date',`to_date`='$to_date',`reason`='$reason',`guardian_contact`='$gc' WHERE id = $id";
        $result = mysqli_query($con, $query);
        if($result){
            echo "<script>alert('Leave Request Updated Successfully')</script>";
            header("location:leavereq.php");
        }
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
    <div style='min-height: 68vh;' class="container shadow p-3">
        <h4 class=" bg-primary text-light p-2 text-center">Update Leave Request</h4>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id'];?>">
            <div class="d-flex justify-content-between gap-5 mt-3">
                <div class='w-75'>
                    <label class="form-label">From Date</label>
                    <input type="date" name="from_date" class="form-control" value="<?php echo $row['from_date'];?>" required>
                </div>
                <div class='w-75'>
                    <label class="form-label">To Date</label>
                    <input type="date" name="To_date" class="form-control" value="<?php echo $row['to_date'];?>" required>
                </div>
            </div>
            <div class="d-flex justify-content-between gap-5 mt-3">
                <div class='w-75'>
                <label class="form-label">Reason</label>
                <textarea name="reason" class="form-control" placeholder="Reason" rows="2" required><?php echo $row['reason'];?></textarea>
                </div>
                <div class='w-75'>
                <label class="form-label">Guardian Contact</label>  
                <input type="text" name="guardian_contact" class="form-control" placeholder="Guardian Contact" value="<?php echo $row['guardian_contact'];?>" required>
                </div>
            </div>
            <div class='d-flex justify-content-center align-items-center mt-5'>
                <button type="submit" name='submit' class="btn btn-primary w-50 text-uppercase">Submit</button>
            </div>
        </form>
    </div>
    
<?php include('student_footer.php'); ?>
</body>
</html>