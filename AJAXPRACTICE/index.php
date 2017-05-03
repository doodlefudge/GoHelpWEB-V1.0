<html>
	<head>
		<script src="scripts/jquery-2.2.2.js" type="text/javascript"></script>
		<script src="login.js" type="text/javascript"></script>
		<link href="style.css" rel="stylesheet" type="text/css"/>
	</head>
	<body>
		<div class="loginform-in">
		<h1>User Login</h1>
		
		<fieldset>	
			<form action="./" method="post">
				<ul>
					 <label for="name">Username </label>
					<input type="text" size="30"  name="name" id="name"  />
					 <label for="name">Password</label>
					<input type="password" size="30"  name="word" id="word"  /></li>
					<label></label>
					
				</ul>
				<br><br><br><br><br><br>
				<input type="submit" id="login" name="login" value="Login" class="loginbutton" >
				 </form>	
				 <div class="err" id="add_err"></div>
		</fieldset>
		</div>
	</body>
</html>
