<?php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$database = "group16";

$conn = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $p_addres = mysqli_real_escape_string($conn, $_POST["p_address"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);
}
// Inserting into the database
$sql = "INSERT INTO customer_profile (fname, lname, email,p_address, phone, password) VALUES ('$fname', '$lname', '$email', '$p_addres','$phone','$password')";

if ($conn->query($sql) === TRUE) {
    echo "Sign-up successful.";

} 
else {
    echo "Error signing-up. Please try again. Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
