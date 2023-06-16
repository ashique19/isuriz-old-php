
<header class="main-header navbar navbar-dark justify-content-center fixed-top text-uppercase square-border px-0 bg-dark">
  <div class="container-fluid justify-content-md-between d-flex flex-wrap align-items-center px-4 xs-padding-5">

      <a href="<?php echo( isset($_SESSION['userid']) ? 'dashboard.php' : '/' ); ?>" class="d-flex align-items-center col-4 col-md-2 mb-md-0 text-dark text-decoration-none p-0">
          <img src="/img/logo.png" alt="ISURIZ" class="logo">
      </a>
      

      <div class="col-md-10 d-flex align-items-center d-none d-sm-block p-0">
        <div class="d-flex collapse navbar-collapse p-0" id="main-nav">

          <ul class="nav col-12 col-md-10 mb-2 justify-content-center mb-md-0 p-0 balance-it">
            <?php if (! isset($_SESSION['userid'])) {  ?>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link px-2 text-white dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Micro-Internships
                  <i class="fas fa-angle-down"></i>
                  <i class="fas fa-angle-up"></i>
                  <i class="fas fa-caret-up"></i>
                </a>
                <section class="dropdown-menu" aria-labelledby="navbarDropdown" data-bs-auto-close="outside">
                  <div class="sub-menu-container d-flex">
                    <div class="col-sm-5 left-side">

                      <img class="my-2" src="/img/value.jpeg" alt="" width="100%">

                    </div>
                    <div class="col-sm-7 bg-offwhite right-side">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="/micro-internship.php">Micro-Internships Overview</a></li>
                          <li class="list-group-item"><a href="/HUMAN-RESOURCES-MICRO-INTERNSHIPS.php">Human Resources Micro-Internship</a></li>
                          <li class="list-group-item"><a href="/Accounting-Micro-Internships.php">Accounting Micro-Internship</a></li>
                          <li class="list-group-item"><a href="/Architecture-Micro-Internships.php">Architecture Micro-Internship</a></li>
                          <li class="list-group-item"><a href="/Information-Technology-Micro-Internships.php">Information Technology Micro-Internship</a></li>
                          <li class="list-group-item"><a href="/ask-a-question.php">Ask a Question</a></li>
                        </ul>
                    </div>
                  </div>
                </section>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link px-2 text-white dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                  College List Builder
                  <i class="fas fa-angle-down"></i>
                  <i class="fas fa-angle-up"></i>
                  <i class="fas fa-caret-up"></i>
                </a>
                <section class="dropdown-menu" aria-labelledby="navbarDropdown">
                  
                  <div class="sub-menu-container d-flex">
                    <div class="col-sm-5 left-side">

                      <img class="my-2" src="/img/nav/college-list-builder.png" alt="" width="100%">

                    </div>
                    <div class="col-sm-7 bg-offwhite right-side">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="/college-list-builder.php">College List Builder Overview</a></li>
                          <li class="list-group-item"><a href="/guest_form.php">Build a College List</a></li>
                          <li class="list-group-item"><a href="#"  data-bs-toggle="modal" data-bs-target="#estimate-chance-of-acceptance">Estimated Chance of Acceptance</a></li>
                          <li class="list-group-item"><a href="#"  data-bs-toggle="modal" data-bs-target="#balance-college-list">Balance College List</a></li>
                          <li class="list-group-item">
                            <a href="#" data-bs-toggle="collapse" data-bs-target="#find-college-nav-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Find A College By Name</a>
                            <form class="col-12 collapse" id="find-college-nav-1" method="POST" action="/guest_college-search.php">
                              <div class="btn d-flex btn-info p-0 rounded-pill overflow-hidden" role="group" aria-label="Basic example">
                                <input name="btnsearchschoolname" type="hidden" />
                                <button type="submit" class="btn btn-info border-top-0 border-start-0 border-bottom-0"><i class="fas fa-search"></i></button>
                                <input type="text" name="search_schoolname" class="text-start form-control btn btn-info text-white border-0 height-52" value="FIND A COLLEGE BY NAME">
                              </div>
                            </form>
                            <div class="col-12 bg-info school-search-result position-absolute top-100" aria-labelledby="dropdownMenuClickableInside"></div>
                          </li>
                          <!-- <li class="list-group-item"><a href="/Create-a-Profile.php">Create a Profile</a></li> -->
                        </ul>
                    </div>
                  </div>
                </section>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link px-2 text-white dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  College Counselor Hub
                  <i class="fas fa-angle-down"></i>
                  <i class="fas fa-angle-up"></i>
                  <i class="fas fa-caret-up"></i>
                </a>
                <section class="dropdown-menu" aria-labelledby="navbarDropdown" data-bs-auto-close="outside">
                  
                  <div class="sub-menu-container d-flex">
                    <div class="col-sm-5 left-side">

                      <img class="my-2" src="/img/1.jpeg" alt="" width="100%">

                    </div>
                    <div class="col-sm-7 bg-offwhite right-side">
                        <ul class="list-group">
                          <li class="list-group-item"><a href="/college-counselor-hub.php">College Counselor Hub Overview</a></li>
                          <li class="list-group-item"><a href="/College-Admissions-Planning-Assistance.php">College Admission Planning Assistance</a></li>
                          <li class="list-group-item"><a href="/College-Applications-Assistance.php">College Application Assistance</a></li>
                          <li class="list-group-item"><a href="/College-Essays-Assistance.php">College Essay Assistance</a></li>
                          <li class="list-group-item"><a href="/College-Affordability-Assistance.php">College Affordability Assistance</a></li>
                        </ul>
                    </div>
                  </div>
                </section>
              </li>

            <?php } ?>
          </ul>

          <ul class="nav col-md-2 text-end justify-content-end p-0">
            <?php 
            
              if ( isset($_SESSION['userid'])) {  

                $directoryURI = $_SERVER['REQUEST_URI'];
                $path = parse_url($directoryURI, PHP_URL_PATH);
                $components = explode('/', $path);
                $first_part = $components[1];

            
            ?>
            <li class="nav-item">
              <a href="/dashboard-updateprofile.php" class="btn dropdown">
                <span class="fa fa-cog fs-5 text-white pt-2"></span>
                <i class="fas fa-caret-up"></i>
              </a>
            </li>
            <?php } ?>
            <li class="nav-item">
              <a href="#" class="btn dropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <svg role="presentation" width="32" height="32" viewBox="0 0 32 32" title="Account-i10n"><title>Account-i10n</title><g fill="none" fill-rule="evenodd"><path d="M0 0h32v32H0z"></path><path d="M16 6a6 6 0 100 12 6 6 0 000-12zm0 2a4 4 0 110 8 4 4 0 010-8z" fill="#FFF" fill-rule="nonzero"></path><path d="M27 27c0-4.97-4.925-9-11-9S5 22.03 5 27" stroke="#FFF" stroke-width="2" stroke-linecap="round"></path></g></svg>
                <i class="fas fa-caret-up"></i>
              </a>
              <div class="dropdown-menu mini" aria-labelledby="navbarDropdown">
                <?php if (isset($_SESSION['userid'])) {  ?>
                <a class="dropdown-item mb-1" href="/logout.php">Logout</a>
                <?php } else{ ?>
                <a class="dropdown-item mb-3" href="/login.php">Login</a>
                <a class="dropdown-item mb-1" href="/signup.php">Sign up</a>
                <?php } ?>
              </div>
            </li>
            
            <li class="nav-item">
              <a href="#" class="btn dropdown position-relative cart-dropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                <svg role="presentation" width="32" height="32" viewBox="0 0 32 32" aria-label="open cart" title="Cart-i10n"><title>Cart-i10n</title><g fill="none"><g><path d="M0 0H32V32H0z" transform="translate(-269 -537) translate(269 537)"></path><g transform="translate(-269 -537) translate(269 537) translate(4 6)"><g><path stroke="#FFF" stroke-linecap="round" stroke-width="2" d="M7.736 2.047h15.675c.165 0 .3.135.3.3 0 .024-.003.048-.009.071l-2.676 10.99c-.032.135-.153.23-.291.23H6.975c-.131 0-.247-.085-.286-.21L2.519.21C2.48.085 2.364 0 2.233 0H0h0"></path><circle cx="18.75" cy="19.043" r="1.75" fill="#FFF"></circle></g><circle cx="8.75" cy="19.043" r="1.75" fill="#FFF"></circle></g></g></g></svg>
                <i class="fas fa-caret-up"></i>
                <span class="cart-number number position-absolute text-info rounded-pill bg-white px-1">2</span>
              </a>
              <div class="dropdown-menu mini cart-items p-0" aria-labelledby="navbarDropdown">
                

                <div class="d-grid gap-2 p-0">
                  <hr class="mb-0">
                  <p class="text-left px-3 mb-0">
                    <b>Order Total:</b>
                    <b class="float-end">
                      $<span class="cart-total"></span>
                    </b>
                  </p>
                  <a href="/checkout.php" class="btn btn-info btn-2 square-border">CHECKOUT</a>
                </div>
              </div>
            </li>
            
          </ul>
        </div>
      </div>

      

      <?php include('header-xs.php');?>

    </div>
