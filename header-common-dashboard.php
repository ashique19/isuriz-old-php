<?php
$userid = $_SESSION['userid'];
$usertype = $_SESSION['usertype'];
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <title>Isuriz</title>
        <!-- =============== VENDOR STYLES ===============-->
        <!-- FONT AWESOME-->
        <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/brands.css">
        <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/regular.css">
        <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/solid.css">
        <link rel="stylesheet" href="vendor/%40fortawesome/fontawesome-free/css/fontawesome.css">
        <!-- SIMPLE LINE ICONS-->
        <link rel="stylesheet" href="vendor/simple-line-icons/css/simple-line-icons.css">
        <!-- ANIMATE.CSS-->
        <link rel="stylesheet" href="vendor/animate.css/animate.css">
        <!-- WHIRL (spinners)-->
        <link rel="stylesheet" href="vendor/whirl/dist/whirl.css">
        <!-- =============== PAGE VENDOR STYLES ===============-->
        <!-- WEATHER ICONS-->
        <link rel="stylesheet" href="vendor/weather-icons/css/weather-icons.css">
        <!-- =============== BOOTSTRAP STYLES ===============-->
        <link rel="stylesheet" href="css/bootstrap.css" id="bscss">
        <!-- =============== APP STYLES ===============-->

        <link rel="stylesheet" href="css/app.css" id="maincss">
        <link rel="stylesheet" href="css/dashboard.css" >
        <link rel="stylesheet" href="css/site.css" id="maincss">
        <style>
			.mx-2{
				display: none;
			}
            .modal{
                background:rgba(0,0,0,0.5) !important;
            }
            .modal-backdrop{
                position:relative !important;
            }
            @media only screen and (max-width: 767px) {
                .card-body .h1,.card-body .h2{
                    font-size:20px;
                }
                .card-body .text-xs{
                    font-size:12px;
                    line-height:20px;
                }
                .card-body i{
                    font-size:1.5rem;
                }
                .dashboard-statics-counter .col-xl-3.col-md-6.mb-4{
                    padding-left:20px;
                    padding-right:20px;
                }
            }
            .slick-list{
                display:grid !important;
            }
            .topnavbar .dropdown .dropdown-menu-right {
                overflow-x: hidden;
                width: 100%;
                max-height: 300px;
                overflow-y: auto; 
            }
        </style>

    </head>
    <body>
        <div class="wrapper">
            <!-- top navbar-->
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
                            <a class="nav-link d-none d-md-block d-lg-block d-xl-block" href="javascript:void(0);" data-trigger-resize="" data-toggle-state="aside-collapsed"><em class="fas fa-bars"></em></a>
                            <a class="nav-link sidebar-toggle d-md-none" href="javascript:void(0);" data-toggle-state="aside-toggled" data-no-persist="true"><em class="fas fa-bars"></em></a>
                        </li>
                    </ul>
                    <!-- END Left navbar-->

                    <!-- notification alert section -->
                    <div class="header-notification">
                        <ul class="m-0 p-0 d-flex">
                            <?php if (isset($usertype) && $usertype == "College_Counselor") { ?>
                                <li class="nav-item dropdown no-arrow mx-1 mx-2" id="dropdownAlerts">
                                    <a data-toggle="tooltip" data-placement="top" title="My Student List" class="nav-link dropdown-toggle" href="my-student-list.php" id="alertsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-check"></i><span class="basic_account_under_icons d-none">My Student List</span>
                                    </a>
                                </li>
                            <?php } else { ?>
                                <li class="nav-item dropdown no-arrow mx-1 mx-2" id="dropdownAlerts">
                                    <a data-toggle="tooltip" data-placement="top" title="My College Counselors" class="nav-link dropdown-toggle" href="my-counselor-list.php" id="alertsDropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-user-check"></i><span class="basic_account_under_icons d-none">My College Counselors</span>
                                    </a>
                                </li>
                            <?php } ?>
                            <li class="nav-item dropdown no-arrow mx-1 mx-2" id="dropdownAlerts">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-envelope fa-fw"></i><span class="basic_account_under_icons d-none">My Messages</span>
                                    <span class="badge badge-danger badge-counter">
                                        <?php echo (isset($total_request)) ? $total_request : '0'; ?>
                                    </span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in last-nav" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">Messages</h6>
                                    <?php
                                    foreach ($result_req_msg as $key => $value) {
                                        $id = $value['Id'];
                                        $from_id = $value['from_id'];
                                        $message = $value['message'];
                                        $dismiss = $value['dismiss'];
                                        $date_ = $value['date'];
                                        $date1 = new DateTime($date_);
                                        $currentDate = date('Y-m-d H:i:s');
                                        $date2 = $date1->diff(new DateTime($currentDate));
                                        ?>
                                        <a class="dropdown-item d-flex align-items-center dropdownAlertsItem" href="#"
                                           data-id="<?php echo $id; ?>">
                                            <!-- <div class="dropdown-list-image mr-3">
                                                <img class="rounded-circle" src="https://source.unsplash.com/fn_BT9fwg_E/60x60"
                                                     alt="">
                                                 <div class="status-indicator bg-success"></div> 
                                            </div>-->
                                            <div class="<?php echo ($dismiss == 0) ? 'font-weight-bold' : ''; ?>">
                                                <div class="text-truncate"><?php echo $message; ?></div>
                                                <div class="small text-gray-500"><?php
                                                    $infoD = get_user_info($from_id);
                                                    echo $infoD['name'];
                                                    ?> .
                                                    <?php
                                                    if (!empty($date2->s)) {
                                                        $res_date = $date2->s . ' seconds';
                                                    }
                                                    if (!empty($date2->i)) {
                                                        $res_date = $date2->i . ' minutes';
                                                    }
                                                    if (!empty($date2->h)) {
                                                        $res_date = $date2->h . ' hours';
                                                    }
                                                    if (!empty($date2->d)) {
                                                        $res_date = $date2->d . ' days';
                                                    }
                                                    if (!empty($date2->m)) {
                                                        $res_date = $date2->m . ' months';
                                                    }
                                                    if (!empty($date2->y)) {
                                                        $res_date = $date2->y . ' years';
                                                    }
                                                    if (isset($res_date)) {
                                                        echo $res_date . " ago";
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </a>

                                        <?php
                                    }
                                    ?>
                                    <div class="d-flex justify-content-center msg-view-all">
                                        <a href="message.php">View all</a>
                                    </div>
                                </div>

                            </li>

                        </ul>
                    </div>
                    <!-- end notification alert section -->

                    <!--user status-->
                    <!-- <div class="user-status">
                        <?php
                        $id = $_SESSION['userid'];
                        $sql = "SELECT * FROM `commission` WHERE `from_id` =$id";
                        $qu = mysqli_query($con, $sql);
                        if (mysqli_num_rows($qu) >= 0) {
                            $row = mysqli_fetch_array($qu);
                            if ($row['credits'] > 4) {
                                ?>                                   
                                <i class="fas fa-user-circle"></i>
                                <?php
                                echo "<span>Premium</span> <span>Account</span>";
                            } else {
                                ?>                                
                                <i class="fas fa-user-circle"></i>
                                <?php echo "<span>Basic</span> <span>Account</span>"; ?>
                                <?php
                            }
                        }
                        ?> 
                    </div>   --> 
                    <!--end user status-->

                    <!-- START Right Navbar-->
                    <ul class="navbar-nav flex-row topbar-links">
                        <li class="nav-item"><a class="nav-link dashboard-logout" href="logout.php" data-search-open="">Logout</a></li>
                    </ul>
                    <!-- END Right Navbar-->
                </nav>
                <!-- END Top Navbar-->
            </header>
            <!-- sidebar-->
            <aside class="aside-container">
                <!-- START Sidebar (left)-->
                <div class="aside-inner">
                    <?php include 'counselor-das-sidebar.php'; ?>
                </div>
                <!-- END Sidebar (left)-->
            </aside>
            <section class="section-container">
                <!-- Page content-->
                <div class="content-wrapper">