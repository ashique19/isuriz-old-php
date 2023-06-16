<?php 
$directoryURI = $_SERVER['REQUEST_URI'];
$path = parse_url($directoryURI, PHP_URL_PATH);
$components = explode('/', $path);
$first_part = $components[1];
?>


<nav class="sidebar" data-sidebar-anyclick-close="">
                  <!-- START sidebar nav-->
                  <ul class="sidebar-nav">
                     <!-- START user info-->
                     <!-- <li class="has-user-block">
                        <div class="collapse show" id="user-block">
                           <div class="item user-block">
                              <!-- User picture-->
                              <!-- <div class="user-block-picture">
                                 <div class="user-block-status">
                                    <img class="img-thumbnail rounded-circle" src="images/user.png" alt="Avatar" width="60" height="60">
                                    <div class="circle bg-success circle-lg"></div>
                                 </div>
                              </div> -->
                              <!-- Name and Job-->
                              <!-- <div class="user-block-info"><span class="user-block-name">Hello, Arul</span><span class="user-block-role">Designer</span></div>
                           </div>
                        </div>
                     </li> -->
                     <!-- END user info-->
                     <!-- Iterates over all sidebar items-->
                     <li class="nav-heading ">
                        <span data-localize="sidebar.heading.HEADER">Main Navigation</span>
                     </li>
                     <li class="<?php echo ($first_part == "dashboard.php") ? "active" : "";?>">
                        <a href="dashboard.php" title="Dashboard" >
                        <em class="icon-speedometer"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">Dashboard</span>
                        </a>
                     </li>
                     <li class="<?php echo ($first_part == "my-college-list.php") ? "active" : "";?>">
                        <a href="my-college-list.php" title="My College List" >
                        <em class="fas fa-list"></em>
                        <span data-localize="sidebar.nav.DASHBOARD">My College List</span>
                        </a>
                     </li>
                     <li class=" ">
                        <a href="form2.php" title="Edit Profile">
                        <em class="fas fa-th-large"></em>
                        <span data-localize="sidebar.nav.WIDGETS">Build My College List</span>
                        </a>
                     </li>
                     <!--<li class=" ">
                        <a href="#layout1" title="Find a College">
                        <em class="fab fa-wpexplorer"></em>
                        <span>Find a College</span>
                        </a>
                     </li>
                     <li class=" ">
                        <a href="#layout1" title="Launch List Builder">
                        <em class="far fa-folder-open"></em>
                        <span>Launch List Builder</span>
                        </a>
                     </li>-->
                     
                     <li class="<?php echo ($first_part == "dashboard-invite.php") ? "active" : "";?>">
                        <a href="dashboard-invite.php" title="Invite Students">
                        <em class="fas fa-user-plus"></em>
                        <span>Invite Students</span>
                        </a>
                     </li>
					  
					      <li class="<?php echo ($first_part == "counselor-dashboard.php") ? "active" : "";?>">
                        <a href="counselor-dashboard.php" title="College Counselor Hub">
                           <em class="fa fa-stream"></em>
                           <span>College Counselor Hub</span>                        
                        </a>                    
                     </li> 

                     <li class="<?php echo ($first_part == "high-school-internships.php") ? "active" : "";?>">
                        <a href="high-school-internships.php" title="High School Internships">
                           <em class="fa fa-book"></em>
                           <span>Internships</span>                        
                        </a>                    
                     </li> 

                     <li class="<?php echo ($first_part == "testimonial.php") ? "active" : "";?>">
                        <a href="testimonial.php" title="Testimonial">
                           <em class="fas fa-star-half-alt"></em>
                           <span>Write Testimonial</span>                     
                        </a>                    
                     </li> 
                     <li class="<?php echo ($first_part == "dashboard-contact-us.php") ? "active" : "";?>">
                        <a href="dashboard-contact-us.php" title="Contact Us">
                        <em class="fas fa-envelope"></em>
                        <span>Contact Us</span>
                        </a>
                     </li>

                     <li class="<?php echo ($first_part == "college-news-subscription.php") ? "active" : "";?>">
                        <a href="college-news-subscription.php" title="Contact Us">
                        <em class="fas fa-newspaper"></em>                       
                        <span>New Alerts</span>
                        </a>
                     </li>


                     <li class="<?php echo ($first_part == "dashboard-updateprofile.php") ? "active" : "";?>">
                        <a href="dashboard-updateprofile.php" title="Settings">
                        <em class="fas fa-cog"></em>
                        <span>Settings</span>
                        </a>
                     </li>
					  
                     <li class=" ">
                        <a href="logout.php" title="Logout">
                        <em class="icon-lock"></em>
                        <span>Logout</span>
                        </a>
                     </li>
                                         
                  </ul>
                  <!-- END sidebar nav-->
               </nav>