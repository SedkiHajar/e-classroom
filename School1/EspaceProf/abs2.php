
<?php
include('init.php');
include('session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
    die();
   }
  /*error_reporting(0);
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

  <title>AjouterEtudiant</title>

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
//aficher les info 
$id_Prof= $_SESSION['id'];
$id_Class=$_GET['id_class'];
$nom_Mat=$_GET['nom_mat'];
$id_Etudiant=$_POST['id_etudiant'];
$abs = $_POST['abs'];
$dateA=date ('Y-m-d H:i:s', strtotime($_POST['dateA']));
$nbrH=$_POST['nbrH'];
$id_Mat=$_GET['id_mat'];
//Enregitrer dans la base de donné
 if($_SERVER["REQUEST_METHOD"] == "POST") { 
    for ($j = 0; $j <count($id_Etudiant); $j++)
    {
        //echo $abs[$j];
      if($abs[$j]=='oui'){
       
        $insert = $db->query("INSERT INTO abs(date,nbrHeur,id_mat,id_etudiant) VALUES ('$dateA','$nbrH','$id_Mat','$id_Etudiant[$j]')");
        if($insert){
            $status = 'success';
            $statusMsg = "prospect upload successfully.";
        }else{
            $statusMsg = "File upload failed, please try again.". $db->error;
        }
    }
    }
    //echo $statusMsg;
}
?>
<div class="col-xl-12 col-lg-12 card shadow mb-4 " style="margin-top:10px;">
<a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a>
</div>
<h3 class=" font-weight-bold text-info text-center shadow  titre" style="margin-top: 50px;"> Espace des Absences </h3>
<div class="col-xl-12 col-lg-12 card shadow mb-4 " style="background-color:white;font-weight: bold; margin-top:100px;">
    <form action="" role="form" method="post" enctype="multipart/form-data">
     <div class="form-group col-md-12" >
     <label for="classe">date d'absence </label>
         <input name="dateA" type="datetime-local"value=""class="form-control" >
     </div>
     <div class="form-group col-md-12" >
     <label for="classe">nombre d'heure </label>
         <input name="nbrH" type="text" placeholder="1H00" class="form-control" >
     </div>
    <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead  class="table table-hover table-primary">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">NOM</th>
                        <th scope="col">PRENOM</th>
                        <th scope="col">Absence</th>
                        <th scope="col">voir les absences</th>

                    </tr>
                </thead>
                <tbody>        
                    <?php
                    //les etudiant 
                    $result1 = $db->query("SELECT * FROM etudiant WHERE classe='$id_Class'");
                    while ($row1 =$result1->fetch_assoc()) {
                        $i=1;
                        ?>
                        <tr>
                            <th class="table-primary" scope="row"><?php echo $i; ?></th>
                            <td class=""><?php echo $row1['nomE']; ?></td>
                            <td class=""><?php echo $row1['prenom']; ?></td>
                            <td class="table-danger">
                                <select class="custom-select" id="inputGroupSelect01" name="abs[]">
                                    <option value="non">non</option>
                                    <option value="oui">oui</option>
                                </select>
                        </td>
                            <td class=""><a href="abs3.php?CIN=<?php echo $row1['CIN'];?>&amp;id_mat=<?php echo $id_Mat;?>&amp;nom_mat=<?php echo $nom_Mat;?>" style="color: green;">--></a></td>
                        </tr>
                        <input name="id_etudiant[]"value="<?php echo $row1['CIN'];?>" style="display: none;">
                         <?php } ?>      
                </tbody>
            </table>
            <button type="submit" class="btn btn-info">Enregistrer</button>
    </form>
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
