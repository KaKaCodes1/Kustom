<?php


/**Date: 24/03/2024
 **Php code for linking the db to Kustom customer profile landing page
 */

//start session assuming customer details will be stored after logging in
session_start();

if(isset($_SESSION['ID'])) {//Assuming this has been set on log in...
//connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "kustom_v2";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."</br>");
 }
else
{  
    echo "Connection successfully created</br>";
    echo $_SESSION['ID'];
    include "customer.html";
}


//A function to display the necessary profile and address details on the page
function displayDetails($conn){

    //sql query to get needed details 
    $session_ID = $_SESSION['ID'];
    $sql = "SELECT (fname, lname, email, p_address, phone) FROM customer_profile WHERE c_ID = $session_ID";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['ID']);

    // Execute statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($fname, $lname, $email, $p_address, $phone);

    // Fetch values
    $stmt->fetch();

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();


}


} 
else {
    echo "User not logged in";
}
?>
