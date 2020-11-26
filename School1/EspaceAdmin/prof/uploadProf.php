<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>AjouterProfesseur</title>
  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">
</head>

<?php
session_start();
error_reporting(0);
include ('../../lang/fb.php');
// Include the database configuration file
require_once '../../database/dbConfig.php';
require_once '../../database/function.php';


include '../../function/func.php';
error_reporting(0);


// If file upload form is submitted
$status = $statusMsg = '';



  $status = 'error';

    // code...

  ;
        // Get info for prospect
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $codeP=$_POST['codeP'];
        $email =$_POST['email'];
        $villeN= $_POST['villeN'];
        $anneeS= $_POST['anneeS'];
        $dateN= $_POST['dateN'];
        $sexe= $_POST['sexe'];
        $tel= $_POST['tel'];
        $classe= $_POST['classe'];
        $CIN= $_POST['cin'];
       // $CIN=str_replace(' ', '', $_POST['CIN']);
        $id_admin=$_SESSION['id'];
        $mdp=$_POST['mdp'];


          // Get info for parent
        $nomP=$_POST['nomP'];
        $prenomP=$_POST['prenomP'];
        $adresseC=$_POST['adresseP'];
        $telP=$_POST['telP'];
        $emailP =$_POST['emailP'];
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
       //$value='sedki@gmail.com';
         //echo count($nom);
    for ($j = 0; $j <count($nom); $j++)
      {
        $check=checkItem("mail","professeur",$email[$j]);
        if($check==1)
            {
              $errorMsg= "Desolé l'email existe déja ,reémplir le formulaire";
              $url=$_SERVER['HTTP_REFERER'];$url1="AjouterProf.php";
              redirectPage($errorMsg,3,$url);
            }
        else{
              $avatarExt=strtolower(end(explode('.', $avatarName[$j])));
              $avatar=rand(0,100000) .'_'.$avatarName[$j];
              $chaine="uploads/avatars/";
              move_uploaded_file($avatarTmp[$j], "$chaine". $avatar);   
              $imgContent = addslashes(file_get_contents($image[$j]));
              $insert = $db->query("INSERT into professeur(image,avatarP,nom,prenom,adresse,codePostal,mail,villeN,anneeS,dateN,sexe,tel,id_admin,mdp,CIN) VALUES ('$imgContent','$avatar','$nom[$j]','$prenom[$j]','$adresse[$j]','$codeP[$j]','$email[$j]','$villeN[$j]','$anneeS[$j]','$dateN[$j]','$sexe[$j]','$tel[$j]','$id_admin','$mdp[$j]','$CIN[$j]')");
        if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";
                $Msg= lang('ajo');
                // "Insertion effectuée avec succée";
                 //echo 'nom: '.$nom[$j]. ' prenom='. $prenom[$j].$avatar;
                //  $url="gestionProf.php?id_anneeS=$anneeS[$j]";
                // redirectPageS($Msg,3,$url);
                header("Location:gestionProf.php");
                }
                else{
                //$statusMsg = "File upload failed, please try again.". $db->error;
                   $Msg= "Insertion non effectuée ";
                  $url="gestionProf.php";
                  redirectPage($Msg,3,$url);
                //header("Location:AjouterProf.php");
                }
            echo '<br>j='.$j;
            }

            }
          }


          if(isset($_POST['modifier'])) {
            $CIN=$_GET['CIN'];$image = $_FILES['image']['tmp_name'];
            $avatar=$_FILES['image']['name'];
               if(!empty($image)){
               $imgContent = addslashes(file_get_contents($image));}
               else{
                $imgContent=$_SESSION['image'];
                ?>
                <img id="output" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""/>
                <?php 
                //   echo 'nom: '.$nom. ' prenom='. $prenom.'adresse='.$adresse.'codePostal='.$codeP.'mail='.$email;
                // echo '<br>villeN='.$villeN.'<br>anneeS='.$anneeS;
                // echo  'postcin: '.$CIN.'dat: '.$dateN;
                // echo  'sexe: '.$sexe.'tel: '.$tel;
               // echo '<br>prenom='.$prenom.'<br>adresS='.$adresse.'<br>codePostal='.$codeP;echo  'mail: '.$email.'date: '.$dateN;
               }

          $sql = "UPDATE professeur SET avatarP='$avatar', nom='$nom',prenom='$prenom',adresse='$adresse',codePostal='$codeP',mail='$email',villeN='$villeN',anneeS='$anneeS',dateN='$dateN',sexe='$sexe',tel='$tel' WHERE CIN='$CIN'";
          //image='$imgContent', 
          //echo $CIN;
            if ($db->query($sql) === TRUE) {
               $chaine="uploads/avatars/";
               move_uploaded_file($image, "$chaine".$avatar);
              // move_uploaded_file($image, "/uploads/avatars/".$avatar);
               //echo $i;
               $Msg= lang('up');
              //  "Modification effectuée avec succeé";
              $url="infoProf.php?CIN=$CIN";
              redirectPageS($Msg,3,$url);
              // echo "Record updated successfully";
              //  header("Location:infoProf.php?CIN=$CIN");
            } else {
              //echo "Error updating record: " . $db->error;
               $Msg= "Modification non effectué";
            
              $url="infoProf.php?CIN=$CIN";
              redirectPage($Msg,3,$url);
            }
           
              }




            if($_GET['choix']=='delete'){

                $CIN=$_GET['CIN'];
              // code...
            // delete section
            $sql = "DELETE FROM professeur WHERE CIN='$CIN'";

            if ($db->query($sql) === TRUE) {
              $Msg=lang('del');
              $url="gestionProf.php";
              redirectPageS($Msg,3,$url);
             // echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
              header('Location:gestionProf.php');
          }





// Display status message
echo $statusMsg;
?>
<!-- <a href="view.php">view</a>
 -->