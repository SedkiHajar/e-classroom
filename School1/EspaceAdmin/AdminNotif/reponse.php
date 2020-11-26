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

  <title>ADMIN</title>



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
.body2{
    /*background-color: rgba(26, 0, 0, 0.5);*/
    width: 800px;
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
           <a class="bback" href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i><?= lang('7')?></a>

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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> <?=lang('profs') ?><!-- Professeurs inscrits --></div>
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
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 "> <?=lang('stud') ?><!-- Eleves inscrits --></div>
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

<?php
$rang=isset($_GET['rang']) ? $_GET['rang'] :'default';
$act=isset($_GET['act']) ? $_GET['act'] :'default';


//echo $rang;

$CIN=$_GET['idAd'];  
$notif=$_GET['idN'];
$idA=$_SESSION['anneeS'];
$admin=$_SESSION['id'];
///supprimer notif
if($act=='delNo') {  
   $query ="UPDATE `notifications` SET `droitNo` = '1'  WHERE `idNotif` = $notif;";
    performQuery($query);
    $query = "SELECT * from `notifications` where `idNotif` = '$notif';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            $droitNo=$i['droitNo'];$droitmsg=$i['droitmsg'];
            if($droitNo==1 and $droitmsg==$droitNo){
                $query ="DELETE  FROM `notifications`   WHERE `idNotif` = $notif;";
                performQuery($query);
              }

                                      }
                         }
          ?><div class="body2">
           <?php echo "<div class=alert-success>".lang('supm') ."</div>";
         //Suppression de Notification  avec succés</div>"; 
          ?>
           </div>
           <?php            
    }

    ///supprimer notif
if($act=='delmsg') {  
   $query ="UPDATE `notifications` SET `droitmsg` = '1'  WHERE `idNotif` = $notif;";
    performQuery($query);
    $query = "SELECT * from `notifications` where `idNotif` = '$notif';";
    if(count(fetchAll($query))>0){
        foreach(fetchAll($query) as $i){
            $droitNo=$i['droitNo'];$droitmsg=$i['droitmsg'];
            if($droitmsg==1 and $droitmsg==$droitNo){
                $query ="DELETE  FROM `notifications`   WHERE `idNotif` = $notif;";
                performQuery($query);
              }

                                      }
                         }
        ?><div class="body2">
        <?php  echo "<div class=alert-success>".lang('supm') ."</div>";
        //Suppression de Message  avec succés
         ?>
        </div>   <?php   
        // header("location:/School1/EspaceMasterAdmin/welcome.php");       
    }


//info admin
$resA = $db->query("SELECT * FROM admin WHERE id=$admin ");
    while($row = $resA->fetch_assoc()){
          $emailA=$row['mail'];
          $nomE=$row['nomE'];
          $mdp=$row['mdp'];

          
              }  
//master
if($rang==1) {  
    $sql = mysqli_query($db,"SELECT id_mast,message FROM notifications WHERE idNotif=$notif");
    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
     $master=$row['id_mast'];$message=$row['message'];
     $result = $db->query(" SELECT * FROM masteradmin  WHERE idMa='$master' ");
  while($row = $result->fetch_assoc()){
         $email=$row['mailM'];
            $nom=$row['nom'];
            $prenomM=$row['prenom'];
              }
    
    
      ?>
  
                <fieldset>
    <legend><?= lang('rep').' '.lang('tto').' '. ucwords($nom).' '.ucwords($prenomM) ?> </legend>
      <form class="form-qst" method="post" action="?idN=<?=$notif?>&rang=<?=$rang?>&id_anneeS=<?=$idA; ?>"">
        <ul>
          
          <li>
          <table id="table">
                <!-- ligne1 -->
                
                 
                <tr>
                  
                  <td><!-- <input type="text" name="annonce"> -->
                    <textarea class="form-control" name="annonce" cols="100" rows="6"><?= lang('rep').' '.lang('tto').': '.$message; ?>
                    </textarea>
                  </td>
                </tr>
               
          </table>
        </li>
        <li>
          <!--  <button name="publier" class="btn btn-outline-success my-2 my-sm-0" type="submit">publier  </button> -->
          <input class="btn btn-primary btn-sm " type="submit" name="reply" value="<?=lang('sent')?>">
        </li>
         
      </form>

    </fieldset>
     <?php   if(isset($_POST['reply'])){

  //$admin=$_GET['idAd'];  
    
              
  $message = $_POST['annonce'];
    //rang prof egale 3 qui envoie  au admin 
  $dest="Master $nom $prenomM"; 
  $emetteur="Direction $nomE";     
    
    //echo $CIN,$admin;
    

   $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_mast,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$master',$admin,2,'$emetteur','$dest',1)";
               if(performQuery($query)){
               
               
            $errorMsg= lang('reussi')." ".ucwords($nom).' '.ucwords($prenomM);
            //message ete envoye a
            echo "<div class='alert alert-success'>$errorMsg</div>";
                
                   //header("location:annonce.php");
               }
               else {
                
                $errorMsg=lang('echec');;
                      echo "<div class='alert alert-danger'>$errorMsg</div>";}
            }

            ?>
    <?php 
  


  
                           
}
            




