<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
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

$findresult = mysqli_query($conn, "SELECT * FROM sell WHERE email = '$email'");

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
    $folder = 'profile_image/';
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
        $stmt = mysqli_query($conn, "SELECT image FROM sell WHERE email='$email'");
        $row = mysqli_fetch_array($stmt);
        $deleteimage = $row['pic'];
        unlink($folder . $deleteimage);
        move_uploaded_file($file, $folder . $new_image_name);
        mysqli_query($conn, "UPDATE sell SET image='$new_image_name' WHERE email='$email'");
    }

    // Update all fields
    $result = mysqli_query($conn, "UPDATE sell SET 
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
    <title>REUSE-PC</title>
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
                                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                                    echo '<section id="wlcm">Hello - ' . $res['username'] . '</section>';
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
                                        <a href="all-product.php">
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
                            <input type="search" name="search" id="search" placeholder="Search in REUSE-PC">
                            <input type="submit" value="submit" id="search-submit" class="submit">
                        </li>
                        <div class="prof">
                            <a href="profile.php">
                                <?php
                                $email = $_SESSION["email"];
                                $findresult = mysqli_query($conn, "SELECT * FROM sell WHERE email = '$email'");
                                if ($res = mysqli_fetch_array($findresult)) {
                                    $image          = $res['image'];
                                }
                                if ($image == NULL) {
                                    echo '<img class="profile" id="user-prof-img" src="../LOGO/profile.png" alt="PROFILE PIC" >';
                                } else {
                                    echo '<img class="profile" id="user-prof-img" src="../profile_image/' . $image . '" alt="PROFILE PIC" >';
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
                                    <input class="form-control img-file" id="img-file-input" type="file" name="image" style="display: none;">
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
                                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Date of Birth:</label>
                                </div>
                                <div class="col">
                                    <input type="date" name="dob" value="<?php echo $dob; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>Address:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="address" value="<?php echo $address; ?>" class="form-control">
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
                                    <input type="tel" name="pin" value="<?php echo $pin; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>State:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="state" value="<?php echo $state; ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-3">
                                    <label>City:</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="city" value="<?php echo $city; ?>" class="form-control">
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
            <li class="social-icon__item"><a href="https://www.linkedin.com/in/lakhvir-singh-a6a641286?trk=contact-info" target="_blank"><img class="social-img" id="Linkedin-Logo" src="../logo/Linkedin-Logo.png" alt="Linkedin"></a></li>&nbsp;&nbsp;
        </ul>

        <ul class="menu-foot">
            <li class="menu__item">
                <a class="menu__link" href="after-log-wlcm.php">Home</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="../Readout/about.html">About</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="../Readout/contact.php">Contact Us</a>
            </li>
            <li class="menu__item">
                <a class="menu__link" href="../Readout/terms.html">Privacy Policy</a>
            </li>
        </ul>
        <p>&copy;2023 REUSE-PC | All Rights Reserved</p>
    </footer>
</body>

</html>