</header>

<!-- Modal -->
<div class="modal fade" id="estimate-chance-of-acceptance" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <!-- <h5 class="modal-title" id="estimate-chance-of-acceptance-label">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-4">
        <h4 class="text-3 text-center">
        Easily estimated your chances of acceptance after selecting the colleges you want to be on your college list. Click below to see a preview.
        </h4>
        <p class="text-center pt-4">
          <a href="#" data-bs-toggle="modal" data-bs-target="#estimate-chance-of-acceptance-preview" class="btn btn-info rounded-pill">PREVIEW</a>
        </p>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="estimate-chance-of-acceptance-preview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <!-- <h5 class="modal-title" id="estimate-chance-of-acceptance-label">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-4">
        <img src="/img/9.png" alt="estimate-chance-of-acceptance-preview" class="img-fluid shadow">
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="balance-college-list" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <!-- <h5 class="modal-title" id="balance-college-list-label">Modal title</h5> -->
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-4">
        <h4 class="text-3 text-center">
        After your schools are organized by likelihood of acceptance, you can receive customized recommendations on how many schools should be in each category of your list. Click below to see a preview.
        </h4>
        <p class="text-center pt-4">
          <a href="#" data-bs-toggle="modal" data-bs-target="#balance-college-list-preview" class="btn btn-info rounded-pill">PREVIEW</a>
        </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="balance-college-list-preview" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body mb-4">
        <img src="/img/11.png" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</div>