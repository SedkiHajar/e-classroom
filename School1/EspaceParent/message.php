<?php
include('init.php');
include('session.php');
if(!isset($_SESSION['idP']) or !isset($_SESSION['mailPar'])  ){
      header("location:/School1/EspaceParent/index.php");
      die();
   }
/*include ('../lang/fb.php');

require_once '../database/function.php';

include("../function/func.php");
   include('session.php');
   if(!isset($_SESSION['idP']) or !isset($_SESSION['mailPar'])  ){
      header("location:/School1/EspaceParent/index.php");
     
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

</head>
<body>
    <!-- Le code par defaut -->

<?php 
$do=(isset($_GET['do'])) ? $do=$_GET['do']: $do='default'; 
$param='anP';
if($do=='Pro') $param='anP';
elseif ($do=='Adm') $param='anA';


require 'defaultParent.php';

/*for ($j = 0; $j <count($_SESSION['nom_Mat']); $j++){
    echo $_SESSION['nom_Mat'][$j];
   }*/
?>
<?php require_once '../database/dbConfig.php'; ?>




<!-- <h1 class="m-0 font-weight-bold text-primary " >Statistiques</h1><br> -->
<!-- Begin Page Content -->
<a class="bback" href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>
<?=lang('7') ?></a>
        <div class="container-fluid">

<?php 
$etu=$_SESSION['idP'];
$admin=$_SESSION['id_adminP'];
$an=$_SESSION['anneeE']; 
if($do=='Pro'){
  if(isset($_POST['rep'])){
          //echo 'yyyy';
          $param='anP';
          $prof=$_GET['CIN'];
          $result = $db->query("SELECT * FROM parent where idP='$etu' ");
          while($row = $result->fetch_assoc()){
                $emailA=$row['emailP'];
                $nomet=$row['nomP'];
                $prenome=$row['nomM'];
                
            }  
          $result = $db->query("SELECT * FROM professeur where CIN='$prof'  ");
            while($row = $result->fetch_assoc()){
              $emailA=$row['mail'];
              $nom=$row['nom'];
              $prenom=$row['prenom'];
                }  
           $message = $_POST['annonce'];
   
       //rang etu egale 4 qui envoie  au prof 3
          $dest="Professeur $nom $prenome"; 
          $emetteur="Parents $nomet et $prenom";// echo $emetteur;
          $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_par,id_profe,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$etu','$prof',5,'$emetteur','$dest',3)";
          if(performQuery($query)){
                 
                 
              $errorMsg= "Le message a été envoyé à ".ucwords($nom)." ".ucwords($prenom);
        
              echo "<div class='alert alert-success'>$errorMsg</div>";
                  
                     //header("location:annonce.php");
                 }
                 else {
                  
                  $errorMsg="Message encore non envoyé!";
                        echo "<div class='alert alert-danger'>$errorMsg</div>";
                      }
              }     
              
 
  $id_Class=$_SESSION['id_class'];
  
  
  //les profs
  $result = $db->query("SELECT * FROM professeur where anneeS=$an and id_admin=$admin  ");
      if($result->num_rows > 0){
         $i=1; ?>
   <!-- Table of prosect  -->
   <!-- DataTales Example -->
  <div class="card shadow col-xl-12 col-md-6 mb-4">
      <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">Les professeurs</h6>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead  class="table table-hover table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">CIN</th>
      <th scope="col">ANNEE SCOLAIRE</th>
      <th scope="col">NOM COMPLET</th>
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
      <td  style="color:#130f40"><?php echo  $row['nom'].' '.$row['prenom']; ?></td>
      <td style="color:#130f40"  ><?php echo $row['mail'] ; ?></td>

      
      <td class="" ><a  class="btn btn-info" href="?do=Pro&t=env&CIN=<?php echo ($row['CIN']); ?>&id_anneeS=<?php echo ($row['anneeS']); ?>"><i class="fas fa-reply"></i>envoyer</a></td>
      
      <?php $i++; ?>
      <?php }
    } ?>
    </tr>
  </tbody>
