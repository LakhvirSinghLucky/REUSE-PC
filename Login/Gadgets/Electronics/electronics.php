<?php
session_start();

include'../../common_functions/elec-fun.php';
getIPAddress();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../../LOGO/web-logo--4.png" sizes="132x132" />

  <link rel="stylesheet" href="electronic.css" />
</head>
<?php
include '../../pages/database.php';
$sel = "SELECT * FROM registration";
$query = mysqli_query($conn, $sel);
$result = mysqli_fetch_assoc($query);
?>

<body>
  <div class="header">
    <div class="top">
      <div class="reuse-pic">
        <img src="../../LOGO/pc3.png" alt="REUSE-PC" id="reuse-pic" />
        <div class="navbar">
          <ul class="nav-flex">
            <li class="menu">
              <a><img class="icon" src="../../LOGO/list.png" alt="Home" />MENU </a>
              <div class="menu-outside">
                <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                  echo '<section id="wlcm">Hello - ' . $result['username'] . '</section>';
                } else {
                  echo '<section id="wlcm">Welcome</section>';
                }
                ?>
                <ul class="menu-btn-inside">
                  <hr />
                  <?php
                  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<li class="drop-li">
                                  <a href="../../after-log-wlcm.php">
                                  <img src="../../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                  } else {
                    echo '<li class="drop-li">
                    <a href="../../wlcm.html">
                      <img src="../../LOGO/home.png" width="28" height="25" /><b>Home</b></a></li>
                  <hr/>';
                  }
                  ?>
                  <hr />
                  <?php
                  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo '<li class="drop-li">
                    <a href="wishlist.html"  target="_blank">
                      <img src="../../LOGO/wishlist.png" width="28" height="25" /><b>Wishlist</b></a>
                  </li>';
                  } else {
                    echo '<li class="drop-li">
                    <a href="../../login.php">
                      <img src="../../LOGO/user.svg" width="28" height="25" /><b>LogIn</b></a>
                  </li>
                  <hr />
                  <li class="drop-li">
                    <a href="../../regform.php">
                      <img src="../../LOGO/register.png" width="28" height="25" /><b>SignIn</b></a>
                  </li>';
                  }
                  ?>
                  <hr />
                  <div class="drop-cat">
                    <li class="drop-li cursor">
                      <a><img src="../../LOGO/categories.png" width="28" height="25" /><b>Categories</b></a>
                    </li>
                    <hr />
                    <div class="cat-out">
                      <ul class="cat-inside" style="list-style-type: circle">
                        <li>
                          <a class="category-item" target="_blank" href="../../Gadgets/Electronics/electronics.php">Electronics</a>
                        </li>
                        <hr />
                        <li>
                          <a href="../../Gadgets/Robotics/Robotics & Sensors.php" target="_blank">Robotics & Sensors</a>
                        </li>
                        <hr />
                        <li>
                          <a href="../../Gadgets/Computer/Computer & Accessories.php" target="_blank">Computer & Appliances</a>
                        </li>
                        <hr />
                        <li>
                          <a href="../../Gadgets/Electronics/mobile accessories.php" target="_blank">Mobile & Accessories</a>
                        </li>
                        <hr />
                        <li><a href="../../view-cat.php" target="_blank">View all Categories</a></li>
                      </ul>
                    </div>
                  </div>
                  <li class="drop-li">
                  <a href="<?php echo "javascript:alert('First you have to create your account as a retailer.'); window.location.href = '../../regform.php';"; ?>">
                      <img src="../../LOGO/box.png" width="28" height="25" /><b>Sell Your Products</b></a>
                  </li>
                  <hr />
                </ul>
              </div>
            </li>
            <li class="contact">
              <a href="../../contact.php">
                <img class="icon" src="../../LOGO/customer-service.png" width="28" height="25"  target="_blank"/>CONTACT</a>
            </li>
            <li class="faq">
              <a href="../../Readout/faq.html">
                <img class="icon" src="../../LOGO/faq.png" width="28" height="25" target="_blank" />FAQ</a>
            </li>
            <li class="about">
              <a href="../../about.php">
                <img class="icon" src="../../LOGO/about.png" width="28" height="25" target="_blank" />ABOUT</a>
            </li>
          </ul>
        </div>
        <div class="search">
          <ul class="search-flex">
            <li id="search-bar">
              <form class="form" <?php
                                  global $conn;
                                  include("../../../seller/pages/database.php");

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
              <a href="../../pages/profile.php">
                <?php
                include '../../pages/database.php';
                $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
                if (!empty($email)) {
                  $findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
                  if ($res = mysqli_fetch_array($findresult)) {
                    $image = $res['image'];
                  }
                  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    if ($image == NULL) {
                      echo "<img class='profile' target='_blank' id='user-img' src='../../LOGO/profile.png' alt='PROFILE PIC'></a>";
                    } else {
                      echo "<img class='profile' target='_blank' id='user-img' src='../../profile_image/" . $image . "' alt='PROFILE PIC'></a>";
                    }
                  }
                } else {
                  echo '<a href="">
                        <img src="../../LOGO/useradd.svg" class="profile" id="user-img" alt="PROFILE PIC"></a>';
                }
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                  echo '<div class="pic-drop">
                <a href="" class="lo-drop" target="_blank">
                <img src="../../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo"/>BHARAT</a>
                <hr/>
                <a href="../../cart.php" target="_blank" class="lo-drop">
                  <img src="../../LOGO/shopping-cart.png" width="28" height="25" alt="Cart-Logo" /><sup id="cart_no.sup">' ?>
                  <?php echo cart_item_elec(); ?><?php echo  '</sup>My Cart</a>
                <hr />
                <a href="" class="lo-drop" target="_blank">
                <img src="../../LOGO/location.png" width="28" height="25" alt="Delivery-Logo"/>Delivery</a>
                <hr/>
                <a href="" class="lo-drop" target="_blank">
                <img src="../../LOGO/languages.png" width="28" height="25" alt="Lang-Logo"/>Language</a>
                <hr/>
                <a href="" class="lo-drop" target="_blank">
                <img src="../../LOGO/setting.png" width="28" height="25" alt="Setting-Logo"/>Settings</a>
                <hr/>
                <a href="../../logot.php" class="lo-drop">
                <img src="../../LOGO/logout.png" width="28" height="25" alt="wishlist-Logo"/>Logout</a>
                </div>';
                } else {
                  echo '<div class="pic-drop">
                <a href="../../login.php" class="lo-drop" >
                <img src="../../LOGO/user.svg" width="28" height="25" alt=""/>LogIn</a>
                <hr/>
                <a href="../../regform.php" class="lo-drop" >
                <img src="../../LOGO/register.png" width="28" height="25" alt=""/>SignIn</a>
                <hr/>
                <a href="" class="lo-drop">
                <img src="../../LOGO/shopping-cart.png" width="28" height="25" alt=""/>My Cart</a>
                <hr/>
                <a href="" class="lo-drop">
                <img src="../../LOGO/wishlist.png" width="28" height="25" alt=""/>Wishlist</a>
                <hr/>
                <a href="" class="lo-drop">
                <img src="../../LOGO/languages.png" width="28" height="25" alt=""/>Language</a>
                <hr/>
                <a href="" class="lo-drop">
                <img src="../../LOGO/setting.png" width="28" height="25" alt=""/>Settings</a>
                </div>';
                }
                ?>
            </div>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Product_image -->
  <?php

  error_reporting(E_ALL);
  ini_set('display_errors', 1);

  include("../../../seller/pages/database.php"); 
  $query = "SELECT * FROM products order by rand()";
  $findresult = mysqli_query($conn, $query);

  echo "
    <div>
    <div class='elec-container'>";
  while ($res = mysqli_fetch_array($findresult)) {
    $image1          = $res['image1'];
    $id              = $res['id'];
    $title_demo      = $res['title'];
    $subtitle_demo   = $res['subtitle'];
    $price           = $res['price'];
    $old_price       = $res['old_price'];
    $title           = substr($title_demo, 0, 17);
    if (strlen($subtitle_demo) > 25) {
      $subtitle = substr($subtitle_demo, 0, 25) . "...";
    } else {
      $subtitle = $subtitle_demo;
    }
    echo "<a href='../../pages/buy--new.php?Product_id=".$id."' alt='Product' target='_blank'>
            <div class='elec-card'>
            <div class='elec-card-img'>
            <img src='../../../seller/product_image/" . $image1 . "'alt='Product Image'>
            </div>
            <div class='background-interface'>
            <h3 id='title-id-sub'>" . $title . "<br>" . $subtitle . "</h3>
            <p>₹" . $price . " &nbsp;&nbsp;<s id='old_price'>₹" . $old_price . "</s></p>
            <span>Delivery after 24 hours of order placed</span> 
            </div>
            </div>
            </a>
            ";
  }
  echo "</div>
          </div>";
  ?>

  <a href="electronics.html" class="up-btn-foot"><img width="50" height="50" src="../../LOGO/up.png" alt="Back to Top"></a>

  <footer class="footer">

    <ul class="social-icon">
      <li class="social-icon__item"><a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09" target="_blank"><img class="social-img" src="../../LOGO/twitter.png" alt="Twitter"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" target="_blank"><img class="social-img" src="../../LOGO/instagram.png" alt="Instagram"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://www.facebook.com/profile.php?id=100033725501635" target="_blank"><img class="social-img" src="../../LOGO/facebook.png" alt="Facebook"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info" target="_blank"><img class="social-img" id="Linkedin-Logo" src="../../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;
    </ul>

    <ul class="menu-foot">
      <li class="menu__item"><a class="menu__link" href="../../wlcm.html">Home</a></li>
      <li class="menu__item"><a class="menu__link" href="../../Readout/about.html" target="_blank">About</a></li>
      <li class="menu__item"><a class="menu__link" href="../../Readout/contact.html" target="_blank">Contact Us</a></li>
      <li class="menu__item"><a class="menu__link" href="../../Readout/terms.html" target="_blank">Privacy Policy</a></li>
    </ul>
    <p>&copy;2023 REUSE-PC | All Rights Reserved</p>

  </footer>

</body>

</html>