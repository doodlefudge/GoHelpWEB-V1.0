<?php
$first_name = '';
$middle_name = '';
$last_name = '';
$js_birth_date = '';

$gender = '';


$address = '';
$contact_no = '';
$email = '';

$username = '';

$err = 0;

if (isset($_POST['register'])) {

    include_once './config.php';

    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];

    $js_birth_date = $_POST['birth_date'];

    $arr_birth_date = explode('/', $_POST['birth_date']);
    $birth_date = "$arr_birth_date[2]-$arr_birth_date[0]-$arr_birth_date[1]";

    $gender = $_POST['gender'];

    $address = $_POST['address'];
    $contact_no = $_POST['contact_no'];
    $email = $_POST['email'];

    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];

    if ($password == $repassword) {

        $sql = "INSERT INTO `profile`
            VALUES (NULL,
                '$first_name',
                '$middle_name',
                '$last_name',
                '$birth_date',
                '$gender',
                '$address',
                '$contact_no',
                '$email')";

        mysqli_query($link, $sql);

        $profile_id = mysqli_insert_id($link);

        $sql = "INSERT INTO `account`
            VALUES (NULL,
                $profile_id,
                3,
                '$username',
                '$password')";

        mysqli_query($link, $sql);

        header('location:./reg_success.php');
    }else{
        $err = 1;
    }
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

                    <h3  class="text-center">Register</h3>

                    <form action="./register.php" method="POST">

                        <div class="well">

                            <input type="text" name="first_name" class="input-block-level" placeholder="First Name" required value="<?php echo $first_name; ?>"/>
                            <input type="text" name="middle_name" class="input-block-level" placeholder="Middle Name" required value="<?php echo $middle_name; ?>"/>
                            <input type="text" name="last_name" class="input-block-level" placeholder="Last Name" required value="<?php echo $last_name; ?>"/>

                            <input type="datetime" name="birth_date" class="input-block-level" placeholder="Birth Date" required value="<?php echo $js_birth_date; ?>"/>

                            <select name="gender" class="input-block-level" required>
                                <option>Male</option>
                                <option>Female</option>
                            </select>

                        </div>


                        <div class="well">
                            <input type="text" name="address" class="input-block-level" placeholder="Address" required value="<?php echo $address; ?>"/>
                            <input type="text" name="contact_no" class="input-block-level" placeholder="Contact No" required value="<?php echo $contact_no; ?>"/>
                            <input type="email" name="email" class="input-block-level" placeholder="Email" required value="<?php echo $email; ?>"/>
                        </div>
                        <div class="well">
                            <input type="text" name="username" class="input-block-level" placeholder="Username" required value="<?php echo $username; ?>"/>
                            <input type="password" name="password" class="input-block-level" placeholder="Password" required/>
                            <input type="password" name="repassword" class="input-block-level" placeholder="Confirm Password" required/>

                        </div>

                        <div class="text-right">

                            <input name="register" type="submit" class="btn btn-info" value="Register">

                        </div>

                    </form>
                    <?php
                    if ($err == 1) {
                        echo '<p class="text-error"><em>*Password not match!</em></p>';
                    }
                    ?>
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