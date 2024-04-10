<?php

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

function cart_item_elec()
{
    global $conn;
// include 'd:\Lucky\PHP\xampp\htdocs\php01\seller\database.php';
include '../../../seller/database.php';
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
?>