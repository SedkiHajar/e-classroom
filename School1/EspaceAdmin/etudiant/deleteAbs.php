<?php
// Include the database configuration file
error_reporting(0);
include ('../../lang/fb.php');
 require_once '../../database/dbConfig.php';
  require_once '../../database/function.php';
include("../../function/func.php");

   include('../session.php');
   if(!isset($_SESSION['id']) or !isset($_SESSION['mailA'])  ){
      header("location:/School1/EspaceAdmin/index.php");
     // header("location:/School1/index.php");
      //header("location:/index.php");

      die();
   }
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
