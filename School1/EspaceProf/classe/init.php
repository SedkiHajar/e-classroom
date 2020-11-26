<?php
// Error Reporting
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include '../../database/dbConfig.php'; 
include '../../database/function.php';

   

	

	// Routes

	//$tpl 	= 'includes/templates/'; // Template Directory
	$lang 	= '../../lang/'; // Language Directory
	$func	= '../../function/'; // Functions Directory
	//$css 	= 'layout/css/'; // Css Directory
	//$js 	= 'layout/js/'; // Js Directory

	// Include The Important Files

	include $func . 'func.php';
	include $lang . 'fb.php';
	//include $tpl . 'header.php';
	

	