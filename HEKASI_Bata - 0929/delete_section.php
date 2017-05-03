<?php
session_start();


include_once './config.php';

if (isset($_POST['yes'])) {

    $section_id = $_POST['section_id'];

    $sql = "DELETE FROM `section` 
            WHERE `section_id` = $section_id";

    mysqli_query($link, $sql);

    header('location:./list_section.php');
} else {

    $section_id = $_GET['section_id'];
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
    <body  style="background-image: url(./img/backgroundAdmin.jpg)">

        <?php include_once './menu.php'; ?>

        <div class="container">

            <div class="span6 offset3">

                <div class="well">

                    <h3  class="text-center">Delete Section?</h3>

                    <form action="./delete_section.php" method="POST">

                        <div class="text-right">

                            <input type="hidden" name="section_id" class="input-block-level" readonly required value="<?php echo $section_id; ?>"/>

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