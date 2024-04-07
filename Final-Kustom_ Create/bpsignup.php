<?php
/*
// Records from the form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$password = $_POST['password'];
*/
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

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $b_name = mysqli_real_escape_string($conn, $_POST["b_name"]);
    $p_email = mysqli_real_escape_string($conn, $_POST["p_email"]);
    $b_email = mysqli_real_escape_string($conn, $_POST["b_email"]);
    $b_description = mysqli_real_escape_string($conn, $_POST["b_description"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
}
    $sql = "INSERT INTO business_profile (fname, lname, b_name, p_email, b_email, b_description password) VALUES ('$fname', '$lname', '$b_name', '$p_email', '$b_email', '$b_description' '$password')";
    

if ($conn->query($sql) === TRUE) {
    echo "Sign-up successful.";
}
else {
    echo "Error signing-up. Please try again. Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
