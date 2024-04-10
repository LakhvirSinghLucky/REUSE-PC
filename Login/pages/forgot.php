<?PHP
if (isset($_POST['verify'])) {
    $email = $_POST["email"];
    include("database.php");

    $query = "SELECT * FROM registration WHERE email='$email'";
    $result = mysqli_query($conn, $query);
    $numRows = mysqli_num_rows($result);

    if ($numRows === 1) {
        $row = mysqli_fetch_assoc($result);
        $squestion = $row["squestion"];
        header("location:demofor.php?email=".$email."&squestion=".$squestion."");
    } else {
        echo '<script>alert("Email does not exist! Try Again!");</script>';
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
    <div class="container1" id="verify_email">
        <h1>Forgot Your Password</h1>
        <hr>
        <h3>Please enter the below details carefully if you want to reset your password.</h3>
        <form action="" method="post">
            <span id="title"> Enter your Email:</span>
            <div>
                <input type="email" size="60" maxlength="100" minlength="10" placeholder="Enter your email address" name="email" id="email" required>
            </div>
            <button name="verify" class="verifybtn">Verify Email</button>
        </form>
    </div>

   
</body>

</html>
