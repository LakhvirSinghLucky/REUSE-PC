<?php 
session_start();

include'../common_functions/common_fun.php';
 getIPAddress()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REUSE-PC</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <link rel="stylesheet" href="../CSS/cart.css" />
</head>
<?php
include 'database.php';
$sel = "SELECT * FROM registration";
$query = mysqli_query($conn, $sel);
$result = mysqli_fetch_assoc($query);
?>

<body>
    <div class="header">
        <div class="top">
            <div class="reuse-pic">
                <img src="../LOGO/pc3.png" alt="REUSE-PC" id="reuse-pic" />
                <div class="navbar">
                    <ul class="nav-flex">
                        <li class="menu">
                            <a><img class="icon" src="../LOGO/list.png" alt="Home" />MENU </a>
                            <div class="menu-outside">
                                <?php
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<section id="wlcm">Hello - ' . $result['username'] . '</section>';
                                } else {
                                    echo '<section id="wlcm">Welcome</section>';
                                }
                                ?> <ul class="menu-btn-inside">
                                    <hr />

                                    <?php
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        echo '<li class="drop-li">
                                  <a href="after-log-wlcm.php">
                                  <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                                    } else {
                                        echo '<li class="drop-li">
                                  <a href="wlcm.html">
                                  <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                                    }
                                    ?>
                                    <hr />
                                    <?php
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        echo '<li class="drop-li">
                                            <a href="wishlist.html"  target="_blank">
                                            <img src="../LOGO/wishlist.png" width="28" height="25" /><b>Wishlist</b></a>
                                        </li>';
                                                            } else {
                                                                echo '<li class="drop-li">
                                            <a href="login.php">
                                            <img src="../LOGO/user.svg" width="28" height="25" /><b>LogIn</b></a>
                                        </li>
                                        <hr />
                                        <li class="drop-li">
                                            <a href="regform.php">
                                            <img src="../LOGO/register.png" width="28" height="25" /><b>SignIn</b></a>
                                        </li>';
                                    }
                                    ?>
                                    <hr />
                                    <div class="drop-cat">
                                        <li class="drop-li cursor">
                                            <a><img src="../LOGO/categories.png" width="28" height="25" /><b>Categories</b></a>
                                        </li>
                                        <hr />
                                        <div class="cat-out">
                                            <ul class="cat-inside" style="list-style-type: circle">
                                                <li>
                                                    <a class="category-item" href="Gadgets/Electronics/electronics.php" target="_blank">Electronics</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="Gadgets/Robotics/Robotics & Sensors.php" target="_blank">Robotics & Sensors</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="Gadgets/Computer/Computer & Accessories.php" target="_blank">Computer & Appliances</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="Gadgets/Electronics/mobile accessories.php" target="_blank">Mobile & Accessories</a>
                                                </li>
                                                <hr />
                                                <li><a href="view-cat.php" target="_blank">View all Categories</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <li class="drop-li">
                                        <a href="<?php echo "javascript:alert('First you have to create your account as a retailer.'); window.location.href = 'regform.php';"; ?>">
                                            <img src="../LOGO/box.png" width="28" height="25" /><b>Sell Your Products</b></a>
                                    </li>
                                    <hr />
                                </ul>
                            </div>
                        </li>
                        <li class="contact">
                            <a href="Readout/contact.php" target="_blank">
                                <img class="icon" src="../LOGO/customer-service.png" width="28" height="25" />CONTACT</a>
                        </li>
                        <li class="faq">
                            <a href="Readout/faq.php" target="_blank">
                                <img class="icon" src="../LOGO/faq.png" width="28" height="25" />FAQ</a>
                        </li>
                        <li class="about">
                            <a href="Readout/about.html" target="_blank">
                                <img class="icon" src="../LOGO/about.png" width="28" height="25" />ABOUT</a>
                        </li>
                    </ul>
                </div>
                <div class="search">
                    <ul class="search-flex">
                        <li id="search-bar">
                            <form class="form" <?php
                                                global $conn;
                                                include("../../seller/pages/database.php");

                                                if (isset($_GET['search_data_product'])) {
                                                    if ($_GET['search_data'] === "") {
                                                        echo "action=' '";
                                                    } else {
                                                        echo "action='search.php' ";
                                                    }
                                                }
                                                ?> method="get">
                                <input type="search" name="search_data" id="search" placeholder="Search in REUSE-PC">
                                <input type="submit" name="search_data_product" id="search-submit" class="submit">
                            </form>
                        </li>
                        <div class="prof">
                            <a href="profile.php" target="_blank" class="profile">
                                <?php
                                include 'database.php';
                                $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
                                if (!empty($email)) {
                                    $findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
                                    if ($res = mysqli_fetch_array($findresult)) {
                                        $image = $res['image'];
                                        $customer_id = $res["customer_id"];
                                    }
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        if ($image == NULL) {
                                            echo '<img class="profile" id="user-img" src="../LOGO/profile.png" alt="PROFILE PIC"></a>';
                                        } else {
                                            echo '<img class="profile" id="user-img" src="../profile_image/' . $image . '" alt="PROFILE PIC"></a>';
                                        }
                                    }
                                } else {
                                    echo '<a>
                                    <img src="../LOGO/useradd.svg" class="profile" alt="PROFILE PIC" ></a>';
                                }

                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<div class="pic-drop">
                                    <a href="" class="lo-drop" target="_blank">
                                    <img src="../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo"/>BHARAT</a>
                                    <hr/>
                                    <a href="cart.php?customerid='. $customer_id .'" target="_blank" class="lo-drop">
                                    <img src="../LOGO/shopping-cart.png" width="28" height="25" alt="Cart-Logo" /><sup id="cart_no.sup">'?>
                                    <?php echo cart_item_total(); ?><?php echo '</sup>My Cart</a>
                                    <hr />
                                    <a href="" class="lo-drop" target="_blank">
                                    <img src="../LOGO/location.png" width="28" height="25" alt="Delivery-Logo"/>Delivery</a>
                                    <hr/>
                                    <a href="" class="lo-drop" target="_blank">
                                    <img src="../LOGO/languages.png" width="28" height="25" alt="Lang-Logo"/>Language</a>
                                    <hr/>
                                    <a href="" class="lo-drop" target="_blank">
                                    <img src="../LOGO/setting.png" width="28" height="25" alt="Setting-Logo"/>Settings</a>
                                    <hr/>
                                    <a href="logot.php" class="lo-drop">
                                    <img src="../LOGO/logout.png" width="28" height="25" alt="wishlist-Logo"/>Logout</a>
                                    </div>';
                                } else {
                                    echo '<div class="pic-drop">
                                    <a href="" class="lo-drop">
                                    <img src="../LOGO/user.svg" width="28" height="25" alt=""/>LogIn</a>
                                    <hr/>
                                    <a href="" class="lo-drop">
                                    <img src="../LOGO/register.png" width="28" height="25" alt=""/>SignIn</a>
                                    <hr/>
                                    <a href="" class="lo-drop">
                                    <img src="../LOGO/shopping-cart.png" width="28" height="25" alt=""/>My Cart</a>
                                    <hr/>
                                    <a href="" class="lo-drop">
                                    <img src="../LOGO/wishlist.png" width="28" height="25" alt=""/>Wishlist</a>
                                    <hr/>
                                    <a href="" class="lo-drop">
                                    <img src="../LOGO/languages.png" width="28" height="25" alt=""/>Language</a>
                                    <hr/>
                                    <a href="" class="lo-drop">
                                    <img src="../LOGO/setting.png" width="28" height="25" alt=""/>Settings</a>
                                    </div>';
                                }
                                ?>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>


    <div class="dashboard">
        <h1>Shopping Cart</h1>
    </div>
    <div class="cart-container">
        <div class="cart-items">
            
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("../../seller/pages/database.php");

