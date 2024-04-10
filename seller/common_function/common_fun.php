
<?php

include '../pages/database.php';

// Function to delete a product from the cart
function deleteProductFromAccount($productId)
{
    global $conn;
    $productId = mysqli_real_escape_string($conn, $productId);
    $query = "DELETE FROM products WHERE id = '$productId'";
    if (mysqli_query($conn, $query)) {
        return true;
    } else {
        return false;
    }
}


function logoutAlert()
{
    if (logoutAlert()) {
        echo 'You have been logged out. Visit again.';
        // header("location:logot.php"); 
    } else
        return false; // Prevents the default action of the anchor tag
}

function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ip = getIPAddress();

function cart()
{
    if (isset($_GET['add-to-cart'])) {
        global $conn;
        $ip = getIPAddress();
        $get_product_id = $_GET['add-to-cart'];
        $query = "SELECT * FROM cart where ip_address='$ip' and product_id='$get_product_id'";
        $selectresult = mysqli_query($conn, $query);
        if (!$selectresult) {
            echo "error: No product is selected/fetched";
        }
        if ($selectresult) {

            if (mysqli_num_rows($selectresult) > 0) {
                echo "<script>alert('This item is already present in the cart'); window.location.href = 'buy--new.php?Product-id=" . $get_product_id . "';</script>";
            } else {
                // Query to add the product to cart
                $insert_query = "INSERT INTO cart (product_id, ip_address, quantity) VALUES (CAST($get_product_id AS UNSIGNED), '$ip', '0')";
                $findresult = mysqli_query($conn, $insert_query);
                if ($findresult) {
                    echo "<script>alert('Item is added to the cart'); window.location.href = 'buy--new.php?Product-id=" . $get_product_id . "';</script>";
                } else {
                    echo "<script>alert('Error: Failed to add item to cart'); window.location.href = 'buy--new.php?Product-id=" . $get_product_id . "';</script>";
                }
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}

//Total no. of items in the cart 
function cart_item_total()
{
    global $conn;
    include '../seller/database.php';
    // Check if the 'add-cart-id' parameter is set
    if (isset($_GET['add-cart-id'])) {
        $ip = getIPAddress();
        $get_product_id = $_GET['add-cart-id'];
        $query = "SELECT * FROM cart WHERE ip_address='$ip'";
    } else {
        $ip = getIPAddress();
        $query = "SELECT * FROM cart WHERE ip_address='$ip'";
    }
    $selectresult = mysqli_query($conn, $query);
    if (!$selectresult) {
        die("Query failed: " . mysqli_error($conn));
    }
    // Retrieve the number of rows
    $count_items = mysqli_num_rows($selectresult);
    return $count_items;
}

//Total price of items in the cart 
function cart_total_price()
{
    global $conn;
    $ip = getIPAddress();
    $total_price = 0;
    $cart_query = "SELECT * FROM cart where ip_address='$ip'";
    $result = mysqli_query($conn, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_products = "SELECT * FROM products where id='$product_id'";
        $result_products = mysqli_query($conn, $select_products);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['price']);
            $product_value = array_sum($product_price);
            $total_price += $product_value;
        }
    }
    echo $total_price;
}
function getproducts()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    global $conn;
    include("../database.php");
    $id = $_SESSION["id"];
    $query = "SELECT * FROM products order by rand()";
    $findresult = mysqli_query($conn, $query);

    while ($res = mysqli_fetch_array($findresult)) {
        $image1          = $res['image1'];
        $title           = $res['title'];
        $subtitle        = $res['subtitle'];
        $price           = $res['price'];
        echo "<div class='elec-card' id='product1'>
        <img src='../product_image/" . $image1 . "'alt='Product Image'>
        <h3>" . $title, $subtitle . "</h3>
        <p>₹" . $price . "</p>
        <a href=''>BUY NOW</a>&nbsp;&nbsp;<a href=''>ADD TO CART</a> <br>
        <span>Delivery by 30th Jan</span>
        </div>";
    }
}
function search()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    global $conn;
    include("database.php");
    $id = $_SESSION["id"];
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $query = "SELECT * FROM products where search_keywords like '%$search_data_value%'";
        $findresult = mysqli_query($conn, $query);

        while ($res = mysqli_fetch_array($findresult)) {
            $image1          = $res['image1'];
            $title           = $res['title'];
            $subtitle        = $res['subtitle'];
            $price           = $res['price'];
            echo "<div class='elec-card' id='product1'>
            <img src='../product_image/" . $image1 . "'alt='Product Image'>
            <h3>" . $title, $subtitle . "</h3>
            <p>₹" . $price . "</p>
            <a href=''>BUY NOW</a>&nbsp;&nbsp;<a href=''>ADD TO CART</a> <br>
            <span>Delivery by 30th Jan</span>
            </div>";
        }
    }
}

//Remove the item in the cart 
function remove_cart_item()
{
    global $conn;
    $ip_address = getIPAddress();
    $itemToRemove = $_GET['remove'];
    $query = "SELECT p.* FROM products p INNER JOIN cart c ON p.id = c.product_id WHERE c.ip_address='$ip_address'";

    $del_query = "DELETE FROM cart WHERE product_id = $itemToRemove";
}

?>  