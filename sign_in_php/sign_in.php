<?php

#establish connection
include 'dbconnection.php';
#collect values from the form
include 'sign_in_fields.php';

session_start();

if ($a_type == '0')
{
    // If login request 0 -  query customer profile. Retain info
    $sql = "SELECT * FROM `customer_profile` WHERE email LIKE '$email'";
}

elseif ($a_type == '1')
{
     // If login request 1 -  query business profile. Retain info
    $sql = "SELECT * FROM `business_profile` WHERE p_email LIKE '$email'";
}
else{
    //echo "Error. Account cannot be decided on.";
    // TODO: Figure out how to redirect straight into sign in after error out.
    //header("location: ../../Index.html");
    echo '<script language="javascript">';
    echo 'alert("Select the right account!")';  
    echo '</script>';
    exit();
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_row();
      echo $row[1];

    $ID = $row[0];
    
    echo "Welcome";
    //Redirect to Customer or  user profile
  } else {
    //echo "0 results";

    //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   
    echo '<script language="javascript">';
    echo 'alert("No account found")';  
    echo '</script>';

    //header("location: ../Index.html");
    $conn->close();
    exit(); // STOP EXECUTION
  }
  

  /*
if (mysqli_query($conn, $sql)) {
    echo "We have Identified who you are to us! Welcome";
    //Redirect to Customer or  user profile
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    header("location: Index.html");
    exit(); // STOP EXECUTION
  }
*/

//Retain login info: ID and a_type

$_SESSION["a_type"] = $a_type;

if ($a_type == 0){
    $_SESSION["ID"] = $ID;
    header("location: ../Kustom_Customer_Profile/customer.php"); // Redirect to Customer Profile
    
}
elseif ($a_type == 1){
    $_SESSION["ID"] = $ID;
    header("location: ../Business account/Business Profile.html"); // Redirect to Business Profile
    
  }

  $conn->close();



?>
