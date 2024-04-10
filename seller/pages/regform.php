<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

if (isset($_POST['submit'])) {
    include 'database.php';
    $username = $_POST["username"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $pin = $_POST["pin"];
    $state = $_POST["state"];
    $country = $_POST["country"];
    $number = $_POST["number"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    $squestion = $_POST["squestion"];
    $sanswer = $_POST["sanswer"];
    $image = $_FILES["image"]["name"];
    $file = $_FILES["image"]["tmp_name"];
    $file_name_array = explode(".", $image); // Use $image instead of $file_name
    $extension = end($file_name_array);
    $new_image_name = 'pic_' . rand() . '.' . $extension;
    $folder = 'profile_image/';


    $result = mysqli_query($conn, "SELECT * FROM `sell` WHERE number = '$number'");
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        var_dump($numExistRows);
        echo '<script>alert("ERROR!! Phone no. already exists!😢!")</script>';
        exit();
    } else {
        $result = mysqli_query($conn, "SELECT * FROM `sell` WHERE email = '$email'");
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            var_dump($numExistRows);
            echo '<script>alert("Email already exists !😢!")</script>';
            exit();
        } else {
            if (($password != $cpassword) || ($cpassword != $password)) {
                var_dump($cpassword);
                echo '<script>alert("Confirm Password do not match !😢!")</script>';
                exit();
            } else {
                if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                    if ($_FILES["image"]["size"] > 5000000) {
                        var_dump($_FILES["image"]["size"]);
                        echo '<script>alert("Your image is too large.😢Upload less than 5 MB in size!!")</script>';
                        exit();
                    } else {
                        if (!in_array($extension, ["jpg", "png", "jpeg", "gif", "JPG", "PNG", "JPEG", "GIF"])) {
                            var_dump($extension);
                            echo '<script>alert("Error !😢! Only JPG, JPEG, PNG & GIF files are allowed.")</script>';
                            exit();
                        } else {
                            move_uploaded_file($file, $folder . $new_image_name);
                            //    var_dump($_FILES);//check files are uploaded or not 
                            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                            $result = mysqli_query($conn, "INSERT INTO sell VALUES ('','$username','$dob','$gender','$address','$city',
                            '$pin','$state','$country','$number','$email','$hashed_password','$squestion','$sanswer','$new_image_name')");
                            var_dump($result);
                            if ($result) {
                                var_dump($result);
                                echo '<script>alert("Success \u{1F60A} You have successfully registered into our site, Now you can login by using the Username(Email) and Password."); window.location.href = "login.php";</script>';
                                exit();
                            } else {
                                echo '<script>alert("Error occurred while inserting data into database 😢")</script>';
                                exit();
                            }
                        }
                    }
                }
            }
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
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />

    <link rel="stylesheet" href="../css/regform.css">
    <style>
        hr {
            border: 1px solid;
        }
    </style>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <h1 style="padding: 1px 96px 0px 72px">Registration</h1>
            <label> Create account. New to ReusePC?<br>
                <hr>
            </label>
            <div>
                <input type="text" size="40" maxlength="100" minlength="3" placeholder="User's Full Name" id="username" name="username" required>
            </div>
            <label for="date">Date Of Birth:</label>
            <input type="date" id="dob" name="dob" style="font-size:medium; padding: 12px 174px 12px 184px; color:rgba(0, 0, 0, 0.735)" required><br>
            <label> Gender :</label>
            <select name="gender" id="gender" style="  padding:12px 197px 12px 203px; margin: 9px -24px;" required>
                <option value="" selected>Select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
            <div class="address">
                <label><br>Address:<br>
                    <div>
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <textarea rows="5" cols="62" style="padding: 12px 0px 12px 4px; background:transparent; margin: -12px -20px;" placeholder="Enter your full address..." name="address" id="address" required>
            </textarea>
            </div>
            <div><label> <br>City:</label>
                <input type="text" size="40" maxlength="100" minlength="3" name="city" id="city" placeholder="Enter your City" required>
            </div>
            <label> <br>Pin Code:<div></label>
            <input type="tel" style=" padding: 12px 115px 12px 110px" name="pin" id="pin" maxlength="06" pattern="[0-9]{06}" placeholder="Enter your Pin Code" required>
        </div>

        <label> <br>State:<div></label>
        <input type="text" size="40" maxlength="100" minlength="3" style="color: rgba(0, 0, 0, 0.735); " name="state" id="state" placeholder="Enter your State" required>
        </div>

        <label><br>Country:</label>
        <div>
            <select name="country" id="country" style="font-size:x-large; padding: 12px 219px 12px 204px; color:rgba(0, 0, 0, 0.735); margin:10px -21px;">
                <option value="BHARAT"> BHARAT </option>
            </select>
        </div>
        <label> <br>Phone no :</label>
        <div style="display:-webkit-box;">
            <select style="padding: 12px 1px 12px 3px;border-radius: 20px;margin: 12px 38px 11px -21px;">
                <option value="+91">+91 </option>
            </select>
            <input type="tel" size="12" id="number" style="padding: 12px 103px 12px 119px" name="number" maxlength="10" pattern="[0-9]{10}" placeholder="Enter your Phone no." required>
        </div>
        <label for="email">Email:</label>
        <div>
            <input type="email" size="40" maxlength="100" minlength="10" placeholder="Enter your email address" name="email" id="email" required>
        </div>
        <label for="password">Password:</label>
        <div class="full-screen">
            <input type="password" size="40" maxlength="200" minlength="5" placeholder="Enter the Password" name="password" id="password" required>
        </div>
        <div>
            <input type="password" size="40" maxlength="200" minlength="5" placeholder="Confirm your Password" name="cpassword" id="cpassword" required>
        </div>
        <label> <span id="tlt">Security Questions?</span><br></label>
        <div class="text-center">
            <select name="squestion" id="squestion" style="font-size:medium; color:rgba(0, 0, 0, 0.735); text-align:center; 
            padding: 12px 46px 12px 57px; margin: 11px -25px; " required>
                <option value="" selected>Choose the Questions.</option>
                <option value="Who is your Childhood friend?">Who is your Childhood friend?</option>
                <option value="The city where you were born is.">The city where you were born is.</option>
                <option value="What is your father's childhood name?">What is your father's childhood name?</option>
                <option value="By which name your parents called you in childhood.">By which name your parents called you in childhood.</option>
                <option value="What is your first School name?">What is your first School name?</option>
                <option value="You calls your Best Friend by which name.">You calls your Best Friend by which name.
                </option>
                <option value="What is your mother's childhood name?">What is your mother's childhood name?</option>
            </select>
        </div><br>
        <label> <span id="tlt">Security Answers:</span></label>
        <div class="custom-class">
            <input type="text" size="40" maxlength="100" minlength="3" name="sanswer" id="sanswer" placeholder="Answer the question." required><br>
        </div>
        <div class="prof-image">
            <label><span id="tlt">Profile Image</span>(Optional)</label>
            <input type="file" id="profile_image" accept=".jpeg, .jpg, .png, .gif" value="image" name="image">
        </div>
        <div>
            <button type="submit" name="submit" id="submit" value="Register">Submit</button>
            <button type="reset" value="Reset" id="submit">Reset</button>
        </div>
        <p>Already have an account? <a href="login.php">Sign in</a></p>
        <hr>
        <p>By clicking Register, you agree to our legal policies <a href="../Readout/terms.html">Terms & Conditions</a>
        </p>
        </div>
        </div>
    </form>
</body>

</html>