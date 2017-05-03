<?php
session_start();

include_once './config.php';

$sql = 'select * from `profile` 
    inner join `student` on `profile`.`profile_id` = `student`.`profile_id` 
    inner join `section` on `student`.`section_id` = `section`.`section_id`    
    where `profile`.`profile_id` = ' . $_SESSION['profile_id'];

$result = mysqli_query($link, $sql);
$r = mysqli_fetch_assoc($result);
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

            <div class="span4">

                <div class="well">
                    <h3>My Profile</h3>
                    <table class='table table-bordered table-hover'>
                        <tr>
                            <td><strong>First Name</strong></td>
                            <td><?php echo $r['first_name']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Middle Name</strong></td>
                            <td><?php echo $r['middle_name']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Last Name</strong></td>
                            <td><?php echo $r['last_name']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Birth Date</strong></td>
                            <td><?php echo $r['birth_date']; ?></td>
                        </tr>                        
                        <tr>
                            <td><strong>Gender</strong></td>
                            <td><?php echo $r['gender']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Address</strong></td>
                            <td><?php echo $r['address']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Contact No</strong></td>
                            <td><?php echo $r['contact_no']; ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email</td>
                            <td><?php echo $r['email']; ?></td>
                        </tr>
                    </table>

                </div>

            </div>


        </div>

    </body>
</html>


