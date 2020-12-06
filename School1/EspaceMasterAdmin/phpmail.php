<?php
error_reporting(0);
include('init.php');
include('session.php');
 if(!isset($_SESSION['id']) or !isset($_SESSION['mailM'])  ){
      header("location:/School1/EspaceMasterAdmin/index");
     die();
   }
   //else  header("location:/School1/EspaceMasterAdmin/welcome");



$param = "gesA" ;

$admin=$_SESSION['idAdmin'];
$eco=isset($_GET['ID'])?$eco=$_GET['ID']:$eco='d';  

//$id=$_SESSION['anneeS'];
$admin = $db->query("SELECT * FROM masteradmin WHERE idMa='$admin' ");
while($row = $admin->fetch_assoc()){
              $emailA=$row['mailM'];
              $nom=$row['nom'];$prenom=$row['prenom'];
              $mdp=$row['mdpM'];
            }
$result = $db->query("SELECT * FROM admin WHERE id='$eco' ");
while($row = $result->fetch_assoc()){
              $email=$row['mail'];$nomet=$row['nomE'];
              $mdp=$row['mdp'];
            }
            
require 'defaultMaster.php';?>

<!-- slect info from table -->



<?php  ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

   <!--  <link rel="icon" href="https://codingbirdsonline.com/wp-content/uploads/2019/12/cropped-coding-birds-favicon-2-1-192x192.png" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"> -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>Send Email </title>
</head>
<body>
<div class="container">
    <div class="row">
       <!--  <div class="" style="text-align: left;padding-left: 10px; margin-top:10px; " > -->
<?php  //echo "<b>Email du professeur :<br> $email</b>";
$body="Voici Le site pour se connecter à l'espace Direction: https://besteduk.com/?e=".
$nomet."\r\n";
  // $body="Voici Le site pour se connecter à l'espace Direction: https://besteduk.com/"."\r\n";
          $body.="Le login: ".$email."\r\n"."Le password: ".$mdp;
          $msg = "Nom Master admin: $nom $prenom"."\r\n" ." Email De Master ADMIN: $emailA "."\r\n"."Message : $body";
         
          //include 'email.php';
             //echo "<br>Email de l'admin : $emailA<br> nom:$nom <br>mdp:$mdp";      ?>
        <!-- </div> -->     
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
           
            <div class="card card-signin my-5">
                 <?php ?>  
                <div class="card-body">
                    <h5 class="card-title text-center"><?= lang('contact')?><!-- Envoyer l'Email --></h5>
                    <form action="email.php?ID=<?=$eco; ?>" method="post" class="form-signin">
                        <!-- <div class="form-label-group">
                            <label for="inputEmail">De(Email école) <span style="color: #FF0000">*</span></label>
                            <input  style="color: black" type="text" name="fromEmail" id="fromEmail" class="form-control"  value="<?= $emailA?>" readonly required autofocus>
                        </div> <br/> -->
                        <div class="form-label-group">
                            <label for="inputEmail" class="text-uppercase"><?=lang('tto') ?>(Email Ecole) <span style="color: #FF0000">*</span></label>
                            <input style="color: black" type="text" name="toEmail" id="toEmail" class="form-control" value="<?= $email?>" required autofocus>
                        </div> <br/>
                        <label for="inputPassword" class="text-uppercase"><?=lang('sujet') ?><span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                            <input style="color: black" type="text" id="subject" name="subject" class="form-control" value="<?=lang('ident') ?>" readonly autofocus required><!-- Message identifiant et mot de passe -->
                        </div><br/>
                        <label for="inputPassword" class="text-uppercase">Message <span style="color: #FF0000">*</span></label>
                        <div class="form-label-group">
                             <textarea rows="6"  style="color: black" readonly autofocus id="message" name="message" value="msg"  class="form-control" placeholder="Message" required readonly><?= $msg?></textarea>
                        </div> <br/>
                        <button type="submit" name="sendMailBtn" class="btn btn-lg btn-primary btn-block text-uppercase" >
                          <?=lang('sent') ?><!-- Envoyer --></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>