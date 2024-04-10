<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REUSE-PC</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <link rel="stylesheet" href="../css/add-product.css" />
</head>
<?php
include 'database.php';

$sel = "SELECT * FROM sell";
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
                if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                  echo '<section id="wlcm">Hello - ' . $result['username'] . '</section>';
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
      </div>
    </div>
  </div>
    <!--Navbar-end-->

    <?php
    include 'database.php';
    $email= $_SESSION['email'];
    $query = "SELECT id FROM sell WHERE email = '$email'";
$result = $conn->query($query);

    // Fetch seller ID
    $row = $result->fetch_assoc();
    $seller_id = $row["id"];

    if (isset($_POST['submit'])) {

        $categories         = $_POST['categories'];
        $search_keywords    = $_POST['search_keywords'];
        $title              = $_POST['title'];
        $subtitle           = $_POST['subtitle'];
        $description        = $_POST['description'];
        $price              = $_POST['price'];
        $old_price          = isset($_POST['old_price']) ? $_POST['old_price'] : null;
        $status             = implode(",", $_POST['status']); // Convert array to comma-separated string
        $image1             = $_FILES['image1']['name'];
        // $image2             = $_FILES['image2']['name'];
        // $image3             = $_FILES['image3']['name'];
        // Move uploaded files to a directory
        $upload_dir = "product_image/";
        move_uploaded_file($_FILES['image1']['tmp_name'], $upload_dir . $image1);
        // move_uploaded_file($_FILES['image2']['tmp_name'], $upload_dir . $image2);
        // move_uploaded_file($_FILES['image3']['tmp_name'], $upload_dir . $image3);

        // Insert data into the database
        $query = "INSERT INTO products (customer_id, categories, search_keywords, title, subtitle, image1, description, price, old_price, status) 
              VALUES ('$seller_id', '$categories','$search_keywords', '$title', '$subtitle', '$image1', '$description', '$price', '$old_price', '$status')";

        if (mysqli_query($conn, $query)) {
            echo '<script>alert("Product added successfully \u{1F60A}"); window.location.href = "add-product.php";</script>';
            exit();
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($conn);
        }
    }
  
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <h1 class="title-add">Add Product</h1>

        <label for="categories">Categories</label>
        <select id="categories" name="categories" required>
            <option value="" selected>Choose the Category</option>
            <option value="Renewed Accessories">Renewed Accessories</option>
            <option value="Gaming & Toys">Gaming & Toys</option>
            <option value="Apple Accessories">Apple Accessories</option>
            <option value="Computer & Accessories">Computer & Accessories</option>
            <option value="Electronical Accessories">Electronical Accessories</option>
            <option value="Robotics & Sensors">Robotics & Sensors</option>
            <option value="Mobile & Accessories">Mobile & Accessories</option>
            <option value="Software & Hardware">Software & Hardware</option>
            <option value="Personal Health & Grooming">Personal Health & Grooming</option>
            <option value="Echo & Fire TV">Echo & Fire TV</option>
            <option value="Home Appliances">Home Appliances</option>
            <option value="Mobiles & Accessories">Mobiles & Accessories</option>
            <option value="Car & Motorbike">Car & Motorbike</option>
            <option value="Power Tools">Power Tools</option>
            <option value="Games & Toys">Games & Toys</option>
            <option value="Apple Accessories">Apple Accessories</option>
        </select>

        <label for="title">Title (Max Character-20)</label>
        <input type="text" id="title" maxlength="20" minlength="3" name="title" required>

        <label for="subtitle">Subtitle (Max Character-30)</label>
        <input type="text" id="subtitle" maxlength="31" minlength="3" name="subtitle" required>

        <label for="image1">Image</label>
        <input type="file" id="image1" name="image1" required accept=".jpeg, .jpg, .png, .gif" required>

        <!-- <label for="image2">Sub-Image 1</label>
        <input type="file" id="image2" name="image2" accept=".jpeg, .jpg, .png, .gif">

        <label for="image3">Sub-Image 2</label>
        <input type="file" id="image3" name="image3" accept=".jpeg, .jpg, .png, .gif"> -->

        <label for="description">Description</label>
        <textarea id="description" name="description" required></textarea>

        <label for="price">Price</label>
        <input type="text" id="price" name="price" required>

        <label for="old_price">Old Price</label>
        <input type="text" id="old_price" name="old_price">

        <label for="search_keywords">Search Keywords (Keywords for search during user search something)</label>
        <input type="text" id="search_keywords" name="search_keywords" required>

        <label>Status</label><br>
        In Stock&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="instock" name="status[]" value="instock"><br><br>
        Out of Stock&nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" id="outofstock" name="status[]" value="outofstock"><br><br><br>

        <button type="submit" name="submit" id="submit" value="Save">Submit</button>
        <button type="reset" name="reset" id="resett" value="Reset">Reset</button>
    </form>
</body>

</html>