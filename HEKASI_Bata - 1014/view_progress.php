<?php
session_start();

include_once './config.php';

//$user_id = $_GET['user_id'];
$user_id = "pantera";
$sql = " SELECT `user_id`,  `unit_id` FROM `game_obj_tbl`    ";

$result = mysqli_query($link, $sql);
$r = mysqli_fetch_assoc($result);
//$row = mysql_fetch_assoc($r);
   
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

                
            <div class="span12">
                <div class="well">
                    <h3>Student's Progress</h3>
                    <div class="well">
                        <table class="table table-bordered table-hover">

                            <thead>
                                <tr>
                                    <td>
                                        <strong>Student ID</strong>
                                    </td>
                                    
                                    <td>
                                        <strong>Current Unit</strong>
                                    </td>
                                
                                </tr>                    
                            </thead>


                            <tbody>

                                <?php
                                include_once './config.php';

                                $sql = "select `user_id`,`unit_id` FROM game_obj_tbl";

                                // p.first_name, p.last_name,g.unit_id from profile p 
                                //         left join account a on a.profile_id = p.profile_id 
                                //         left join game_obj_tbl g on g.unit_id = a.username 
                                //             where a.role_id = '3' ";

                                $result = mysqli_query($link, $sql);
                                $rows = array();

                                while ($r = mysqli_fetch_assoc($result)) {
                                    echo '<tr>';
                                    echo '<td>' . $r['user_id'] . '</td>';
                                                                     
                                    echo '<td>' . $r['unit_id'] . '</td>';
                                    echo '</tr>';
                                }
                                ?>
                            </tbody>

                        </table>

                    </div>
                </div>
            </div>

        </div>

    </body>
</html>


