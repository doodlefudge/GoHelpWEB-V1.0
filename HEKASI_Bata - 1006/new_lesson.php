<?php
session_start();



if (isset($_POST['add'])) {

    include_once './config.php';

    $chapter_id = $_POST['chapter_id'];
    $name = $_POST['name'];
    $ordinal = $_POST['ordinal'];

    $sql = "INSERT INTO `lesson`
            VALUES (NULL,
                $chapter_id,
                '$name',
                $ordinal)";

    mysqli_query($link, $sql);

    header("location:./list_lesson.php?chapter_id=$chapter_id");
} else {
    $chapter_id = $_GET['chapter_id'];
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

                            <input type="hidden" name="chapter_id" class="input-block-level" value="<?php echo $chapter_id; ?>" required/>
                            <input type="text" name="name" class="input-block-level" placeholder="Name" required/>
                            <input type="number" name="ordinal" class="input-block-level" placeholder="Ordinal" required/>

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