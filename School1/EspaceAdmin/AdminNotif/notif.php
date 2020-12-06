<?php
error_reporting(0);
include ('../../lang/fb.php');
require_once '../../database/dbConfig.php';
require_once '../../database/function.php';
include('../session.php');
include("../../function/func.php");
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

  <title>notif</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- icones -->
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
   <style type="text/css">
.body1{
    background-color: rgba(26, 0, 0, 0.5);
    width: 900px;
  margin-top: 10px; 
    margin-left: 60px;
    padding-left: 60px;
}
a.bback{
	font-size: 120%;
    color:#4834d4; 
  text-align: center;
}
 .eme{
    font-size: 18px;
    text-align:center;
  }
  #bu1{
    text-align: center;
  }

  #no,.msg{font-size: 150%;
    color:#FFFF; 
    text-align: left;

  

  }
h1.hh{font-size: 200%;
    color:#130f40; 
  text-align: center;}
  /*#no,#bu1{font-size: 150%;
    color:#FFFF; 
  text-align: center;

  }*/
</style>

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
  <?php $param = ""; ?>
  <?php require '../defaultAdmin.php';

/*for ($j = 0; $j <count($_SESSION['nom_Mat']); $j++){
    echo $_SESSION['nom_Mat'][$j];
   }*/
?>
<?php  
 $id=$_SESSION['anneeS'];$admin=$_SESSION['id'];
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
        	<!-- <a class="bback" href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a> -->

           <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Statistiques</h1>
           
          </div> -->
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= lang('profs')?><!-- Professeurs inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtudiant; ?></div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 "><?= lang('stud')?><!-- Eleves inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtudiant; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Hommes Inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrGarcon; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->












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
          <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des etudiants</h1>
            
          </div> -->
          <!-- Content Row -->
         <!--  <div class="row"> -->
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Eleve inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtudiant; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
            






        


            <!-- view notification -->
<?php 
 
$admin=$_SESSION['id'];
    $id = $_GET['id'];
    $idA=$_SESSION['anneeS'];
    $do=isset($_GET['do']) ? $_GET['do'] :'default'; 
    //echo $idA;
    if($do=='not'){
    ?>

  

 <div class="body1">   
 	<h1 class="hh">Notifications</h1>
  <!-- <p id="no"> --><?php
    $query ="UPDATE `notifications` SET `status` = 'read' , ordering=1 WHERE `idNotif` = $id;";
    performQuery($query);

    $query = "SELECT * from `notifications` where `idNotif` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            $rang=$i['rang'];
           ?><p style="color:white;text-align: center;font-style: italic;" class="eme" ><?php echo $i['emetteur'].' ('.$i['date'].")</p>";
          
           
            
           ?><span class="msg"><?php echo $i['message'];?> </span> <?php
        }
    }?>
    <br/><!-- </p> -->
    <a id="bu1" class="btn btn-primary" href="reponse.php?idN=<?=$id?>&rang=<?=$rang?>&id_anneeS=<?=$idA;?>"><i class="fas fa-paper-plane"></i><?= lang('rep')?><!-- Répondre --></a>
    <a class="btn btn-danger confirm"  style="color:white;" href="reponse.php?idN=<?=$id?>&act=delNo"><i class='fa fa-close'></i><?= lang('delete')?></a>



  </div>  
  <?php
}

if($do=='msg'){

   
    ?>

  

 <div class="body1">   
  <h1 class="hh"><?=lang('Mess')?><!-- Message envoyé --></h1>
  <!-- <p id="no"> --><?php
    // $query ="UPDATE `notifications` SET `status` = 'read' , ordering=1 WHERE `idNotif` = $id;";
    // performQuery($query);

    $query = "SELECT * from `notifications` where `idNotif` = '$id';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            $rang=$i['rang'];
           ?><p style="color:white;text-align: center;font-style: italic;" class="eme" ><?php echo ucwords(lang('tto')).' '. $i['destinataire'].' ('.$i['date'].")</p>";
          
           
            
           ?><span class="msg"><?php echo $i['message'];?> </span> <?php
        }
    }?>
    <br/><!-- </p> -->
    <!-- <a id="bu1" class="btn btn-primary" href="reponse.php?idN=<?=$id?>&rang=<?=$rang?>&id_anneeS=<?=$idA;?>">Répondre</a> -->
    <a class="btn btn-danger confirm"  style="color:white;" href="reponse.php?idN=<?=$id?>&act=delmsg"><i class='fa fa-close'></i><?=lang('delete') ?></a>



  </div>  

  <?php
}


  ?>

            <!-- Earnings (Monthly) Card Example -->
            


   <!-- <a class="btn btn-danger "href="logout.php">log out</a> -->
   
<!-- java Script script-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../js/jquery.js"></script>
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
