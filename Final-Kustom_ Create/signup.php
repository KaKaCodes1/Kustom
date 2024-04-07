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
// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
    $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
    $email = mysqli_real_escape_string($conn, $_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

// Inserting into the database
$sql = "INSERT INTO customer_profile (fname, lname, email, password) VALUES ('$fname', '$lname', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Sign-up successful.";
    header("refresh:3;Location=sign_in.html"); // Redirect to sign-in page after 3 seconds
} 
else {
    echo "Error signing-up. Please try again. Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
