<?php
  error_reporting(0);
include ('../../lang/fb.php');

require_once '../../database/function.php';

include("../../function/func.php");
   require_once '../../database/dbConfig.php';
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

  <title>AjouterEtudiant</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>" rel="stylesheet">
  <!-- icones -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css?<?php echo time(); ?>" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
<?php 
$param = "gesC" ;
require '../defaultAdmin.php';?>
<!-- debut de profile  -->
<!-- Appel de la base de dennée -->
<?php require_once '../../database/dbConfig.php'; ?>
<?php if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['anneeS'] = $_POST['anneeS'];
    $id_anneeS=$_SESSION['anneeS'];
 }?>








<?php  
 $id=$_SESSION['anneeS'];$admin=$_SESSION['id'];
 $result = $db->query("SELECT * FROM classe c join annees a  where a.idAn='$id' and a.idAdm=$admin and c.anneeS=a.idAn  ");
     $nbrClass=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrClass++;}
       ?>

<?php   $result = $db->query("SELECT * FROM matiere m join classe c join matclass t join annees e 
 where c.anneeS='$id' and m.id=t.id_Mat and t.id_Class=c.id  and e.idAdm=$admin and e.idAn=c.anneeS ");
     $nbrMat=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrMat++;}
       ?>

<?php   $result = $db->query("SELECT * FROM professeur where anneeS='$id' and id_admin=$admin");
     $nbrprof=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrprof++;}
       ?>


        <!-- Begin Page Content -->
        <div class="container-fluid">
<a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a>
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
  <!-- visualiser les etudiant dans un tableaux -->
    <!-- Appel de la base de dennée -->
    <!-- slect info from table.  SELECT mc.* FROM 'matclass' as mc 
                                 JOIN 'classe' as c 
                                 on c.id= mc.id_Mat 
                                 ORDER BY c.name -->

                                 
                                 <?php $id_Class=$_GET['id_Class']; ?>
   <?php   $result = $db->query(" SELECT * FROM matclass WHERE id_Class='$id_Class'");
   
     if($result->num_rows > 0){
      
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Les matieres</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr>
      <th scope="col">#</th>
     
      
      <th scope="col">MATIERE</th>
      <th scope="col">COEF</th>
      <th scope="col">PROF</th>
      <!-- <th scope="col">AJOUTER COURS</th> -->
      
      <th scope="col">SUPPRIMER</th>
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>
      <?php $id_Mat= $row['id_Mat']?>  
      <?php   $result1 = $db->query("SELECT * FROM matiere WHERE id='$id_Mat'");?>
      
      <?php while($row1 = $result1->fetch_assoc()){?> 
      <td style="color:#130f40"  class=""><a href="infoCours.php?id_Class=<?php echo ($row['id_Class']); ?>&id_Mat=<?php echo ($row['id_Mat']); ?>&id_prof=<?php echo ($row['id_prof']); ?>"><?php echo $row1['nom']; ?></a></td><?php } ?>


          <?php $id_Mat= $row['id_Mat']?>
          <?php $result2 = $db->query("SELECT coef FROM matiere WHERE id='$id_Mat' ");?>
          <?php while ($row2 =$result2->fetch_assoc()) {?>
           <td style="color:#130f40" class=""><?php echo $row2['coef']; ?>
       <?php } ?>     
      </td>

     <?php $id_prof= $row['id_prof']?>  
      <?php   $result1 = $db->query("SELECT nom,prenom FROM professeur WHERE CIN='$id_prof'");?>
      <?php while($row1 = $result1->fetch_assoc()){?> 
      <td style="color:#130f40" class=""><?php echo $row1['nom']."   " . $row1['prenom']?></td><?php } ?>
      
     <!--  <td class="bg-info"><a   style="color:white;" href="AjouterCours.php?id_Mat=<?php echo ($row['id_Mat']); ?>&id_Class=<?php echo ($row['id_Class']); ?>&id_prof=<?php echo ($row['id_prof']); ?>">Ajouter Cours</a></td> -->
     
     
      <td style="color:#130f40" ><a class="btn btn-danger confirm"   style="color:white;" href="uploadCl.php?id_Mat=<?php echo ($row['id_Mat']); ?>&id_Class=<?php echo ($row['id_Class']); ?>&id_prof=<?php echo ($row['id_prof']); ?>&amp;choix=supprimer"><i class="fa fa-close"></i>suprimer</a></td> 
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











 





                      <script type="text/javascript">
                      function switche (){
                          document.getElementById("info").style.display = "none";
                          document.getElementById("update").style.display = "block";

                        }
                      </script>
    
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../js/jquery.js"></script>

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
