
<?php 
    include("../connection.php");

    $id = $_GET['id'];
    $query = "SELECT * FROM leave_request WHERE action = 'approved' AND id = '$id'";
    $rrr = mysqli_query($con,$query);
    $row = mysqli_fetch_array($rrr);
    $count = mysqli_num_rows($rrr);

    $email = $row['guardian_contact'];
    $name = $row['student_name'];

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require '../phpmailer/vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);


    $showalerts=false;
    $showalert=false;
    $showalertf=false;
        
        if($count > 0){
            if($rrr){
                $to = $email;
                $subject = "Leave Confirmation";
                $body = " Hello $name,<br>Your Leave Request has been Approved by the Admin. <br>";
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

                    //Content
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = $subject;
                    $mail->Body    = $body;
                    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                    if($mail->send()){
                        header('location:../admin_pages/lhead.php');
                    }
                    
                } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
            }else{
                $showalertf=true;
            }
        }else{
            $showalert = true;
         }
    
?>