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
						<h2>REQUEST LIST</h2><hr width="50" height="10" color="#2a5b84 ">
<?php
$db_host = 'localhost';
$db_user = 'root';


$database = "db_ict_31"; // DATABASE NAME
$table = "request";    // TABLE NAME

if (!mysql_connect($db_host, $db_user))
    die("Can't connect to database");

if (!mysql_select_db($database))
    die("Can't select database");

// sending query
$result = mysql_query("SELECT * FROM {$table}");
if (!$result) {
    die("Query to show fields from table failed");
}

$fields_num = mysql_num_fields($result);
echo "<br><br><br><br><br><br><table width='500' height='400' border='1'cellspacing='0' cellpadding='20' style=' background:#2a5b84 ; border:5px solid #FEFAE1; color:white;' ><tr>";
// printing table headers
for($i=0; $i<$fields_num; $i++)
{
    $field = mysql_fetch_field($result);
    echo "<td>{$field->name}</td>";
}
echo "</tr>\n";
// printing table rows
while($row = mysql_fetch_row($result))
{
    echo "<tr>";

    // $row is array... for each( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
        echo "<td>$cell</td>";

    echo "</tr>\n";
}
mysql_free_result($result);
?>
					
					
					</table>

			</div>
                </div>

            </div>
        </div>
		
        




<!-- =========================
     FOOTER 
============================== -->
<br>

    <br><section class="copyright">
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