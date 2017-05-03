<?php
require('./config.php');
?>

<title>LuxuryFlyff CMS WebSite - ©LuxuryFLyff™ 2009/2010</title>
<script type="text/javascript" src="files/e107.htm"></script>
<script type="text/javascript" src="files/sleight_js.htm"></script>
<link rel="stylesheet" href="files/style.css" type="text/css" media="all">
<link rel="stylesheet" href="files/e107.css" type="text/css">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="content-style-type" content="text/css">
<meta http-equiv="content-language" content="en">

<link rel="StyleSheet" href="files/topbar.css" type="text/css" media="screen">



</head><div class="bg">

<div id="topbar">

<font color="white"><font color="white"><a href="./index.php">LuxuryFlyff CMS WebSite</a> ©LuxuryFLyff™ 2009/2010</font></font><div class="topbar-right">


</div>
</div>

<div class="wrapper"><div class="innerwrapper"><div class="header"></div>
<div class="nav"><ul id="topmenu"><font color="white"><li><a class="offpage" title="Home" href="./index.php" accesskey="4">Home</a></li><li><a class="offpage" title="Login" href="change/changejob.php" accesskey="4">Login</a></li><li><a class="offpage" title="Characters" href="./char.php" accesskey="0">Characters</a></li><li><a class="offpage" title="Register" href="./register.php" accesskey="1">Register</a></li><li><a class="offpage" title="Rank Page" href="./ranking.php" accesskey="3">Ranking</a></li><li><a class="offpage" title="Downloads" href="./downloads.php" accesskey="4">Downloads</a></li><li><a class="offpage" title="Credits" href="./cred.php" accesskey="4">Credits</a></li> <li><a class="offpage" title="Shop" href="shop" accesskey="4">Web Shop</a></li><li><a class="offpage" title="Buffs" href="buff" accesskey="4">Buffs</a></li></font></ul>
</div><div class="clear"></div><div class="main"><div class="leftmenu"><h3><font color="white">Server Status</font></h3>
<div class="bodytable">

     <?php
include('./_stats.php');
?>



</tr></tbody></table></font>


</tbody></table>

</table>
<br>

</center></td>
</tr></tbody></table></div>

<h3><font color="white">Server Info</font></h3>
<div class="bodytable"><b><font color="000000">Server Rates</font><b>

<li>EXP:750x</li>
<li>DROP:500</li>
<li>PENYA:3000</li>
<br>
-->>Special Features<<--
<br><br>
<li>Rebirth System</li>
<li>Custom Shop</li>
<li>Own NPCs >:3</li>
<li>Server with v12</li>
</font></div></div></div><div class="central">

<h3><font color="white">Advertisments</font></h3>
<div class="bodytable"><center><a href="http://90.229.247.38/"><img src="http://i43.tinypic.com/33z7e5t.gif" border="0"></center></a></font></div>

<h3><font color="ffffff">Fly For Fun</font></h3>
<div class="bodytable">
<center><?php
if(isset($_POST['submit'])) {
if(!$_POST['user'] || !$_POST['pass1'] || !$_POST['pass2']) {
die('<strong>You must fill in all of the feilds!<BR></strong>');
}
else {
$user = $_POST['user'];
$pass = md5('kikugalanet' .$_POST['pass1']. '');
}
$pass2 = md5('kikugalanet' .$_POST['pass2']. '');
if(exi($user) != '0') {
die("Username: '".$user."' is in use!");
}
if($pass != $pass2) {
die('<strong>Passwords dont match!</strong>');
}
$nww = nw($user, $pass); 
if ($nww){
echo("<p class='b01'><strong>Registration Complete!</strong></p>");
}else  {
echo("<p class='b01'><strong>Registration Failed!</strong></p>");
}}
?>
<form action="?op=register" method="post">
Login:<br>
<input name="user" type="text" class="liteoption" id="user" size="15" maxlength="15" />
<br>Password:<br>
<input name="pass1" type="password" class="liteoption" id="pass1" size="15" maxlength="15" />
<Br>Repeat Password:<br>
<input name="pass2" type="password" class="liteoption" id="pass2" size="15" maxlength="15" />
<br><br><input name="submit" type="submit" class="liteoption" value="Create Account " />
</form></center>
</div><br><br><br>

</div><div class="rightmenu">


<h2><font color="white">Players Online</font></h2>
<div class="bodytable"><table id="table1" width="90%" border="0" cellpadding="0" cellspacing="0"> 
<tbody><tr>  
<div class="centered"><table>
&nbsp;- Total Accounts:
            <?php
			
			$tcount = mysql_query("SELECT * FROM accounts");
			echo mysql_num_rows($tcount);
			?>
            <br />
            - Total Chars:  
            <?php
			$tchar = mysql_query("SELECT * FROM characters");
			echo mysql_num_rows($tchar);
			?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <br />
            - Players Online:   
          <?php		
			$tonl = mysql_query("SELECT * FROM accounts WHERE logged_in = '1' ");
			echo mysql_num_rows($tonl);		
			?></p>
          </div></td>

</tbody></table> 
</div>

  

<h3><font color="white">Donate for a better server</font></h3>
<div class="bodytable"><b><font color="000000">Donate For a better server please</font><b>
<br>
Top 3 Donations:
<br>
<li>1. nickname</li>
<li>2. nickname</li>
<li>3. nickname</li>
<br>
Total Donors: XX
<br>
How does it Work?
After you donate contact Hells In-Game or Live Chat for your reward :)
<br>
</font></div>

<h3><font color="white">Vote for us.</font></h3>
<div class="bodytable">
<?php
include('./vote.php');
?>
</div></div>
</div><div class="clear"></div></div>
       </script>
</body></html>