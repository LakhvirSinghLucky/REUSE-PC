<?php
session_start();
include '../common_functions/common_fun.php';
getIPAddress();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REUSE-PC</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" sizes="132x132" />

    <link rel="stylesheet" href="../css/buy.css" />
</head>
<?php
include 'database.php';
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
                                        <a href="wishlist.html" target="_blank">
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
                                                    <a class="category-item" href="Gadgets/Electronics/electronics.php" target="_blank">Electronics</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="Gadgets/Robotics/Robotics & Sensors.php" target="_blank">Robotics & Sensors</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="Gadgets/Computer/Computer & Accessories.php" target="_blank">Computer &
                                                        Appliances</a>
                                                </li>
                                                <hr />
                                                <li>
                                                    <a href="Gadgets/Electronics/mobile accessories.php" target="_blank">Mobile & Accessories</a>
                                                </li>
                                                <hr />
                                                <li><a href="view-cat.php" target="_blank">View all Categories</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <li class="drop-li">
                                        <a href="" target="_blank">
                                            <img src="../LOGO/box.png" width="28" height="25" /><b>Sell Your Products</b></a>
                                    </li>
                                    <hr />
                                </ul>
                            </div>
                        </li>
                        <li class="contact">
                            <a href="readout/contact.php" target="_blank">
                                <img class="icon" src="../LOGO/customer-service.png" width="28" height="25" />CONTACT</a>
                        </li>
                        <li class="faq">
                            <a href="Readout/faq.php" target="_blank">
                                <img class="icon" src="../LOGO/faq.png" width="28" height="25" />FAQ</a>
                        </li>
                        <li class="about">
                            <a href="readout/about.html" target="_blank">
                                <img class="icon" src="../LOGO/about.png" width="28" height="25" />ABOUT</a>
                        </li>
                    </ul>
                </div>

                <div class="search">
                    <ul class="search-flex">
                        <li id="search-bar">
                            <form class="form" <?php
                                                include("../../seller/pages/database.php");
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
                            <a href="profile.php" class="profile" target="_blank">
                                <?php
                                include 'database.php';

                                // $email = $_SESSION["email"];
                                // $query = "SELECT customer_id FROM registration WHERE email = '$email'";
                                // $result = $conn->query($query);
                    
                                // if ($result->num_rows > 0) {
                                //   $row = $result->fetch_assoc();
                                //   $customer_id = $row["customer_id"];
                                // }

                                $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
                                if (!empty($email)) {
                                    $findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
                                    if ($res = mysqli_fetch_array($findresult)) {
                                        $image = $res['image'];
                                        $customer_id = $res["customer_id"];
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
                                        <img src="../LOGO/useradd.svg" id="user-img" class="profile" alt="PROFILE PIC" width="45px" /></a>';
                                }
                                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

                                    echo '<div class="pic-drop">
                                        <a href="" target="_blank" class="lo-drop">
                                        <img src="../LOGO/flag.png" width="28" height="25" alt="BHARAT-Logo"/>BHARAT</a>
                                        <hr/>
                                        <a href="cart.php?customerid='. $customer_id .'" target="_blank" class="lo-drop">
                                        <img src="../LOGO/shopping-cart.png" width="28" height="25" alt="Cart-Logo" /><sup id="cart_no.sup">'?>
                                        <?php echo cart_item_total(); ?><?php echo '</sup>My Cart</a>
                                        <hr />
                                        <a href="" target="_blank" class="lo-drop">
                                        <img src="../LOGO/location.png" width="28" height="25" alt="Delivery-Logo"/>Delivery</a>
                                        <hr/>
                                        <a href="" target="_blank" class="lo-drop">
                                        <img src="../LOGO/languages.png" width="28" height="25" alt="Lang-Logo"/>Language</a>
                                        <hr/>
                                        <a href="" target="_blank" class="lo-drop">
                                        <img src="../LOGO/setting.png" width="28" height="25" alt="Setting-Logo"/>Settings</a>
                                        <hr/>
                                        <a href="logot.php"  class="lo-drop">
                                        <img src="../LOGO/logout.png" width="28" height="25" alt="wishlist-Logo"/>Logout</a>
                                        </div>';
                                } else {
                                    echo '<div class="pic-drop">
                                        <a href="" class="lo-drop" >
                                        <img src="../LOGO/user.svg" width="28" height="25" alt=""/>LogIn</a>
                                        <hr/>
                                        <a href="" class="lo-drop">
                                        <img src="../LOGO/register.png" width="28" height="25" alt=""/>SignIn</a>
                                        <hr/>
                                        <a href="" class="lo-drop">
                                        <img src="../LOGO/shopping-cart.png" width="28" height="25" alt=""/>My Cart</a>
                                        <hr/>
                                        <a href="" class="lo-drop">
                                        <img src="../LOGO/wishlist.png" width="28" height="25" alt=""/>Wishlist</a>
                                        <hr/>
                                        <a href="" class="lo-drop">
                                        <img src="../LOGO/languages.png" width="28" height="25" alt=""/>Language</a>
                                        <hr/>
                                        <a href="" class="lo-drop">
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
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include("database.php");
    $email = $_SESSION["email"];
    $query = "SELECT customer_id FROM registration WHERE email = '$email'";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();
    $custom_id = $row["customer_id"];

    if (isset($_GET['Product_id'])) {
        $product_id = $_GET['Product_id'];
        include("../../seller/pages/database.php");
        $query = "SELECT * FROM products where id='$product_id'";
        $findresult = mysqli_query($conn, $query);

        if ($findresult) {

            if (mysqli_num_rows($findresult) > 0) {

                while ($res = mysqli_fetch_array($findresult)) {
                    $image1         = $res['image1'];
                    $image2         = $res['image2'];
                    $image3         = $res['image3'];
                    $title          = $res['title'];
                    $subtitle       = $res['subtitle'];
                    $price          = $res['price'];
                    $old_price      = $res['old_price'];
                    $description    = $res['description'];

                    echo "<div class='grid'>
                <div class='photos-prod'>
                    <div class='product-img-size'><img src='../../seller/product_image/" . $image1 . "' class='prod-image' id='image1' alt='image1'></div>
                </div>
                <div class='product-detail'>
                    <pre id='txt-product'>
            <h3>" . $title . "</h3>
            <hr class='hr' id='hr1'>
            <h4>" . $subtitle . "</h4>
            <span><b>&#8377;" . $price . "</b>&nbsp;&nbsp;<h5 id='mrp'>MRP &#8377;" . $old_price . "</h5>
            <s id='off-27%'> 27% OFF </s>
            </span>
            <s id='ioat'>   Inclusive of all taxes </s></pre>
                    <div class='product-color'>
                        <s class='under-var'>SELECT COLOR</s>
                        <p class='circle-product-color circle-product-color-black '></p><s
                            class='color-title-13-i'>Black</s>
                        <p class='circle-product-color circle-product-color-red'></p><s class='color-title-13-i'>RED</s>
                        <p class='circle-product-color circle-product-color-blue'></p><s
                            class='color-title-13-i'>BLUE</s>
                        <p class='circle-product-color circle-product-color-white'></p><s
                            class='color-title-13-i'>WHITE</s>
                    </div>
                    <div class='product-size'><s class='under-var'>SELECT VARIENT</s>
                        <p id='circle-product-size'>4GB, 64GB</p>
                        <p id='circle-product-size'>4GB, 128GB</p>
                    </div>
                    <div class='buy-cart-button'>
                        <a href='pay.php?product_id=" . $product_id . "&customer_id=" . $custom_id . "' class='buy-cart-btn'>Buy Now</a>
                       <form class='form-action' action='' method='post'>
                       <a name='' href='buy--new.php?Product_id=" . $product_id . "' >
                       <input type='submit' id='form-action' name='cart_add' value='Add to Cart'></a>
                       </form> 
                        
                        <img src='../logo/wishlist.png' alt='Wishlist' id='wishlist'>
                    </div>
                </div>

                <div class='del-ver'>
                    <div class='delivery'>
                        <s id='deli-font'>DELIVERY</s>
                        <div class='input-pin'>
                            <input type='text' name='pincode' id='product-pincode' placeholder='Enter the Pincode'>
                        </div>
                        <div class='delivery-policies'>
                            <div class='deli-poli'><img src='../logo/delivery.png' class='del-o-img'>Free Shipping</div>
                            <div class='deli-poli' id='day-7'><img src='../logo/order.png' class='del-o-img' alt='Box'>7
                                Days Easy Return</div>
                            <div class='deli-poli'><img src='../logo/assured quality.jpg' class='del-o-img'
                                    alt='Assured Quality'>Assured Quality</div>
                            <div class='deli-poli'><img src='../logo/box.png' class='del-o-img' alt='COD Available'>COD
                                Available</div>
                        </div>
                    </div>
                    <div class='delivery-faq'>
                        <hr class='hr' id='hr-1'>
                        <div class='maintenance main-faq+'>
                            MAINTENANCE <B class='float-end'>+</B>
                        </div>
                        <hr class='hr' id='hr-2'>
                        <div class='delivery&return main-faq+'>
                            DELIVERY & RETURNS<B class='float-end'>+</B>
                        </div>
                        <hr class='hr' id='hr-3'>
                        <DIV class='PRODUCT-FAQ main-faq+'>
                            PRODUCT-FAQ'S<B class='float-end'>+</B>
                        </DIV>
                        <hr class='hr' id='hr-4'>
                        <DIV class='queries main-faq+'>
                            ANY OTHER QUERY<B class='float-end'>+</B>
                        </DIV>
                        <hr class='hr' id='hr-5'>
                    </div>
                </div>
            </div>

            <center class='description'>
                <div id='desc-flex'>
                    <h3>Description</h3>
                    <h3>Review</h3>
                </div>
                <div class='content-dec-flex'>
                    <h5 class='desc-display'>" . $description . "</h5>
                    <h5 class='review-display'></h5>
                </div>
            </center>";
                }
            } else {
                echo "Product not found";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Product-id not provided at fetch";
        print_r($_GET);
    }

    include "../material/HTML/footer.html";

    $getip = getIPAddress();

    // include 'database.php';
    // $email = $_SESSION["email"];
    // $query = "SELECT customer_id FROM registration WHERE email = '$email'";
    // $result = $conn->query($query);

    // $row = $result->fetch_assoc();
    // $custom_id = $row["customer_id"];

    // include '../../seller/pages/database.php';
    // // getIPAddress();

    // if (isset($_GET['Product_id'])) {
    //     // $ip = getIPAddress();
    //     var_dump($_GET);
    //     $get_product_id = $_GET['Product_id'];
    //     $query = "SELECT * FROM cart where customer_id='$custom_id' and product_id='$get_product_id'";
    //     $selectresult = mysqli_query($conn, $query);
    //     if (!$selectresult) {
    //         echo "error: No product is selected/fetched";
    //     }
    //     if ($selectresult) {

    //         if (mysqli_num_rows($selectresult) > 0) {
    //             echo "<script>alert('This item is already present in the cart'); window.location.href = 'buy--new.php?Product-id=" . $get_product_id . "&customerid=" . $custom_id . "';</script>";
    //         } else {
    //             // Query to add the product to cart
    //             $insert_query = "INSERT INTO cart VALUES ('$get_product_id', '$ip', '1','$custom_id')";
    //             $findresult = mysqli_query($conn, $insert_query);
    //             if ($findresult) {
    //                 echo "<script>alert('Item is added to the cart'); window.location.href = 'buy--new.php?Product-id=" . $get_product_id . "&customerid=" . $custom_id . "';</script>";
    //             } else {
    //                 echo "<script>alert('Error: Failed to add item to cart- " . mysqli_error($conn) . "'); window.location.href = 'buy--new.php?Product-id=" . $get_product_id . "&customerid=" . $custom_id . "';</script>";
    //             }
    //         }
    //     } else {
    //         echo "Error: " . mysqli_error($conn);
    //     }
    // }
    if (isset($_POST['cart_add'])) {
    
    include("database.php");
    $email = $_SESSION["email"];
    $query = "SELECT customer_id FROM registration WHERE email = '$email'";
    $result = $conn->query($query);

    $row = $result->fetch_assoc();
    $custom_id = $row["customer_id"];

    if (isset($_GET['Product_id'])) {

        $Product_id = $_GET['Product_id'];

        include '../../seller/pages/database.php';
        $check_query = "SELECT customer_id FROM products where id = '$Product_id'";
        $result = $conn->query($check_query);
        $row = $result->fetch_assoc();
        $seller_id = $row["customer_id"];
        // $query = "SELECT id FROM  where ";
        // $result = $conn->query($query);
    
        // $row = $result->fetch_assoc();
        // $seller_id = $row["id"];

        $check_query = "SELECT * FROM cart WHERE product_id = '$Product_id' AND customer_id = '$custom_id'";
        // $check_result = mysqli_query($conn, $check_query);
        $check_result = mysqli_query($conn, $check_query) or die(mysqli_error($conn));

        if (mysqli_num_rows($check_result) > 0) {

            echo "<script>alert('This item is already present in the cart'); window.location.href = 'buy--new.php?Product_id=" . $Product_id . "&customerid=" . $custom_id . "';</script>";
            // echo "Product is already in the cart.";
        } else {
            
            // $check_query = "SELECT * FROM products WHERE customer_id = '$seller_id'";
            // $result = $conn->query($check_query);
    
            // $row = $result->fetch_assoc();
            // // $custom_id = $row["customer_id"];
            // $prod_id = $row["id"];
            include '../../seller/pages/database.php';

            $insert_query = "INSERT INTO cart VALUES ('','$Product_id','$seller_id','$custom_id','1')";
            $insert_result = mysqli_query($conn, $insert_query);

            if ($insert_result) {

                    echo "<script>alert('Item is added to the cart'); window.location.href = 'buy--new.php?Product_id=" . $Product_id . "&customerid=" . $custom_id . "';</script>";
                // echo "Product added to cart successfully.";
            } else {
                echo "Error ??: " . mysqli_error($conn);
            }
        }
    } else {
        echo "<script>alert('Error: Failed to add item in cart- " . mysqli_error($conn) . "'); window.location.href = 'buy--new.php?Product_id=" . $Product_id . "&customerid=" . $custom_id . "';</script>";
        // echo "Product_id not provided.";
    }
}
    ?>
</body>

</html>