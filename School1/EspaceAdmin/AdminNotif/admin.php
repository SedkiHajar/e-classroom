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

  <title>EspaceProf</title>



  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
   <style type="text/css">
.body1{
    background-color: rgba(26, 0, 0, 0.5);
    width: 900px;
  margin-top: 10px; 
    margin-left: 60px;
    padding-left: 60px;
}
h1.hh{font-size: 200%;
    color:#130f40; 
  text-align: center;}
  a.bback{
    font-size: 150%;
    color:#4834d4; 
  text-align: center;
  }
  #no,#bu1{font-size: 150%;
    color:#FFFF; 
  text-align: center;

  }

  fieldset{
  width: 97%;
  display: block;
  margin-left: 2px;
  margin-right: 2px;
  padding-top: 0.35em;
  padding-bottom: 0.625em;
  padding-left: 0.75em;
  padding-right: 0.75em;
  border: 2px groove;
  background-color: #dff9fb;
}

fieldset legend{
  font: 20px 'Poppins' , sans-serif;
  color:#130f40;
  
}




.btn.btn-primary.btn-sm{
  border-radius:5%;
  background: #478bf9;
  border: 1px #478bf9 solid;
  color:#fff;
  font-family: 12px 'Poppins' , sans-serif;
  padding:6px 0 6px 0;
  width: 200px;
}

li .btn.btn-primary.btn-sm.ajouter{
  width: 30px;
}

li .btn.btn-primary.btn-sm.valider{
  position: relative;
  left: 98%;
  transform: translateX(-98%) translateY(65%);
}

form ul li {
  list-style: none;
}

form ul li input{
  font: 15px 'Poppins' , sans-serif;
}

form ul li tr td label{
  font: 15px 'Poppins' , sans-serif;
}

form ul li tr td input{
  font: 15px 'Poppins' , sans-serif;
}

label{
  color:#130f40;
}

form ul li p{
  font: 15px 'Poppins' , sans-serif;
}
</style>

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

</head>
<body>
    <!-- Le code par defaut -->
  <?php $param = "anA"; ?>
  <?php require '../defaultAdmin.php';

/*for ($j = 0; $j <count($_SESSION['nom_Mat']); $j++){
    echo $_SESSION['nom_Mat'][$j];
   }*/
?>
<?php 

$id_prof=$_SESSION['id'];
$an=$_SESSION['anneeS']; 
$admin=$_SESSION['id_admin'];
 ?>












<?php   $result = $db->query("SELECT DISTINCT CIN,sexe FROM etudiant e  INNER JOIN matclass m ON m.id_Class=e.classe WHERE m.id_prof='$id_prof' and id_admin=$admin ");
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
            <h1 class="h3 mb-0 text-gray-800">Gestion des etudiants</h1>
            
          </div>
          <!-- Content Row -->
          <div class="row">
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
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
            </div>
         
         <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Filles inscrites</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrFille; ?></div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Garcon Inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrGarcon; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>



</div>
<?php

//$CIN=$_GET['CIN'];  
$idA=$_SESSION['anneeP'];
$admin=$_SESSION['id_admin'];
//echo $id_admin,$id_prof;

$result = $db->query(" SELECT * FROM professeur  WHERE CIN='$id_prof' ");
while($row = $result->fetch_assoc()){
      $email=$row['mail'];$nomet=$row['nom'];$prenom=$row['prenom'];
              $mdp=$row['mdp'];//$admin=$row['id_admin'];
            }
$res = $db->query("SELECT * FROM admin WHERE id='$admin' ");
  while($row = $res->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }            
?>
<fieldset>
  <legend>Annonce pour <?= $nom ?></legend>
    <form class="form-qst" method="post" action="?CIN=<?=$id_prof; ?>&id_anneeS=<?=$idA; ?>">
      <ul>
        
        <li>
        <table id="table">
              <!-- ligne1 -->
              
               
              <tr>
                
                <td><!-- <input type="text" name="annonce"> -->
                  <textarea class="form-control" name="annonce" cols="100" rows="6">Veuillez saisir l'annonce 
                  </textarea>
                </td>
              </tr>
             
        </table>
      </li>
      <li>
        <!--  <button name="publier" class="btn btn-outline-success my-2 my-sm-0" type="submit">publier  </button> -->
        <input class="btn btn-primary btn-sm " type="submit" name="reply" value="publier">
      </li>
       
    </form>

  </fieldset>







        


            <!-- repondre notification -->
<?php 
//$CIN=$_GET['CIN'];  
$idA=$_SESSION['anneeP'];

if(isset($_POST['reply'])){
  $message = $_POST['annonce'];
   //rang prof egale 3 qui envoie  au admin 
$emetteur="Professeur $nomet $prenom"; 
$dest="Direction $nom";     
  
  //prof envoie au admin
  

 $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_profe,id_adm,rang,emetteur,destinataire) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,$id_prof,$admin,3,'$emetteur','$dest')";
             if(performQuery($query)){
             
             
          $errorMsg= "La publication a été envoyé à $nom.";
    
          echo "<div class='alert alert-success'>$errorMsg</div>";
              
                 //header("location:annonce.php");
             }
             else {
              
              $errorMsg="Publication encore non envoyé!";
                    echo "<div class='alert alert-danger'>$errorMsg</div>";}
          }
                           

?>
 

<a class="bback" href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a>

 

            <!-- Earnings (Monthly) Card Example -->
            


   <!-- <a class="btn btn-danger "href="logout.php">log out</a> -->
   
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
