<?php
if(!isset($_SESSION) )
  {
   session_start();
  }
 //session_start();
// require_once '../../database/dbConfig.php'; 
   $user_check = $_SESSION['mail'];
   
   $ses_sql = mysqli_query($db,"select * from professeur where mail = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $id_Prof=$row['CIN'];
   $_SESSION['id']= $row['CIN'];
   $_SESSION['mdpP']=$row['mdp'];
   $_SESSION['mail']=$row['mail'];
   $_SESSION['id_admin']= $row['id_admin'];
   $login_session = $row['nom'].' '.$row['prenom'];
   $_SESSION['image']=$row['avatarP'];

 //function get ecole prof
   function getEcoleofProf(){

   }

   if(!isset($_SESSION['id'])){
      header("location:/School1/index.php");
      die();
   }
?>