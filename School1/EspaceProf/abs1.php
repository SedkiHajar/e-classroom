<?php
include('init.php');
include('session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
    die();
   }
/* error_reporting(0);
 include ('../lang/fb.php');
 require_once '../database/dbConfig.php'; 
 require_once '../database/function.php';
   include('session.php');
    if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
     

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

  <title>Espace des abssence </title>

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
$param="gesA";
 require 'defaultProf.php';
require_once '../database/dbConfig.php'; 
//aficher les classe
$id_Prof= $_SESSION['id'];
$id_Class=$_GET['id_class'];?>

<h3 class=" font-weight-bold text-info text-center shadow  titre" style="margin-top: 50px;"> Espace des Absences </h3>
<div class="col-xl-12 col-lg-12 card shadow mb-4 " style="background-color:white;font-weight: bold; margin-top:10px;">
<a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a>
</div>
        <div class="form-row">
<div class="col-xl-12 col-lg-12 card shadow mb-4 " style="background-color:white;font-weight: bold; margin-top:50px;">

            <div class="form-group col-md-12" >
                <label for="classe">Choisir une matiere </label>
                    <?php
                    //définir la requete
                    $result = $db->query("SELECT DISTINCT matiere.nom,matiere.id FROM matiere INNER JOIN matclass ON matiere.id = matclass.id_Mat WHERE matclass.id_prof='$id_Prof' and matclass.id_Class=$id_Class");    
                    // boucle sur les données
                    while ($row =$result->fetch_assoc()) {
                    ?> 
                    <br>
                <a href="abs2.php?id_mat=<?php echo $row['id'];?>&amp;id_class=<?php echo $id_Class; ?>&amp;nom_mat=<?php echo $row['nom']; ?>" class="btn btn-outline-danger btn-lg btn-block" ><?php echo $row['nom'] ?></a> 
                <?php }?>        
            </div>
        </div>         
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

</body>

</html>
