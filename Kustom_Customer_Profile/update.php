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
    $customerId = $_POST['customer_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Prepare SQL statement to update customer profile
    $sql = "UPDATE customer_profile SET name=?, email=?,p_address=?, phone=? WHERE id=?";



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
