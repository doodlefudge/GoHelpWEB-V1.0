<?php
session_start();

$chapter_id = $_GET['chapter_id'];
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
                                    <strong>Name</strong>
                                </td>
                                <td>

                                </td>
                            </tr>                    
                        </thead>


                        <tbody>

                            <?php
                            include_once './config.php';

                            $sql = "select * from `lesson` 
                                    where `chapter_id` = $chapter_id
                                    order by ordinal";
                            $result = mysqli_query($link, $sql);

                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $r['name'] . '</td>';
                                echo '<td><a class="btn btn-info" href="list_lesson.php?chapter_id=' . $r['chapter_id'] . '">View</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                    <a href="./new_lesson.php?chapter_id=<?php echo $chapter_id; ?>" class="btn btn-info">Add</a>

                </div>
            </div>


        </div>

    </body>
</html>


