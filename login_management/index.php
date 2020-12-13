<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Welcome to MyPages</title>
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION['status'])) {
        switch ($_SESSION['status']) {
            case 1:
                header('location: home.php');
                break;
            case 2:
                echo "Invalid username or password.";
                unset($_SESSION['status']);
                break;
            default;
                echo "Unimplemented status: " . $_SESSION['status'];
                session_destroy();
                break;
        }
    }
    ?>

    <h1>Welcome to MyPages</h1>

    <form action="process.php" method="post">
        <input type="text" name="usrname" placeholder="Username" required />
        <br />
        <input type="password" name="psw" placeholder="Password" required />
        <br /><br />
        <input type="submit" value="Login" name="submit" />
    </form>
</body>

</html>