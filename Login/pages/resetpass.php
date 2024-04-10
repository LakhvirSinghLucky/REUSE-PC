<?php
// Include database connection
include("database.php");
$email = $_GET["email"];

$emailquery = "SELECT * from registration where email='$email'";
$query = mysqli_query($conn, $emailquery);
$emailcount = mysqli_num_rows($query);

if (isset($_POST['submit'])) {
  $new_password = $_POST["password"];
  $cpassword = $_POST["cpassword"];

  if (($new_password != $cpassword) || ($cpassword != $new_password)) {
    echo '<script>alert("Confirm Password do not match !!"); window.location.href = "forgot.php";</script>';
    exit();
  } else {
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    $query = "UPDATE registration SET password='$hashed_password' WHERE email='$email'";
    $data = mysqli_query($conn, $query);
    if ($data) {
      // echo '<script>alert("Record Update Successfull")</script>';
      echo '<script>alert("Password reset successfull. Now you can login."); window.location.href = "login.php";</script>';
    } else {
      echo '<script>alert("Failed to update records"); window.location.href = "forgot.php";</script>';
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REUSE-PC</title>
  <link rel="icon" type="image/png" href="LOGO/web-logo--4.png" />
  <link rel="stylesheet" href="../CSS/resetpas.css">

</head>

<body>

  <div class="container">
    <h2>Reset your password</h2>
    <hr>
    <p>
      Strong Password include numbers, letters and punction marks.
    </p>
    <form action="" method="post">
    <span id="title">New Password<b>*</b></span>
    <div class="input-box">
      <input type="password" size="60" maxlength="200" minlength="5" name="password" id="password" placeholder="Enter Your Password" required><br>
    </div>
    <div class="instructions">
      <li>Must be at least 8 characters.<br></li>
      <li>Must contain an uppercase and a lowercase letter.<br></li>
      <li>Must contain a number.<br></li>
      <li style="padding: 0px 7px 20px 33px;">
        Must contain a special character(!,@,#,etc.).<br></li>
    </div>
    <span id="title">Confirm New Password<b>*</b></span>
    <div class="input-box">
      <input type="password" size="60" maxlength="200" minlength="5" name="cpassword" id="password" placeholder=" Re-type password" required><br>
    </div>
    <hr>
    <div>
      <button type="submit" name="submit" id="submit" required>Reset Password</button>
    </div>
    <div>

      <button><a href="login.php">Back to Login</a></button>
    </div>
    </form>
  </div>
</body>

</html>