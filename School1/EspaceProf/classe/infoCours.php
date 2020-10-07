<?php
   //session_start();
   require_once '../../database/dbConfig.php';
   include('../session.php');
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
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
<?php 
$param="gesC";
require '../defaultProf.php';?>
<!-- Appel de la base de dennée -->
<?php require_once '../../database/dbConfig.php'; ?>
<!-- slect info from table -->

<?php   
$an=$_SESSION['anneeP'];
$id_Prof= $_SESSION['id'];
$result = $db->query("SELECT DISTINCT c.nom,c.id FROM classe c INNER JOIN matclass t ON c.id = t.id_Class WHERE t.id_prof='$id_Prof' and c.anneeS=$an ");
     $nbrClass=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrClass++;}
       ?>

<?php   $result = $db->query("SELECT DISTINCT* FROM matiere m INNER JOIN matclass t join classe c ON t.id_Class=c.id WHERE t.id_prof='$id_Prof' and m.id=t.id_Mat and c.anneeS=$an  ");
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
  <!-- visualiser les etudiant dans un tableaux -->
    <!-- Appel de la base de dennée -->
    <!-- slect info from table.  SELECT mc.* FROM 'matclass' as mc 
                                 JOIN 'classe' as c 
                                 on c.id= mc.id_Mat 
                                 ORDER BY c.name -->
                                
                                <?php $id_Class=$_GET['id_Class'];?>
                                <?php $id_Mat=$_GET['id_Mat'];?>
                                <?php $id_prof=$_GET['id_prof'];?>
   <?php   $result = $db->query(" SELECT * FROM cours WHERE id_Mat='$id_Mat' AND id_Class='$id_Class' AND id_prof='$id_prof'");
   
     if($result->num_rows > 0){
      
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Les cours</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr>
      <th scope="col">#</th>
     
      <th scope="col">COURS</th>
      <th scope="col">DESCRIPTION</th>
      <th scope="col">SUPPORT COURS</th>
      <!--<th scope="col">MATIERE</th>
      <th scope="col">PROF</th>-->
      <th scope="col">AJOUTER DEVOIR</th>
      <th scope="col">MODIFIER</th>
      <th scope="col">SUPPRIMER</th>
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>


     
      <td class=""  ><a href="infoDevoir.php?id_Cours=<?php echo ($row['idCour']); ?>"><?php echo $row['nom']; ?></a></td>


      <td class=""  ><?php echo $row['description']; ?></td><?php  ?>


    
      <td class="bg-success"><a   style="color:white;" href="infoSC.php?id_Cours=<?php echo ($row['idCour']); ?>">Voir les supports Cours</a></td>
      

      <td class="bg-info"><a   style="color:white;" href="AjouterDevoir.php?id_Cours=<?php echo ($row['idCour']); ?>">Ajouter Devoir</a></td>
     

      <!--<?php $id_Mat= $row['id_Mat']?>  
      <?php   $result1 = $db->query("SELECT nom FROM matiere WHERE id='$id_Mat'");?>
      <?php while($row1 = $result1->fetch_assoc()){?> 
      <td class=""><?php echo $row1['nom']; ?></td><?php } ?>-->

      <!--<?php $id_prof= $row['id_prof']?>  
      <?php   $result1 = $db->query("SELECT nom,prenom FROM professeur WHERE CIN='$id_prof'");?>
      <?php while($row1 = $result1->fetch_assoc()){?> 
      <td class=""><?php echo $row1['nom']."   " . $row1['prenom']?></td><?php } ?>-->  
      
      <td class="bg-info"><a style="color:white;" href="modCours.php?id_Cours=<?php echo ($row['idCour']); ?>&id_Class=<?php echo ($row['id_Class']); ?>&id_Mat=<?php echo ($row['id_Mat']); ?>&id_prof=<?php echo ($row['id_prof']); ?>">Modifier </a></td>
      <td class="bg-danger"><a   style="color:white;" href="uploadCl.php?id_Cours=<?php echo ($row['idCour']); ?>&id_Class=<?php echo ($row['id_Class']); ?>&id_Mat=<?php echo ($row['id_Mat']); ?>&id_prof=<?php echo ($row['id_prof']); ?>&amp;choix=deleteCours">supprimer</a></td>
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