// Get the IP address of the user
$ip_address = getIPAddress();
$customer_id = $_GET["customerid"];
$query = "SELECT p.*, c.product_id AS cart_product_id FROM products p INNER JOIN cart c ON p.id = c.product_id WHERE c.customer_id = '$customer_id'";
$findresult = mysqli_query($conn, $query);

if (mysqli_num_rows($findresult) > 0) {
    while ($res = mysqli_fetch_array($findresult)) {
        $product_id = $res['cart_product_id']; // Product ID from the cart
        $image1 = $res['image1'];
        $title = $res['title'];
        $price = $res['price'];

        echo "
<div class='cart-item'>
    <img src='../../seller/product_image/".$image1."' alt='Product Image'>
    <div class='product-details'>
        <h2>".$title."</h2>
        <p id='Price'>Price: &#8377;".$price."</p>
        <div class='quantity:'>
            <p>Quantity: </p>
            <form action=' method='get'><input type='number' value='1' class='input-type'></form>
        </div>
    </div>
    <div class='buttons'>
        <a href='proceed-pay.php?product_id=".$product_id."' class='proceed-button'>Proceed</a>
        <a href='cart.php?delete_product=".$product_id."' class='delete-button'>Delete</a> <!-- Link to delete product --> 
    </div>
</div>";
    }
} else {
    echo "<p>No items found in the cart.</p>";
}

