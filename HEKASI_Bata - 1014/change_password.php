<?php
session_start();
$err = 0;

if (isset($_POST['change_password'])) {

    include_once './config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];
    $newpassword = $_POST['newpassword'];
    $repassword = $_POST['repassword'];

    if ($newpassword == $repassword) {

        if ($newpassword == $password) {
            header("location:./change_password_success.php");
        } else {
            $sql = "UPDATE `account`
                    SET `password` = '$newpassword'
                    WHERE `username` = '$username'
                    AND `password` = '$password'";
            mysqli_query($link, $sql);
            $data = mysqli_affected_rows($link);

            if ($data == 1) {
                header("location:./change_password_success.php");
            } else {
                $err = 2;
            }
        }
    } else {
        $err = 1;
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
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.structure.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.theme.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    </head>
    <body  style="background-image: url(./img/background2.jpg)">

        <?php include_once './menu.php'; ?>

        <div class="container">

            <div class="span6 offset3">

                <div class="well">

                    <h3  class="text-center">Register</h3>

                    <form action="./change_password.php" method="POST">

                        <div class="well">
                            <input type="text" name="username" class="input-block-level" placeholder="Username" readonly value="<?php echo $_SESSION['username']; ?>"/>
                            <input type="password" name="password" class="input-block-level" placeholder="Password" required/>
                            <input type="password" name="newpassword" class="input-block-level" placeholder="New Password" required/>
                            <input type="password" name="repassword" class="input-block-level" placeholder="Confirm New Password" required/>
                        </div>

                        <div class="text-right">

                            <input name="change_password" type="submit" class="btn btn-info" value="Change">

                        </div>

                    </form>
                    <?php
                    if ($err == 1) {
                        echo '<p class="text-error"><em>*Password not match!</em></p>';
                    } else if ($err == 2) {
                        echo '<p class="text-error"><em>*Invalid Password!</em></p>';
                    }
                    ?>

                </div>
            </div>
        </div>

    </body>
</html>