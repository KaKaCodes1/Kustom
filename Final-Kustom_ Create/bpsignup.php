<?php
// Records from the form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "kustom";

$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserting into the database
$sql = "INSERT INTO business_profile (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Sign-up successful.";
} else {
    echo "Error signing-up. Please try again. Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>