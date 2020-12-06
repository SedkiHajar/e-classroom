<?php
include('init.php');
include('session.php');
if(!isset($_SESSION['idEtu']) or !isset($_SESSION['mailEtu'])  ){
      header("location:/School1/EspaceEtudiant/index.php");
     

      die();
   }
/*require_once '../database/dbConfig.php';
require_once '../database/function.php';
include('session.php');
include ('../lang/fb.php');
include("../function/func.php");
if(!isset($_SESSION['idEtu']) or !isset($_SESSION['mailEtu'])  ){
     

      die();
   }*/

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EspaceEtudiant</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <!-- icones -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <style type="text/css">
.body1{
    background-color: rgba(26, 0, 0, 0.5);
    width: 900px;
  margin-top: 10px; 
    margin-left: 60px;
    padding-left: 60px;
}
a.bback{
	font-size: 120%;
    color:#4834d4; 
  text-align: center;
}
 .eme{
    font-size: 18px;
    text-align:center;
  }
  #bu1{
    text-align: center;
  }

  #no,.msg{font-size: 150%;
    color:#FFFF; 
    text-align: left;

  

  }
h1.hh{font-size: 200%;
    color:#130f40; 
  text-align: center;}
  /*#no,#bu1{font-size: 150%;
    color:#FFFF; 
  text-align: center;

  }*/
</style>

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
  <?php $param = "anA"; ?>
  <?php require 'defaultEtudiant.php';


?>


<!-- Begin Page Content -->
<div class="container-fluid">
<!-- <a class="bback" href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a> -->

         

  <!-- view notification -->
  <?php
$do=isset($_GET['do']) ? $_GET['do'] :'default'; 
$master=$_SESSION['id'];
 if($do=='not'){

$id = $_GET['idNo'];
   
    ?>

  

 <div class="body1">   
 	<h1 class="hh">Notifications</h1>
  <!-- <p id="no"> --><?php
    $query ="UPDATE `notifications` SET `status` = 'read' , ordering=1 WHERE `idNotif` = $id;";
    performQuery($query);

    $query = "SELECT * from `notifications` where `idNotif` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            $rang=$i['rang'];
           ?><p style="color:blue;text-align: center;" class="eme" ><?php echo $i['emetteur'].' ('.$i['date'].")</p>";
          
           
            
           ?><span class="msg"><?php echo $i['message'];?> </span> <?php
        }
    }?>
    <br/><!-- </p> -->
    <a id="bu1" class="btn btn-primary" name="repondre" href="reply.php?do=rep&idNo=<?=$id?>&rang=<?=$rang?>&idM=<?=$master; ?>&d">Répondre</a>



  </div>  

  <?php
}
  ?>
  

            <!-- Earnings (Monthly) Card Example -->
            


   <!-- <a class="btn btn-danger "href="logout.php">log out</a> -->
   
<!-- java Script script-->
<script src="EspaceAdmin/js/AjouterEtud.js?2"></script>
<script src="EspaceAdmin/js/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/chart-area-demo.js"></script>
  <script src="../js/demo/chart-pie-demo.js"></script>

</body>

</html>
