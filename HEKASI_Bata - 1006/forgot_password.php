<?php
$err = 0;


if (isset($_POST['email'])) {

    require './mailer.php';
    include_once './config.php';


    $email = $_POST['email'];



    $sql = "select * from `profile` where `email` = '$email'";
    $result = mysqli_query($link, $sql);
    if ($r = mysqli_fetch_assoc($result)) {

        $profile_id = $r['profile_id'];
        $first_name = $r['first_name'];
        $last_name = $r['last_name'];
        $sql = "select * from `account` where `profile_id` = $profile_id";

        $result = mysqli_query($link, $sql);

        if ($r = mysqli_fetch_assoc($result)) {

            $username = $r['username'];
            $password = $r['password'];
            $subject = 'Forgot Password';
            smtpmailer($email, $subject, "Hi $first_name $last_name,\nYour username is $username and your password is $password.");
            header('location:./forgot_password_notification.php');
        } else {
            $err = 1;
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
        <script src="js/jquery-2.1.4.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body  style="background-image: url(./img/background2.jpg)">

        <?php include_once './menu.php'; ?>

        <div class="container">

            <div class="row">

                <div class="span6 offset3">

                    <div class="well">

                        <h3  class="text-center">Forgot Password</h3>

                        <form action="./forgot_password.php" method="POST">
                            <div class="well">
                                <input type="email" name="email" class="input-block-level" placeholder="Email Address"/>

                                <div class="text-right">

                                    <input name='submit' type="submit" class="btn btn-info" value="Submit">

                                </div>
                            </div>
                        </form>
                        <?php
                        if ($err == 1) {
                            echo '<p class="text-error"><em>*Email is not registered in system!</em></p>';
                        }
                        ?>
                    </div>
                </div>
            </div>

        </div>

    </body>
</html>



