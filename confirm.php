<?php 

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
		
		$email = $_GET['email'];
        $token = $_GET['token'];
        $sel2="SELECT * FROM `news-feed-subscription` WHERE token='$token' AND email='$email' AND isEmailConfirmed='0'";
        $res3=mysqli_query($con,$sel2);
		 if ($res3) 
        {
            $up1="UPDATE `news-feed-subscription` SET isEmailConfirmed='1' WHERE email='$email'";
            $res4=mysqli_query($con,$up1);
            echo '
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
					<body style="background-color:#ffffff;">
				   <div style="text-align:center;color:#447a9c;padding:0px;margin:0px;">
					<h1>
					
					<br>
					<img src="thank_yaa.png" style="width:50%;">
					</h1><br><h1 style="padding-top:0px;margin-top:0px;font-size:40px;"> For The Subscription
					</h1>
					<button class="btn form-group btn-primary" style="margin-top:15px;box-shadow: 1px 2px 10px #007bff;"><a style="color:#ffffff;" href="college-news-subscription.php">Go Back</a></button>  
		           </div>
				  </body>';
        }

    
        
       


?>