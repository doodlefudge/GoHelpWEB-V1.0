<?php
session_start();


include_once './config.php';

if (isset($_POST['yes'])) {

    $profile_id = $_POST['profile_id'];

    $sql = "DELETE FROM `profile` 
            WHERE `profile_id` = $profile_id";

    mysqli_query($link, $sql);

    $sql = "DELETE FROM `account` 
            WHERE `profile_id` = $profile_id";

    mysqli_query($link, $sql);

    $sql = "DELETE FROM `student` 
            WHERE `profile_id` = $profile_id";

    mysqli_query($link, $sql);
    
    $sql = "DELETE FROM `teacher` 
            WHERE `profile_id` = $profile_id";

    mysqli_query($link, $sql);

    header('location:./list_section.php');
} else {

    $profile_id = $_GET['profile_id'];
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

                    <h3  class="text-center">Delete Profile?</h3>

                    <form action="./delete_profile.php" method="POST">

                        <div class="text-right">

                            <input type="hidden" name="profile_id" class="input-block-level" readonly required value="<?php echo $profile_id; ?>"/>

                            <input name="yes" type="submit" class="btn btn-danger" value="Yes">
                            <input name="no" type="submit" class="btn btn-success" value="No">

                        </div>

                    </form>

                </div>
            </div>
        </div>

        <script>
            $(function () {
                $("input[type='datetime']").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    yearRange: '1900:2015'
                });
            });
        </script>

    </body>
</html>