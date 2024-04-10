<?php
session_start();
if (!isset ($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
include_once '../common_functions/common_fun.php';
getIPAddress();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>My Profile</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <link rel="stylesheet" href="../CSS/profile.css" />
</head>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'database.php';
$email = $_SESSION["email"];
$findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
if ($res = mysqli_fetch_array($findresult)) {

    $image = $res['image'];
    $username = $res['username'];
    $oldusername = $res['username'];
    $email = $res['email'];
    $dob = $res["dob"];
    $number = $res["number"];
    $gender = $res["gender"];
    $pin = $res["pin"];
    $city = $res["city"];
    $state = $res["state"];
    $country = $res["country"];
    $address = $res["address"];
}
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

                                if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<section id="wlcm">Hello - ' . $username . '</section>';
                                } else {
                                    echo '<section id="wlcm">Welcome</section>';
                                }
                                ?>
                                <ul class="menu-btn-inside">
                                    <hr />

                                    <?php
                                    if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        echo '<li class="drop-li">
                                  <a href="after-log-wlcm.php">
                                  <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                                    } else {
                                        echo '<li class="drop-li">
                                  <a href="wlcm.php">
                                  <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                                    }
                                    ?>
                                    <hr />
                                    <?php
                                    if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        echo '<li class="drop-li">
                                            <a href="wishlist.html" target="_blank">
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
                                            <a><img src="../LOGO/categories.png" width="28"
                                                    height="25" /><b>Categories</b></a>
                                        </li>
                                        <hr />
                                        <div class="cat-out">
                                            <ul class="cat-inside" style="list-style-type: circle">
                                                <li>
                                                    <a class="category-item" href="../Gadgets/Electronics/electronics.php"
                                                        target="_blank">Electronics</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="../Gadgets/Robotics/Robotics & Sensors.php"
                                                        target="_blank">Robotics & Sensors</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="../Gadgets/Computer/Computer & Accessories.php"
                                                        target="_blank">Computer & Appliances</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="../Gadgets/Electronics/mobile accessories.php"
                                                        target="_blank">Mobile & Accessories</a>
                                                </li>
                                                <hr />
                                                <li><a href="view-cat.php" target="_blank">View all Categories</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <li class="drop-li">
                                        <a href="">
                                            <img src="../LOGO/box.png" width="28" height="25" /><b>Sell Your
                                                Products</b></a>
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
                        <li id="search-bar">
                            <input type="search" name="search" id="search" placeholder="Search in REUSE-PC">
                            <input type="submit" value="submit" id="search-submit" class="submit">
                        </li>
                        <div class="prof">
                            <a href="profile.php">
                                <?php
                                $email = isset ($_SESSION["email"]) ? $_SESSION["email"] : "";
                                if (!empty ($email)) {
                                    $findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
                                    if ($res = mysqli_fetch_array($findresult)) {
                                        $image = $res['image'];
                                        $customer_id = $res["customer_id"];
                                    }
                                    if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        if ($image == NULL) {
                                            echo '<img class="profile" id="user-img" src="../LOGO/profile.png" alt="PROFILE PIC"></a>';
                                        } else {
                                            echo '<img class="profile" id="user-img" src="../profile_image/' . $image . '" alt="PROFILE PIC"></a>';
                                        }
                                    }
                                } else {
                                    echo '<a href="">
                                <img src="../LOGO/useradd.svg" class="profile" alt="PROFILE PIC"  /></a>';
                                }
                                if (isset ($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<div class="pic-drop">
                                <a href="set-country.php" class="lo-drop" target="_blank">
                                <img src="../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo"/>BHARAT</a>
                                <hr/>
                                <a href="cart.php?customerid='. $customer_id .'" target="_blank" class="lo-drop">
                  <img src="../LOGO/shopping-cart.png" width="28" height="25" alt="Cart-Logo" /><sup id="cart_no.sup">'?>
                  <?php echo cart_item_total(); ?><?php echo  '</sup>My Cart</a>
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
    <!--Navbar-end-->
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
        <div class="set-profile">
            <h2 class="set-prof-txt">Profile</h2>
            <div class="set-prof-in">
                <div class="set-prof-im">
                    <?php
                    if ($image == NULL) {
                        echo '<img class="pro-img-gpt" src="../LOGO/profile.png">';
                    } else {
                        echo '<img class="pro-img-gpt" src="../profile_image/' . $image . '">';
                    }
                    ?>
                </div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">Name</b>
                    <s>
                        <?php echo $username; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">Gender</b>
                    <s>
                        <?php echo $gender; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">Email</b>
                    <s>
                        <?php echo $email; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">Date of Birth</b>
                    <s>
                        <?php echo $dob; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">Mobile Number</b>
                    <s>
                        <?php echo $number; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">Address</b>
                    <s id="address">
                        <?php echo $address; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">Pin</b>
                    <s>
                        <?php echo $pin; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">City</b>
                    <s>
                        <?php echo $city; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">State</b>
                    <s>
                        <?php echo $state; ?>
                    </s>
                </Div>
                <hr>
                <Div class="edit-set-pro"><b class="set-txt">Country</b>
                    <s>
                        <?php echo $country; ?>
                    </s>
                </Div>
                <hr>
                <div class="edit-btn">
                    <button class="edit-btn-a"><a class="edit-btn-b" href="edit-profile.php">Edit Profile</a></button>
                </div>
            </div>
        </div>
    </form>

    <footer class="footer">
        <ul class="social-icon">
            <li class="social-icon__item">
                <a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09"><img class="social-img"
                        src="../LOGO/twitter.png" alt="Twitter" /></a>
            </li>
            &nbsp;&nbsp;
            <li class="social-icon__item">
                <a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img
                        class="social-img" src="../LOGO/instagram.png" alt="Instagram" /></a>
            </li>
            &nbsp;&nbsp;
            <li class="social-icon__item">
                <a href="https://www.facebook.com/profile.php?id=100033725501635"><img class="social-img"
                        src="../LOGO/facebook.png" alt="Facebook" /></a>
            </li>
            &nbsp;&nbsp;
            <li class="social-icon__item"><a
                    href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info"><img class="social-img"
                        id="Linkedin-Logo" src="../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;

        </ul>

        <ul class="menu-foot">
            <li class="menu__item">
                <a class="menu__link" href="after-log-wlcm.html">Home</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="../Readout/about.html">About</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="../Readout/contact.html">Contact Us</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="../Readout/terms.html">Privacy Policy</a>
            </li>
        </ul>
        <p>&copy;2023 REUSE-PC | All Rights Reserved</p>
    </footer>
</body>

</html>