<?php
session_start();

$unit_id = $_GET['unit_id'];
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

            <div class="well">
                <h3>Lessons</h3>
                <div class="well">
                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <td>
                                    <strong>Lesson</strong>
                                </td>
                                <td>
                                    <strong>Answer</strong>
                                </td>
                                <td>
                                   
                                </td>
                            </tr>                    
                        </thead>


                        <tbody>

                            <?php
                            include_once './config.php';

                            $sql = "select * from `lesson` 
                                    where `unit_id` = $unit_id";
                            $result = mysqli_query($link, $sql);

                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $r['lesson'] . '</td>';
                                echo '<td>' . $r['answer'] . '</td>';
                                echo '<td>';
                                echo ' <a class="btn btn-info" href="edit_lesson.php?unit_id=' . $r['unit_id'] . '&lesson_id=' . $r['lesson_id'] . '">Edit</a>';
                                echo '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                    <a href="./new_lesson.php?unit_id=<?php echo $unit_id; ?>" class="btn btn-info">Add Lesson</a>

                </div>
            </div>
        </div>

    </body>
</html>


