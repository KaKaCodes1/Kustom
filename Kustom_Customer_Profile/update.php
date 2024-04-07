<?php
/**Date: 24/03/2024
 **Php code for the Update form on the Customer Profile page.
 */


//connection parameters
$servername = "localhost";
$username = "root";
$password = " ";
$dbname = "kustom";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Retrieve form data
    $customerId = $_POST['c_ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['p_address'];
    $phone = $_POST['phone'];
    $pass = $_POST['password2']

    // Prepare SQL statement to update customer profile
    $sql = "UPDATE customer_profile SET fname=$fname, lname=$lname, email=$email,p_address=$address, phone=$phone, password2=$pass WHERE c_ID=customerId";

// Prepare and bind parameters
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssii", $fname, $lname, $email, $address, $phone, $pass, $customerId);

 // Execute the statement
$stmt->execute();
}
// Check if the update was successful
if($stmt->rowCount() > 0){
    $success = "Profile updated successfully";
}else {
    $error = "Error updating profile";
        }
    

?>
