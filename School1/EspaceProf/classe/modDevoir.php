<?php
include('init.php');
include('../session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
    die();
   }
/*error_reporting(0);
include ('../../lang/fb.php');
   require_once '../../database/dbConfig.php';
   require_once '../../database/function.php';
   include('../session.php');
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

  <title>Modifier devoir</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css?<?php echo time(); ?>" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
<?php 
$param="gesC";
require '../defaultProf.php';?>
<!-- debut de profile  -->
<!-- Appel de la base de dennée -->
<?php require_once '../../database/dbConfig.php'; ?>


<?php   
$id_Prof= $_SESSION['id'];

$an=$_SESSION['anneeP']; 
$result = $db->query("SELECT DISTINCT c.nom,c.id FROM classe c INNER JOIN matclass t ON c.id = t.id_Class WHERE t.id_prof='$id_Prof' and c.anneeS=$an ");
     $nbrClass=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrClass++;}
       ?>

<?php   $result = $db->query("SELECT DISTINCT* FROM matiere m INNER JOIN matclass t join classe c ON t.id_Class=c.id WHERE t.id_prof='$id_Prof' and m.id=t.id_Mat and c.anneeS=$an ");
     $nbrMat=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrMat++;}
       ?>

<?php   $result = $db->query("SELECT * FROM professeur WHERE anneeS=$an");
     $nbrprof=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrprof++;}
       ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">
            <div class="col-xl-12 col-lg-12 card shadow mb-4 " style="margin-top:10px;">
              <a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a>
            </div>
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des Classes et Matieres</h1>
            
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
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
            </div>

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




                                 
                                 <?php $id_Devoir=$_GET['id_Devoir']; ?>
                                 <?php $id_Cours=$_GET['id_Cours']; ?>
                                  <?php $id_Class=$_GET['id_Class'];?>
                                <?php $id_Mat=$_GET['id_Mat'];?>
                                <?php $id_prof=$_GET['id_prof'];?>
   <?php   $result = $db->query(" SELECT * FROM devoir c WHERE id='$id_Devoir' ");
   $res=$db->query("SELECT nom from devoir where id='$id_Devoir");
    //$ses_sql = mysqli_query($db,"select * from professeur where mail = '$user_check' ");
   
   

   
     if($result->num_rows > 0){
      
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-12 mb-4">
      <div class="card-header py-3"> <?php //echo "mati $id_Mat and  prof $id_prof" ?>
          <h6 class="m-0 font-weight-bold text-primary">Les devoirs</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr>
      <th scope="col">#</th>
     
      
      <th scope="col">DEVOIR</th>
      <th scope="col">DESCRIPTION</th>
     
      <th scope="col">MODIFIER</th>
      
      
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>

      <?php $id_Cours= $row['id']?>  
      <?php   $result1 = $db->query("SELECT * FROM devoir WHERE id='$id_Devoir'");?>
      <?php while($row1 = $result1->fetch_assoc()){?> 
      <td class="bg-success">
          <form action="uploadCl.php?id_Devoir=<?php echo ($row['id']); ?>&id_Cours=<?php echo ($row['id_Cours']); ?>&id_Class=<?=$id_Class?>" role="form" method="post" enctype="multipart/form-data">

          <input name=nom value="<?php echo ($row['nom']); ?>" >
        </td> 
      <td class="bg-warning">
        <textarea rows="4" cols="50" class="form-control" id="description" name="description" ><?php echo ($row['description']); ?></textarea></td>
      <?php } ?>
      <td class=""><button class="btn btn-primary" type="submit" name="modifierDevoir"><i class="fa fa-edit"></i></button></td></form>
      
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










  


        <!-- java Script script-->
         <script src="../js/AjouterEtud.js?2"></script>
        <!-- Bootstrap core JavaScript-->
          <script src="../../vendor/jquery/jquery.min.js"></script>
          <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

          <!-- Core plugin JavaScript-->
          <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

          <!-- Custom scripts for all pages-->
          <script src="../../js/sb-admin-2.min.js"></script>

          <!-- Page level plugins -->
          <script src="../../vendor/chart.js/Chart.min.js"></script>

          <!-- Page level custom scripts -->
          <script src="../../js/demo/chart-area-demo.js"></script>
          <script src="../../js/demo/chart-pie-demo.js"></script>

        </body>

        </html>
