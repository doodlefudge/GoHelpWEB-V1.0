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
                <h3>List of Sections</h3>
                <div class="well">
                    <table class="table table-bordered table-hover">

                        <thead>
                            <tr>                              
                                <td>
                                    <strong>Database Name</strong>
                                </td>
                                <td>
                                    <strong>Date Archived</strong>
                                </td>
                            </tr>                    
                        </thead>


                        <tbody>

                            <?php
                            include_once './config.php';

                            $sql = "show databases 
                                    where `database` like 'cai%' 
                                    AND `database` <> 'cai'";

                            $result = mysqli_query($link, $sql);
                            $rows = array();

                            while ($r = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $r['Database'] . '</td>';

                                $strdate = substr($r['Database'], 3, 14);
                                $strdate = substr_replace($strdate, ':', 12, 0);
                                $strdate = substr_replace($strdate, ':', 10, 0);
                                $strdate = substr_replace($strdate, ' ', 8, 0);
                                $strdate = substr_replace($strdate, '-', 6, 0);
                                $strdate = substr_replace($strdate, '-', 4, 0);
                                echo '<td>' . $strdate . '</td>';
                                echo '</tr>';
                            }
                            ?>
                        </tbody>

                    </table>
                    <div class="text-right">
                         <a class="btn btn-info" href ="archive.php">Archive Database</a>
                    </div>
                   
                    
                </div>
            </div>


        </div>

    </body>
</html>


