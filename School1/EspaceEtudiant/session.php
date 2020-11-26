<?php
 if(!isset($_SESSION) )
  {
   session_start();
  }

   $user_check = $_SESSION['CIN'];
   
   $ses_sql = mysqli_query($db,"select * from etudiant where CIN = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $login_session = $row['nomE'].' '.$row['prenom'];
   $_SESSION['image']=$row['avatar'];
   $_SESSION['id_class']=$row['classe'];
   $_SESSION['idEtu']=$user_check;
   $_SESSION['mdpEtu']=$row['mdp'];
   $_SESSION['mailEtu']=$row['mail'];
   $_SESSION['id_adminE']= $row['id_admin'];
   
   
   if(!isset($user_check)){
      header("location:/School1/index.php");
      die();
   }
?>