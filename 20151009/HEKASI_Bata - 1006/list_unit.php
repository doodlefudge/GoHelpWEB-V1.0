<?php session_start(); ?>
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
                <h3>Units</h3>
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

                            $sql = 'select * from `unit` 
                                    order by ordinal';
                            $result = mysqli_query($link, $sql);
                            $rows = array();

                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $r['name'] . '</td>';
                                echo '<td><a class="btn btn-info" href="list_lesson.php?unit_id=' . $r['unit_id'] . '">Lesson</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                    <a href="./new_unit.php" class="btn btn-info">Add Unit</a>

                </div>
            </div>


        </div>

    </body>
</html>