</table>
</div>
</div>
</div>

<?php 

  $t=(isset($_GET['t'])) ? $t=$_GET['t']: $t='default'; 

    if($t=='env'){
        $prof=$_GET['CIN'];
        $result = $db->query("SELECT * FROM professeur where CIN='$prof'  ");
        while($row = $result->fetch_assoc()){
                $emailA=$row['mail'];
                $nom=$row['nom'];
                $prenom=$row['prenom'];
                  }  
  
 ?>          
<fieldset>
  <legend>Message à <?= ucwords( $nom ).' '.ucwords($prenom) ?></legend>
    <form class="form-qst" method="post" action="?do=Pro&t=env&CIN=<?php echo $prof; ?>&id_anneeS=<?php echo $an; ?>">
      <ul>
        <li>
        <table id="table">
              <!-- ligne1 -->
          <tr>
              <td>
                  <textarea class="form-control" name="annonce" cols="100" rows="6">Veuillez saisir le message 
                  </textarea>
              </td>
          </tr>
             
        </table>
      </li>
      <li>
        <input class="btn btn-primary btn-sm " type="submit" name="rep" value="envoyer">
      </li>
       
    </form>

</fieldset>


<?php
        



   }
  }


 ?>
 <?php      

//$etu=$_SESSION['CIN'];  echo $etu;exit();



if($do=='Adm'){
//$admin=$_SESSION['id_adminE'];  


$result = $db->query("SELECT * FROM admin where id='$admin' ");
while($row = $result->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }  
 ?>  
<?php
if(isset($_POST['reply'])){
  $param='anA';
  $result = $db->query("SELECT * FROM parent where idP='$etu' ");
    while($row = $result->fetch_assoc()){
        $emailA=$row['emailP'];
        $nomet=$row['nomP'];
        $prenom=$row['nomM'];
        
            }  
  $result = $db->query("SELECT * FROM admin where id='$admin' ");
    while($row = $result->fetch_assoc()){
        $emailA=$row['mail'];
        $nom=$row['nomE'];
        $mdp=$row['mdp'];
            }  
  $message = $_POST['annonce'];
   
 //rang etu egale 4 qui envoie  au admin 2
    $dest="Direction $nom"; 
    $emetteur="Parents $nomet et $prenom";// echo $emetteur;

    //echo 'master'.$master.'adm'.$admin;    
      
      

     $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_par,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$etu',$admin,5,'$emetteur','$dest',2)";
                 if(performQuery($query)){
                 
                 
              $errorMsg= "Le message a été envoyé à $nom.";
        
              echo "<div class='alert alert-success'>$errorMsg</div>";
                  
                     //header("location:annonce.php");
                 }
                 else {
                  
                  $errorMsg="Message encore non envoyé!";
                        echo "<div class='alert alert-danger'>$errorMsg</div>";}
              }
?>                
<fieldset>
  <legend>Message à <?= ucwords( $nom )?></legend>
    <form class="form-qst" method="post" action="?do=Adm">
      <ul>
        <li>
        <table id="table">
              <!-- ligne1 -->
          <tr>
              <td>
                  <textarea class="form-control" name="annonce" cols="100" rows="6">Veuillez saisir le message 
                  </textarea>
              </td>
          </tr>
             
        </table>
      </li>
      <li>
        <input class="btn btn-primary btn-sm " type="submit" name="reply" value="envoyer">
      </li>
       
    </form>

</fieldset>
     
     <?php  
 
            }
                   ?>

       
  




 



</body>
</html> 
<!-- java Script script-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="EspaceAdmin/js/AjouterEtud.js?2"></script>
<script src="EspaceAdmin/js/jquery.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- 
<script src="js/AjouterEtud.js?2"></script> -->
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
