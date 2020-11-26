<?php
error_reporting(0);
include ('../../lang/fb.php');
   require_once '../../database/dbConfig.php';
   require_once '../../database/function.php';
   include('../session.php');
   include '../../function/func.php';
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

  <title>Prof</title>
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
    font-size: 120%;
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
$do=(isset($_GET['do'])) ? $do=$_GET['do']: $do='default'; 
if($do=='Prof') $param='anP';
elseif ($do=='Etu') $param='anE';
elseif ($do=='Par') $param='anPe';
elseif ($do=='Mas') $param='anM';
  
//echo $param;
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
          <a class="bback" href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i><?= lang('7')?></a>
          <!-- Page Heading -->
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        <?=lang('profs') ?><!-- Professeurs inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtu; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-green-300"></i>
                      <!-- <i class="fas fa-calendar fa-2x text-gray-300"></i> -->
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 ">
                        <?=lang('stud') ?><!-- Eleves inscrits --></div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrEtudiant; ?></div>
                    </div>
                    <div class="col-auto">
                     <!--  <i class="fad fa-users-class"></i> -->

                      <i class="fas fa-user-graduate fa-2x text-green-300"></i>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrGarcon; //}?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div> -->
  <!-- visualiser les etudiant dans un tableaux -->
    <!-- Appel de la base de dennée -->
    <!-- slect info from table -->
   <?php $do=(isset($_GET['do'])) ? $do=$_GET['do']: $do='default'; 
   //echo $do;
   if ($do=='Prof'){

   ?>
   <?php   $result = $db->query("SELECT * FROM professeur WHERE anneeS='$id' and id_admin=$admin");
     if($result->num_rows > 0){
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?=lang('proft')?><!-- Les professeurs --></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr class="text-uppercase">
      <th scope="col">#</th>
      <th scope="col">CIN</th>
      <th scope="col"><?=lang('12')?><!-- ANNEE SCOLAIRE --></th>
      <th scope="col"><?=lang('full')?><!-- NOM COMPLET --></th>
      <th scope="col">EMAIL</th>
      <th scope="col">MESSAGE</th>
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>
      <td class="" style="color:#130f40" ><?php echo $row['CIN']; ?></td>
      <?php $id_anneeS= $row['anneeS']?>
      <?php   $result1 = $db->query("SELECT nomA FROM annees WHERE idAn='$id_anneeS'");?>
        <?php while($row1 = $result1->fetch_assoc()){?>
      <td class="" style="color:#130f40"><?php echo $row1['nomA']; ?></td><?php  } ?>
      <td  style="color:#130f40"><?= htmlspecialchars(ucwords($row['nom']).' '.ucwords($row['prenom'])); ?></td>
      <td style="color:#130f40"  ><?php echo $row['mail'] ; ?></td>

      
      <td class="" ><a class="btn btn-info" href="AnnoncePro.php?do=Pro&CIN=<?php echo ($row['CIN']); ?>&id_anneeS=<?php echo ($row['anneeS']); ?>"><i class="fas fa-paper-plane"></i><?=lang('sent') ?></a></td>
      
      <?php $i++; ?>
      <?php }
    } ?>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>

<?php }

?>
<?php
 if ($do=='Etu'){
  

 $result = $db->query("SELECT * FROM etudiant WHERE anneeS='$id' and id_admin=$admin ");
 if($result->num_rows > 0){
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?=lang('etus')?><!-- Les étudiants --></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr class="text-uppercase">
      <th scope="col">#</th>
      <th scope="col">CIN</th>
      <th scope="col"><?=lang('12')?><!-- ANNEE SCOLAIRE --></th>
      <th scope="col"><?=lang('full')?></th>
      <th scope="col"><?=lang('classe')?></th>
      <th scope="col">EMAIL</th>
      <th scope="col">MESSAGE</th>
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>
      <td class="" style="color:#130f40" ><?php echo $row['CIN']; ?></td>
      <?php $id_anneeS= $row['anneeS']?>
      <?php   $result1 = $db->query("SELECT nomA FROM annees WHERE idAn='$id_anneeS'");?>
        <?php while($row1 = $result1->fetch_assoc()){?>
      <td class="" style="color:#130f40"><?php echo $row1['nomA']; ?></td><?php  } ?>
      <td  style="color:#130f40"><?= htmlspecialchars(ucwords($row['nomE']).' '.ucwords($row['prenom'])); ?></td>
      <?php $id_classe= $row['classe']?>
      <?php   $result1 = $db->query("SELECT nom FROM classe WHERE id='$id_classe'");?>
        <?php while($row1 = $result1->fetch_assoc()){?>
      <td style="color:#130f40"  class=""><?php echo $row1['nom']; ?></td> <?php } ?>
      <td style="color:#130f40"  ><?php echo $row['mail'] ; ?></td>

      
      <td class="" ><a class="btn btn-info" href="AnnonceEtu.php?do=Etu&CIN=<?php echo ($row['CIN']); ?>&id_anneeS=<?php echo ($row['anneeS']); ?>"><i class="fas fa-paper-plane"></i><?=lang('sent') ?></a></td>
      
      <?php $i++; ?>
      <?php }
    } ?>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>

