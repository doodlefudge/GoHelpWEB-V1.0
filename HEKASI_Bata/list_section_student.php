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
                <h3>List of Students</h3>
                <div class="well">
                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>
                                <td>
                                    <strong>ID</strong>
                                </td>
                                <td>
                                    <strong>Section</strong>
                                </td>
                                <td>
                                    <strong>First Name</strong>
                                </td>
                                <td>
                                    <strong>Middle Name</strong>
                                </td>
                                <td>
                                    <strong>Last Name</strong>
                                </td>
                            </tr>                    
                        </thead>


                        <tbody>

                            <?php

                            include_once './config.php';

                            $sql = 'select sp.*,se.* from `student`st 
                                inner join `section` se 
                                on st.`section_id` = se.`section_id` 
                                inner join `profile` sp 
                                on st.`profile_id` = sp.`profile_id` 
                                where se.`section_id` = ' . $_GET['section_id'];

                            $result = mysqli_query($link, $sql);
                            $rows = array();

                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $r['profile_id'] . '</td>';
                                echo '<td>' . $r['name'] . '</td>';
                                echo '<td>' . $r['first_name'] . '</td>';
                                echo '<td>' . $r['middle_name'] . '</td>';
                                echo '<td>' . $r['last_name'] . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>

                    </table>

                </div>
            </div>


        </div>

    </body>
</html>


