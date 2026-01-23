<?php include('..\connection.php');?>
<?php include('student.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details - Hostel Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-primary text-center">Student Details</h2>

        <!-- Upload Form -->
        <div class="card p-4 shadow-lg mt-4">
            <h4 class="text-primary">Upload Required Documents</h4>
            <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
            <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="text" class="form-control" name="name" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Email:</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Roll Number:</label>
                    <input type="text" class="form-control" name="roll_number" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload Document:</label>
                    <input type="file" class="form-control" name="document" required>
                </div>
                <button type="submit" class="btn btn-success">Upload</button>
            </form>
        </div>

        <!-- Display Student Details -->
        <div class="card mt-4 p-4 shadow-lg">
            <h4 class="text-primary">Student Records</h4>
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roll Number</th>
                        <th>Document</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?= $row["id"] ?></td>
                            <td><?= $row["name"] ?></td>
                            <td><?= $row["email"] ?></td>
                            <td><?= $row["roll_number"] ?></td>
                            <td><a href="uploads/<?= $row["document"] ?>" target="_blank">View Document</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
</body>
</html>