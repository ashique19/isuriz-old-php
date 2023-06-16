<?php 
session_start();
if (!isset($_SESSION['userid'])) {
  header('Location: ' . 'login.php');
  exit;
}
?>

<?php 

include_once 'includes/config.php';
$total_request = 0;
// Check connection
if ($con->connect_error) {
  die("Connection failed: " . $con->connect_error);
}
$userid = $_SESSION['userid'];
  $directoryURI = $_SERVER['REQUEST_URI'];
  $path = parse_url($directoryURI, PHP_URL_PATH);
  $components = explode('/', $path);
  $first_part = $components[1];

$sql = "SELECT * FROM counselor_detail RIGHT JOIN tbl_users ON counselor_detail.user_id = tbl_users.id WHERE tbl_users.id = '".$userid."' ";
$result = $con->query($sql);
$profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
if ($result->num_rows > 0) {
  $counselor_details = $result->fetch_assoc();
  if(!empty($counselor_details['profile_picture'])):
    $profile_picture = $counselor_details['profile_picture']; 
  endif;  
}

$name = $_SESSION['first_name'];
$fname = explode(" ",$name);
$fname = $fname[0];


//Request Notification -
if($_SESSION['usertype'] == 'College_Counselor'): 
  $sql = "SELECT * FROM `counselor_request` WHERE req_dismiss = 0 AND req_to_couselorID = '".$userid."' ";
  $qry_req = "SELECT * FROM `counselor_request` WHERE approval_status IS NULL AND req_to_couselorID = '".$userid."' ORDER BY `counselor_request`.`req_id` DESC LIMIT 5";
else:
  $sql = "SELECT * FROM `counselor_request` WHERE req_dismiss_stu = 0 AND approval_status IS NOT NULL  AND req_by_id = '".$userid."' ";
  $qry_req = "SELECT * FROM `counselor_request` WHERE approval_status IS NOT NULL  AND req_by_id = '".$userid."' ORDER BY `counselor_request`.`req_id` DESC LIMIT 5";
endif;

$result_n = $con->query($sql);
if ($result_n->num_rows > 0) {
  $total_request = $result_n->num_rows;
}
$result_req = $con->query($qry_req);

// Message Notification
$sql_m = "SELECT * FROM `counselor_dash_message` WHERE to_id = '".$userid."' AND dismiss = 0 ";
$qry_req_m = "SELECT * FROM `counselor_dash_message` WHERE to_id = '".$userid."' ORDER BY `counselor_dash_message`.`Id` DESC LIMIT 5";
$total_request_message = 0;
$result_m = $con->query($sql_m);

if ($result_m->num_rows > 0) {
  $total_request_message = $result_m->num_rows;
}
$result_req_msg = $con->query($qry_req_m);

?>


    

    

<?php 
function get_user_info($userid){
  global $con;
  $sql = "SELECT * FROM `tbl_users` WHERE id = '".$userid."' "; 
  $result_n = $con->query($sql);
  if ($result_n->num_rows > 0) {
   $row = $result_n->fetch_assoc();
   return $row;   
  }
}

function get_cnslr_profile($userid){
  global $con;
  $sql = "SELECT `profile_picture` FROM `counselor_detail` WHERE user_id = '".$userid."' "; 
  $result_n = $con->query($sql);
  $profile_picture = "https://img.icons8.com/color/100/000000/test-account.png";
  if ($result_n->num_rows > 0) {
   $row = $result_n->fetch_assoc();
   $profile_picture = $row['profile_picture'];  
  }
  return $profile_picture;
}
?>

<script type="text/javascript">
  document.getElementById("sidebarToggleTop").addEventListener("click", function(){
  var x= document.querySelector(".logo-hide"); if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
  });

  if(window.innerWidth < 768){
    document.getElementById("accordionSidebar").classList.add("toggled");
  }
</script>