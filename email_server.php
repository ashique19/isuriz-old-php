<?php 
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$template=$subject=$counter=$email=$emailErr="";

define("URL", "https://dev.isuriz.com/");
		define("DB_SERVER", "localhost");
		define("DB_USER", "dev_isurizdb");
		define("DB_PASS", "Qi6_un75");
		define("DB_NAME", "dev_ipeds");

$db = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

  
    if($_SERVER['REQUEST_METHOD']=="POST" && isset($_POST['send']))
    {
        $template=$_POST['template'];
        $subject=$_POST['subject'];
        $email=$_POST['email'];
        $msg=$_POST['msg'];

              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
              {
                  $emailErr = "Invalid email format";
              }
              else
              {
                  $ins="INSERT INTO MailCount(temp_id,email) VALUES ('$template','$email') ";
                  mysqli_query($db,$ins);
                    
            
                  $sele="SELECT * FROM Template WHERE temp_id='$template'";
                  $result=mysqli_query($db,$sele);
                  $row=mysqli_fetch_assoc($result);
            //print_r($row);
                  $templ=$row['templateName'];
                
                  $select="SELECT * FROM MailCount WHERE email='$email' AND temp_id='$template'";
                  $result1=mysqli_query($db,$select);
                  $results=mysqli_num_rows($result1);
            //print_r($results);
            
                  $update="UPDATE MailCount SET counter='$results' WHERE email='$email' AND temp_id='$template' ";
                  mysqli_query($db,$update);
                 
                 
            //EMAIL    
				  $msg1='<html>
	<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Email</title>
	
	<style>
		body{
    background-color: #e1e1e1;
    font-family: Arial, Helvetica, sans-serif;
}

.container{
  max-width: 680px;
  width: 100%;
  margin: auto;
}

main{
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    color: #555555; 
}

.body h2{
    font-weight: 300;
    color: #464646;
}

.logo{
    width: 150px;
    padding: 5px 5px;
}

.header-img{
    max-width: 100% !important;
    height: auto !important;
    width: 100%;
}

a{
    text-decoration: underline; 
    color: #0c99d5; 
}

.social{
	max-width: 20px;	
}
.body{
    padding: 20px;
    background-color: white;
    font-family: Geneva, Tahoma, Verdana, sans-serif; 
    font-size: 16px; 
    line-height: 22px; 
    color: #555555; 
}

button{
    background-color: #0c99d5;
    border: none;
    color: white;
    border-radius: 2px;
    height: 50px;
    max-width: 250px;
   padding: 0px 30px;
    font-weight: 500;
    font-family: Geneva, Tahoma, Verdana, sans-serif; 
    font-size: 16px;
    margin: 10px 0px 30px 0px;
}

footer{
    padding-top: 50px;
    font-family: Geneva, Tahoma, Verdana, sans-serif; 
    font-size: 14px; 
    line-height: 18px; 
    color: #738597;
    text-align: center;
}

footer img{
    width: 100px;
    margin: 24px 0px;
}

	</style>
</head>

<body>
               
    <main class="container">     
         <div class="body">
            
           <center><img src="https://dev.isuriz.com/images10/logo-isuriz.png" class="logo"></center>
		   <p style="text-align: center;color: #888888; font-weight: bold;">'. $msg .'</p>
        </div>

    <footer class="container">
        <p>Thanks for reading!</p>
		<div>
            <P><a>Legal</a> <span>•</span> <a>Privacy</a></P>
			 <p>© 2021 Isuriz, LLC. All Rights Reserved.</p>
        </div>

    </footer>
 </main>
</body>

</html>';
  				  $htmlContent = $msg1;  
				  
                  //$htmlContent .= "no of mails send ".$results;
             
                 // $htmlContent .= file_get_contents("template/$templ.html");
                     
                  $to = $email;
            
            // Set content-type header for sending HTML email
                  $headers = "MIME-Version: 1.0" . "\r\n";
                  $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            
            // Additional headers
            
                 // $headers .= 'From: <hiltweb@gmail.com>' . "\r\n";
            
            // Send email
                if(mail($to,$subject,$htmlContent,$headers)):
                    header('location: email_template.php');
                   
                else:
                    echo $errorMsg = 'Email sending fail.';
                endif;
                
                echo $htmlContent; 
                
                }

    }
     
if (isset($_POST['email_search'])) {

  		$output = "";
  		$searchh = $_POST['email_search'];
  		 $qry1="SELECT DISTINCT `email` FROM MailCount WHERE email LIKE '%$searchh%'";
        $res1=mysqli_query($db,$qry1);
       
  		if (mysqli_num_rows($res1) > 0) {
  		    while ($row=mysqli_fetch_array($res1)) {
       
             $output .= "<p>".$row['email']."<p>";
  }  }echo $output;

//$output .= '</ul>';

}
?>