//prof 
if($rang==3) {  
  $sql = mysqli_query($db,"SELECT id_profe,message FROM notifications WHERE idNotif=$notif");
  $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $prof=$row['id_profe'];$message=$row['message'];
   $result = $db->query(" SELECT * FROM professeur  WHERE CIN='$prof' ");
while($row = $result->fetch_assoc()){
      $email=$row['mail'];$nomet=$row['nom'];$prenom=$row['prenom'];
              $mdp=$row['mdp'];//$admin=$row['id_admin'];
            }
  
  
    ?>
              <fieldset>
  <legend><?= lang('rep').' '.lang('tto').' '.ucwords($nomet). ' '.ucwords($prenom)?> </legend>
    <form class="form-qst" method="post" action="?idN=<?=$notif?>&rang=<?=$rang?>&idAd=<?=$admin; ?>&id_anneeS=<?=$idA; ?>">
      <ul>
        
        <li>
        <table id="table">
              <!-- ligne1 -->
              
               
              <tr>
                
                <td><!-- <input type="text" name="annonce"> -->
                  <textarea class="form-control" name="annonce" cols="100" rows="6"><?= lang('rep').' '.lang('tto').': '.$message ;?> 
                  </textarea>
                </td>
              </tr>
             
        </table>
      </li>
      <li>
        <!--  <button name="publier" class="btn btn-outline-success my-2 my-sm-0" type="submit">publier  </button> -->
        <input class="btn btn-primary btn-sm " type="submit" name="reply" value="<?=lang('sent')?>">
      </li>
       
    </form>

  </fieldset>
  <?php 
$admin=$_GET['idAd'];  
$idA=$_SESSION['anneeS'];

if(isset($_POST['reply'])){
  
            
$message = $_POST['annonce'];
  //rang prof egale 3 qui envoie  au admin 
$dest="Professeur $nomet $prenom"; 
$emetteur="Direction $nomE";     
  
  //echo $CIN,$admin;
  

 $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_profe,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$prof',$admin,2,'$emetteur','$dest',3)";
             if(performQuery($query)){
             
             
          $errorMsg=lang('reussi')." " .ucwords($nomet. ' '.$prenom);
    //"Le message a été envoyé à "
          echo "<div class='alert alert-success'>$errorMsg</div>";
              
                 //header("location:annonce.php");
             }
             else {
              
              $errorMsg=lang('echec');
                    echo "<div class='alert alert-danger'>$errorMsg</div>";}
          }
                           

?>
 

<?php 


}      




