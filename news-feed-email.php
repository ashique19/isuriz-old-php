<?php
	use PHPMailer\PHPMailer\PHPMailer;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

		define("URL", "https://dev.isuriz.com/");
		define("DB_SERVER", "localhost");
		define("DB_USER", "dev_isurizdb");
		define("DB_PASS", "Qi6_un75");
		define("DB_NAME", "dev_ipeds");
		
		$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
		if ($con->connect_errno) {
			die("Database selection failed: " . mysqli_error());	
		}
		
		$email=$instnm=$Msg="";
		if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['subscribe']) && isset($_POST['instnm']))
		{
			$email=$_POST['email'];
			$instnm=$_POST['instnm'];
			$token=md5(rand());
			
			
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
            	$emailErr = "Invalid email format";
            }
           else 	
                {
					$inst=implode(" / ",$instnm);
					
                  $ins="INSERT INTO `news-feed-subscription`(email,college_ipeds,token,isEmailConfirmed) VALUES('$email','$inst','$token','0')";
					$res=mysqli_query($con,$ins);
		//	 $sell="SELECT * FROM `news-feed-subscription` WHERE email='$email'";
			
	    include_once "PHPMailer/PHPMailer.php";
		 if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['subscribe']) && isset($_POST['instnm']))
		 {
			 //$email=$_POST['email'];
			 $htmlContent = "<html>
					<body style='background-color:#eeeeee;padding:20px;font-family:Times New Roman;'>
					<h1 style='color:black;'>Please Confirm Your Subscription</h1>
					<a href='https://dev.isuriz.com/confirm.php?email=$email&token=$token'  style='font-size:18px;'>Yes, subscribe me to this list.</a>
					<h3 style='font-weight:400'>If you received this email by mistake, simply delete it. You won't be subscribed if you don't click the confirmation link above.</h3>	
					<h2> Thank You </h2>
					</body>
							</html>";
            
			 $to = $email;
			 $headers = new PHPMailer();
			 $headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// $htmlContent .=$inst;
			 $subject = "News subscription";
					//msg .= " <a href='https://dev.isuriz.com/confirmed.php?email=$email&token=$token'>Click Here</a>";
			 if(mail($to,$subject,$htmlContent,$headers)):
         			$Msg="<div style='font-size:15px;color:#019ff0;border:2px white;tesxt-align:center;padding-top:70px;font-weight:600;'>Almost finished...<br>
We need to confirm your email address.<br>
To complete the subscription process, please click the link in the email we just sent you.
</div>";
			  
                else:
                    echo $errorMsg = 'Email sending fail.';
                endif;
                
              //  echo $htmlContent; 
			}    
			   }
			 
				//print_r($ins);
				  //print_r($_POST['instnm']);    
			    }
		
	
?>


<html>
<head>
<link rel="stylesheet" href="//bootstrap-extension.com/css/4.6.1/bootstrap-extension.min.css" type="text/css">
<script src="//bootstrap-extension.com/js/4.6.1/bootstrap-extension.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border-radius: 10px;
  border:none;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

.error{
	color:red;
	}		
form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border-radius: 10px;
  border:none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
i.fa.fa-search{
  padding-bottom:3px;
}

</style>
</head>
<body>
<form class="example" method="POST" action="" style="margin:3px;max-width:500px">
  	<input type="text" placeholder="Search.." name="college_ipeds">
 	<button type="submit" name="search"><i class="fa fa-search"></i></button>
	<div class="container">
	<div class="row">
<?php 
	$collegename ="";
		if($_SERVER['REQUEST_METHOD']!="POST" && !isset($_POST['search']))
		{
			$college_ipeds=$_POST['college_ipeds'];
		$sel3="SELECT * FROM `hd2018` WHERE `news-feed`!=''";
		$result3=mysqli_query($con,$sel3);
		if(mysqli_num_rows($result3) > 0)
			{
            	while($row1=mysqli_fetch_assoc($result3))
				{ ?>
					<input type="checkbox" name="instnm[]" value="<?php echo $row1['UNITID']; ?>"> 
						<?php echo $row1['INSTNM']; ?>				
					<br>
			<?php
				}
			}
		}						
	else
	{
		$college_ipeds=$_POST['college_ipeds'];
		$qry="SELECT * FROM `hd2018` WHERE `news-feed`!='' AND `INSTNM` LIKE '%$college_ipeds%'";
		$result1=mysqli_query($con,$qry);
		                 		
			if(mysqli_num_rows($result1) > 0)
			{
            	while($row=mysqli_fetch_assoc($result1))
				{

	?> 
	<div class="col-sm-4">
	<div class="w3-container">
			<input type="checkbox" name="instnm[]" value="<?php echo $row['UNITID']; ?>"> <?php echo $row['INSTNM'];?>					<br>
	</div>
	</div>
	<?php					
				}
			}
	}
		?>
	</div>
  <input type="text" placeholder="email" name="email">
  <button type="submit" name="subscribe" style="padding-bottom:10px;">Subscribe</button><br>
  <span class="error"> <?php echo $emailErr; ?> </span><br>
	<span> <?php echo $Msg; ?> </span>
	</div>
</form>

</body>
</html> 
