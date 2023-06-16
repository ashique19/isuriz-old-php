<?php 
include('includes/config.php');
require 'includes/class.phpmailer.php';
$errormsg = '';


//random string function to generate random token string
function random_string($length) {
	$key = '';
	$keys = array_merge(range(0, 9), range('a', 'z'));
	for ($i = 0; $i < $length; $i++) {
		$key .= $keys[array_rand($keys)];
	}
	return $key;
}
//Encrypt/Decrypt password using method AES-256-CBC supported by php 7.x
function encrypt_decrypt($action, $string) {
	
	$output = false;
	$encrypt_method = "AES-256-CBC";
	$secret_key = 'X*T9B@786#!qwN';
	$secret_iv = 'V)*12qZesxd%^jK';

	// hash
	$key = hash('sha256', $secret_key);

	// iv - encrypt method AES-256-CBC expects 16 bytes - else you will get a warning
	$iv = substr(hash('sha256', $secret_iv), 0, 16);

	if($action == 'encrypt') {
		$output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
		$output = base64_encode($output);
	}else if($action == 'decrypt') {
		$output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	}
	else{		
	}
	return $output;
}



   
      

	  if(isset($_GET['aid'])){
	  	$reffreal_id = $_GET['aid'];
	    setcookie('refferal_id', $reffreal_id, time() + (86400 * 7), "/"); 
	  }
	  
	  

	  if(isset($_GET['aff_id'])){
	  	$affreal_id = $_GET['aff_id'];
	  	setcookie('affreal_id', $affreal_id, time() + (86400 * 7), "/"); 
	  }
	  
  
