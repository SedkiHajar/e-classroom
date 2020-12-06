<?php
error_reporting(0);
include ('../../lang/fb.php');
   require_once '../../database/dbConfig.php';
   require_once '../../database/function.php';
include("../../function/func.php");
   include('../session.php');
   if(!isset($_SESSION['id']) or !isset($_SESSION['mailA'])  ){
      header("location:/School1/EspaceAdmin/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }
   
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>AjouterProf</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- icones -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

</head>
<body>
<?php
$param = "gesP" ;
 require '../defaultAdmin.php';?>
<!-- Appel de la base de dennée -->
<?php require_once '../../database/dbConfig.php'; ?>





 <?php if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['anneeS'] = $_POST['anneeS'];
    $id_anneeS=$_SESSION['anneeS'];
 }?>






   <div class="col-md-12">

</div>





<!-- slect info from table -->
<?php
$id=$_SESSION['anneeS'];
$admin=$_SESSION['id'];
//echo 'get: '.$get;
  //if (isset($_POST['insererA']) ) {
   //echo ' session: '.$_SESSION['anneeS'];
  $result = $db->query("SELECT * FROM professeur WHERE anneeS='$id' and id_admin=$admin");
     $nbrEtudiant=0;
     $nbrFille=0;
     $nbrGarcon=0; ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrEtudiant++;
      if ($row['sexe']=='feminin') {
        $nbrFille++;
        // code...
      }
      if ($row['sexe']=='masculin') {
        $nbrGarcon++;
        // code...
      }
    }
       ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><?=lang('prof') ?><!-- Gestion des professeurs --></h1>

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
                        <?=lang('profs') ?><!-- Professeurs inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtudiant; ?></div>
                    </div>
                    <div class="col-auto">

                       <i class="fas fa-users fa-2x text-green-300"></i>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 "><?=lang('women') ?><!-- Femmes inscrites --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrFille; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-female fa-2x text-green-300"></i>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=lang('men') ?><!-- Hommes Inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrGarcon; //}?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-tie fa-2x text-green-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
  <!-- visualiser les etudiant dans un tableaux -->
    <!-- Appel de la base de dennée -->
    <!-- slect info from table -->
   <?php   $result = $db->query("SELECT * FROM professeur WHERE anneeS='$id' and id_admin=$admin");
     if($result->num_rows > 0){
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-12 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?=lang('proft')?><!-- Les professeurs --></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">CIN</th>
      <th scope="col" class="text-uppercase"><?=lang('12') ?><!-- ANNEE SCOLAIRE --></th>
      <th scope="col" class="text-uppercase"><?=lang('contact') ?><!-- NOM COMPLET --></th>
      

      <th scope="col" class="text-uppercase"><?=lang('plus') ?><!-- PLUS D'INFO --></th>
      <th scope="col" class="text-uppercase"><?=lang('contact') ?><!-- CONTACTER --></th>
      <!-- <th scope="col">MODIFIER</th> -->
      <th scope="col" class="text-uppercase"><?=lang('delete') ?><!-- SUPPRIMER --></th>
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>
      <td style="color:#130f40"class=""><?php echo $row['CIN']; ?></td>
      <?php $id_anneeS= $row['anneeS']?>
      <?php   $result1 = $db->query("SELECT nomA FROM annees WHERE idAn='$id_anneeS'");?>
        <?php while($row1 = $result1->fetch_assoc()){?>
      <td style="color:#130f40" class=""><?php echo $row1['nomA']; ?></td><?php  } ?>
      <td style="color:#130f40" class=""><?php echo  $row['nom'].' '.$row['prenom']; ?></td>
      
      <td class=""><a class="btn btn-info" style="color:white;" href="infoProf.php?CIN=<?php echo ($row['CIN']); ?>&amp;choix=insertion"><i class="fas fa-info-circle"></i><!-- Plus --> </a></td>
      <td class=""><a class="btn btn-success" style="color:white;" href="phpmail.php?CIN=<?php echo ($row['CIN']); ?>&id_anneeS=<?php echo ($row['anneeS']); ?>"><i class="fas fa-mail-bulk"></i><!-- contacter --></a></td>
      <!-- <td style="color:#130f40" class=""><a class="btn btn-success" style="color:white;" href="#" ><i class='fa fa-edit'></i>modifier</a></td> -->
      <td style="color:#130f40" class=""><a  class="btn btn-danger confirm" style="color:white;" href="uploadProf.php?CIN=<?php echo ($row['CIN']); ?>&amp;choix=delete"><i class='fa fa-close'></i></a></td>
      <?php $i++; ?>
      <?php }
    } ?>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>

<?php //}

?>
<!-- Delete sction-->


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<!-- java Script script-->
 <script src="../js/AjouterEtud.js?2"></script>
 <script src="../js/jquery.js"></script>
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
