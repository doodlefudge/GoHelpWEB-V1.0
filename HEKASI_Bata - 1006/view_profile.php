<?php
session_start();

include_once './config.php';
if (isset($_GET['profile_id'])) {


    $sql = 'select * from `profile` where `profile_id` = ' . $_GET['profile_id'];
} else {
    $sql = 'select * from `profile` where `profile_id` = ' . $_SESSION['profile_id'];
}

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

            <div class="span6 offset3">

                <div class="well">
                    <h3 class="text-center">Profile Information</h3>
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

                    <div class="text-right">
                        <?php
                        if ($_SESSION['role_id'] == 1 && $r['profile_id'] != 1) {
                            ?>
                            <a href="delete_profile.php?profile_id=<?php echo $r['profile_id']; ?>" class="btn btn-info">Delete Profile</a>
                            <?php
                        }
                        if ($_SESSION['role_id'] == 1 || $r['profile_id'] == $_SESSION['profile_id']) {
                            ?>

                            <a href="edit_profile.php?profile_id=<?php echo $r['profile_id']; ?>" class="btn btn-info">Edit Profile</a>
                            <?php
                        }
                        if ($r['profile_id'] == $_SESSION['profile_id']) {
                            
                            ?>
                            <a href="change_password.php" class="btn btn-success">Change Password</a>
                            <?php
                        }
                        ?>
                    </div>

                </div>

            </div>

        </div>

    </body>

</html>


