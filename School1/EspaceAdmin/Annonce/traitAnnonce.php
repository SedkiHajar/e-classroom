<?php error_reporting(0);
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
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">
</head>

<?php
if(isset($_POST['publier'])){
  $message = $_POST['annonce'];
  $admin=$_SESSION['id'];
  $CIN=$_GET['CIN'];  
  $id=$_SESSION['anneeS'];
  $res = $db->query("SELECT * FROM admin WHERE id='$admin' ");
  while($row = $res->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }
$result = $db->query("SELECT * FROM professeur WHERE CIN='$CIN' ");
while($row = $result->fetch_assoc()){
      $email=$row['mail'];$nomet=$row['nom'];$prenom=$row['prenom'];
              $mdp=$row['mdp'];
            }
              

?>


<?php  
//rang admin egale 2 qui envoie  prof 3
$emetteur="Direction $nom"; 
$dest="Professeur $nomet $prenom";         
  
$query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_profe,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$CIN',$admin,2,'$emetteur','$dest',3)";
if(performQuery($query)){
             $Msg= lang('reussi')." ". ucwords($nomet)." ".ucwords($prenom);
            // "Le message a été envoyé à $nomet $prenom.";
             $url="AnnoncePro.php?CIN=$CIN&id_anneeS=$id";
             redirectPageS($Msg,3,$url); 
              
                 //header("location:annonce.php");
             }
             else {
              $url="AnnoncePro.php?do=Pro&CIN=$CIN&id_anneeS=$id";
              $Msg=lang('echec');
              //"Message encore non envoyé!";
                   redirectPage($Msg,5,$url);
                 }
          }
                
          ?>

<?php

if(isset($_POST['reply'])){
 $master=$_SESSION['idMaster'];
  $idA=$_SESSION['anneeS'];
  $admin=$_SESSION['id'];
  //echo $master;
//echo $id_admin,$id_prof;

$result = $db->query(" SELECT * FROM masteradmin  WHERE idMa='$master' ");
while($row = $result->fetch_assoc()){
      $email=$row['mailM'];$nomet=$row['nom'];$prenom=$row['prenom'];
              $mdp=$row['mdpM'];//$admin=$row['id_admin'];
            }
$res = $db->query("SELECT * FROM admin WHERE id='$admin' ");
  while($row = $res->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }            
  $message = $_POST['annonce'];
   //rang admin egale 2 qui envoie  au master 
$emetteur="Direction $nom"; 
$dest="Master $nomet $prenom";     
  
  //prof envoie au admin
  

 $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_mast,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,$master,$admin,2,'$emetteur','$dest',1)";
             if(performQuery($query)){
             
             
          $Msg= lang('reussi')." ". ucwords($nom) ;
           $url="profs.php?do=Mas&id=$admin&id_anneeS=$idA";
             redirectPageS($Msg,3,$url); 

    
          echo "<div class='alert alert-success'>$errorMsg</div>";
              
                 //header("location:annonce.php");
             }
             else {
              
              $Msg=lang('echec');
               $url="profs.php?do=Mas&id=$admin&id_anneeS=$idA";
              redirectPage($errorMsg,5,$url);
                    //echo "<div class='alert alert-danger'>$errorMsg</div>";
                  }
          }
                           

?>
<?php

if(isset($_POST['etuen'])){
  $message = $_POST['annonce'];
  $admin=$_SESSION['id'];
  $CIN=$_GET['CIN']; 
  $id=$_SESSION['anneeS'];
  $res = $db->query("SELECT * FROM admin WHERE id='$admin' ");
  while($row = $res->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }
$result = $db->query("SELECT * FROM etudiant WHERE CIN='$CIN' ");
while($row = $result->fetch_assoc()){
      $email=$row['mail'];$nomet=$row['nomE'];$prenom=$row['prenom'];
              $mdp=$row['mdp'];$sexe=$row['sexe'];
            }
              

?>


<?php  
//rang admin egale 2 qui envoie  
$emetteur="Direction $nom"; 
$f="Etudiante $nomet $prenom";  
$m="Etudiant $nomet $prenom" ;
$dest=($sexe=='feminin')? $f :$m;
        
  $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_etu,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$CIN',$admin,2,'$emetteur','$dest',4)";
if(performQuery($query)){
             $Msg= lang('reussi')." ". ucwords($nomet)." ".ucwords($prenom);
             $url="AnnonceEtu.php?do=Etu&CIN=$CIN&id_anneeS=$id";
             redirectPageS($Msg,3,$url); 
              
                 //header("location:annonce.php");
             }
             else {
              $url="AnnonceEtu.php?do=Etu&CIN=$CIN&id_anneeS=$id";
              $Msg=lang('echec');
              //"Message encore non envoyé!";
                   redirectPage($Msg,5,$url);
                 }
          }


if(isset($_POST['paren'])){
  $message = $_POST['annonce'];
  $admin=$_SESSION['id'];
  $CIN=$_GET['id']; 
  $id=$_SESSION['anneeS'];
  $res = $db->query("SELECT * FROM admin WHERE id='$admin' ");
  while($row = $res->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }
$result = $db->query("SELECT * FROM parent WHERE idP='$CIN' ");
while($row = $result->fetch_assoc()){
      $email=$row['emailP'];$nomet=$row['nomP'];$prenom=$row['nomM'];
              $mdp=$row['mdpP'];
            }
              

?>


<?php  
//rang admin egale 2 qui envoie  
$emetteur="Direction $nom"; 
$dest="Parents $nomet et $prenom";         
  $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_par,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$CIN',$admin,2,'$emetteur','$dest',5)";
if(performQuery($query)){
             $Msg= lang('reussi')." ". ucwords($nomet)." ".ucwords($prenom);
             //"Le message a été envoyé à $nomet $prenom.";
             $url="AnnoncePar.php?do=Par&id=$CIN&id_anneeS=$id";
             redirectPageS($Msg,3,$url); 
              
                 //header("location:annonce.php");
             }
             else {
              $url="AnnoncePar.php?do=Par&id=$CIN&id_anneeS=$id";
              $Msg=lang('echec');
              //"Message encore non envoyé!";
                   redirectPage($Msg,5,$url);
                 }
          }









                
          ?>