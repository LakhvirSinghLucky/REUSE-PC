<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

include '../common_functions/comn-fun-wlcm.php';

if (isset($_POST['submit'])) {
    include 'database.php';
    $username         = $_POST["username"];
    $dob              = $_POST["dob"];
    $gender           = $_POST["gender"];
    $address          = $_POST["address"];
    $city             = $_POST["city"];
    $pin              = $_POST["pin"];
    $state            = $_POST["state"];
    $country          = $_POST["country"];
    $number           = $_POST["number"];
    $email            = $_POST["email"];
    $password         = $_POST["password"];
    $cpassword        = $_POST["cpassword"];
    $squestion        = $_POST["squestion"];
    $sanswer          = $_POST["sanswer"];
    $folder           = 'profile_image/';
    $user_id          = getIP_Address();

    $result = mysqli_query($conn, "SELECT * FROM `registration` WHERE number = '$number'");
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        echo '<script>alert("ERROR !! Phone no. already exists!!"); window.location.href ="regform.php"</script>';
        exit();
    } else {
        $result = mysqli_query($conn, "SELECT * FROM `registration` WHERE email = '$email'");
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0) {
            echo '<script>alert("Email already exists !!"); window.location.href = "regform.php";</script>';
            exit();
        } else {
            if (($password != $cpassword) || ($cpassword != $password)) {
                echo '<script>alert("Confirm Password do not match !!"); window.location.href = "regform.php";</script>';
                exit();
            } else {  //empty file
                if (!empty($_FILES['image']['name'])) {
                    $image            = $_FILES["image"]["name"];
                    $file             = $_FILES["image"]["tmp_name"];
                    $file_name_array  = explode(".", $image);
                    $extension        = end($file_name_array);
                    $new_image_name   = 'pic_' . rand() . '.' . $extension;

                    if ($_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                        if ($_FILES["image"]["size"] > 5000000) {
                            echo '<script>alert("Your image is too large. Upload less than 5 MB in size!!"); window.location.href = "regform.php";</script>';
                            exit();
                        } else {
                            if (!in_array($extension, ["jpg", "png", "jpeg", "gif", "JPG", "PNG", "JPEG", "GIF"])) {
                                echo '<script>alert("Error !! Only JPG, JPEG, PNG & GIF files are allowed."); window.location.href = "regform.php";</script>';
                                exit();
                            } else {
                                move_uploaded_file($file, $folder . $new_image_name);
                                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                                $result = mysqli_query($conn, "INSERT INTO registration VALUES ('','$username','$user_id','$address','$city','$pin','$dob','$gender',
                                    '$state','$country','$number','$email','$hashed_password','$squestion','$sanswer','$new_image_name')");
                                if ($result) {
                                    header("location:register.php?profile_updated=1");
                                    exit();
                                } else {
                                    echo '<script>alert("Error occurred while inserting data into database at full file."); window.location.href = "regform.php";</script>';
                                    exit();
                                }
                            }
                        }
                    }
                } else {
                    $image = '';
                    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $result = mysqli_query($conn, "INSERT INTO registration VALUES ('','$username','$user_id','$address','$city','$pin','$dob','$gender',
                    '$state','$country','$number','$email','$hashed_password','$squestion','$sanswer','$new_image_name')");
                    var_dump($result);
                    if ($result) {
                        header("location:register.php?profile_updated=1");
                        exit();
                    } else {
                        echo '<script>alert("Error occurred while inserting data into database at empty file"); window.location.href = "regform.php";</script>';
                        exit();
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
    <title>Registration</title>
    <link rel="icon" type="image/png" href="../LOGO/web-logo--4.png" />

    <link rel="stylesheet" href="../css/regform2.css">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="container">
            <div class="top-reg">
                <h2>Registration</h2>
                <h4>Create account. New to REUSE-PC</h4>
            </div>
            <hr>
            <div class="user-name common">
                <label for="user-name">User's Name:</label>
                <input type="text" size="40" maxlength="100" minlength="3" placeholder="User's Full Name" id="username" class="input-user" name="username" required>
            </div>
            <div class="user-name common">
                <label for="date">Date Of Birth:</label>
                <input type="date" id="dob" class="input-user" name="dob" required>
            </div>
            <div class="security common">
                <label for="gender">Gender</label>
                <select name="gender" class="input-user" id="gender" required>
                    <option value="" selected>Select</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="security common">
                <label for="country">Country</label>
                <select name="country" class="input-user" id="country" required>
                    <option value="BHARAT">BHARAT</option>
                </select>
            </div>
            <div class="phone common">
                <label for="number">Phone no:</label>
                <select class="phone-user">
                    <option value="+91">+91 </option>
                    <input type="tel" class="input-user" size="12" id="number" name="number" maxlength="10" pattern="[0-9]{10}" placeholder="Enter your Phone no." required>
                </select>
            </div>
            <div class="email common">
                <label for="email">Email:</label>
                <input type="email" class="input-user" size="40" maxlength="100" minlength="10" placeholder="Enter your email address" name="email" id="email" required>
            </div>
            <div class="pass common">
                <label for="password">Password:</label>
                <abbr id="validate" title="Password must contain 6 character with uppercase letter, lowercase letter, number, and special characters.">
                    <input type="password" class="input-user" size="40" maxlength="200" minlength="6" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" placeholder="Enter the Password" name="password" id="password" required></abbr>
                <label for="password"></label>
                <input type="password" class="input-user" size="40" maxlength="200" minlength="6" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{6,}$" placeholder="Confirm your Password" name="cpassword" id="cpassword" required>
                <!-- <abbr id="validate" title="Password Must contain 6 character with uppercase letter, lowercase letter, number, and special characters."></abbr> -->
            </div>
            <div class="security common">
                <label for="squestion">Security Questions?</label>
                <select name="squestion" class="input-user" id="squestion" required>
                    <option value="" selected>Choose the Questions.</option>
                    <option value="Who is your Childhood friend?">Who is your Childhood friend?</option>
                    <option value="The city where you were born is.">The city where you were born is.</option>
                    <option value="What is your father's childhood name?">What is your father's childhood name?</option>
                    <option value="By which name your parents called you in childhood.">By which name your parents called you in childhood.</option>
                    <option value="What is your first School name?">What is your first School name?</option>
                    <option value="You calls your Best Friend by which name.">You calls your Best Friend by which name.</option>
                    <option value="What is your mother's childhood name?">What is your mother's childhood name?</option>
                </select>
            </div>
            <div class="sec_answer common">
                <label for="sanswer">Security Answers:</label>
                <input type="text" class="input-user" size="40" maxlength="100" minlength="3" name="sanswer" id="sanswer" placeholder="Answer the question." required><br>
            </div>
            <div class="profile common">
                <label for="profile_image">Profile Image (Optional):</label>
                <input type="file" class="input-user file-upload" id="profile_image" accept=".jpeg, .jpg, .png, .gif" value="image" name="image">
            </div>
            <div class="buttons common">
                <button type="submit" class="input-user" name="submit" id="submit" value="Register">Submit</button>
                <button type="reset" class="input-user" value="Reset" id="Reset">Reset</button>
            </div>
            <div class="last-footer common">
                <p>Already have an account? <a class="link" href="login.php">Sign in</a></p>
                <hr>
                <p>By clicking Register, you agree to our legal policies <a class="link" href="../Readout/terms.html">Terms & Conditions</a></p>
            </div>
        </div>
    </form>
</body>

</html>