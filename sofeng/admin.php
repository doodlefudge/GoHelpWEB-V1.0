<!DOCTYPE>
<html>
<head>
	<meta charset="utf-8">
<title>ADMIN</title>
	<link rel="stylesheet" href="style.css">
</head>
<body class="body">

<?php
include('adlog.php'); 
if(isset($_SESSION['adlogin_user'])){
header("location: adprofile.php");
}
?>


<div class="background-image"></div>
<div class="content">
 <div class="top">
  <img align="left" class="logo"src= "images/logo.png" height="70px" width="300px"/>
 <p class="t" >&nbsp;&emsp;&nbsp;&emsp;&nbsp;&emsp;&nbsp;&emsp;&nbsp;&emsp;Sign-in</p>
  </div>

  <h1 align="center"> Welcome</h1>
  <table align="center">
  <form action="" method="post">
  <tr>
  <td>Username:</td>
  <td><input type="text" name="username" /></td>
  </tr>
  
  <tr>
  <td>Password:</td>
  <td><input type="password" name="password" /></td>
  </tr>
  
  <tr>
  <td></td>
  <td>
<br>
  <input type="submit" class="submit "name="submit" value="Log-in" />
</td>
<tr>
<td></td><td><span><br><?php echo $error; ?></span></td></tr>
</form>
  </tr>
 </table>
 <br><br><br><br><br><br>
  <a id="back" href="index.php"><--Back to Homepage</a>
</div>	
</div>
</div>
</div>
</div>
</div>

 	
</div>
</div>
<div>






</body>
</html>