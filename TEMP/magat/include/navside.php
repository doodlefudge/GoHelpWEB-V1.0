  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['login_user']?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
  
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="index.php">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        
        </li>
        <li class="treeview">
          <a href="requests.php">
            <i class="fa fa-files-o"></i>
            <span>Request</span>
          </a>
		  <li class="treeview">
          <a href="bill_of_materials.php">
            <i class="fa fa-files-o"></i>
            <span>Bill of Materials</span>
          </a>
         
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Items Maintenance</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="create_items.php"><i class="fa fa-circle-o"></i> Create Items</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Update/Delete Items</a></li>
            <li><a href="item_stocks.php"><i class="fa fa-circle-o"></i> See Item Stock</a></li>
			<li><a href="create_item_category.php"><i class="fa fa-circle-o"></i> Create Item Category</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Update/Delete Item Category</a></li>
          </ul>
        </li>

		<li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Suppliers</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="create_client.php"><i class="fa fa-circle-o"></i> View Client</a></li>
            <li><a href="create_items.php"><i class="fa fa-circle-o"></i> Create Client</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Update/Delete Items</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
