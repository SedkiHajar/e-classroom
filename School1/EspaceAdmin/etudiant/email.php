<?php
error_reporting(0);
include ('../../lang/fb.php');
require_once '../../database/dbConfig.php';
 require_once '../../database/function.php';
include("../../function/func.php");
include('../session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mailA'])  ){
      header("location:/School1/EspaceAdmin/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }

$p = "gesE";
$param = "gesE" ;
$id=$_SESSION['anneeS'];


$CIN=$_GET['CIN'];  
  
$admin=$_SESSION['id'];
//$id=$_SESSION['anneeS'];
$admin = $db->query("SELECT * FROM admin WHERE id='$admin' ");
while($row = $admin->fetch_assoc()){
              $emailA=$row['mail'];
              $nom=$row['nomE'];
              $mdp=$row['mdp'];
            }
$result = $db->query("SELECT * FROM etudiant WHERE CIN='$CIN' ");
while($row = $result->fetch_assoc()){
              $email=$row['mail'];$nomet=$row['nomE'];$prenom=$row['prenom'];
              $mdp=$row['mdp'];
            }
            //echo "Email de l'étudiant : $email<br> nom etud:$nomet $prenom";
             //echo "<br>Email de l'admin : $emailA<br> nom:$nom<br>mdp:$mdp";


//require '../defaultAdmin.php';


if (isset($_POST['sendMailBtn'])) {
    //$fromEmail = $_POST['fromEmail'];
    $toEmail = $_POST['toEmail'];
    $subjectName = $_POST['subject'];
    $body = $_POST['message'];
    $body="Voici Le site pour se connecter à l'espace etudiant: https://besteduk.com/"."<br>";
    $body.="Le login: ".$email."<br>"."Le password: ".$mdp;
    $to = $toEmail;
    $subject =" Message identifiant et mot de passe";
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= 'De: '.$emailA.'<'.$nom.'>' . "\r\n" . 'X-Mailer: PHP/' . phpversion();
    //$headers = "De :" . $emailA. " $nom";
    
    $message = "Nom école: $nom ". "<br>"."Email De l'école: $emailA "."<br>"."Message : $body";
   // $message .= "Nom : $nomet $prenom ". "<br>"."Email: $to "."<br>"."Message : $body";
    //"Sujet : $subjectName"."<br>".
    $sent= mail($to, $subject, $message, $headers);?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>Send Email </title>
</head>
<!-- <a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour </a> -->
<?php
   if($sent==true){

$errorMsg= "L'email a été envoyé à $email.";
    
    $url="phpmail.php?CIN=$CIN&id_anneeS=$id";
      redirectPageS($errorMsg,3,$url);
            // echo  '<div class="alert-success">
            //      <span>L\'email a été envoyé à '.$email.'</span>
            //     </div>';
        }
        else
          $errorMsg="Message encore non envoyé!";
           redirectPage($errorMsg,3,$url);

    //if($sent==true){
        // echo '<script>alert("Email a été envoyé à $email !")</script>';
        // header("location:phpmail.php?CIN=$CIN&sent=$sent");
         //echo "<script>alert("."L'email a été envoyé à $email.)"."</script>";
        //echo "<script>window.location.href="."phpmail.php?CIN=<?php= $CIN;"."</script>";
         //    }
                // else
                //   echo '<div class="alert-danger">
                //  <span>Message encore non envoyé! </span>
                // </div>';
    

}
    //$result = mail("sedkizineb14@gmail.com", "message", "hello", 'header');
    //var_dump($result);
      // '<div class="alert-success">
      //            <span>L\'email a été envoyé à '.$email.'</span>
      //           </div>';

    // if($result==true){
    // echo '<div class="alert-success">
    //              <span>L\'email a été envoyé.</span>
    //             </div>';
    // header("location:phpmail.php?CIN=$CIN");
    // }
 //    else
 //    {

 //  echo '<div class="alert-danger">
 //                 <span>Message non envoyé! </span>
 //                </div>';
 // echo "<script>window.location.href="."phpmail.php?CIN=<?php= $CIN;"."</script>";
 //    }








// if (isset($_POST['sendMailBtn'])) {
//     $fromEmail = $_POST['fromEmail'];
//     $toEmail = $_POST['toEmail'];
//     $subjectName = $_POST['subject'];
//     $message = $_POST['message'];

//     $to = $toEmail;
//     $subject = $subjectName;
//     $headers = "MIME-Version: 1.0" . "\r\n";
//     $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
//     $headers .= 'From: '.$fromEmail.'<'.$fromEmail.'>' . "\r\n".'Reply-To: '.$fromEmail."\r\n" . 'X-Mailer: PHP/' . phpversion();
//     $message = '<!doctype html>
//             <html lang="en">
//             <head>
//                 <meta charset="UTF-8">
//                 <meta name="viewport"
//                       content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
//                 <meta http-equiv="X-UA-Compatible" content="ie=edge">
//                 <title>Document</title>
//             </head>
//             <body>
//             <span class="preheader" style="color: transparent; display: none; height: 0; max-height: 0; max-width: 0; opacity: 0; overflow: hidden; mso-hide: all; visibility: hidden; width: 0;">'.$message.'</span>
//                 <div class="container">
//                  '.$message.'<br/>
//                     Regards<br/>
//                   '.$fromEmail.'
//                 </div>
//             </body>
//             </html>';
    // $result =mail($to, $subject, $message, $headers);
    // if($result==true)
    // echo '<script>alert("Email sent successfully !")</script>';
    // else
    // echo '<script>alert("Email not sent !")</script>';
    // echo "<script>window.location.href="."phpmail.php?CIN=<?php= $CIN;"."</script>";
//}





