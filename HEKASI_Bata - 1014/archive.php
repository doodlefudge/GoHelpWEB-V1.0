<?php
session_start();
include_once './config.php';

date_default_timezone_set('Asia/Manila');

if (isset($_POST['yes'])) {

    $dbname = 'cai' . date('YmdHis');

    $sql = "CREATE DATABASE IF NOT EXISTS `$dbname`;";

    mysqli_query($link, $sql);

    $db_selected = mysqli_select_db($link, $dbname);

    $sql = "CREATE TABLE IF NOT EXISTS `account` (
            `account_id` int(11) NOT NULL,
            `profile_id` int(11) NOT NULL,
            `role_id` int(11) NOT NULL,
            `username` varchar(20) NOT NULL,
            `password` varchar(20) NOT NULL,
            `active` int(1) NOT NULL DEFAULT '1',
            PRIMARY KEY (`account_id`),
            UNIQUE KEY `PROFILEID` (`profile_id`),
            UNIQUE KEY `USERNAME` (`username`),
            KEY `USERS_USERGROUPID_idx` (`role_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS `chapter` (
            `chapter_id` int(11) NOT NULL,
            `unit_id` int(11) NOT NULL,
            `name` varchar(50) NOT NULL,
            `ordinal` int(11) NOT NULL,
            PRIMARY KEY (`chapter_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS `lesson` (
            `lesson_id` int(11) NOT NULL,
            `chapter_id` int(11) NOT NULL,
            `name` varchar(50) NOT NULL,
            `ordinal` int(11) NOT NULL,
            PRIMARY KEY (`lesson_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS `profile` (
            `profile_id` int(11) NOT NULL,
            `first_name` varchar(20) NOT NULL,
            `middle_name` varchar(20) NOT NULL,
            `last_name` varchar(20) NOT NULL,
            `birth_date` date NOT NULL,
            `gender` varchar(10) NOT NULL,
            `address` varchar(50) NOT NULL,
            `contact_no` varchar(20) NOT NULL,
            `email` varchar(50) NOT NULL,
            PRIMARY KEY (`profile_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS `role` (
            `role_id` int(11) NOT NULL,
            `name` varchar(20) NOT NULL,
            PRIMARY KEY (`role_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS `section` (
            `section_id` int(11) NOT NULL,
            `name` varchar(20) NOT NULL,
            `access_code` varchar(20) NOT NULL,
            `teacher_id` int(11) NOT NULL,
            PRIMARY KEY (`section_id`),
            UNIQUE KEY `access_code` (`access_code`),
            UNIQUE KEY `access_code_2` (`access_code`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS `student` (
            `student_id` int(11) NOT NULL,
            `profile_id` int(11) NOT NULL,
            `section_id` int(11) NOT NULL,
            PRIMARY KEY (`student_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS `teacher` (
            `teacher_id` int(11) NOT NULL,
            `profile_id` int(11) NOT NULL,
            PRIMARY KEY (`teacher_id`),
            UNIQUE KEY `teacher_id_2` (`teacher_id`),
            UNIQUE KEY `teacher_id_3` (`teacher_id`),
            UNIQUE KEY `profile_id` (`profile_id`),
            KEY `teacher_id` (`teacher_id`),
            KEY `profile_id_2` (`profile_id`),
            KEY `profile_id_3` (`profile_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "CREATE TABLE IF NOT EXISTS `unit` (
            `unit_id` int(11) NOT NULL,
            `name` varchar(50) NOT NULL,
            `ordinal` int(11) NOT NULL,
            PRIMARY KEY (`unit_id`)
          ) ENGINE=InnoDB  DEFAULT CHARSET=latin1;";

    mysqli_query($link, $sql);

    $sql = "insert into `account` select * from `cai`.`account`";
    mysqli_query($link, $sql);

    $sql = "insert into `chapter` select * from `cai`.`chapter`";
    mysqli_query($link, $sql);

    $sql = "insert into `lesson` select * from `cai`.`lesson`";
    mysqli_query($link, $sql);

    $sql = "insert into `profile` select * from `cai`.`profile`";
    mysqli_query($link, $sql);

    $sql = "insert into `role` select * from `cai`.`role`";
    mysqli_query($link, $sql);

    $sql = "insert into `section` select * from `cai`.`section`";
    mysqli_query($link, $sql);

    $sql = "insert into `student` select * from `cai`.`student`";
    mysqli_query($link, $sql);

    $sql = "insert into `teacher` select * from `cai`.`teacher`";
    mysqli_query($link, $sql);

    $sql = "insert into `unit` select * from `cai`.`unit`";
    mysqli_query($link, $sql);


    $db_selected = mysqli_select_db($link, 'cai');

    $sql = "delete from `account` where `account_id` <> 1";
    mysqli_query($link, $sql);

    $sql = "delete from `chapter`";
    mysqli_query($link, $sql);

    $sql = "delete from `lesson`";
    mysqli_query($link, $sql);

    $sql = "delete from `profile` where `profile_id` <> 1";
    mysqli_query($link, $sql);

    $sql = "delete from `section`";
    mysqli_query($link, $sql);

    $sql = "delete from `student`";
    mysqli_query($link, $sql);

    $sql = "delete from `teacher`";
    mysqli_query($link, $sql);

    $sql = "delete from `unit`";
    mysqli_query($link, $sql);


    header("location:./list_archive.php");
} else if (isset($_POST['no'])) {

    header("location:./list_archive.php");
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

                    <h3  class="text-center">Archive database?</h3>

                    <form action="./archive.php" method="POST">

                        <div class="text-right">

                            <input name="yes" type="submit" class="btn btn-danger" value="Yes">
                            <input name="no" type="submit" class="btn btn-success" value="No">

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </body>
</html>