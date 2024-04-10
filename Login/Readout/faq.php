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
  <link rel="stylesheet" href="../css/faq.css" />
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
                  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                    echo '<li class="drop-li">
                                  <a href="../after-log-wlcm.php">
                                  <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                  } else {
                    echo '<li class="drop-li">
                    <a href="../wlcm.html">
                      <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a></li>';
                  }
                  ?>
                  <hr />
                  <?php
                  if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                    echo '<li class="drop-li">
                    <a href="wishlist.html">
                      <img src="../LOGO/wishlist.png" width="28" height="25" /><b>Wishlist</b></a>
                  </li>';
                  } else {
                    echo '<li class="drop-li">
                    <a href="../login.php">
                      <img src="../LOGO/user.svg" width="28" height="25" /><b>LogIn</b></a>
                  </li>
                  <hr />
                  <li class="drop-li">
                    <a href="../regform.php">
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
                          <a class="category-item" href="../Gadgets/Electronics/electronics.php">Electronics</a>
                        </li>
                        <hr />
                        <li>
                          <a href="../Gadgets/Robotics/Robotics & Sensors.php">Robotics & Sensors</a>
                        </li>
                        <hr />
                        <li>
                          <a href="../Gadgets/Computer/Computer & Accessories.php">Computer & Appliances</a>
                        </li>
                        <hr />
                        <li>
                          <a href="../Gadgets/Electronics/mobile accessories.php">Mobile & Accessories</a>
                        </li>
                        <hr />
                        <li><a href="../viewcat.php">View all Categories</a></li>
                      </ul>
                    </div>
                  </div>
                  <li class="drop-li">
                  <a href="<?php echo "javascript:alert('First you have to create your account as a retailer.'); window.location.href = '../regform.php';"; ?>">
                      <img src="../LOGO/box.png" width="28" height="25" /><b>Sell Your Products</b></a>
                  </li>
                  <hr />
                </ul>
              </div>
            </li>
            <li class="contact">
              <a href="../readout/contact.php">
                <img class="icon" src="../LOGO/customer-service.png" width="28" height="25" />CONTACT</a>
            </li>
            <li class="faq">
              <a href="../faq.php">
                <img class="icon" src="../LOGO/faq.png" width="28" height="25" />FAQ</a>
            </li>
            <li class="about">
              <a href="../readout/about.html">
                <img class="icon" src="../LOGO/about.png" width="28" height="25" />ABOUT</a>
            </li>
          </ul>
        </div>

        <div class="search">
          <ul class="search-flex">
            <li id="search-bar">
             <form class="form" 
              <?php
                global $conn;
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
            <a href="profile.php">
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
              if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

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
  <!--Navbar-end-->

  <div class="faq-section">
    <h2 id="what-faq">What is Your FAQ's.</h2>
    <p id="we-faq">
      We may not have every answer of your question, but we certainly have a
      lot of them. Browse our FAQs to find answers we get the most.
    </p>
    <hr id="search-hr" />
    <input type="text" id="search-faq" placeholder="Search..." />
  </div>

  <div class="issues-section">
    <h3 id="issue-here">Here's some issues with given solution.</h3>
    <p id="ch-iss">Choose the related problems.</p>
  </div>

  <a href="#" class="up-btn-foot"><img width="50" height="50" src="../LOGO/up.png" alt="Back to Top" /></a>

  <footer class="footer">
    <ul class="social-icon">
      <li class="social-icon__item">
        <a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09"><img class="social-img" src="../LOGO/twitter.png" alt="Twitter" /></a>
      </li>
      &nbsp;&nbsp;
      <li class="social-icon__item">
        <a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img class="social-img" src="../LOGO/instagram.png" alt="Instagram" /></a>
      </li>
      &nbsp;&nbsp;
      <li class="social-icon__item">
        <a href="https://www.facebook.com/profile.php?id=100033725501635"><img class="social-img" src="../LOGO/facebook.png" alt="Facebook" /></a>
      </li>
      &nbsp;&nbsp;
<li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info"><img class="social-img" id="Linkedin-Logo" src="../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;    </ul>

    <ul class="menu-foot">
      <li class="menu__item">
        <a class="menu__link" href="../after-log-wlcm.html">Home</a>
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