<?php
    $conn = mysqli_connect("localhost","root","","phpusers");
    $fname = '';
    $lname = '';
    $email = '';
    $password = '';
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $insertUser = "INSERT INTO user_logined(fname, lname, email, password)
        VALUES('$fname','$lname','$email','$password')";
        mysqli_query($conn,$insertUser);
        header('location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form class="regform" id="regform" method="post">
        <div class="signup" id="signup">
            <label id="form-tag-head">SignUp</label>
            <label>First Name</label>
            <input type="text" name="fname" placeholder="First Name *" class="fname" id="fname"><br>
            <label>Last Name</label>
            <input type="text" name="lname" placeholder="Last Name *" class="lname" id="lname">
            <label>Valid Email</label>
            <input type="email" name="email" placeholder="email address *" class="user" id="userReg">
            <label>Password</label>
        <div class="form-pass-field">
            <input type="password" name="password" placeholder="Password *" class="pass" id="passReg">
        </div>
        <span id="passhint">*Use strong password , minimum 8 characters</span>
        <input type="submit" value="Signup" id="signupBtn">
        <p class="note">Already have Account?<a href="login.php" id="loginNow">Login</a></p>
    </div> 
    </form>
</body>
</html>