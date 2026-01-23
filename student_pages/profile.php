<?php 
include('student_header.php');
include('../connection.php');

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$username = $_SESSION['username'];
$upload = false;

// Fetch student details
$query = "SELECT * FROM student_registrations WHERE username = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$student = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);

// Handle Image Upload
if (isset($_POST['submit'])) {
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = "profileimages/" . $image;

        $query = "INSERT INTO profile_imgs (image, username) VALUES (?, ?)";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $image, $username);
        $upload = mysqli_stmt_execute($stmt) && move_uploaded_file($tmp_name, $folder);
        mysqli_stmt_close($stmt);
    }
}

// Handle Image Update
if (isset($_POST['update'])) {
    if (!empty($_FILES['image']['name'])) {
        $image = basename($_FILES['image']['name']);
        $tmp_name = $_FILES['image']['tmp_name'];
        $folder = "profileimages/" . $image;
        
        $query = "UPDATE profile_imgs SET image = ? WHERE username = ?";
        $stmt = mysqli_prepare($con, $query);
        mysqli_stmt_bind_param($stmt, "ss", $image, $username);
        $upload = mysqli_stmt_execute($stmt) && move_uploaded_file($tmp_name, $folder);
        mysqli_stmt_close($stmt);
    }
}

// Handle Image Delete
if (isset($_POST['delete'])) {
    $query = "DELETE FROM profile_imgs WHERE username = ?";
    $stmt = mysqli_prepare($con, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    $upload = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

// Fetch Profile Image
$query = "SELECT * FROM profile_imgs WHERE username = ?";
$stmt = mysqli_prepare($con, $query);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$profileImage = mysqli_fetch_assoc($result);
mysqli_stmt_close($stmt);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Page | Hostel Management System</title>
    <style>
        .profile-c {
            max-width: 500px;
            width: 350px;
            height: 300px;
            max-height: 350px;
            overflow: hidden;
            background-image: url('https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png');
            background-size: cover;
        }
    </style>
</head>
<body>
    <div class="container mt-5 d-flex justify-content-around align-items-center">
        <div class="d-flex justify-content-center align-items-center p-4">
            <div>
                <div class="profile-c">
                    <?php if ($profileImage): ?>
                        <img src="profileimages/<?php echo htmlspecialchars($profileImage['image']); ?>" class="img-fluid w-100 h-100 object-fit-cover" alt="Profile Picture">
                    <?php endif; ?>
                </div>
                <div class="ml-2 mt-4">
                    <form method="POST" enctype="multipart/form-data">
                        <input type="file" class="form-control" name="image" required>
                        <div class="mt-2">
                            <?php if (!$profileImage): ?>
                                <input type="submit" class="btn btn-primary" name="submit" value="Upload">
                            <?php else: ?>
                                <button type="submit" class="btn btn-primary m-2" name="update">Update</button>
                                <button type="submit" class="btn btn-danger m-2" name="delete">Remove</button>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="ms-5">
                <h4 class="fw-bold"><?php echo htmlspecialchars($student['full_name']); ?></h4>
                <p class="text-muted">Email: <?php echo htmlspecialchars($student['email']); ?></p>
                <p class="text-muted">Phone: <?php echo htmlspecialchars($student['number']); ?></p>
                <form action="" method="POST">
                    <h5 class="text-center text-dark">Edit Password</h5>
                    <input type="text" class="form-control m-2" name="username" value="<?php echo htmlspecialchars($username); ?>" readonly>
                    <input type="password" class="form-control m-2" name="password" value="<?php echo htmlspecialchars($student['password']); ?>" required>
                    <button type="submit" class="btn btn-primary m-3 w-50" name="edit">Edit</button>
                </form>
            </div>
        </div>
    </div>
    <?php include('student_footer.php'); ?>
</body>
</html>
