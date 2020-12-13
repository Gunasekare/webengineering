<!--
    Session Values - register
    null        = no registration
    1           = username already taken
    2           = passwords do not match

    Session Values - status
    3           = new user inital login 

-->

<?php
session_start();
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] == 1) {
        header('location: ./home.php');
        exit();
    }
} elseif (isset($_POST['submit'])) {
    $newpsw1 = $_POST['newpsw1'];
    $newpsw2 = $_POST['newpsw2'];

    if ($newpsw1 != $newpsw2) {
        $_SESSION['register'] = 2;
        header('location: ./register.php');
        exit();
    }

    $u = $_POST['usrnm'];

    $con = mysqli_connect("localhost", "root", "", "user_data");
    $result = mysqli_query($con, "SELECT * FROM tbl_users WHERE username='$u'");

    if ($result->num_rows) {
        $_SESSION['register'] = 1;
        header('location: ./register.php');
        exit();
    }
    mysqli_query($con, "INSERT INTO tbl_users VALUES ('$u', '$newpsw1')");
    $_SESSION['status'] = 3;
    header('location: ./index.php');
    exit();
} else {
    header('location: ./index.php');
    exit();
}
?>