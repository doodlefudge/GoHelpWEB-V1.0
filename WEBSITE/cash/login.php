<style>
body {  font-size: 12px; color: #666666; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; padding-top: 0px}
table {  font-size: 12px; color: #000000; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; padding-top: 0px}

.com { font-family: "µ¸¿ò", "Arial", "verdana"; font-size: 12px; color: #ffffff; line-height: 14px; padding-top: 5px; padding-bottom: 5px; font-weight: bold}
.sign { font-family: "µ¸¿ò", "verdana", "Arial"; font-size: 11px; color: #333333 ; padding-left: 15px}
.gpo { font-family: "µ¸¿ò", "Arial", "verdana"; font-size: 12px; color: #FDF100; line-height: 14px; padding-top: 5px; padding-bottom: 5px; font-weight: bold}
.gpo2 { font-family: "µ¸¿ò", "Arial", "verdana"; font-size: 11px; color: #FDF100; line-height: 11px; padding-top: 5px; padding-bottom: 
5px; font-weight: bold} 
</style>
<center>
<form action="verify.php" method="post">
<span class="gpo2"><label for="char">Character: </label>
<br/>
<input name="char" type="text" size="10" maxlength="15"/>
<br/>
<label for="user">Username: </label>
<br/>
<input name="user" type="text" size="10" maxlength="15"/>
<br/>
<label for="pass">Password: </label>
<br/>
<input name="pass" type="password" size="10" maxlength="15"/>
<br/>



<input type="submit" class="" value="Log in!"/>
</span></form>
<?php 

if (!isset($_GET['fix'])){
} else {
$error = $_GET['fix'];

switch ($error){
case 1:
echo "<h2>Login Issue. Please try Again.</h2>";
break; 
case 2:
echo "<h2>Character is not found. Please check your spelling and try again.</h2>";
break; 
case 3:
echo "<h2>The character is not in your account.</h2>";
break; 
default:
break; 
}
}
?>
</center>