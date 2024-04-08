<!DOCTYPE html>
<html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> My Account: Orders</title>
            <link rel="icon" href="logo.jpg">
            <link rel="stylesheet" href="customer.css">
            <!--<link rel="stylesheet" href="footer.css">-->
            
            <!--To use icons from fontawesome-->
            <script src="https://kit.fontawesome.com/282935201e.js" crossorigin="anonymous"></script>
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
            
            <!--To get the fonts from google fonts-->
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400..700&family=Inter:wght@100..900&display=swap" rel="stylesheet">
        
        
        </head>

    <body>
        <header>
            <div class="logo-container">
                <p style="font-family: Dancing Script, cursive;"><b>Kustom Suites</b></p>
            </div>
        <nav class="nav_list">
            <ul>
                <li><a class="active" href = "..\Index.html">Home</a></li>
                <li><a class="zoom" href = "..\Browse\officialstores.html">Browse</a></li>
                <li><a class="zoom" href = "..\About_Us\try3.html">About Us</a></li>
                <li><a  href="Orders.php" title="Your Cart"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a></li>
            </ul>
        </nav>
        </header>

        <!--This is the html code for the go up button-->
        <button onclick="topFunction()" id="goUpBtn" title="Go to top"><i class="fa-solid fa-chevron-up"></i></button>

        <div class="billing">

            <h1>ORDERS</h1>
            <hr>
            <?php
//start session to access session variables
session_start();


//connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "kustomupdate"; //kustomupdate

$conn = new mysqli($servername, $username, $password, $database);

//check connection
if ($conn -> connect_error) {
    die("connection failed: " . $conn ->connect_error);
}

//function to retrieve cart items for the current user
function getCartItems($conn) {
    
    $userId = $_SESSION['ID'];

    //the sql query to get cart items for the user
    $sql = "SELECT item_ID,item_name,quantity, price FROM shana
    WHERE c_ID = $userId
    UNION
    SELECT item_ID,item_name,quantity, price FROM debbie
    WHERE debbie.c_ID = $userId";

    $result = $conn->query($sql);

    return $result;
}

//if customer is logged in
if (isset($_SESSION['ID'])) {
    //get the cart items
    $cartItems = getCartItems($conn);

} else {
    //redirect  to login page  
    header("Location: login.php");
    exit();
}




//function to delete items from the cart
function deleteCartItems($conn) {

    $userId = $_SESSION['ID'];

    $sql= "DELETE FROM shana 
    WHERE shana.c_ID = $userId";

    $sql1 = "DELETE FROM debbie
    WHERE debbie.c_ID = $userId";

    $result = $conn->query($sql);
    $result1 = $conn->query($sql1);
    return $result;
    return $result1;
}

//function to update quantity
// function updateQuantity($quantity, $item_id) {
//     $item_id = $_POST['item_ID'];
//     $new_quantity = $_POST['quantity'];
    
//     // Update the quantity in the database
//     $query = "UPDATE shana SET quantity = $quantity WHERE id = $item_id";

//     if ($conn->query($query) === TRUE) {
//         echo "Quantity updated successfully.";
//     } else {
//         echo "Error updating quantity: " . $conn->error;
//     }
// }


// if (! empty($cartItems)) {
//     // Update cart item quantity in database
//     $newQuantity = $cartItems[0]["quantity"] + $_POST["quantity"];
//     updateCartQuantity($newQuantity, $cartItems[0]["id"]);
// }

if (isset($_POST['empty_cart'])) {
    // Call function to delete all items from the cart
    deleteCartItems($conn); 
}
?>

    <h1>CART</h1>
    <?php
    if ($cartItems->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>Item</th><th>Quantity</th><th>Price</th></tr>";
        while($row = $cartItems->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["item_name"] . "</td>";
            echo "<td>" . $row["quantity"] . "</td>";
            echo "<td>$" . $row["price"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Add the form with the "Empty Cart" button
        echo "<form action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "' method='post'>";
        echo "<button type='submit' name='empty_cart'>Empty Cart</button>";
        echo "</form>";

    } else {
        echo "<p>No items in the cart.</p>";
    }
    ?>


<?php
//close the connection
$conn->close();
?>


    
            <center><a class="buttons" href="customer.html" target="_self"> BACK </a></center>
            
        </div>


        
    </body>
</html>