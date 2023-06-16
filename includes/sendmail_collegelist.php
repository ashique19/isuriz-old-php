<?php
require 'class.phpmailer.php';
require 'config.php';
session_start();
if (!isset($_SESSION['userid'])) {
    die('Please login');
}

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

$message = '<div style="font-family:sans-serif;"><ul class="list-group mycollegelist" style="list-style: none;line-height: 1.3;padding: 0px;margin: 0px;">
<li class="list-group-item cat-header" style=" background-color: #019ff0 !important;
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    padding: 10px 15px;">Long Shot </li>';

if($countthm > 0){
$backcolor = 0;
  foreach($clgidarr as $clg){
	 if(!empty($clg['THM'])){
		 
		 
		 if(($backcolor % 2) == 0 )
		{
			$backcolorcode = "#f2f2f2";
		}
		else
		{
			$backcolorcode = "#fff";
		}
		
		
	   $message .= '<li class="list-	-item" style="color: #373a3c;background-color:'.$backcolorcode.';
    font-size: 16px;
    font-weight: 500;
    padding: 12px 15px;">'.$clg['THM'].'</li>';
	$backcolor++;
	 }              
  }
}
else{
  $message .= '<li class="list-group-item" style="color: #373a3c;
    font-size: 16px;
    font-weight: 500;
    padding: 12px 15px;">There are no colleges in this category</li>';
}
$message .= '</ul>
<ul class="list-group mycollegelist" style="list-style: none;line-height: 1.3;padding: 0px;margin: 0px;">
<li class="list-group-item cat-header" style=" background-color: #019ff0 !important;
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    padding: 10px 15px;">Reach </li>';
if($counttr > 0){
	$backcolor = 0;
  foreach($clgidarr as $clg){
	if(!empty($clg['TR'])){
		
		if(($backcolor % 2) == 0 )
		{
			$backcolorcode = "#f2f2f2";
		}
		else
		{
			$backcolorcode = "#fff";
		}
		
		
	  $message .= '<li class="list-group-item" style="color: #373a3c;background-color:'.$backcolorcode.';
    font-size: 16px;
    font-weight: 500;
    padding: 12px 15px;">'.$clg['TR'].'</li>';
	$backcolor++;
	}              
  }
}
else{
  $message .= '<li class="list-group-item" style="color: #373a3c;
    font-size: 16px;
    font-weight: 500;
    padding: 12px 15px;">There are no colleges in this category</li>';           
}
$message .= '  </ul>
<ul class="list-group mycollegelist" style="list-style: none;line-height: 1.3;padding: 0px;margin: 0px;">
<li class="list-group-item cat-header" style=" background-color: #019ff0 !important;
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    padding: 10px 15px;">Match </li>';      
if($counttm > 0){
	$backcolor = 0;
  foreach($clgidarr as $clg){
	if(!empty($clg['TM'])){
		
		if(($backcolor % 2) == 0 )
		{
			$backcolorcode = "#f2f2f2";
		}
		else
		{
			$backcolorcode = "#fff";
		}
		
		
	  $message .= '<li class="list-group-item" style="color: #373a3c;background-color:'.$backcolorcode.';
    font-size: 16px;
    font-weight: 500;
    padding: 12px 15px;">'.$clg['TM'].'</li>';
	$backcolor++;
	}              
  }
}
else{
  $message .= '<li class="list-group-item" style="color: #373a3c;
    font-size: 16px;
    font-weight: 500;
    padding: 12px 15px;">There are no colleges in this category</li>';           
}
$message .= ' </ul>
<ul class="list-group mycollegelist" style="list-style: none;line-height: 1.3;padding: 0px;margin: 0px;">
<li class="list-group-item cat-header" style=" background-color: #019ff0 !important;
    font-size: 18px;
    font-weight: 500;
    color: #fff;
    padding: 10px 15px;">Likely </li>';  
if($countts > 0){
$backcolor = 0;

  foreach($clgidarr as $clg){
	
	if(!empty($clg['TS'])){
		
		if(($backcolor % 2) == 0 )
		{
			$backcolorcode = "#f2f2f2";
		}
		else
		{
			$backcolorcode = "#fff";
		}
		
	  $message .= '<li class="list-group-item" style="color: #373a3c;background-color:'.$backcolorcode.';
    font-size: 16px;
    font-weight: 500;
    padding: 12px 15px;">'.$clg['TS'].'</li>';
	$backcolor++;
	
	}
		
  }
}
else{
  $message .= '<li class="list-group-item" style="color: #373a3c;
    font-size: 16px;
    font-weight: 500;
    padding: 12px 15px;">There are no colleges in this category</li>';           
}     
$message .= '</ul></div>';   


$first_name = $_SESSION['first_name'];
$emailid = $_SESSION['emailid'];
$tomail = $_POST['tomail'];
$ccmail = $_POST['ccmail'];
$mail = new PHPMailer(); // create a new object
$mail->SMTPOptions = array(
	'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
	)
);
$mail->Host = "mail.isuriz.com";
$mail->Username = "support@isuriz.com"; // SMTP username
$mail->Password = "3G5n2~nq"; // SMTP password
$mail->SMTPSecure = "ssl";
$mail->Port       = 25;                            // SMTP password
$mail->setFrom($emailid, $first_name);
$mail->AddAddress($tomail, $tomail);  // Add a recipient

if(!empty($ccmail))
{
	$mail->AddCC($ccmail, $ccmail);  // Add a recipient
}

$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
$mail->IsHTML(true);                                  // Set email format to HTML
$mail->Subject = 'Isuriz - My College List Shared By '.$first_name;
$mail->Body = $message;
if(!$mail->send()) {				
	echo "fail";
	
} else {
	
	echo "success";
}
?>