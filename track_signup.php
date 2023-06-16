<?php
//include 'header-dashboard.php';
//include 'header-common-dashboard.php';
include('includes/config.php');

$sql="SELECT * FROM tbl_users";
$result = $con->query($sql);
if($result->num_rows > 0)
{ //print_r($result); ?>
	<html lang="en">
<head>
	<style>
		.sidebar .sidebar-nav>li>a {
					animation: fadeInLeft .5s;
					font-size: 13px;
				}
	</style>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>	
 
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

 
</head>
<body>
	<div class="container">
<h2 style="text-align:center;color:skyblue;"> Number of users : <?php echo $result->num_rows; ?></h2>
<?php   }   ?>

<div class="row" style="padding-top:20px;">
	
	

	<div class="col-md-3" style="border:1px solid;">
		<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalLong">Today's Signup</button>
		<?php	$sql1="SELECT * FROM tbl_users WHERE created >= CURRENT_DATE()  ";
$result1 = $con->query($sql1);
		
if($result1->num_rows > 0)  {
	//while($row = $result1->fetch_assoc())
//	{ //print_r($result); ?>
<h2 style="text-align:center;color:skyblue;"> <?php echo $result1->num_rows; ?></h2>
<?php }  else  {//} ?>
		<h2 style="text-align:center;color:skyblue;"> <?php echo 0; ?></h2>
<?php  }  ?>
	</div>
	
	
	<div class="col-md-3" style="border:1px solid;">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong7">Last 7 days Signup</button>
<?php  $sql1="SELECT * FROM tbl_users WHERE created >= (CURRENT_DATE() + INTERVAL -7 DAY) ";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	//while($row = $result1->fetch_assoc())
//	{ //print_r($result); ?>
<h2 style="text-align:center;color:skyblue;"> <?php echo $result1->num_rows; ?></h2>
<?php }  //} ?>
		</div>	
	
	
	<div class="col-md-3" style="border:1px solid;">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLong30">Last 30 days Signup</button>
	<?php	$sql1="SELECT * FROM tbl_users WHERE created >= (CURRENT_DATE() + INTERVAL -30 DAY)";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)   {
	//while($row = $result1->fetch_assoc())
	//{ //print_r($result); ?>
<h2 style="text-align:center;color:skyblue;"> <?php echo $result1->num_rows; ?></h2>
<?php }  //} ?>
	</div>	

<div class="col-md-3" style="border:1px solid;">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalLongAll">All Users Signup</button>
	<?php	$sql1="SELECT * FROM tbl_users  ";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)   {
	//while($row = $result1->fetch_assoc())
	//{ //print_r($result); ?>
<h2 style="text-align:center;color:skyblue;"> <?php echo $result1->num_rows; ?></h2>
<?php }  //} ?>
	</div>	
</div>




<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="top:5%;">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Today</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		   <table class="table">
			  <thead>
				  <th>Name</th>
				  <th>EMail</th>
			  </thead>
			  <tbody>
       <?php	$sql1= "SELECT * FROM tbl_users WHERE created >= CURRENT_DATE() ";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	while($row = $result1->fetch_assoc())
	{ //print_r($result);
	?><tr>
			<td> <?php echo $row['name']; ?></td>
			<td> <?php echo $row['emailid']; ?></td></tr>
		 
<?php }  } ?>
			   </tbody>
		  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
<!-- Modal 7 -->
<div class="modal fade" id="exampleModalLong7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="top:5%;">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Last 7 days</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		   <table class="table">
			  <thead>
				  <th>Name</th>
				  <th>EMail</th>
			  </thead>
			  <tbody>
       <?php	$sql1= "SELECT * FROM tbl_users WHERE created >= (CURRENT_DATE() + INTERVAL -7 DAY) ";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	while($row = $result1->fetch_assoc())
	{ //print_r($result);
	?>
	<tr><td> <?php echo $row['name']; ?></td>
		<td><?php echo $row['emailid']; ?></td></tr>
		 
<?php }  } ?>
			   </tbody>
		  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
	
	<!-- Modal 30 -->
<div class="modal fade" id="exampleModalLong30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="top:5%;">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Last 30 days</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		   <table class="table">
			  <thead>
				  <th>Name</th>
				  <th>EMail</th>
			  </thead>
			  <tbody>
  <?php  $sql1= "SELECT * FROM tbl_users WHERE created >= (CURRENT_DATE() + INTERVAL -30 DAY) ";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	while($row = $result1->fetch_assoc())
	{ //print_r($result);
	?>
	<tr>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['emailid']; ?></td>
	</tr>
		 
<?php }  } ?>
			   </tbody>
		  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
	
	<!-- Modal All -->
<div class="modal fade" id="exampleModalLongAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="top:5%;">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">All Users</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <table id="tabledata" class="table"> 
			  <thead>
				  <th>Name</th>
				  <th>EMail</th>
			  </thead>
			  <tbody>
       <?php	$sql1= "SELECT * FROM tbl_users ";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	while($row = $result1->fetch_assoc())
	{ //print_r($result);
	?>
  <h2 style="font-size:16px;text-align:left;color:skyblue;"><tr><td><?php echo $row['name']; ?></td>
	  <td><?php echo $row['emailid']; ?></td></tr></h2>
		 
<?php }  } ?>
			  </tbody>
			  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
	
	

<!-- PARTNER SIGNUP TRACKER -->
		<div class="row" style="padding-top:40px;">
			<h2 style="text-align:center;color:skyblue;">Partners Signup</h2>
	<div class="col-sm-3" style="border:1px solid;">	
		<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalPartner">Today's Signup</button>
	<?php 
 $sql="SELECT * FROM tbl_users WHERE partner_aff_id !='' AND created >= CURRENT_DATE() ";
