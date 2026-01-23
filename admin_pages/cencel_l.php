<?php include('../connection.php'); ?>
<?php include('admin.php'); ?>

<?php   
    $lr = "SELECT * FROM leave_request WHERE status = 'canceled'";
    $rc = mysqli_query($con, $lr);

    if(isset($_POST['confirm'])){
        $rid = $_POST['request_id'];
        $query = "UPDATE leave_request SET status = 'approved' WHERE id = '$rid'";
        $rrr = mysqli_query($con,$query);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Canceled Leave Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div style='min-height:72vh;' class="container">
    <div class="container-fluid bg-primary text-light p-3 d-flex justify-content-between align-items-center mt-4">
        <h4 class="m-0">Leave Management</h4>      
        <div class='d-flex gap-3'>
            <a href="request.php" class="text-light text-decoration-none btn btn-success "><BOLD>Canceled</BOLD></a>
            <a href="approved.php" class="text-light text-decoration-none">Approved</a>
        </div>
    </div>

    <div class="m-1">
        <h2 class="text-center mb-4">Canceled Leave Requests</h2>

        <?php if (mysqli_num_rows($rc) > 0): ?>
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
                        <?php while ($row = mysqli_fetch_assoc($rc)): ?>
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
                                <td class="text-center">
                                    <form action="" method="post">
                                        <input type="hidden" name="request_id" value="<?= $row['id']; ?>">
                                        <button type='submit' name='confirm' class="btn btn-success btn-sm w-100 m-1 p-2">Confirm</button>
                                    </form>                     
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <h3 class="text-center text-muted">No canceled leave requests found</h3>
        <?php endif; ?>
    </div>
</div>
    <?php include('admin_footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