<?php }
?>

<?php 
if ($do=='Par'){
 $result = $db->query("SELECT * FROM parent p inner join etudiant e on e.idPar=p.idP WHERE  anneeS='$id' and e.id_admin=$admin ");
 if($result->num_rows > 0){
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary"><?=lang('pars')?><!-- Les parents --></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr class="text-uppercase">
      <th scope="col">#</th>
      <th scope="col"><?=lang('12')?><!-- ANNEE SCOLAIRE --></th>
      <th scope="col"><?=lang('namep')?><!-- NOM PERE --></th>
      <th scope="col"><?=lang('namem')?><!-- NOM MERE --></th>
      <th scope="col"><?=lang('emailm')?><!-- EMAIL PERE --></th>
      <th scope="col"><?=lang('emailm')?><!-- EMAIL MERE --></th>
      <!-- <th scope="col">PRENOM</th> -->
      <th scope="col"><?=lang('preetu')?><!-- prenom ETUDIANT --></th>
      <th scope="col"><?=lang('classe')?></th> 
      <th scope="col">MESSAGE</th>
     <!--  <th scope="col">ABSENCE</th> -->
      <!-- <th scope="col">SUPPRIMER</th> -->
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>
     <!--  <td class=""><?php //echo $row['CIN']; ?></td> -->
      <?php $id_anneeS= $row['anneeS']?>                      
      <?php   $result1 = $db->query("SELECT nomA FROM annees WHERE idAn='$id_anneeS'");?>  
        <?php while($row1 = $result1->fetch_assoc()){?> 
      <td style="color:#130f40" class=""><?php echo $row1['nomA']; ?></td><?php  } ?>
      <td style="color:#130f40" class=""><?= htmlspecialchars(ucwords( $row['nomP'])); ?></td>
       <td style="color:#130f40" class=""><?= htmlspecialchars(ucwords($row['nomM'])); ?></td>
       <td style="color:#130f40" class=""><?php echo  $row['emailP']; ?></td>
       <td style="color:#130f40" class=""><?php echo  $row['emailM']; ?></td>
        
      <td style="color:#130f40" class=""><?=htmlspecialchars($row['prenom']); ?></td> 
      <?php $id_classe= $row['classe']?>
        <?php   $result1 = $db->query("SELECT nom FROM classe WHERE id='$id_classe'");?>
        <?php while($row1 = $result1->fetch_assoc()){?>
      <td style="color:#130f40" class=""><?php echo $row1['nom']; ?></td> <?php } ?>
     <!--  <td class="bg-info"><a style="color:white;" href="infoEtudiant.php?CIN=<?php //echo ($row['CIN']); ?>">Plus </a></td> -->
      <td class="" ><a class="btn btn-info" href="AnnoncePar.php?do=Par&id=<?php echo ($row['idP']); ?>&id_anneeS=<?php echo ($row['anneeS']); ?>"><i class="fas fa-paper-plane"></i><?=lang('sent') ?></a></td>
      
      <?php $i++; ?>
      <?php } ?>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>

<?php } 

}
 ?>

 <?php  

 if ($do=='Mas'){
  $master=$_SESSION['idMaster'];
  $idA=$_SESSION['anneeS'];
  $admin=$_SESSION['id'];
  //echo $master;
//echo $id_admin,$id_prof;

$result = $db->query(" SELECT * FROM masteradmin  WHERE idMa='$master' ");
while($row = $result->fetch_assoc()){
      $email=$row['mailM'];$nomet=$row['nom'];$prenom=$row['prenom'];
              $mdp=$row['mdpM'];//$admin=$row['id_admin'];
            }
$res = $db->query("SELECT * FROM admin WHERE id='$admin' ");
  while($row = $res->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }            

?>
<fieldset>
  <legend>Message  <?= lang('tto') .' '.ucwords($nomet).' '.ucwords($prenom)  ?></legend>
    <form class="form-qst" method="post" action="traitAnnonce.php?do=Mas&id=<?=$admin; ?>&id_anneeS=<?=$idA; ?>">
      <ul>
        <li>
        <table id="table">
              <!-- ligne1 -->
          <tr>
              <td>
                  <textarea class="form-control" name="annonce" cols="100" rows="6">
                  </textarea>
              </td>
          </tr>
             
        </table>
      </li>
      <li>
        <input class="btn btn-primary btn-sm " type="submit" name="reply" value="<?= lang('sent')?>">
      </li>
       
    </form>

</fieldset>

<?php
 



 ?>




<?php
}



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
