<?php
   session_start();
   if(isset($_SESSION['idEtu'])){
   	session_destroy();
   	header("location:/School1/index.php");
	//header("location:/index.php");
   	 
   }
   else {
   	header("location:/School1/index.php");
			//header("location:/index.php");
   }
   
   // if(session_destroy()) {
   //    header("Location: login.php");
   // }
?>
