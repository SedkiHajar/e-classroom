<?php
include('init.php');
include('session.php');
   //session_start();

/* error_reporting(0);
require_once '../database/function.php';
include ('../lang/fb.php');
include("../function/func.php");
   include('session.php'); */
    if(!isset($_SESSION['id']) or !isset($_SESSION['mailM'])  ){
      header("location:/School1/EspaceMasterAdmin/index.php");
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

  <title>welcome master admin</title>

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">
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

  <?php 
   $param = "anA";
  require 'defaultMaster.php';
  $rang=isset($_GET['rang']) ? $_GET['rang'] :'default';
  $do=isset($_GET['do']) ? $_GET['do'] :'default';
  $act=isset($_GET['act']) ? $_GET['act'] :'default';
  $master=$_GET['idM'];  
  $notif=$_GET['idNo'];
    ///supprimer notif
if($act=='delNo') {  
  $url='welcome.php';
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
           <?php echo "<div class=alert-success>Suppression de Notification  avec succés</div>";  ?>
           </div>
          <?php
          //redirectS(3,$url); 
                      
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
        <?php  echo "<div class=alert-success>Suppression de Message  avec succés</div>"; ?>
        </div>   <?php   
        // header("location:/School1/EspaceMasterAdmin/welcome.php");       
    }


  //$admin=$_SESSION['id'];


  //info admin
  $resA = $db->query("SELECT * FROM masteradmin WHERE idMa=$master ");
      while($row = $resA->fetch_assoc()){
            $emailA=$row['mailM'];
            $nom=$row['nom'];
            $prenomM=$row['prenom'];

            
                }  
  //admin


  if($rang==2) {  
    $sql = mysqli_query($db,"SELECT id_adm,message FROM notifications WHERE idNotif=$notif");
    $row = mysqli_fetch_array($sql,MYSQLI_ASSOC);
     $admin=$row['id_adm'];$message=$row['message'];
     $result = $db->query(" SELECT * FROM admin  WHERE id='$admin' ");
  while($row = $result->fetch_assoc()){
        $email=$row['mail'];$nomet=$row['nomE'];
                //$admin=$row['id_admin'];
              }
    
    
      ?>
   <?php   if(isset($_POST['reply'])){

  $master=$_GET['idM'];  
    
              
  $message = $_POST['annonce'];
    //rang prof egale 3 qui envoie  au admin 
  $emetteur="Master $nom $prenomM"; 
  $dest="Direction $nomet";     
    
    //echo $CIN,$admin;
    

   $query ="INSERT INTO `notifications` (`message`, `status`, `date`,id_mast,id_adm,rang,emetteur,destinataire,rangd) VALUES ('$message', 'unread', CURRENT_TIMESTAMP,'$master',$admin,1,'$emetteur','$dest',2)";
               if(performQuery($query)){
               
               
            $errorMsg= "Le message a été envoyé à ".ucwords($nomet);
      
            echo "<div class='alert alert-success'>$errorMsg</div>";
                
                   //header("location:annonce.php");
               }
               else {
                
                $errorMsg="Message encore non envoyé!";
                      echo "<div class='alert alert-danger'>$errorMsg</div>";}
            }

            ?>
                <fieldset>
    <legend>Répondre à <?=ucwords($nomet )?> </legend>
      <form class="form-qst" method="post" action="?idNo=<?=$notif?>&rang=<?=$rang?>&idM=<?=$master; ?>">
        <ul>
          
          <li>
          <table id="table">
                <!-- ligne1 -->
                
                 
                <tr>
                  
                  <td><!-- <input type="text" name="annonce"> -->
                    <textarea class="form-control" name="annonce" cols="100" rows="6">Répondre à: <?=$message ?>
                    </textarea>
                  </td>
                </tr>
               
          </table>
        </li>
        <li>
          <!--  <button name="publier" class="btn btn-outline-success my-2 my-sm-0" type="submit">publier  </button> -->
          <input class="btn btn-primary btn-sm " type="submit" name="reply" value="envoyer">
        </li>
         
      </form>

    </fieldset>
    <?php 
  


  
                           
}
?>
 

<?php 


                 



  ?>


  <!-- java Script script-->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="js/jquery.js"></script>

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
