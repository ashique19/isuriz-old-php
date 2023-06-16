<?php

include 'header.php';
$userid = $_SESSION['userid'];

if(isset($_POST))
{
	
	if(isset($_POST['hsgradyear'])){$hsgradyear = $_POST['hsgradyear']; } else {  $hsgradyear = ''; }
	if(isset($_POST['testchoice'])){$testchoice = $_POST['testchoice']; } else {  $testchoice = ''; }
	if(isset($_POST['testsatscore_sat'])){$testsatscore_sat = $_POST['testsatscore_sat']; } else {  $testsatscore_sat = ''; }
	if(isset($_POST['testactscore_act'])){$testactscore_act = $_POST['testactscore_act']; } else {  $testactscore_act = ''; }
	if(isset($_POST['gpa'])){$gpa = $_POST['gpa']; } else {  $gpa = ''; }
	if(isset($_POST['rcapclscnt'])){$rcapclscnt = $_POST['rcapclscnt']; } else {  $rcapclscnt = ''; }
	if(isset($_POST['rcothhrnclscnt'])){$rcothhrnclscnt = $_POST['rcothhrnclscnt']; } else {  $rcothhrnclscnt = ''; }
	if(isset($_POST['earlyapplydecs'])){$earlyapplydecs = $_POST['earlyapplydecs']; } else {  $earlyapplydecs = ''; }
	if(isset($_POST['awardscnt'])){$awardscnt = $_POST['awardscnt']; } else {  $awardscnt = ''; }
	if(isset($_POST['is_ecclasses'])){$is_ecclasses = $_POST['is_ecclasses']; } else {  $is_ecclasses = ''; }
	if(isset($_POST['organization_name_1'])){$organization_name_1 = $_POST['organization_name_1']; } else {  $organization_name_1 = ''; }
	if(isset($_POST['highest_grade_1'])){
		$highest_grade_1 = $_POST['highest_grade_1']; 
	}
	else
	{
		$highest_grade_1 = ''; 
	}
	if(isset($_POST['leadership_roles_1'])){$leadership_roles_1 = $_POST['leadership_roles_1']; } else {  $leadership_roles_1 = ''; }
	if(isset($_POST['activity_details_1'])){$activity_details_1 = $_POST['activity_details_1']; } else {  $activity_details_1 = ''; }
	if(isset($_POST['organization_name_2'])){$organization_name_2 = $_POST['organization_name_2']; } else {  $organization_name_2 = ''; }
	if(isset($_POST['highest_grade_2'])){$highest_grade_2 = $_POST['highest_grade_2']; } else {  $highest_grade_2 = ''; }
	if(isset($_POST['leadership_roles_2'])){$leadership_roles_2 = $_POST['leadership_roles_2']; } else {  $leadership_roles_2 = ''; }
	if(isset($_POST['activity_details_2'])){$activity_details_2 = $_POST['activity_details_2']; } else {  $activity_details_2 = ''; }
	if(isset($_POST['organization_name_3'])){$organization_name_3 = $_POST['organization_name_3']; } else {  $organization_name_3 = ''; }
	if(isset($_POST['highest_grade_3'])){$highest_grade_3 = $_POST['highest_grade_3']; } else {  $highest_grade_3 = ''; }
	if(isset($_POST['leadership_roles_3'])){$leadership_roles_3 = $_POST['leadership_roles_3']; } else {  $leadership_roles_3 = ''; }
	if(isset($_POST['activity_details_3'])){$activity_details_3 = $_POST['activity_details_3']; } else {  $activity_details_3 = ''; }
	if(isset($_POST['organization_name_4'])){$organization_name_4 = $_POST['organization_name_4']; } else {  $organization_name_4 = ''; }
	if(isset($_POST['highest_grade_4'])){$highest_grade_4 = $_POST['highest_grade_4']; } else {  $highest_grade_4 = ''; }
	if(isset($_POST['leadership_roles_4'])){$leadership_roles_4 = $_POST['leadership_roles_4']; } else {  $leadership_roles_4 = ''; }
	if(isset($_POST['activity_details_4'])){$activity_details_4 = $_POST['activity_details_4']; } else {  $activity_details_4 = ''; }
	if(isset($_POST['organization_name_5'])){$organization_name_5 = $_POST['organization_name_5']; } else {  $organization_name_5 = ''; }
	if(isset($_POST['highest_grade_5'])){$highest_grade_5 = $_POST['highest_grade_5']; } else {  $highest_grade_5 = ''; }
	if(isset($_POST['leadership_roles_5'])){$leadership_roles_5 = $_POST['leadership_roles_5']; } else {  $leadership_roles_5 = ''; }
	if(isset($_POST['activity_details_5'])){$activity_details_5 = $_POST['activity_details_5']; } else {  $activity_details_5 = ''; }
	if(isset($_POST['organization_name_6'])){$organization_name_6 = $_POST['organization_name_6']; } else {  $organization_name_6 = ''; }
	if(isset($_POST['highest_grade_6'])){$highest_grade_6 = $_POST['highest_grade_6']; } else {  $highest_grade_6 = ''; }
	if(isset($_POST['leadership_roles_6'])){$leadership_roles_6 = $_POST['leadership_roles_6']; } else {  $leadership_roles_6 = ''; }
	if(isset($_POST['activity_details_6'])){$activity_details_6 = $_POST['activity_details_6']; } else {  $activity_details_6 = ''; }
	if(isset($_POST['organization_name_7'])){$organization_name_7 = $_POST['organization_name_7']; } else {  $organization_name_7 = ''; }
	if(isset($_POST['highest_grade_7'])){$highest_grade_7 = $_POST['highest_grade_7']; } else {  $highest_grade_7 = ''; }
	if(isset($_POST['leadership_roles_7'])){$leadership_roles_7 = $_POST['leadership_roles_7']; } else {  $leadership_roles_7 = ''; }
	if(isset($_POST['activity_details_7'])){$activity_details_7 = $_POST['activity_details_7']; } else {  $activity_details_7 = ''; }
	if(isset($_POST['organization_name_8'])){$organization_name_8 = $_POST['organization_name_8']; } else {  $organization_name_8 = ''; }
	if(isset($_POST['highest_grade_8'])){$highest_grade_8 = $_POST['highest_grade_8']; } else {  $highest_grade_8 = ''; }
	if(isset($_POST['leadership_roles_8'])){$leadership_roles_8 = $_POST['leadership_roles_8']; } else {  $leadership_roles_8 = ''; }
	if(isset($_POST['activity_details_8'])){$activity_details_8 = $_POST['activity_details_8']; } else {  $activity_details_8 = ''; }
	if(isset($_POST['organization_name_9'])){$organization_name_9 = $_POST['organization_name_9']; } else {  $organization_name_9 = ''; }
	if(isset($_POST['highest_grade_9'])){$highest_grade_9 = $_POST['highest_grade_9']; } else {  $highest_grade_9 = ''; }
	if(isset($_POST['leadership_roles_9'])){$leadership_roles_9 = $_POST['leadership_roles_9']; } else {  $leadership_roles_9 = ''; }
	if(isset($_POST['activity_details_9'])){$activity_details_9 = $_POST['activity_details_9']; } else {  $activity_details_9 = ''; }
	if(isset($_POST['organization_name_10'])){$organization_name_10 = $_POST['organization_name_10']; } else {  $organization_name_10 = ''; }
	if(isset($_POST['highest_grade_10'])){$highest_grade_10 = $_POST['highest_grade_10']; } else {  $highest_grade_10 = ''; }
	if(isset($_POST['leadership_roles_10'])){$leadership_roles_10 = $_POST['leadership_roles_10']; } else {  $leadership_roles_10 = ''; }
	if(isset($_POST['activity_details_10'])){$activity_details_10 = $_POST['activity_details_10']; } else {  $activity_details_10 = ''; }
	$all_data = serialize($_POST);;
		$resultdup = mysqli_query($con,"select * from profile_data where createdby = '$userid'  order by id desc limit 1 ");
		if(mysqli_num_rows($resultdup) > 0) 
		{
			mysqli_query($con,"UPDATE profile_data
			SET
			`all_data` = '$all_data',
			`created` = NOW()
			where createdby = '$userid'");	
		}
		else
		{
			mysqli_query($con,"INSERT INTO `profile_data` (`all_data`,`created`,`createdby`)
			VALUES ('$all_data',NOW(),'$userid');");
		}

	
	$_SESSION['data_profile'] =$_POST;
}


?>

<?php
// include 'top-nav-no-left-menu.php';
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
<link href="/css/site.css?q=adas<?php echo(rand()); ?>" rel="stylesheet">
<link href="/css/custom.css?q=adas<?php echo(rand()); ?>" rel="stylesheet">
<link href="/css/mform.css?q=adas<?php echo(rand()); ?>" rel="stylesheet">
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
	
<!-- Custom script -->


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

	#sub-category-filter .number {
		width: 33px !important;
		height: 33px !important;
	}

	#disclaimer-modal.show{
		opacity: 1;
		padding-top: 100px;
	}

	#disclaimer-modal.show input[type='checkbox']{
		width: 13px;
    	height: 13px;
		border-radius: 0px;
		box-shadow: none !important;
		right: auto;
    	top: auto;
		border: 1px solid #111;
	}

	#disclaimer-modal.show input[type='checkbox']:before{
		display: none;
	}

	#disclaimer-modal.show input[type='checkbox']:checked:after{
		top: 0px;
		left: 0px;
		color: black;
		text-align: left;
		font-size: 1rem;
		width: auto;
		height: auto;
	}

	.modal-backdrop.fade.show{
		opacity: 0.5 !important;
	}

	@media screen and (max-width: 480px){
		li.nav-item {
			border-top: 0px transparent !important;
		}

		#disclaimer-modal.show .modal-dialog{
			margin-top: 100px;
		}

		#disclaimer-modal.show .modal-header .modal-title{
			font-size: 2rem;
		}

		
	}

