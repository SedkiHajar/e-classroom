<?php if (isset($_GET['action']))
	{
		// login pages actions
		if ($_GET['action'] == 'logout')
		{
			session_destroy() ;
			header("location:../index.php");
			//getMenu() ;
		}
		}