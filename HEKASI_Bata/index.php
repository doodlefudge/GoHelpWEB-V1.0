<?php
session_start();

if (isset($_SESSION['account_id'])) {
    if ($_SESSION['role_id'] == 1) {
        header('location:./admin.php');
    } else if ($_SESSION['role_id'] == 2) {
        header('location:./teacher.php');
    } else if ($_SESSION['role_id'] == 3) {
        header('location:./student.php');
    }
} else {

    if (isset($_POST['login'])) {

        include_once './config.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM `account` WHERE `username` = '$username' AND `password` = '$password'";
        $result = mysqli_query($link, $sql);
        if ($r = mysqli_fetch_assoc($result)) {

            $_SESSION['account_id'] = $r['account_id'];
            $_SESSION['profile_id'] = $r['profile_id'];
            $_SESSION['username'] = $r['username'];
            $_SESSION['role_id'] = $r['role_id'];

            if ($_SESSION['role_id'] == 1) {
                header('location:./admin.php');
            } else if ($_SESSION['role_id'] == 2) {
                header('location:./teacher.php');
            } else if ($_SESSION['role_id'] == 3) {
                header('location:./student.php');
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Hekasi Bata</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/custom.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>

    </head>
    <body style="background-image: url(./img/background.png)">

        <?php include_once './menu.php'; ?>


        <div class="container">

            <div class="row">

                <div class="span6 offset3">

                    <div class="well">
                        <h3  class="text-center">Login</h3>

                        <form action="./index.php" method="POST">
                            <div class="well">
                                <input type="text" name="username" class="input-block-level" placeholder="Username"/>
                                <input type="password" name="password" class="input-block-level" placeholder="Password"/>

                                <div class="text-right">

                                    <a href="./forgot_password.php" class="btn btn-success">Forgot Password</a>
                                    <input name='login' type="submit" class="btn btn-info" value="Login">

                                </div>
                            </div>
                        </form>

                        <div class="well text-center">
                            <a href="./register.php" class="text-info"><em>New to hekasi bata adventure?</em></a>
                            <br/>
                            <a href="./register.php" class="btn btn-success">Register Now!</em></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
