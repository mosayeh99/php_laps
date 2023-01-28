<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "phpusers";
    $conn = mysqli_connect($servername, $username, $password, $db_name);
    $allusers = mysqli_query($conn,"SELECT * FROM users");
    $userid;
    if (isset($_GET['userid'])) {
        $userid = $_GET['userid'];
        $deluser = "DELETE FROM users WHERE id=$userid";
        mysqli_query($conn,$deluser);
        header('location: usersdata.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Data</title>
    <link rel="stylesheet" href="usersdata.css">
</head>
<body>
    <div class="users-details">
        <div class="head">
            <p>User Details</p>
            <a href="index.php">Add New User</a>
        </div>
        <div class="content">
            <div class="content-head">
                <span class="flex1">#</span>
                <span class="flex2">Name</span>
                <span class="flex3">Email</span>
                <span class="flex2">Gender</span>
                <span class="flex2">Mail Status</span>
                <span class="flex3">Action</span>
            </div>
            <div class="content-body">
                <?php
                $usercounter = 0; 
                while ($row = mysqli_fetch_array($allusers)) {
                    if ($usercounter % 2 == 0) {
                        echo '<div class="user bg-light">';
                    }else {
                        echo '<div class="user">';
                    }
                    $usercounter++;
                ?>
                    <span class="flex1"><?= $usercounter ?></span>
                    <span class="flex2"><?= $row['name'] ?></span>
                    <span class="flex3"><?= $row['email'] ?></span>
                    <span class="flex2"><?= $row['gender'] ?></span>
                    <span class="flex2"><?= $row['email_status'] ?></span>
                    <span class="flex3 action-btns">
                        <a href="viewdata.php?userid=<?= $row['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0m13 0c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7"></path>
                            </svg>
                        </a>
                        <a href="index.php?userid=<?= $row['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1m3.385 -10.415a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415zm-4.385 -1.585l3 3"></path>
                            </svg>
                        </a href="">
                        <a href="usersdata.php?userid=<?= $row['id'] ?>">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M4 7l16 0m-10 4l0 6m4 -6l0 6m-9 -10l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12m-10 0v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                            </svg>
                        </a>
                    </span>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>
</html>