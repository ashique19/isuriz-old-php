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
			$sel2="SELECT * FROM `news-feed-subscription` WHERE isEmailConfirmed='1'";
			$res3=mysqli_query($con,$sel2);
			?>
<table>
	<th>
	<tr> </tr>
		<tr> College Id </tr>
	<tr> Email </tr>
	</th>
	<tr>
	<?php if(mysqli_num_rows($res3) > 0)
			{
				while($row3=mysqli_fetch_assoc($res3))
				{ ?><td>
					<input type="checkbox" name="instnm[]" value="<?php echo $row3['id']; ?>"> 
						<?php echo $row3['college_ipeds']; ?>
	</input></td>
<td>
	<?php echo $row3['email']; ?>
</td>
		   <?php
				}
			}
			
?>
</tr>