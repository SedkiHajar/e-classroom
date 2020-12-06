<?php 
include('init.php');
include('session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
    die();
   }
/*error_reporting(0);
include ('../lang/fb.php');
    require_once '../database/dbConfig.php'; 
    require_once '../database/function.php';
   include('session.php');
    if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
     

      die();
   }*/
  $param = "pro"; 
  require 'defaultProf.php';

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
    $id_prof=$_SESSION['id'];//echo $id_prof;
    $an=$_SESSION['anneeP'];  $admin=$_SESSION['id_admin'];
    $re=$db->query("SELECT * from professeur p join annees a where CIN='$id_prof' and a.idAn=p.anneeS");
     
    while($row=$re->fetch_assoc())
    {?>
    <div class="card card-signin my-5"  style="">
                            <div class="card-body " >
                            	<!-- <h5 class="card-title text-center">Profile</h5> -->
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <label>CIN</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p style="color:blue"><?=htmlspecialchars($row['CIN']) ?></p>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nom complet</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['nom']).' '.htmlspecialchars($row['prenom']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Sexe</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['sexe']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-12">
                                                <p><?=htmlspecialchars($row['mail']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Tel</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['tel']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Adresse</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['adresse']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Ville de naissance</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['villeN']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Date naissance</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['dateN']) ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Année scolaire</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['nomA']) ?></p>
                                            </div>
                                        </div>
                                         <?php } ?>
            <?php //} ?>











	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="modifierprofil.php" class="btn btn-primary" role="button" aria-pressed="true"> modifier </a>
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
