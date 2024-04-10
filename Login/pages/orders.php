
<?php   
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true )
{
  header("location:login.php");
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>REUSE-PC</title>
 <link rel="icon" type="image/png" href="LOGO/web-logo--4.png" sizes="132x132" />

 <style>
  #txt-center{
  text-align: center;
   align-items: center;
   }
    .box{
   display: grid;
   grid-template-columns: 1fr 1fr;
   gap: 97px 9em;
   margin: 72px 75px 83px 75px;
   }
  .row{
   padding: 13px 15px 26px 35px;
  border: 1px solid #ffffff;
   border-radius: 5px;
 align-items: center;
     margin: 11px -421px 11px 423px;
   background-color: #a2a2a2;
  }
 .box:first-child{
  align-self: center;
   }
  .dropdown-item {
    color: #000;
   }
 .btn{
   border: var(--bs-btn-border-width) solid var(--bs-btn-border-color);
    border-radius: var(--bs-btn-border-radius);
background-color: var(--bs-btn-bg);
 transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
  }
 #hov-btn{
    --bs-dropdown-bg: #dbdbdb;
  }
#btn-hov{
      --bs-dropdown-link-active-bg: #353940;
      --bs-dropdown-link-hover-bg: #ffffff;
      color: #000000;
        }
        #menu-btn{
            --bs-btn-active-bg: #959595;
            --bs-btn-active-border-color: #d8d8d8;
                --bs-btn-color: #000;
            --bs-btn-bg: #ffffff;
            --bs-btn-border-color: #ffffff;
            --bs-btn-hover-color: #000000;
            --bs-btn-hover-bg: #f0f0f0;
            --bs-btn-hover-border-color: #ffffff;
        }
        .med-text{
            font-size: large;
            font-weight: 500;
        }
            </style>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <link href="/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
       integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>
    <body style="background-color: rgb(241,241,241);">
        <div class="contain">
            <header class="p-3 text-bg">
                <img src="LOGO/pc3.png" alt="REUSE-PC" style="width: 106%; margin:-14px 0px -63px -41px;">
                <div class="container">
                    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start" style=" margin: -8px 117px 0px -93px;">
                        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                            <li>
                
                    <button  class="btn btn-primary" type="button" data-bs-toggle="offcanvas" id="menu-btn" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop" >
                     <img src="LOGO/list.png" width="28" height="25" alt="Menu logo">&nbsp;&nbsp;MENU</button>
                      <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
                       <div class="offcanvas-header">
                        <img src="" alt="">
                         <h5 class="offcanvas-title" id="staticBackdropLabel">
                          Welcome</h5>
                           <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">
                           </button>
                       </div>
                      <div class="list-group">
                      <a href="after-log-wlcm.php" target="_blank" class="list-group-item list-group-item-action"><img src="LOGO/home.png"width="28" height="25" alt="Home">HOME</a>
                      
                      
                      <div class="dropdown" >
                      <button class="list-group-item list-group-item-action" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="LOGO/categories.png"width="28" height="25" alt="Categories">Categories
                      </button>
                      <ul class="dropdown-menu" id="hov-btn" aria-labelledby="dropdownMenuButton">
                       <li><a class="dropdown-item" target="_blank" id="btn-hov" href="Gadgets/Computer/Computer & Accessories.php">Computer & Appliances</a></li>
                        <li><a class="dropdown-item" target="_blank" id="btn-hov" href="Gadgets/Robotics/Robotics & Sensors.php">Robotics & Sensors</a></li>
                        <li><a class="dropdown-item" target="_blank" id="btn-hov" href="Gadgets/Electronics/electronics.php">Electronics</a></li>
                        <li><a class="dropdown-item" target="_blank" id="btn-hov" href="Gadgets/Electronics/mobile accessories.php">Mobile & Accessories</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" target="_blank" id="btn-hov" href="viewcat.html">View all Categories</a></li>
                      </ul>
                      </div>
                      
                      <a href="#" class="list-group-item list-group-item-action"><img src="LOGO/box.png"width="28" height="25" alt="Sell Your Product">Sell Your Products</a>
                      </div>
