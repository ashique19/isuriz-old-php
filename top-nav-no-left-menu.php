<header>
 	<nav class="navbar my-header-nav">
  		<div class="container-fluid">
		  	<div class="profile-header"> 
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed headernavtoggle" data-toggle="collapse">
						<span class="icon-bar top-bar"></span>
						<span class="icon-bar middle-bar"></span>
						<span class="icon-bar bottom-bar"></span>                      
					</button>
					<?php 
						if (!isset($_SESSION['userid'])) {
							echo '<a class="logo navbar-brand" href="index.php">';
						}
						else{
							echo '<a class="logo navbar-brand" href="dashboard.php">';
						}
						?>
					<div class="brand-logo"><img class="img-responsive" src="images/logo.png" alt="App logo"></div>
					</a>

				</div>
				<!--user status for desktop-->
				
				<!--end user status desktop-->
				<?php
				if (!isset($_SESSION['userid'])) {
					}
					else{
				?>
				<div class="collapse navbar-collapse" id="myNavbar2">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="logout.php" class="nav-logout"><i class="fa fa-sign-out pr-3 d-none"></i> Logout </a> </li>
					</ul>
				</div>
				<?php
					}
				?>
			</div>
  		</div>
	</nav>
</header>