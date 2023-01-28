<?php
    $userid = $_GET['userid'];
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'phpusers';
    $conn = mysqli_connect($servername,$username,$password,$db_name);
    $getuser = mysqli_query($conn, "SELECT * FROM users WHERE id = $userid");
    while ($row = mysqli_fetch_array($getuser)){
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
    <h1>View User Data</h1>
    <form method="post">
        <div class="name">
            <p>Name<span class="required">*</span></p>
            <input type="text" name="name" value="<?= $row['name'] ?>" disabled>
        </div>
        <div class="email">
            <p>Email<span class="required">*</span></p>
            <input type="text" name="email" value="<?= $row['email'] ?>" disabled>
        </div>
        <div class="gender">
            <span>Gender<span class="required">*</span></span>
            <label>
                <input type="radio" name="gender" value="male" <?php echo $row['gender'] == 'Male' ? 'checked' : '' ?> disabled>
                Male
            </label>
            <label>
                <input type="radio" name="gender" value="female" <?php echo $row['gender'] == 'Female' ? 'checked' : '' ?> disabled>
                Female
            </label>
        </div>
        <div class="receive-email">
            <label>
                <input type="checkbox" name="receive_email" <?php echo $row['email_status'] == 'Yes' ? 'checked' : '' ?> disabled>
                Receive E-Mails from us.
            </label>
        </div>
        <a href="usersdata.php" class="back-to-usersdata-btn">Back</a>
</form>
</body>
</html>
<?php } ?>