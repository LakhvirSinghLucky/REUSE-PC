<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
include_once'../common_functions/comn-fun-wlcm.php';
getIP_Address();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include("database.php");

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    echo "Email session variable is not set or empty.";
    header("location: login.php");
    exit();
}

$findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");

if (!$findresult) {
    echo "Error 1010101: " . mysqli_error($conn);
    exit;
}
if ($res = mysqli_fetch_array($findresult)) {
    $image          = $res['image'];
    $username       = $res['username'];
    $oldusername    = $res['username'];
    $email          = $res['email'];
    $number         = $res["number"];
    $dob            = $res["dob"];
    $address        = $res["address"];
    $city           = $res["city"];
    $pin            = $res["pin"];
    $state          = $res["state"];
}
if (!$res) {
    echo "Error 1010101: " . mysqli_error($conn);
    exit;
}
function updateProfile($conn, $email, $username, $file, $dob, $address, $city, $pin, $state)
{
    $folder = '../profile_image/';
    $file_name = $_FILES['image']['name'];
    $file_name_array = explode(".", $file_name);
    $extension = end($file_name_array);
    $new_image_name = 'pic_' . rand() . '.' . $extension;

    if ($_FILES["image"]["size"] > 5000000) {
        return 'Your image is too large. Upload less than 5 MB in size.';
    }

    if ($file != "") {
        if (
            $extension != "jpg" && $extension != "png" && $extension != "jpeg"
            && $extension != "gif" && $extension != "PNG" && $extension != "JPG" && $extension != "GIF" && $extension != "JPEG"
        ) {
            return 'Error! Only JPG, JPEG, PNG & GIF files are allowed.';
        }
    }

    if ($file != "") {
        $stmt = mysqli_query($conn, "SELECT image FROM registration WHERE email='$email'");
        $row = mysqli_fetch_array($stmt);
        $deleteimage = $row['pic'];
        unlink($folder . $deleteimage);
        move_uploaded_file($file, $folder . $new_image_name);
        mysqli_query($conn, "UPDATE registration SET image='$new_image_name' WHERE email='$email'");
    }

    // Update all fields
    $result = mysqli_query($conn, "UPDATE registration SET 
        username    ='$username',
        dob         ='$dob',
        address     ='$address',
        city        ='$city',
        pin         ='$pin',
        state       ='$state'
        WHERE email ='$email'");

    if ($result) {
        header("location:profile.php?profile_updated=1");
        exit;
    } else {
        return 'Something went wrong.';
    }
}

if (isset($_POST['update_profile'])) {
    $username   = $_POST['username'];
    $file       = $_FILES['image']['tmp_name'];
    $dob        = $_POST['dob'];
    $address    = $_POST['address'];
    $city       = $_POST['city'];
    $pin        = $_POST['pin'];
    $state      = $_POST['state'];

    $updateResult = updateProfile($conn, $email, $username, $file, $dob, $address, $city, $pin, $state);

    if (is_string($updateResult)) {
        $error[] = $updateResult;
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Profile</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <link rel="stylesheet" href="../CSS/edit-profile.css">
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

                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<section id="wlcm">Hello - ' . $username . '</section>';
                                } else {
                                    echo '<section id="wlcm">Welcome</section>';
                                }
                                ?> <ul class="menu-btn-inside">
                                    <hr />

                                    <?php
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        echo '<li class="drop-li">
                                  <a href="after-log-wlcm.php">
                                  <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                                    } else {
                                        echo '<li class="drop-li">
                                  <a href="wlcm.html">
                                  <img src="../LOGO/home.png" width="28" height="25" /><b>Home</b></a>
                                </li>';
                                    }
                                    ?>
                                    <hr />
                                    <?php
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        echo '<li class="drop-li">
                                            <a href="wishlist.html"  target="_blank">
                                             <img src="../LOGO/wishlist.png" width="28" height="25" /><b>Wishlist</b></a>
                                        </li>';
                                    } else {
                                        echo '<li class="drop-li">
                                            <a href="login.php">
                                            <img src="../LOGO/user.svg" width="28" height="25" /><b>LogIn</b></a>
                                        </li>
                                        <hr />
                                        <li class="drop-li">
                                            <a href="regform.php">
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
                                                <li><a href="view-cat.php" target="_blank">View all Categories</a></li>
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
                            <input type="search" name="search" id="search" placeholder="Search in REUSE-PC">
                            <input type="submit" value="submit" id="search-submit" class="submit">
                        </li>
                        <div class="prof">
                            <a href="profile.php" target="_blank">
                                <?php
                                $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
                                if (!empty($email)) {
                                    $findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
                                    if ($res = mysqli_fetch_array($findresult)) {
                                        $image = $res['image'];
                                    }
                                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                        if ($image == NULL) {
                                            echo '<img class="profile" id="prof-img" src="../LOGO/profile.png" alt="PROFILE PIC"></a>';
                                        } else {
                                            echo '<img class="profile" id="prof-img" src="../profile_image/' . $image . '" alt="PROFILE PIC"></a>';
                                        }
                                    }
                                } else {
                                    echo '<a href="">
                                <img src="../LOGO/useradd.svg" class="profile" id="prof-img" alt="PROFILE PIC" /></a>';
                                }
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                                    echo '<div class="pic-drop">
                                <a href="" class="lo-drop" target="_blank">
                                <img src="../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo"/>BHARAT</a>
                                <hr/>
                                <a href="" class="lo-drop" target="_blank" >
                                <img src="../LOGO/shopping-cart.png" width="28" height="25" alt="Cart-Logo" /><sup id="cart_no.sup">'?>
                                <?php echo cart_item_total(); ?><?php echo '</sup>My Cart</a>
                                <hr/>
                                <a href="" class="lo-drop" target="_blank">
                                <img src="../LOGO/location.png" width="28" height="25" alt="Delivery-Logo"/>Delivery</a>
                                <hr/>
                                <a href="" class="lo-drop" target="_blank">
                                <img src="../LOGO/languages.png" width="28" height="25" alt="Lang-Logo"/>Language</a>
                                <hr/>
                                <a href="" class="lo-drop" target="_blank">
                                <img src="../LOGO/setting.png" width="28" height="25" alt="Setting-Logo"/>Settings</a>
                                <hr/>
                                <a href="logot.php" class="lo-drop" >
                                <img src="../LOGO/logout.png" width="28" height="25" alt="wishlist-Logo"/>Logout</a>
                                </div>';
                                } else {
                                    echo '<div class="pic-drop">
                                <a href="" class="lo-drop">
                                <img src="../LOGO/user.svg" width="28" height="25" alt=""/>LogIn</a>
                                <hr/>
                                <a href="" class="lo-drop">
                                <img src="../LOGO/register.png" width="28" height="25" alt=""/>SignIn</a>
                                <hr/>
                                <a href="" class="lo-drop" target="_blank">
                                 width="28" height="25" alt=""/>My Cart</a>
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



    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-6">
                            <center>

                                <a href="" id="change-image">
                                    <?php if ($image == NULL) {
                                        echo '<img class="user-img" id="user-img" src="../LOGO/profile.png" >';
                                    } else {
                                        echo '<img class="user-img" id="user-img" src="../profile_image/' . $image . '">';
                                    } ?>
                                </a>
                                <div class="form-group">
                                    <label id="img-file">Click image to change Profile Pic</label>
                                    <input class="form-control img-file" id="img-file-input" type="file" name="image" /> <!--  style="display: none;"> -->
                                </div>
                            </center>
                        </div>
                    </div>

                    <div class="pading">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Username:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Date of Birth:</label>
                                </div>
                                <div class="col">
                                    <input type="date" name="dob" value="<?php echo $dob; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Address:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="address" value="<?php echo $address; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Email:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="email" value="<?php echo $email; ?>" class="form-control  e-num" readonly>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Number:</label>
                                </div>
                                <div class="col">
                                    <input type="tel" name="number" value="<?php echo $number; ?>" class="form-control  e-num" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Pin code:</label>
                                </div>
                                <div class="col">
                                    <input type="tel" name="pin" value="<?php echo $pin; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>State:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="state" value="<?php echo $state; ?>" class="form-control"  required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>City:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="city" value="<?php echo $city; ?>" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row-last">
                            <div class="row">
                                <div class="col-sm">
                                    <button class="btn btn-success" name="update_profile"><a>Save Profile</a></button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm">
                                    <button class="btn btn-success"><a href="security.php">Update Email & Mobile no.</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer class="footer">
        <ul class="social-icon">
            <li class="social-icon__item">
                <a href="https://x.com/Lucky29886751?t=yRRvd7DQnJ-g-r01fshW1A&s=09" target="_blank"><img class="social-img" src="../LOGO/twitter.png" alt="Twitter" /></a>
            </li>
            &nbsp;&nbsp;
            <li class="social-icon__item">
                <a href="https://instagram.com/lakhvir.singh.lucky?utm_source=qr&igshid=MzNlNGNkZWQ4Mg%3D%3D" target="_blank"><img class="social-img" src="../LOGO/instagram.png" alt="Instagram" /></a>
            </li>
            &nbsp;&nbsp;
            <li class="social-icon__item">
                <a href="https://www.facebook.com/profile.php?id=100033725501635" target="_blank"><img class="social-img" src="../LOGO/facebook.png" alt="Facebook" /></a>
            </li>
            &nbsp;&nbsp;
            <li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info"><img class="social-img" id="Linkedin-Logo" src="../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;
        </ul>

        <ul class="menu-foot">
            <li class="menu__item">
                <a class="menu__link" href="after-log-wlcm.html" target="_blank">Home</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="Readout/about.html" target="_blank">About</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="Readout/contact.html" target="_blank">Contact Us</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="Readout/terms.html" target="_blank">Privacy Policy</a>
            </li>
        </ul>
        <p>&copy;2023 REUSE-PC | All Rights Reserved</p>
    </footer>
</body>

</html>