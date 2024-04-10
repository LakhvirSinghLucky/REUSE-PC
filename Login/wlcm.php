<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REUSE-PC</title>
    <link rel="icon" type="image/png" href="LOGO/web-logo--4.png"/>
    <link rel="stylesheet" href="css/wlcm.css" />
  </head>
  <body>
    <div class="header">
      <div class="top">
        <div class="reuse-pic">
          <img src="LOGO/pc3.png" alt="REUSE-PC" id="reuse-pic" />
          <div class="navbar">
            <ul class="nav-flex">
              <li class="menu">
                <a><img class="icon" src="LOGO/list.png" alt="Home" />MENU </a>
                <div class="menu-outside">
                  <section id="wlcm">Welcome</section>
                  <ul class="menu-btn-inside">
                    <hr />
                    <li class="drop-li">
                      <a href="wlcm.php">
                        <img src="LOGO/home.png" width="28" height="25" /><b>Home</b></a></li>
                    <hr/>
                    <li class="drop-li">
                      <a href="pages/login.php">
                        <img src="LOGO/user.svg" width="28" height="25" /><b>LogIn</b></a>
                    </li>
                    <hr />
                    <li class="drop-li">
                      <a href="pages/regform.php">
                        <img src="LOGO/register.png" width="28" height="25" /><b>SignIn</b></a>
                    </li>
                    <hr />
                    <div class="drop-cat">
                      <li class="drop-li cursor">
                        <a><img src="LOGO/categories.png" width="28" height="25"/><b>Categories</b></a>
                      </li>
                      <hr />
                      <div class="cat-out">
                        <ul class="cat-inside" style="list-style-type: circle">
                          <li>
                            <a class="category-item" href="Gadgets/Electronics/electronics.html" >Electronics</a>
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
                          <hr/>
                          <li><a href="pages/view-cat.php" target="_blank">View all Categories</a></li>
                        </ul>
                      </div>
                    </div>
                    <li class="drop-li">
                      <a href="<?php echo "javascript:alert('First you have to create your account as a retailer or You can login.'); window.location.href = '../seller/pages/regform.php';"; ?>">
                        <img src="LOGO/box.png" width="28" height="25" /><b>Sell Your Products</b></a>
                    </li>
                    <hr/>
                  </ul>
                </div>
              </li>
              <li class="contact">
                <a href="Readout/contact.php" target="_blank">
                  <img class="icon" src="LOGO/customer-service.png" width="28" height="25"/>CONTACT</a>
              </li>
              <li class="faq">
                <a href="Readout/faq.php" target="_blank">
                  <img class="icon" src="LOGO/faq.png" width="28" height="25"/>FAQ</a>
              </li>
              <li class="about">
               <a href="Readout/about.html" target="_blank">
                  <img class="icon" src="LOGO/about.png" width="28" height="25"/>ABOUT</a>
              </li>
            </ul>
          </div>

          <div class="search">
            <ul class="search-flex">
              <li id="search-bar">
                <input type="search" name="search" id="search"
                  placeholder="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search in REUSE-PC"/>
              </li>
              <div class="prof">
                <a style="height: 69px; display: inline-block">
                  <img src="LOGO/useradd.svg" class="profile" alt="PROFILE PIC" width="45px"/></a>
                <div class="pic-drop">
                  <a href="pages/login.php" class="lo-drop">
                    <img src="LOGO/user.svg" width="28" height="25" alt=""/>LogIn</a>
                  <a href="pages/regform.php" class="lo-drop">
                    <img src="LOGO/register.png" width="28" height="25" alt=""/>SignIn</a>
                  <a href="" class="lo-drop">
                    <img src="LOGO/shopping-cart.png" width="28" height="25" alt=""/>My Cart</a>
                  <a href="" class="lo-drop">
                    <img src="LOGO/wishlist.png" width="28" height="25" alt=""/>Wishlist</a>
                  <a href="" class="lo-drop">
                    <img src="LOGO/languages.png" width="28" height="25" alt=""/>Language</a>
                  <a href="Settings.php" class="lo-drop">
                    <img src="LOGO/setting.png" width="28" height="25" alt=""/>Settings</a>
                </div>
              </div>
            </ul>
          </div>
        </div>
      </div>
    </div>  
    <!--Navbar-end-->

    <!--TV-Start-->
    <div class="main">
      <img src="logo/tvv.png" id="gif-1" alt="TV-LOGO" />
    </div>
    <!--TV-End-->
    <div class="top-font">
      <h1 class="font-style">Designed For Your Needs</h1> 
      <h3 class="font-style"><u> We fullfill your needs with the Technology</u></h3>
    </div>
    <div>
      <u class="font-style" id="reg-1"><a href="pages/regform.php">REGISTER NOW</u></a>
    </div>
    <hr class="hr" id="hr-1">
    <div class="slider">
    <div class="slides">
      <div class="keyboard-1" ><p id="txt-1">Learn from Yesterday, Live for Today, Hope for Tomorrow. The important thing is not to stop Questioning.</p>
        <button class="btn-sec" id="btn-1"><a class="button-a" href="pages/regform.php">Register Today</a></button>
      </div>
      <div class="keyboard-1" ><p id="txt-2">There are no secrets to Success, It is the result of Preparation, Hard Work and Learning from Failure.</p>
        <button class="btn-sec" id="btn-2"><a class="button-a" href="readout/about.html">Learn More</a></button>
      </div>
      <div class="keyboard-1" ><p id="txt-3">The gallery of Success that will halt, when you stopped Trying Again.</p>
        <button class="btn-sec" id="btn-3"><a class="button-a" href="">Browse Gallery</a></button>
      </div>
    </div>
  </div>
    <hr class="hr" id="hr-2">
    <center class="today-deal"><s>Deal of the day only. Hurry up!!</s></center>
    <section id="i-sec">
      <img src="logo/i-13.jpg" id="i-13" alt="i-phone13">
    </section>
    <hr class="hr" id="hr-3">
    <!--Circle-Start-->
    <div class="circles">
      <div class="circles-container">
        
        <div class="circle">
          <img src="logo/gaming-circle.jpg" alt="Gaming Laptop">
          <h2 class="fw-normal"><u>Gaming Laptops</u></h2>
          <p class="lead-2">Experience the unexpected Designs, Upgraded Speed, Enhanced performance with exciting Price and Gifts.</p>
          <button class="btn-sec"><a class="button-a" href="Gadgets/Laptops/for gaming.php">View details »</a></button>
        </div>
        <div class="circle">
          <img src="logo/robot-circle.jpg"alt="Robotics">
          <h2 class="fw-normal"><u>Robotics & Sensors</u></h2>
          <p class="lead-2">Unleash the creativity in you with quality sensors, transistors, resistors and many other quality accesssories.</p>
          <button class="btn-sec"><a class="button-a" href="Gadgets/Robotics/Robotics & Sensors.php">View details »</a></button>
        </div>
        <div class="circle">
          <img src="logo/electr-circle.jpg" alt="Electronics">
            <h2 class="fw-normal"><u>Electronics</u></h2>
              <p class="lead-2">Life made light with always connected, wherever you go with Top Brands through their Technology.</p>
                <button class="btn-sec"><a class="button-a" href="Gadgets/Electronics/electronics.php">View details »</a></button>
              </div>
            </div>
    </div>
    <!--circles-end-->
    <hr class="hr" id="hr-4">
    <!--Pannel-Start-->
    <div class="pannels">
      <div class="pan-container">
        
        <div class="pannel-1">
          <h2 class="fw-normal">Apple Desktops.
            <span class="text-body">Imersed yourself in 6k.</span></h2>
            <p class="lead"> Professionals require a lot from their displays. But each person has different needs. Resolution, reference modes, reliable calibration. Pro Display XDR has everything you need in a modern workflow, bringing a new level of efficiency to every production.</p>
          </div>
          <div class="col-5">
            <a href="Gadgets/Apple/apple.php">
              <img src="LOGO/backhello.png" id="macbok" alt="Apple Gadgets"></a>
            </div>
            
            <hr class="hr" id="hr-5">
            
          <div class="pannel-2">
            <h2 class="fw-normal">Electronic Gadgets
              <span class="text-body">Buy for yourself.</span></h2>
              <p class="lead">Technology is not just a tool. It can give learners a voice that they may not have had before. Dreams about the future are always filled with gadgets.</p>
            </div>
            <div class="col-5">
              <a href="Gadgets/Electronics/electronics.php">
                <img src="LOGO/gadgets.png" id="camera" alt="Electronics"></a>
              </div>
              
              <hr class="hr" id="hr-6">
              
              <div class="pannel-3">
          <h2 class="fw-normal">Robotic Automation
            <span class="text-body">& Intelligence.</span></h2>
            <p class="lead">Creativity involves putting your Imagination to work. In the sense Creativity is applied Imagination, So show your Imagination throughtout the Creative things. </p>
          </div>
        <div class="col-5">
          <a href="Gadgets/Robotics/Robotics Ai.php">
            <img src="LOGO/robo.png" id="robot" alt="Robotics"></a>
          </div>
        </div>
      </div>

      <hr class="hr" id="hr-7">
      <a href="wlcm.php" class="up-btn-foot"><img width="50" height="50" src="LOGO/up.png" alt="Back to Top"></a>
        
  <footer class="footer">

    <ul class="social-icon">
      <li class="social-icon__item"><a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09"><img  class="social-img" src="LOGO/twitter.png" alt="Twitter"></a></li>&nbsp;&nbsp;
        <li class="social-icon__item"><a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D"><img class="social-img" src="LOGO/instagram.png" alt="Instagram"></a></li>&nbsp;&nbsp;
          <li class="social-icon__item"><a href="https://www.facebook.com/profile.php?id=100033725501635"><img class="social-img" src="LOGO/facebook.png" alt="Facebook"></a></li>&nbsp;&nbsp;
    <li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info"><img class="social-img" id="Linkedin-Logo" src="logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;    </ul>

    <ul class="menu-foot">
      <li class="menu__item"><a class="menu__link"  href="wlcm.php">Home</a></li>
      <li class="menu__item"><a class="menu__link"  href="Readout/about.html">About</a></li>
      <li class="menu__item"><a class="menu__link"  href="Readout/contact.php">Contact Us</a></li>
      <li class="menu__item"><a class="menu__link"  href="Readout/terms.html">Privacy Policy</a></li>
    </ul>
    <p>&copy;2023 REUSE-PC | All Rights Reserved</p>

  </footer>  
</body>
</html>