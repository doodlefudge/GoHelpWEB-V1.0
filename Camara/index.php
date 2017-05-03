<?php include_once("inc/templates/header.php");?>
<!-- Navigation -->
<?php //include_once("inc/templates/navbar.php");?>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="modal fade" id="myModal" class = "myModal" tabindex="-1" role="dialog" aria-labelledby="memberModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="memberModalLabel">Welcome to Camaya Resort's Website</h4>
                    </div>
                    <div class="modal-body">
                        <p align = "center">Hello! We at Camaya Hotel and Resorts value your feedback!.<BR>
                            If you could leave your contact details and your inquiries, we would <BR>
                            gladly read them and reply as soon as possible
                        </p>
                        <div>
                            <form method="post" action="#">
                                <div class="form-group">
                                    <label for="name" class="col-xl-3 cols-sm-2 control-label">Your Name</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="name" id="name"  placeholder="Enter your Name"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="email" class="col-xl-3 cols-sm-2 control-label">Your Email</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="email" id="email"  placeholder="Enter your Email"/>
                                        </div>
                                    </div>
                                </div>
								 <div class="form-group">
                                    <label for="email" class="col-xl-3 cols-sm-2 control-label">Your Contact Number</label>
                                    <div class="cols-sm-10">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-phone fa" aria-hidden="true"></i></span>
                                            <input type="text" class="form-control" name="phone" id="phone"  placeholder="Enter your Phone Number"/>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button submit" class="btn btn-success" data-dismiss="modal">Submit</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="gallery.php">
                <img class="img-responsive" src="assets/category_logo/my_profile.jpg" style="width:400px;height:263px;" alt="">
            </a>
            <div class = "caption">
                <h3>My Profile</h3>


            </div>
        </div>

        <div  class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="assets/category_logo/property.jpg" style="width:400px;height:263px;" alt="">
            </a>
            <div class = "caption">
                <h3>How to own?</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb" >
            <a class="thumbnail" href="#" style = "border-radius: 30;">
                <img class="img-responsive" src="assets/category_logo/read.jpg" style="width:400px;height:263px;" alt="">
            </a>
            <div class = "caption">
                <h3>R.E.A.D.</h3>
            </div>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="select.php">
                <img class="img-responsive" src="assets/category_logo/stay.jpg" style="width:400px;height:263px;"  alt="">
            </a>
            <div class = "caption">
                <h3>StayCation</h3>
            </div>
        </div>

        <div class="col-lg-4 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="video_gallery.php">
                <img class="img-responsive" src="assets/category_logo/my_vids.png" style="width:400px;height:263px;" alt="">
            </a>
            <div class = "caption">
                <h3>My Videos</h3>

            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 thumb">
            <a class="thumbnail" href="contact_us.php">
                <img class="img-responsive" src="assets/category_logo/contact.jpg" style="width:400px;height:263px;" alt="">
            </a>
            <div class = "caption">
                <h3>Reach Us At...</h3>



            </div>
        </div>
        <div class="col-lg-4 col-md-4 col-xs-12 thumb">
            <a class="thumbnail" href="events.php">
                <img class="img-responsive" src="assets/category_logo/events.jpg"  style="width:400px;height:263px;"alt="">
            </a>
            <div class = "caption">
                <h3>Events on 2017</h3>
           
            </div>
        </div>

    </div>
</div>




<!-- Footer -->

<!-- /.container -->

<!-- jQuery -->
<?php include_once("inc/scripts.php");?>

<!--footer-->
<?php include_once("inc/templates/footer.php");?>
