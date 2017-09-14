
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/adminprofile/<?php echo $_SESSION['aprofile']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['admin']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="images/adminprofile/<?php echo $_SESSION['aprofile']; ?>" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['admin']; ?>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <!-- <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div> -->
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>

    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="images/adminprofile/<?php echo $_SESSION['aprofile']; ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['admin']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="homeslider.php">
            <i class="fa fa-list "></i> <span>Manage Home Slider</span>
          </a>
        </li>
        <li>
          <a href="categoryslider.php">
            <i class="fa fa-list "></i> <span>Manage Category Slider</span>
          </a>
        </li>
        <li>
          <a href="hotdeals.php">
            <i class="fa fa-list "></i> <span>Manage Hotdeals</span>
          </a>
        </li>
        <li>
          <a href="products.php">
            <i class="fa fa-list "></i> <span>Add Products</span>
          </a>
        </li>
        <li>
          <a href="productview.php">
            <i class="fa fa-list "></i> <span>Manage Product</span>
          </a>
        </li>
        <li>
          <a href="category.php">
            <i class="fa fa-list "></i> <span>Manage Category</span>
          </a>
        </li>
        <li>
          <a href="order.php">
            <i class="fa fa-list "></i> <span>Manage Order</span>
          </a>
        </li>
        <li>
          <a href="return.php">
            <i class="fa fa-list "></i> <span>Manage Order Return</span>
          </a>
        </li>
        <li>
          <a href="state-city.php">
            <i class="fa fa-globe"></i> <span>Manage State & City</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
