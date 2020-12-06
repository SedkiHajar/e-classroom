<?php
session_start();
//error_reporting(0);
include ('../../lang/fb.php');
// Include the database configuration file
require_once '../../database/dbConfig.php';
 require_once '../../database/function.php';
include("../../function/func.php");
error_reporting(0);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <!-- Mon css -->
  <link href="../../css/css1.css" rel="stylesheet">

  
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
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $adresse=$_POST['adresse'];
        $codeP=$_POST['codeP'];
        $email =$_POST['email'];
        $villeN= $_POST['villeN'];
        $anneeS= $_POST['anneeS'];
        $ans=$_POST['ans'];
        $dateN= $_POST['dateN'];
        $sexe= $_POST['sexe'];
        $tel= $_POST['tel'];
        $classe= $_POST['classe'];
        $CIN= $_POST['cin'];
        
        echo $cinM;

        
        // $CIN=str_replace(' ', '', $_POST['CIN']);
        $id_admin=$_SESSION['id'];
        $mdp=$_POST['mdp'];


          // Get info for parent
        $nomP=$_POST['nomP'];
        $nomM=$_POST['nomM'];//nom mere
       // $prenomP=$_POST['prenomP'];
        $adresseC=$_POST['adresseP'];
        $adresseM=$_POST['adresseM'];
        $telP=$_POST['telP'];
        $telM=$_POST['telP'];//tel mère
        $emailP =$_POST['emailP'];
        $emailM =$_POST['emailM'];
        $mdpP=$_POST['mdpP'];
        $avatarName=$_FILES['image']['name'];
        $avatarSize=$_FILES['image']['size'];
        $avatarTmp=$_FILES['image']['tmp_name'];
        $avatarType=$_FILES['image']['type'];
        //allowed extension
        $avatarAllowExt=array("jpeg","jpg","png","gif");
        //get avatar exten
      
        $image = $_FILES['image']['tmp_name'];
        // insert prospect
          if (isset($_POST['inserer'])) {
            
        for ($j = 0; $j <count($nom); $j++)
            {
        $avatarExt=strtolower(end(explode('.', $avatarName[$j])));
        $avatar=rand(0,100000) .'_'.$avatarName[$j];
        $chaine="uploads/avatars/";
        move_uploaded_file($avatarTmp[$j], "$chaine". $avatar);
        $imgContent = addslashes(file_get_contents($image[$j]));

         
            //inserer info parent
             $insert = $db->query("INSERT into parent(nomP,nomM,adresseP,adresseM,telP,telM,emailP,emailM,mdpP) VALUES ('$nomP[$j]','$nomM[$j]','$adresseC[$j]','$adresseM[$j]','$telP[$j]','$telM[$j]','$emailP[$j]','$emailM[$j]','$mdpP[$j]')");
            if($insert){
              $db->query($insert);$idPar=$db->insert_id;
              //echo 'idP: '.$idPar;
                    $status = 'success';
                    $statusMsg = "bien  upload successfully.";
                    //echo "image $avatar <br>";
                    //header("Location:gestionEtudiant.php");
                }else{//echo 'idP: '.$idPar."<br>";
                    $statusMsg = "File upload failed, please try again." . $db->error;
                }
             
             //info etudiant
              $insert = $db->query("INSERT into etudiant(image,nomE,avatar,prenom,adresse,codePostal,mail,villeN,anneeS,dateN,sexe,tel,classe,id_admin,mdp,CIN,idPar) VALUES ('$imgContent','$nom[$j]','$avatar','$prenom[$j]','$adresse[$j]','$codeP[$j]','$email[$j]','$villeN[$j]','$anneeS[$j]','$dateN[$j]','$sexe[$j]','$tel[$j]','$classe[$j]','$id_admin','$mdp[$j]','$CIN[$j]',$idPar)");
        if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";
              // $Msg= "Insertion effectuée avec succée";
              // $url="gestionEtudiant.php";
              // redirectPageS($Msg,3,$url);
                // echo 'villeN='.$villeN.'<br>anneeS='.$anneeS.'<br>classe='.$classe;echo 'cin: '.$cinM. 'post: '.$CIN;
                //  echo "imageetu $avatar <br>";
                header("Location:gestionEtudiant.php"); 
            }else{
             $Msg= "Insertion non effectuée ";
              // $url="gestionEtudiant.php";
              // redirectPage($Msg,3,$url);
            //echo 'idP: '.$idPar;
            // echo 'villeN='.$villeN[$j].'<br>anneeS='.$anneeS[$j].'<br>classe='.$classe[$j];echo 'cin: '.$CIN[$j]. '<br>post: '.$prenom[$j].'<br>';
            //      echo "imageetu $avatar <br>";
                //$statusMsg = "File upload failed, please try again.". $db->error;
               
            header('Location:gestionEtudiant.php');
            }
            //echo $j;

            
            }
            }


          if(isset($_POST['modifier'])) {
            $CIN=$_GET['CIN']; $image = $_FILES['image']['tmp_name'];
            $avatar=$_FILES['image']['name'];
               if(!empty($image)){
               $imgContent = addslashes(file_get_contents($image));}
               else{
                $imgContent=$_SESSION['image'];
                ?>
                <img id="output" src="data:image/jpg;charset=utf8;base64,<?php echo $image; ?>" alt=""/>
                <?php 
              //  echo 'nom: '.$nom. ' prenom='. $prenom.'adresse='.$adresse.'codePostal='.$codeP.'mail='.$email;
               // echo '<br>villeN='.$villeN.'<br>anneeS='.$anneeS.'<br>classe='.$classe;echo  'postcin: '.$CIN.'nom: '.$nom;
               // echo '<br>prenom='.$prenom.'<br>adresS='.$adresse.'<br>codePostal='.$codeP;echo  'mail: '.$email.'date: '.$dateN;
               // echo '<br>sexeN='.$sexe.'<br>telS='.$tel.'<br>';
                //echo '<br>img: '.$imgContent;
               }
            $image = $_FILES['image']['tmp_name'];
          $up = "UPDATE etudiant SET avatar='$avatar',nomE='$nom',prenom='$prenom',adresse='$adresse',codePostal='$codeP',mail='$email',villeN='$villeN',anneeS='$anneeS',dateN='$dateN',sexe='$sexe',tel='$tel',classe='$classe' WHERE CIN='$CIN'";
          //image='$imgContent',
         // echo 'cin: '.$cinM;
            if ($db->query($up) === TRUE) {
              $chaine="uploads/avatars/";
              move_uploaded_file($image, "$chaine". $avatar);
              //echo "<BR>Record updated successfully";
               $Msg= "Modification effectuée avec succeé";
              $url="infoEtudiant.php?CIN=$CIN";
              redirectPageS($Msg,3,$url);
               //header('Location:gestionEtudiant.php');
            } else {echo "image=$avatar";
              //echo "<BR>Error updating record: " . $db->error;
              $Msg= "Modification non effectué";
            
              $url="infoEtudiant.php?CIN=$CIN";
              redirectPage($Msg,3,$url);
              //header('Location:gestionEtudiant.php');
            }
            
              }




            if($_GET['choix']=='delete'){

                $CIN=$_GET['CIN'];
              // code...
            // delete section etudian
            $sql = "DELETE FROM etudiant WHERE CIN='$CIN'";
            //id parent
            $result=$db->query("SELECT * FROM parent p INNER join etudiant e on e.idPar=p.idP where e.cin='$CIN'");
            while($row = $result->fetch_assoc()){
              $idP=$row['idP'];
            }
            echo $idP;
            $sql1="DELETE FROM parent WHERE idP='$idP'";


            if ($db->query($sql1) === TRUE) 
            {
              if ($db->query($sql) === TRUE) 
              {

                  header('Location:gestionEtudiant.php');
                  echo "Record deleted successfully";
              } else 
                {
              echo "Error deleting record: " . $db->error;
               
                 }
               header('Location:gestionEtudiant.php');
              echo "Record deleted successfully";


              
            } else 
              {
              echo "Error deleting record: " . $db->error;
              }



            header('Location:gestionEtudiant.php');
          }





// Display status message
echo $statusMsg;
?>
<a href="view.php">view</a>
