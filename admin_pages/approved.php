<?php include('../connection.php'); ?>
<?php include('admin.php'); ?>

<?php 
    $frl = "SELECT * FROM leave_request WHERE status = 'approved'";
    $rl = mysqli_query($con, $frl);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmed Leave Requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container-fluid bg-primary text-light p-3 d-flex justify-content-between align-items-center mt-4">
        <h4 class="m-0">Leave Management</h4>      
        <div class='d-flex gap-3'>
            <a href="cencel_l.php" class="text-light text-decoration-none"><BOLD>Canceled</BOLD></a>
            <a href="approved.php" class="text-light text-decoration-none btn btn-success"><BOLD>Confirmed</BOLD></a>
        </div>
    </div>

    <div style='min-height:55vh;' class="m-1">
        <h2 class="text-center mb-4">Confirmed Leave Requests</h2>

        <?php if (mysqli_num_rows($rl) > 0): ?>
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
                        <?php while ($row = mysqli_fetch_assoc($rl)): ?>
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
                                <td class="bg-success m-1 text-center text-light"><?= htmlspecialchars($row['status']) ?></td>
                                </tr>
                                <!-- <tr>
                                    <td colspan="11" class="text-center">
                                        <a href="../sendmails/confirm_leave.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm w-25 m-1">Send Confirmation email to student</a>
                                        <a href="../sendmails/confirm_leave.php?id=<?= $row['id'] ?>" class="btn btn-success btn-sm w-25 m-1">Send Confirmation email to guardian</a>   
                                    </td>                                       
                                </tr> -->
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <h3 class="text-center text-muted">No confirmed leave requests found</h3>
        <?php endif; ?>
    </div>
    <?php include('admin_footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
