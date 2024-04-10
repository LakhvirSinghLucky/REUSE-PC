<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Delivery Address</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <link rel="stylesheet" href="../css/delivery.css">
</head>

<body>
    <div class="location-settings">
        <h1>Choose your location</h1>
        <p>Select a delivery location to see product availability and delivery options</p>
        <p>Default address:</p>
        <?php
        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        session_start();

        include("database.php");
        $email = $_SESSION["email"];

        $query = "SELECT customer_id, username FROM registration WHERE email = '$email'";
        $result = $conn->query($query);
        $row = $result->fetch_assoc();
        $cusom_id  = $row["customer_id"];
        $user_name  = $row["username"];

        // Check if the user has already added two addresses
        $query_check = "SELECT COUNT(*) AS address_count FROM user_delivery WHERE customer_id='$cusom_id'";
        $result_check = mysqli_query($conn, $query_check);
        $row_check = mysqli_fetch_assoc($result_check);
        $address_count = $row_check['address_count'];

        // if ($address_count >= 2) {
        //     // Display message if the user has already added two addresses
        //     echo "<script>alert('You cannot add more than two addresses.');</script>";
        // } else {
            if (isset($_POST['submit'])) {
                $address          = $_POST["address"];
                $state            = $_POST["state"];
                $city             = $_POST["city"];
                $pin              = $_POST["pin"];
                $nearby           = $_POST['nearby'];
                $building_no      = $_POST['build_no'];

                $query = "INSERT INTO user_delivery VALUES ('','$cusom_id','$address','$state','$pin','$city','$nearby','$building_no')";
                $result = mysqli_query($conn, $query);
                if ($result) {
                    header("location:after-log-wlcm.php?profile_updated=1");
                    exit();
                } else {
                    echo '<script>alert("Error address not get insert."); window.location.href = "delivery.php?username=' . $user_name . '";</script>';
                    exit();
                }
            }
        // }
        $query_2 = "SELECT * FROM user_delivery WHERE customer_id='$cusom_id'";
        $findresult = mysqli_query($conn, $query_2);

        if ($findresult) {
            if (mysqli_num_rows($findresult) > 0) {
                while ($res = mysqli_fetch_array($findresult)) {
                    $address = $res['address'];
                    $city = $res['city'];
                    $state = $res['state'];
                    $pin = $res['pin'];
                    $id = $res['id'];
                    $nearby = $res['nearby'];
                    $build_no = $res['building_no'];

                    echo "<div class='address'>
                        <h2>" . $user_name . ",&nbsp;" . $address . "</h2>
                        <p>" . $city . "<br>" . $state . "" . $pin . "&nbsp;Near" . $nearby . "<br>Building no." . $build_no . "</p>
                      </div>";
                }
            } else {
                echo "<div class='address'>
            <h2>Please add the delivery address!!</h2>
            <p>Address is must!!</p>
          </div>";
            }
        } else {
            echo "Error: " . mysqli_error($conn);
        }
        ?>
        <div class="input-group">
            <a href="#" id="openDeliveryForm">Add new address or pick-up point</a>
        </div>
    </div>

    <div class="container" id="deliveryForm">
        <h1>Delivery</h1>
        <form method="POST" action="">
            <div class="address common">
                <label>Address:</label>
                <textarea rows="2" cols="58" placeholder="Enter your full address..." name="address" id="address" required></textarea>
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
    <script>
        document.getElementById("openDeliveryForm").addEventListener("click", function(event) {
            if (<?php echo $address_count; ?> >= 2) {
                alert('You cannot add more than two addresses.');
            } else {
                event.preventDefault();
                var deliveryForm = document.getElementById("deliveryForm");
                deliveryForm.style.display = "flex";
            }
        });
    </script>
</body>

</html>