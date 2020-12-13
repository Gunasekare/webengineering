<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>MyPages | Sign Up</title>
</head>

<body>

    <?php
    session_start();
    if (isset($_SESSION['status'])) {
        if ($_SESSION['status'] == 1) {
            header('location: ./index.php');
            exit();
        }
    }
    if (isset($_SESSION['register'])) {
        switch ($_SESSION['register']) {
            case 1:
                echo "Username already taken.";
                unset($_SESSION['register']);
                break;
            case 2:
                echo "Passwords entered do not match.";
                unset($_SESSION['register']);
                break;
            default:
                echo "Unimplemented register value: " . $_SESSION['register'];
                session_destroy();
                break;
        }
    }
    ?>

    <h1>MyPages | Sign Up</h1>

    <form action="register_process.php" method="post">
        <input type="text" name="usrnm" placeholder="Username" required />
        <br />
        <input type="password" name="newpsw1" placeholder="Enter password" required />
        <br />
        <input type="password" name="newpsw2" placeholder="Confirm password" required />
        <br /><br />
        <input type="submit" value="Register" name="submit" />
    </form>
    <br />
    <a href="./index.php">Back to Sign In</a>

</body>

</html>