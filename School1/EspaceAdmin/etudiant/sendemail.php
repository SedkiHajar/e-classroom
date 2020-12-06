<?php
use PHPMailer\PHPMailer\PHPMailer;
//use ini_set(varname, newvalue)
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';


$CIN=$_GET['CIN'];  //echo $CIN;?>
<?php  
$admin=$_SESSION['id'];
$id=$_SESSION['anneeS'];
$admin = $db->query("SELECT * FROM admin WHERE id='$admin' ");
while($row = $admin->fetch_assoc()){
              $emailA=$row['mail'];
              $nom=$row['nomE'];
              $mdp=$row['mdp'];
            }
$result = $db->query("SELECT * FROM etudiant WHERE CIN='$CIN' ");
while($row = $result->fetch_assoc()){
              $email=$row['mail'];
            }
            echo "Email de l'étudiant : $email";
             echo "<br>Email de l'admin : $emailA<br> nom:$nom<br>mdp:$mdp";

$mail = new PHPMailer(true);
$alert = '';

if(isset($_POST['submit'])){
  if(isset($_POST['name']) && isset($_POST['email']) ){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $body = $_POST['body'];



 ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "$emailA";
    $to = "$email";
    $subject = "Message identifiant et mot de passe";
    $message = "<h3>Name : $name <br>Email: $email <br>Message : $body</h3>";
    $headers = "De :" . $from;
    if(mail($to,$subject,$message, $headers)){
     echo '<div class="alert-success">
                 <span>L\'email a été envoyé.</span>
                </div>';
    }
    else
    {

  echo '<div class="alert-danger">
                 <span>Message not Sent! .Mailer Error: {$mail->ErrorInfo}"</span>
                </div>';
    }
} 
}

    


//   try{

//     $mail->isSMTP();
//     $mail->SMTPDebug=2;
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = "$emailA"; // Gmail address which you want to use as SMTP server/admin
//     $mail->Password = "123456789zineb"; // Gmail address Password
//     $mail->SMTPSecure = 'tls';//ssl//tls
//     $mail->Port = '587';//465//587

//     $mail->setFrom("$emailA","$nom"); // Gmail address which you used as SMTP server//admin

//     $mail->addAddress("$email"); // Email address where you want to receive emails (you can use any of your gmail address including the gmail address which you used as SMTP server)//destinataire
//  ////body
//     $mail->isHTML(true);
//     $mail->Subject = 'Message identifiant et mot de passe';
//     //$mail->Body="<h3>Name : nom <br>Email: mail <br>Message : salut</h3>";
//     $mail->Body = "<h3>Name : $name <br>Email: $email <br>Message : $body</h3>";
//     //$mail-<addAttachment(PATH,Name)
//     $mail->SMTPOptions=array(
//       'ssl' => array(
//         'verify_peer' => false,
//         'verify_peer_name'=>false,
//         'allow_self_signed' =>true
//          )
//     );


//      $mail->send();
//     echo '<div class="alert-success">
//                  <span>Message Sent! Thank you for contacting us.</span>
//                 </div>';
// } catch (Exception $e) {
//   echo '<div class="alert-danger">
//                  <span>Message not Sent! .Mailer Error: {$mail->ErrorInfo}"</span>
//                 </div>';
//    // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
// }
// }}


 
//   $mail = new PHPMailer(true);

//   //smtp setting
//     $mail->isSMTP();
//     $mail->Host = 'smtp.gmail.com';
//     $mail->SMTPAuth = true;
//     $mail->Username = 'youremail@gmail.com'; // Gmail address which you want to use as SMTP server
//     $mail->Password = 'youremailpassword'; // Gmail address Password
//     $mail->SMTPSecure = "ssl";
//     $mail->Port = '465';

//     //email setting
//     $mail->isHTML(true);
//     $mail->setFrom($email,$name);
//     $mail->addAddress("youremail@gmail.com");
//     $mail->Subject=("$email ($subject)");
//     $mail->Body=$body;

//     if($mail->send()){
//       $status="success";
//       $response="Email is sent!";
//     }
//     else
//     {
//       $status="failed";
//       $response="something is wrong: <br>".$mail->ErrorInfo;
//     }
//     exit(json_encode(array("status" =>$status,"response"=>$response )));
// }

  
?>
                           