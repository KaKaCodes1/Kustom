<?php


//Connect to the database
$servername = "localhost";//host name
$username = "root";//username
$password = "";//password
$db= "kustom";//database name
//create a connection
$conn = new mysqli($servername,  $username, $password, $db);

// Create connection
//$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error()."</br>");
}
echo "Connection successfully created</br>";

?>