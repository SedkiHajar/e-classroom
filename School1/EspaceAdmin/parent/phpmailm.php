<?php 
error_reporting(0);
include ('../../lang/fb.php');
require_once '../../database/dbConfig.php';
 require_once '../../database/function.php';
 
include('../session.php');
include("../../function/func.php");
 if(!isset($_SESSION['id']) or !isset($_SESSION['mailA'])  ){
      header("location:/School1/EspaceAdmin/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }


$param = "gesM" ;

$admin=$_SESSION['id'];
$idP=$_GET['ID'];  

$id=$_SESSION['anneeS'];
$admin = $db->query("SELECT * FROM admin WHERE id='$admin' ");
while($row = $admin->fetch_assoc()){
              $emailA=$row['mail'];
              $nom=$row['nomE'];
              $mdp=$row['mdp'];
            }
$result = $db->query("SELECT * FROM parent WHERE idP='$idP' ");
while($row = $result->fetch_assoc()){
              $email=$row['emailP'];$nomet=$row['nomM'];//$prenom=$row['prenomP'];
              $mdp=$row['mdpP'];$emailM=$row['emailM'];
            }
            
require '../defaultAdmin.php';?>

<!-- slect info from table -->



<?php  ?>
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
<body>
<div class="container">
    <div class="row">
        <!-- <div class="" style="text-align: left;padding-left: 10px; margin-top:10px; " > -->
         <?php  //echo "<b>Email de l'étudiant :<br> $email</b>";
          $body="Voici Le site pour se connecter à l'espace parent: https://besteduk.com/"."\r\n";
          $body.="Le login: ".$email."\r\n"."Le password: ".$mdp;
          $msg = "Nom école: $nom "."\r\n" ." Email De l'école: $emailA "."\r\n"."Message : $body";
         
          //include 'email.php';
             //echo "<br>Email de l'admin : $emailA<br> nom:$nom <br>mdp:$mdp";      ?>
        <!-- </div> -->     
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
           
            <div class="card card-signin my-5">
                 <?php ?>  
                <div class="card-body">
                    <h5 class="card-title text-center">Envoyer l'Email</h5>
                    <form action="email.php?ID=<?=$idP; ?> " method="post" class="form-signin">
                        <!-- <div class="form-label-group">
                            <label for="inputEmail">De(Email école)<span style="color: #FF0000">*</span></label>
                            <input style="color: black" type="text" name="fromEmail" id="fromEmail" class="form-control"  value="<?= $emailA?>" readonly required autofocus>
                        </div> <br/> -->
                        <div class="form-label-group">
                            <label for="inputEmail">A(Email parent) <span style="color: #FF0000">*</span></label>
                            <input style="color: black" type="text" name="toEmail" id="toEmail" class="form-control" value="<?= $emailM?>" required autofocus  >
                        </div> <br/>
                        <label for="inputPassword">Sujet<span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input style="color: black" type="text" id="subject" name="subject" class="form-control" value="Message identifiant et mot de passe" readonly autofocus required>
                        </div><br/>
                        <label for="inputPassword">Message <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                             
                            <textarea rows="6" style="color: black" readonly autofocus id="message" name="message" value="msg"  class="form-control" placeholder="Message" required ><?=$msg?></textarea>
                        </div> <br/>
                        <button type="submit" name="sendMailBtn" class="btn btn-lg btn-primary btn-block text-uppercase" >Envoyer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>