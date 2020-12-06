<?php
//session_start();
//error_reporting(0);
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
   // if(session_destroy()) {
   //    header("Location: login.php");
   // }
  
    $param = "dash" ;
   require 'defaultAdmin.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title><?=lang('14') ?></title>

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

/*function getEcoleofAdmin($id,$se,$from,$value){
  global $db;
  $sql="SELECT $se FROM $from where $id='$value'";
  $row=mysqli_query($db,$sql);
  extract($row);
  $nomE = $nom;
  
  return $nomE;
}*/

$admin= $_SESSION['id'];
// echo $admin;
// echo ' ecole est: '.getEcoleofAdmin("id","nomE","admin",$admin);





/*for ($j = 0; $j <count($_SESSION['nom_Mat']); $j++){
    echo $_SESSION['nom_Mat'][$j];
   }*/
?>



<?php if($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['anneeS'] = $_POST['anneeS'];
    $id_anneeS=$_SESSION['anneeS'];
 }?>


   
<h2 class="m-0 font-weight-bold text-primary " > <?php  echo strtoupper(lang('1')) .' '.
 strtoupper($login_session).' '.lang('welcome'); ?></h2>  <!-- DANS VOTRE ESPACE DIRECTION -->

 
 <form action=" " role="form" method="post" enctype="multipart/form-data">
           
           <div class="form-row">
              
                <h4><?=lang('12') ?></h4> 
               
              <select class="custom-select" name="anneeS" id="">
                <option value="null"><?=lang('11') ?></option>
                  <?php
                  //définir la requete
                  $result = $db->query("SELECT * FROM annees where idAdm=$admin ");

                  // boucle sur les données
                  ?>
                  <?php while ($row =$result->fetch_assoc()) {
                  ?>
                   <option value="<?php echo $row['idAn']; ?>"
                                  <?php if( isset($_SESSION['anneeS']) && $row['idAn']==$_SESSION['anneeS']) echo "selected" ?>>
                                  <?php echo $row['nomA']; ?></b>
                   </option>
                 <?php
               }
               ?>
              </select>
         
          
              <button type="submit" class="btn btn-info" name="insererA"><?=lang('choix') ?></button>
              <?php //echo  'session:' .$_SESSION['anneeS'];?>
          </div>
        
  </form>

  <?php 
  //echo $id;        
  //echo 'anne : '.$id_anneeS;
  $result = $db->query("SELECT * FROM professeur  where anneeS='$id' and id_admin='$admin'");
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
          <?php // print_r($_SESSION); ?>
          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des professeurs</h1>
           
          </div> -->
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
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 "><?=lang('women') ?>
                      <!-- Femmes inscrites --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrFille; ?></div>
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <?=lang('men') ?>
                        <!-- Hommes Inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrGarcon; ?></div>
                    </div>
                    <div class="col-auto">
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
                      <i class="fas fa-user-tie fa-2x text-green-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>












<?php   $result = $db->query("SELECT * FROM etudiant where anneeS='$id' and id_admin=$admin");
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
         <!--  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des etudiants</h1>
            
          </div> -->
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=lang('stud') ?>
                      <!-- Eleve inscrits --></div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 "><?=lang('girl') ?>
                      <!-- Filles inscrites --></div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=lang('boy') ?>
                      <!-- Garcon Inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrGarcon; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-green-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>









<?php   $result = $db->query("SELECT * FROM classe c join annees a  where a.idAn='$id' and a.idAdm=$admin and c.anneeS=a.idAn  ");
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

          <!-- Page Heading -->
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des Classes et Matieres</h1>
            
          </div> -->

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?=lang('class') ?>
                      <!-- Nombre de Classes --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrClass; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-university fa-2x text-green-300"></i>
                     <!--  <i class="fas fa-users-class"></i> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 "><?=lang('mat') ?>
                     <!--  Nombre de Matieres --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrMat; //}?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-green-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            
   
   <!-- <div class="col-xl-6 col-md-6 mb-4">
   <a class="btn btn-danger " href="logout.php">log out</a>
   </div> -->



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
