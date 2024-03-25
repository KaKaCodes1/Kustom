<?php
include 'dbconnect.php';
include 'dbfields.php';

$sql='INSERT INTO `trial2`(`p_flavour`, `quanity`, `itemName`, `price`, `p_desc`) VALUES ("Vanilla","0","Cake","10000","Sweeet")';


if (mysqli_query($conn, $sql)) {
  echo "A new record has been created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
#disconnect
mysqli_close($conn);


?>