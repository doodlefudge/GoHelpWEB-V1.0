<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Purchasing and Inventory</title>
	<script>
 
  </script>
  
    <link href="css/style.css" rel="stylesheet">

   
</head>

<body>
    <!-- PRELOADER -->
	
    <div class="spn_hol">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>

 <!-- END PRELOADER -->

 <!-- =========================
     START ABOUT US SECTION
============================== -->

                            <!-- TITLE AND DESC --><div class="head">
                          <br> <p><img src="images/logo.png" width="500" height="200" align="left"> <h1 class="welcome">&emsp;&emsp;
						   WELCOME</h1>
                            <p class="welcome">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Purchasing and Inventory</p>
                   
							<font face="Arial"><font size="5" class="welcome">
							&emsp;&emsp;&emsp;+632 913 8380     |    +639 25 885 3470
							<br>&emsp;&emsp;&emsp;<a href="mailto:inquiry@worldcitimedicalcenter.com"> inquiry@worldcitimedicalcenter.com</a>
							<br><a href="https://www.facebook.com/WorldCitiMedicalCenter/"><font color="#2a5b84">	&emsp;&emsp;&emsp;</font><img src="images/fb.png"id="ff" width="50" height="40"></a> </font></tr></font>
							</td></tr>
							</table><br><br><br></header></p><br>
                               
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
		
    </section>

    <!-- END HEADER SECTION -->




 <!-- =========================
     START SERVICES SECTION
============================== -->


 <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
 
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">
          </a>                    
        </div>

<div class="menureq">
 <ul class="ul">     <font color="black">        
            <li class="li"><a href="req.php" >REQUEST STOCK</a></li>
            <li class="li"><a href="reqlist.php">REQUEST LIST</a></li> 
			 <li class="li"><a href="logout.php">Logout</a></li> </font>
		     </ul>
        </div>
     					<br><br><br><br><center>
						<h2>REQUEST STOCK</h2><hr width="50" height="10" color="#2a5b84 "><br><br></center>
					<table border="1">
					<form method="post" action="">
<center>
Full Name: <input required="required" type="text" name="fullname"><br><br>
Item: <input required="required" type="text" name="item"><br><br>
Department: <select name="department" required="required">
  <option value="E.R. and Outpatient"name="department">E.R. and Outpatient</option>
  <option value="Doctor's Clinic"name="department">Doctor's Clinic</option>
  <option value="rooms"name="department">Rooms</option>
  <option value="Information Technology"name="department">Information Technology</option>
<option value="Billing and Cashier"name="department">Billing and Cashier</option>
 <option value="Nursing"name="department">Nursing</option>
 <option value="Customer Care"name="department">Customer Care</option>
 <option value="Laboratory"name="department">Laboratory</option>
 <option value="Finance"name="department">Finance</option>
 <option value="Medical Records"name="department">Medical Record</option>
 <option value="Admission"name="department">Admission</option>
 <option value="Human Resource"name="department">Human Resource</option>
 <option value="Pharmacy"name="department">Pharmacy</option>
	
  
  </select><br><br>
<input type="submit" name="a_submit" value="Add" id="upd">
<br><br>
<?php
if(!isset($_POST['a_submit'])){

}
if(isset($_POST['a_submit'])){
$a_email = $_POST['fullname'];
$a_name = $_POST['item'];
$a_dept = $_POST['department'];


if(empty($a_email && $a_name)){
echo "<font color='red'>* </font>All fields are required";
}else{
$insert = "INSERT INTO request(fullname,item,department) VALUES('$a_email','$a_name','$a_dept')";

if(mysql_query($insert)){
header('location: req.php');{
echo "<font color='#2a5b84'>* </font>Your Request was Sent!";
}

}
}
}
?>
</div>


</form>
					
					
					</table>

			</div>
                </div>

            </div>
        </div>
		
        




<!-- =========================
     FOOTER 
============================== -->

    <section class="copyright">
        <h2></h2>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="copy_right_text">
                    <!-- COPYRIGHT TEXT -->
                        <p>Copyright &copy;  2016 WorldCitiMed . All Rights Reserved. <a href="">TCM</a> <span>By </span><a href="http://designscrazed.org/">TALA,CAMACHO,MAGAT</a></p>
                    </div>
                </div>

               
            </div>
        </div>
    </section>
    <!-- END FOOTER -->
	


<!-- =========================
     SCRIPTS 
============================== -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.fitvids.js"></script>
    <script src="js/smoothscroll.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/jquery.ajaxchimp.langs.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/script.js"></script>



</body>

</html>