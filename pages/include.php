<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="home.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>O</b>MS</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>O</b>BS<b>MS</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

    
        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <li class="dropdown messages-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-envelope-o"></i>
              <span class="label label-success">4</span>
            </a>
           </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning">10</span>
            </a>
           </li>
          <!-- Tasks: style can be found in dropdown.less -->
          <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag-o"></i>
              <span class="label label-danger">9</span>
            </a>
           </li>
          <!-- Notifications: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION['name']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION['name']; ?>
                  <small><?php echo $_SESSION['email']; ?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#"><?php echo $_SESSION['f_id']; ?></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"><?php echo $_SESSION['department']; ?></a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#"><?php echo $_SESSION['phonenumber']; ?></a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="lockscreen.php" class="btn btn-default btn-flat">Sign out</a>
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
      
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li> 
       
      <li><a href="addstudent.php"><i class="fa fa-graduation-cap text-green"></i><span>Students</span></a></li>
        <li><a href="outcome.php"><i class="fa fa-star text-yellow"></i><span>Outcome</span></a></li>
     
            <li><a href="subjects.php"><i class="fa fa-book text-red"></i><span>Subjects</span></a></li>
           
            <li><a href="#"><i class="fa  fa-institution (alias) text-blue"></i><span>Departments</span></a></li>
            
            <li><a href="question.php"><i class="fa fa-newspaper-o text-white"></i><span>Prepare Question Paper</span></a></li>
            
            <li><a href="markentry.php"><i class="fa  fa-keyboard-o text-red"></i><span>Marks</span></a></li>
           
            <li><a href="#"><i class="fa   fa-line-chart text-yellow"></i><span>Reports</span></a></li>
            
        
        <li class="header">More </li>
        <li><a href="home.php"><i class="fa fa-circle-o text-red"></i> <span>Home</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Contact us!</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Help</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
