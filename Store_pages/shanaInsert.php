<?php
#collect values from the form
include 'shanaFields.php';
#collect values from the form
include 'shanaconnect.php';

session_start();
$c_ID = $_SESSION['ID'];


#This is responsible for inserting data from the forms into the table in the database
$sql= "INSERT INTO shana(c_ID,b_ID, item_name, price, quantity, item_size, colour, totalPrice ) VALUES('$c_ID','$b_ID','$item_name', '$price', '$quantity', '$item_size','$colour','$totalPrice')";
// $sql_cart="INSERT INTO cart()"

#test the query
if (mysqli_query($conn, $sql)) {
  echo "A new record has been created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
#disconnect
mysqli_close($conn);


?>