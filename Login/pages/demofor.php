<?php

include("database.php");
$email= $_GET["email"];
$squestion= $_GET["squestion"];

// $email = mysqli_real_escape_string($conn, $_POST['email']);
$emailquery = "SELECT * from registration where email='$email'";
$query = mysqli_query($conn, $emailquery);
$emailcount = mysqli_num_rows($query);

if (isset($_POST['submit'])) {
    $dob        = $_POST["dob"];
    $sanswer    = $_POST["sanswer"];

    $query = "SELECT * FROM registration WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);

    if ($numRows === 1) {
        $row = mysqli_fetch_assoc($result);
        $storedDob = $row["dob"];
        $storedSAnswer = $row["sanswer"];

        if ($storedDob === $dob && $storedSAnswer === $sanswer) {
            header("location:resetpass.php?email=".$email."");
            exit();
        } else {
            echo '<script>alert("Invalid Date of Birth or Security Answer!! Failed to Login");</script>';
        }
    } else {
        echo '<script>alert("Email does not exist!! Try Again!");</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" sizes="132x132" />
    <link rel="stylesheet" href="../CSS/forgot.css">
    <style>
        hr {
            border: 1px solid;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Forgot Your Password</h1>
        <hr>
        <h3>Please enter the below details carefully if you want to reset your password.</h3>
        <form action="" method="post">
            <span id="title"> Your Email:</span>
            <div>
                <input type="email" size="60" maxlength="100" minlength="10" placeholder="<?php echo $email ?>" name="email" id="email" readonly>
            </div>
            <div>
                <span id="title">Date Of Birth:</span>
                <input type="date" id="dob" name="dob" style="display: block;
                        padding: 12px 244px 12px 187px;" required>
            </div>
            <span id="title">Security Questions?</span>
            <div>
                <select name="squestion" id="squestion">
                    <option value="" readonly><?php echo $squestion ?></option>
                </select>
            </div>
            <span id="title">Security Answers:</span>
            <div>
                <input type="text" size="60" maxlength="100" minlength="3" name="sanswer" id="sanswer" placeholder="Answer the question." required>

                <button style="padding: 12px 257px 12px 244px;" type="submit" id="submit" name="submit">Submit </button><br>
            </div>
        </form>
        <hr>
        <div>
            <button><a href="login.php">Back to Login</a></button>
        </div>
    </div>
</body>

</html>