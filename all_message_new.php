<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
include('includes/config.php');
include 'header-dashboard.php'; 
$action = @$_REQUEST['action'];
if($action){
$id = @$_REQUEST['id'];
if($action=='Accept'){
	$sql = "UPDATE counselor_dash_message SET accepted='1' WHERE id ='".$id."'";
}elseif($action=='Reject'){
	$sql = "UPDATE counselor_dash_message SET accepted='0' WHERE id ='".$id."'";
}
$con->query($sql);
echo '<script> window.location.replace("https://dev.isuriz.com/all_message_new.php"); </script>';
}
	/* $sql = "SELECT * FROM `counselor_dash_message` WHERE to_id = '".$userid."'"; 
	$result_n = $con->query($sql);
	$retult = $result_n->fetch_assoc();
    echo "<pre>"; print_r($retult); echo "</pre>"; */
?>
<!-- Begin Page Content -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="container-fluid">
  <!-- Page Heading -->
  <div >
    <h1  class="">Message</h1> 	  
	  
	</div>
  <!-- Content Row -->
  <div class="row">
	   <table class="table">
    <thead>
      <tr>
        <th></th>
        <th>Student</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Subject</th>
        <th>Message</th>
        <th>Accept</th>
        <th>Time</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
                <?php 
                  foreach ($result_req_msg as $key => $value) {
					$id = $value['Id'];
                    $from_id = $value['from_id'];
					$infoD = get_user_info($from_id);
					if($value['accepted']==0){
					$subject = '*****';
                    $message = '*****';	
                    $accepted = 'Accept';
					$infoD['emailid'] = '******@gmail.com';					
					$infoD['phoneno'] = '**********';					
					}else{
                    $subject = $value['subject'];
                    $message = $value['message'];
					$accepted = 'Reject';
					}
                    $dismiss = $value['dismiss'];
                    $date_ = $value['date'];
                    $date1 = new DateTime($date_);
                    $currentDate = date('Y-m-d H:i:s');
                    $date2 = $date1->diff(new DateTime($currentDate));

                     ?>
					 
      <tr>
	    <td></td>
        <td><div class="text-truncate"><?php echo $infoD['name']; ?> </div></td>
        <td><div class="text-truncate"><?php echo $infoD['emailid']; ?> </div></td>
        <td><div class="text-truncate"><?php echo $infoD['phoneno']; ?> </div></td>
        <td><div class="text-truncate"><?php echo substr($subject,0,20); ?></div></td>
        <td><div class="text-truncate"><?php echo substr($message,0,20); ?></div></td>
        <td><div class="text-truncate"><a class="read-more" href="all_message_new.php?action=<?php echo $accepted; ?>&id=<?php echo $id ; ?>"><?php echo $accepted; ?> </a></div></td>
        <td><div class="small text-gray-500">. 
                          <?php 
					  
                              if(!empty($date2->s)){
                                $res_date = $date2->s.' seconds';
                              }
                              if (!empty($date2->i)) {
                                $res_date = $date2->i.' minutes';
                              }
                              if (!empty($date2->h)) {
                                $res_date =$date2->h.' hours';
                              }
                              if (!empty($date2->d)) {
                                $res_date = $date2->d.' days';
                              }
                              if (!empty($date2->m)) {
                                $res_date = $date2->m.' months';
                              }
                              if (!empty($date2->y)) {
                                $res_date = $date2->y.' years';
                              }
                              if(isset($res_date)){
                                echo $res_date. " ago";
                              }

                              ?>
                        </div></td>
			<td><!--<a class="read-more" href="read-message-dashboard.php?id=<?php echo $id ; ?>">Read more </a>--></td>			
      </tr>
    
                    
                      
                     
                        
                        
                        
                      </div>
                    </a>
<hr>
		  	
                  <?php                    
                  }
                ?> 
</tbody>
  </table>	
  </div>
	
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
<?php include 'footer-dashboard.php'; ?>