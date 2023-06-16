<?php
include('includes/config_guest.php');
require 'includes/class.phpmailer.php';

$dataform1 = serialize($_SESSION['dataform1']);
$clgcb = serialize($_SESSION['clgcb']);
$admiscore = $_SESSION['admiscore'];



$clgidarr = array();

//print_r ($_SESSION['admiscore']);
if(isset($_SESSION['clgcb']) ){
   $selclgsarr = $_SESSION['clgcb'];
   $selectedclgids = '';
   $selectedclgids = implode(",",$selclgsarr);  
   //$selclgsarr = (explode(",",$selectedclgids));
   //echo $selectedclgids;
   //print_r($selclgsarr); 
   $to_remove = array();
   $missedclgarr = array();
   if(strlen($selectedclgids)>0){
      //for input college ids, fetch threshold values and based on admissibility score set the flag value   of $flag
      //echo "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ";
      $resclgth = mysqli_query($con, "SELECT * FROM `school_thresholds` where unitid in ($selectedclgids ) ");
      $countthm = 0;
      $counttr = 0;
      $counttm = 0;
      $countts = 0;
      $countnf = 0;     
      while ($rowclgth = mysqli_fetch_assoc($resclgth)){
         $indclgidarr =array();
         $indclgidarr['col1'] = '';
         $indclgidarr['THM'] = '';
         $indclgidarr['TR'] = '';
         $indclgidarr['TM'] = '';
         $indclgidarr['TS'] = '';
         $indclgidarr['NF'] = '';
         $flag = 'NF'; // possible values will be THM(Threshold Hail Mary), TR(Threshold Reach), TM(Threshold Match), TS(Threshold Safety), NF(Not Fit)
         if($admiscore > $rowclgth['thhailmary'])
            $flag = 'THM';
         if($admiscore > $rowclgth['threach'])
            $flag = 'TR';
         if($admiscore > $rowclgth['thmatch'])
            $flag = 'TM';
         if($admiscore > $rowclgth['thsafety'])
            $flag = 'TS';
         if($flag == 'THM'){
            $indclgidarr['THM'] = $rowclgth['instnm'];
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';         
            $countthm++;
         }
         if($flag == 'TR'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = $rowclgth['instnm'];
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';
            $counttr++;
         }
         if($flag == 'TM'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = $rowclgth['instnm'];
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';
            $counttm++;
         }
         if($flag == 'TS'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = $rowclgth['instnm'];
            $indclgidarr['NF'] = '';
            $countts++;
         }
         if($flag == 'NF'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = $rowclgth['instnm'];
            $countnf++;
         }
         array_push($clgidarr,$indclgidarr);
         array_push($to_remove,$rowclgth['unitid']);
      }
      $missedclgarr = array_diff($selclgsarr, $to_remove);
      //echo 'No Threshold Values: <pre>';
   }
  
}
?>

<?php

include('partials/layout-pre.php');
?>
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/style.css" rel="stylesheet">
<link href="css/collage-search.css" rel="stylesheet">
<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- FONT AWESOME-->
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/brands.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/regular.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/solid.css">
<link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/fontawesome.css">

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	
<!----------------------------HEADER-----------------------------------> 

<style>
.balance-it{
	margin-top: 7px;
}
.fa.fa-cog.fs-5{
	font-size: 1.25em !important;
}
.main-header .nav > li > a{
	padding: 10px 12px;
}
.navbar{
	margin-bottom: 0px;
}

main {
    padding-top: 0px;
}
.progress-bar-item.done {
    position: relative;
    top: auto;
    left: auto;
    background-color: #1D9EEF;
    padding: 0;
    border-radius: 0;
}

.number {
    width: 20px !important;
    height: 20px !important;
	font-size: 12px !important;
}

.dropdown-menu.mini.cart-items.show p{
	font-size: 12px !important;
}

a.btn-2{
	padding: 15px !important;
	background-color: #1D9EEF;
	border-color: #1D9EEF !important;
	color: white !important;
}

.dropdown-menu.mini.cart-items.show .badge{
	background-color: -internal-light-dark(rgb(239, 239, 239), rgb(59, 59, 59)) !important;
}

.bottom-sec{
	padding-top: 5px;
	padding-bottom: 5px;
}

li.nav-item.dropdown:hover .dropdown-menu {
    display: none !important;
}

li.nav-item.dropdown:hover .dropdown-menu.show {
    display: flex !important;
}

.modal.fade.show{
	opacity: 1;
}

.modal-backdrop.show{
	opacity: 0.5;
}

@media screen and (max-width: 480px){
	li.nav-item {
		border-top: 0px transparent !important;
	}
}

</style>
<!----------------------------HEADER-----------------------------------> 
<link href="css/site.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<section class="congratulations thankyou">
   <div class="container fluid pt-60">
   		<div class="row">
      		<div class="col-xs-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
				<div class="img-full">
					<span class="main-img-wrap">
						<img class="img-responsive main-img" src="/images/student-thumbup.png">
					</span>
				</div>
				<div class="mycontent">
					<h2 class="text-center pt-20 text-dark"><strong>Congratulations, <span class="highlightblue"><?php echo $_SESSION['first_name']; ?>!</span></strong></h2>
					<h2 class="text-center subhead-congrats">You have successfully built your college list!
						<span class="d-block">Awesome job!</span>
					</h2>
					<div class="divider1px"></div>
					   <p>We recommend that you use this list as a starting point, and speak with an admissions consultant or counselor to determine if the schools on this list are right for you. Due to the holistic nature of the admissions process, there is a limit to the accuracy of our predictions. You are off to a great start, though, and we hope that we can continue to be a valuable resource in your college planning efforts!</p>
                  <!-- <p class="congrats-review-para">If you could take a few minutes to share your feedback and write a testimonial on your experience we would greatly appreciate it. You can do so by clicking on the Write a Testimonial button below. We strive to exceed expectations with our products and services and hope we did. Again, congratulations on building your college list, and when you are ready click the Finish button below to return to the dashboard.</p> -->
                  
				  <div class="congrats-bottom-btn">
					  <!-- <a href="testimonial.php" class="btn mybluebtn" name="testimonial">Write a Testimonial</a> -->
					  <a href="dashboard.php" class="btn btn-lg bg-info text-white rounded-pill" name="finish">EXIT</a>
				   </div>
				  
            </div>
			</div>
	   </div>
	</div>
</section>

<?php
// include 'footer.php'; 
?>

<script src="js/jquery.js"></script> 
  
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<!-- Bootstrap Core JavaScript --> 
<!-- <script src="js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
<script src="js/owl.carousel.min.js"></script>
<!-- Custom script -->
<script src="js/mycustomjs.js"></script> 

<?php  include('partials/layout-post.php'); ?>
