<?php
include("db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="main.css"/>
<title>Multi-Edit/Delete in one Page</title>
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
</head>
<body bgcolor="gray">
<div id="main">
<div id="container">
		<header>Add / Multi Delete & Edit Data in one Page</header>
<section id="mommy">

<div id="kid3" align="center">

<div id="edi3" align="center">Add Data </div>
<br>

<form method="post" action="">



Email: <input required="required" type="text" name="email"><br><br>
Name: <input required="required" type="text" name="u_name"><br><br>
<input type="submit" name="a_submit" value="Add" id="upd">


</form>
<?php
if(!isset($_POST['a_submit'])){

}
if(isset($_POST['a_submit'])){
$a_email = $_POST['email'];
$a_name = $_POST['u_name'];

if(empty($a_email && $a_name)){
echo "<font color='red'>* </font>All fields are required";
}else{

$insert = "INSERT INTO del(email,u_name) VALUES('$a_email','$a_name')";

if(mysql_query($insert)){
header('location: index.php');
}
}
}
?>
</div>




<div id="kid2">


<form method="post" action="">
<div id="edi2" align="center">Select Data</div><br>
<table border="1" cellspacing="0" cellpadding="20" style="color:#66cccc; background:#800000; border:5px solid yellow;  ">

<tr>
	<td></td>
	<th style="color:white;">Email</th>
	<th style="color:white;">Name</th>
</tr>

<?php

$query = "select * from del";
$run = mysql_query($query);
while($rows=mysql_fetch_array($run)){
	$id = $rows['user_id'];
	$email = $rows['email'];
	$u_name = $rows['u_name'];
?>

<tr>
	<td style="color:white;"><input style="cursor:pointer;" type="checkbox" name="select[]" value="<?php echo $id; ?>" ></td>
	<td style="color:white;"><?php echo $email; ?></td>
	<td style="color:white;"><?php echo $u_name; ?></td>
</tr>

<?php } ?>

</table>
<br>
<div id="c" align="center">
<input type="checkbox" name="all" id="all" onclick="return checkall('select[]');" > Ckeck All &nbsp


<input type="reset" name="reset" value="Uncheck All" id="r2"> &nbsp


<input type="submit" name="delete" value="Delete" id="r3"> &nbsp


<input type="submit" name="edit" value="Edit" id="r4">
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
	


	$action = mysql_query("DELETE FROM del WHERE user_id='$id[$cal]'"); //delete the selected check boxes

}

echo "<script>window.open('index.php','_self')</script>"; //redirect back to index page

}
}
?>

 
<form method="post" action="update.php">
<div id="edi3" align="center">Edit Data </div>
<?php

if(!isset($_POST['select'])){

}
else{
if(isset($_POST['edit'])){

$u_id = $_POST['select'];

$count = count($u_id);

for($c = 0; $c < $count; $c++){
$process = mysql_query("SELECT * FROM del WHERE user_id='$u_id[$c]'");
while($row=mysql_fetch_array($process)){

?>

<table border="0">

<input type="hidden" name="user_id[]" value="<?php echo $row['user_id']; ?>">
<td align="center">Email: <input type="text" name="email[]" value="<?php echo $row['email']; ?>"> </td></tr>
<tr><td align="center">Name: <input type="text" name="u_name[]" value="<?php echo $row['u_name']; ?>"></td>
</tr>	 <br>
<?php } } ?>

<tr>
<td align="center" colspan="center"><br>
<a href="index.php" style="text-decoration:none;">
<input type="submit" name="" value="Cancel" id="upd"> 
</a>
<input type="submit" name="up" value="Update" id="upd"> 
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

<footer>&copy Copyright 2014. Victor Ifeanyi</footer>
</div>
</body>
</html>