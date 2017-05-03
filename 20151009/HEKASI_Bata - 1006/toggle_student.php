<?php
session_start();

include_once './config.php';

if (isset($_POST['yes'])) {

    $account_id = $_POST['account_id'];
    $active = $_POST['active'];

    $sql = "UPDATE `account` 
            SET `active` = $active
            WHERE `account_id` = $account_id";
    
    mysqli_query($link, $sql);

    header('location:./list_student.php');
} else {

    $account_id = $_GET['account_id'];
    $active = $_GET['active'];
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

                    <h3  class="text-center">Set student to <?php echo $active == 1 ? 'active' : 'inactive'?></h3>
 
                    <form action="./toggle_student.php" method="POST">

                        <div class="text-right">

                            <input type="hidden" name="account_id" class="input-block-level" readonly required value="<?php echo $account_id; ?>"/>
                            <input type="hidden" name="active" class="input-block-level" readonly required value="<?php echo $active; ?>"/>

                            <input name="yes" type="submit" class="btn btn-danger" value="Yes">
                            <input name="no" type="submit" class="btn btn-success" value="No">

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>