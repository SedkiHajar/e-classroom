<?php
if(!isset($_SESSION) )
  {
    session_start();
  }
 require_once '../database/dbConfig.php';
 require_once '../database/function.php';

 
   $user_check = $_SESSION['idP'];
   
   $ses_sql = mysqli_query($db,"select * from parent p INNER join etudiant e on e.idPar=p.idP where idP = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_sessionP = $row['nomP'];
   $login_sessionM = $row['nomM'];
   $logine_session=$row['nomE'].' '.$row['prenom'];
   // $_SESSION['image']=$row['image'];
   $_SESSION['id_class']=$row['classe'];
   $_SESSION['CIN']=$row['CIN'];
   $_SESSION['mailPar']=$row['emailP'];
   $_SESSION['idP']=$row['idP'];
   $_SESSION['mdpPar']=$row['mdpP'];
   $_SESSION['id_adminP']= $row['id_admin'];

   
   if(!isset($user_check)){
      header("location:/School1/index.php");
      die();
   }
?>