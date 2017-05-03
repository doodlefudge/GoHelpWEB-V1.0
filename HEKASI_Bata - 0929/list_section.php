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
    <body  style="background-image: url(./img/backgroundAdmin.jpg)">

        <?php include_once './menu.php'; ?>

        <div class="container">

            <div class="well">
                <h3>List of Sections</h3>
                <div class="well">
                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <td>
                                    <strong>ID</strong>
                                </td>
                                <td>
                                    <strong>Name</strong>
                                </td>
                                <td>
                                    <strong>Access Code</strong>
                                </td>
                                <td>
                                    <strong>Assigned Teacher</strong>
                                </td>
                                <td>

                                </td>
                            </tr>                    
                        </thead>


                        <tbody>

                            <?php
                            include_once './config.php';

                            $sql = 'select * from `section` 
                                left outer join `teacher` 
                                on `section`.`teacher_id` = `teacher`.`teacher_id` 
                                left outer join `profile` 
                                on `profile`.`profile_id` = `teacher`.`profile_id`';

                            $result = mysqli_query($link, $sql);
                            $rows = array();

                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $r['section_id'] . '</td>';
                                echo '<td>' . $r['name'] . '</td>';
                                echo '<td>' . $r['access_code'] . '</td>';
                                echo '<td>' . $r['first_name'] . ' ' . $r['last_name'] . '</td>';
                                echo '<td><a class="btn btn-info" href="view_section.php?section_id=' . $r['section_id'] . '">View</a></td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>

                    </table>

                    <a href="./new_section.php" class="btn btn-info">Add New Section</a>

                </div>
            </div>


        </div>

    </body>
</html>