$result = $con->query($sql);
if($result->num_rows > 0)
{ //print_r($result); ?>
	<h2 style="text-align:center;color:skyblue;"> <?php echo $result->num_rows; ?></h2>
<?php  }	?>
		</div>
		
		

<div class="col-sm-3" style="border:1px solid;">	
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalPartner7">Last 7 days Signup</button>
<?php 
 $sql="SELECT * FROM tbl_users WHERE partner_aff_id !='' AND created >= (CURRENT_DATE() + INTERVAL -7 DAY)";
$result = $con->query($sql);
if($result->num_rows > 0)  
{ //print_r($result); ?>
	<h2 style="text-align:center;color:skyblue;"> <?php echo $result->num_rows; ?></h2>
<?php  }   else   {   ?>
	<h2 style="text-align:center;color:skyblue;"> <?php echo 0; ?></h2>
<?php  }   ?>
		</div>

		
<div class="col-sm-3" style="border:1px solid;">	
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalPartner30">Last 7 days Signup</button>
<?php 
 $sql="SELECT * FROM tbl_users WHERE partner_aff_id !='' AND created >= (CURRENT_DATE() + INTERVAL -30 DAY)";
$result = $con->query($sql);
if($result->num_rows > 0)  
{ //print_r($result); ?>
	<h2 style="text-align:center;color:skyblue;"> <?php echo $result->num_rows; ?></h2>
<?php  }   else   {   ?>
	<h2 style="text-align:center;color:skyblue;"> <?php echo 0; ?></h2>
<?php  }   ?>
		</div>
			
<div class="col-sm-3" style="border:1px solid;">	
<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#exampleModalPartnerAll">All Partners</button>
<?php 
 $sql="SELECT * FROM tbl_users WHERE partner_aff_id !='' ";
$result = $con->query($sql);
if($result->num_rows > 0)  
{ //print_r($result); ?>
	<h2 style="text-align:center;color:skyblue;"> <?php echo $result->num_rows; ?></h2>
<?php  }   else   {   ?>
	<h2 style="text-align:center;color:skyblue;"> <?php echo 0; ?></h2>
<?php  }   ?>
		</div>

			
			
		</div>
		</div>
	
	<!-- Modal partner today -->
<div class="modal fade" id="exampleModalPartner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="top:5%;">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Todays Partner Signup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <table id="tabledata" class="table"> 
			  <thead>
				  <th>Name</th>
				  <th>EMail</th>
			  </thead>
			  <tbody>
 <?php   $sql1= "SELECT * FROM tbl_users WHERE partner_aff_id !='' AND created >= CURRENT_DATE()  ";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	while($row = $result1->fetch_assoc())
	{ //print_r($result);
	?>
  <h2 style="font-size:16px;text-align:left;color:skyblue;"><tr><td><?php echo $row['name']; ?></td>
	  <td><?php echo $row['emailid']; ?></td></tr></h2>
		 
<?php }  } ?>
			  </tbody>
			  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
	
	<!-- Modal partner last 7 days -->
<div class="modal fade" id="exampleModalPartner7" tabindex="-1" role="dialog" aria-labelledby="exampleModalPartner" aria-hidden="true" style="top:5%;">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Last 7 days Partner Signup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <table id="tabledata" class="table"> 
			  <thead>
				  <th>Name</th>
				  <th>EMail</th>
			  </thead>
			  <tbody>
 <?php   $sql1= "SELECT * FROM tbl_users WHERE partner_aff_id !='' AND created >= (CURRENT_DATE() + INTERVAL -7 DAY)";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	while($row = $result1->fetch_assoc())
	{ //print_r($result);
	?>
  <h2 style="font-size:16px;text-align:left;color:skyblue;"><tr><td><?php echo $row['name']; ?></td>
	  <td><?php echo $row['emailid']; ?></td></tr></h2>
		 
<?php }  } ?>
			  </tbody>
			  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
	
	<!-- Modal partner last 30 days -->
<div class="modal fade" id="exampleModalPartner30" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="top:5%;">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Last 30 days Partner Signup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <table id="tabledata" class="table"> 
			  <thead>
				  <th>Name</th>
				  <th>EMail</th>
			  </thead>
			  <tbody>
 <?php   $sql1= "SELECT * FROM tbl_users WHERE partner_aff_id !='' AND created >= (CURRENT_DATE() + INTERVAL -30 DAY)";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	while($row = $result1->fetch_assoc())
	{ //print_r($result);
	?>
  <h2 style="font-size:16px;text-align:left;color:skyblue;"><tr><td><?php echo $row['name']; ?></td>
	  <td><?php echo $row['emailid']; ?></td></tr></h2>
		 
<?php }  } ?>
			  </tbody>
			  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
	<!-- Modal All partners -->
<div class="modal fade" id="exampleModalPartnerAll" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true" style="top:5%;">
<div class="modal-dialog modal-lg">
	<div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Last 30 days Partner Signup</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <table id="tabledata" class="table"> 
			  <thead>
				  <th>Name</th>
				  <th>EMail</th>
			  </thead>
			  <tbody>
 <?php   $sql1= "SELECT * FROM tbl_users WHERE partner_aff_id !='' ";
$result1 = $con->query($sql1);
if($result1->num_rows > 0)  {
	while($row = $result1->fetch_assoc())
	{ //print_r($result);
	?>
  <h2 style="font-size:16px;text-align:left;color:skyblue;"><tr><td><?php echo $row['name']; ?></td>
	  <td><?php echo $row['emailid']; ?></td></tr></h2>
		 
<?php }  } ?>
			  </tbody>
			  </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
	
	
</body>
</html>


<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
 <script>
    $(document).ready(function() {
      $('#tabledata').DataTable();
    });
  </script>

