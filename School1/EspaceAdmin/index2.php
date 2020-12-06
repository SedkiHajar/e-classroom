<?php if (isset($_GET['action']))
	{
		// login pages actions
		if ($_GET['action'] == 'logout')
		{
			session_unset();
			session_destroy();
			header("location:/School1/index.php");
			//header("location:/index.php");
			exit();
			//getMenu() ;
		}
		}