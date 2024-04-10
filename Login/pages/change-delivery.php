<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Change Delivery Address</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <link rel="stylesheet" href="../css/delivery.css">
    <style>
        div#deliveryForm {
    display: block;
}
    </style>
</head>

<body>
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();

include("database.php");

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Retrieve customer ID from the URL
    $user_id = $_GET['customer_id'];
    $user_address_id = $_GET["id"];
    // Retrieve form data
    $address = $_POST["address"];
    $state = $_POST["state"];
    $city = $_POST["city"];
    $pin = $_POST["pin"];
    $nearby = $_POST['nearby'];
    $building_no = $_POST['build_no'];

    // Prepare update query
    $query = "UPDATE user_delivery SET address='$address', state='$state', city='$city',
     pin='$pin', nearby='$nearby', building_no='$building_no' WHERE id='$user_address_id'";

    // Execute the update query
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Redirect to payment page with a success message
        header("location:buy--new.php?profile_updated=1");
        exit();
    } else {
        // Redirect back to delivery page with an error message
        echo '<script>alert("Error: Address could not be updated."); window.location.href = "delivery.php";</script>';
        exit();
    }
} else {
    // If the form is not submitted, display an error message
    echo "Error: Form submission failed.";
}
    // include("database.php");
    // $email = $_SESSION["email"];

    // if (isset($_POST['submit'])) {
    //     $address          = $_POST["address"];
    //     $state            = $_POST["state"];
    //     $city             = $_POST["city"];
    //     $pin              = $_POST["pin"];
    //     $nearby           = $_POST['nearby'];
    //     $building_no      = $_POST['build_no'];

    //     $query = "INSERT INTO user_delivery VALUES ('','$cusom_id','$address','$state','$pin','$city','$nearby','$building_no')";
    //     $result = mysqli_query($conn, $query);
    //     if ($result) {
    //         header("location:pay.php?profile_updated=1");
    //         exit();
    //     } else {
    //         echo '<script>alert("Error address not get insert."); window.location.href = "delivery.php";</script>';
    //         exit();
    //     }
    // } else {
    //     echo "Error: " . mysqli_error($conn);
    // }
    ?>
    <div class="container" id="deliveryForm">
        <h1>Delivery</h1>
        <form method="POST" action="">
            <div class="address common">
                <label>Address:</label>
                <textarea rows="1" cols="58" placeholder="Enter your full address..." name="address" id="address" required></textarea>
            </div>
            <div class="state common">
                <label>State:</label>
                <input type="text" maxlength="100" minlength="3" name="state" id="state" placeholder="Enter your State" required>
            </div>
            <div class="city common">
                <label> City:</label>
                <input type="text" maxlength="100" minlength="3" name="city" id="city" placeholder="Enter your City" required>
            </div>
            <div class="pin common">
                <label> Pin Code:</label>
                <input type="tel" name="pin" id="pin" maxlength="06" pattern="[0-9]{06}" placeholder="Enter your Pin Code" required>
            </div>
            <div class="email common">
                <label for="email">Nearby:</label>
                <input type="text" maxlength="100" minlength="5" placeholder="Enter nearby buildings" name="nearby" id="nearby" required>
            </div>
            <div class="email common">
                <label for="email">Building no.</label>
                <input type="text" maxlength="100" minlength="2" placeholder="Enter no. of building or house" name="build_no" id="build_no" required>
            </div>
            <div class="submit0">
                <button type="submit" name="submit" value="submit" id="submit">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>