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
$database = "kustomupdate";

$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $p_email = mysqli_real_escape_string($conn, $_POST["emailInput"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $b_name = mysqli_real_escape_string($conn, $_POST["bname"]);
    $b_description = mysqli_real_escape_string($conn, $_POST["description"]);
    $b_email = mysqli_real_escape_string($conn, $_POST["b_emailInput"]);

}
    $sql = "INSERT INTO business_profile (fname, lname, b_name, p_email, b_email, b_description ,password) VALUES ('$fname', '$lname', '$b_name', '$p_email', '$b_email', '$b_description', '$password')";
    

if ($conn->query($sql) === TRUE) {
    echo "Sign-up successful.";
}
else {
    echo "Error signing-up. Please try again. Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