<hr style="margin-top: 444px;">
                      
                      
                      <div class="dropdown text-right">
                            <a href="#"  class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown"  aria-expanded="false">
                              <img src="LOGO/profile.png" alt="Logo-profile" width="32" height="32" class="rounded-circle me-2">
                            </a>
                            <ul class="dropdown-menu text-small">
                              <li><a class="dropdown-item" href="#">Whateveryouwant</a></li>
                              <li><a class="dropdown-item" href="#">Settings</a></li>
                              <li><a class="dropdown-item" href="#">Profile</a></li>
                              <li><hr class="dropdown-divider"></li>
                              <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                      </div>
                      </div>
                      <!-- Nav-Menu Ending--></li>
                                <li><a target="_blank" href="contact.php" class="btn" id="menu-btn" class="nav-link px-2 text-black"><img src="LOGO/customer-service.png" width="28" height="25" alt="Contact Us">&nbsp;CONTACT US</a></li>
                                <li><a target="_blank" href="FAQ.php"class="btn" id="menu-btn" class="nav-link px-2 text-black"><img src="LOGO/faq.png"width="28" height="25" alt="FAQs">&nbsp;FAQs</a></li>
                                <li><a target="_blank" href="about.html" class="btn" id="menu-btn" class="nav-link px-2 text-black"><img src="LOGO/about.png"width="28" height="25" alt="About">&nbsp;ABOUT</a></li>
                              </ul>
                              <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                                <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                              </form>
                              <div class="dropdown text-end" style="    margin: 1px -185px 0px -10px;">
                                <a href="#" class="d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                  <img src="LOGO/profile.png" alt="Profile Pic"  width="32" height="32" class="rounded-circle me-2">
                                </a>
                                <ul class="dropdown-menu text-small" >
                                  <li><a class="dropdown-item" href="#"><img src="LOGO/my account.png" alt="My Account" width="28" height="25" id="log-icons"style="margin: 5px;">My Account</a></li>
                                  <li><a class="dropdown-item" target="_blank" href="#"><img src="LOGO/shopping-cart.png" alt="Cart" width="28" height="25"style="margin:5px;" id="log-icons">Cart</a></li>
                                  <li><a class="dropdown-item" target="_blank" href="#"><img src="LOGO/wishlist.png" alt="Wishlist" width="28" height="25" style="margin: 5px;" id="log-icons">Wishlist</a></li>
                                  <li><a class="dropdown-item" href="#"><img src="LOGO/languages.png" alt="Language" width="28" height="25" id="log-icons"style="margin: 5px;">Language</a></li>
                                  <li><a class="dropdown-item" href="#"><img src="LOGO/setting.png" alt="Settings" width="28" height="25" id="log-icons"style="margin: 5px;">Settings</a></li>
                                  <li><hr class="dropdown-divider"></li>
                                  <li><a class="dropdown-item" href="logout.php"><img src="LOGO/logout.png" alt="Logout" width="28" height="25" id="log-icons"style="margin: 5px;">Logout</a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                        </header>
  
  
  
  
                    <div class="box">
                        <div class="col" >
                          <div class="card" style="margin: 27px 0px -115px 10px; background-color: #c7c7c7; display: inline-block;">
                            <div class="card-header"style="background-color: #efefef;">
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Your Orders</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn btn-primary">Go for it</a>
                            </div>
                            <div class="card-footer text-body-secondary"style="background-color: #efefef;">
                            </div>
                          </div>
                        </div>
                        <div class="col" >
                          <div class="card" style="margin: 27px 0px -115px 10px; background-color: #c7c7c7; display: inline-block;">
                            <div class="card-header" style="background-color: #efefef;">
                            </div>
                            <div class="card-body">
                              <h5 class="card-title">Returns & Refunds</h5>
                              <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                              <a href="#" class="btn btn-primary">Go for it</a>
                            </div>
                            <div class="card-footer text-body-secondary"style="background-color:#efefef;">
                            </div>
                          </div>
                        </div>

                        <div class="row" style="padding: 13px 15px 26px 35px; border: 1px solid #c7c7c7; border-radius: 5px; 
                        margin: 11px -421px 11px 423px; background-color: #c7c7c7;">
                            <div class="_1uOGFj">
                            
                                <div class="_3E8aIl _13uHOw">
                                    <div style="font-size:x-large; font-weight: 500;">What issue are you facing?</div>
                                    <hr class="featurette-divider" style="    margin: 15px 89px 15px 89px;">
                                <div class="_3bBK6b">
                                  <div class="AioSVA">
                                    <div class="med-text">I want to manage my order</div>
                                    <div class="_3L1JJX">View,cancel or return an order</div>
                                  </div>
                                  <img src="" alt="">
                                </div>
                                <div class="_3bBK6b">
                                  <div class="AioSVA">
                                    <div class="med-text">
                                      I want help with returns &amp; refunds
                                    </div>
                                    <div class="_3L1JJX">Manage and track returns</div>
                                  </div>
                                  <img src="" alt="">
                                </div>
                                <div class="_3bBK6b">
                                  <div class="AioSVA">
                                    <div class="med-text">I want help with other issues</div>
                                    <div class="_3L1JJX">
                                      Offers,payment, &amp; all other issues
                                    </div>
                                  </div>
                                 <img src="" alt="">
                                </div>
                                <div class="_3bBK6b">
                                  <div class="AioSVA">
                                    <div class="med-text">I want to contact the seller</div>
                                    <div class="_3L1JJX"></div>
                                  </div>
                                 <img src="" alt="">
                                </div>
                              </div>
                              <div class="med-text">
                                <span>Want to reach us old style ? Here is our</span
                                ><span class="med-text"><span>Postal Address</span></span>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
</body>
</html>