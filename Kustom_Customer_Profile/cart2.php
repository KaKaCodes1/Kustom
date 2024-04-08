<?php
//start session to access session variables
session_start();


//connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$database = "group16"; 

$conn = new mysqli($servername, $username, $password, $database);

//check connection
if ($conn -> connect_error) {
    die("connection failed: " . $conn ->connect_error);
}

//function to retrieve cart items for the current user
function getCartItems($conn) {
    
    $userId = $_SESSION["ID"];

    //the sql query to get cart items for the user
    $sql = "SELECT * FROM cart
    WHERE shana.c_ID = $userId
    UNION
    SELECT * FROM debbie
    WHERE debbie.c_ID = $userId";

    $result = $conn->query($sql);

    return $result;
}

//if customer is logged in,def has to be logged in to view his/her cart items
if (isset($_SESSION['ID'])) {
    //get the cart items
    $cartItems = getCartItems($conn);

} else {
    //redirect  to login page  
    header("Location: login.php");
    exit();
}

//function to insert items into the cart 
function addToCart($item_id) {
    $sql = "INSERT INTO cart(item_ID)";

    $result = $conn->query($sql);
    return $result;
}


//function to delete items from the cart
function deleteCartItems($item_id) {

    $userId = $_SESSION['ID'];

    $sql = "DELETE FROM shana 
    WHERE shana.c_ID = $userId";

    $sql = "DELETE FROM debbie
    WHERE debbie.c_ID = $userId";

    $result = $conn->querry(sql);

    return $result;
}

//function to update quantity
function updateQuantity($quantity, $item_id) {
    $item_id = $_POST['item_ID'];
    $new_quantity = $_POST['quantity'];
    
    // Update the quantity in the database
    $query = "UPDATE shana SET quantity = $quantity WHERE id = $item_id";

    if ($conn->query($query) === TRUE) {
        echo "Quantity updated successfully.";
    } else {
        echo "Error updating quantity: " . $conn->error;
    }
}


if (! empty($cartItems)) {
    // Update cart item quantity in database
    $newQuantity = $cartItems[0]["quantity"] + $_POST["quantity"];
    updateCartQuantity($newQuantity, $cartItems[0]["id"]);
}

if (isset($_POST['empty_cart'])) {
    // Call function to delete all items from the cart
    deleteCartItems($_GET["id"]); 
}
?>
<html lang= "en">
<head>
    <title>Cart</title>
</head>
<body>
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

</body>
</html>
<?php
//close the connection
$conn->close();
?>

