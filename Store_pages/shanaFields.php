<?php
#This is reponsible for reading data from the form post method a field at a time (array style element retrieval) and assigns it to corresponding variables.
#$name represent the name in the database tables
/*['name'] represent names in the forms*/


$b_ID=$_POST['StoreID'];
$item_name=$_POST['itemName'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$item_size=$_POST['size'];
$colour=$_POST['colour'];
$totalPrice = $price * $quantity;
echo "Data from the form picked successfully</br>";

?>