//parent
elseif($rang=='5') {   
$sql = mysqli_query($db,"SELECT id_par,message FROM `notifications` WHERE idNotif=$notif");
$row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $par=$row['id_par']; $message=$row['message'];
    $resP = $db->query("SELECT * FROM parent WHERE idP='$par' ");
      while($row = $resP->fetch_assoc()){
            $emailA=$row['emailP'];
            $nomP=$row['nomP'];
            $mdp=$row['mdpP']; 
            $prenomp=$row['nomM']; 
            } ?>
<fieldset>
  <legend><?= lang('rep').' '.lang('tto').' '.ucwords($nomP ).' '.lang('and').' '.ucwords($prenomp) ?> </legend>
    <form class="form-qst" method="post" action="?idN=<?=$notif?>&rang=<?=$rang?>&CIN=<?=$CIN; ?>&id_anneeS=<?=$idA; ?>">
      <ul>
        
        <li>
        <table id="table">
              <!-- ligne1 -->
              
               
              <tr>
                
                <td><!-- <input type="text" name="annonce"> -->
                  <textarea class="form-control" name="annonce" cols="100" rows="6"><?= lang('rep').' '.lang('tto').': '. $message; ?> 
                  </textarea>
                </td>
              </tr>
             
        </table>
      </li>
      <li>
        <!--  <button name="publier" class="btn btn-outline-success my-2 my-sm-0" type="submit">publier  </button> -->
        <input class="btn btn-primary btn-sm " type="submit" name="reply" value="<?=lang('sent')?>">
      </li>
       
    </form>

  </fieldset>
  <?php 
$admin=$_SESSION['id'];  
$idA=$_SESSION['anneeS'];

if(isset($_POST['reply'])){
  
            
$message = $_POST['annonce'];
  //rang prof egale 3 qui envoie  au parent 5 
$emetteur="Direction $nomE"; 
$dest="Parents $nomP et $prenomp";    
echo $dest; 
  
  //echo $CIN,$admin;
  

 $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_adm,id_par,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$admin',$par,2,'$emetteur','$dest',5)";
             if(performQuery($query)){
             
             
          $errorMsg= "Le message a été envoyé à ".ucwords($nomP. ' '.$prenomp);;
    
          echo "<div class='alert alert-success'>$errorMsg</div>";
              
                 //header("location:annonce.php");
             }
             else {
              
              $errorMsg="Message encore non envoyé!";
                    echo "<div class='alert alert-danger'>$errorMsg</div>";}
          }
                           

?>
 

<?php 

 }                  
//etudiant 
elseif($rang=='4') {  
  $sql = mysqli_query($db,"SELECT id_etu,message FROM `notifications` WHERE idNotif=$notif");
   $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
   $cetu=$row['id_etu'];$message=$row['message'];
    $resA = $db->query("SELECT * FROM etudiant WHERE CIN='$cetu' ");
    while($row = $resA->fetch_assoc()){
          $emailA=$row['mail'];
          $nom=$row['nomE'];
          $prenomp=$row['prenom'];   
          }     



?>

<fieldset>
  <legend><?= lang('rep').' '.lang('tto').' '.ucwords($nom) .' '. ucwords($prenomp)?> </legend>
    <form class="form-qst" method="post" action="?idN=<?=$notif?>&rang=<?=$rang?>&CIN=<?=$CIN; ?>&id_anneeS=<?=$idA; ?>">
      <ul>
        
        <li>
        <table id="table">
              <!-- ligne1 -->
              
               
              <tr>
                
                <td><!-- <input type="text" name="annonce"> -->
                  <textarea class="form-control" name="annonce" cols="100" rows="6"><?= lang('rep').' '.lang('tto').': '. $message; ?>
                  </textarea>
                </td>
              </tr>
             
        </table>
      </li>
      <li>
        <!--  <button name="publier" class="btn btn-outline-success my-2 my-sm-0" type="submit">publier  </button> -->
        <input class="btn btn-primary btn-sm " type="submit" name="reply" value="<?=lang('sent')?>">
      </li>
       
    </form>

  </fieldset>
  <?php //repondre
//$admin=$_GET['idAd'];  
$idA=$_SESSION['anneeS'];

if(isset($_POST['reply'])){

$message = $_POST['annonce'];
  //rang prof egale 3 qui envoie  au admin 
$emetteur="Direction $nomE"; 
$dest="Etudiant $nom $prenomp";     
//echo "$emetteur $dest $admin";
  
  //echo $CIN,$admin;
  

 $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_etu,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$cetu','$admin',2,'$emetteur','$dest',4)";
             if(performQuery($query)){
             
             
          $errorMsg= "Le message a été envoyé à ".ucwords($nom. ' '.$prenomp);;
    
          echo "<div class='alert alert-success'>$errorMsg</div>";
              
                 //header("location:annonce.php");
             }
             else {
              
              $errorMsg="Message encore non envoyé!";
                    echo "<div class='alert alert-danger'>$errorMsg</div>";}
          }
                           

?>
 

<?php } ?>








 

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
