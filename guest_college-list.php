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
<!----------------------------BANNER----------------------------------->
<div class="banner inner-banner collage-list-banner multi-step-banner" style="background:url(images/college-list.png) no-repeat">
  <div class="container">
    <div class="banner-part">
      <h1> My College List </h1>
    </div>
  </div>
</div>
<!----------------------------BANNER-----------------------------------> 

<!----------------------------BODY-----------------------------------> 


<div class="college-list">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-lg-8 col-lg-offset-2 py-90">
         <!--alert box-->
         <section class="info-alert-model myCollegeListInfo">
            <div class="row">
               <div class="alert-box-shadow mt-3">
                  <div class="col-sm-12 col-md-12 col-xs-12">
                     <div class="alert alert-warning">
                        <div class="row">
                           <div class="col-sm-12 col-md-12 col-xs-12">
                              <span class="alert-info-icon"><i class="fa fa-info-circle" aria-hidden="true"></i></span> <span class="alert-msg">Once you click Confirm, your college list will be saved in the My College List page on your dashboard for future reference.</span>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--alert box end-->
         <ul class="list-group mycollegelist">
		  <li class="list-group-item cat-header">Long Shot </li>
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
		  <!--<li class="list-group-item">Columbia University </li>-->
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
		  <li class="list-group-item cat-header">Match </li>
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
		  <li class="list-group-item cat-header">Likely </li>
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
	  <div class="row">
			  <div class="mt-30 mb-30 blueBtnBigdiv text-center">
				  <a href="guest_resultlistlogic.php" class="btn btn-default prev mybluebtn blue-outline btn-center-xs" >Back</a>
				 <a href="guest_congratulations.php" class="btn btn-default prev mybluebtn" aria-hidden="false">Confirm</a>
			  </div>
		</div>	 
	  <!--Buttons-->
	  
  </div>
</div>

<!----------------------------BODY-----------------------------------> 

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
