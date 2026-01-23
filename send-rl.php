<?php 
    include("connection.php");
?>
<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'phpmailer/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    $showalerts=false;
    $showalert=false;
    $showalertf=false;

    if(isset($_POST['submit'])){

        $email = $_POST['email'];
        $query = "SELECT email FROM registrations WHERE email='$email'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        
        if($count > 0){
            $token = bin2hex(random_bytes(50));
            $query = "UPDATE registrations SET token = '$token' WHERE email = '$email'";
            $result = mysqli_query($con,$query);
            if($result){
                $link = "http://localhost/hms/resetp.php?token=$token";
                $to = $email;
                $subject = "Password Reset Link";
                $body = "Click on the link to reset your password. <br> $link";
                $headers = "From: shivuvasava005@gmail.com";
                                
                try {
                    //Server settings
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'shivuvasava005@gmail.com';                     //SMTP username
                    $mail->Password   = 'ybqs wixn slmd vjtu';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('shivuvasava005@gmail.com', 'Mailer');
                    $mail->addAddress($to);     //Add a recipient
                    $mail->addReplyTo('shivuvasava005@gmail.com', 'Information');

                    //Attachments
                    // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                    // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $body;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    $mail->send();
                    $showalerts = true;
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }else{
                $showalertf=true;
            }
        }else{
            $showalert = true;
         }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<form action="" method="post" class="container mt-5 border border-primary">
        <h3 class="rt text-center mt-3 bg-warning p-3 mb-5">send link to Email</h3>
            <?php 
                if($showalerts){
                    echo '<div class="alert alert-success w-75 ml-5" role="alert">
                    <small class="text text-center">we e-maild reset password link to your account</small>
                    </div>';
                }
                if($showalert){
                    echo '<div class="alert alert-danger w-75 ml-5" role="alert">
                    <small class="text text-center">Email not found</small>
                    </div>';
                }
                if($showalertf){
                    echo '<div class="alert alert-danger w-75 ml-5" role="alert">
                    <small class="text text-center">Email sending failed</small>
                    </div>';
                }
            ?>

        <label class="form-label ml-5 d-block">Enter Email</label>
        <input type="text" class="form-control ml-5 w-75" name="email" required>
        <div class="d-flex justify-content-center mb-3">
            <input type="submit" class="submit mt-5 form-control d-block btn-primary w-50 p-3 font-weight-bold text-uppercase" name="submit"> 
        </div>   
    </form>

</body>
</html>