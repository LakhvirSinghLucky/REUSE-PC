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
                  <?php
                  if (isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] == true) {
                    echo '<li class="drop-li">
                                  <a href="../pages/after-log-wlcm.php">
                                  <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                  } else {
                    echo '<li class="drop-li">
                    <a href="../wlcm.php">
                      <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                      </li>';
                  }
                  ?>
                  <hr />
                  <?php
                  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                    echo '<li class="drop-li">
                    <a href="">
                      <img src="../LOGO/wishlist.png" width="28" height="25" /><b>Wishlist</b></a>
                  </li>';
                  } else {
                    echo '<li class="drop-li">
                    <a href="../pages/login.php">
                      <img src="../LOGO/user.svg" width="28" height="25" /><b>LogIn</b></a>
                  </li>
                  <hr />
                  <li class="drop-li">
                    <a href="../pages/regform.php">
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
                          <a class="category-item" href="../Gadgets/Electronics/electronics.php" target="_blank">Electronics</a>
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
                        <li><a href="../pages/viewcat.php">View all Categories</a></li>
                      </ul>
                    </div>
                  </div>
                  <li class="drop-li">
                  <a href="<?php echo "javascript:alert('First you have to create your account as a retailer.'); window.location.href = '../pages/regform.php';"; ?>">
                      <img src="../LOGO/box.png" width="28" height="25" /><b>Sell Your Products</b></a>
                  </li>
                  <hr />
                </ul>
              </div>
            </li>
            <li class="contact">
              <a href="contact.php">
                <img class="icon" src="../LOGO/customer-service.png" width="28" height="25" />CONTACT</a>
            </li>
            <li class="faq">
              <a href="FAQ.php">
                <img class="icon" src="../LOGO/faq.png" width="28" height="25" />FAQ</a>
            </li>
            <li class="about">
              <a href="about.html">
                <img class="icon" src="../LOGO/about.png" width="28" height="25" />ABOUT</a>
            </li>
          </ul>
        </div>
        <div class="search">
          <ul class="search-flex">
            <li id="search-bar">
             <form class="form" 
              <?php
                include("../../seller/pages/database.php");

                if (isset($_GET['search_data_product'])) {
                  if ($_GET['search_data'] === "") {
                    echo "action=' '";
                  } else {
                    echo "action='search.php' ";
                  }
                }
              ?>
                  method="get">
                <input type="search" name="search_data" id="search" placeholder="Search in REUSE-PC">
                <input type="submit" name="search_data_product" id="search-submit" class="submit">
              </form>
            </li>
            <div class="prof">
              <a href="../pages/profile.php">
                <?php
                  include '../pages/database.php';
                $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
                if (!empty($email)) {
                  $findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
                  if ($res = mysqli_fetch_array($findresult)) {
                    $image = $res['image'];
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
                <img src="../LOGO/useradd.svg" class="profile" alt="PROFILE PIC" width="45px" /></a>';
                }
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] = true) {

                  echo '<div class="pic-drop">
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/shopping-cart.png" width="28" height="25" alt="Cart-Logo"/>My Cart</a>
              <hr/>
              <a href="#" class="lo-drop">
              <img src="../LOGO/location.png" width="28" height="25" alt="Delivery-Logo"/>Delivery</a>
              <hr/>
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/languages.png" width="28" height="25" alt="Lang-Logo"/>Language</a>
              <hr/>
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/setting.png" width="28" height="25" alt="Setting-Logo"/>Settings</a>
              <hr/>
              <a href="#" class="lo-drop">
              <img src="../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo"/>BHARAT</a>
              <hr/>
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/logout.png" width="28" height="25" alt="wishlist-Logo"/>Logout</a>
              </div>';
                } else {
                  echo '<div class="pic-drop">
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/user.svg" width="28" height="25" alt=""/>LogIn</a>
              <hr/>
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/register.png" width="28" height="25" alt=""/>SignIn</a>
              <hr/>
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/shopping-cart.png" width="28" height="25" alt=""/>My Cart</a>
              <hr/>
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/wishlist.png" width="28" height="25" alt=""/>Wishlist</a>
              <hr/>
              <a href="" class="lo-drop" target="_blank">
              <img src="../LOGO/languages.png" width="28" height="25" alt=""/>Language</a>
              <hr/>
              <a href="" class="lo-drop" target="_blank">
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