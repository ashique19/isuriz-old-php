<?php 
session_start();
require_once 'config.php';
$sql = $_POST['sql'];
//$session = json_decode($_POST['session']);
$limit = $_POST['limit'];
$sql = $sql." LIMIT ".$limit.",9";
$result = $con->query($sql);			
$clgidarr = array();
//e/cho "<pre>";print_r($session);exit;
if ($result->num_rows > 0) {			
	while($row = $result->fetch_assoc()) {
			$singleclgarr = array();
			$singleclgarr['UNITID'] = $row['UNITID'];
			$singleclgarr['INSTNM']=$row['INSTNM'];
			$singleclgarr['CITY']=$row['CITY'];
			$singleclgarr['STABBR']=$row['STABBR'];
			$singleclgarr['WEBADDR']=$row['WEBADDR'];
			array_push($clgidarr,$singleclgarr);
		}
		if(count($clgidarr)>0){
			//echo '<table class="table table-striped" id="table_id">
				//	<thead><tr><th>Select</th><th>College Name</th></tr></thead>
				//	<tbody>';
				$kalacount = 0;
			foreach($clgidarr as $arr){
				$enrollquery ='';
				$enrolresult= '';
				$enroll='';
				$percentadmitted = '';
				$percentquery = '';
				$graduationrate = 0;
                $financialaidrate = 0;
                $outofstatefees = 0;
                $instatefees = 0;
                $booksfees = 'N/A';
                $satevidence = 'N/A';
                $satmath = 'N/A';
                $actenglish = 'N/A';
                $actmath = 'N/A';
                $netprice = 'N/A';
				$avgnetprice = 'N/A';
				if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'enrollment')
				{
					$enrollquery = "select `ENRTOT` from `drvef2018` where drvef2018.UNITID =".$arr['UNITID'];
					$enrolresult = $con->query($enrollquery);
					$rowenroll = $enrolresult->fetch_assoc();
					if(!empty($rowenroll)){
						$enroll = $rowenroll['ENRTOT'];
					}else{
						$enroll = 0;
					}
					//echo "<pre>";print_r($rowenroll);
				}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'percentadmitted'){
						$percentquery = "select `DVADM01` from `drvadm2018` where drvadm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$percentadmitted = $rowpercent['DVADM01'];
						}else{
							$percentadmitted = 0;
						}
					}
					else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'graduationrate'){
						$percentquery = "select `PGGRRTT` from `drvgr2018` where drvgr2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$graduationrate = $rowpercent['PGGRRTT'];
						}else{
							$graduationrate = 0;
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'finacialaid'){
						$percentquery = "select `ANYAIDP` from `sfa1718_p1` where sfa1718_p1.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$financialaidrate = $rowpercent['ANYAIDP'];
						}else{
							$financialaidrate = 0;
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'outofstate'){
						$percentquery = "SELECT `CHG3AY3` FROM `ic2018_ay` where ic2018_ay.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$outofstatefees = $rowpercent['CHG3AY3'];
						}else{
							$outofstatefees = 0;
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'instate'){
						$percentquery = "SELECT `CHG2AY3` FROM `ic2018_ay` where ic2018_ay.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$instatefees = $rowpercent['CHG2AY3'];
						}else{
							$instatefees = 0;
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'books'){
						$percentquery = "SELECT `CHG4AY3` FROM `ic2018_ay` where ic2018_ay.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$booksfees = $rowpercent['CHG4AY3'];
						}else{
							$booksfees = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'netprice'){
						$percentquery = "SELECT `NPIST2` FROM `sfa1718_p2` where sfa1718_p2.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$netprice = $rowpercent['NPIST2'];
						}else{
							$netprice = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'averagenetprice'){
						$percentquery = "SELECT `NPIST2`,`NPGRN2` FROM `sfa1718_p2` where sfa1718_p2.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							
							if(!empty($rowpercent['NPIST2'])){ 
							$avgnetprice = $rowpercent['NPIST2'];
							}elseif (!empty($rowpercent['NPGRN2'])) {
							  $avgnetprice = $rowpercent['NPGRN2'];
							}else {
							echo "--";
							}
							
							//$netprice = $rowpercent['NPIST2'];
						}else{
							$avgnetprice = 'N/A';
						}
					}
					else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'satevidence'){
						$percentquery = "SELECT `SATVR25` FROM `adm2018` where adm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$satevidence = $rowpercent['SATVR25'];
						}else{
							$satevidence = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'satmath'){
						$percentquery = "SELECT `SATMT25` FROM `adm2018` where adm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$satmath = $rowpercent['SATMT25'];
						}else{
							$satmath = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'actenglish'){
						$percentquery = "SELECT `ACTEN25` FROM `adm2018` where adm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$actenglish = $rowpercent['ACTEN25'];
						}else{
							$actenglish = 'N/A';
						}
					}else if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'actmath'){
						$percentquery = "SELECT `ACTMT25` FROM `adm2018` where adm2018.UNITID =".$arr['UNITID'];
						$percentresult = $con->query($percentquery);
						$rowpercent = $percentresult->fetch_assoc();
						if(!empty($rowpercent)){
							$actmath = $rowpercent['ACTMT25'];
						}else{
							$actmath = 'N/A';
						}
					}
				
					$kala_backgroundclr = "";
					$kala_txtclr = "";
					$kala_btnclass = "";
					$kala_chkbox = "";
					if(isset($_SESSION['clgcb']))
					{
						foreach($_SESSION['clgcb'] as $preclgcb)
						{
							if($preclgcb == $arr['UNITID'])
							{
								$kala_backgroundclr = 'style="background-color: rgb(1, 159, 240);"';
								$kala_txtclr = 'style="color: white;"';
								$kala_btnclass = "yellow-bg";
								$kala_chkbox = "checked";
							}
						}
					}	
			echo '<div class="col-md-4 col-sm-12"> 
						<input type="checkbox" onchange="toggleCheckbox(this)" class="green-tickbox" value="'.$arr['UNITID'].'" id="clgchk'.$arr['UNITID'].'" name="clgcb[]" '.$kala_chkbox.'/> 
						 <div class="College-Search-inner" id="box'.$arr['UNITID'].'" '.$kala_backgroundclr.'>
						   <div class="col-sm-12 col-md-11 col-xs-12 pr-0" onclick="toggleClgUpper('.$arr['UNITID'].')">
								<h3 '.$kala_txtclr.'>'. $arr['INSTNM'].'</h3>
								<p '.$kala_txtclr.'>'. $arr['CITY'].', '.$arr['STABBR'].'</p>';
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'enrollment') {
									if($enroll > 0)
										echo '<p>Enrollment : ' .  number_format($enroll) . '</p>';
									else
										echo '<p>Enrollment : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'percentadmitted') {
									if($percentadmitted > 0)
										echo '<p>Acceptance Rate : ' . $percentadmitted . '%</p>';
									else
										echo '<p>Acceptance Rate : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'graduationrate') {
									if($graduationrate > 0)
										echo '<p>Graduation Rate : ' . $graduationrate . '%</p>';
									else
										echo '<p>Acceptance Rate : N/A</p>';									
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'finacialaid') {
									if($financialaidrate > 0)
										echo '<p>Financial Aid : ' . $financialaidrate . '%</p>';
									else
										echo '<p>Financial Aid : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'outofstate') {
									if($outofstatefees > 0)
										echo '<p>Out-of-State Tuition : ' . '$'.number_format($outofstatefees) . '</p>';
									else
										echo '<p>Out-of-State Tuition : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'instate') {
									if($instatefees > 0)
										echo '<p>In-State Tuition : ' . '$'.number_format($instatefees) . '</p>';
									else
										echo '<p>In-State Tuition : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'books') {
									if($booksfees > 0)
										echo '<p>Books & Supplies : ' . '$'.number_format($booksfees) . '</p>';
									else
										echo '<p>Books & Supplies : N/A</p>';
								}
								
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'averagenetprice') {
									if($avgnetprice > 0)
										echo '<p>Avg Net Price : ' . '$'.number_format($avgnetprice) . '%</p>';
									else
										echo '<p>Avg Net Price : N/A</p>';
									
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'satevidence') {
									if($satevidence > 0)
										echo '<p>SAT Evidence-Based Reading and Writing : ' . $satevidence . '%</p>';
									else
										echo '<p>SAT Evidence-Based Reading and Writing : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'satmath') {
									if($satmath > 0)
										echo '<p>SAT Math : ' . $satmath . '%</p>';
									else
										echo '<p>SAT Math : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'actenglish') {
									if($actenglish > 0)
										echo '<p>ACT English : ' . $actenglish . '%</p>';
									else
										echo '<p>ACT English : N/A</p>';
								}
								if(isset($_SESSION['orderbyfield']) && $_SESSION['orderbyfield'] == 'actmath') {
									if($actmath > 0)
										echo '<p>ACT Math : ' . $actmath . '%</p>';
									else
										echo '<p>ACT Math : N/A</p>';
								}
						   echo '</div>
							<div class="col-sm-12 col-md-12 col-xs-12 btn-college-list">
							  <div class="collage-details table-responsive-sm">
							   <ul>
									 <li>
										<a class="clg-website-address mybluebtnsmall '.$kala_btnclass.'" href="school-profile.php?unitid='.$arr['UNITID'].'" target="_blank">More Information</a>
									</li>
								  </ul>
								   </div> 
							</div>
						 </div>
					  </div>';
				//	echo '<tr>';
				//	echo '<td><input type="checkbox" id="clgcb[]" name="clgcb[]" value="'.$key.'"></td>';
				//	echo '<td><span class="schoolInfo" onclick="getSchoolInfo('.$key.')">'. $val .'</span>';
					//echo '<td onclick="getSchoolInfo('.$key.')">'.$val;
				//	echo '</td> </tr>';
				$kalacount++;
				}
				//echo '</tbody></table>';
		}
}
?>
