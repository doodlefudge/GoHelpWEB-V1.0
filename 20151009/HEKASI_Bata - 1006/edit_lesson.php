<?php
session_start();


include_once './config.php';

if (isset($_POST['save'])) {
    $lesson_id = $_POST['lesson_id'];
    $unit_id = $_POST['unit_id'];

    $lesson = $_POST['lesson'];
    $answer = $_POST['answer'];

    $sql = "UPDATE `lesson` SET 
            `lesson` = '$lesson',
            `answer` = '$answer'
            WHERE `lesson_id` = $lesson_id";

    mysqli_query($link, $sql);

    header('location:./list_lesson.php?unit_id=' . $unit_id);
} else {

    $lesson_id = $_GET['lesson_id'];
    $unit_id = $_GET['unit_id'];

    $sql = 'select * from `lesson` where `lesson_id` = ' . $lesson_id;
    $result = mysqli_query($link, $sql);
    $r = mysqli_fetch_assoc($result);
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

                    <h3  class="text-center">Edit Lesson</h3>

                    <form action="./edit_lesson.php" method="POST">

                        <div class="well">

                            <input type="hidden" name="unit_id" class="input-block-level" readonly required value="<?php echo $r['unit_id']; ?>"/>
                            <input type="hidden" name="lesson_id" class="input-block-level" readonly required value="<?php echo $r['lesson_id']; ?>"/>

                            <input type="text" name="lesson" class="input-block-level" placeholder="Question" required value="<?php echo $r['lesson']; ?>"/>
                            <input type="text" name="answer" class="input-block-level" placeholder="Answer" required value="<?php echo $r['answer']; ?>"/>
                            
                        </div>

                        <div class="text-right">

                            <input name="save" type="submit" class="btn btn-info" value="Save">

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>