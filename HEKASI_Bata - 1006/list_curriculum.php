<?php
session_start();
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
                <h3>Activities</h3>

                <?php
                include_once './config.php';

                $sql = "select * from `unit` 
                        order by ordinal";
                $result_u = mysqli_query($link, $sql);

                while ($r_u = mysqli_fetch_assoc($result_u)) {
                    echo '<div class="well">';
                    echo '<h4>' . $r_u['name'] . '</h4>';

                    $unit_id = $r_u['unit_id'];

                    $sql = "select * from `chapter` 
                            where `unit_id` = $unit_id
                            order by ordinal";

                    $result_c = mysqli_query($link, $sql);

                    while ($r_c = mysqli_fetch_assoc($result_c)) {
                        echo '<div class="well">';
                        echo '<h5>' . $r_c['name'] . '</h5>';

                        $chapter_id = $r_c['chapter_id'];

                        $sql = "select * from `lesson` 
                            where `chapter_id` = $chapter_id
                            order by ordinal";

                        $result_l = mysqli_query($link, $sql);
                        echo '<div class="well">';
                        while ($r_l = mysqli_fetch_assoc($result_l)) {
                            echo '<p>' . $r_l['name'] . '</p>';
                        }

                        echo '</div>';
                        echo '</div>';
                    }

                    echo '</div>';
                }
                ?>

            </div>
        </div>


    </div>

</body>
</html>


