<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>MyPages | Home</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] != 1) {
            header('location: ./index.php');
            exit();
        }
    } else {
        header('location: ./index.php');
        exit();
    }
    ?>

    <h1>MyPages | Home</h1>
    <br />
    <a href="./password.php">Change Password</a>
    <br />
    <a href="./logoff.php">Logoff</a>
</body>

</html>