<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Purchasing and Inventory</title>
	<script>
  function checkall(select)
  {
    if(document.getElementById('all').checked==true)
    {
      var chkelement=document.getElementsByName(select);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=true;
      }
    }
    else
    {
      var chkelement=document.getElementsByName(select);
      for(var i=0;i<chkelement.length;i++)
      {
        chkelement.item(i).checked=false;
      }
    }
  }
  </script>
  
    <link href="css/style.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <!-- Responsive CSS -->
    <link href="css/responsive.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
	<![endif]-->
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

                            <!-- TITLE AND DESC -->
                           <p><img src="images/logo.png" width="500" height="200" align="left"> <h1 class="welcome">&emsp;&emsp;
						   WELCOME</h1>
                            <p class="welcome">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Purchasing and Inventory</p>
                   
							<font face="Arial"><font size="5" class="welcome">
							&emsp;&emsp;&emsp;+632 913 8380     |    +639 25 885 3470
							<br>&emsp;&emsp;&emsp;<a href="mailto:inquiry@worldcitimedicalcenter.com"> inquiry@worldcitimedicalcenter.com</a>
							<br><a href="https://www.facebook.com/WorldCitiMedicalCenter/"><font color="white">	&emsp;&emsp;&emsp;</font><img src="images/fb.png"id="ff" width="50" height="40"></a> </font></tr></font>
							</td></tr>
							</table><br><br><br></header></p><br>
 



    <!-- END HEADER SECTION -->




 <!-- =========================
     START SERVICES SECTION
============================== -->
				
	
  <section id="FEATURES" class="features page">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <!-- SERVICES-->
                    <div class="section_title">
					&emsp;&emsp;&emsp;&emsp;	<u>	<a href="bill.php">BILL OF MATERIAL</a> </u>
					&emsp;&emsp;&emsp;&emsp;    <u> <a href="weekly,php"> WEEKLY REPORT</a></u>
					&emsp;&emsp;&emsp;&emsp;	<u><a href="monthly.php">MONTHLY REPORT</a> </u>
					&emsp;&emsp;&emsp;&emsp;	<u><a href="reqlist.php"> REQUEST LIST</a></u>
                   &emsp;&emsp;&emsp;&emsp;		<u><a href="logout.php">Logout</a> </li>       </u>
						
						<h2>Request List</h2>
						
						
<br><br>
<form method="post" action="">
<center>
<table border="1" cellspacing="0" cellpadding="20" style="color:#FEFAE1; background:#2a5b84; border:4px solid black;  ">
<tr>
	<td></td>
	<th style="color:white;">Fullname</th>
	<th style="color:white;">Item</th>
		<th style="color:white;">Request Approved</th>
</tr>

<?php

$query = "select * from request";
$run = mysql_query($query);
while($rows=mysql_fetch_array($run)){
	$id = $rows['id'];
	$email = $rows['fullname'];
	$u_name = $rows['item'];
	
	$req = $rows['approved'];
?>

<tr>
	<td style="color:white;"><input style="cursor:pointer;" type="checkbox" name="select[]" value="<?php echo $id; ?>" ></td>
	<td style="color:white;"><?php echo $email; ?></td>
	<td style="color:white;"><?php echo $u_name; ?></td>
	<td style="color:white;"><?php echo $req; ?></td>
</tr>

<?php } ?>

</table>
<br>
<div id="c" align="center">
<input type="checkbox" name="all" id="all" onclick="return checkall('select[]');" > Approved All &nbsp


<input type="reset" name="reset" value="Uncheck All" id="r2"> &nbsp


<input type="submit" name="edit" value="approved" id="r4">
</div>
</form>
</div>

<div id="kid3" align="center">
<?php

if(!isset($_POST['select'])){

}
else{
if(isset($_POST['delete'])){


$id = $_POST['select']; //check boxes that has been selected

$count = count($id); //count selected check boxes

	
for($cal = 0; $cal < $count; $cal++){ // calculate the selected check boxes
	


	$action = mysql_query("DELETE FROM request WHERE user_id='$id[$cal]'"); //delete the selected check boxes

}

echo "<script>window.open('reqlist.php','_self')</script>"; //redirect back to index page

}
}
?>

 
<form method="post" action="update.php">

<?php

if(!isset($_POST['select'])){

}
else{
if(isset($_POST['edit'])){

$u_id = $_POST['select'];

$count = count($u_id);

for($c = 0; $c < $count; $c++){
$process = mysql_query("SELECT * FROM request WHERE id='$u_id[$c]'");
while($row=mysql_fetch_array($process)){

?>

<table border="0">

<input type="hidden" name="id[]" value="<?php echo $row['id']; ?>">
<td align="center">Full Name: <input type="text" name="fullname[]" value="<?php echo $row['fullname']; ?>"readonly> </td></tr>
<tr><td align="center">Item: <input type="text" name="item[]" value="<?php echo $row['item']; ?>"readonly></td>
</tr>	 <tr><td align="center">Request Approved: <input type="text" name="approved[]" value="<?php echo $row['approved']; ?>"></td><br>
<?php } } ?>

<tr>
<td align="center" colspan="center"><br>
<a href="reqlist.php" style="text-decoration:none;">
<input type="submit" name="" value="Cancel" id="upd"> 
</a>
<input type="submit" name="up" value="Approved!" id="upd"> 
</td>
</tr>
			 		
<?php		  
	} 	
 } 
 ?>

</table>
 </form>
</div>

</div>

                   
                </div>
            </div>
        </div>
    </section>
        




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