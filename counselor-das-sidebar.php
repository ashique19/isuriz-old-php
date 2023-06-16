<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>


<nav class="sidebar" data-sidebar-anyclick-close="">
<!-- START sidebar nav-->
  <ul class="sidebar-nav">
  
  <?php 
  if($_SESSION['usertype'] == 'College_Counselor'): ?>
      <li class="nav-heading "><span data-localize="sidebar.heading.HEADER">Main Navigation</span></li>
      
      <li class="<?php echo ($first_part == "dashboard.php") ? "active" : "";?>">
          <a href="dashboard.php" title="Dashboard" >
          <em class="icon-speedometer"></em>
              <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
          </a>
      </li>
      <!-- Nav Item - Dashboard -->
<!--      <li class='nav-item --><?php //echo ($first_part == "counselor-dashboard.php") ? "active" : "";?><!--'>-->
<!--          <a class="nav-link" href="counselor-dashboard.php"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span></a>-->
<!--      </li>-->
      <!-- Divider -->
      <!-- <hr class="sidebar-divider"> -->
    <!-- Nav Item - Profile -->
<!--    <li class='nav-item --><?php //echo ($first_part == "counselor-profile.php") ? "active" : "";?><!--'>-->
<!--      <a class="nav-link" href="counselor-profile.php"> <i class="fas fa-user-cog"></i> <span>Profile</span></a>-->
<!--    </li>-->


    <!-- Nav Item - About -->
<!--  <li class='nav-item --><?php //echo ($first_part == "counselor-about.php") ? "active" : "";?><!--'>-->
<!--    <a class="nav-link" href="counselor-about.php"> <i class="fas fa-user-edit"></i><span>About</span></a>-->
<!--  </li>-->

  <!-- Nav Item - Fees -->
<!--  <li class='nav-item --><?php //echo ($first_part == "counselor-fees.php") ? "active" : "";?><!--'>-->
<!--    <a class="nav-link" href="counselor-fees.php"> <i class="fas fa-hand-holding-usd"></i> <span>Fees</span></a>-->
<!--  </li>-->

  <!-- Student List -->
	<!--
  <li class='nav-item <?php echo ($first_part == "counselor-student.php") ? "active" : "";?>'>
    <a class="nav-link" href="counselor-student.php"> <i class="fas fa-user-friends"></i> <span>Student List</span></a>
  </li>
-->

  <?php else: ?>
    <li class="nav-heading "><span data-localize="sidebar.heading.HEADER">Main Navigation</span></li>

      <li class="<?php echo ($first_part == "dashboard.php") ? "active" : "";?>">
          <a href="dashboard.php" title="Dashboard" >
          <em class="icon-speedometer"></em>
              <span data-localize="sidebar.nav.DASHBOARD" class="student_class">Dashboard</span>
          </a>
      </li>
<!--    <li class='nav-item --><?php //echo ($first_part == "my-counselor-list.php") ? "active" : "";?><!--'>-->
<!--      <a class="nav-link" href="my-counselor-list.php"> <i class="fas fa-user-check"></i> <span>My College Counselors</span></a>-->
<!--    </li>-->

<!--    <li class='nav-item --><?php //echo ($first_part == "counselor-list.php") ? "active" : "";?><!--'>-->
<!--      <a class="nav-link" href="counselor-list.php"> <i class="fas fa-search"></i> <span>College Counselors</span></a>-->
<!--    </li>-->

<!--    <li class='nav-item --><?php //echo ($first_part == "counselor-contact-us.php") ? "active" : "";?><!--'>-->
<!--      <a class="nav-link" href="counselor-contact-us.php"> <i class='fas fa-envelope'></i> <span> Contact Us</span></a>-->
<!--    </li>-->


  <?php endif; ?>

    <li class="<?php echo ($first_part == "counselor_college_list.php") ? "active" : "";?>">
        <a href="my-college-list.php"> 
          <em class="fas fa-list"></em>
          <span class="<?php echo ($first_part == "counselor_college_list.php") ? "active_span" : "";?>">My College List</span>
        </a>
    </li>
	
	<!-- <li class="<?php echo ($first_part == "all_message_new.php") ? "active" : "";?>">
        <a class="nav-link" href="all_message_new.php"> 
          <em class="fas fa-comment-dots"></em> 
          <span class="<?php echo ($first_part == "all_message_new.php") ? "active_span" : "";?>">All Messages</span>
        </a>
    </li> -->
	

    <li>
        <a href="form2.php"> 
          <em class="fas fa-th-large"></em>
          <span>Build My College List</span>
        </a>
    </li>


    <li class="<?php echo ($first_part == "counselor_invite.php") ? "active" : "";?>">
        <a href="dashboard-invite.php"> 
        <em class="fas fa-user-plus"></em> 
        <span class="<?php echo ($first_part == "counselor_invite.php") ? "active_span" : "";?>">Invite Students</span></a>
    </li>
    
    <li class="<?php echo ($first_part == "counselor-dashboard.php") ? "active" : "";?>">
        <a href="counselor-dashboard.php">
            <em class="fa fa-stream"></em>
            <span class="<?php echo ($first_part == "counselor-dashboard.php") ? "active_span" : "";?>">College Counselor Hub</span>
        </a>
    </li>

    <li class="<?php echo ($first_part == "testimonial.php") ? "active" : "";?>">
    <a href="testimonial.php" title="Testimonial">
         <em class="fas fa-star-half-alt"></em>
         <span>Write Testimonial</span>                     
      </a>                    
   </li>

   <li class="<?php echo ($first_part == "counselor_contact_us.php") ? "active" : "";?>">
        <a href="dashboard-contact-us.php">
        <em class="fas fa-envelope"></em>
        <span class='<?php echo ($first_part == "counselor_contact_us.php") ? "active_span" : "";?>'>Contact Us</span></a>
    </li>

    <li class="<?php echo ($first_part == "counselor_setting.php") ? "active" : "";?>">
        <a href="dashboard-updateprofile.php"> 
        <em class="fas fa-cog"></em> 
        <span class="<?php echo ($first_part == "counselor_setting.php") ? "active_span" : "";?>">Settings</span></a>
    </li>

    <li>
      <a href="#" id="loglinkbtn" class="loglinkbtn" data-toggle="modal" data-target="#logoutModal">
        <em class="icon-lock"></em>
        <span>Logout</span>
      </a>     
    </li>

  <!-- Divider -->
<!--  <hr class="sidebar-divider d-none d-md-block">-->
  <!-- Sidebar Toggler (Sidebar) -->
<!--  <div class="text-center d-none d-md-inline">-->
<!--    <button class="rounded-circle border-0" id="sidebarToggle"></button>-->
<!--  </div>-->
</ul>

</nav>

