<html>
<link rel="stylesheet" type="text/css" href="res.css">
<div name = "main" style = "height:100%; position: relative;">
<div id ="header"> <ul id="menu_wrap" class="l_Green">
<ul style = "float: right; margin-right:2%; margin-top:1%; right: 0; ">
<div class = 'dropdown' ></button>

</div></ul>
</ul></div>
<div name = 'wrapper' style='width: 100%; height:90%; border: 0px; margin-top:4.5%;'><br><br><br>
<label id= 'addnew'>Add a New Entry</label><br><br>
<?php
session_start();
if (!$_SESSION['username']) {
$loginError = "You are not logged in.";

header("Location: login.php");
exit();
}
error_reporting(E_ERROR | E_PARSE);
$connection = mysql_connect('localhost','root','');
mysql_select_db('db_ict_31') ;

echo "<div id = 'container' style= 'margin-top:0%; float:left;  margin-left:2%;'>
<center>
<div id= 'cont' style = 'float: left; '>

<form name= 'add' action = 'add_rec.php' method='POST'>
<p>Employee Name:</p><input type='text' name='employee' class='inputs' placeholder='Employee Name' required>
<p>Leave Type:</p><input type='text' name='leaves' class='inputs' placeholder='Leave Type' required>
<p>Action:</p><big>&emsp;
<select name='action'>
<option  value='Approve'>Approve</option>
<option  value='Reject'>Reject</option>
<option  value='Cancel'>Cancel</option>
</select>
</big><br><br>
</div>

<div id = 'cont' style = 'float:left'>
<p>Number of Days:</p><input type='text' name='ID' class='inputs' placeholder='Number of Days' required>

<p>Start Date:</p><input type='date' name='date' class='inputs'><br><br>
<p>End Date:</p><input type='date' name='dates' class='inputs'><br><br>					
</div>
<br><br>
<p>Comment:</p><center>
<textarea class='area' rows='3' cols='20' class='inputs' name='comment' placeholder='Notes or Comments' ></textarea>
</center>";

echo"<button class= 'logs' name = 'addbut' type='submit' >Submit</button></form> </div>";
echo"<div id = 'table' style='margin-top:1%;'>	
<center><form name = 'formbuttons' method = 'POST'><div style='margin-top:0%' >
<a href = 'admin.php' class='logs'>Back</a>
<a href = 'edit.php' class='logs'>Edit Entry</a>
<a href = 'export.php' class='logs'>Export to Excel</a>
<div class = 'dropdown' >
<button name='dropit'class = 'logs'>Sort By</button>
<div class='dropdown-content'>
<a class = 'drop' href='leave.php?sort=empnam'>Employee Name</a>
<a class = 'drop' href='leave.php?sort=numday'>Number of Days</a>
<a class = 'drop' href='leave.php?sort=leave'>Leave Type</a>
<a class = 'drop' href='leave.php?sort=actio'>Action</a>
<a class = 'drop' href='leave.php?sort=stardat'>Start Date</a>
<a class = 'drop' href='leave.php?sort=endat'>End Date</a>
</div></div></form></center>";

$query= "SELECT emp AS 'Employee Name', numd AS 'Number of Days', leav AS 'Leave Type', star AS 'Start Date', act AS 'Action', ends AS 'End Date'  from hr_tbl_leav";

if ($_GET['sort'] == 'empnam')
{
$query .= " ORDER BY emp";
}
elseif ($_GET['sort'] == 'endat')
{
$query .= " ORDER BY ends";
}
elseif ($_GET['sort'] == 'leave')
{
$query .= " ORDER BY leav";
}
elseif ($_GET['sort'] == 'actio')
{
$query .= " ORDER BY act";
}
elseif ($_GET['sort'] == 'stardat')
{
$query .= " ORDER BY star";
}
else
{
$query .= " ORDER BY numd";
}			
$result= mysql_query($query);
echo '</tr>';

$i=0;

echo "<table align='center' style = 'margin-top: 1%; width:100%; font-size: 15px;'>";
echo '<tr>';

while ($i < mysql_num_fields($result))
{
$meta = mysql_fetch_field($result, $i);
echo '<th>' . '<b>' . $meta->name . '</b>' . '</th>';
$i++;

}
echo '</tr>';

while ($row = mysql_fetch_row($result))
{
echo '<tr>';
$count = count($row);
$y = 0;
while ($y < $count)
{
	$c_row = current($row);
	echo'<td>'.$c_row.'</td>';
	next($row);
	$y++;
}
echo '</tr>';

}

echo '</table></div>';

echo'</div>';

?>
</div>
</html>