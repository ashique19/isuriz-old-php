<?php
include 'header.php';
$resfilters = mysqli_query($con,"SELECT * FROM search_data WHERE createdby = '". $_SESSION['userid']."' ORDER BY id DESC limit 0,1");
	
if(mysqli_num_rows($resfilters) > 0){
  while ($rowfilters = mysqli_fetch_assoc($resfilters)) {	  			  
	  $clgcb = unserialize($rowfilters["all_clg_list"]);				  
	  $admiscore = $rowfilters["admiscore"];				  
  }			
}

$clgidarr = array();
//print_r ($_SESSION['admiscore']);
if(isset($clgcb) ){
   $selclgsarr = $clgcb;
   $selectedclgids = '';
   $selectedclgids = implode(",",$selclgsarr);  
   //$selclgsarr = (explode(",",$selectedclgids));
   //echo $selectedclgids;
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
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';         
            $countthm++;
         }
         if($flag == 'TR'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';
            $counttr++;
         }
         if($flag == 'TM'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = '';
            $counttm++;
         }
         if($flag == 'TS'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $indclgidarr['NF'] = '';
            $countts++;
         }
         if($flag == 'NF'){
            $indclgidarr['THM'] = '';
            $indclgidarr['TR'] = '';
            $indclgidarr['TM'] = '';
            $indclgidarr['TS'] = '';
            $indclgidarr['NF'] = $rowclgth['instnm'];
			$indclgidarr['INSTNM'] = $rowclgth['instnm'];
            $countnf++;
         }
         array_push($clgidarr,$indclgidarr);
         array_push($to_remove,$rowclgth['unitid']);
      }
      $missedclgarr = array_diff($selclgsarr, $to_remove);
      //echo 'No Threshold Values: <pre>';
   }
  
}



