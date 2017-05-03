<div class="loginform-in">
		<h1>User Login</h1>
		<div class="err" id="add_err"></div>
		<fieldset>	
			<form action="./" method="post">
				<ul>
					<li> <label for="name">Username </label>
					<input type="text" size="30"  name="name" id="name"  /></li>
					<li> <label for="name">Password</label>
					<input type="password" size="30"  name="word" id="word"  /></li>
					<li> <label></label>
					<input type="submit" id="add" name="add" value="add" class="loginbutton" value ="add" ></li>
				</ul>
				 </form>	
		</fieldset>
		</div>
<?php
session_start();
if (isset($_POST['add'])) {

    include_once 'config.php';

    $first_name = $_POST['name'];
    $middle_name = md5($_POST['word']);
    

    $sql = "INSERT INTO `ajax_db`
            VALUES(
                '$first_name',
                '$middle_name',
                'Yes',
				'active'
				)";

    mysql_query($con, $sql);


}
?>