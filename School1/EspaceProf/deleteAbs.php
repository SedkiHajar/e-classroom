<?php
// Include the database configuration file
include('init.php');
include('session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
    die();
   }
/*error_reporting(0);
include ('../lang/fb.php');
 require_once '../database/dbConfig.php'; 
 require_once '../database/function.php';
   include('session.php');
    if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
     

      die();
   }*/
 $param="gesA";  
$id_Prof= $_SESSION['id'];
$id_Etudiant=$_GET['CIN'];
$id_Mat=$_GET['id_mat'];
  // code...
// delete section
$sql = "DELETE FROM abs WHERE  id_etudiant='$id_Etudiant'AND id_mat='$id_Mat'";

if ($db->query($sql) === TRUE) {
  echo "";
  $url=$_SERVER['HTTP_REFERER'];
  header("location:$url");
} else {
  echo "Error deleting record: " . $db->error;
}






// Display status message
echo $statusMsg;
?>
