<?php
session_start();

include '../database.php';
$sel = "SELECT * FROM sell";
$query = mysqli_query($conn, $sel);
$result = mysqli_fetch_assoc($query);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" sizes="132x132" />

  <link rel="stylesheet" href="css/electronic.css" />
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
                    <a href="welcome.php">
                      <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                  </li>
                  <hr />
                  <li class="drop-li">
                    <a href="login.php">
                      <img src="../LOGO/user.svg" width="28" height="25" /><b>LogIn</b></a>
                  </li>
                  <hr />
                  <li class="drop-li">
                    <a href="regform.php">
                      <img src="../LOGO/register.png" width="28" height="25" /><b>SignIn</b></a>
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
                        <li><a href="viewcat.php">View all Categories</a></li>
                      </ul>
                    </div>
                  </div>
                  <li class="drop-li">
                    <a href="">
                      <img src="../LOGO/box.png" width="28" height="25" /><b>Sell Your Products</b></a>
                  </li>
                  <hr />
                </ul>
              </div>
            </li>
            <li class="contact">
              <a href="Readout/contact.html">
                <img class="icon" src="../LOGO/customer-service.png" width="28" height="25" />CONTACT</a>
            </li>
            <li class="faq">
              <a href="Readout/faq.html">
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
             <form class="form" 
              <?php
                global $conn;
                include("../seller/database.php");

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
              <a style="height: 69px; display: inline-block">
                <img src="../LOGO/useradd.svg" class="profile" alt="PROFILE PIC" width="45px" /></a>
              <div class="pic-drop">
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/user.svg" width="28" height="25" alt="" />LogIn</a>
                <hr />
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/register.png" width="28" height="25" alt="" />SignIn</a>
                <hr />
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/shopping-cart.png" width="28" height="25" alt="" />My Cart</a>
                <hr />
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/wishlist.png" width="28" height="25" alt="" />Wishlist</a>
                <hr />
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/languages.png" width="28" height="25" alt="" />Language</a>
                <hr />
                <a href="" class="lo-drop" target="_blank">
                  <img src="../LOGO/setting.png" width="28" height="25" alt="" />Settings</a>
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
      <a class="add-prod" href="../add-product.php"><img class="add-prod-img" src="../LOGO/add-product.png" >Add Products</a>
    </button>
  </div>
  <div class="wrap">
    <div class="prod-container">
      <hr>
      <div class="single-line">
        <h3 class="float">Pintola HIGH Protein Peanut Butter (Dark Chocolate) (1...)</h3>
        <p>₹325</p>
        <img src="../LOGO/hardware.jpg" class="prod-img" alt="Peanut Butter">
        <span><button><a class="anchor" href="">DELETE</a></button></span>
      </div>
      <hr>
      <div class="single-line">
        <h3 class="float">Pintola HIGH Protein Peanut Butter (Dark Chocolate) (1...)</h3>
        <p>₹325</p>
        <img src="../LOGO/gaming-circle.jpg" class="prod-img" alt="Peanut Butter">
        <span><button><a class="anchor" href="">DELETE</a></button></span>
      </div>
      <hr>
      <div class="single-line">
        <h3 class="float">Pintola HIGH Protein Peanut Butter (Dark Chocolate) (1...)</h3>
        <p>₹325</p>
        <img src="../LOGO/car bike.jpg" class="prod-img" alt="Peanut Butter">
        <span><button><a class="anchor" href="">DELETE</a></button></span>
      </div>
      <hr>
      <div class="single-line">
        <h3 class="float">Pintola HIGH Protein Peanut Butter (Dark Chocolate) (1...)</h3>
        <p>₹325</p>
        <img src="../LOGO/hardware.jpg" class="prod-img" alt="Peanut Butter">
        <span><button><a class="anchor" href="">DELETE</a></button></span>
      </div>
      <hr>
      <div class="single-line">
        <h3 class="float">Pintola HIGH Protein Peanut Butter (Dark Chocolate) (1...)</h3>
        <p>₹325</p>
        <img src="../LOGO/hardware.jpg" class="prod-img" alt="Peanut Butter">
        <span><button><a class="anchor" href="">DELETE</a></button></span>
      </div>
      <hr>
      <div class="single-line">
        <h3 class="float">Pintola HIGH Protein Peanut Butter (Dark Chocolate) (1...)</h3>
        <p>₹325</p>
        <img src="../LOGO/hardware.jpg" class="prod-img" alt="Peanut Butter">
        <span><button><a class="anchor" href="">DELETE</a></button></span>
      </div>
      <hr>
      <div class="single-line">
        <h3 class="float">Pintola HIGH Protein Peanut Butter (Dark Chocolate) (1...)</h3>
        <p>₹325</p>
        <img src="../LOGO/hardware.jpg" class="prod-img" alt="Peanut Butter">
        <span><button><a class="anchor" href="">DELETE</a></button></span>
      </div>
      <hr>
    </div>
  </div>

  <a href="electronics.html" class="up-btn-foot"><img width="50" height="50" src="../LOGO/up.png" alt="Back to Top"></a>

  <footer class="footer">

    <ul class="social-icon">
      <li class="social-icon__item"><a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09" target="_blank"><img class="social-img" src="../LOGO/twitter.png" alt="Twitter"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" target="_blank"><img class="social-img" src="../LOGO/instagram.png" alt="Instagram"></a></li>&nbsp;&nbsp;
      <li class="social-icon__item"><a href="https://www.facebook.com/profile.php?id=100033725501635" target="_blank"><img class="social-img" src="../LOGO/facebook.png" alt="Facebook"></a></li>&nbsp;&nbsp;
<li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info" target="_blank"><img class="social-img" id="Linkedin-Logo" src="logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;    </ul>

    <ul class="menu-foot">
      <li class="menu__item"><a class="menu__link" href="../wlcm.html" target="_blank">Home</a></li>
      <li class="menu__item"><a class="menu__link" href="../Readout/about.html" target="_blank">About</a></li>
      <li class="menu__item"><a class="menu__link" href="../Readout/contact.html" target="_blank">Contact Us</a></li>
      <li class="menu__item"><a class="menu__link" href="../Readout/terms.html" target="_blank">Privacy Policy</a></li>
    </ul>
    <p>&copy;2023 REUSE-PC | All Rights Reserved</p>

  </footer>

</body>

</html>