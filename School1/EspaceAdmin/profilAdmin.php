<?php //error_reporting(0);
error_reporting(0);
include ('../lang/fb.php');
    require_once '../database/dbConfig.php';
    require_once '../database/function.php';
include("../function/func.php");
   include('session.php');
   if(!isset($_SESSION['id']) or !isset($_SESSION['mailA'])  ){
      header("location:/School1/EspaceAdmin/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }
  $param = "profil"; 
  require 'defaultAdmin.php';

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
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">
</head>
<body>
 <?php 
    //include '../model/include/logine.php' ; 
    //echo $id_class;
    $an=$_SESSION['anneeS'];  $admin=$_SESSION['id'];
    $re=$db->query("SELECT * from admin where  id='$admin' ");
    
    //$row1=$res->fetch_assoc();
    while($row=$re->fetch_assoc())
    {?>
    <div class="card card-signin my-5"  style="">
                            <div class="card-body" >
                            	<!-- <h5 class="card-title text-center">Profile</h5> -->
                                        
                                        
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nom Ecole</label>
                                            </div>
                                            <div class="col-md-2">
                                                <p><?=htmlspecialchars($row['nomE']) ?></p>
                                            </div>
                                        </div>
                                        
                                         
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-12">
                                                <p><?=htmlspecialchars($row['mail']) ?></p>
                                            </div>
                                        </div>
                                        
                                        
                                       
                                         <?php } ?>
            <?php //} ?>











	
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="modProA.php" class="btn btn-primary" role="button" aria-pressed="true"> modifier </a>
	</div>
<!-- java Script script-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../js/jquery.js"></script>
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