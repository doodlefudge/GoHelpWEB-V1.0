<?php include_once("inc/templates/header.php");?>







<!-- Navigation -->

<?php //include_once("inc/templates/header.php");?>

<!-- Page Content -->

<div class="container">

   

    <div class="row">

        <section class="main-section contact" id="contact">



            <div class="row">

                <div class="col-lg-6 col-sm-7 ">

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

                                <input type="text" name="name" class="form-control input-text" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />

                                <div class="validation"></div>

                            </div>

                            <div class="form-group">

                                <input type="email" class="form-control input-text" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />

                                <div class="validation"></div>

                            </div>

                            <div class="form-group">

                                <input type="text" class="form-control input-text" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />

                                <div class="validation"></div>

                            </div>

                            <div class="form-group">

                                <textarea class="form-control input-text text-area" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>

                                <div class="validation"></div>

                            </div>



                            <div class="text-center"><button type="submit" class="btn btn-primary">Send Message</button></div>

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

