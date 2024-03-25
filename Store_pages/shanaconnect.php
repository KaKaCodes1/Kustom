<?php


//Connect to the database
$host = "localhost";//host name
$user = "root";//username
$password = "";//password
$database = "kustom";//database name
//create a connection
$conn = new mysqli($host, $user, $password, $database);

// Create connection
//$conn = mysqli_connect($servername, $username, $password,$db);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error()."</br>");
}
echo "Connection successfully created</br>";

?>