$INSTNM = array_column($clgidarr, 'INSTNM');
array_multisort($INSTNM, SORT_ASC, $clgidarr);
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
<link href="css/site.css" rel="stylesheet">
<link href="css/custom.css" rel="stylesheet">
<link href="css/mform.css" rel="stylesheet">
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

   .advance-filter-modal.modal.show{
      opacity: 1;
      margin-top: 30px;
      padding-top: 70px;
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
   </head>
   <body class="my-collage-list-template">

		<div id="modalsharecollegelist" class="advance-filter-modal modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
					  <h4 class="modal-title" style="padding-top: 5px;">Share College List</h4>
					  <button type="button" style="margin: 0px; padding: 0px;" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form id="mymailform" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="emailid">To:</label>
							 <input type="email" name="tomail" id="tomail" class="form-control" placeholder="Email" required>
						</div>
						<div class="form-group">
							<label for="emailid">CC:</label>
							 <input type="email" name="ccmail" id="ccmail" class="form-control" placeholder="Email" >
						</div>
						
					</div>
					<div class="modal-footer">
						<input type="submit" value="Send Mail" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" name="applyfilters">
					</div>
					</form>
              
               
			  </div>
		</div>
		</div>
      <div id="modalsharecollegelist2" class="advance-filter-modal modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
              
					  <h4 class="modal-title" style="padding-top: 5px;">Share College List</h4>
                
					  <button type="button" style="    margin: 0px; padding: 0px;" class="close" data-dismiss="modal">&times;</button>
					</div>
					<form id="mymailform" method="post">
					<div class="modal-body">
						<div class="form-group">
							<label for="emailid">To:</label>
							 <input type="email" name="tomail"  class="form-control" placeholder="Email" disabled>
						</div>
						<div class="form-group">
							<label for="emailid">CC:</label>
							 <input type="email" name="ccmail"  class="form-control" placeholder="Email" disabled>
						</div>
					</div>
					<div class="modal-footer">
						<input type="submit" value="Send Mail" class="btn btn-primary apj-chance-of-acceptance mybluebtn" id="applyfilters" disabled>
                  <div class="upgradepremium">
                     <div class="upgrade-content">
                     <h4>Upgrade to Premium to Access this Feature</h4>
                     <p>After at least 5 students that you have invited join Isuriz, your account will be upgraded to Premium to unlock this feature.</p>
                     </div>
                     <div class="upgrade-action">
                        <a class="upgrade-now-btn" href="dashboard-invite.php">Upgrade Now</a>
                     </div>
                  </div>
               </div>
					</form>
              
               
			  </div>
		</div>
		</div>

      <div class="wrapper">
         <!-- top navbar-->
<!--          
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<link rel="stylesheet" href="/asset-css/custom.css">
<link rel="stylesheet" href="/asset-css/custom-xs.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script> -->

         <?php
         // include 'top-nav-no-left-menu.php';
         // include('partials/header.php');
         ?>

         <!-- sidebar-->
         <aside class="aside-container">
            <!-- START Sidebar (left)-->
            <div class="aside-inner">
               <!-- ************left side navbar menu items****************** -->
               <?php
               // include 'dashboard-left-nav.php'; 
               ?>
               <!-- ************end left side navbar menu items****************** -->
            </div>
            <!-- END Sidebar (left)-->
         </aside>
         <section class="section-container">
            <!-- Page content-->
            <div class="content-wrapper">
            
           
               <div class="content-heading mt-5" id="welcometext-div">
                  <div class="text-center" id="welcometext-mb" style="color: #3a3a3a">
                    <h3 class="text-center" id="welcometext-mb" style="color: #3a3a3a">My College List 
                  <button class="btn btn-primary mybluebtn "  onclick="showmodalmailer()">Share</button>

                  </h3>
                  <small data-localize="dashboard.WELCOME"></small></div>
               </div>
              
               <div class="row">
                  <!-- START dashboard main content-->
                  <div class="col-xl-12">
                     <!-- START -->
                     <div class="card card-default card-demo grid-card" >
                        <div class="card-header grid-card-header">

                        <!--alert box-->
                        <section class="myCollegeAlert">
                           <div class="container">
                              <div class="row">
                                 <div class="alert-box-shadow mt-3">
                                    <div class="col-sm-12 col-md-12 col-xs-12">
                                       <div class="alert alert-warning">
                                          <div class="row">
                                             <div class="col-sm-12 col-md-12 col-xs-12">
                                                <span class="alert-info-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> <span class="alert-msg">Please note that colleges on this page only appear after successfully building your list.</span>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>   
                        </section>
                        <!--alert box end-->
                           <div class="college-list">
                                <div class="container">
                                  <div class="row">
                                    <div class="col-xs-12 col-md-12">
                                      <ul class="list-group mycollegelist">
                                          <li class="list-group-item cat-header">Less Likely </li>
                                          <?php
                                             if($countthm > 0){
                                                foreach($clgidarr as $clg){
                                                   if(!empty($clg['THM'])){
                                                   echo '<li class="list-group-item">'.$clg['THM'].'</li>';
                                                   }              
                                                }
                                             }
                                             else{
                                                echo '<li class="list-group-item">There are no colleges in this category</li>';
                                             }
                                          ?>       
                                       </ul>
                                       <ul class="list-group mycollegelist">
                                          <li class="list-group-item cat-header">Reach </li>
                                          <?php
                                          if($counttr > 0){
                                             foreach($clgidarr as $clg){
                                             if(!empty($clg['TR'])){
                                                echo '<li class="list-group-item">'.$clg['TR'].'</li>';
                                             }              
                                             }
                                          }
                                          else{
                                             echo '<li class="list-group-item">There are no colleges in this category</li>';           
                                          }
                                          ?>      
                                       </ul>
                                       <ul class="list-group mycollegelist">
                                          <li class="list-group-item cat-header">Possible </li>
                                          <?php
                                          if($counttm > 0){
                                             foreach($clgidarr as $clg){
                                             if(!empty($clg['TM'])){
                                                echo '<li class="list-group-item">'.$clg['TM'].'</li>';
                                             }              
                                             }
                                          }
                                          else{
                                             echo '<li class="list-group-item">There are no colleges in this category</li>';           
                                          }
                                          ?>
                                       </ul>
                                       <ul class="list-group mycollegelist">
                                          <li class="list-group-item cat-header">More Likely </li>
                                          <?php
                                          if($countts > 0){
                                                foreach($clgidarr as $clg){
                                                if(!empty($clg['TS'])){
                                                   echo '<li class="list-group-item">'.$clg['TS'].'</li>';
                                                }              
                                                }
                                             }
                                             else{
                                                echo '<li class="list-group-item">There are no colleges in this category</li>';           
                                             }           
                                             ?>
                                       </ul>
                                    </div>
                                  </div>
                                   <!--Buttons-->
                                   <!-- <div class="row">
                                         <div class="mt-30 mb-30 blueBtnBigdiv text-center ml-14">
                                            <a href="resultlistlogic.php" class="btn btn-default prev blue-outline btn-center-xs" >Back</a>
                                           <a href="congratulations.php" class="btn btn-default blueBtnBig ml-14" aria-hidden="false">Confirm</a>
                                         </div>
                                    </div> -->    
                                   <!--Buttons-->
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
                           <li><a href="blog.php"> Blog</a> </li>
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
function showmodalmailer()
{
	$('#modalsharecollegelist').modal('show');
}
$( "#mymailform" ).submit(function( event ) {
  $.ajax({
		type: "POST",
		url: "includes/sendmail_collegelist.php",
		dataType: 'text',
		data: $("#mymailform").serialize(),
		cache: false,
		async: false,
		beforeSend: function () {
			$('.loading').show();
		},
		success: function (data) {
			alert(data);
		},
		complete: function () {
			$('.loading').hide();
		}
	});
  event.preventDefault();
});
function noshowmodel()
{
   $('#modalsharecollegelist2').modal('show');
   event.preventDefault();

}
</script>
   </body>
</html>
