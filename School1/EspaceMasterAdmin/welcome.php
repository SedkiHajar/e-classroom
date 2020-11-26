<?php
include('init.php');
include('session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mailM'])  ){
      header("location:/School1/EspaceMasterAdmin/index");
     die();
   }
  // else  header("location:/School1/EspaceMasterAdmin/welcome");
   //session_start();
// require_once '../database/function.php';
// include ('../lang/fb.php');

// include("../function/func.php");
//    include('session.php');
    

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>welcome master admin</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->

<?php 
$param = "dash" ;
require 'defaultMaster.php';

/*for ($j = 0; $j <count($_SESSION['nom_Mat']); $j++){
    echo $_SESSION['nom_Mat'][$j];
   }*/
?>
<?php require_once '../database/dbConfig.php'; ?>




<h2 class="m-0 font-weight-bold text-primary " >
  <?php  echo strtoupper(lang('1')) .' '. strtoupper($login_session).' '.lang('welcomeM'); ?>
 <!--  BIENVENUE --> <?php // echo strtoupper($login_session) ; ?> 
  <!-- DANS VOTRE ESPACE MASTER ADMIN --></h2>
   <!-- Changer la langue: -->
  <!-- <div class="row">
  <div class="col-sm-3"><h5 style="color:blue;"><?= lang('ch')?>:</h5> </div>
  <div class="col-md-1">
     <a href="?lang=fr"><img src="/School1/img/flags/fr.png" ></a>
  </div>
  <div>
    <a href="?lang=en"><img src="/School1/img/flags/gb.png" ></a>
  </div>
</div>    -->


<?php   $result = $db->query("SELECT * FROM admin ");
     $nbrAdmin=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrAdmin++;
      
        // code...
      
    }
       ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <!-- <h1 class="h3 mb-0 text-gray-800">Gestion des Admin</h1> -->
           
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <!-- Admin inscrits -->
                         <?=lang('eco') ?> 
                      </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrAdmin; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users-cog fa-2x text-blue-300"></i>
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            

            <!-- Earnings (Monthly) Card Example -->
            

   <div class="col-xl-12 col-md-6 mb-4">
   <!-- <a class="btn btn-danger " href="logout.php"> <?//lang('logout')?></a> --><!-- Déconnexion -->
 </div>
   
   

</body>

</html>

<!-- java Script script-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/AjouterEtud.js?2"></script>
<script src="js/jquery.js"></script>
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

