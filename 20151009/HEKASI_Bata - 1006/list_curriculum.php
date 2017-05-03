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

                    $sql = "select * from `lesson` 
                            where `unit_id` = $unit_id";

                    $result_c = mysqli_query($link, $sql);
                    ?>

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
                                    <strong>Status</strong>
                                </td>
                            </tr>                    
                        </thead>

                        <tbody>

                            <?php
                            while ($r_c = mysqli_fetch_assoc($result_c)) {

                                echo '<tr>';
                                echo '<td><h5>' . $r_c['lesson'] . '</h5></td>';
                                echo '<td><h5>' . $r_c['answer'] . '</h5></td>';
                                echo '<td><h5>' . ($r_c['lesson_stat_id'] == 1 ? 'Finish' : 'Not Finish') . '</h5></td>';
                                echo '</tr>';
                                
                            }
                            ?>


                        <tbody>
                    </table>

    <?php
    echo '</div>';
}
?>

            </div>
        </div>


    </div>

</body>
</html>


