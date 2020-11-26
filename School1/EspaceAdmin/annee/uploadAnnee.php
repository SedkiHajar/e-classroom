<?php
error_reporting(0); 
session_start();
// Include the database configuration file
include ('../../lang/fb.php');
require_once '../../database/dbConfig.php';
require_once '../../database/function.php';

include("../../function/func.php");
error_reporting(0);


// If file upload form is submitted
$status = $statusMsg = '';



  $status = 'error';

    // code...

  ;
        // Get info for prospect
        $nom=$_POST['nom'];
        $admin=$_SESSION['id'];
       


       
        // insert prospect
          if (isset($_POST['inserer'])) {
            
        for ($j = 0; $j <count($nom); $j++)
            {
          
          

         $insert = $db->query("INSERT into annees(nomA,idAdm) VALUES ('$nom[$j]',$admin)");
        if($insert){
                $status = 'success';
                $statusMsg = "prospect upload successfully.";
                header('Location:gestionAnnee.php');

            }else{
                $statusMsg = "File upload failed, please try again.". $db->error;
            }
            echo $j;
            }

            }


          if(isset($_POST['modifier'])) {
              
                $id=$_GET['id'];
             

          $sql = "UPDATE annees SET nomA='$nom' WHERE idAn='$id' and idAdm=$admin";
          echo $CIN;
            if ($db->query($sql) === TRUE) {
              echo "Record updated successfully";
              header('Location:gestionAnnee.php');

               //header("Location:infoProf.php?CIN=$CIN");
            } else {
              echo "Error updating record: " . $db->error;
            }
           
              }




            if($_GET['choix']=='delete'){

                $id=$_GET['id'];
              // code...
            // delete section
            $sql = "DELETE FROM annees WHERE idAn='$id' and idAdm=$admin";

            if ($db->query($sql) === TRUE) {
              echo "Record deleted successfully";
            } else {
              echo "Error deleting record: " . $db->error;
            }
              header('Location:gestionAnnee.php');
          }





// Display status message
echo $statusMsg;
?>
<a href="view.php">view</a>
