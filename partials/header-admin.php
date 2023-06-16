
<header class="main-header navbar navbar-dark justify-content-center fixed-top text-uppercase square-border px-0 bg-dark">
  <div class="container-fluid justify-content-md-between d-flex flex-wrap align-items-center px-4 xs-padding-5">


      <?php
      if (!isset($_SESSION['userid'])) { ?>
          <a href="/dashboard.php" class="d-flex align-items-center col-4 col-md-2 mb-md-0 text-dark text-decoration-none p-0">
              <img src="/img/logo.png" alt="ISURIZ" class="logo">
          </a>
      <?php
      } else {?>
      
        <a href="/" class="d-flex align-items-center col-4 col-md-2 mb-md-0 text-dark text-decoration-none p-0">
            <img src="/img/logo.png" alt="ISURIZ" class="logo">
        </a>
        <?php
      }
      ?>
      
      

      <div class="col-8 col-md-10 d-flex align-items-center p-0">
        <div class="d-flex collapse navbar-collapse p-0 justify-content-end" id="main-nav">

          <ul class="nav col-md-2 text-end justify-content-end p-0">
          
            <li class="nav-item">
            

            
              <a href="#" class="btn dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg role="presentation" width="32" height="32" viewBox="0 0 32 32" title="Account-i10n"><title>Account-i10n</title><g fill="none" fill-rule="evenodd"><path d="M0 0h32v32H0z"></path><path d="M16 6a6 6 0 100 12 6 6 0 000-12zm0 2a4 4 0 110 8 4 4 0 010-8z" fill="#FFF" fill-rule="nonzero"></path><path d="M27 27c0-4.97-4.925-9-11-9S5 22.03 5 27" stroke="#FFF" stroke-width="2" stroke-linecap="round"></path></g></svg>
                <i class="fas fa-caret-up"></i>
              </a>

              <div class="dropdown-menu mini" aria-labelledby="navbarDropdown">
                <a class="dropdown-item mb-3" href="#">
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
                </a>
                <a class="dropdown-item mb-1" href="/dashboard.php">Dashboard</a>
                <a class="dropdown-item mb-1" href="/logout.php">Logout</a>
              </div>
            </li>

            <li class="nav-item d-block d-sm-none" style="width: 50px; height: 40px;">
              <button style="margin: 8px !important; background: black; padding: 4px 12px;" class="sidebar-toggle d-block d-sm-none border-light m-1" type="button"  data-toggle-state="aside-toggled" data-no-persist="true">
                <i class="fas fa-bars text-light"></i>
              </button>
            </li>
            
            <!-- <li class="nav-item">
              <a href="#" class="btn dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <svg role="presentation" width="32" height="32" viewBox="0 0 32 32" aria-label="open cart" title="Cart-i10n"><title>Cart-i10n</title><g fill="none"><g><path d="M0 0H32V32H0z" transform="translate(-269 -537) translate(269 537)"></path><g transform="translate(-269 -537) translate(269 537) translate(4 6)"><g><path stroke="#FFF" stroke-linecap="round" stroke-width="2" d="M7.736 2.047h15.675c.165 0 .3.135.3.3 0 .024-.003.048-.009.071l-2.676 10.99c-.032.135-.153.23-.291.23H6.975c-.131 0-.247-.085-.286-.21L2.519.21C2.48.085 2.364 0 2.233 0H0h0"></path><circle cx="18.75" cy="19.043" r="1.75" fill="#FFF"></circle></g><circle cx="8.75" cy="19.043" r="1.75" fill="#FFF"></circle></g></g></g></svg>
                <i class="fas fa-caret-up"></i>
              </a>
              <div class="dropdown-menu mini" aria-labelledby="navbarDropdown">
                <a class="dropdown-item mb-3" href="#">Action</a>
                <a class="dropdown-item mb-1" href="#">Another action</a>
              </div>
            </li> -->
            
          </ul>
        </div>
      </div>

      

    </div>
</header>
