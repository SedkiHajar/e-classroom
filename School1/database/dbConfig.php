<?php  
// Database configuration 
//Database configuration  
$dbHost     = "localhost";  
$dbUsername = "root";  
$dbPassword = "";  
$dbName     = "school";  
  
// Create database connection  
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);  
 
// Check connection  
if ($db->connect_error) {  
    die("Connection failed: " . $db->connect_error);  
}