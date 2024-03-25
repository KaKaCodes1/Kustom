<?php
#collect values from the form
include 'shanaFields.php';
#collect values from the form
include 'shanaconnect.php';




#This is responsible for inserting data from the forms into the table in the database
$sql= "INSERT INTO products(b_ID, p_name, p_description, price, quantity, p_size,colour ) VALUES('$b_ID', '$p_name', '$p_description', '$price', '$quantity', '$p_size','$colour')";


#test the query
if (mysqli_query($conn, $sql)) {
  echo "A new record has been created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
#disconnect
mysqli_close($conn);


?>