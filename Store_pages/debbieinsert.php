<?php
include 'debbieconnect.php';
include 'debbiefields.php';

$sql = "INSERT INTO `debbie`(`item_ID`, `b_ID`, `item_name`, `flavour`, `quantity`, `price`,`totalPrice`) VALUES ('$item_ID', '$b_ID', '$item_name', '$flavour', '$quantity', '$price','$totalPrice')";

if (mysqli_query($conn, $sql)) {
  echo "A new record has been created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
#disconnect
mysqli_close($conn);


?>