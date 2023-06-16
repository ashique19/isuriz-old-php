<?php 

use PHPMailer\PHPMailer\PHPMailer;

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include('includes/config.php');

$feed_news= "";

$sql = "SELECT * FROM `news-feed-subscription` where isEmailConfirmed = 1 ORDER BY `news-feed-subscription`.`id` ASC";
$result = $con->query($sql);
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_array()) {
  	//print_r($row);
    $fname = $row['fname'];
    $lname = $row['lname'];
    $email = $row['email'];
    $college_ipeds = $row['college_ipeds'];
    $news_detail = getHdDetail($college_ipeds);
	$feed_news = $news_detail['feed-news'];
	
	$college_iped= explode(',',$college_ipeds);
	foreach($college_iped as $value)
	  {
		  echo $value."<br>";
		  if(!empty($feed_news) && $value == $news_detail)
		  {
			  $xml=simplexml_load_file($feed_news);
			  print_r($xml);
		  }
		
		
		
	  }
	 
	  
	  
    include_once "PHPMailer/PHPMailer.php";
	//print_r($email);

	$htmlContent = "<html>
					<body style='background-color:#eeeeee;font-family:Times New Roman;'>
					<div style='padding-left:20px;padding-right:20px;background-color:#ffffff;'>
					<h1 style='color:black;text-align:center;'>NEWSLETTER</h1>
					<h3 style='font-weight:400'></h3>	
					<h2> Thank You </h2>
					</div>
					</body>
					</html>";
            
			 $to = $email;
			 $headers = new PHPMailer();
			 $headers = "MIME-Version: 1.0" . "\r\n";
			$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
			// $htmlContent .=$inst;
			 $subject = "Today's News";
					//msg .= " <a href='https://dev.isuriz.com/confirmed.php?email=$email&token=$token'>Click Here</a>";
			 if(mail($subject,$htmlContent,$headers)):
         			
               else:
                   echo $errorMsg = 'Email sending fail.';
                endif;
                
              //  echo $htmlContent; 
			}    
			   }


?>
<?php

function getHdDetail($college_ipeds) {
    global $con;
    $sql1 = "SELECT * FROM `hd2018` WHERE UNITID='" . $college_ipeds . "' ";
    $result1 = $con->query($sql1);

    if ($result1->num_rows > 0) {
        // output data of each row
        $row = $result1->fetch_assoc();
        return $row;
    }
}
?>



