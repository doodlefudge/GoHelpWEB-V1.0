<nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"><span class=
                "sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="#">Camaya PH</a>
            </div>

            <div class="header-right">
				<?php 
				session_start();
				include_once('/home/camayaco/public_html/admin/assets/connection/connection.php');
				//$pdo = new PDO($dsn, $user, $pass);
				$sql = "SELECT COUNT(*) as count FROM schedule_info";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$obj = $stmt->fetchAll();

				?>
				
                <a href="worker_declined_confirmations.php" class="btn btn-danger" title="errors"><b><?php echo $pdo->query("SELECT COUNT(*) as count FROM customer_inquiry")->fetchColumn(); 
								?> </b><i class="fa fa-exclamation-circle fa-2x"></i></a>
				<a href="service_panel.php" class="btn btn-info" title="New Message"><b><?php echo $obj[0]['count']?> </b><i class="fa fa-envelope-o fa-2x"></i></a>

				  <a href="request_confirmation.php" class="btn btn-success" title="errors"><b><?php echo $pdo->query("
				  SELECT COUNT(*) as count FROM user_message")->fetchColumn(); 
								?> </b><i class="fa fa-bolt fa-2x"></i></a>
            </div>
 </nav>