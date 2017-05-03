<?php
session_start();


include_once './config.php';

if (isset($_POST['save'])) {
    $section_id = $_POST['section_id'];

    $name = $_POST['name'];
    $access_code = $_POST['access_code'];
    $teacher_id = $_POST['teacher_id'];


    $sql = "UPDATE `section` SET 
            `name` = '$name',
            `access_code` = '$access_code',
            `teacher_id` = '$teacher_id' 
            WHERE `section_id` = $section_id";

    mysqli_query($link, $sql);

    header('location:./view_section.php?section_id=' . $section_id);
} else {

    $section_id = $_GET['section_id'];

    $sql = 'select * from `section` where `section_id` = ' . $section_id;
    $result = mysqli_query($link, $sql);
    $r = mysqli_fetch_assoc($result);

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
    <body  style="background-image: url(./img/background2.jpg)">

        <?php include_once './menu.php'; ?>

        <div class="container">

            <div class="span6 offset3">

                <div class="well">

                    <h3  class="text-center">Edit Section</h3>

                    <form action="./edit_section.php" method="POST">

                        <div class="well">

                            <input type="hidden" name="section_id" class="input-block-level" readonly required value="<?php echo $r['section_id']; ?>"/>

                            <input type="text" name="name" class="input-block-level" placeholder="Name" required value="<?php echo $r['name']; ?>"/>
                            <input type="text" name="access_code" class="input-block-level" placeholder="Access Code" required value="<?php echo $r['access_code']; ?>"/>

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

                            <input name="save" type="submit" class="btn btn-info" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>