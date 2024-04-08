<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title> Kustom Suites: My Account</title>
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
        <div class="body">
            <div class="grid-container">
                <div class="grid1">
                    <header>
                        <div class="logo-container">
                            <p style="font-family: Dancing Script, cursive;"><b>Kustom Suites</b></p>
                        </div>
                    <nav class="nav_list">
                    <ul>
                        <li><a class="active" href = "#">Home</a></li>
                        <li><a class="zoom" href = "#">Browse</a></li>
                        <li><a class="zoom" href = "#">About Us</a></li>
                        <li><a  href="#" title="Your Cart"><i class="fa-solid fa-cart-shopping" style="color: #ffffff;"></i></a></li>
                    </ul>
                    </nav>
                    </header>
                    
                </div><!--End of header section-->

                <div class="grid2"><H2>ACCOUNT</H2><h2>OPTIONS</h2>
                    <!--Side menu-->
                    <div class="sidemenu">
                       <button><span><a href="Orders.html" target="_self"><b>Orders</b></a></span></button><br>
                       <button><span><a href="Billing.html" target="_self"><b>Billing Details</b></a></span></button><br>
                       <button><span><a href="Manageacc.html" target="_self"><b>Settings</b></a></span></button><br>                    
                    <br>
                    </div>
                </div><!--End of menu section-->
                <div class="grid3"><h2>PROFILE</h2>
                    <hr>
                    <img src="Avatar.png" alt="Avatar" class="avatar">
                    
                    <?php
                    /**Date: 24/03/2024
                     **Php code for linking the db to Kustom customer profile landing page
                     */
                    
                    //start session assuming customer details will be stored after logging in
                    session_start();
                    
                    if(isset($_SESSION['user_id'])) {//Assuming this has been set on log in...
                    //connection parameters
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "kustom";
                    
                    $conn = new mysqli($servername, $username, $password, $database);
                    
                    // Check connection
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error()."</br>");
                     }
                    else{  echo "Connection successfully created</br>";}
                    
                    
                    //A function to display the necessary profile and address details on the page
                    function displayDetails($conn){
                    
                        //sql query to get needed details 
                        $sql = "SELECT fname, lname, email, p_address, phone 
                                FROM customer_profile WHERE c_ID =$_SESSION['user_id']";
                    
                        // Prepare and bind parameters
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("i", $_SESSION['user_id']);
                    
                        // Execute statement
                        $stmt->execute();
                    
                        // Bind result variables
                        $stmt->bind_result($fname, $lname, $email, $p_address, $phone);
                    
                        // Fetch values
                        $stmt->fetch();

                        echo "<p>". $fname . $lname. "<br>";
                        echo "<p>". $email. "<br>";
                    
                        // Close statement
                        $stmt->close();
                    
                        // Close connection
                        $conn->close();
                    
                    
                    }
                    
                    
                    } else {
                        echo "User not logged in";
                    }
                    ?>
                </div><!--End of profile section-->

                <div class="grid4">
                    <h2>MY ADDRESS</h2>
                    <hr>
                    <p>Default Shipping Address:</p>
                    <?php
                    echo "<p>". $p_address. $phone. "<br>";
                    ?>

                    <a href="Update.html" class="buttons" target="_self">Update Address  <i style="font-size:24px" class="fa">&#xf040;</i></a>

                </div><!--End of address section-->
                <div class="grid5"><h2>MY SETTINGS</h2>
                    <hr>
                    <table width="700" height="200" cellspacing="0" cellpadding="5" border="0">
                        <tr><td><a href="Update.html" target="_self">Edit Profile Details</a></td>
                        </tr>
                        <tr><td><a href="Manageacc.html" target="_self">Manage Account</a></td>
                        </tr>
                    </table>

                </div><!--End of settings section-->
                <div class="grid6">
                    <center><a class="buttons" href="Home.html" target="_blank">LOG OUT</a></center><br><br>
                    <footer class="footer">
                        <style>
                        .footer{position:relative;}</style>
                        <div class="container">
                            <div class="row">
                                <div class="footer_cols">
                                    <h4>Follow Us</h4>
                                        <div class="social_media">
                                        <a href="#"><i class="fab fa-facebook"></i></a>
                                        <a href="#"><i class="fab fa-twitter"></i></a>
                                        <a href="#"><i class="fab fa-instagram"></i></a>
                                        </div>
                                </div>
                                <div class="footer_cols">
                                    <h4>Contact Us</h4>
                                    <ul>
                                    <li>Kustom Warehouse, Moi Avenue,Nairobi, Kenya</li>
                                    <li>Phone: +254123456789, +254789654321</li>
                                    <li>Email: kustomsuites@gmail.com</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div><!--End of footer section-->
            </div><!--End of grid container-->    
        </div><!--End of body div-->

    </body>
</html>