// Check if the delete_product parameter is set in the URL
if(isset($_GET['delete_product'])) {
    $productIdToDelete = $_GET['delete_product'];
    if(deleteProductFromCart($productIdToDelete)) {
        echo "";// echo "<script>alert('Item is deleted from the cart'); window.location.href = 'cart.php';</script>";

    } else {
        echo "<script>alert('Failed to deleted item from the cart'); window.location.href = 'cart.php';</script>";

    }
}


include("database.php");
    $email = $_SESSION["email"];
    $query = "SELECT customer_id FROM registration WHERE email = '$email'";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();
    $custom_id = $row["customer_id"];

?>
        </div>
        <div class="cart-actions">
            <a href="after-log-wlcm.php"><button class="continue-shopping-button">Continue Shopping</button></a>
            <h3 id="total-product">Total:₹<?php cart_total_price();?></h3>
            <a href="cart-pay.php?product_id=<?php echo $product_id ?>&customer_id=<?php echo $custom_id ?>">
            <button class="checkout-button">Checkout</button></a>
        </div>
    </div>
    <!-- End main -->
    <a href="cart.php" class="up-btn-foot">
        <img width="50" height="50" src="../LOGO/up.png" alt="Back to Top">
    </a>

    <footer class="footer">
        <ul class="social-icon">
            <li class="social-icon__item"><a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09" target="_blank"><img class="social-img" src="../LOGO/twitter.png" alt="Twitter"></a></li>&nbsp;&nbsp;
            <li class="social-icon__item"><a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" target="_blank"><img class="social-img" src="../LOGO/instagram.png" alt="Instagram"></a></li>&nbsp;&nbsp;
            <li class="social-icon__item"><a href="https://www.facebook.com/profile.php?id=100033725501635" target="_blank"><img class="social-img" src="../LOGO/facebook.png" alt="Facebook"></a></li>&nbsp;&nbsp;
            <li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info"><img class="social-img" id="Linkedin-Logo" src="../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;
        </ul>

        <ul class="menu-foot">
            <li class="menu__item"><a class="menu__link" href="after-log-wlcm.html" target="_blank">Home</a></li>
            <li class="menu__item"><a class="menu__link" href="Readout/about.html" target="_blank">About</a></li>
            <li class="menu__item"><a class="menu__link" href="Readout/contact.html" target="_blank">Contact Us</a></li>
            <li class="menu__item"><a class="menu__link" href="Readout/terms.html" target="_blank">Privacy Policy</a></li>
        </ul>
        <p>&copy;2023 REUSE-PC | All Rights Reserved</p>

    </footer>
   
</body>

</html>