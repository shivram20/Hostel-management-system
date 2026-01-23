<?php include('student_header.php');?>
<?php include('..\connection.php');?>
<?php
    $showalert = false;
    if(isset($_POST['submit']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $query = "INSERT INTO `feedback_db` (`name`,`email`,`message`) VALUES ('$name','$email','$message')";
        $result = mysqli_query($con,$query);
        if($result)
        {
            $showalert = true;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>feedback page of hostel management system</title>
    <style>
        body {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
        }
        .container {
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            color: black;
        }
        .submit {
            background: #2575fc;
            border: none;
            transition: 0.3s;
        }
        .conttainer{
            width: 600px;
            height: 600px;
            margin: auto;
            margin-top: 50px;
            margin-bottom: 50px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            background-color: #fff;
            padding: 20px;
            text-align: start;
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 16px;
        }
    </style>
<head>
<body>
    <?php
    if($showalert){
        echo "<script>";
        echo "alert('Feedback Sent Successfully');"; // PHP value inside JavaScript
        echo "</script>";
    }
        
    ?>
    <form action="" method="post" class="conttainer mt-5 border border-primary">
            <h3 class="rt text-center mt-3 bg-primary p-3 mb-5 text-light">Feedback Form</h3>
                <label class="form-label ml-5 d-block">Enter Name</label>
                <input type="text" class="form-control  ml-5 w-75" name="name" required>

                <label class="form-label ml-5 d-block">Enter Email</label>
                <input type="text" class="form-control  ml-5 w-75" name="email" required>
            <div class="mb-3 mt-3 ml-5">
                <label for="message" class="form-label">Your Message</label>
                <textarea class="form-control w-75" id="message" name="message" rows="4" placeholder="Type your message here..."></textarea>
            </div>
          
            <div class="d-flex justify-content-center mb-3">
                <input type="submit" class="submit mt-5 form-control d-block bg-primary w-50 p-3 font-weight-bold text-uppercase text-light" name="submit"> 
            </div>   
        </form>
        
    <?php include('student_footer.php'); ?>
</body>
</html>