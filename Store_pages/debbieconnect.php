<?php
$b_id=0;
#This is responsible for connecting the forms to the database
$servername = "localhost";
$username = "root";
$password = "";
$db = "Group 16";

// Create connection
$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error()."</br>");
}
echo "Connection successfully created</br>";
 
?>
