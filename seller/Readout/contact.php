<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
  <link rel="stylesheet" href="../CSS/contact.css" />
</head>
<?php
include '../pages/database.php';

$email = $_SESSION["email"];
$sel = "SELECT * FROM sell WHERE email = '$email'";
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
                <form class="form" action="search.php" method="get">
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


  <div class="box">

    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Help Center</h5>
          <p class="card-text">Mail the query you want to do, you will got reply in the office hours ASAP.</p>
          <a href="mailto:lakhvirlucky.2811@gmail.com? " class="btn-primary">Mail Us</a>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Customer Care</h5>
          <p class="card-text">Talk to our experts, your problem will definitely be solved by the Team.</p>
          <a href="tel:+917814213549p000" class="btn">Talk to Our Experts</a>
        </div>
      </div>
    </div>
  </div>
  <div class="txt-box">
    <div class="shopify-policy__title">
      <h1>Contact information</h1>
    </div>

    <div class="shopify-policy__body">
      <p><strong>Trade name:</strong> REUSE-PC</p>
      <p><strong>Phone number:</strong>&nbsp; 7814213549 (12 PM - 2 PM and 3 PM - 6 PM) ( Monday to Friday)</p>
      <p><strong>Email:</strong> support@reuse-pc.in</p>
      <p><strong>Physical address:</strong> REUSE-PC, 175,Saroya, Mukerian, Punjab(144221) , BHARAT</p>
      <p>&nbsp;</p>
    </div>
  </div>
  </div>

</body>

</html>