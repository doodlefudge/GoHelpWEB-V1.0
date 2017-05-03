 <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li>
                        <div class="user-img-div">
                            <img src="assets/img/user.png" class="img-thumbnail" />
							<?php 
								session_start();
								include_once('../gohelp.me/assets/connection/connection.php');
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
                            <br />
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
                                <a href="service_history.php"><i class="fa fa-wrench "></i>Service History</a>
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
                                <a href="form.html"><i class="fa fa-desktop "></i>View Account </a>
                            </li>
                            <li>
                                <a href="worker_add.php"><i class="fa fa-cog "></i>Create Account </a>
                            </li>
                             <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>Update/Edit Account</a>
                            </li>
                             
                           
                        </ul>
                    </li>                    
					<li>
                        <a href="#"><i class="fa fa-user"></i> Customers<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
                            <li>
                                <a href="form.html"><i class="fa fa-desktop "></i>View Account </a>
                            </li>
                             <li>
                                <a href="form-advance.html"><i class="fa fa-code "></i>Update/Edit Account</a>
                            </li>	
                        </ul>
                    </li>
                     

                   
                    <li>
                        <a href="blank.html"><i class="fa fa-square-o "></i>Audit Trail</a>
                    </li>
					<li>
                        <a href="login.html"><i class="fa fa-sign-in "></i>Log Out</a>
                    </li>
                </ul>

            </div>

        </nav>