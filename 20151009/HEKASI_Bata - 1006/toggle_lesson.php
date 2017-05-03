<?php
session_start();

include_once './config.php';

if (isset($_POST['yes'])) {

    $unit_id = $_POST['unit_id'];
    $lesson_id = $_POST['lesson_id'];
    $lesson_stat_id = $_POST['lesson_stat_id'];

    $sql = "UPDATE `lesson` 
            SET `lesson_stat_id` = $lesson_stat_id
            WHERE `lesson_id` = $lesson_id";
    
    mysqli_query($link, $sql);

    header("location:./list_lesson.php?unit_id=$unit_id");
}else if(isset($_POST['no'])) 
{    
    $unit_id = $_POST['unit_id'];
    header("location:./list_lesson.php?unit_id=$unit_id");
}
else {

    $unit_id = $_GET['unit_id'];
    $lesson_id = $_GET['lesson_id'];
    $lesson_stat_id = $_GET['lesson_stat_id'];
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

                    <h3  class="text-center">Set lesson to <?php echo $lesson_stat_id == 1 ? 'finish' : 'not finnish'?></h3>
 
                    <form action="./toggle_lesson.php" method="POST">

                        <div class="text-right">

                            <input type="hidden" name="unit_id" class="input-block-level" readonly required value="<?php echo $unit_id; ?>"/>
                            <input type="hidden" name="lesson_id" class="input-block-level" readonly required value="<?php echo $lesson_id; ?>"/>
                            <input type="hidden" name="lesson_stat_id" class="input-block-level" readonly required value="<?php echo $lesson_stat_id; ?>"/>

                            <input name="yes" type="submit" class="btn btn-success" value="Yes">
                            <input name="no" type="submit" class="btn btn-danger" value="No">

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>