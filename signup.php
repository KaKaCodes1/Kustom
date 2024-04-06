<?php
//records in the db
$fname = $_POST['fname'];
$lname = $_POST['llname'];
$email = $_POST['email'];
$password = $_POST['password'];

//database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "kustom";

$conn = new mysqli($servername, $username, $password, $database);

//checking connection
if ($conn->connect_error) {
    die("Connection failed") . &conn -> connect_error;
}
    //Insert into db
    $sql = "INSERT INTO customer_profile (fname, llname, email, password) VALUES ('$fname', '$lname,' '$email', '$password')";


$sql = mysqli_query($conn, $sql);

if($sql == true){
    echo "Sign-up Succesful.";
}
else{
    echo "Error signing-up. Please try again." .$sql "<br>" .$conn->error;
}

$conn -> close();
?>