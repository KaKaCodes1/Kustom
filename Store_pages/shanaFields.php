<?php
#This is reponsible for reading data from the form post method a field at a time (array style element retrieval) and assigns it to corresponding variables.
$b_ID=$_POST['StoreID'];
$p_name=$_POST['itemName'];
$p_description=$_POST['desc'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$p_size=$_POST['size'];
$colour=$_POST['colour'];
echo "Data from the form picked successfully</br>";
$totalPrice = $price * $quantity;
?>