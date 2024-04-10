<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
  header("location: login.php");
  exit;
}
include 'database.php';
$sel = "SELECT * FROM sell";
$query = mysqli_query($conn, $sel);
$result = mysqli_fetch_assoc($query);

include '../common_function/common_fun.php';
getIPAddress()
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" sizes="132x132" />
  <link rel="stylesheet" href="../css/all-product.css" />
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
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                  echo '<section id="wlcm">Hello - ' . $result['username'] . '</section>';
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
                      <a href="my-orders.php" target="_blank">
                        <img src="../LOGO/categories.png" width="28" height="25" /><b>My Orders</b></a>
                    </li>
                    <hr />
                  <li class="drop-li">
                    <a href="all-product.php" target="_blank">
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
            <li id="search-bar">
              <form class="form" <?php
                                  global $conn;
                                  include("database.php");

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
              <a href="profile.php" target="_blank">
                <?php
                $email = $_SESSION["email"];
                $findresult = mysqli_query($conn, "SELECT * FROM sell WHERE email = '$email'");
                if ($res = mysqli_fetch_array($findresult)) {
                  $image          = $res['image'];
                }
                if ($image == NULL) {
                  echo '<img class="profile" id="user-img" src="../LOGO/profile.png" alt="PROFILE PIC"  width="45px">';
                } else {
                  echo '<img class="profile" id="user-img" src="../profile_image/' . $image . '" alt="PROFILE PIC"  width="45px">';
                } ?></a>
              <div class="pic-drop">
                <a href="" class="lo-drop" target="_blank">
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
    <h2>All Products</h2>
    <button class="add-product button-+">
      <a class="add-prod" href="add-product.php" target="_blank"><img class="add-prod-img" src="../LOGO/add-product.png">Add Products</a>
    </button>
  </div>
  <div class="wrap">
    <div class="prod-container">
      <hr>
      <?php
      error_reporting(E_ALL);
      ini_set('display_errors', 1);

      include("database.php");
      $id = $_SESSION["id"];
      $query = "SELECT * FROM products";
      $total = "SELECT COUNT(title) FROM products ";
      $findresult = mysqli_query($conn, $query);

      if (mysqli_num_rows($findresult) > 0) {
        while ($res = mysqli_fetch_array($findresult)) {
          $product_id      = $res['id'];
          $image1          = $res['image1'];
          $title_demo      = $res['title'];
          $subtitle_demo   = $res['subtitle'];
          $price           = $res['price'];
          $title           = substr($title_demo, 0, 17);
          if (strlen($subtitle_demo) > 70) {
            $subtitle = substr($subtitle_demo, 0, 70) . "...";
          } else {
            $subtitle = $subtitle_demo;
          }
          echo "<div class='single-line'>
                <h3 class='float'>" . $title, $subtitle . "</h3>
                <p>₹" . $price . "</p>
                <img src='../product_image/" . $image1 . "' class='prod-img' alt='Peanut Butter'>
                <span><button class='del-btn'><a class='anchor' href='all-product.php?delete_product=" . $product_id . "'>Delete</a></button></span>
              </div><hr>";
        }
      } else {
        echo "<p>No items found.</p>";
      }

      // Check if the delete_product parameter is set in the URL
      if (isset($_GET['delete_product'])) {
        $productIdToDelete = $_GET['delete_product'];
        if (deleteProductFromAccount($productIdToDelete)) {
          echo ""; // echo "<script>alert('Item is deleted from the cart'); window.location.href = 'all-product.php';</script>";

        } else {
          echo "<script>alert('Failed to deleted item'); window.location.href = 'all-product.php';</script>";
        }
      }
      ?>
      <hr>
    </div>
  </div>

  <a href="all-product.php" class="up-btn-foot"><img width="50" height="50" src="../LOGO/up.png" alt="Back to Top"></a>

  <footer class="footer">

    <ul class="social-icon">
      <li class="social-icon__item"><a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09" target="_blank"><img class="social-img" src="../LOGO/twitter.png" alt="Twitter"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" target="_blank"><img class="social-img" src="../LOGO/instagram.png" alt="Instagram"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://www.facebook.com/profile.php?id=100033725501635" target="_blank"><img class="social-img" src="../LOGO/facebook.png" alt="Facebook"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info" target="_blank"><img class="social-img" id="Linkedin-Logo" src="../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;
    </ul>

    <ul class="menu-foot">
      <li class="menu__item"><a class="menu__link" href="wlcm.html" target="_blank">Home</a></li>
      <li class="menu__item"><a class="menu__link" href="../Readout/about.html" target="_blank">About</a></li>
      <li class="menu__item"><a class="menu__link" href="../Readout/contact.html" target="_blank">Contact Us</a></li>
      <li class="menu__item"><a class="menu__link" href="../Readout/terms.html" target="_blank">Privacy Policy</a></li>
    </ul>
    <p>&copy;2023 REUSE-PC | All Rights Reserved</p>

  </footer>

</body>

</html>