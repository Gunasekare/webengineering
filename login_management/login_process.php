<!-- 
    Session Values - status
    null        = not logged in
    1           = logged in (maintained throughout the session)
    2           = invalid credentials
    3           = new user inital login (used with register_process.php)
 -->

<?php

session_start();

if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] = 1) {
        header('location: home.php');
        exit();
    } else {
        header('location: ./index.php');
        exit();
    }
} else {
    if (isset($_POST['submit'])) {

        $u = $_POST['usrname'];
        $p = $_POST['psw'];

        $con = mysqli_connect("localhost", "root", "", "user_data");
        $result = mysqli_query($con, "SELECT * FROM tbl_users WHERE username='$u' AND password='$p'");

        if ($result->num_rows) {
            //correct credentials
            $_SESSION['status'] = 1;
            $_SESSION['user'] = $u;
            header('location: ./home.php');
            exit();
        } else {
            //invalid credentials entered
            $_SESSION['status'] = 2;
            header('location: ./index.php');
            exit();
        }
    } else {
        //direct navigation
        header('location: ./index.php');
        exit();
    }
}

?>