<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "phpusers";
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    $userid;
    if (isset($_GET['userid'])) {
        $userid = $_GET['userid'];
        $getuser = mysqli_query($conn,"SELECT * FROM users WHERE id=$userid");
    }
    $name = '';
    $email = '';
    $gender = '';
    $email_status = '';
    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['gender'])) {
        $gender = $_POST['gender'];
    }
    if (isset($_POST['receive_email'])) {
        $email_status = 'Yes';
    }else {
        $email_status = 'No';
    }
    if (isset($_POST['updateuserbtn'])){
        $updateuser = "UPDATE users 
        SET name='$name', email='$email', gender='$gender', email_status='$email_status'
        WHERE id=$userid";
        mysqli_query($conn,$updateuser);
        header('location: usersdata.php');
    }
    // $adduser = '';
    if (isset($_POST['addnewuserbtn'])) {
        $adduser = "INSERT INTO users(name,email,gender,email_status)
        VALUES('$name','$email','$gender','$email_status')";
        mysqli_query($conn,$adduser);
        header('location: usersdata.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Lap 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>User Registration Form</h1>
    <form method="POST">
        <?php 
        if (isset($_GET['userid'])) {
            while(@$row = mysqli_fetch_array($getuser)){?>
        <div class="name">
            <p>Name<span class="required">*</span></p>
            <input type="text" name="name" value="<?= $row['name'] ?>">
        </div>
        <div class="email">
            <p>Email<span class="required">*</span></p>
            <input type="text" name="email" value="<?= $row['email'] ?>">
        </div>
        <div class="gender">
            <span>Gender<span class="required">*</span></span>
            <label>
                <input type="radio" name="gender" value="Male" <?php echo $row['gender'] == 'Male' ? 'checked' : '' ?>>
                Male
            </label>
            <label>
                <input type="radio" name="gender" value="Female" <?php echo $row['gender'] == 'Female' ? 'checked' : '' ?>>
                Female
            </label>
        </div>
        <div class="receive-email">
            <label>
                <input type="checkbox" name="receive_email" <?php echo $row['email_status'] == 'Yes' ? 'checked' : '' ?>>
                Receive E-Mails from us.
            </label>
        </div>
        <?php }}else { ?>
            <div class="name">
            <p>Name<span class="required">*</span></p>
            <input type="text" name="name">
        </div>
        <div class="email">
            <p>Email<span class="required">*</span></p>
            <input type="text" name="email">
        </div>
        <div class="gender">
            <span>Gender<span class="required">*</span></span>
            <label>
                <input type="radio" name="gender" value="Male">
                Male
            </label>
            <label>
                <input type="radio" name="gender" value="Female">
                Female
            </label>
        </div>
        <div class="receive-email">
            <label>
                <input type="checkbox" name="receive_email">
                Receive E-Mails from us.
            </label>
        </div>
        <?php } ?>
        <div class="form-btns">
            <?php 
            if (isset($_GET['userid'])) {
                echo '<input type="submit" value="Update" name="updateuserbtn">
                <a href="usersdata.php" class="cancel-update">Cancel</a>';
            }else {
                echo '<input type="submit" name="addnewuserbtn">
                <input type="reset" value="Cancel">';
            }
            ?>
        </div>
</form>
</body>
</html>
