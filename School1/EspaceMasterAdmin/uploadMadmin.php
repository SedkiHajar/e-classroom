<?php
session_start();
// Include the database configuration file
include('init.php');
error_reporting(0);
/* require_once '../database/dbConfig.php';
include("../function/func.php");
include ('../lang/fb.php');
 */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../css/css1.css" rel="stylesheet">

  
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <title>upload </title>
</head>
<?php

// If file upload form is submitted
$status = $statusMsg = '';



  $status = 'error';

    // code...

  ;
        // Get info for prospect
        $nomE=$_POST['nomE'];
        $email =$_POST['email'];
        $mdp =$_POST['mdp'];
        $master=$_SESSION['id'];
        $image = $_FILES['image']['tmp_name'];
         //profil
         $avatarName=$_FILES['image']['name'];
         $avatarSize=$_FILES['image']['size'];
         $avatarTmp=$_FILES['image']['tmp_name'];
         $avatarType=$_FILES['image']['type'];
         //allowed extension
         $avatarAllowExt=array("jpeg","jpg","png","gif");
        // insert prospect
          if (isset($_POST['inserer'])) {

            
        for ($j = 0; $j <count($nomE); $j++)
            {
              $check=checkItem("mail","admin",$email[$j]);
              if($check==1)
              {
             $errorMsg= "Desolé l'email existe déja ,reémplir le formulaire";
            
             $url=$_SERVER['HTTP_REFERER'];$url1="AjouterMadmin.php";
          redirectPage($errorMsg,3,$url);
            }
            else{
              $avatarExt=strtolower(end(explode('.', $avatarName[$j])));
              $avatar=rand(0,100000) .'_'.$avatarName[$j];
               $chaine="uploads/avatars/";
              move_uploaded_file($avatarTmp[$j], "$chaine". $avatar);   
                
          $imgContent = addslashes(file_get_contents($image[$j]));
          
         $insert = $db->query("INSERT into admin(avatarA,nomE,mail,mdp,idMas) VALUES ('$avatar','$nomE[$j]','$email[$j]','$mdp[$j]',$master)");

        if($insert){
                $status = 'success';
                // $statusMsg = "prospect upload successfully.";
                $Msg=lang('ajo');
                $url="gestionMadmin.php";
                redirectPageS($Msg,3,$url);
                //header('Location:gestionMadmin.php');
                ?>
                <!-- <div class="foot"><a href="list_pm.php">Retour &agrave; mes messages priv&eacute;s</a> --><?php 
            }else{
              $Msg= "Insertion non effectuée ";
              $url="gestionMadmin.php";
              redirectPage($Msg,3,$url);
                //$statusMsg = "File upload failed, please try again.". $db->error;
            }
            echo $j;
            }

            }
          }

          if(isset($_POST['modifier'])) {
             $id =$_GET['id'];
             $image = $_FILES['image']['tmp_name'];
            $avatar=$_FILES['image']['name'];
               if(!empty($image)){
               $imgContent = addslashes(file_get_contents($image));}
               else{
                $imgContent=$_SESSION['imageA'];
                ?>
                <img id="output" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""/>
                <?php 
                
               }

          $sql = "UPDATE admin SET avatarA='$avatar', nomE='$nomE',mail='$email',mdp='$mdp' WHERE id='$id'";
          //image='$imgContent',
          
            if ($db->query($sql) === TRUE) {
              $chaine="uploads/avatars/";
               move_uploaded_file($image, "$chaine".$avatar);
              //echo "Record updated successfully";
              $Msg=lang('up');
              $url="infoMadmin.php?id=$id";
              redirectPageS($Msg,3,$url);
              //header("Location:infoMadmin.php?id=$id");
              //echo '<script>alert("Modification effectuée !");</script>' ;
             
            } else {
              $Msg= "Modification non effectué";
            
              $url="infoMadmin.php?id=$id";
              redirectPage($Msg,3,$url);
              // echo "nom $nomE mail $email mdp $mdp id $id";
              // echo "Error updating record: " . $db->error;
            }
           
              }




            if($_GET['choix']=='delete'){

                $id=$_GET['id'];
              // code...
            // delete section
            $sql = "DELETE FROM admin WHERE id='$id'";

            if ($db->query($sql) === TRUE) {
              $Msg=lang('del');
              $url="gestionMadmin.php";
              redirectPageS($Msg,3,$url);
              //echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
              header('Location:gestionMadmin.php');
          }


          if($_GET['choix']=='contacter'){

            $id=$_GET['id'];
            // code...
            // delete section
            $sql = "DELETE FROM admin WHERE id='$id'";

            if ($db->query($sql) === TRUE) {
              $Msg=lang('del');
              $url="gestionMadmin.php";
              redirectPageS($Msg,3,$url);
              //echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
              header('Location:gestionMadmin.php');
          }



          if (isset($_POST['envoyer'])) 
{
      
    $title=$_POST['title']; 
    $message=$_POST['message']; 
    $id_eme=$_SESSION['id'];
    $id_dest=$_GET['id']; 
        
        //On envoi le message
    $insert = $db->query("INSERT INTO pm (title,user1,user2,message) VALUES ('$title','$id_eme','$id_dest','$message')");
     if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";?>
                <!--<div class="message">Le message a bien &eacute;t&eacute; envoy&eacute;.<br />
                <a href="list_pm.php">Liste de mes messages priv&eacute;s</a></div>-->
            <?php }
     else{
                $statusMsg = "File upload failed, please try again.". $db->error;
            }
            header('Location:gestionMadmin.php');          

}









echo $statusMsg;
?>
<!-- <a href="view.php">view</a> -->
