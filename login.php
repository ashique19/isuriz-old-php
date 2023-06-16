<?php
session_start();

if (isset($_SESSION['userid'])) {
  header("location: dashboard.php");
}

include('includes/config.php');
require 'includes/class.phpmailer.php';
$errormsg = '';

function encrypt_decrypt($action, $string) {
  $output = false;

  $encrypt_method = "AES-256-CBC";
  $secret_key = 'X*T9B@786#!qwN';
  $secret_iv = 'V)*12qZesxd%^jK';

  // hash
  $key = hash('sha256', $secret_key);
  
  // iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
  $iv = substr(hash('sha256', $secret_iv), 0, 16);

  if ( $action == 'encrypt' ) {
    $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
    $output = base64_encode($output);
  } else if( $action == 'decrypt' ) {
    $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
  }
  else{
    
  }
  return $output;
}

if(isset($_POST['sub'])){

  //process post variables
  $emailid = $_POST['emailid'];
  $password = mysqli_real_escape_string($con, trim($_POST['password']));
  $cryptedpwd = encrypt_decrypt('encrypt', $password);
  $resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND isclosed = '0' ");
  //echo "SELECT * FROM tbl_users WHERE emailid = '$emailid' AND password = '$cryptedpwd' AND is_email_verified = '1' ";
  //check if the user exists as well as email verified flag is set
  if(mysqli_num_rows($resdup2) > 0){
    while($row = mysqli_fetch_array($resdup2)){
		
	//check if email is verified, set session if not, show msg with resend option	
	if($row['is_email_verified'] > 0){
		
		  //set session variables
		  $_SESSION['userid'] = $row['id'];
		  $_SESSION['first_name'] = $row['name'];
		  $_SESSION['password'] = $password;
		  //$_SESSION['last_name'] = $row['last_name'];
		  $_SESSION['emailid'] = $row['emailid'];
		  $_SESSION['student_type'] = $row['student_type'];
		  $_SESSION['usertype'] = $row['usertype'];
		  

		  $resprofile = mysqli_query($con,"SELECT * FROM profile_data WHERE createdby = '". $row['id']."' ORDER BY id DESC limit 0,1");
		
		  if(mysqli_num_rows($resprofile) > 0){
			  while ($rowfilters = mysqli_fetch_assoc($resprofile)) {
				 $_SESSION['data_profile'] = unserialize($rowfilters["all_data"]);	
			  }
		  }
		  
		  
		  $resfilters = mysqli_query($con,"SELECT * FROM search_data WHERE createdby = '". $row['id']."' ORDER BY id DESC limit 0,1");
		
		  if(mysqli_num_rows($resfilters) > 0){
			  while ($rowfilters = mysqli_fetch_assoc($resfilters)) {
				  $_SESSION['dataform1'] = unserialize($rowfilters["all_filters_data"]);				  
				//  $_SESSION['clgcb'] = unserialize($rowfilters["all_clg_list"]);				  
			  }
			
		  }

      // print_r( array_key_exists('redirect', $_SESSION) );

      // exit();

      if( array_key_exists('redirect', $_SESSION) )
      {

        $redirect = $_SESSION[ 'redirect' ];

        unset($_SESSION['redirect']);

        header("location: ".$redirect);

      } else{
        header("location: dashboard.php");
      }

		  
		}
		else{
			
			$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your account has not been activated. To activate your account, click on the link in the email sent to you upon creating an account. If you cannot find the activation link, click <span onclick='sendverification_email(".$row['id'].")'>here</span> to request that it be resent to you.</div>";
			 
		}
    }
  }
  else
  {
    //user does not exist or email verified flag is not set yet
    $errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>The email or password you have entered is incorrect. Please try again.</div>";
  }
}


if( array_key_exists('redirect', $_SESSION) ) $errormsg = " <p class='alert alert-secondary text-center text-info'>Please login to continue checking out.</p>";

?>

<?php
include('partials/layout-pre.php');
?>


<section class="row mx-0 my-5 p-0 d-flex justify-content-center">

  <section class="col-12 col-sm-4 p-0 m-0 d-flex flex-wrap counsellor-cards">

    <div class="card shadow">
      <div class="card-body">
        <form action="" method="post" class="row">
          
            <div class="col-12 mb-4">
              <h2 class="title-3 text-center">Login</h2>
            </div>

            <div class="col-12">
            <?php echo $errormsg; ?>
            </div>
          
            <div class="col-12 mb-4">
              <input name="emailid" type="text" class="form-control" placeholder="Email" aria-label="Email">
            </div>
          
            <div class="col-12 mb-4">
              <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
            </div>
          
            <div class="col-12 mb-4 text-center">
              <button class="btn btn-info btn-lg" type="submit" name="sub">Login</button>
            </div>
          
            <div class="col-12 mb-4 text-center">
              <a href="/forgotpassword.php" class="text-info">Forgot Password</a>
            </div>

            <hr>  
          
            <div class="col-12 mb-4 text-center text-secondary">
              Don't have an account? <a href="/signup.php" class="text-info">Click Here</a>
            </div>


          
        </form>
      </div>
    </div>


  </section>

</section>




<?php
include('partials/layout-post.php');
?>