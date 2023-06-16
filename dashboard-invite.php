<?php
session_start();
include 'header.php';
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$_SESSION['userid'];
$errormsg = '';
if(isset($_POST['submit'])){
   $invite =$_SESSION['emailid'];
   $studentName = $_POST['name'];
	$to =$_POST['email'];
   $userName = $_SESSION['first_name'];
   $message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
   <html xmlns="http://www.w3.org/1999/xhtml">
    
   <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
     <title>A Simple Responsive HTML Email</title>
     <style type="text/css">
     body {margin: 0; padding: 0; min-width: 100%!important;}
     img {height: auto;}
     .content {width: 100%; max-width: 600px;}
     .innerpadding {padding: 30px 30px 30px 30px;}
     .p-t-0{padding-top:0!important;}
     .h1, .h2, .bodycopy {color: #153643; font-family: sans-serif;}
     .h1 {font-size: 33px; line-height: 38px; font-weight: bold;}
     .h2 {padding: 0 0 15px 0; font-size: 24px; line-height: 28px; font-weight: bold;}
     .bodycopy {font-size: 16px; line-height: 22px;}
     .button {text-align: center; font-size: 18px; font-family: sans-serif; font-weight: bold;color:#fff;}
     .button a {color: #ffffff; text-decoration: none;}
     @media only screen and (max-width: 550px), screen and (max-device-width: 550px) {
     body[yahoo] .hide {display: none!important;}
     body[yahoo] .buttonwrapper {background-color: transparent!important;}
     body[yahoo] .button {padding: 0px!important;}
     body[yahoo] .button a {background-color: #e05443; padding: 15px 15px 13px!important;}
     body[yahoo] .unsubscribe {display: block; margin-top: 20px; padding: 10px 50px; background: #2f3942; border-radius: 5px; text-decoration: none!important; font-weight: bold;}
     }
     </style>
   </head>
   
   <body yahoo bgcolor="#131416" style="padding-top: 50px;">
   <table width="100%" bgcolor="#131416" border="0" cellpadding="0" cellspacing="0">
   <tr>
     <td style="background:#f1f1f1;padding-top:30px;padding-bottom:30px;"> 
     <table style="margin:auto;padding-bottom:10px;">
     <tr>
         <td>
         <img src="https://isuriz.com/images/logo.png" />
         </td>
       </tr> 
     </table> 
       <table bgcolor="#ffffff" class="content" align="center" cellpadding="0" cellspacing="0" border="0" style="border-radius:10px;"> 
         <tr>
           <td class="innerpadding">
             <table width="100%" border="0" cellspacing="0" cellpadding="0">
               <tr>
                 <td class="h2">
                   Hi '.$_POST['name'].',
                 </td>
               </tr>
               <tr>
                 <td class="bodycopy" style="font-weight: 500;">
                   This is dev. I’d like to invite you to join Isuriz, an online college list builder and college planning technology company. This could be a great resource in your college planning efforts.
                 </td>
               </tr>
             </table>
           </td>
         </tr>
         <tr>
           <td class="innerpadding p-t-0">
             <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">  
               <tr>
                 <td>
                   <table width="100%" border="0" cellspacing="0" cellpadding="0">
                     <tr>
                       <td class="bodycopy">
                         <span style="color: gray;" >Message from '.$_SESSION['first_name'].' :</span>
                         '.$_POST['message'].'
                       </td>
                     </tr>
                     <tr>
                       <td style="padding: 48px 0 0 0; ">
                         <table class="buttonwrapper" bgcolor="#019ff0" border="0" cellspacing="0" cellpadding="0" style="width: auto;margin: auto;border-radius: 50px;">
                           <tr>
                             <td class="button" height="48">
                               <a style="padding:14px 30px;border-radius:50px;" href="https://dev.isuriz.com/signup.php?aid='.$_SESSION['userid'].'">Accept Invite
                              </a>
                             </td>
                           </tr>
                         </table>
                       </td>
                     </tr>
                   </table>
                 </td>
               </tr>
             </table>        
           </td>
         </tr>
         
         <tr>
           <td class="innerpadding bodycopy">
             If you cannot click on the link, copy and paste the URL into your browser :  <br />
             <a href="https://dev.isuriz.com/signup.php?aid='.$_SESSION['userid'].'" style="color: gray;">https://dev.isuriz.com/signup.php?aid='.$_SESSION['userid'].'</a>
   
           </td>
         </tr>
        
       </table>
       </td>
     </tr>
   </table>
   </body>
   </html>
   
   
   ';
	$mail = new PHPMailer(); // create a new object
  	$mail->IsSMTP();
    $mail->Host = 'mail.isuriz.com';
 	$mail->Port = 465;
    $mail->SMTPAuth = true;
    $mail->Username ='support@isuriz.com';
    $mail->Password = '5Udu1t0!';
	$mail->SMTPSecure = 'ssl';

    $mail->setFrom('support@isuriz.com','isuriz');
    
    $mail->AddAddress($to, 'isuriz');  // Add a recipient
    $mail->AddBCC($to, 'isuriz');
	
	  $mail->IsHTML(true);                                  // Set email format to HTML

	  $mail->Subject = 'Invitation to Join Isuriz';
	  $mail->Body = $message;
	
  if(!$mail->send()) {
				//mysqli_query($con,"ROLLBACK");
				$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Mail not send ,please try again</div>";				
			} else {
				//mysqli_query($con,"COMMIT");
            header( "refresh:4;url=dashboard-invite.php" );
				$errormsg = " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a> Your invitation has been successfully sent!</div>";
			}
	
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
      <link href="css/style.css" rel="stylesheet">
      <style>
      .clickbtn:hover{
         cursor:pointer;
         color:blue;
      }
      </style>
   </head>
   <body>
<!-- Modal show premium features -->
      <div class="modal fade" id="invitePrime" role="dialog">
         <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
               <div class="modal-header">
               <h4 class="modal-title" id="exampleModalLabel">Premium features</h4>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
               </div>
               <div class="modal-body">
               <div class="primefeatures">
                  <ul>
                     <li><i class="fas fa-check mr-2"></i> Easily share your college list with others with a click of a button.</li>
                     <li><i class="fas fa-check mr-2"></i> Gain access to numerous advanced search filters to help find the right college.</li>
                     <li><i class="fas fa-check mr-2"></i> Receive priority when contacting Isuriz with a support need.</li>
                  </ul>
               </div>
               </div>
            </div>
         </div>
      </div>
         <!--modal end-->

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
                  <div><h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a;text-align:left !important;">Invite Students</h3>
                     <span style="font-size: 14px;"></span><small data-localize="dashboard.WELCOME"></small></div>
                  </div>
         
               <div class="row">
                  <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     
                     <!-- START -->
                     <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">
                           <div class="mycontactus form-wrap mydashboardContact mb-4">
                           <div class="row">
                              <div class="col-xl-12 col-sm-12">
                               <div class="row">
                               <div class="col-12"><?php echo $errormsg; ?></div>
                               </div>
                              <form method="post" class="dashboard-contactus form-white-box">
                                   <div class="row">
                                     <div class="col-12 col-xl-4">
                                       <div class="user-complete-progress">
                                       <p class="invite-intro">Invite students to join Isuriz and unlock premium features after 5 students have joined. <a href="#" data-toggle="modal" data-target="#invitePrime">Click here</a> to see amazing benefits you can receive with a premium account.</p>
									               <?php 
															$id =$_SESSION['userid'];
															$sql ="SELECT * FROM `commission` WHERE from_id= $id";  
														   $query =mysqli_query($con, $sql);
													      if(mysqli_num_rows($query) > 0) {
                                                $row =mysqli_fetch_array($query);
                                                echo "<div class='d-flex my-5'><h2 class='mr-4'>Your Progress</h2><h2>".$row['credits']."/5</h2></div>";
                                             }
                                             else{
                                                echo "<div class='d-flex my-5'><h2 class='mr-4'>Your Progress</h2><h2>0/5</h2></div>";
                                             }
														?>
                                       </div>
                                       <div class="user-invite-form">
                                       <div class="form-group">
                                          <input type="text"  name="name" class="form-control mb-3" placeholder="Name" id="name" required >
                                       </div>
                                       <div class="form-group">
                                          <input type="email"  name="email" class="form-control mb-3" placeholder="Email" id="usr"  required>
                                       </div>
                                       <div class="form-group">
                                          <textarea id="w3review" name="message" rows="4" class="form-control"  placeholder="Message"></textarea>
                                       </div>
                                       <div class="">
                                          <button type="submit" name="submit" value="Invite" class="SubmitDiov blueBtnBig blue-border">Invite </button>
                                       </div>

                                       </div>
									         </div>

                                    
                                    <div class="col-12 col-xl-8">
                                    <div class="invite-preview h-100">
                                       <div class="preview-icon">
                                          <img class="img-fluid" src="/images/email-icon.png">
                                       </div>
                                       <div class="form-group preview-content showhide mb-0" style="border:2px solid #f2f2f2; padding:30px;">
                                          <div class="preview-title">
                                             <h2>Email Invitation Template</h2>
                                          </div>
                                          <table width="100%" cellpadding="0" cellspacing="0">
                                             <tr>
                                                <td>  
                                                   <table class="content" align="center" cellpadding="0" cellspacing="0" border="0">     
                                                      <tr>
                                                         <td class="innerpadding">
                                                            <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                               <tr>
                                                                  <td class="h2">
                                                                     <h2 style="font-size:24px; font-weight:bold;">Hi (Recipient’s name),</h2>
                                                                  </td>
                                                               </tr>
                                                               <tr>
                                                                  <td class="bodycopy" style="font-weight: 500;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">
                                                                  This is (Sender’s Name). I’d like to invite you to join Isuriz, a dynamic and innovative online college list builder. This could be a great resource in your college planning efforts. You should check it out!
                                                                  </td>
                                                               </tr>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td class="innerpadding">
                                                            <table class="col380" align="left" border="0" cellpadding="0" cellspacing="0" style="width: 100%;">  
                                                               <tr>
                                                                  <td>
                                                                     <table width="100%" border="0" cellspacing="0" cellpadding="0">
                                                                        <tr>
                                                                           <td class="bodycopy body-msg" style="font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;padding-top:40px;">
                                                                              <span style="color:gray;" >Message from (Sender’s Name) : You can write an optional personal message here.</span>
                                                                           </td>
                                                                        </tr>
                                                                        <tr>
                                                                           <td style="padding: 20px 0 0 0; ">
                                                                              <table class="buttonwrapper email-btn-wrap" bgcolor="#019ff0" border="0" cellspacing="0" cellpadding="0">
                                                                                 <tr>
                                                                                    <td class="button" height="45">
                                                                                       <a style="color:white;padding: 0px 30px;font-weight: bold;" href="#">Accept Invite
                                                                                       </a>    
                                                                                    </td>
                                                                                 </tr>
                                                                              </table>
                                                                           </td>
                                                                        </tr>
                                                                     </table>
                                                                  </td>
                                                               </tr>
                                                            </table>        
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td class="innerpadding bodycopy" style="padding-top: 40px;font-family: Roboto,RobotoDraft,Helvetica,Arial,sans-serif;">
                                                         If you can not click on the link, copy and paste the URL into your browser :<br />
                                                            <span style="color: #019ff0; text-decoration:underline;">https://isuriz.com/signup.php?aid=userid</span>
                                                         </td>
                                                      </tr>
                                                   </table>
                                                </td>
                                             </tr>
                                          </table>
               
                                       </div>
                                    </div>
                                 </div> <!--end col-->
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
               <!-- <footer>
                  <div class="container">
                     <div class="socaldiv"> <a href="https://www.facebook.com/Isuriz-102213118305822"> <em class="fa-2x mr-2 fab fa-facebook-f"></em> </a> <a href="https://twitter.com/IsurizLLC"> <em class="fa-2x mr-2 fab fa-twitter"></em> </a> 
           
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
      <script>
      jQuery(document).ready(function(){
         
         jQuery(".clickbtn").click(function(){
            event.preventDefault();
         jQuery(".showhide").toggle(600);
      });
      });
      </script>
   </body>
</html>

