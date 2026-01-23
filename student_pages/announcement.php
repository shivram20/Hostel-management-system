<?php include("student_header.php");?>
<?php include('..\connection.php');?>
<?php 
    $query = "SELECT * FROM announcements";
    $result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Announcements</title>
    <link rel="stylesheet" href="..\bootstrap-5.3.3-dist\bootstrap-5.3.3-dist\css\bootstrap.min.css">
    <link rel="stylesheet" href="..\uicons-solid-straight\css\uicons-solid-straight.css">
    <style>
          body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
        }
    </style>
</head>
<body>
    <div style='min-height:70vh' class="container mt-5">
        <h2 class="mb-4">Latest Announcements</h2>
        
        <?php if (mysqli_num_rows($result) > 0): ?>
            <ul class="list-group ">
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <li class="list-group-item mt-2">
                        <h5><?php echo htmlspecialchars($row['a_subject']); ?></h5>
                        <p><?php echo nl2br(htmlspecialchars($row['a_description'])); ?></p>
                        <small class="text-muted">Posted on: <?php echo $row['a_date']; ?></small>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p class="text-muted">No announcements available.</p>
        <?php endif; ?>
    </div>
    <?php include("student_footer.php");?>
</body>
</html>
