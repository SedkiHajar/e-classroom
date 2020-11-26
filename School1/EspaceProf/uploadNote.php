<?php
// Include the database configuration file
session_start();
include('init.php');
include('session.php');
if(!isset($_SESSION['id']) or !isset($_SESSION['mail'])  ){
      header("location:/School1/EspaceProf/index.php");
    die();
   }
/*include ('../lang/fb.php');
require_once '../database/dbConfig.php';
require_once '../database/function.php';*/
$id=$_GET['id'];
  // code...
// delete section
$sql = "DELETE FROM note WHERE id='$id'";

if ($db->query($sql) === TRUE) {
  echo "Record deleted successfully";
  $url=$_SERVER['HTTP_REFERER'];
  header("location:$url");
} else {
  echo "Error deleting record: " . $db->error;
}






// Display status message
echo $statusMsg;
?>
