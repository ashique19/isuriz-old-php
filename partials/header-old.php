
<header class="topnavbar-wrapper theme-custom-header">
<!-- START Top Navbar-->
<nav class="navbar topnavbar">
<!-- START navbar header-->
<div class="navbar-header mr-auto">
    <?php
    if (!isset($_SESSION['userid'])) {
        echo '<a class="navbar-brand" href="index.php">';
    } else {
        echo '<a class="navbar-brand" href="dashboard.php">';
    }
    ?>

    <div class="brand-logo"><img class="img-fluid" src="https://isuriz.com/images/logo.png" alt="App Logo" ></div>
    <div class="brand-logo-collapsed"><img class="img-fluid" src="images/collapse-logo.png" alt="App Logo"></div>
    </a>
</div>
<!-- END navbar header-->
<!-- START Left navbar-->
<ul class="navbar-nav mr-auto flex-row both-toggle-btn">
    <li class="nav-item">
        <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
        <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="javascript:void(0);" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a>
        <!-- Button to show/hide the sidebar on mobile. Visible on mobile only.-->
        <a class="nav-link sidebar-toggle d-md-none" href="javascript:void(0);" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a>
    </li>
    <!-- START User avatar toggle-->
    <!-- <li class="nav-item d-none d-md-block"> -->
    <!-- Button used to collapse the left sidebar. Only visible on tablet and desktops-->
    <!-- <a class="nav-link" id="user-block-toggle" href="#user-block" data-toggle="collapse"><em class="icon-user"></em></a>
    </li> -->
    <!-- END User avatar toggle-->
</ul>
<!-- END Left navbar-->

<!--user status-->
<div class="user-status">
    <?php
    $id = $_SESSION['userid'];
    $sql = "SELECT * FROM `commission` WHERE `from_id` =$id";
    $qu = mysqli_query($con, $sql);
    if (mysqli_num_rows($qu) >= 0) {
        $row = mysqli_fetch_array($qu);
        if ($row['credits'] > 4) {
            ?>    
            <!-- <em class="fa fa-user-check"></em> -->
            <i class="fas fa-user-circle"></i>
            <?php echo "<span>Premium</span> <span>Account</span>";
        } else {
            ?>
            <!-- <em class="fa fa-user"></em> -->
            <i class="fas fa-user-circle"></i>
            <?php echo "<span>Basic</span> <span>Account</span>"; ?>
        <?php }
    } ?> 
</div>   
<!--end user status-->

<!-- START Right Navbar-->
<ul class="navbar-nav flex-row topbar-links">
    <!-- Search icon-->

    <li class="nav-item"><a class="nav-link dashboard-logout" href="logout.php" data-search-open="">Logout</a></li>
    <!-- Fullscreen (only desktops)-->
    <!-- START Offsidebar button-->
</ul>
<!-- END Right Navbar-->
</nav>
<!-- END Top Navbar-->
</header>