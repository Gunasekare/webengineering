<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>MyPages | Password Reset</title>
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
    if (isset($_SESSION['password'])) {
        switch ($_SESSION['password']) {
            case 1:
                echo "New passwords entered do not match.";
                unset($_SESSION['password']);
                break;
            case 2:
                echo "Old password is incorrect.";
                unset($_SESSION['password']);
                break;
            case 3:
                echo "Password changed succesfully.";
                unset($_SESSION['password']);
                break;
            default;
                echo "Unimplemented status: " . $_SESSION['password'];
                session_destroy();
                break;
        }
    }
    ?>

    <h1>MyPages | Password Reset</h1>

    <form action="password_process.php" method="post">
        <input type="password" name="oldpsw" placeholder="Enter old password" required />
        <br />
        <input type="password" name="newpsw1" placeholder="Enter new password" required />
        <br />
        <input type="password" name="newpsw2" placeholder="Confirm new password" required />
        <br /><br />
        <input type="submit" value="Change Password" name="submit" />
    </form>
    <br />
    <a href="./home.php">Back to Home</a>
</body>

</html>