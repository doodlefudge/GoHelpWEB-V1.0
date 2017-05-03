<?php
session_start();
if (isset($_POST['add'])) {

    include_once './config.php';

    $name = $_POST['name'];
    $access_code = $_POST['access_code'];
    $teacher_id = $_POST['teacher_id'];

    $sql = "INSERT INTO `section`
            VALUES (NULL,
                '$name',
                '$access_code',
                $teacher_id)";

    mysqli_query($link, $sql);

    header('location:./list_section.php');
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
    <body  style="background-image: url(./img/backgroundAdmin.jpg)">

        <?php include_once './menu.php'; ?>

        <div class="container">

            <div class="span6 offset3">

                <div class="well">

                    <h3  class="text-center">Add New Section</h3>

                    <form action="./new_section.php" method="POST">

                        <div class="well">

                            <input type="text" name="name" class="input-block-level" placeholder="Name" required/>
                            <input type="text" name="access_code" class="input-block-level" placeholder="Access Code" required/>

                            <select name="teacher_id" class="input-block-level" required>
                                <?php
                                include_once './config.php';

                                $sql = 'select * from `teacher` 
                                inner join `profile` 
                                on `profile`.`profile_id` = `teacher`.`profile_id`';

                                $result = mysqli_query($link, $sql);
                                $rows = array();

                                while ($r = mysqli_fetch_assoc($result)) {
                                    echo '<option value="' . $r['teacher_id'] . '">' . $r['first_name'] . ' ' . $r['last_name'] . '</option>';
                                }
                                ?>                            
                            </select>

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