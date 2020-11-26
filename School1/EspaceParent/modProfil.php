<?php 
include('init.php');
include('session.php');
if(!isset($_SESSION['idP']) or !isset($_SESSION['mailPar'])  ){
      header("location:/School1/EspaceParent/index.php");
      die();
   }
// include ('../lang/fb.php');

//     require_once ('../database/dbConfig.php'); 
//     require_once '../database/function.php';

// include("../function/func.php");
//    include('session.php');
//    if(!isset($_SESSION['idP']) or !isset($_SESSION['mailPar'])  ){
//       header("location:/School1/EspaceParent/index.php");
     
//       die();
//    }
   $param = ""; 
  require 'defaultParent.php';
//echo $db;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Modifier votre profil </title>
<!-- Custom styles for this template-->
  
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

  
 
<style type="text/css">
  /*.obligatoire {color: rgb(250,250,250);}*/
  .obligatoire {color: red;}
</style>
</head>

<body>
  <a href="javascript:window.history.back()"><i class="fas fa-arrow-circle-left"></i>Retour</a>
<div style=" color:black;margin-left:0%; padding:25px;margin-top:0px; width:100%; height: 450px;border-radius: 30px 30px 30px 30px;" align="center" class="transparent">

<p style="color:blue;text-align:center;font-size: 25px;font-weight: bold;"><b>Modifier votre profil:</b></p>

<pre><form id='register' action='' method='post' accept-charset='UTF-8' style="font-size:20px;color:black" >
<div class="transparent">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for='champ' ><span class="obligatoire">* Champ obligatoire</span></label>
<input type='hidden' name='submitted' id='submitted' value='1'/>
<?php 
   // $conn=dbconn();
    //include '../model/include/logine.php' ; 
   $email1=$_SESSION['mailPar'];
   $mdp=$_SESSION['mdpPar'] ;
  // echo $mdp;echo $email1;
   // $re=$mysqli->query("SELECT * FROM etudiant where email='$email1'");
 ?>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for='nemail' ><strong> Nouveau email:<span class="obligatoire">*</span></strong></label>&nbsp;&nbsp;<input type="email" required name='nemail'  style="height: 22px;font-size: 18px;" value="<?php echo htmlspecialchars($email1);?>" /><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for='amdp' ><strong>Ancien mot de passe:<span class="obligatoire">*</span></strong></label>&nbsp;&nbsp;<input type="password"  name='amdp' required="" style="height: 22px;font-size: 18px;"/><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label for='nmdp' ><strong> Nouveau mot de passe:<span class="obligatoire">*</span></strong></label>&nbsp;&nbsp;<input type="password" name='nmdp' required=""  style="height: 22px;font-size: 18px;"/><br>
<label for='cnmdp' ><strong>Confirmer nouveau mot de passe:<span class="obligatoire">*</span></strong></label>&nbsp;&nbsp;<input type="password"  name='cnmdp' required=""  style="height: 22px;font-size: 18px;"/><br>
</div>
<div><input type='submit' name='submit' value="Modifier" class="btn btn-primary" style="width:150px; height:30px;"/></div>
</form>

</pre></div>
<?php 
 
if(isset($_POST['nemail']) and isset($_POST['amdp']) and 
  isset($_POST['nmdp']) and isset($_POST['cnmdp'])) {
  $email=$_POST['nemail'];$apwd=$_POST['amdp'];
 // echo $email; //echo $mdp;echo '<br>'. $apwd;
  $req="UPDATE parent set emailP='$email' where emailP='$email1'";
$db->query($req); 

//if($email!=$email1){header('location:../index.php');}
if($mdp ==$apwd){  
  
    if ($_POST['nmdp']==$_POST['cnmdp']) {
      $npwd=$_POST['nmdp'];
      //$mdp=$_POST['nmdp'];
      // $password=md5($_POST['nmdp']);
      $requ="UPDATE parent set mdpP='$npwd' where emailP='$email'";

$db->query($requ); 
echo '<script> alert("Vos informations sont mises à jour")</script>';


 echo "<html><head><link href='https://fonts.googleapis.com/css?family=Indie+Flower|Noto+Serif+SC|Raleway' rel='stylesheet'>
                                                            <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.8.1/css/all.css' integrity='sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf' crossorigin='anonymous'>
  
                                                            </head>
                                                           <style> 
                                                            }div{width: 200px;
    height: auto;
    
    margin: auto;
    padding-bottom: 0px;}h1{background-color:rgba(255,255,250,0.8);text-align:center;font-family: 'Indie Flower', cursive;}</style><div class='alert-success'><h1><b>Votre nouveau email est: ".$email."</h1><div>";
    //" <br>Votre nouveau mot de passe :  ".$_POST['nmdp']." </b> 


//echo "<br>votre email est $email et mdp est :$npwd";
    }
    else  echo '<script> alert("les mot de passe ne sont pas identiques")</script>';
  }

else echo '<script> alert("ancien mot de passe n \'est pas correct")</script>'; }  
?>
</body>

</html>
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