<?php
    $error = false;
    $name_error = '';
    $email_error = '';
    $gender_error = '';
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (empty($_POST['name'])){
            $error = true;
            $name_error = 'Name is required.';
        }elseif (preg_match("/[^a-z]/i", $_POST['name'])){
            $error = true;
            $name_error = 'Name not accept any sepchial character.';
        }
        if (empty($_POST['email'])) {
            $error = true;
            $email_error = 'Email is required.';
        }
        if (empty($_POST['gender'])){
            $error = true;
            $gender_error = 'Gender is required.';
        }
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
    <h1>AAST_BIS Class Registration</h1>
    <form method="post">
        <div class="name">
            <p>Name<span class="required">*</span></p>
            <input type="text" name="name" value="<?php echo ($error ? @$_POST['name'] : '') ?>">
            <p class="required"><?php echo $name_error ?></p>
        </div>
        <div class="email">
            <p>Email<span class="required">*</span></p>
            <input type="text" name="email" value="<?php echo ($error ? @$_POST['email'] : '') ?>">
            <p class="required"><?php echo $email_error ?></p>
        </div>
        <div class="group">
            <p>Group Num</p>
            <input type="text" name="group" value="<?php echo ($error ? @$_POST['group'] : '') ?>">
        </div>
        <div class="details">
            <p>Class Details</p>
            <textarea name="details"><?php echo ($error ? @$_POST['details'] : '') ?></textarea>
        </div>
        <div class="gender">
            <span>Gender<span class="required">*</span></span>
            <label>
                <input type="radio" name="gender" value="male" 
                <?php 
                    if (isset($_POST['gender'])) {
                        if ($_POST['gender'] == 'male') {
                            echo ($error ? 'checked' : '');
                        }
                    }
                ?>>
                Male
            </label>
            <label>
                <input type="radio" name="gender" value="female"
                <?php 
                    if (isset($_POST['gender'])) {
                        if ($_POST['gender'] == 'female') {
                            echo ($error ? 'checked' : '');
                        }
                    }
                ?>>
                Female
            </label>
            <span class="required"><?php echo $gender_error ?></span>
        </div>
        <div class="courses">
            <div class="courses-select">
                <select>
                    <option>Please select course</option>
                </select>
                <div class="overSelect"></div>
            </div>
            <div class="courses-checkbox">
                <label>
                    <input type="checkbox" name="php" 
                    <?php
                    if(isset($_POST['php'])){
                        if ($error) {
                            echo 'checked'; 
                        }
                    }
                    ?>>
                    PHP
                </label>
                <label>
                    <input type="checkbox" name="js" 
                    <?php
                    if(isset($_POST['js'])){
                        if ($error) {
                            echo 'checked'; 
                        }
                    }
                    ?>>
                    JavaScript
                </label>
                <label>
                    <input type="checkbox" name="mysql" 
                    <?php
                    if(isset($_POST['mysql'])){
                        if ($error) {
                            echo 'checked'; 
                        }
                    }
                    ?>>
                    MySQL
                </label>
                <label>
                    <input type="checkbox" name="html" 
                    <?php
                    if(isset($_POST['html'])){
                        if ($error) {
                            echo 'checked'; 
                        }
                    }
                    ?>>
                    HTML
                </label>
                <label>
                    <input type="checkbox" name="css" 
                    <?php
                    if(isset($_POST['css'])){
                        if ($error) {
                            echo 'checked'; 
                        }
                    }
                    ?>>
                    CSS
                </label>
                <label>
                    <input type="checkbox" name="node" 
                    <?php
                    if(isset($_POST['node'])){
                        if ($error) {
                            echo 'checked'; 
                        }
                    }
                    ?>>
                    Node.js
                </label>
                <label>
                    <input type="checkbox" name="bootstrap" 
                    <?php
                    if(isset($_POST['bootstrap'])){
                        if ($error) {
                            echo 'checked'; 
                        }
                    }
                    ?>>
                    BootStrap
                </label>
            </div>
        </div>
        <input type="submit">
</form>
<?php if (!$error) { ?>
<div class="data">
    <div class="info">
        <h4>Name</h4>
        <p><?php echo @$_POST['name'] ?></p>
    </div>
    <div class="info">
        <h4>Email</h4>
        <p><?php echo @$_POST['email'] ?></p>
    </div>
    <div class="info">
        <h4>Group Num</h4>
        <p><?php echo @$_POST['group'] ?></p>
    </div>
    <div class="info">
        <h4>Class Details</h4>
        <p><?php echo @$_POST['details'] ?></p>
    </div>
    <div class="info">
        <h4>Gender</h4>
        <p><?php echo @$_POST['gender'] ?></p>
    </div>
    <div class="info">
        <h4>Courses</h4>
        <p>
            <?php
            $checked_courses = '';
            foreach($_POST as $key => $value) {
                if ($value == 'on') {
                    $checked_courses .= $key.', ';
                }
            }
            echo $checked_courses;
            ?>
        </p>
    </div>
</div>
<?php } ?>
</body>
</html>