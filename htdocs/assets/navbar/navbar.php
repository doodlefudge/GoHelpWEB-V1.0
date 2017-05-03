 <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
							<?php 
								include_once('assets\connection\connection.php');
								$pdo = new PDO($dsn, $user, $pass);
								$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
								$sql= "SELECT i.fname as fname ,i.lname as lname ,u.user,u.id from tbl_user u left join tbl_user_info i on u.id = i.id where u.user = :user"; 
								$stmt = $pdo->prepare($sql);
								$stmt->bindParam(':user', $_SESSION['user']);
								$stmt->execute();
								$obj = $stmt->fetchObject();
								?>
                            <div class="inner-text">
                                <?php echo $obj->fname . " " . $obj->lname?>
                                <small>Last Login : 2 Weeks Ago </small>
                            </div>
							
                        </div>

                    </li>
                    <li>
                        <a class="active-menu" href="dashboard.php"><i class="fa fa-dashboard "></i>Dashboard</a>
					</li>
                    <li>
                        <a href="#"><i class="fa fa-desktop"></i>Service Requests <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="service_panel.php"><i class="fa fa-cog"></i>Service Panel</a>
                            </li>
							<li>
                                <a href="request_confirmation.php"><i class="fa fa-cog"></i>Request Confirmation</a>
                            </li>
							<li>
                                <a href="request_sent_to_workers.php"><i class="fa fa-cog"></i>Requests Sent to Workers</a>
                            </li>
							<li>
                                <a href="worker_declined_confirmations.php"><i class="fa fa-cog"></i>Worker Declined Service Request</a>
                            </li>
                            <li>
                                <a href="service_history.php"><i class="fa fa-wrench "></i>Service History</a>
                            </li>
							<li>
                                <a href="service_monitoring.php"><i class="fa fa-calendar "></i>Scheduled Services</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-archive "></i>Service Management <span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="add_service_category.php"><i class="fa fa-cog"></i>Create Service Page</a>
                            </li>
                            <li>
                                <a href="edit_service_category.php"><i class="fa fa-wrench "></i>Update Service Page</a>
                            </li>
                             <li>
                                <a href="add_service.php"><i class="fa fa-cog "></i>Create Service</a>
                            </li>
                             <li>
                                <a href="edit_service.php"><i class="fa fa-wrench "></i>Update Service</a>
                            </li>

                        </ul>
                    </li>
                 
                    <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Workers<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                           	<li>
                                <a href="worker_view.php"><i class="fa fa-desktop "></i>View Account </a>
                            </li>
                            <li>
                                <a href="work_add.php"><i class="fa fa-cog "></i>Create Account </a>
                            </li>
                            <li>
                                <a href="worker_skills.php"><i class="fa fa-wrench "></i>Add training to Workers</a>
                            </li>
							<li>
                                <a href="attendance.php"><i class="fa fa-users "></i>Attendance for worker's Training</a>
                            </li>
							<li>
                                <a href="list_of_worker_skills.php"><i class="fa fa-wrench "></i>List of Workers</a>
                            </li>
                           <li>
                                <a href="workers_per_skill.php"><i class="fa fa-wrench "></i>Workers per Skills</a>
                            </li>
                        </ul>
                    </li>                    
					<li>
                        <a href="#"><i class="fa fa-user"></i> Customers<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="customer_view.php"><i class="fa fa-desktop "></i>View Account </a>
                            </li>
                       
                        </ul>
                    </li>
                     <li>
                        <a href="#"><i class="fa fa-users"></i> Reports<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="profit_reports.php"><i class="fa fa-desktop "></i>Profit Reports</a>
                            </li>
                            <li>
                                <a href="profit_per_worker.php"><i class="fa fa-code "></i>Worker's Reports</a>
                            </li>	
							 <li>
                                <a href="comments_section.php"><i class="fa fa-code "></i>Comments and Ratings</a>
                            </li>	
                        </ul>
                    </li>	
					<li>
                        <a href="index.php"><i class="fa fa-sign-in "></i>Log Out</a>
                    </li>
                </ul>

            </div>

        </nav>