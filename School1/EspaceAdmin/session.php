<?php
 if(!isset($_SESSION) )
  {
    session_start();
  }
  
 //session_start();
 //require_once '../database/dbConfig.php'; 
   $user_check = $_SESSION['mailA'];
   
   $ses_sql = mysqli_query($db,"select * from admin a join masteradmin m where a.mail = '$user_check' and a.idMas=m.idMa ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   $id_Prof=$row['id'];
   $_SESSION['id']= $row['id'];
   $_SESSION['idMaster']= $row['idMas'];
   $login_session = $row['nomE'];
   $_SESSION['image']=$row['avatarA'];
   $_SESSION['mailA']=$row['mail'];
   $_SESSION['mdpA']=$row['mdp'];
   if(!isset($_SESSION['anneeS']) or isset($_GET['id_anneeS']))
    $_SESSION['anneeS']=$_GET['id_anneeS'];
   //$_SESSION['anneeS'] = "null" ;
   

   
   
   if(!isset($_SESSION['id']) or !isset($_SESSION['mailA'])){
      header("location:/School1/index.php");
     // header("location:/School1/index.php");
      die();
   }
?>