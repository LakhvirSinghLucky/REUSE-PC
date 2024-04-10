<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Check if user is logged in
if (!isset($_SESSION["email"]) || empty($_SESSION["email"])) {
    // Redirect to login page or display error message
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <title>Payment Method</title>
    <style>
        /* styles.css */
        .center-data {
            font-size: 14px;
            font-family: system-ui;
        }

        .order-summary {
            left: 48em;
            width: 300px;
            border: 1px solid #ccc;
            padding: 20px;
            position: absolute;
            top: 29em;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .order-summary-header {
            margin-bottom: 20px;
        }

        .order-summary-header h2 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
        }

        .order-summary-items {
            margin-bottom: 20px;
        }

        .order-summary-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .order-summary-item span:first-child {
            font-weight: bold;
        }

        .order-summary-total {
            font-size: 20px;
            font-weight: bold;
            border-top: 1px solid #ccc;
            padding-top: 10px;
            margin-top: 20px;
        }

        h1#check {
            margin-top: 0;
            font-size: 5vh;
            text-decoration: underline;
        }

        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-image: url('LOGO/desk.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        .option-lat {
            display: flex;
            flex-wrap: wrap;
            align-items: baseline;
        }

        img.Pc-logo {
            width: 100%;
            box-shadow: 0px -8px 15px 17px rgba(0, 0, 0, 0.1);
        }

        .top-ader {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        img.card-logo {
            width: 4em;
        }

        .rsion {
            display: flex;
            align-items: baseline;
        }

        .option {
            display: flex;
            flex-wrap: wrap;
            align-items: baseline;
        }

        .option.rsion {
            display: flex;
            flex-direction: column;
        }

        /* Container for the form */
        .payment-method {
            max-width: 48em;
            margin: 10px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 12px 15px 17px rgba(0, 0, 0, 0.1);
        }

        /* Form labels */
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 8px;
        }

        /* Input fields */
        input[type="text"],
        input[type="tel"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Submit button */
        button[type="submit"] {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Card logos */
        .card-logos {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
        }

        /* Net banking dropdown */
        .netbanking-dropdown {
            margin-bottom: 15px;
        }

        /* Responsive adjustments */
        @media screen and (max-width: 480px) {
            .payment-method {
                max-width: 100%;
            }
        }

        a.button {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a.button:hover {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <img src="../logo/pc3.png" alt="Pc-logo" class="Pc-logo">
    <div class="payment-method">
        <center>
            <h1 id="check">Checkout</h1>
        </center>
        <div class="top-ader">
            <h2>Delivery Address:</h2>
            <?php
            include("database.php");

            $email = $_SESSION["email"];

            $query = "SELECT customer_id, username FROM registration WHERE email = '$email'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $cusom_id  = $row["customer_id"];
            $user_name  = $row["username"];
            // Check if customer_id is provided in the URL
            // if (isset($_GET['customer_id'])) {
            // Get the customer_id from the URL
            // $user_id = $_GET['customer_id'];
            // Query to fetch user delivery addresses based on customer_id
            $query = "SELECT * FROM user_delivery WHERE customer_id='$cusom_id'";
            $findresult = mysqli_query($conn, $query);

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

                        echo "<div class='center-data'>" .
                        "<input type='radio' ' name='selected_address' value=''>" .
                        "<label for='address'>" .
                        $user_name . "<br>" . $address . "<br>" . $city . "<br>" . $state . "" . $pin . "<br>" . $nearby . "<br>Building no." . $build_no .
                        "</label>" .
                            "</div>";
                        // echo "<div class='center-data'>" .
                        //     $user_name . "<br>" . $address . "<br>" . $city . "<br>" . $state . "" . $pin . "<br>" . $nearby . "<br>Building no." . $build_no . "
                        //     </div>";

                        echo "<a href='change-delivery.php?customer_id=" . $cusom_id . "&id=".$res["id"]."' class='change-address'>Change Address</a>";
                    }
                } else {
                    echo "<a href='delivery.php' class='add-address'>Add Address</a>";
                }
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            ?>
        </div>

        <h2>Select a payment method:</h2>

        <div class="options">
            <!-- Credit or Debit Card Option -->
            <div class="option ">
                <input type="radio" id="card" name="payment" value="card">
                <label for="card">Credit or debit card</label>
                <div class="card-logos">
                    <img class="card-logo" src="../logo/cash.png" alt="Card logo 3">
                    <img class="card-logo" src="../logo/maestro.png" alt="Card logo 1">
                    <img class="card-logo" src="../logo/rupay.png" alt="Card logo 2">
                    <img class="card-logo" src="../logo/card.png" alt="Card logo 4">
                </div>
            </div>

            <!-- Net Banking Option -->
            <div class="option rsion">
                <div class=" rsion">
                    <input type="radio" id="netbanking" name="payment" value="">
                    <label for="netbanking">Net Banking</label>
                </div>
                <select class="netbanking-dropdown">
                    <option value="" selected>Select the bank
                    </option>
                    <option value="Airtel Payments Bank">Airtel Payments Bank</option>
                    <option value="Axis Bank">Axis Bank</option>
                    <option value="HDFC Bank">HDFC Bank</option>
                    <option value="ICICI Bank">ICICI Bank</option>
                    <option value="Kotak Bank">Kotak Bank</option>
                    <option value="State Bank of India">State Bank of India</option>
                    <option value="Allahabad Bank">Allahabad Bank</option>
                    <option value="Andhra Bank">Andhra Bank</option>
                    <option value="Bank of India">Bank of India</option>
                    <option value="Bank of Maharashtra">Bank of Maharashtra</option>
                    <option value="Canara Bank">Canara Bank</option>
                    <option value="Catholic Syrian Bank">Catholic Syrian Bank</option>
                    <option value="Central Bank of India">Central Bank of India</option>
                    <option value="City Union Bank">City Union Bank</option>
                    <option value="Corporation Bank">Corporation Bank</option>
                    <option value="Cosmos Bank">Cosmos Bank</option>
                    <option value="DCB Bank Ltd">DCB Bank Ltd</option>
                    <option value="Deutsche Bank">Deutsche Bank</option>
                    <option value="Dhanlakshmi Bank">Dhanlakshmi Bank</option>
                    <option value="Federal Bank">Federal Bank</option>
                    <option value="IDBI Bank">IDBI Bank</option>
                    <option value="IDFC FIRST Bank">IDFC FIRST Bank</option>
                    <option value="ING Vysya Bank">ING Vysya Bank</option>
                    <option value="Indian Bank">Indian Bank</option>
                    <option value="Indian Overseas Bank">Indian Overseas Bank</option>
                    <option value="IndusInd Bank">IndusInd Bank</option>
                    <option value="Jammu & Kashmir Bank">Jammu & Kashmir Bank</option>
                    <option value="Janata Sahakari Bank">Janata Sahakari Bank</option>
                    <option value="Karnataka Bank Ltd">Karnataka Bank Ltd</option>
                    <option value="Karur Vysya Bank">Karur Vysya Bank</option>
                    <option value="Laxmi Vilas Bank - Corporate">Laxmi Vilas Bank - Corporate</option>
                    <option value="Laxmi Vilas Bank - Retail">Laxmi Vilas Bank - Retail</option>
                    <option value="Oriental Bank of Commerce">Oriental Bank of Commerce</option>
                    <option value="PNB YUVA Netbanking">PNB YUVA Netbanking</option>
                    <option value="Punjab National Bank - Corporate Banking">Punjab National Bank - Corporate Banking</option>
                    <option value="Punjab National Bank - Retail Banking">Punjab National Bank - Retail Banking</option>
                    <option value="Saraswat Bank">Saraswat Bank</option>
                    <option value="Shamrao Vitthal Co-operative Bank">Shamrao Vitthal Co-operative Bank</option>
                    <option value="South Indian Bank">South Indian Bank</option>
                    <option value="Standard Chartered Bank">Standard Chartered Bank</option>
                    <option value="State Bank of Bikaner & Jaipur">State Bank of Bikaner & Jaipur</option>
                    <option value="State Bank of Hyderabad">State Bank of Hyderabad</option>
                    <option value="State Bank of Mysore">State Bank of Mysore</option>
                    <option value="State Bank of Patiala">State Bank of Patiala</option>
                    <option value="State Bank of Travancore">State Bank of Travancore</option>
                    <option value="Syndicate Bank">Syndicate Bank</option>
                    <option value="Tamilnad Mercantile Bank Ltd.">Tamilnad Mercantile Bank Ltd.</option>
                    <option value="Union Bank of India">Union Bank of India</option>
                    <option value="United Bank of India">United Bank of India</option>
                    <option value="Yes Bank Ltd">Yes Bank Ltd</option>
                </select>
            </div>
            <br>
            <div class="option">
                <input type="radio" id="upi" name="payment" value="Other UPI Apps">
                <label for="upi">Other UPI Apps</label>
            </div>
            <br>
            <div class="option">
                <input type="radio" id="emi" name="payment" value="EMI">
                <label for="emi">EMI</label>
            </div>
            <br>
            <div class="option-lat">
                <input type="radio" id="cod" name="payment" value="Cash on Delivery/Pay on Delivery">
                <div><label for="cod">Cash on Delivery/Pay on Delivery</label>
                    <p>Cash, UPI and Cards accepted. <a href="">Know more.</a> </p>
                </div>
            </div>
            <br>
            <a href="" id="cancel_back" class="cancel save-country">Cancel</a>
            <form action="" method="post">
                <button type="submit" name="pay_it">Pay Now</button>
                <!-- <a href="#" class="button">
                    <input type="submit" name="pay_it" value="Pay Now">
                </a> -->
            </form>
        </div>

    </div>

    <?php
    $prod_id = $_GET['product_id'];
    include '../../seller/pages/database.php';
    $product_query = "SELECT price FROM products WHERE id='$prod_id'";
    $product_result = mysqli_query($conn, $product_query);
    if ($product_result && mysqli_num_rows($product_result) > 0) {
        $product_row = mysqli_fetch_assoc($product_result);
        $product_price = $product_row['price'];

        // Output product price
        echo "
        <div class='order-summary'>
        <div class='order-summary-header'>
            <h2>Order Summary</h2>
        </div>
        <div class='order-summary-items'>
            <div class='order-summary-item'>
                <span>Items:</span>
                <span>₹". $product_price ."</span>
            </div>
            <div class='order-summary-item'>
                <span>Delivery:</span>
                <span>₹0.00</span>
            </div>
            <div class='order-summary-item'>
                <span>Gifts:</span>
                <span>₹0.00</span>
            </div>
        </div>
        <div class='order-summary-total'>
            <span>Order Total:</span>
            <span>₹". $product_price ."</span>
        </div>
    </div>";
    } else {
        echo "Error: could not find product";
    }


    if (isset($_POST['pay_it'])) {
        $sell_query = "SELECT id FROM sell";
        $sell_result = $conn->query($sell_query);
        if ($sell_result->num_rows > 0) {

            $sell_row = $sell_result->fetch_assoc();
            $seller_id = $sell_row['id'];

            $product_query = "SELECT * FROM cart WHERE seller_id = '$seller_id'";
            $product_result = $conn->query($product_query);

            if ($product_result->num_rows > 0) {

                $product_row = $product_result->fetch_assoc();
                $Product_id = $product_row['product_id'];
                $seller_id = $product_row['seller_id'];
                $custom_id = $product_row['customer_id'];
                // $query = "SELECT id FROM products WHERE customer_id = '$sellers_id'";
                // $result = mysqli_query($conn, $query);

                $insert_query = "INSERT INTO my_order VALUES ('','$Product_id','$custom_id','$seller_id')";
                $insert_result = mysqli_query($conn, $insert_query);

                if ($insert_result) {
                    echo " ";
                } else {
                    echo "Error 01 data not inserted: " . mysqli_error($conn);
                }
            } else {
                echo "No data found in the 'cart' table.";
            }
        } else {
            echo "session id not fetched";
        }
    }
    ?>


    <script>
        document.getElementById("cancel_back").addEventListener("click", function(event) {
            event.preventDefault(); // Prevent the default action of following the link

            window.history.back(); // Navigate to the previous page
        });
    </script>
</body>

</html>