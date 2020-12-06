<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Ecxeption;
require_once 'vendor/autoload.php';


$mail = new PHPMailer(true);
$alert = '';

try {
    $mail->isSMTP();
    //$mail->SMTPDebug=2;
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'sedkizineb14@gmail.com'; // Gmail address which you want to use as SMTP server/etudiant
    $mail->Password = '123456789zineb'; // Gmail address Password
    $mail->SMTPSecure = 'tls';//ssl
    $mail->Port = '587';//465

    $mail->setFrom('arrvar@gmail.com','tut'); // Gmail address which you used as SMTP server//admin

    $mail->addAddress('sedkizineb14@gmail.com'); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)
 ////body
    $mail->isHTML(true);
    $mail->Subject = 'Message Received (Contact Page)';
    $mail->Body="<h3>Name : nom <br>Email: mail <br>Message : salut</h3>";
    //$mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $body</h3>";
    //$mail-<addAttachment(PATH,Name)
    $mail->SMTPOptions=array(
    	'ssl' => array(
    		'verify_peer' => false,
    		'verify_peer_name'=>false,
    		'allow_self_signed' =>true
    		 )
    );


     $mail->send();
    echo '<div class="alert-success">
                 <span>Message Sent! Thank you for contacting us.</span>
                </div>';
} catch (Exception $e) {
	echo '<div class="alert-danger">
                 <span>Message not Sent! .Mailer Error: {$mail->ErrorInfo}"</span>
                </div>';
   // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
    


 ?>

