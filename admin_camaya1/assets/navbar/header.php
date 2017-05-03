<nav class="navbar navbar-default navbar-cls-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse"><span class=
                "sr-only">Toggle navigation</span></button> <a class="navbar-brand" href="#">Camaya Coast PH</a>
            </div>

            <div class="header-right">
				<?php
				session_start();
				include_once('/home/camayaco/public_html/admin/assets/connection/connection.php');
				//$pdo = new PDO($dsn, $user, $pass);
				$sql = "SELECT COUNT(*) as count FROM schedule_info WHERE schedule_status = 1";
				$stmt = $pdo->prepare($sql);
				$stmt->execute();
				$obj = $stmt->fetchAll();

				?>

            </div>
 </nav>