<?php
include 'debbieconnect.php';
include 'debbiefields.php';

session_start();
$c_ID = $_SESSION['ID'];

$sql = "INSERT INTO `debbie`(`c_ID`,`item_ID`, `b_ID`, `item_name`, `flavour`, `quantity`, `price`,`totalPrice`) VALUES ('$c_ID','$item_ID', '$b_ID', '$item_name', '$flavour', '$quantity', '$price','$totalPrice')";

if (mysqli_query($conn, $sql)) {
  echo "A new record has been created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
#disconnect
mysqli_close($conn);


?>