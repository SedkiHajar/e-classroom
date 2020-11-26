<?php
 include('init.php');
 include('session.php');
 if(!isset($_SESSION['id']) or !isset($_SESSION['mailM'])  ){
      header("location:/School1/EspaceMasterAdmin/index");
     die();
   }
  // else  header("location:/School1/EspaceMasterAdmin/welcome");
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>welcome master admin</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">
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

</head>
<body>
    <!-- Le code par defaut -->

<?php 
$param = "env" ;
require 'defaultMaster.php';

/*for ($j = 0; $j <count($_SESSION['nom_Mat']); $j++){
    echo $_SESSION['nom_Mat'][$j];
   }*/
?>
<?php require_once '../database/dbConfig.php'; ?>




<!-- <h1 class="m-0 font-weight-bold text-primary " >Statistiques</h1><br> -->


<?php 
$master=$_SESSION['id'];  

$result = $db->query("SELECT * FROM admin where idMas='$master' ");
     $nbrAdmin=0;
      ?>
     <?php while($row = $result->fetch_assoc()){
      $nbrAdmin++;
      
        // code...
      
    }
       ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Page Heading -->
         <!--  <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Gestion des Admin</h1>
           
          </div> -->
          <!-- Content Row -->
          <!-- <div class="row"> -->
            <!-- Earnings (Monthly) Card Example -->
            <!-- <div class="col-xl-4 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Admin inscrits</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $nbrAdmin; ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
      </div> -->

      <!-- reply -->

<a class="bback" href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i><?=lang('7') ?><!-- Retour --></a>


      <!-- message -->

<?php   $result = $db->query("SELECT * FROM admin where idMas='$master' ");
     if($result->num_rows > 0){
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary text-uppercase"><?=lang('schools')?><!-- Les écoles --></h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr>
      <th scope="col">#</th>
      <!-- <th scope="col">ID</th> -->
      <th scope="col" class="text-uppercase"> <?=lang('schName') ?><!-- NOM ECOLE --></th>
      <th scope="col" class="text-uppercase">MESSAGE</th>
      
    </tr>
  </thead>
  <tbody>
    <?php while($row = $result->fetch_assoc()){?>
    <tr>
      <th class="bg-dark" scope="row"><?php echo $i; ?></th>
     <!--  <td class="bg-light" style="color:black;"><?php echo $row['id']; ?></td> -->
      <td class="bg-success" style="color: white;font-weight: bold;"><?php echo strtoupper( $row['nomE']); ?></td>
       
     
     
      <!-- <td class="bg-warning"><a style="color:white;" href="new_pm.php?id=<?php echo ($row['id']); ?>&amp;choix=contacter">contacter</a></td> -->
      <td class="bg-light"><a class="btn btn-primary" style="color:white;" href="?do=Adm&ID=<?php echo ($row['id']); ?>"><i class="fas fa-reply"></i><?= lang('sent')?><!-- envoyer --></a></td>
      
      
      <?php $i++; ?>
      <?php } ?>
    </tr>
  </tbody>
</table>
<!-- <div class="foot"><a href="list_pm.php">Voir mes messages priv&eacute;s</a> </div> -->
</div>
</div>
</div>

<?php } ?>      

 <!-- if ($do=='Mas'){ -->
 <?php
  $do=(isset($_GET['do'])) ? $do=$_GET['do']: $do='default'; 
  $admin=(isset($_GET['ID'])) ? $admin=$_GET['ID']: $admin='default'; 
 if($do=='Adm'){
  $admin=$_GET['ID'];//echo $admin;
 

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
     <?php
if(isset($_POST['reply'])){
  $message = $_POST['annonce'];
   
 //rang admin egale 2 qui envoie  au master 1
$dest="Direction $nom"; 
$emetteur="Master $nomet $prenom"; 
$admin=$_GET['ID'];
//echo 'master'.$master.'adm'.$admin;    
  
  
  //ùaster envoie au admin
  

 $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_mast,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,$master,$admin,1,'$emetteur','$dest',2)";
             if(performQuery($query)){
             
             
          $errorMsg= "Le message a été envoyé à $nom.";
    
          echo "<div class='alert alert-success'>$errorMsg</div>";
              
                 //header("location:annonce.php");
             }
             else {
              
              $errorMsg="Publication encore non envoyé!";
                    echo "<div class='alert alert-danger'>$errorMsg</div>";}
          }
                           




?>

<fieldset>
  <legend>Message  <?= lang('tto').' '. ucwords( $nom )?></legend>
    <form class="form-qst" method="post" action="?do=Adm&ID=<?=$admin; ?>">
      <ul>
        <li>
        <table id="table">
              <!-- ligne1 -->
          <tr>
              <td>
                  <textarea class="form-control" name="annonce" cols="100" rows="6">

                  </textarea>
                  <!-- Veuillez saisir le message  -->
              </td>
          </tr>
             
        </table>
      </li>
      <li>
        <input class="btn btn-primary btn-sm " type="submit" name="reply" value="<?=lang('sent')?>">
      </li>
       
    </form>

</fieldset>
<?php } ?>



</body>
</html> 
<!-- java Script script-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

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
