<?php
session_start();


include_once './config.php';

if (isset($_POST['save'])) {
$profile_id = $_POST['profile_id'];

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];

    $js_birth_date = explode('/', $_POST['birth_date']);
    $birth_date = "$js_birth_date[2]-$js_birth_date[0]-$js_birth_date[1]";

    $gender = $_POST['gender'];

    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];


    $sql = "UPDATE `profile` SET 
            `first_name` = '$first_name',
            `middle_name` = '$middle_name',
            `last_name` = '$last_name',
            `birth_date` = '$birth_date',
            `gender` = '$gender',
            `address` = '$address',
            `contact_no` = '$contact_no',
            `email` = '$email' 
            WHERE `profile_id` = $profile_id";

    mysqli_query($link, $sql);

    header('location:./view_profile.php?profile_id=' . $profile_id);
} else {

    $profile_id = $_GET['profile_id'];

    $sql = 'select * from `profile` where `profile_id` = ' . $profile_id;
    $result = mysqli_query($link, $sql);
    $r = mysqli_fetch_assoc($result);
    
    $db_birth_date = explode('-', $r['birth_date']);
    $birth_date = "$db_birth_date[1]/$db_birth_date[2]/$db_birth_date[0]";

   
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

                    <h3  class="text-center">Edit Profile</h3>

                    <form action="./edit_profile.php" method="POST">

                        <div class="well">

                            <input type="hidden" name="profile_id" class="input-block-level" readonly required value="<?php echo $r['profile_id']; ?>"/>

                            <input type="text" name="first_name" class="input-block-level" placeholder="First Name" required value="<?php echo $r['first_name']; ?>"/>
                            <input type="text" name="middle_name" class="input-block-level" placeholder="Middle Name" required value="<?php echo $r['middle_name']; ?>"/>
                            <input type="text" name="last_name" class="input-block-level" placeholder="Last Name" required value="<?php echo $r['last_name']; ?>"/>

                            <input type="datetime" name="birth_date" class="input-block-level" placeholder="Birth Date" required value="<?php echo $birth_date; ?>"/>

                            <select name="gender" class="input-block-level" required>
                                <option>Male</option>
                                <option>Female</option>
                            </select>

                        </div>

                        <div class="well">
                            <input type="text" name="address" class="input-block-level" placeholder="Address" required value="<?php echo $r['address']; ?>"/>
                            <input type="text" name="contact_no" class="input-block-level" placeholder="Contact No" required value="<?php echo $r['contact_no']; ?>"/>
                            <input type="email" name="email" class="input-block-level" placeholder="Email" required value="<?php echo $r['email']; ?>"/>
                        </div>

                        <div class="text-right">

                            <input name="save" type="submit" class="btn btn-info" value="Save">

                        </div>

                    </form>

                </div>
            </div>
        </div>

        <script>
            $(function () {
                $("input[type='datetime']").datepicker({
                    changeMonth: true,
                    changeYear: true,
                    showButtonPanel: true,
                    yearRange: '1900:2015'
                });
            });
        </script>

    </body>
</html>