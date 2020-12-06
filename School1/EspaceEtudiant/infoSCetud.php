<?php
include('init.php');
include('session.php');
if(!isset($_SESSION['idEtu']) or !isset($_SESSION['mailEtu'])  ){
      header("location:/School1/EspaceEtudiant/index.php");
     

      die();
   }
/*include ('../lang/fb.php');
require_once '../database/dbConfig.php'; 
require_once '../database/function.php';
include("../function/func.php");
include('session.php');
   if(!isset($_SESSION['idEtu']) or !isset($_SESSION['mailEtu'])  ){
      header("location:/School1/EspaceEtudiant/index.php");
     
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

  <title>cour</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css?<?php echo time(); ?>" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
<?php 
$param='gesM';
require 'defaultEtud.php';?>
<!-- Appel de la base de dennée -->
<?php  ?>
<!-- slect info from table -->

<?php  
$cin=$_SESSION['CIN'];
$id_Class=$_SESSION['id_class'];
$an=$_SESSION['anneeE']; 
$id_Prof= $_SESSION['id'];


// $result = $db->query("SELECT DISTINCT c.nom,c.id FROM classe c INNER JOIN matclass t ON c.id = t.id_Class WHERE t.id_prof='$id_Prof' and c.anneeS=$an ");
//      $nbrClass=0;
//       ?>
     <?php //while($row = $result->fetch_assoc()){
//       $nbrClass++;}
       ?>

<?php   $result = $db->query("SELECT DISTINCT* FROM matiere m INNER JOIN matclass t join classe c ON t.id_Class=c.id 
  WHERE  m.id=t.id_Mat and c.id=$id_Class and c.anneeS=$an");
     $nbrMat=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrMat++;}
       ?>

<?php   $result = $db->query("SELECT * FROM professeur where anneeS=$an ");
     $nbrprof=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrprof++;}
       ?>


        <!-- Begin Page Content -->
        <div class="container-fluid"><div class="col-xl-12 col-lg-12 card shadow mb-4 " style="margin-top:10px;">
<a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a>
</div>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Statistiques</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Nombre de Classes</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrClass; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Nombre de Matieres</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrMat; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Professeurs inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrprof; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  <!-- visualiser les etudiant dans un tableaux -->
    <!-- Appel de la base de dennée -->
    <!-- slect info from table.  SELECT mc.* FROM 'matclass' as mc 
                                 JOIN 'classe' as c 
                                 on c.id= mc.id_Mat 
                                 ORDER BY c.name -->
                           
                                
      <?php $id_Cours=$_GET['id_Cours'];?>
   <?php   $result = $db->query(" SELECT * FROM tablesc WHERE id_Cours='$id_Cours'");
   
     if($result->num_rows > 0){
      
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Les supports du cour </h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr>
      <th scope="col">#</th>
     
      <th scope="col">SUPPORT COURS</th>
      
      <!--<th scope="col">MATIERE</th>
      <th scope="col">PROF</th>-->
      <!--<th scope="col">MODIFIER</th>-->
      <!-- th scope="col">SUPPRIMER</th> -->
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i ;?></th>
    

     
      <td class="bg-success"  ><a   style="color:white;" href="<?php echo htmlspecialchars($row['nom'])?>">Voir Support Cours</a></td>
      
      <!--<td class="bg-info"><a style="color:white;" href="modSC.php?id=<?php echo ($row['id']); ?>">Modifier </a></td>-->
      <!-- <td class="bg-danger"><a   style="color:white;" href="uploadCl.php?id=<?php echo ($row['id']); ?>&amp;choix=deleteSC">supprimer</a></td> -->
      <?php $i++; ?>
      <?php } ?>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>

<?php } ?>
</div>
</div>

<!-- Delete sction-->



<!-- java Script script-->
<script src="EspaceAdmin/js/AjouterEtud.js?2"></script>
<script src="EspaceAdmin/js/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
         <script src="../EspaceProf/js/AjouterEtud.js?2"></script>
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
          <script src="../EspaceProf/js/demo/chart-area-demo.js"></script>
          <script src="../EspaceProf/js/demo/chart-pie-demo.js"></script>

</body>

</html>
