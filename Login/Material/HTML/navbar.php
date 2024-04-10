<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
include_once '../common_functions/comn-fun-wlcm.php';
getIP_Address();

include 'database.php';
$email = $_SESSION["email"];
// $sel = "SELECT * FROM registration WHERE email = '$email'";
// $query = mysqli_query($conn, $sel);
// $result = mysqli_fetch_assoc($query);
$findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
if ($res = mysqli_fetch_array($findresult)) {
  $username       = $res['username'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
  <link rel="stylesheet" href="../css/navbar.css" />
</head>

<body>
  <nav>
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
              <a href="after-log-wlcm.php">
                <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
            </li>
            <hr />
            <li class="drop-li">
              <a href="wishlist.html" target="_blank">
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
                    <a href="../Gadgets/Electronics/electronics.php" target="_blank">Electronics</a>
                  </li>
                  <hr />
                  <li>
                    <a href="../Gadgets/Robotics/Robotics & Sensors.php" target="_blank">Robotics & Sensors</a>
                  </li>
                  <hr />
                  <li>
                    <a href="../Gadgets/Computer/Computer & Accessories.php" target="_blank">Computer & Appliances</a>
                  </li>
                  <hr />
                  <li>
                    <a href="../Gadgets/Electronics/mobile accessories.php" target="_blank">Mobile & Accessories</a>
                  </li>
                  <hr />
                  <li><a href="view-cat.php" target="_blank">View all Categories</a></li>
                </ul>
              </div>
            </div>
            <li class="drop-li">
              <a href="<?php echo "javascript:alert('First you have to create your account as a retailer.'); window.location.href = '../../seller/pages/regform.php';"; ?>">
                <img src="../LOGO/box.png" width="28" height="25" /><b>Sell Your Products</b></a>
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
        <a href="../readout/faq.php" target="_blank">
          <img class="icon" src="../LOGO/faq.png" width="28" height="25" />FAQ</a>
      </li>
      <li class="about">
        <a href="../readout/about.html" target="_blank">
          <img class="icon" src="../LOGO/about.png" width="28" height="25" />ABOUT</a>
      </li>
    </ul>
    <div class="search">
      <ul class="search-flex">
        <li id="search-bar">
          <form class="form" <?php
                              include("../../seller/pages/database.php");

                              if (isset($_GET['search_data_product'])) {
                                if ($_GET['search_data'] === "") {
                                  echo "action=' '";
                                } else {
                                  echo "action='../pages/search.php' ";
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
            $email = $_SESSION["email"];
            $findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
            if ($res = mysqli_fetch_array($findresult)) {
              $image          = $res['image'];
            }
            if ($image == NULL) {
              echo '<img class="profile" id="user-img" src="../LOGO/profile.png" alt="PROFILE PIC">';
            } else {
              echo '<img class="profile" id="user-img" src="../profile_image/' . $image . '" alt="PROFILE PIC">';
            } ?></a>
          <div class="pic-drop">
            <a href="set-country.php" target="_blank" class="lo-drop">
              <img src="../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo" />BHARAT</a>
            <hr />
            <?php
            $email = $_SESSION["email"];
            $query = "SELECT customer_id FROM registration WHERE email = '$email'";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();
              $customer_id = $row["customer_id"];
            }
            ?>
            <a id="GO/shop" href="cart.php?customerid=<?php echo $customer_id ?>" target="_blank" class="lo-drop">
              <img src="../LOGO/shopping-cart.png" width="28" height="25" alt="Cart-Logo" /><sup id="cart_no.sup">
                <?php
                include '../common_functions/common_fun.php';
                getIPAddress();
                echo cart_item_total(); ?></sup>My Cart</a>
            <hr />
            <a id="GO/loca" href="delivery.php" target="_blank" class="lo-drop">
              <img src="../LOGO/location.png" width="28" height="25" alt="Delivery-Logo" />Delivery</a>
            <hr />
            <a id="GO/lang" href="language.php" target="_blank" class="lo-drop">
              <img src="../LOGO/languages.png" width="28" height="25" alt="Lang-Logo" />Language</a>
            <hr />
            <a id="trans-rotr" href="my-account.php" target="_blank" class="lo-drop">
              <img src="../LOGO/user.png" width="28" height="25" alt="Setting-Logo" />Your Account</a>
            <hr />
            <a id="og/logout" href="<?php echo "javascript:alert('You has been logged out, Visit again'); window.location.href = 'logot.php';"; ?>" class="lo-drop">
              <img src="../LOGO/logout.png" width="28" height="25" alt="wishlist-Logo" />Logout</a>

          </div>
        </div>
      </ul>
    </div>
    </div>
    </div>
    <!--Navbar-end-->
  </nav>

</body>

</html>