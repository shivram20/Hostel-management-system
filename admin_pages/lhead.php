<?php include("admin.php"); ?>
<?php include('../connection.php'); ?>

<?php 
    $q = "SELECT * FROM leave_request WHERE status = 'pending'";
    $al = mysqli_query($con, $q);

    if(isset($_POST['confirm'])){
        $rid = $_POST['request_id'];
        $query = "UPDATE leave_request SET status = 'approved' WHERE id = '$rid'";
        $rrr = mysqli_query($con,$query);
    }

    if(isset($_POST['cencel'])){
        $cid = $_POST['request_id'];
        $query = "UPDATE leave_request SET status = 'canceled' WHERE id = '$cid'";
        $rrr = mysqli_query($con,$query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leave Management</title>
    <link rel="stylesheet" href="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css">

</head>
<body class="bg-light">

    <div class="container-fluid bg-primary text-light p-3 d-flex justify-content-between align-items-center mt-4">
        <h4 class="m-0">Leave Management</h4>      
        <div class='d-flex gap-3'>
            <a href="cencel_l.php" class="text-light text-decoration-none">Canceled</a>
            <a href="approved.php" class="text-light text-decoration-none">Approved</a>
        </div>
    </div>

    <div class="m-1">
        <?php if (mysqli_num_rows($al) > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Student Name</th>
                            <th>Username</th>
                            <th>Room No</th>
                            <th>Contact No</th>
                            <th>Leave Type</th>
                            <th>Department</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Reason</th>
                            <th>Guardian Contact</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($al)): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['name']) ?></td>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= htmlspecialchars($row['room_no']) ?></td>
                                <td><?= htmlspecialchars($row['number']) ?></td>
                                <td><?= htmlspecialchars($row['leave_type']) ?></td>
                                <td><?= htmlspecialchars($row['department']) ?></td>
                                <td><?= htmlspecialchars($row['from_date']) ?></td>
                                <td><?= htmlspecialchars($row['to_date']) ?></td>
                                <td><?= htmlspecialchars($row['reason']) ?></td>
                                <td><?= htmlspecialchars($row['guardian_contact']) ?></td>
                                <td class="text-center d-flex">
                                    <form action="" method='post'>
                                        <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                        <button type='submit' name='confirm' class="text-decoration-none border-0 text-success">Confirm</button>
                                    </form>
                                    <form action="" method='post'>
                                        <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                        <button type='submit' name='cencel' class="text-decoration-none border-0 text-danger">Cancel</button>
                                    </form>
                                </td>                  
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <h3 class="text-center text-muted">No leave requests found</h3>
        <?php endif; ?>
    </div>

    <script src="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\js\bootstrap.bundle.min.js"></script>
</body>
</html>