//post variables processing
$error = array();
if(isset($_POST['sub'])){
	

	$name = mysqli_real_escape_string($con, $_POST["name"]);

	$name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
      $error[] = "Only letters and white space allowed";
    }



	$emailid = $_POST["emailid"];

	$password = mysqli_real_escape_string($con, trim($_POST['password']));
	$cryptedpwd = encrypt_decrypt('encrypt', $password);
	$usertype = $_POST["usertype"];

	//reCAPTCHA validation
	if (isset($_POST['g-recaptcha-response'])) {	
		$secret = "6Lf90G8aAAAAALr942LCflGSBeP9Adl-COgI_Gqf";			
		$verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){

        }else{
        	$error[] = '<b>Captcha</b> Validation Required!';
			
        }		
	}

	if(empty($error)):
		$token = random_string(20);
		//check if this email id is already registered or not
		$resdup2 = mysqli_query($con,"SELECT * FROM tbl_users WHERE emailid = '$emailid' ");
		if(mysqli_num_rows($resdup2) > 0)
		{
			$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Email ID already exists !!!</div>";
		}
		else{
			//insert
			$aff_idd =$_GET['aff_id'];
		   $result = mysqli_query($con,"INSERT INTO `tbl_users`(`name`,`emailid`,`password`,`usertype`,`token`,`is_email_verified`,`created`,`created_by`,`partner_aff_id`)
			VALUES ('$name','$emailid','$cryptedpwd','$usertype','$token','0',NOW(),'0','$aff_idd');");		
			if($result)
			{
				$lastid= $con->insert_id;;
		 		$message = 'Hello '.$name.',<br/><br/>We are excited to welcome you to Isuriz. You have joined one of the most dynamic and innovative websites for college planning. We hope that you realize the benefits.<br/><br/>Here are your account details for your review:<br/>Username: '.$emailid.'<br/>Password: '.$password.'<br/><br/>To activate your Isuriz account, click on the following link:<br/><a href="'.URL.'verfication.php?token='.$token.'&id='.$lastid.'">'.URL.'verfication.php?token='.$token.'&id='.$lastid.'</a>'.'<br/><br/>Regards,<br/>The Isuriz Team';
				$mail = new PHPMailer(); // create a new object
				//$mail->IsSMTP(); // enable SMTP
				//$mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
				//$mail->SMTPAuth = true; // authentication enabled
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
				$mail->setFrom('support@isuriz.com', 'Isuriz');
				$mail->AddAddress($emailid, $name);  // Add a recipient
				// $mail->AddBCC('jlefkovi2003@yahoo.com', 'Jay Lefkovitz');
				//$mail->AddAddress($row->emailid, $row->name);               // Name is optional

				$mail->WordWrap = 100;                                 // Set word wrap to 50 characters
				$mail->IsHTML(true);                                  // Set email format to HTML

				$mail->Subject = 'Welcome to Isuriz';
				$mail->Body = $message;
				//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				if(!$mail->send()) {
					mysqli_query($con,"ROLLBACK");
					$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error while sending email, please contact IT administrator !!!</div>";				
				} else {
					mysqli_query($con,"COMMIT");
					$errormsg = " <div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Your account has been created successfully. A confirmation email has been sent to you. Click on the link in the email to activate your account and get started!</div>";
				}						
			}
			else
			{
				mysqli_query($con,"ROLLBACK");
				$errormsg = " <div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>Error while inserting record !!!</div>";
			}
		} 
		if(isset($_GET['aff_id'])){
			$idd =$_GET['aff_id'];
			$sqll ="SELECT * FROM `partner` WHERE partner_id=$idd";
				  $qu =mysqli_query($con, $sqll);
				   $roww =mysqli_fetch_array($qu);
					
					   if($idd == $roww['partner_id']){
						  $inc_from =$roww['credits'] + 1;
						  $sql3 ="UPDATE `partner` SET credits='$inc_from' WHERE partner_id=$idd";
						 $que = mysqli_query($con, $sql3);	
						 if($que){
							
							 $sql5 ="INSERT INTO `commission` (`id`, `from_id`, `credits`, `registed_id`) VALUES (NULL, '$idd', '5', '$lastid')";
							
							 mysqli_query($con, $sql5);
						 }	 
				   }else {
					  $sql4 ="INSERT INTO `partner` (`credits`, `partner_id`) VALUES ('1', '$idd')";
					 $quer =mysqli_query($con, $sql4);	
					
					   if($quer){
						$sql5 ="INSERT INTO `commission` (`id`, `from_id`, `credits`, `registed_id`) VALUES (NULL, '$idd', '5', '$lastid')";
						mysqli_query($con, $sql5);
					   }
				   }
		}
	endif;  
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 include 'headerapp.php'; 
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<title>Isuriz</title>
<!-- Bootstrap Core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="css/site.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/collage-search.css" rel="stylesheet">
<!-- Custom Fonts -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	
	<!-- Custom script -->
	<script src="js/mycustomjs.js"></script> 

<link href="css/site.css" rel="stylesheet">
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
.g-recaptcha div {
    width: 100%;
    margin: 0 auto;
    text-align: center;
}
/*.weak-password {
    background-color: #FF6600;
    border: #AA4502 1px solid;
}
.medium-password {
    background-color: #E4DB11;
    border: #BBB418 1px solid;
}
#password-strength-status {
    padding: 1px 10px;
    color: #FFFFFF;
    border-radius: 4px;
    margin-top: 5px;
}
.strong-password {
    background-color: #12CC1A;
    border: #0FA015 1px solid;
}*/
</style>

<script>
    (function(w){
        var k="nudgify",n=w[k]||(w[k]={});
        n.uuid="d0878619-dfca-4602-88c6-4941cb40d7dd";
        var d=document,s=d.createElement("script");
        s.src="https://pixel.nudgify.com/pixel.js";
        s.async=1;
        s.charset="utf-8";
        d.getElementsByTagName("head")[0].appendChild(s)
    })(window)
</script>

</head>
<body>

<!-- HEADER -->
<?php include 'header-before-login.php'; ?>
<!-- HEADER --> 

