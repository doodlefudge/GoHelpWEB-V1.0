<?php include_once("inc/templates/header.php");?>

<!-- Navigation -->

<?php //include_once("inc/templates/header.php");?>
<?php
error_reporting(-1);
ini_set('display_errors', 1);
include_once('inc/connection/connection.php');

if (isset($_POST['submit'])) {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    date_default_timezone_set('Asia/Manila');

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
    $msg_id = "MSG" . (((int)$pdo->query('select count(*) from user_message')->fetchColumn()) + 1);

    $sql = "INSERT INTO user_message values (:msg_id,:inquire_id,:message_subject,:message_body,:dateNow)";
    $stmt1 = $pdo->prepare($sql);
    $message_subject = $_POST['message_subject'];
    $message_body = $_POST['message_body'];
    $stmt1->bindParam(':msg_id', $msg_id);
    $stmt1->bindParam(':inquire_id', $inquire_id);
    $stmt1->bindParam(':message_subject', $message_subject);
    $stmt1->bindParam(':message_body', $message_body);
    $stmt1->bindParam(':dateNow', $dateNow);
    $stmt1->execute();
    ?>
    <script>
        alert("Message Succesfully Sent");
    </script>
    <?php
}


?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <section class="main-section contact" id="contact">
            <div class="row">
                <div class="col-lg-6 col-sm-7 "  >
                    <div class="contact-info-box address clearfix">
                        <h3><i class=" fa-user"></i>Contact Person:</h3>
                        <span>Mr. Joemar De Jesus</span>
                    </div>
                    <div class="contact-info-box phone clearfix">
                        <h3><i class="fa-phone"></i>Viber / Mobile:</h3>
                        <span>+639278270005</span>
                    </div>
                    <div class="contact-info-box email clearfix">
                        <h3><i class="fa-pencil"></i>email:</h3>
                        <span>dejesusjoemar@ymail.com <br> camayacoastdj@gmail.com</span>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-5 ">
                    <div class="form">
                        <!--<div id="sendmessage">Your message has been sent. Thank you!</div>-->
                        <div id="errormessage"></div>
                        <form action="" method="post" role="form" class="contactForm">
                            <div class="form-group">
                                <input type="text"  name="inquirer_name" id="inquirer_name" class="form-control input-text"  placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control input-text"  name="inquirer_email"
                                       id="inquirer_email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-text" name="inquirer_phone"
                                       id="inquirer_phone" placeholder="Phone Number" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control input-text" name="message_subject" id="message_subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control input-text text-area" name="message_body" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>
                            <div class="text-center"><input type="submit" name = "submit" value = "Send Message"  class="btn btn-primary"></div>
                        </form>
                    </div>
                </div>

            </div>

        </section>

    </div>







    <!-- Footer -->



    <!-- /.container -->

</div>



<!-- jQuery -->

<?php include_once("inc/scripts.php");?>



<!--footer-->

<?php include_once("inc/templates/footer.php");?>

