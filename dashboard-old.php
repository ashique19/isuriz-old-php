<?php
include 'header.php';
//echo "<pre>";
//print_r($_SESSION);
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
        <link rel="stylesheet" href="css/site.css" id="maincss">
        <link rel="stylesheet" href="css/app.css" id="maincss">
        <link rel="stylesheet" href="css/dashboard.css" >
    </head>
    <body>
        <div class="wrapper">
            <!-- top navbar-->



<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="/asset-css/custom.css">
<link rel="stylesheet" href="/asset-css/custom-xs.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>


<?php
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
                <div class="content-wrapper mt-5">
                    <div class="content-heading" id="welcometext-div">
                        <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Welcome, <span style="color:#019ff0"><?php echo $_SESSION['first_name']; ?>!</span></h3><small data-localize="dashboard.WELCOME"></small></div>
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
                            <div class="card card-default card-demo grid-card mb-4" >
                                <div class="card-header grid-card-header">
                                    <div class="row">
                                        
                                            <?php if (isset($_SESSION["usertype"]) && $_SESSION["usertype"] != "" && $_SESSION["usertype"] == "College_Counselor") { ?>
                                                <div class="col-xl-4 col-md-12 col-lg-4 col-sm-12">
                                                    <img src="images/counselor.png" class="img-fluid float-left section-two-img dashboard-img" alt="">
                                                </div>
                                                <div class="col-xl-8 col-md-12 col-lg-8 col-sm-12">
                                            <div class="section-two dash-content">
                                                <h2 class="mt-20">Isuriz's college list builder tool is transformative and groundbreaking in its functionality.</h2>
                                                <p>Isuriz's college list builder offers you the ability to help your students by:</p>
                                                <ul>
                                                    <li>Search one of the largest databases for US colleges in the world with over 3,000,000 records and over 6,800 colleges.</li>
                                                    <li>See the results organized by your chances of acceptance, which utilizes proprietary algorithms developed by a team of college counselors.</li>
                                                    <li>Analyze your college list for content and balance, and receive customized recommendations for how many schools to include in each category.</li>
                                                    <li>Additionally, you can list your college counseling services on Isuriz, and potentially connect with new students that could become clients.</li>
                                                </ul>
                                                <p class="mb-20">We want to help you and your students succeed. Click the Build My College List button to create a college list for your students or the Get Listed button to post your college counseling services on Isuriz. Let's get started now!</p>
                                                <div class="mt-30 mb-30 d-flex flex-column flex-sm-row text-center text-sm-left">
                                                    <div>
                                                        <?php
                                                        if (isset($_SESSION['data_profile'])) {
                                                            echo '<a href="form.php" class="btn mybluebtn" aria-hidden="false">Build My College List</a>';
                                                        } else {
                                                            echo '<a href="form2.php" class="btn mybluebtn" aria-hidden="false">Build My College List</a>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div>
                                                        <a href="counselor-dashboard.php" class="btn mybluebtn mx-3 mt-4 mt-sm-0" aria-hidden="false">Get Listed</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <?php } 
                                            else { ?>
                                                <div class="col-xl-4 col-md-12 col-lg-4 col-sm-12">
                                                    <img src="images/kids-steps.png" class="img-fluid float-left section-two-img dashboard-img" alt="">
                                                </div>
                                                <div class="col-xl-8 col-md-12 col-lg-8 col-sm-12">
                                            <div class="section-two dash-content">
                                                <h2 class="mt-20">Isuriz's college list builder tool is transformative and groundbreaking in its functionality.</h2>
                                                <p>Isuriz's college list builder offers users the ability to:</p>
                                                <ul>
                                                    <li>Search one of the largest databases for US colleges in the world with over 3,000,000 records and over 6,800 colleges.</li>
                                                    <li>See the results organized by chances of acceptance, which utilizes proprietary algorithms developed by a team of college counselors.</li>
                                                    <li>Analyze the college list for content and balance, and receive customized recommendations for how many schools to include in each category.</li>
                                                    <li>Make connections with college counselors that can offer personalized recommendations and assistance after reviewing the students specific accomplishments and goals.</li>
                                                </ul>
                                                <p class="mb-20">To begin, you can click on Get Listed to build a public profile for students to find you who are in need of college counseling services or you can click on Build My College List that will allow you to create a college list for your students. Let's get started today!</p>
                                                <div class="mt-30 mb-30 d-flex flex-column flex-sm-row text-center text-sm-left">
                                                    <div>
                                                        <?php
                                                        if (isset($_SESSION['data_profile'])) {
                                                            echo '<a href="form.php" class="btn mybluebtn" aria-hidden="false">Build My College List</a>';
                                                        } else {
                                                            echo '<a href="form2.php" class="btn mybluebtn" aria-hidden="false">Build My College List</a>';
                                                        }
                                                        ?>
                                                    </div>
                                                    <div>
                                                        <a href="counselor-dashboard.php" class="btn mybluebtn mx-3 mt-4 mt-sm-0" aria-hidden="false">Get Listed</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                            <?php } ?>
                                        
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- END -->
                        </div>
                        <!-- END dashboard main content-->
                        <!-- START dashboard sidebar-->
                    </div>
                    <!-- Page footer-->
                    <?php include('partials/footer.php'); ?>
                    <!-- <footer>
                        <div class="container">
                            <div class="socaldiv"> <a href="https://www.facebook.com/Isuriz-102213118305822"> <em class="fa-2x mr-2 fab fa-facebook-f"></em> </a> <a href="https://twitter.com/IsurizLLC"> <em class="fa-2x mr-2 fab fa-twitter"></em> </a> 
                                
                                <a href="https://www.instagram.com/isurizllc"><em class="fa-2x mr-2 fab fa-instagram"></em> </a> </div>
                            <div class="fotdiv">
                                <ul>
                                    <li><a href="about.php"> About Us </a> </li>
                                    <li><a href="blog.php"> Blog </a></li>
                                    <li><a href="contact-us.php"> Contact Us </a></li>
                                    <li><a href="careers.php"> Careers </a> </li>
                                    <li><a href="privacy-policy.php"> Privacy Policy </a> </li>
                                    <li><a href="terms-of-use.php"> Terms of Use </a> </li>

                                </ul>
                                <p> © 2021 Isuriz, LLC. All Rights Reserved. </p>
                            </div>
                        </div>
                    </footer> -->
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

