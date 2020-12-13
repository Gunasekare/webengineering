<!--
    Session Values - password
    null        = no password change
    1           = new passwords do not match
    2           = old password incorrect
    3           = password changed successfully    

-->

<?php

session_start();
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] != 1) {
        header('location: ./index.php');
        exit();
    } else {

        if (isset($_POST['submit'])) {
            $old = $_POST['oldpsw'];
            $new1 = $_POST['newpsw1'];
            $new2 = $_POST['newpsw2'];
            $u = $_SESSION['user'];

            if ($new1 != $new2) {
                $_SESSION['password'] = 1;
                header('location: ./password.php');
                exit();
            }

            $con = mysqli_connect("localhost", "root", "", "user_data");
            $result = mysqli_query($con, "SELECT * FROM tbl_users WHERE username='$u'");
            $userdata = mysqli_fetch_assoc($result);

            if ($userdata['password'] != $old) {
                $_SESSION['password'] = 2;
                header('location: ./password.php');
                exit();
            } else {
                mysqli_query($con, "UPDATE tbl_users SET password='$new1' WHERE username='$u' AND password='$old'");
                $_SESSION['password'] = 3;
                header('location: ./password.php');
                exit();
            }
        } else {
            header('location: ./password.php');
            exit();
        }
    }
} else {
    header('location: ./index.php');
    exit();
}
?>