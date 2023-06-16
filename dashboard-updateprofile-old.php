<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
      <title>Isuriz</title>
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
      <!-- =============== custom css ===============-->
      <link rel="stylesheet" href="css/site.css" >
      
   </head>
   <body>
      <div class="wrapper">
         <!-- top navbar-->
                <!-- top navbar-->
     
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="/asset-css/custom.css">
<link rel="stylesheet" href="/asset-css/custom-xs.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

         <?php
         // include 'top-nav-no-left-menu.php';
         include('partials/header-admin.php');
         ?>
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
                  <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Settings</h3><small data-localize="dashboard.WELCOME"></small></div>
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
               <div class="row myProfileUpdate">
                  <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     <!-- START -->
                     <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">
                        <div class="mycontactus form-wrap">
                           <div class="row">
                              <div class="col-xl-12 col-sm-12">
                               <div class="log-inpart form-white-box">
                                 <form role="form" name="myform" id="idForm" method="POST" >
                                     <div class="after-two">
                                       <div class="log-inpart-sec">
                                        <?php echo $errormsg; ?>
                                         <div class="form-group apj_update_form">
                                          <label for="name" class="sr-only">Name</label>
                                           <input type="text" class="form-control" placeholder="Name" id="name"  value="<?php echo $_SESSION['first_name']; ?>" name="name" required>
                                         </div>
                                         <div class="form-group apj_update_form">
                                          <label for="emailid" class="sr-only">Email</label>
                                           <input type="text" class="form-control updateprofile_emailid" placeholder="Email" value="<?php echo $_SESSION['emailid']; ?>" id="emailid"  name="emailid" readonly>
                                           <!--<small>( To update your email, <a href="contact-us.php">click here</a> to contact us and someone would be glad to assist you. )</small>-->
                                         </div>
                                        <div class="form-group apj_update_form">
                                          <label for="password" class="sr-only">Password</label>
                                           <input type="password" class="form-control" placeholder="Password"  value="<?php echo $_SESSION['password']; ?>"  id="password" name="password" required>
                                         </div>
                                          <div class="form-check apj-form-check pl-0">
                                          <!-- <input type="checkbox" class="form-check-input" id="isclosed" name="isclosed" >
                                          <label class="form-check-label" for="isclosed">Close Account</label> -->
                                          <div class="checkbox-container circular-container" style="margin-top: 20px;">
                                         <label class="checkbox-label" for="isclosed">
                                             <input type="checkbox" id="isclosed" name="isclosed">
                                             <span class="checkbox-custom circular"></span>
                                         </label>
                                           <label class="form-check-label" for="isclosed" style="font-size: 17px;">Deactivate Account</label>
                                         </div>
                                         </div>
                                         <div class="full submit-center-xs"><button class="btn logdv blueBtnBig blue-border mt-30 mb-30 mr-2" name="sub" id="sub"> Update </button>
                                         <a class="btn logdv blueBtnBig blue-border mt-30 mb-30" href="dashboard.php"> Cancel </a>
                                     </div>
                                          
                                         
                                       </div>
                                     </div>
                                   </div>
                                   </form>
                                 </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <!-- END -->
                  </div>
                  <!-- END dashboard main content-->
                  <!-- START dashboard sidebar-->
               </div>
               <!-- Page footer-->
               <?php
               // include 'footer.php'; 
               include('partials/footer.php');
               ?>
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

