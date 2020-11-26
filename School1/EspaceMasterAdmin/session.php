<?php
 if(!isset($_SESSION) )
  {
   session_start();
  }
 require_once '../database/dbConfig.php'; 
   $user_check = $_SESSION['mailM'];
   
   $ses_sql = mysqli_query($db,"select * from masteradmin m join admin a where a.idMas=m.idMa and m.mailM = '$user_check' ");
   
   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);
   //$id_Prof=$row['id'];
   $_SESSION['idAdmin']=$row['id'];
   $_SESSION['id']= $row['idMa'];
   $login_session = $row['nom'].' '.$row['prenom'];//nom master
   $_SESSION['image']=$row['imageM'];//image master
   $_SESSION['imageA']=$row['avatarA'];//admin
   $_SESSION['logo']=$row['logo'];
  
  
   
   
   if(!isset($_SESSION['id'])){
      //header("location:/School1/EspaceMasterAdmin/login.php");
       header("location:/School1/index.php");
      die();
   }
?>