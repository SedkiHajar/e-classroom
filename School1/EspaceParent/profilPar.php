<?php 
include('init.php');
include('session.php');
if(!isset($_SESSION['idP']) or !isset($_SESSION['mailPar'])  ){
      header("location:/School1/EspaceParent/index.php");
      die();
   }
/*include ('../lang/fb.php');
    require_once '../database/dbConfig.php'; 
    require_once '../database/function.php';

include("../function/func.php");
   include('session.php');
   if(!isset($_SESSION['idP']) or !isset($_SESSION['mailPar'])  ){
      header("location:/School1/EspaceParent/index.php");
     
      die();
   }*/
  $param = "pro"; 
  require 'defaultParent.php';

?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		p{color:blue;}
		label{color:black;}



	</style>
	<title></title>
	<!-- <link rel="stylesheet" type="text/css" href="styleprofil.css"> -->
	<!-- Custom fonts for this template-->

  

  <!-- Custom styles for this template-->
  
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">
</head>
<body>
 <?php 
    //include '../model/include/logine.php' ; 
    $idEtu=$_SESSION['idP'];$id_class= $_SESSION['id_class'];//echo $id_class;
    $an=$_SESSION['anneeE'];  $admin=$_SESSION['id_adminP'];
    $re=$db->query("SELECT * from parent where  idP='$idEtu' ");
    $res=$db->query("SELECT * from classe where id=$id_class");
    $row1=$res->fetch_assoc();
    while($row=$re->fetch_assoc())
    {?>
    <div class="card card-signin my-5"  style="">
                            <div class="card-body" >
                            	<!-- <h5 class="card-title text-center">Profile</h5> -->
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nom père</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['nomP']) ?></p>
                                            </div>
                                        </div>
                                         <div class="row">
                                            <div class="col-md-2">
                                                <label>Nom mère</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['nomM']) ?></p>
                                            </div>
                                        </div>
                                        
                                         <div class="row">
                                            <div class="col-md-2">
                                                <label>Classe</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row1['nom']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Email père</label>
                                            </div>
                                            <div class="col-md-12">
                                                <p><?=htmlspecialchars($row['emailP']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Email mère</label>
                                            </div>
                                            <div class="col-md-12">
                                                <p><?=htmlspecialchars($row['emailM']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Tel père</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['telP']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Tel mère</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['telM']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['adresseP']) ?></p>
                                            </div>
                                        </div>
                                        
                                       
                                         <?php } ?>
            <?php //} ?>











	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="modProfil.php" class="btn btn-primary" role="button" aria-pressed="true"> modifier </a>
	</div>

    <!-- java Script script-->
<script src="js/AjouterEtud.js?2"></script>
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
