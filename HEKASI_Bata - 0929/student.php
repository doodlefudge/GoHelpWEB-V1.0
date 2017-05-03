<?php
session_start();

include_once './config.php';
$err = 0;
$isactivated = false;
$profile_id = $_SESSION['profile_id'];

if (isset($_POST['submit'])) {

    $access_code = $_POST['access_code'];
    $sql = "SELECT * FROM `section` WHERE `access_code` = '$access_code'";
    $result = mysqli_query($link, $sql);

    if ($r = mysqli_fetch_assoc($result)) {

        $section_id = $r['section_id'];

        $sql = "INSERT INTO `student`
            VALUES (NULL,
                $profile_id,
                $section_id)";

        mysqli_query($link, $sql);
    } else {
        $err = 1;
    }
}


$sql = "SELECT * FROM `student` WHERE `profile_id` = $profile_id";
$result = mysqli_query($link, $sql);

if ($r = mysqli_fetch_assoc($result)) {
    $isactivated = true;
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
    <body  style="background-image: url(./img/backgroundAdmin.jpg)">

        <?php include_once './menu.php'; ?>


        <div class="container">

            <div class="row">


                <div class="span4 offset4">

                    <div class="well">

                        <h3  class="text-center">Welcome Student!</h3>
                        <?php
                        if (!$isactivated) {
                            ?>
                            <div class="well">

                                <p class="text-info">Please enter your access code to complete your registration.</p>
                                <form action="./student.php" method="POST">


                                    <input type="password" name="access_code" class="input-block-level" placeholder="Access Code" required/>

                                    <div class="text-right">

                                        <input name="submit" type="submit" class="btn btn-info" value="Submit">

                                    </div>

                                </form>

                            </div>
                            <?php
                        }

                        if ($err == 1) {
                            echo '<p class="text-error"><em>*Invalid Access Code!</em></p>';
                        }
                        ?>


                    </div>

                </div>
            </div>


        </div>
    </body>
</html>


