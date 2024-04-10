
<?php

include '../../seller/pages/database.php';

// Function to delete a product from the cart
function deleteProductFromCart($productId)
{
    global $conn;
    $productId = mysqli_real_escape_string($conn, $productId);
    $query = "DELETE FROM cart WHERE product_id = '$productId'";
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
        $query = "SELECT * FROM cart where  product_id='$get_product_id'";
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
include("database.php"); 

if(isset($_SESSION["email"])) {

    $email = $conn->real_escape_string($_SESSION["email"]);

    $query_signup = "SELECT customer_id FROM registration WHERE email = '$email'";
    
    $result_signup = $conn->query($query_signup);

    if ($result_signup) {
        if ($result_signup->num_rows > 0) {
            // Fetch the first row
            $row_signup = $result_signup->fetch_assoc();
            $customer_id = $row_signup["customer_id"];

            include("../../seller/pages/database.php"); 
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

// function cart_item_total()
// {
//     global $conn;
//     include '../../seller/pages/database.php';

//     $get_product_id = $_GET['add-cart-id'];
//     $query = "SELECT * FROM cart WHERE ip_address='$ip'";

//     $selectresult = mysqli_query($conn, $query);
//     if (!$selectresult) {
//         die("Query failed: " . mysqli_error($conn));
//     }
//     $count_items = mysqli_num_rows($selectresult);
//     return $count_items;
// }

//Total price of items in the cart 
function cart_total_price()
{
     include "database.php";

    if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
        // Get the customer ID of the logged-in user
        $email = $_SESSION["email"];
        $query = "SELECT customer_id FROM registration WHERE email = '$email'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $customer_id = $row["customer_id"];

            // Initialize total price
            $total_price = 0;
            include "../../seller/pages/database.php";

            // Fetch product IDs from the cart table for the logged-in user
            $cart_query = "SELECT product_id FROM cart WHERE customer_id = '$customer_id'";
            $cart_result = $conn->query($cart_query);

            if ($cart_result->num_rows > 0) {
                // Loop through each product in the cart
                while ($cart_row = $cart_result->fetch_assoc()) {
                    $product_id = $cart_row["product_id"];

                    // Retrieve price for the product from the products table
                    $price_query = "SELECT price FROM products WHERE id = '$product_id'";
                    $price_result = $conn->query($price_query);

                    if ($price_result->num_rows > 0) {
                        $price_row = $price_result->fetch_assoc();
                        $product_price = $price_row["price"];
                        // Check if the product price is numeric
                        if (is_numeric($product_price)) {
                            // Add product price to total price
                            $total_price += $product_price;
                        } else {
                            // Handle non-numeric price (optional)
                            echo "Warning: Non-numeric price encountered for product ID: $product_id";
                        }
                    }
                }
                // Output total price
                echo number_format($total_price, 2);
            } else {
                echo "0.00";
            }
        } else {
            echo "Customer ID not found.";
        }
    } else {
        echo "User not logged in.";
    }
    // &#8377;
    //     include("database.php");
    //     $email = $_SESSION["email"];
    //     include'../../seller/database.php';
    //  $query = "SELECT product_id FROM cart WHERE customer_id = '$email'";
    //  $result = $conn->query($query);

    //  $row = $result->fetch_assoc();
    //  $custom_id = $row["customer_id"];
    // global $conn;
    // $ip = getIPAddress();
    // $total_price = 0;
    // $cart_query = "SELECT * FROM cart WHERE ip_address='$ip'";
    // $result = mysqli_query($conn, $cart_query);
    // while ($row = mysqli_fetch_array($result)) {
    //     $product_id = $row['product_id'];
    //     $quantity = $row['quantity'];
    //     $select_products = "SELECT price FROM products WHERE id='$product_id'";
    //     $result_products = mysqli_query($conn, $select_products);
    //     if ($row_product_price = mysqli_fetch_array($result_products)) {
    //         $product_price = $row_product_price['price'];
    //         $total_price += $product_price * $quantity; // Adjust total price calculation
    //     }
    // }
    // return $total_price;
}

// function cart_total_price()
// {
//     global $conn;
//     $ip = getIPAddress();
//     $total_price = 0;
//     $cart_query = "SELECT * FROM cart where ip_address='$ip'";
//     $result = mysqli_query($conn, $cart_query);
//     while ($row = mysqli_fetch_array($result)) {
//         $product_id = $row['product_id'];
//         $select_products = "SELECT * FROM products where id='$product_id'";
//         $result_products = mysqli_query($conn, $select_products);
//         while ($row_product_price = mysqli_fetch_array($result_products)) {
//             $product_price = array($row_product_price['price']);
//             $product_value = array_sum($product_price);
//             $total_price += $product_value;
//         }
//     }
//     echo $total_price;
// }
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