<?php

#This is reponsible for reading data from the form post method a field at a time (array style element retrieval) and assigns it to corresponding variables.
$itemName=$_POST['itemName'];
$p_description=$_POST['desc'];
$price=$_POST['price'];
$quantity=$_POST['quantity'];
$p_flavour=$_POST['flavour'];
$b_id=$_POST['b_id'];
echo "Data from the form picked successfully</br>";
?>