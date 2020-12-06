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
  <title>Annonce</title>

  <!-- css -->
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=Poppins');

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
a.bback{
    font-size: 120%;
    color:#4834d4; 
  text-align: center;
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
  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">
</head>
<body>
  <?php $param = "anPe" ;?>
<?php require '../defaultAdmin.php';?>

<!-- Appel de la base de dennée -->
<?php //require_once '../../database/dbConfig.php';


$admin=$_SESSION['id'];
$idP=$_GET['id'];  
$idA=$_SESSION['anneeS'];


$result = $db->query("SELECT * FROM parent WHERE idP='$idP' ");
while($row = $result->fetch_assoc()){
      $email=$row['emailP'];$nomet=$row['nomP'];$prenom=$row['nomM'];
              $mdp=$row['mdpP'];
            }
$res = $db->query("SELECT * FROM admin WHERE id='$admin' ");
while($row = $res->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }

 ?>
<!-- slect info from table -->
<?php  
$admin=$_SESSION['id'];
 $result = $db->query("SELECT * FROM professeur  where anneeS='$idA' and id_admin='$admin'");
     $nbrEtu=0;
     $nbrFille=0;
     $nbrGarcon=0; ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrEtu++;
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

         <?php   $result = $db->query("SELECT * FROM etudiant where anneeS='$idA' and id_admin=$admin");
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
          <a class="bback" href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i><?= lang('7')?></a>
         <!--  <div class="d-sm-flex align-items-center justify-content-between mb-4">
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtu; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
           <!--  <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">Femmes inscrites</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrFille; ?></div>
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
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"><?= lang('stud')?><!-- Eleves inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtudiant; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Pending Requests Card Example -->
            <!--<div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Classes en totale </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">0</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>-->
          <!-- formulaire annonce  -->
<fieldset>
  <legend>Message <?= lang('tto') .' '.ucwords($nomet).' '.lang('and').' '.ucwords($prenom)  ?></legend>
    <form class="form-qst" method="post" action="traitAnnonce.php?do=Par&id=<?=$idP; ?>&id_anneeS=<?=$idA; ?>">
      <ul>
        
        <li>
        <table id="table">
              <!-- ligne1 -->
              
               
              <tr>
                
                <td><!-- <input type="text" name="annonce"> -->
                  <textarea class="form-control" name="annonce" cols="100" rows="6">
                  </textarea>
                </td>
              </tr>
             
        </table>
      </li>
      <li>
        <!--  <button name="publier" class="btn btn-outline-success my-2 my-sm-0" type="submit">publier  </button> -->
        <input class="btn btn-primary btn-sm " type="submit" name="paren" value="<?= lang('sent')?>">
      </li>
       
    </form>

  </fieldset>
  <div></div>
  </body>
  </html>
 
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

   <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
</body>
</html>