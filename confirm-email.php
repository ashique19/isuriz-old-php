<?php include('news-feed-email.php') ?>
<?php 
	
	function redirect() {
		header('Location: news-feed-email.php');
		exit();
	}

	if (!isset($_GET['email']) || !isset($_GET['token'])) {
		redirect();
	} else {
	$email = $_GET['email'];
		$token = $_GET['token'];
		
		$sql1 = "SELECT id FROM users WHERE email='$email' AND token='$token' AND isEmailConfirmed=0";
		$res1 = mysqli_query($con,$sql1);
		if ($row1=mysqli_num_rows($res1)) {
			$up="UPDATE users SET isEmailConfirmed=1, token='' WHERE email='$email'";
			$res2= mysqli_query($db,$up);
			echo 'Your email has been verified! You can log in now!';
		} 
		redirect();
	
	?>