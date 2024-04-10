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

// function cart_item_elec()
// {
//     global $conn;
// // include 'd:\Lucky\PHP\xampp\htdocs\php01\seller\database.php';
// include '../../../seller/pages/database.php';
//     // Check if the 'add-cart-id' parameter is set
//     if (isset($_GET['add-cart-id'])) {
//         $ip = getIPAddress();
//         $get_product_id = $_GET['add-cart-id'];
//         $query = "SELECT * FROM cart WHERE ip_address='$ip'";
//     } else {
//         $ip = getIPAddress();
//         $query = "SELECT * FROM cart WHERE ip_address='$ip'";
//     }
//     $selectresult = mysqli_query($conn, $query);
//     if (!$selectresult) {
//         die("Query failed: " . mysqli_error($conn));
//     }
//     // Retrieve the number of rows
//     $count_items = mysqli_num_rows($selectresult);
//     return $count_items;
// }


//Total no. of items in the cart 
function cart_item_elec()
{
include '../../pages/database.php';

if(isset($_SESSION["email"])) {

    $email = $conn->real_escape_string($_SESSION["email"]);

    $query_signup = "SELECT customer_id FROM registration WHERE email = '$email'";
    
    $result_signup = $conn->query($query_signup);

    if ($result_signup) {
        // Check if there are any rows returned
        if ($result_signup->num_rows > 0) {
            // Fetch the first row
            $row_signup = $result_signup->fetch_assoc();
            $customer_id = $row_signup["customer_id"];

            include("../../../seller/pages/database.php"); 
            $query_cart = "SELECT COUNT(*) AS cart_count FROM cart WHERE customer_id = '$customer_id'";
    
            // Execute the query
            $result_cart = $conn->query($query_cart);

            // Check if query was successful
            if ($result_cart) {
                // Fetch the result
                $row_cart = $result_cart->fetch_assoc();
                $cart_count = $row_cart["cart_count"];

                // Output the result
                echo $cart_count;
            } else {
                // Handle query execution error for cart table
                echo "Error executing cart query: " . $conn->error;
            }
        } else {
            // Handle case where no matching email found in signup database
            echo "No customer found with this email in signup database.";
        }
    } else {
        // Handle query execution error for signup database
        echo "Error executing signup query: " . $conn->error;
    }
} else {
    // Handle case where email session variable is not set
    echo "Email session variable not set.";
}
}

?>