<div class="log-inpart form-wrap pt-5">
<form role="form" name="myform" id="idForm" method="POST">
  <div class="container">
    <div class="after-two">
      <div class="log-inpart-sec form-white-box">
        <h2> Create an Account </h2>
    	<div class="col-md-12" style="padding: 0px;">
			<?php echo $errormsg; ?>

			<?php 
          	if(isset($error) && !empty($error)){
          		echo "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>". $error[0]."</div>";          		
          	}
          	?>
        </div>
      
        <div class="form-group">
         	<label class="control-label sr-only" for="name">Full Name</label>
          	<input type="text" class="form-control" placeholder="Full Name" id="name" name="name" required >
        </div>
        <div class="form-group">
			<label class="control-label sr-only" for="emailid">Email Address</label>
          	<input type="email" class="form-control" placeholder="Email Address" id="emailid" name="emailid" required>
        </div>
       	<div class="row">
        	<div class="col-sm-12">
          		<div class="control-input form-group">
			  		<label class="control-label sr-only" for="password">Password</label>
            		<input autocomplete="off" class="form-control input-hg" placeholder="Password" type="password" id="password" name="password" required>
            		<span id="password-strength-status"></span>
          		</div>
        	</div>
        	<div class="col-sm-12">
				<div class="control-input form-group">
					<label class="control-label sr-only" for="confirm_password">Confirm Password</label>
					<input autocomplete="off" class="form-control input-hg" placeholder="Confirm Password" type="password" id="confirm_password" name="confirm_password" required>
				</div>
        	</div>
      	</div>
      <div class="form-group">
         	<label class="control-label sr-only" for="usertype">Select User Type</label>
          	<select name="usertype" id="usertype" required>
			  	<option value="">Select User Type</option>
			    <option value="Current_High_School_Student">Current High School Student</option>
			    <option value="Current_College_Student">Current College Student</option>
			    <option value="Parent_or_Guardian">Parent or Guardian</option>
			    <option value="College_Counselor">College Counselor</option>
			    <!--<option value="High_School_Counselor">High School Counselor</option>-->
			    <option value="Other">Other</option>
  			</select>
       </div>
    	<div class="form-group">
	        <span style="font-size:13px;margin-top:30px;display:block;">By clicking Sign Up, you agree to our <a href="terms-of-use.php">Terms of Use</a> and <a href="privacy-policy.php"> Privacy Policy </a>.</span>
	        </div>

        <!-- capcha  -->
        	<div class="g-recaptcha" data-sitekey="6Lf90G8aAAAAAFkWox3N40AiCvpQmHYRh68IWAcl"></div>

       		<div class="full"><button class="btn logdv mybluebtn" name="sub" id="sub"> Sign up </button> 

       		
			<hr>
          	<p> Already have an account? <a href="login.php"> Login Now </a> </p>

          	
        </div>
      </div>
    </div>
  </div>
  </form>
</div>

<?php 
	// include 'footer.php'; 
	include 'partials/footer.php'; 
?>
<script>
	$( document ).ready(function() {		
		$("#idForm").submit(function () {
			var password = $('#password').val();
			var confirm_password = $('#confirm_password').val();
			if(password != confirm_password)
			{
				alert('Password amd Confirm Password not matched.')
				return false;
			}
			// if (password.length <5) {
	  //           alert("The password must be 6 characters or longer.")
	  //           return false;
	  //       }

	  	// password validation
	 //  	var number = /([0-9])/;
		// var alphabets = /([a-zA-Z])/;
		// var special_characters = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;
		// if($('#password').val().length<6) {
		// 	alert("The password must be 6 characters or longer.")
		// 	return false;
		// } else {  	
		// 	if($('#password').val().match(number) && $('#password').val().match(alphabets) && $('#password').val().match(special_characters)) {            
		// 		return true;
		// 	} else {			
		// 		alert("The password must include alphabets, numbers and special characters.")
		// 		return false;			
		// 	}
		// }
	
		});




// $("#password").on("keyup change", function(e) {
//     // do stuff!


// })

		
	});
  </script>