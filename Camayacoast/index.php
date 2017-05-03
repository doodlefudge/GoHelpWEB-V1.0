<?php include_once("inc/templates/header.php");
$_SESSION['alert'] = "" ?>
<!-- Navigation -->
<?php //include_once("inc/templates/navbar.php");?>
<?php
date_default_timezone_set('Asia/Manila');
error_reporting(-1);
ini_set('display_errors', 1);
include_once('inc/connection/connection.php');
if(isset($_REQUEST['schedule_id'])){
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $qry = "UPDATE schedule_info SET `schedule_status` = '1' WHERE `schedule_ID` = :schedule_id";
    $schedule_id = $_REQUEST['schedule_id'];
    $stmt = $pdo->prepare($qry);
    $stmt->bindParam(":schedule_id",$schedule_id);

    $stmt->execute();
    $_SESSION['alert'] = "<p>Your confirmation has been sent to Camaya Coast.</p><p>We promise to make contact as soon as possible</p> ";

}


if (isset($_POST['submit'])) {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $inquire_id = "INQ" . (((int)$pdo->query('select count(*) from customer_inquiry')->fetchColumn()) + 1);
    $sql = "INSERT INTO customer_inquiry values (:inquire_id,:inquirer_name,:inquirer_email,:inquirer_phone,:dateNow)";
    $stmt = $pdo->prepare($sql);
    $inquirer_name = $_POST['inquirer_name'];
    $inquirer_email = $_POST['inquirer_email'];
    $inquirer_phone = $_POST['inquirer_phone'];
    $dateNow = date('m/d/Y h:i:s a', time());
    $stmt->bindParam(':inquire_id', $inquire_id);
    $stmt->bindParam(':inquirer_name', $inquirer_name);
    $stmt->bindParam(':inquirer_email', $inquirer_email);
    $stmt->bindParam(':inquirer_phone', $inquirer_phone);
    $stmt->bindParam(':dateNow', $dateNow);

    $stmt->execute();

    $_SESSION['alert'] = "<p>Your contact details has been saved.</p><p>We promise to make contact as soon as possible</p> ";
}


?>
<style>
    body {
        padding-top: 70px; /* Required padding for .navbar-fixed-top. Change if height of navigation changes. */
        background: url('assets/bg.jpg') no-repeat center center fixed;
        background-color: #37AAE0;
    }

    #loader {
        position: absolute;
        left: 50%;
        top: 50%;
        z-index: 1;
        width: 150px;
        height: 150px;
        margin: -75px 0 0 -75px;
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 120px;
        height: 120px;
        -webkit-animation: spin 2s linear infinite;
        animation: spin 2s linear infinite;
    }

    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }
        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }
        100% {
            transform: rotate(360deg);
        }
    }

    /* Add animation to "page content" */
    .animate-bottom {
        position: relative;
        -webkit-animation-name: animatebottom;
        -webkit-animation-duration: 1s;
        animation-name: animatebottom;
        animation-duration: 1s
    }

    @-webkit-keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }
        to {
            bottom: 0px;
            opacity: 1
        }
    }

    @keyframes animatebottom {
        from {
            bottom: -100px;
            opacity: 0
        }
        to {
            bottom: 0;
            opacity: 1
        }
    }

    #myDiv {
        display: none;
        text-align: center;
    }
</style>
<div id="loader"></div>
<!-- Page Content -->
<div id="myDiv" style="display:none;" class="animate-bottom">

    <div class="container animate-bottom" id = "category_list" style = 'font-family: Forte;'>
        <div class="row">
            <br>
            <br>
            <br>
            <br><br>
            <br><br>
            <br><br>
            <br><br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="gallery.php">
                    <img class="img-responsive" src="assets/category_logo/my_profile.jpg"
                         style="width:200px;height:163px;" alt="">
                </a>
                <div class="caption">
                    <h3>My Profile</h3>


                </div>
            </div>

            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="assets/category_logo/property.jpg"
                         style="width:200px;height:163px;" alt="">
                </a>
                <div class="caption">
                    <h3>How to own?</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="#">
                    <img class="img-responsive" src="assets/category_logo/read.jpg" style="width:200px;height:163px;"
                         alt="">
                </a>
                <div class="caption">
                    <h3>R.E.A.D.</h3>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="select.php">
                    <img class="img-responsive" src="assets/category_logo/stay.jpg" style="width:200px;height:163px;"
                         alt="">
                </a>
                <div class="caption">
                    <h3>StayCation</h3>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-xs-6 thumb">
                <a class="thumbnail" href="video_gallery.php">
                    <img class="img-responsive" src="assets/category_logo/my_vids.png" style="width:200px;height:163px;"
                         alt="">
                </a>
                <div class="caption">
                    <h3>My Videos</h3>

                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                <a class="thumbnail" href="contact_us.php">
                    <img class="img-responsive" src="assets/category_logo/contact.jpg" style="width:200px;height:163px;"
                         alt="">
                </a>
                <div class="caption">
                    <h3>Reach Us At...</h3>


                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 thumb">
                <a class="thumbnail" href="events.php">
                    <img class="img-responsive" src="assets/category_logo/events.jpg" style="width:200px;height:163px;"
                         alt="">
                </a>
                <div class="caption">
                    <h3>Events on 2017</h3>

                </div>
            </div>

        </div>

    </div>

</div>

<div class="modal fade" id="myModal" class="myModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel"
     aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="memberModalLabel">Welcome to Camaya Resort's Website</h4>
            </div><?php if ($_SESSION['alert'] == "") {
                ?>
                <div class="modal-body">

                    <form method="post" action="#">


                        <p align="center">Hello! We at Camaya Hotel and Resorts value your feedback!.<BR>
                            If you could leave your contact details and your inquiries, we would <BR>
                            gladly read them and reply as soon as possible
                        </p>
                        <div>
                            <div class="form-group">
                                <label for="name" class="col-xl-3 cols-sm-2 control-label">Your Name</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="inquirer_name" id="inquirer_name"
                                               placehmantolder="Enter your Name"/>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="col-xl-3 cols-sm-2 control-label">Your Email</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope fa"
                                                                           aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="inquirer_email"
                                               id="inquirer_email" placeholder="Enter your Email"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-xl-3 cols-sm-2 control-label">Your Contact Number</label>
                                <div class="cols-sm-10">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-phone fa"
                                                                           aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" name="inquirer_phone"
                                               id="inquirer_phone" placeholder="Enter your Phone Number"/>
                                    </div>
                                </div>
                            </div>

                        </div>


                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success" name="submit" value="Submit">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                </div>
                </form><?php
            } else { ?>

                <div class="modal-body">

                    <p align="center">
                        <?php echo $_SESSION['alert']; ?>
                    </p>
                </div>
                <?php
                $_SESSION['alert'] = "";
            }
            ?>
        </div>
    </div>

</div>


<?php include_once("inc/templates/footer.php"); ?>

<!-- Footer -->

<!-- /.container -->

<!-- jQuery -->
<script>
    var myVar;

    function myFunction() {
        myVar = setTimeout(showPage, 3000);
    }

    function showPage() {
        document.getElementById("loader").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>
<?php include_once("inc/scripts.php"); ?>

<!--footer-->