</style>
<!----------------------------HEADER----------------------------------->
<!--multi step form with banner start here-->


<!----------------------------BANNER----------------------------------->
<!--<div class="banner inner-banner" style="background:url(images/career-banner.jpg) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> Dashboard </h1>
    </div>
  </div>
</div>
-->

<!----------------------------BANNER----------------------------------->

<!----------------------------BODY----------------------------------->

<!----------------------------Section one----------------------------------->
<section class="thankyou">
   <div class="container fluid pt-60">
   		<div class="row">
      		<div class="col-xs-12 col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
				<div class="img-full">
					<span class="main-img-wrap">
						<img  class="img-responsive main-img" src="/images/congrats.png">
					</span>
				</div>
				<div class="content pb-60">
					<h2 class="text-center pt-20 text-dark"><strong>Congratulations, <span class="highlightblue"><?php echo $_SESSION['first_name']; ?>!</span></strong></h2>
					<h2 class="text-center subhead-congrats">You have finished creating your profile</h2>
					<div class="divider1px"></div>
					<p class="text-center">Click Next to begin building your college filters.</p>
					<div class="mt-30 mb-30 blueBtnBigdiv text-center">
              			<a href="form.php" class="blueBtnBig myblueBtnBig" aria-hidden="false">Next</a>
	   				</div>
				</div>
			</div>
	   </div>
	</div>
</section>

<!----------------------------Section one----------------------------------->





<?php include 'footer.php'; ?>
