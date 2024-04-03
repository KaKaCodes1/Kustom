<?php
include 'dbconnect.php';
include 'dbfields.php';

$sql='INSERT INTO `debbie`(`item_ID`, `b_ID`, `item_name`, `flavour`, `quantity`, `price`) VALUES ("[value-1]","[value-2]","[value-3]","[value-4]","[value-5]","[value-6]")';


if (mysqli_query($conn, $sql)) {
  echo "A new record has been created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
#disconnect
mysqli_close($conn);


?>
