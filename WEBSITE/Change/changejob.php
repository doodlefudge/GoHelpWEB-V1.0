<?php
	//THIS MUST COME IN HOME PAGE, BEFORE YOU ALL, INCLUDING <html>
	require "config.php";
	session_start();
	$user = $_SESSION['user'];
	$login = $_POST['login'];
	$senha = $_POST['senha'];
	$act = $_GET['a'];
	function em()
	{
		$args = func_get_args();
		for ($cont = 1; $cont < func_num_args(); $cont++)
		{
			$arg = func_get_arg($cont);
			if ($arg == $args[0])
				return true;
		}
		return false;
	}
?>
<html>
<head>
<style type="text/css">
<!--
body {
	background-image: url(images/bg103.gif);
}
-->
</style><body>
<script language="javascript" type="text/javascript">
function sel()
{
	for(var x = 0; x < document.buff.elements.length; x++)
	{
		var y = document.buff.elements[x];
		if (y.name != 'selall')
			y.checked = document.buff.selall.checked;
		}
}
</script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
a:link {
	color: #000000;
	text-decoration: underline;
}
a:visited {
	text-decoration: underline;
	color: #000000;
}
a:hover {
	text-decoration: none;
	color: #000000;
}
a:active {
	text-decoration: underline;
	color: #000000;
}
-->
</style>
</head>
<body>
<?php
?>
<?php
while (1)
{
	if (($act != 'login') && ($act != 'char') && ($act != 'job') && ($act != 'setjob') && ($act != 'resetpos') && ($act != 'listbuff') && ($act != 'buffar') && ($act != 'senha'))// && ($act != 'res'))
	{
		echo '<form method="post" action="changejob.php?a=login">';
		echo 'Login <input type="text" name="login"><p>';
		echo 'Password <input type="password" name="senha"><p>';
		echo '<input type="submit" value="login" name="OK">';
		echo '</form>';
	}
	if ($act == 'login')
	{
		$senha = md5('kikugalanet' . $senha);
		$resultado = mysql_query("select * from accounts where username = '$login' and password = '$senha'");
		if (is_resource($resultado))
			$qde_registros = mysql_num_rows($resultado);
		if ($qde_registros != 0)
		{
			$act = 'char';
			$_SESSION['user'] = $login;
			$user = $login;
			session_write_close();	
		}
		else
		{
			echo "<font color='#FF0000'>ID or password incorrect, please try again.</font><br>";
			echo '<form method="post" action="changejob.php?a=login">';
			echo 'Login <input type="text" name="login"><p>';
			echo 'Password <input type="password" name="senha"><p>';
			echo '<input type="submit" value="login" name="OK">';
			echo '</form>';
		}
	}
	if ($act == 'char')
	{
		if (isset($_SESSION['user']))
		{
			$resultado = mysql_query("select * from accounts AS a WHERE a.username = '$user'");
			$qde_registros = mysql_num_rows($resultado);
			if ($qde_registros != 0)
			{
				$resultado = mysql_query("select * from characters where accountname = '$user' order by charslot asc");
				$qde_registros = mysql_num_rows($resultado);
				echo "Logged in as <font color='#FF0000'><b>$user</b></font><br>";
				echo "<a href='changejob.php?a=senha'>Change Password</a><p>";
				if ($qde_registros == 0)
					echo "None char in login<br>";
				else
					echo "<fieldset><legend>&nbsp;&nbsp;PICK THE CHAR&nbsp;&nbsp;</legend>";
				$qtde = $qde_registros;
				while ($reg = mysql_fetch_assoc($resultado))
				{
					$qtde--;
					$idJob = $reg['class'];
					if ($idJob == 0) $nomeJob = 'Vagrant';
					if ($idJob == 1) $nomeJob = 'Mercenary';
					if ($idJob == 2) $nomeJob = 'Acrobat';
					if ($idJob == 3) $nomeJob = 'Assist';
					if ($idJob == 4) $nomeJob = 'Magician';
					if ($idJob == 6) $nomeJob = 'Knight';
					if ($idJob == 7) $nomeJob = 'Blade';
					if ($idJob == 8) $nomeJob = 'Jester';
					if ($idJob == 9) $nomeJob = 'Ranger';
					if ($idJob == 10) $nomeJob = 'Ringmaster';
					if ($idJob == 11) $nomeJob = 'Billposter';
					if ($idJob == 12) $nomeJob = 'Psykeeper';
					if ($idJob == 13) $nomeJob = 'Elementor';
					if ($idJob == 16) $nomeJob = 'Knight [Master]';
					if ($idJob == 17) $nomeJob = 'Blade [Master]';
					if ($idJob == 18) $nomeJob = 'Jester [Master]';
					if ($idJob == 19) $nomeJob = 'Ranger [Master]';
					if ($idJob == 20) $nomeJob = 'Ringmaster [Master]';
					if ($idJob == 21) $nomeJob = 'Billposter [Master]';
					if ($idJob == 22) $nomeJob = 'Psykeeper [Master]';
					if ($idJob == 23) $nomeJob = 'Elementor [Master]';
					if ($idJob == 24) $nomeJob = 'Knight - <img src="images/h.png"';
					if ($idJob == 25) $nomeJob = 'Blade - <img src="images/h.png"';
					if ($idJob == 26) $nomeJob = 'Jester - <img src="images/h.png"';
					if ($idJob == 27) $nomeJob = 'Ranger - <img src="images/h.png"';
					if ($idJob == 28) $nomeJob = 'Ringmaster - <img src="images/h.png"';
					if ($idJob == 29) $nomeJob = 'Billposter - <img src="images/h.png"';
					if ($idJob == 30) $nomeJob = 'Psykeeper - <img src="images/h.png"';
					if ($idJob == 31) $nomeJob = 'Elementor - <img src="images/h.png"';
					$slot = $reg['charslot'];
					$nome = $reg['charname'];
					$lvl = $reg['level'];
					$id = $reg['id'];
					echo "<b>Character Slot: <font color='#FF0000'>$slot</font><br>";
					echo "Name: <b><font color='blue'>$nome</b></font><br>";
					echo "Level: <b><font color='#FF0000'>$lvl</font></b><br>";
					//echo "Resets: <font color='#FF0000'>$reg['resets']</font><br>";
					echo "Job: <b><font color='blue'>$nomeJob</font></b><br>";
					if ($reg['channelnum'] == -1)
					{
						echo "<a href='changejob.php?a=job&char=$id'>Change Job</a> | <a href='changejob.php?a=resetpos&char=$id'>Reset Position</a> | <a href='changejob.php?a=listbuff&char=$id'>Buffs</a>";// | <a href='shop.php?a=listar&char=$id'>Shop</a>";
/*						if (($reg[2] == 120) && ($idJob >= 24) && ($idJob <= 31))
							echo " | <a href='changejob.php?a=res&char=$reg[13]'>Reset</a>";
*/
					}
					else
						echo "Your character is Online, please log out before using this.";
					echo "<br>";
					if ($qtde != 0)
						echo "<hr><hr>";
				}
				if ($qde_registros != 0)
					echo "</fieldset>";
			}
		}
		else
		{
			echo "<font color='#FF0000'>You signed on this, please log.</font><br>";
			echo '<form method="post" action="changejob.php?a=login">';
			echo 'Login <input type="text" name="login"><p>';
			echo 'Password <input type="password" name="senha"><p>';
			echo '<input type="submit" value="login" name="OK">';
			echo '</form>';
		}
	}
	if ($act == 'job')
	{
		if (isset($_SESSION['user']))
		{
			$id = $_GET["char"];
			$resultado = mysql_query("select * from characters AS c INNER JOIN accounts AS a ON a.username = c.accountname WHERE c.id = $id AND a.username = '$user'");
			$qde_registros = mysql_num_rows($resultado);
			if ($qde_registros != 0)
			{
				$resultado = mysql_query("select * from characters where id = $id");
				$reg = mysql_fetch_assoc($resultado);
				$lvl = $reg['level'];
				$job = $reg['class'];
				$mostrou = 'false';
				echo "<fieldset><legend>&nbsp;&nbsp;<b><i>CHOOSE YOUR JOB</i></b>&nbsp;&nbsp;</legend>";
				if (($lvl == 15) && ($job == 0))
				{
					$mostrou = 'true';
					echo "<a href='changejob.php?a=setjob&char=$id&job=1'>Mercenary</a><br>";
					echo "<a href='changejob.php?a=setjob&char=$id&job=2'>Acrobat</a><br>";
					echo "<a href='changejob.php?a=setjob&char=$id&job=3'>Assist</a><br>";
					echo "<a href='changejob.php?a=setjob&char=$id&job=4'>Magician</a><br>";
				}
				if (($lvl == 60) && ($job >= 1) && ($job <= 4))
				{
					$mostrou = 'true';
					switch($job)
					{
						case 1:	echo "<a href='changejob.php?a=setjob&char=$id&job=6'>Knight</a><br>";
								echo "<a href='changejob.php?a=setjob&char=$id&job=7'>Blade</a><br>";
								break;
						case 2: echo "<a href='changejob.php?a=setjob&char=$id&job=8'>Jester</a><br>";
								echo "<a href='changejob.php?a=setjob&char=$id&job=9'>Ranger</a><br>";
								break;
						case 3: echo "<a href='changejob.php?a=setjob&char=$id&job=10'>Ringmaster</a><br>";
								echo "<a href='changejob.php?a=setjob&char=$id&job=11'>BillPoster</a><br>";
								break;
						case 4: echo "<a href='changejob.php?a=setjob&char=$id&job=12'>Psykeeper</a><br>";
								echo "<a href='changejob.php?a=setjob&char=$id&job=13'>Elementor</a><br>";
								break;
					}
				}
				if (($lvl == 120) && ($job >= 6) && ($job <= 13))
				{
					$mostrou = 'true';
					switch($job)
					{
						case 6:		echo "<a href='changejob.php?a=setjob&char=$id&job=16'>Knight [M]</a><br>";
									break;
						case 7:		echo "<a href='changejob.php?a=setjob&char=$id&job=17'>Blade [M]</a><br>";
									break;
						case 8: 	echo "<a href='changejob.php?a=setjob&char=$id&job=18'>Jester [M]</a><br>";
									break;
						case 9: 	echo "<a href='changejob.php?a=setjob&char=$id&job=19'>Ranger [M]</a><br>";
									break;
						case 10: 	echo "<a href='changejob.php?a=setjob&char=$id&job=20'>Ringmaster [M]</a><br>";
									break;
						case 11: 	echo "<a href='changejob.php?a=setjob&char=$id&job=21'>BillPoster [M]</a><br>";
									break;
						case 12: 	echo "<a href='changejob.php?a=setjob&char=$id&job=22'>Psykeeper [M]</a><br>";
									break;
						case 13: 	echo "<a href='changejob.php?a=setjob&char=$id&job=23'>Elementor [M]</a><br>";
									break;
					}
				}
				if (($lvl == 120) && ($job >= 16) && ($job <= 23))
				{
					$mostrou = 'true';
					switch($job)
					{
						case 16:	echo "<a href='changejob.php?a=setjob&char=$id&job=24'>Knight [H]</a><br>";
									break;
						case 17:	echo "<a href='changejob.php?a=setjob&char=$id&job=25'>Blade [H]</a><br>";
									break;
						case 18: 	echo "<a href='changejob.php?a=setjob&char=$id&job=26'>Jester [H]</a><br>";
									break;
						case 19: 	echo "<a href='changejob.php?a=setjob&char=$id&job=27'>Ranger [H]</a><br>";
									break;
						case 20: 	echo "<a href='changejob.php?a=setjob&char=$id&job=28'>Ringmaster [H]</a><br>";
									break;
						case 21: 	echo "<a href='changejob.php?a=setjob&char=$id&job=29'>BillPoster [H]</a><br>";
									break;
						case 22: 	echo "<a href='changejob.php?a=setjob&char=$id&job=30'>Psykeeper [H]</a><br>";
									break;
						case 23: 	echo "<a href='changejob.php?a=setjob&char=$id&job=31'>Elementor [H]</a><br>";
									break;
					}
				}
				if ($mostrou == 'false')
				{
					echo "<h3><font color='#FF0000'>NOTICE</font>: Your char Already have a job, or your char is not Lvl 15 or 60 or</h3>";
					echo "</fieldset>";
					$act = 'char';
					continue;
				}
				echo "</fieldset>";
				$act = 'char';
				continue;
			}
		}
	}
	if ($act == 'setjob')
	{
		if (isset($_SESSION['user']))
		{
			$id = $_GET["char"];
			$fjob = $_GET["job"];
			$resultado = mysql_query("select * from characters AS c INNER JOIN accounts AS a ON a.username = c.accountname WHERE c.id = $id AND a.username = '$user'");
			$qde_registros = mysql_num_rows($resultado);
			if ($qde_registros != 0)
			{
				$resultado = mysql_query("select * from characters where id = $id");
				$reg = mysql_fetch_assoc($resultado);
				$lvl = $reg['level'];
				$job = $reg['class'];
				$sp = $reg['skillpoints'];
				$passou = 'false';
				$passou = ((($lvl == 15) && ($job == 0) && ($fjob >= 1) && ($fjob <= 4)) || ($passou == 'true')) ? 'true' : 'false';
				
				$passou = ((($lvl == 60) && ($job == 1) && (($fjob == 6) || ($fjob == 7))) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 60) && ($job == 2) && (($fjob == 8) || ($fjob == 9))) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 60) && ($job == 3) && (($fjob == 10) || ($fjob == 11))) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 60) && ($job == 4) && (($fjob == 12) || ($fjob == 13))) || ($passou == 'true')) ? 'true' : 'false';
				
				$passou = ((($lvl == 120) && ($job == 6) && ($fjob == 16)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 7) && ($fjob == 17)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 8) && ($fjob == 18)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 9) && ($fjob == 19)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 10) && ($fjob == 20)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 11) && ($fjob == 21)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 12) && ($fjob == 22)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 13) && ($fjob == 23)) || ($passou == 'true')) ? 'true' : 'false';
				
				$passou = ((($lvl == 120) && ($job == 16) && ($fjob == 24)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 17) && ($fjob == 25)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 18) && ($fjob == 26)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 19) && ($fjob == 27)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 20) && ($fjob == 28)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 21) && ($fjob == 29)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 22) && ($fjob == 30)) || ($passou == 'true')) ? 'true' : 'false';
				$passou = ((($lvl == 120) && ($job == 23) && ($fjob == 31)) || ($passou == 'true')) ? 'true' : 'false';
				if ($passou == 'true')
				{
					switch($fjob)
					{
						case 1: $skills = '0,0,0,4,5,6,9,10,7,8,11,12,13,14,108,109,111,112,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 2: $skills = '0,0,0,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 3: $skills = '0,0,0,44,45,46,48,49,50,51,51,52,53,104,105,113,114,115,116,117,20,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 4: $skills = '0,0,0,64,65,69,70,107,118,119,120,121,30,31,32,33,34,35,36,37,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 6: $skills = '0,0,0,4,5,6,9,10,7,8,11,12,13,14,108,109,111,112,0,0,0,0,0,128,129,130,131,132,133,134,135,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 7: $skills = '0,0,0,4,5,6,9,10,7,8,11,12,13,14,108,109,111,112,0,0,0,0,0,136,137,138,139,140,141,142,143,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 8: $skills = '0,0,0,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,0,0,0,0,207,208,209,210,211,212,213,214,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 9: $skills = '0,0,0,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,0,0,0,0,215,216,217,218,219,220,221,222,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 10: $skills = '0,0,0,44,45,46,48,49,50,51,51,52,53,104,105,113,114,115,116,117,20,0,0,144,145,146,147,148,149,150,151,230,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 11: $skills = '0,0,0,44,45,46,48,49,50,51,51,52,53,104,105,113,114,115,116,117,20,0,0,152,153,154,155,156,157,158,159,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 12: $skills = '0,0,0,64,65,69,70,107,118,119,120,121,30,31,32,33,34,35,36,37,0,0,0,160,161,162,163,164,165,166,167,0,0,0,0,0,0,0,0,0,0,0,0,0,0'; break;
						case 13: $skills = '0,0,0,64,65,69,70,107,118,119,120,121,30,31,32,33,34,35,36,37,0,0,0,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,0,0,0'; break;
						case 16: $skills = '0,0,0,4,5,6,9,10,7,8,11,12,13,14,108,109,111,112,0,0,0,0,0,128,129,130,131,132,133,134,135,0,0,0,0,0,0,0,0,0,0,0,0,310,0'; break;
						case 17: $skills = '0,0,0,4,5,6,9,10,7,8,11,12,13,14,108,109,111,112,0,0,0,0,0,136,137,138,139,140,141,142,143,0,0,0,0,0,0,0,0,0,0,0,0,309,0'; break;
						case 18: $skills = '0,0,0,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,0,0,0,0,207,208,209,210,211,212,213,214,0,0,0,0,0,0,0,0,0,0,0,0,311,0'; break;
						case 19: $skills = '0,0,0,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,0,0,0,0,215,216,217,218,219,220,221,222,0,0,0,0,0,0,0,0,0,0,0,0,312,0'; break;
						case 20: $skills = '0,0,0,44,45,46,48,49,50,51,51,52,53,104,105,113,114,115,116,117,20,0,0,144,145,146,147,148,149,150,151,230,0,0,0,0,0,0,0,0,0,0,0,316,0'; break;
						case 21: $skills = '0,0,0,44,45,46,48,49,50,51,51,52,53,104,105,113,114,115,116,117,20,0,0,152,153,154,155,156,157,158,159,0,0,0,0,0,0,0,0,0,0,0,0,315,0'; break;
						case 22: $skills = '0,0,0,64,65,69,70,107,118,119,120,121,30,31,32,33,34,35,36,37,0,0,0,160,161,162,163,164,165,166,167,0,0,0,0,0,0,0,0,0,0,0,0,314,0'; break;
						case 23: $skills = '0,0,0,64,65,69,70,107,118,119,120,121,30,31,32,33,34,35,36,37,0,0,0,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,0,313,0'; break;
						case 24: $skills = '0,0,0,4,5,6,9,10,7,8,11,12,13,14,108,109,111,112,0,0,0,0,0,128,129,130,131,132,133,134,135,0,0,0,0,0,0,0,0,0,0,0,0,310,238'; break;
						case 25: $skills = '0,0,0,4,5,6,9,10,7,8,11,12,13,14,108,109,111,112,0,0,0,0,0,136,137,138,139,140,141,142,143,0,0,0,0,0,0,0,0,0,0,0,0,309,237'; break;
						case 26: $skills = '0,0,0,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,0,0,0,0,207,208,209,210,211,212,213,214,0,0,0,0,0,0,0,0,0,0,0,0,311,239'; break;
						case 27: $skills = '0,0,0,191,192,193,194,195,196,197,198,199,200,201,202,203,204,205,206,0,0,0,0,215,216,217,218,219,220,221,222,0,0,0,0,0,0,0,0,0,0,0,0,312,240'; break;
						case 28: $skills = '0,0,0,44,45,46,48,49,50,51,51,52,53,104,105,113,114,115,116,117,20,0,0,144,145,146,147,148,149,150,151,230,0,0,0,0,0,0,0,0,0,0,0,316,244'; break;
						case 29: $skills = '0,0,0,44,45,46,48,49,50,51,51,52,53,104,105,113,114,115,116,117,20,0,0,152,153,154,155,156,157,158,159,0,0,0,0,0,0,0,0,0,0,0,0,315,243'; break;
						case 30: $skills = '0,0,0,64,65,69,70,107,118,119,120,121,30,31,32,33,34,35,36,37,0,0,0,160,161,162,163,164,165,166,167,0,0,0,0,0,0,0,0,0,0,0,0,314,242'; break;
						case 31: $skills = '0,0,0,64,65,69,70,107,118,119,120,121,30,31,32,33,34,35,36,37,0,0,0,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,0,313,241'; break;
					}
					if (($fjob >= 1) && ($fjob <= 4))
						$lvl = ', stat_str = 15, stat_int = 15, stat_sta = 15, stat_dex = 15, statpoints = 28 ';
					if (($fjob >= 16) && ($fjob <= 23))
						$lvl = ', level = 60, exp = 644602 ';
					else
						$lvl = '';
					$s_query = '';
					switch($fjob)
					{
						case 1: $sp = $sp + 40; break;
						case 2: $sp = $sp + 60; break;
						case 3: $sp = $sp + 60; break;
						case 4: $sp = $sp + 90; break;
						case 6: $sp = $sp + 100; break;
						case 7: $sp = $sp + 60; break;
						case 8: $sp = $sp + 80; break;
						case 9: $sp = $sp + 100; break;
						case 10: $sp = $sp + 100; break;
						case 11: $sp = $sp + 120; break;
						case 12: $sp = $sp + 90; break;
						case 13: $sp = $sp + 300; break;
					}
					if (($fjob >= 1) && ($fjob <= 13))
						$s_query = ", skillpoints = $sp";
					$query = mysql_query("update characters set class = $fjob, skills = '$skills'$lvl$s_query where id = $id");
					if (mysql_affected_rows() != 0)
					{
						echo "<h3>Successfully Changed Job!</h3>";
						$act = 'char';
						continue;
					}
					else
					{
						echo "<h3><font color='#FF0000'>AVISO</font>: Erro ao mudar job.</h3>";
						$act = 'char';
						continue;
					}
				}
				else
				{	
					echo "<h3><font color='#FF0000'>AVISO</font>: Erro ao mudar job.</h3>";
					$act = 'char';
					continue;
				}
			}
		}
	}
	if ($act == 'resetpos')
	{
		if (isset($_SESSION['user']))
		{
			$id = $_GET["char"];
			$resultado = mysql_query("select * from characters AS c INNER JOIN accounts AS a ON a.username = c.accountname WHERE c.id = $id AND a.username = '$user'");
			$qde_registros = mysql_num_rows($resultado);
			if ($qde_registros != 0)
			{
				$resultado = mysql_query("update characters set posX = 6973, posY = 100, posZ = 3328, posWorldID = 1 where id = $id");
				if (mysql_affected_rows() != 0)
				{
					echo "<h3>Position Reset! you are now in flaris town and you can now log in.</h3>";
					$act = 'char';
					continue;
				}
				else
				{
					echo "<h3><font color='#FF0000'>NOTICE</font>: Error attempting to change Position.</h3>";
					$act = 'char';
					continue;
				}
			}
			
		}
	}
	if ($act == 'listbuff')
	{
		if (isset($_SESSION['user']))
		{
			$id = $_GET["char"];
			$resultado = mysql_query("select * from characters AS c INNER JOIN accounts AS a ON a.username = c.accountname WHERE c.id = $id AND a.username = '$user'");
			$qde_registros = mysql_num_rows($resultado);
			if ($qde_registros != 0)
			{
				$cQuery = mysql_query("select * from characters where id = $id");
				$char = mysql_fetch_assoc($cQuery);
				$job = $char["class"];
				$str = $char["str"];
				$int = $char["int"];
				$dex = $char["dex"];
				$cCannon = ' checked';
				$cProtect = ' checked';
				$cQS = ' checked';
				$cCats = ' checked';
				$cHeapUp = ' checked';
				$cSF = ' checked';
				$cGT = ' checked';
				$cPatience = '';
				$cAccuracy = '';
				$cBeefUp = '';
				$cHaste = '';
				$cMental = '';
				if ((em($job, '0', '1', '6', '7', '11', '16', '17', '21', '24', '25', '29')) || ((em($job, 2, 3, 8, 10, 18, 20, 26, 28)) && $str >= 20))
				{
					$cBeefUp = ' checked';
					$cHaste = ' checked';
					$cAccuracy = ' checked';
				}
				if ((em($job, '4', '12', '13', '22', '23', '30', '31')) || ((em($job, '3', '10', '20', '28')) && $int >= 20))
				{
					$cMental = ' checked';
				}
				if ((em($job, '2', '8', '18', '26')) && $dex >= 20)
				{
					$cHaste = ' checked';
					$cAccuracy = ' checked';
				}
				if (em($job, '9', '19', '27'))
				{
					$cHaste = ' checked';
					$cAccuracy = ' checked';
					$cMental = ' checked';
				}
				echo "<fieldset style='padding:5px;'><legend>&nbsp;&nbsp;Buffs&nbsp;&nbsp;</legend>";
				echo "<form action='changejob.php?a=buffar&char=$id' method='POST' name='buff' id='buff'>";
				echo "<table border=1 cellpadding='1' cellspacing='0'>";
				echo "<tr><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='116'$cAccuracy> Accuracy</label></td><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='53'$cBeefUp> Beef Up</label></td></tr>";
				echo "<tr><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='50'$cCannon>  Cannon Ball</label></td><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='115'$cCats> Cat's Reflex</label></td></tr>";
				echo "<tr><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='150'$cGT> Geburah Tiphreth</label></td><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='20'$cHaste> Haste</label></td></tr>";
				echo "<tr><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='49'$cHeapUp> Heap Up</label></td><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='52'$cMental> Mental Sign</label></td></tr>";
				echo "<tr><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='46'$cPatience> Patience</label></td><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='146'$cProtect> Protect</label></td></tr>";
				echo "<tr><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='114'$cQS> Quick Step</label></td><td style='width:250px;'><label><input type='checkbox' name='chkb[]' value='148'$cSF> Spirit Fortune</label></td></tr>";
				echo "<tr><td colspan=2><label><input type='checkbox' name='selall'  onClick='sel();'> Select / Deselect All</label></td></tr>";
				echo "</table><div style='height:7px; width:100%'></div>";
				echo "<input type='submit' value='Buffs' name='buff' style='position:relative;float:left;'>";
				echo "</form>";
				echo "</fieldset>";
				$act = 'char';
				continue;
			}
		}
	}
	if ($act == 'buffar')
	{
		if (isset($_SESSION['user']))
		{
			$id = $_GET["char"];
			$chkBuff = $_POST["chkb"];
			$resultado = mysql_query("select * from characters AS c INNER JOIN accounts AS a ON a.username = c.accountname WHERE c.id = $id AND a.username = '$user'");
			//$resultado = mysql_query("select * from accounts where username = '$user'");
			$qde_registros = mysql_num_rows($resultado);
			if ($qde_registros != 0)
			{
				$tempo = 60000 * 60 * 3;
				$query = mysql_query("delete from buffs where ((skillid = 49) OR (skillid = 116) OR (skillid = 20) OR (skillid = 115) OR (skillid = 46) OR (skillid = 114) OR (skillid = 50) OR (skillid = 53) OR (skillid = 148) OR (skillid = 150) OR (skillid = 52) OR (skillid = 146)) AND charid = $id");
				for ($cont = 0; $cont < count($chkBuff); $cont++)
				{
					switch ($chkBuff[$cont])
					{
						case 49:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('49', '20', '4', '40', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 116:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('116', '20', '47', '20', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 20:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('20', '20', '24', '500', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 115:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('115', '20', '14', '12', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 46:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('46', '20', '35', '210', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 114:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('114', '20', '11', '30', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 50:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('50', '20', '2', '20', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 53:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('53', '20', '1', '20', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 148:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('148', '10', '63', '140', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 150:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('150', '10', '63', '150', '24', '500', '0', '0', '$tempo', '$id');");
									break;
						case 52:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('52', '20', '3', '20', '0', '0', '0', '0', '$tempo', '$id');");
									break;
						case 52:	$resultado = mysql_query("INSERT INTO `flyff`.`buffs` (`skillid`, `skilllvl`, `abilityType1`, `ability1`, `abilityType2`, `ability2`, `abilityType3`, `ability3`, `remainingTime`, `charid`) VALUES ('146', '10', '26', '50', '0', '0', '0', '0', '$tempo', '$id');");
									break;
					}
				}
				if (mysql_affected_rows() != 0)
				{
					echo "<h3>Buffed your Character Successfully.</h3>";
					$act = 'char';
					continue;
				}
				else
				{
					echo "<h3><font color='#FF0000'>WARNING</font>: Error attempting to buffer. either you not select a skill to buffs.</h3>";
					$act = 'char';
					continue;
				}
			}
/*			else
			{
				echo "<h3><font color='#FF0000'>ERROR</font>: This in its char.</h3>";
				$act = 'login';
				continue;
			}
*/
		}
	}
	if ($act == 'senha')
	{
		if (isset($_SESSION['user']))
		{
			$login = $_POST["login"];
			$senhaA = $_POST["senhaAntiga"];
			$senhaN = $_POST["senhaNova"];
			$senhaN2 = $_POST["senhaNova2"];
			if ((!isSet($_POST["login"])) && (!isSet($_POST["senhaAntiga"])) && (!isSet($_POST["senhaNova"])) && (!isSet($_POST["senhaNova2"])))
			{
				echo '<form method="post" action="changejob.php?a=senha">';
				echo 'Login <input type="text" name="login" READONLY value="' . $user . '"><p>';
				echo 'Old Password <input type="password" name="senhaAntiga"><p>';
				echo 'New Password <input type="password" name="senhaNova"><p>';
				echo 'Confirm New Password <input type="password" name="senhaNova2"><p>';
				echo '<input type="submit" value="OK" name="OK">';
				echo '</form>';
			}
			else
			{
				$senhaNova = md5("kikugalanet" . $senhaN);
				if (md5("kikugalanet" . $senhaN2) != $senhaNova)
				{
					echo "<h3><font color='#FF0000'>WARNING</font>: The new passwords in known.</h3>";
					unset($_POST["login"]);
					unset($_POST["senhaAntiga"]);
					unset($_POST["senhaNova"]);
					unset($_POST["senhaNova2"]);
					$act = 'senha';
					continue;
				}
				else
				{
					$senhaAntiga = md5("kikugalanet" . $senhaA);
					$res = mysql_query("select * from accounts where username = '$login' AND password = '$senhaAntiga'");
					$qtde = mysql_num_rows($res);
					if ($qtde == 0)
					{
						echo "<h3><font color='#FF0000'>NOTICE</font>: Please fill up all fields.</h3>";
						unset($_POST["login"]);
						unset($_POST["senhaAntiga"]);
						unset($_POST["senhaNova"]);
						unset($_POST["senhaNova2"]);
						$act = 'senha';
						continue;
					}
					else
					{
						$res = mysql_query("update accounts set password = '$senhaNova' where username = '$login' and password = '$senhaAntiga'");
						if (mysql_affected_rows() != 0)
						{
							echo "<h3>Password changed successfully.</h3>";
							unset($_POST["login"]);
							unset($_POST["senhaAntiga"]);
							unset($_POST["senhaNova"]);
							unset($_POST["senhaNova2"]);
							$act = 'senha';
							continue;
						}
						else
						{
							echo "<h3><font color='#FF0000'>WARNING</font>: Error attempting to change Password.</h3>";
							unset($_POST["login"]);
							unset($_POST["senhaAntiga"]);
							unset($_POST["senhaNova"]);
							unset($_POST["senhaNova2"]);
							$act = 'senha';
							continue;
						}
					}
				}
			}
		}
	}
/*	if ($act == 'res')
	{
		if (isset($_SESSION['user']))
		{
			$id = $_GET["char"];
			//$resultado = mysql_query("select * from characters AS c INNER JOIN accounts AS a ON a.username = c.accountname WHERE c.id = $id AND a.username = '$user'");
			$resultado = mysql_query("select * from accounts where username = '$user'");
			$qde_registros = mysql_num_rows($resultado);
			if ($qde_registros != 0)
			{
				$res = mysql_query("select * from characters where id = $id");
				$reg = mysql_fetch_assoc($res);
				$lvl = $reg["level"];
				$res = $reg["resets"];
				$res2 = $res + 1;
				$idJob = $reg["class"];
				if (($lvl == 120) && ($idJob >= 24) && ($idJob <= 31))
				{
					$res2 = mysql_query("update characters set resets = $res2, level = 1, exp = 0 where id = $id");
					if (mysql_affected_rows() != 0)
					{
						echo "<h3>Reset Successfully.</h3>";
						$act = 'char';
						continue;
					}
					
				{
					echo "<h3><font color='#FF0000'>WARNING</font>: You can reset the.</h3>";
					$act = 'char';
					continue;
				}
			}
		}
	}
*/
	break;
}

?>
<?php
?>
<br>
<div style="background:#DDDDDD;width:100%; border:1px solid black; text-align:center;"><font size=3 color="#AA0000">FlyFor-Soft Buffs,ChangeJob,ChangPass,Reset Position.</font></div> <center><font size=10>
</body>
</html>