<?PHP
if (isset($_POST['submit'])) {
  include("database.php");
  $email      = $_POST["email"];
  $password   = $_POST["password"];

  // $result=mysqli_query($conn,"SELECT * from sell where email='$email' AND password='$password'");
  $query = "SELECT * from sell where email='$email'";
  $result = mysqli_query($conn, $query);
  $numRows = mysqli_num_rows($result);
  if ($numRows == 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        session_start();
          $_SESSION['loggedin'] = true;
          $_SESSION['email'] = $email;
          $_SESSION['id'] = $id;
          $_SESSION["product_id"] = $product_id;
          $_SESSION['username'] = $username;
          header("location: after-log-sell.php");
          exit();
      } else {
        echo '<script>alert("INVALID PASSWORD !! Failed to Login")</script>';
      }
    }else {
      echo '<script>alert("INVALID EMAIL !! Failed to Login")</script>';
    }
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="cache-control" content="no-cache,no-store, must-revalidate">
  <meta http-equiv="pragma" content="no-cache">
  <meta http-equiv="expires" content="0">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGIN</title>
  <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" sizes="132x132" />
  <link rel="stylesheet" href="../css/logstyle.css">

</head>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <div class="wrapper">
      <h1>
        Login
      </h1>
      <div class="input-box">
        <input type="email" placeholder="Enter your email address" name="email" id="email" required>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Password" name="password" id="password" required><br>
      </div>
      <div class="remember">
        <label><input type="checkbox" checked>
          Remember Me</label>
        <a href="forgot.php">Forgot Password?</a>
      </div>
      <button type="submit" class="btn" name="submit" id="btn" style="color: rgb(78,78,255)">Login</button>
      <div class="register-link">
        <p>Don't have an account?&nbsp;&nbsp;<a href="regform.php">Register</a> </p>
      </div>
    </div>
  </form>
</body>

</html>