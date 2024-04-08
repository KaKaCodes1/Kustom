<?php

#This is reponsible for reading data from the form post method a field at a time (array style element retrieval) and assigns it to corresponding variables.
$item_ID=$_POST['itemName'];
$b_ID=$_POST['b_id'];
$item_name=$_POST['itemName'];
$flavour=$_POST['flavour'];
$quantity=$_POST['quantity'];
$price=$_POST['price'];
$totalPrice = $price * $quantity;
echo "Data from the form picked successfully</br>";
?>
