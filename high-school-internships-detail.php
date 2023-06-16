<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>High School Internships</title>
      <!-- =============== VENDOR STYLES ===============-->
      <!-- FONT AWESOME-->
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/brands.css">
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/regular.css">
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/solid.css">
      <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/fontawesome.css">
      <!-- SIMPLE LINE ICONS-->
      <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
      <!-- ANIMATE.CSS-->
      <link rel="stylesheet" href="vendor/animate.css/animate.css">
      <!-- WHIRL (spinners)-->
      <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
      <!-- =============== PAGE VENDOR STYLES ===============-->
      <!-- WEATHER ICONS-->
      <link rel="stylesheet" href="vendor/weather-icons/css/weather-icons.css">
      <!-- =============== BOOTSTRAP STYLES ===============-->
      <link rel="stylesheet" href="css/bootstrap.css" id="bscss">
      <!-- =============== APP STYLES ===============-->
      <link rel="stylesheet" href="css/app.css" id="maincss">
      <link rel="stylesheet" href="css/dashboard.css" >
      <!-- Custom CSS -->
      <link href="css/site.css" rel="stylesheet">
   </head>
   <body>
      <div class="wrapper">
         <!-- top navbar-->
         <header class="topnavbar-wrapper theme-custom-header">
            <!-- START Top Navbar-->
            <nav class="navbar topnavbar">
               <!-- START navbar header-->
               <div class="navbar-header mr-auto">
                  <?php 
					if (!isset($_SESSION['userid'])) {
						echo '<a class="navbar-brand" href="index.php">';
					}
					else{
						echo '<a class="navbar-brand" href="dashboard.php">';
					}
					?>
                     <div class="brand-logo"><img class="img-fluid" src="https://isuriz.com/images/logo.png" alt="App Logo" ></div>
                     <div class="brand-logo-collapsed"><img class="img-fluid" src="images/collapse-logo.png" alt="App Logo"></div>
                  </a>
               </div>
               <!-- END navbar header-->
               <!-- START Left navbar-->
               <ul class="navbar-nav mr-auto flex-row both-toggle-btn">
                  <li class="nav-item">
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="javascript:void(0);" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a>
                     <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
                     <a class="nav-link sidebar-toggle d-md-none" href="javascript:void(0);" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a>
                  </li>
                  <!-- START User avatar toggle-->
                  <!-- <li class="nav-item d-none d-md-block"> -->
                     <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
                     <!-- <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse"><em class="icon-user"></em></a>
                  </li> -->
                  <!-- END User avatar toggle-->
               </ul>
               <!-- END Left navbar-->

               <!--user status-->
               <div class="user-status">
                  <?php 
                     $id =$_SESSION['userid'];
                     $sql ="SELECT * FROM `commission` WHERE `from_id` =$id";
                     $qu =mysqli_query($con, $sql);
                     if(mysqli_num_rows($qu) >= 0){
                       $row =mysqli_fetch_array($qu);  
                        if($row['credits'] >4) {  ?>    
                          <!-- <em class="fa fa-user-check"></em> -->
                          <i class="fas fa-user-circle"></i>
                        <?php echo "<span>Premium</span> <span>Account</span>"; 
                         }else {?>
                          <!-- <em class="fa fa-user"></em> -->
                          <i class="fas fa-user-circle"></i>
                        <?php echo "<span>Basic</span> <span>Account</span>";?>
                        <?php  } } ?> 
                     </div>   
               <!--end user status-->

               <!-- START Right Navbar-->
               <ul class="navbar-nav flex-row">
                  <!-- Search icon-->
                  <li class="nav-item"><a class="nav-link dashboard-logout" href="logout.php" data-search-open="">Logout</a></li>
                  <!-- Fullscreen (only desktops)-->
                  <!-- START Offsidebar button-->
               </ul>
               <!-- END Right Navbar-->
            </nav>
            <!-- END Top Navbar-->
         </header>
         <!-- sidebar-->
         <aside class="aside-container">
            <!-- START Sidebar (left)-->
            <div class="aside-inner">
               <!-- ************left side navbar menu items****************** -->
               <?php include 'dashboard-left-nav.php'; ?>
               <!-- ************end left side navbar menu items****************** -->
            </div>
            <!-- END Sidebar (left)-->
         </aside>
         <section class="section-container">
            <!-- Page content-->
            <div class="content-wrapper">
               <div class="content-heading" id="welcometext-div">
                  <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Software Development Intern</h3><small data-localize="dashboard.WELCOME"></small></div>
               </div>
         
               <!-- 
               <div class="row">
                  <div class="col-xl-2 col-lg-6 col-md-3">
                    
                  </div>
                  <div class="col-xl-8 col-md-6 home-search-bar">
                    
                     <form action="#!" style="width: 100%">
                        <div class="input-group">
                           <input class="form-control form-control-lg" type="text" placeholder="Search for a College by Name"><span class="input-group-btn">
                           <button class="btn btn-secondary btn-lg" type="submit"><i class="fa fa-search"></i></button></span>
                        </div>
                     </form>
           
                    
                  </div>
                  <div class="col-xl-2 col-lg-6 col-md-3">
                    
                  </div>
               </div>
                -->
               <div class="row">
                  <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     <!-- START -->
                     <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">
                           <div class="internship-detail-wrapper py-3">
                           <div class="row">
                              <div class="col-12 col-xl-12 col-xxl-8">
                                <p class="mb-1"><strong>About Internships</strong></p>
                                <p>We are seeking a four-week summer intern to work with an internal platform as a full stack developer to design and implement web applications into the platform. As a full-stack developer you will be asked to work with the following technologies: React.js, JSX, Styling (Bootstrap, Less), Webpack, NPM, Docker or containers, Django, Python, MongoDB, & PostgreSQL. Experience with all of these technologies is not required, but web application experience and knowledge are necessary for a fulfilling internship experience.</p>
                                <p class="mb-1"><strong>Responsibilities</strong></p> 
                                <p>Designing, creating, testing, and maintaining applications within the platform Fixing any user submitted bugs</p>
                                <p class="mb-1"><strong>Age Range</strong></p> 
                                <p>16-18</p>
                                <p class="mb-1"><strong>Durations</strong></p> 
                                <p>6 Weeks</p>

                            </div>
                              <div class="col-12 col-xl-12 col-xxl-4 intern-price-section">
                                  <div class="intern-charges">
                                      <p><strong><span>Internship Charges</span> <span>$ 99</span></strong></p>
                                  </div>
                                    <div class="intern-apply-btn">
                                        <a href="high-school-internships-detail.php" class="btn mybluebtn">Apply Now</a>
                                    </div>
                                    <div class="alert alert-warning mt-4 mb-1" role="alert">
                                        <p class="mb-1"><strong><i class="fa fa-info-circle" aria-hidden="true"></i> Read before apply internship</strong></p>
                                        <p>This is a paid internship. Once you are selected, you will be able to continue your internship. If you are not selected, we will refund your charges within 7 working days.</p>
                                    </div>
                              </div>
                              </div>
                             
                           </div><!-- END internship-detail-wrapper-->
                        </div>
                     </div>
                     </div>
                     <!-- END -->
                  </div>
                  <!-- END dashboard main content-->
                  <!-- START dashboard sidebar-->
               </div>
               <!-- Page footer-->
               <footer>
                  <div class="container">
                     <div class="socaldiv"> <a href="https://www.facebook.com/Isuriz-102213118305822"> <em class="fa-2x mr-2 fab fa-facebook-f"></em> </a> <a href="https://twitter.com/IsurizLLC"> <em class="fa-2x mr-2 fab fa-twitter"></em> </a> 
           <!--<a href=""> <em class="fa-2x mr-2 fab fa-youtube"></em> </a>-->
           <a href="https://www.instagram.com/isurizllc"><em class="fa-2x mr-2 fab fa-instagram"></em> </a> </div>
                     <div class="fotdiv">
                        <ul>
                           <li><a href="about.php"> About Us </a> </li>
                          <li><a href="blog.php">Blog </a> </li>
                           <li><a href="contact-us.php"> Contact Us </a> </li>
                           <li><a href="careers.php"> Careers </a> </li>
                           <li><a href="privacy-policy.php"> Privacy Policy </a> </li>
                           <li><a href="terms-of-use.php"> Terms of Use </a> </li>
                        </ul>
                        <p> © 2021 Isuriz, LLC. All Rights Reserved. </p>
                     </div>
                  </div>
               </footer>
               <!-- End Page footer-->
            </div>
         </section>
      </div>
      <!-- =============== VENDOR SCRIPTS ===============-->
      <!-- MODERNIZR-->
      <script src="vendor/modernizr/modernizr.custom.js"></script><!-- STORAGE API-->
      <script src="vendor/js-storage/js.storage.js"></script><!-- SCREENFULL-->
      <script src="vendor/screenfull/dist/screenfull.js"></script><!-- i18next-->
      <script src="vendor/i18next/i18next.js"></script>
      <script src="vendor/i18next-xhr-backend/i18nextXHRBackend.js"></script>
      <script src="vendor/jquery/dist/jquery.js"></script>
      <script src="vendor/popper.js/dist/umd/popper.js"></script>
      <script src="vendor/bootstrap/dist/js/bootstrap.js"></script><!-- =============== PAGE VENDOR SCRIPTS ===============-->
      <!-- SLIMSCROLL-->
      <script src="vendor/jquery-slimscroll/jquery.slimscroll.js"></script><!-- SPARKLINE-->
      <script src="vendor/jquery-sparkline/jquery.sparkline.js"></script><!-- FLOT CHART-->
      <script src="vendor/flot/jquery.flot.js"></script>
      <script src="vendor/jquery.flot.tooltip/js/jquery.flot.tooltip.js"></script>
      <script src="vendor/flot/jquery.flot.resize.js"></script>
      <script src="vendor/flot/jquery.flot.pie.js"></script>
      <script src="vendor/flot/jquery.flot.time.js"></script>
      <script src="vendor/flot/jquery.flot.categories.js"></script>
      <script src="vendor/jquery.flot.spline/jquery.flot.spline.js"></script><!-- EASY PIE CHART-->
      <script src="vendor/easy-pie-chart/dist/jquery.easypiechart.js"></script><!-- MOMENT JS-->
      <script src="vendor/moment/min/moment-with-locales.js"></script><!-- =============== APP SCRIPTS ===============-->
      <script src="js/app.js"></script>
   </body>
</html>

