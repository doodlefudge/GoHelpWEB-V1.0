<nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"><span class=
                "sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="#">GoHelp</a>
            </div>

            <div class="header-right">
				<?php 
				session_start();
				include_once('assets\connection\connection.php');
				$pdo = new PDO($dsn, $user, $pass);
				$sql = "SELECT COUNT(*) as count FROM tbl_service_request WHERE service_status = '1'";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$obj = $stmt->fetchAll();
							
				?>
				
                <a href="worker_declined_confirmations.php" class="btn btn-danger" title="errors"><b><?php echo $pdo->query("SELECT COUNT(*) FROM tbl_service_request r 
																	LEFT JOIN tbl_service_confirmation c ON r.request_id = c.request_id 
																	LEFT JOIN tbl_user_info i ON c.worker_id = i.id 
																	LEFT JOIN tbl_user_info cust ON cust.id = r.customer_id 
																	LEFT JOIN tbl_service_detail d ON  r.serv_detail_id = d.serv_detail_id 
																	WHERE r.service_status = '2' AND c.worker_conf_status = '-1' AND c.serv_conf_status = '0'")->fetchColumn(); 
								?> </b><i class="fa fa-exclamation-circle fa-2x"></i></a>
				<a href="service_panel.php" class="btn btn-info" title="New Message"><b><?php echo $obj[0]['count']?> </b><i class="fa fa-envelope-o fa-2x"></i></a>

				  <a href="request_confirmation.php" class="btn btn-success" title="errors"><b><?php echo $pdo->query("
				  SELECT COUNT(*) as count FROM tbl_service_request r 
											LEFT JOIN tbl_service_confirmation c ON r.request_id = c.request_id 
											LEFT JOIN tbl_user_info i ON c.worker_id = i.id 
											LEFT JOIN tbl_user_info cust ON cust.id = r.customer_id 
											LEFT JOIN tbl_service_detail d ON  r.serv_detail_id = d.serv_detail_id 
											WHERE r.service_status = '2' AND c.worker_conf_status = '1' AND c.serv_conf_status = '0'")->fetchColumn(); 
								?> </b><i class="fa fa-bolt fa-2x"></i></a>
            </div>
 </nav>