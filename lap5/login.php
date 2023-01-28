<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php 
    session_start();
    if (isset($_SESSION['loginstatus'])){
?>
    <div class="home-main-div">
        <p class="home-welcome-msg">Welcome Mohamed</p>
        <a class="home-logout-link" href="logout.php">Logout</a>
    </div>
<?php
    }else{
        if (isset($_POST['login'])) { 
        $conn = mysqli_connect("localhost","root","","phpusers");
        $email = $_POST['email'];
        $password = $_POST['password'];
        $getuser = mysqli_query($conn, "SELECT * FROM user_logined WHERE email='$email' and password='$password'");
        $row = mysqli_fetch_array($getuser);
        if (empty($row)) {
?>

    <form class="logform" id="logform" method="post">
        <div class="login" id="login">
            <label id="form-tag-head">Login</label>
            <input type="email" name="email" placeholder="Your email address *" class="user" id="userLog">
            <div class="form-pass-field">
                <input type="password" name="password" placeholder="Password *" class="pass" id="passLog">
            </div>
            <p class="error-msg">Your email or password is incorrect.</p>
            <input type="submit" value="Login" name="login" id="logBtn">
            <a id="forget">Forgot Your Password</a>
            <span class="note">Don't have Account?<a href="signup.php" id="RegisterNow" class="RegisterNow">SignUp</a></span>
        </div> 
    </form>

<?php 
        }else { 
            $_SESSION['loginstatus'] = true;
?>
    
    <div class="home-main-div">
        <p class="home-welcome-msg">Welcome <?= $row['fname'] ?></p>
        <a class="home-logout-link" href="logout.php">Logout</a>
    </div>

<?php }}else {?>

    <form class="logform" id="logform" method="post">
        <div class="login" id="login">
            <label id="form-tag-head">Login</label>
            <input type="email" name="email" placeholder="Your email address *" class="user" id="userLog">
            <div class="form-pass-field">
                <input type="password" name="password" placeholder="Password *" class="pass" id="passLog">
            </div>
            <input type="submit" value="Login" name="login" id="logBtn">
            <a id="forget">Forgot Your Password</a>
            <span class="note">Don't have Account?<a href="signup.php" id="RegisterNow" class="RegisterNow">SignUp</a></span>
        </div> 
    </form>

<?php }} ?>
</body>
</html>
