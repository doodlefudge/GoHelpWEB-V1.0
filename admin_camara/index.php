<!DOCTYPE html>
<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ob_start();
if(isset($_POST['user'])){
	try{
		include_once(dirname(__FILE__).'/assets/connection/connection.php');
		session_start();
		
	
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql= "SELECT count(*) as count,user from login where user = :user AND pass = :pass AND login_level	 = '0'"; 
		$stmt = $pdo->prepare($sql);
		$id = $_POST['user'];
		$pass =  $_POST['pass'];
		$stmt->bindParam(':user', $id);
		$stmt->bindParam(':pass', $pass);
		$stmt->execute();
		$obj = $stmt->fetchObject();
		if($obj->count >0){
			$_SESSION['user'] = $_POST['user'];	
			header('location: http://admin.camayacoast.ph/dashboard.php');
		}else{
			//TODO MODAL TO NOTIFY USER OF LOGIN
			?>
			<script language = "javascript">
			alert('Account is not authorized to use this Web App. ');
			</script>
			<?php
			
		}
	}catch(PDOException $e){
		//echo basename(__DIR__) ;
		//echo "Error: " . $e->getMessage();
	
		}
}

?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Camaya Coast Admin Panel</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
</head>
<body style="background-color: #E2E2E2;">
    <div class="container">
        <div class="row text-center " style="padding-top:50px;">
            <div class="col-md-12">
                <img src="assets/img/logo-invoice.gif"style="height: 250px;"/>
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
                                 
                                     
                                       <input type="submit" class="btn btn-primary" name ="submit"value = "Login"/>
                             
                            </div>
                           
                        </div>
                
                
        </div>
    </div>

</body>
</html>
