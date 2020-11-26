<?php  
// Database configuration 
//Database configuration  
$dbHost     = "localhost";  
// $dbUsername = "bestmhro";  
// $dbPassword = "5vLY9Io72dKH";  
// $dbName     = "bestmhro_school"; 

$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "school";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
 
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}