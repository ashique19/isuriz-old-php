<?php

include 'header.php';

$con = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($con->connect_errno) {
    die("Database selection failed: " . mysqli_error());
}


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
      <!-- Custom CSS -->
      <link href="css/site.css" rel="stylesheet">
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
                  <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">Write Testimonial</h3><small data-localize="dashboard.WELCOME"></small></div>
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
                    <!-- START dashboard main content-->
                      <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     <!-- START -->
                     <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">
                        <section class="write-review">
    <div class="">
   		<div class="row">
      		<div class="col-xs-12 col-md-12 col-lg-6">
               <div class="w-review-wrapper">
                  <div class="row">
                     <div class="col-12">
                        <p>Isuriz is committed to providing a superior user experience, and we welcome your feedback! By submitting a testimonial on Isuriz below, you grant Isuriz the right to post the testimonial and any information you included therein on its website and any marketing or promotional material.</p>
                     </div>
                  </div>
                 
                  <form action="" method="POST" enctype="multipart/form-data">
                     <div class="row">
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <input class="form-control" type="text" name="first_name" placeholder="First Name" required>
                           </div>
                        </div>
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <input class="form-control" type="text" name="last_name" placeholder="Last Name" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <input class="form-control" type="email" name="email" placeholder="Email">
                           </div>
                        </div>
                        <div class="col-12 col-sm-6">
                           <div class="form-group">
                              <input class="form-control" type="text" name="school_name" placeholder="School Name" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12 col-sm-4">
                           <div class="form-group">
                              <input class="form-control" type="text" name="city" placeholder="City" required>
                           </div>
                        </div>
                        <div class="col-12 col-sm-4">
                           <div class="form-group">
                              <input class="form-control" type="text" name="state" placeholder="State" required>
                           </div>
                        </div>
                        <div class="col-12 col-sm-4">
                           <div class="form-group">
                              <input class="form-control" type="text" name="graduation_year" placeholder="Graduation Year" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                           <textarea class="form-control" name="testimonial" rows="5" name="testimonial" placeholder="Type your testimonial here..." required></textarea>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12">
                           <div class="form-group">
                              <label>Upload Your Photo</label>
                           <input class="form-control mb-0" type="file" name="filename" id="uploadPhoto" required>
                           </div>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-12">
                           <div class="form-group mb-0">
                              <button class="btn mybluebtn" name="submit" id="sub"> Submit </button>
                           </div>
                        </div>
                     </div>                     

                  </form>
                 <?php 
if(isset($_POST['submit'])){
   $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $email = $_POST['email'];
   $school_name = $_POST['school_name'];
   $city = $_POST['city'];
   $state = $_POST['state'];
    $graduation_year = $_POST['graduation_year'];
	$testimonial = $_POST['testimonial'];
	$filename = $_POST['filename'];
	
// file uplads
				   
	if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Check if file was uploaded without errors
    if(isset($_FILES["filename"]) && $_FILES["filename"]["error"] == 0){
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
        $filename = $_FILES["filename"]["name"];
        $filetype = $_FILES["filename"]["type"];
        $filesize = $_FILES["filename"]["size"];
    
        // Verify file extension
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");
    
        // Verify file size - 5MB maximum
        $maxsize = 5 * 1024 * 1024;
        if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");
    
        // Verify MYME type of the file
        if(in_array($filetype, $allowed)){
            // Check whether file exists before uploading it
            //if(file_exists("upload/" . $filename)){
                //echo $filename . " is already exists.";
           // } else{
                move_uploaded_file($_FILES["filename"]["tmp_name"], "upload/" . $filename);
                echo "";
            //} 
        } else{
            echo "Error: There was a problem uploading your file. Please try again."; 
        }
    } else{
        echo "Error: " . $_FILES["filename"]["error"];
    }
}	
	
// Insert data into database.

	$sql = "INSERT INTO `testimonials` (first_name, last_name, email, school_name, city, state, graduation_year, testimonial, filename) VALUES ('$first_name', '$last_name', '$email', '$school_name', '$city', '$state', '$graduation_year', '$testimonial', '$filename')";
	
	if ($con->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error: " . $sql . "<br>" . $con->error;
}

	//Send Mail.
	
	$to = "jlefkovi2003@yahoo.com"; // this is your gmail address 
   // $to = "hiltworkdirectory@gmail.com";

   
   $from = $_POST['email']; // this is the sender's gmail address
	
	$message = "Full Name: " .$first_name. " " .$last_name. "<br> Email: "  .$email. "<br> School Name: "  .$school_name. "<br> City: "  .$city. "<br> State: "  .$state. "<br> Graduation Year: "  .$graduation_year. "<br> Testimonial: "  . $testimonial. "<br> Profile: <br> ";

   $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'];
   $message .= '<img src="'.$link.'/upload/'.$filename.'" width="150px">';
  
  

   $headers = "MIME-Version: 1.0" . "\r\n";
   $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

   // More headers
   $headers .= 'From: Isuriz <support@isuriz.com>' . "\r\n";
   $headers .= 'Cc: '.$from . "\r\n";

   $subject = "Testimonials Added in site";

   if(mail($to,$subject,$message,$headers)){
      echo '
      <div class="alert alert-success" role="alert">
      Thank you ' . $first_name . ', for your review.
      </div>
      ';
   }
 
	
}
 $con->close();
	            
?> 
               </div>
            </div>

<!-- img -->
<div class="col-xs-12 col-md-12 col-lg-6">
<div class="testimonial-banner">
   <img class="img-fluid" src="images/testimonialv1.png">
   </div>
</div>
<!-- img end -->

         </div>
      </div>
</section>
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

