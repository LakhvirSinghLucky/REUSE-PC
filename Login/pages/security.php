<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
include("database.php");
$email = $_SESSION["email"];
$findresult = mysqli_query($conn, "SELECT * FROM registration WHERE email = '$email'");
if ($res = mysqli_fetch_array($findresult)) {
    $SecurityQuestion = $res['squestion'];
    $SecurityAnswer = $res['sanswer'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>REUSE-PC</title>
    <link rel="icon" type="image/png" href="LOGO/web-logo--4.png" />
    <link rel="stylesheet" href="../css/security.css">
</head>

<body>
    <div class="wrap">
        <div class="container">
            <h1 id="details">Answer the question first:</h1>
            <hr>
            <s class="label">*Enter the Security answer that you gave during registration.</s>
            <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <label class="security">Security Question:&nbsp;<?php echo $SecurityQuestion; ?></label>
                <br />
                <label class="security">Security Answer:</label>
                <input class="security" type="text" name="security_answer" required />
                <br />
                <button type="submit" name="update_details">SUBMIT</button>
            </form>
        </div>
    </div>
</body>

</html>
<?php
if (isset($_POST['update_details'])) {

    $submittedAnswer = $_POST["security_answer"];

    if (trim($submittedAnswer) !== trim($SecurityAnswer)) {
        echo '<script>alert("Incorrect security answer!")</script>';
    } else {
        header('location:edit-email.php');
        exit;
    }
}
?>