<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("database.php");
$email = $_SESSION["email"];
$findresult = mysqli_query($conn, "SELECT * FROM sell WHERE email = '$email'");
if (!$findresult) {
    echo "Error: " . mysqli_error($conn);
    exit;
}
// Check if there are rows returned by the query
if (mysqli_num_rows($findresult) > 0) {
    // Fetch data from the result set
    if ($fetch = mysqli_fetch_assoc($findresult)) {
        $username = $fetch["username"];
        $email = $fetch["email"];
        $number = $fetch["number"];
    } else {
        echo '<script>alert("No data found")</script>';
    }
} else {
    echo '<script>alert("No rows returned by the query")</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />
    <link rel="stylesheet" href="../CSS/after-security.css">
</head>

<body>
    <div class="wrap">
        <div class="container">
            <h1 id="details">Update your details:</h1>
            <hr>
            <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <div class="outer-box">
                    <label class="security">Username:</label><s class="security"><?php echo $username; ?></s>
                </div>
                <br />
                <div class="outer-box">
                    <label class="security">Email:</label>
                    <input class="security" type="email" name="email" value="<?php echo $email; ?>" required />
                </div>
                <br />
                <div class="outer-box">
                    <label class="security">Mobile Number:</label>
                    <input class="security" type="tel" name="number" value="<?php echo $number; ?>" required />
                </div>
                <br />
                <div class="outer-box">
                    <button type="submit" name="update_details">UPDATE DETAILS</button>
                </div>
            </form>
</body>

</html>
<?php

if (isset($_POST['update_details'])) {
    $new_email = $_POST["email"];
    $new_number = $_POST["number"];

    $query = "UPDATE sell SET email='$new_email', number='$new_number' WHERE email='$email'";
    $data = mysqli_query($conn, $query);
    if ($data) {
        $_SESSION['email'] = $new_email;
        // echo '<script>alert("Record Update Successfull")</script>';
        header('location:profile.php');
    } else {
        echo '<script>alert("Failed to update records")</script>';
    }
}

?>