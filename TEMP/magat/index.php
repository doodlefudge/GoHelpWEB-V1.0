<!DOCTYPE html>
<?php
if(isset($_POST['user'])){
	try{
		session_start(); // Starting Session
		$error=''; // Variable To Store Error Message
		if (isset($_POST['submit'])) {
		if (empty($_POST['user']) || empty($_POST['pass'])) {
			$error = "Username or Password is invalid";
		}
		else
		{
		// Define $username and $password
			$username=$_POST['user'];
			$password=$_POST['pass'];
			// Establishing Connection with Server by passing server_name, user_id and password as a parameter
			$connection = mysql_connect("localhost", "root", "");
			// To protect MySQL injection for Security purpose
			$username = stripslashes($username);
			$password = stripslashes($password);
			$username = mysql_real_escape_string($username);
			$password = mysql_real_escape_string($password);
			// Selecting Database
			$db = mysql_select_db("db_ict_31", $connection);
			// SQL query to fetch information of registerd users and finds user match.
			$query = mysql_query("select * from user where password='$password' AND username='$username'", $connection);
			$rows = mysql_num_rows($query);
			if ($rows == 1) {
				$_SESSION['login_user']=$username; // Initializing Session
				header("location: dashboard.php"); // Redirecting To Other Page
			} else {
				$error = "Username or Password is invalid";
			}
			mysql_close($connection); // Closing Connection
		}
		}
	}catch(PDOException $e){
		echo "Error: " . $e->getMessage();
	}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
    <?php include('include/header.php');?>

<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:50px;">
            <div class="col-md-12">
                <img src="img/logo.png"style="height: 250px;"/>
            </div>
        </div>
         <div class="row ">
               
                <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
                           
                            <div class="panel-body">
                                <form method = "post">
                                    <hr />
                                    <h5>Enter Details to Login</h5>
                                       <br />
                                     <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
                                            <input type="text" class="form-control"name ="user" placeholder="Your Username " />
                                        </div>
                                                                              <div class="form-group input-group">
                                            <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
                                            <input type="password" class="form-control" name ="pass" placeholder="Your Password" />
                                        </div>
                                    <div class="form-group">
                                            <label class="checkbox-inline">
                                                <input type="checkbox" /> Remember me
                                            </label>
                                            <span class="pull-right">
                                            </span>
                                        </div>
                                     
                                       <input type="submit" class="btn btn-primary" name ="submit"value = "Login"/>
                                    <hr />
                                    </form>
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
