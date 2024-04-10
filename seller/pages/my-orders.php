<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
include 'database.php';
$email = $_SESSION["email"];

$sel = "SELECT * FROM sell WHERE email = '$email'";
$query = mysqli_query($conn, $sel);
if ($res = mysqli_fetch_array($query)) {
    $username       = $res['username'];
    $seller_id       = $res['id'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REUSE-PC</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" sizes="132x132" />
    <link rel="stylesheet" href="../CSS/myorder.css" />
</head>

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
                                    echo '<section id="wlcm">Hello - ' . $username . '</section>';
                                } else {
                                    echo '<section id="wlcm">Welcome</section>';
                                }
                                ?>
                                <ul class="menu-btn-inside">
                                    <hr />
                                    <li class="drop-li">
                                        <a href="after-log-sell.php">
                                            <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                    </li>
                                    <hr />
                                    <li class="drop-li">
                                        <a href="">
                                            <img src="../logo/analysis.png" width="28" height="25" /><b>Analysis</b></a>
                                    </li>
                                    <hr />
                                    <li class="drop-li">
                                        <a href="my-orders.php">
                                            <img src="../LOGO/categories.png" width="28" height="25" /><b>My Orders</b></a>
                                        <hr />
                                    <li class="drop-li">
                                        <a href="all-product.php">
                                            <img src="../logo/t-product.png" width="28" height="25" /><b>All Products</b></a>
                                    </li>
                                    <hr />
                                </ul>
                            </div>
                        </li>
                        <li class="contact">
                            <a href="../Readout/contact.php" target="_blank">
                                <img class="icon" src="../LOGO/customer-service.png" width="28" height="25" />CONTACT</a>
                        </li>
                        <li class="faq">
                            <a href="../Readout/faq.php" target="_blank">
                                <img class="icon" src="../LOGO/faq.png" width="28" height="25" />FAQ</a>
                        </li>
                        <li class="about">
                            <a href="../Readout/about.html" target="_blank">
                                <img class="icon" src="../LOGO/about.png" width="28" height="25" />ABOUT</a>
                        </li>
                    </ul>
                </div>

                <div class="search">
                    <ul class="search-flex">
                        <div class="prof">
                            <a href="profile.php">
                                <?php
                                $email = $_SESSION["email"];
                                $findresult = mysqli_query($conn, "SELECT * FROM sell WHERE email = '$email'");
                                if ($res = mysqli_fetch_array($findresult)) {
                                    $image          = $res['image'];
                                }
                                if ($image == NULL) {
                                    echo '<img class="profile" id="user-img-2" src="../LOGO/profile.png" alt="PROFILE PIC"  width="45px">';
                                } else {
                                    echo '<img class="profile" id="user-img-2" src="../profile_image/' . $image . '" alt="PROFILE PIC"  width="45px">';
                                } ?></a>
                            <div class="pic-drop">
                                <a href="set-country.php" class="lo-drop" target="_blank">
                                    <img src="../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo" />BHARAT</a>
                                <hr />
                                <a href="add-product.php" class="lo-drop" target="_blank">
                                    <img src="../logo/add-product.png" width="28" height="25" alt="Cart-Logo" />Add Products</a>
                                <hr />
                                <a href="all-product.php" class="lo-drop" target="_blank">
                                    <img src="../LOGO/t-product.png" width="28" height="25" alt="Delivery-Logo" />All Product</a>
                                <hr />
                                <a href="language.php" class="lo-drop" target="_blank">
                                    <img src="../LOGO/languages.png" width="28" height="25" alt="Lang-Logo" />Language</a>
                                <hr />
                                <a href="my-orders.php" class="lo-drop">
                                    <img src="../LOGO/categories.png" width="28" height="25" alt="Setting-Logo" />My Orders</a>
                                <hr />
                                <a href="logot.php" class="lo-drop">
                                    <img src="../LOGO/logout.png" width="28" height="25" alt="wishlist-Logo" />Logout</a>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--Navbar-end-->
    <div class="title-prod">
        <h1>My Orders</h1>
    </div>
    <div class="wrap">
        <div class="prod-container">
        <hr>
            <?php
            $sell_query = "SELECT id FROM sell";
            $sell_result = $conn->query($sell_query);
            if ($sell_result->num_rows > 0) {

                $sell_row = $sell_result->fetch_assoc();
                $seller_id = $sell_row['id'];

                if (isset($seller_id)) {
                    $query = "SELECT * FROM my_order WHERE seller_id = '$seller_id'";
                    $result = mysqli_query($conn, $query);
                    if ($result) {
                        if (mysqli_num_rows($result) > 0) {

                            $row = mysqli_fetch_assoc($result);
                            $product_id = $row['product_id'];
                            $customer_id = $row['customer_id'];

                            $query = "SELECT * FROM products WHERE id = '$product_id' ";
                            $result = mysqli_query($conn, $query);
                            if ($result) {
                                if (mysqli_num_rows($result) > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $title        = $row['title'];
                                        $subtitle     = $row['subtitle'];
                                        $image        = $row['image1'];
                                        $price        = $row['price'];
                                        echo "<div class='single-line'>
                                        <h3 class='float'>" . $title, $subtitle . "</h3>
                                        <p id='deliver_n'>Not delivered yet</p>
                                        <p>₹" . $price . "</p>
                                        <img src='../product_image/" . $image . "' class='prod-img' alt='Peanut Butter'>
                                     </div><hr>";
                                    }
                                } else {
                                    echo "No product found with the seller from products.";
                                }
                            } else {
                                echo "No product found with the seller.";
                            }
                        } else {
                            echo "Error: " . mysqli_error($conn);
                        }
                    } else {
                        echo "Please provide the seller ID.";
                    }
                }
            }
            ?>

            <hr>
        </div>
    </div>

    <a href="" class="up-btn-foot"><img width="50" height="50" src="../LOGO/up.png" alt="Back to Top"></a>

    <footer class="footer">

        <ul class="social-icon">
            <li class="social-icon__item"><a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09" target="_blank"><img class="social-img" src="../LOGO/twitter.png" alt="Twitter"></a></li>&nbsp;&nbsp;
            <li class="social-icon__item"><a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" target="_blank"><img class="social-img" src="../LOGO/instagram.png" alt="Instagram"></a></li>&nbsp;&nbsp;
            <li class="social-icon__item"><a href="https://www.facebook.com/profile.php?id=100033725501635" target="_blank"><img class="social-img" src="../LOGO/facebook.png" alt="Facebook"></a></li>&nbsp;&nbsp;
            <li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info" target="_blank"><img class="social-img" id="Linkedin-Logo" src="../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;
        </ul>

        <ul class="menu-foot">
            <li class="menu__item"><a class="menu__link" href="after-log-wlcm.PHP">Home</a></li>
            <li class="menu__item"><a class="menu__link" href="../Readout/about.html">About</a></li>
            <li class="menu__item"><a class="menu__link" href="../Readout/contact.PHP">Contact Us</a></li>
            <li class="menu__item"><a class="menu__link" href="../Readout/terms.html">Privacy Policy</a></li>
        </ul>
        <p>&copy;2023 REUSE-PC | All Rights Reserved</p>

    </footer>

</body>

</html>