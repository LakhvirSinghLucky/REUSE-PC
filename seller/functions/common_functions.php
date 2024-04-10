<?php
//fetch products from database
function getproducts()
{
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    global $conn;
    include("../../../seller/database.php");
    $id = $_SESSION["id"];
    $query = "SELECT * FROM products order by rand()";
    $findresult = mysqli_query($conn, $query);

    while ($res = mysqli_fetch_array($findresult)) {
        $image1          = $res['image1'];
        $title           = $res['title'];
        $subtitle        = $res['subtitle'];
        $price           = $res['price'];
        echo "<div class='elec-card' id='product1'>
              <img src='../../../seller/product_image/" . $image1 . "'alt='Product Image'>
              <h3>" . $title, $subtitle . "</h3>
              <p>₹" . $price . "</p>
              <a href=''>BUY NOW</a>&nbsp;&nbsp;<a href=''>ADD TO CART</a> <br>
              <span>Delivery by 30th Jan</span>
            </div>";
    }
}
?>
//use this to call function
include("../../common_functions/get_products.php");
<?php
// calling function
getproducts();
?>

<?php 
// fetch products for search
function get_products(){
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    global $conn;
    include("../../../seller/database.php");
    $id = $_SESSION["id"];
    $search_data_value="";
    $search_query = "SELECT * FROM products where search_keywords ";
    $findresult = mysqli_query($conn, $query);

    while ($res = mysqli_fetch_array($findresult)) {
        $image1          = $res['image1'];
        $title           = $res['title'];
        $subtitle        = $res['subtitle'];
        $price           = $res['price'];
        echo "<div class='elec-card' id='product1'>
              <img src='../../../seller/product_image/" . $image1 . "'alt='Product Image'>
              <h3>" . $title, $subtitle . "</h3>
              <p>₹" . $price . "</p>
              <a href=''>BUY NOW</a>&nbsp;&nbsp;<a href=''>ADD TO CART</a> <br>
              <span>Delivery by 30th Jan</span>
            </div>";
    }
}
?>