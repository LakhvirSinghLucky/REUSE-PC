<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
include'../common_functions/common_fun.php';
getIPAddress();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
  <link rel="stylesheet" href="../css/search.css" />
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
                ?>
                <ul class="menu-btn-inside">
                  <hr />
                  <li class="drop-li">
                    <a href="../after-log-wlcm.php">
                      <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                  </li>
                  <hr />
                  <li class="drop-li">
                    <a href="wishlist.html">
                      <img src="../LOGO/wishlist.png" width="28" height="25" /><b>Wishlist</b></a>
                  </li>
                  <hr />
                  <div class="drop-cat">
                    <li class="drop-li cursor">
                      <a><img src="../LOGO/categories.png" width="28" height="25" /><b>Categories</b></a>
                    </li>
                    <hr />
                    <div class="cat-out">
                      <ul class="cat-inside" style="list-style-type: circle">
                        <li>
                          <a href="Gadgets/Electronics/electronics.php">Electronics</a>
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
                                  include("../../seller/database.php");

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
              <a href="profile.php" class="profile">

                <?php
                include 'database.php';

                $email = $_SESSION["email"];
                $findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
                if ($res = mysqli_fetch_array($findresult)) {
                  $image          = $res['image'];
                  $customer_id = $res["customer_id"];
                }
                if ($image == NULL) {
                  echo '<img class="profile" id="user-img" src="../LOGO/profile.png" alt="PROFILE PIC">';
                } else {
                  echo '<img class="profile" id="user-img" src="../profile_image/' . $image . '" alt="PROFILE PIC">';
                } ?></a>
              <div class="pic-drop">
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo" />BHARAT</a>
                <hr />
                <a href="cart.php?customerid='. $customer_id .'" target="_blank" class="lo-drop">
                  <img src="../LOGO/shopping-cart.png" width="28" height="25" alt="Cart-Logo" /><sup id="cart_no.sup"><?php echo cart_item_total(); ?></sup>My Cart</a>
                <hr />
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/location.png" width="28" height="25" alt="Delivery-Logo" />Delivery</a>
                <hr />
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/languages.png" width="28" height="25" alt="Lang-Logo" />Language</a>
                <hr />
                <a href="Settings.php" class="lo-drop">
                  <img src="../LOGO/setting.png" width="28" height="25" alt="Setting-Logo" />Settings</a>
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

  <?php
  global $conn;
  include("../../seller/database.php");

  if (isset($_GET['search_data_product'])) {
    $search_data_value = $_GET['search_data'];
    if ($_GET['search_data'] === "") { //do nothing
    } else {
      $query = "SELECT * FROM products where search_keywords like '%$search_data_value%' or title like '%$search_data_value%'";
      $findresult = mysqli_query($conn, $query);
      echo "
    <h1 class='search-prod-head'>Search results for <em>'" . $search_data_value . "'</em></h1>
    <div>
    <div class='elec-container'>";
      while ($res = mysqli_fetch_array($findresult)) {
        $image1          = $res['image1'];
        $title_demo      = $res['title'];
        $subtitle        = $res['subtitle'];
        $price           = $res['price'];
        $old_price       = $res['old_price'];
        $title           = substr($title_demo, 0, 25);

        echo  "<div class='elec-card'>
              <div class='elec-card-img'>
              <img src='../../seller/product_image/" . $image1 . "'alt='Product Image'>
              </div>
              <div class='background-interface'>
              <h3>" . $title . "</h3>
              <p>₹" . $price . " &nbsp;&nbsp;<s id='old_price'>₹" . $old_price . "</s></p>
              <div class='btn_buy'>
              <a href=''>BUY NOW</a>
              <a href=''>ADD TO CART</a>
              </div>
              <span>Delivery after 24 hours of order placed</span> 
              </div>
              </div>
              ";
      }
      echo "</div>
          </div>";
    }
  }
  ?>

  <a href="search.php" class="up-btn-foot"><img width="50" height="50" src="../LOGO/up.png" alt="Back to Top"></a>

  <footer class="footer">

    <ul class="social-icon">
      <li class="social-icon__item"><a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09"><img class="social-img" src="../LOGO/twitter.png" alt="Twitter"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img class="social-img" src="../LOGO/instagram.png" alt="Instagram"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://www.facebook.com/profile.php?id=100033725501635"><img class="social-img" src="../LOGO/facebook.png" alt="Facebook"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info"><img class="social-img" id="Linkedin-Logo" src="../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;
    </ul>

    <ul class="menu-foot">
      <li class="menu__item"><a class="menu__link" href="after-log-wlcm.php">Home</a></li>
      <li class="menu__item"><a class="menu__link" href="Readout/about.html">About</a></li>
      <li class="menu__item"><a class="menu__link" href="Readout/contact.php">Contact Us</a></li>
      <li class="menu__item"><a class="menu__link" href="Readout/terms.html">Privacy Policy</a></li>
    </ul>
    <p>&copy;2023 REUSE-PC | All Rights Reserved</p>

  </footer>
</body>

</html>