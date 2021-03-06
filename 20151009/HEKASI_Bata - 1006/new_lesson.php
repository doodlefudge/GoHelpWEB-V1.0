<?php
session_start();



if (isset($_POST['add'])) {

    include_once './config.php';

    $unit_id = $_POST['unit_id'];
    $lesson = $_POST['lesson'];
    $answer = $_POST['answer'];

    $sql = "INSERT INTO `lesson`
            VALUES ($unit_id,
                NULL,
                '$lesson',
                '$answer',
                 0)";

    mysqli_query($link, $sql);

    header("location:./list_lesson.php?unit_id=$unit_id");
} else {
    $unit_id = $_GET['unit_id'];
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

                    <h3  class="text-center">Add New Lesson</h3>

                    <form action="./new_lesson.php" method="POST">

                        <div class="well">

                            <input type="hidden" name="unit_id" class="input-block-level" value="<?php echo $unit_id; ?>" required/>
                            <input type="text" name="lesson" class="input-block-level" placeholder="Question" required/>
                            <input type="text" name="answer" class="input-block-level" placeholder="Answer" required/>
                            
                        </div>

                        <div class="text-right">

                            <input name="add" type="submit" class="btn btn-info" value="Save">

                        </div>

                    </form>

                </div>
            </div>
        </div>

    </body>
</html>