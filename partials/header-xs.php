<ul class="nav col-8 px-0 text-right  d-flex d-sm-none justify-content-end align-items-center">
    <?php 
            
      if ( isset($_SESSION['userid'])) {  

        $directoryURI = $_SERVER['REQUEST_URI'];
        $path = parse_url($directoryURI, PHP_URL_PATH);
        $components = explode('/', $path);
        $first_part = $components[1];

    
    ?>
    <li class="nav-item">
      <a href="/dashboard-updateprofile.php" class="btn dropdown">
        <span class="fa fa-cog fs-4 text-white pt-2"></span>
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
        <a class="dropdown-item mb-3" href="/dashboard.php">Dashboard</a>
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
        <span class="cart-number number position-absolute text-info rounded-pill bg-white px-1">0</span>
      </a>
      <div class="dropdown-menu mini p-0 cart-dropdown-menu" aria-labelledby="navbarDropdown">
        
        <div class="d-grid gap-2 p-0">
          <span class="btn btn-info btn-2 square-border">YOUR CART</span>
          <a href="#" class="btn dropdown cart-dropdown cart-close btn-light" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa fa-times"></i>
          </a>
        </div>
        
        <div class="cart-items"></div>

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

    <?php if ( ! isset($_SESSION['userid'])) {  ?>
    <li class="nav-item">
      <button class="navbar-toggler d-block d-sm-none border-light m-1" type="button" data-bs-toggle="collapse" data-bs-target="#xs-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars text-light"></i>
      </button>
    </li>
    <?php } ?>
</ul>

<div class="collapse text-light bg-dark xs-nav" id="xs-nav">
  <div class="col-xs-12 d-flex justify-content-end">
    
      <button class="navbar-toggler d-block d-sm-none m-3 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#xs-nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-times fa-2x text-light"></i>
      </button>
    
  </div>

  <div class="col-xs-12">
    <ul class="list-group">
      <li class="list-group-item bg-dark my-3">
        <!-- <a href="#" class="text-light text-decoration-none fs-5">Micro-Internships <i class="fas fa-angle-right"></i> </a> -->
        <a href="#" class="text-light text-decoration-none fs-5"  type="button" data-bs-toggle="collapse" data-bs-target="#xs-sub-nav-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Micro-Internships <i class="fas fa-angle-right"></i> </a>
      </li>
      <li class="list-group-item bg-dark my-3">
        <a href="#" class="text-light text-decoration-none fs-5"  type="button" data-bs-toggle="collapse" data-bs-target="#xs-sub-nav-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">College List Builder <i class="fas fa-angle-right"></i> </a>
      </li>
      <li class="list-group-item bg-dark my-3">
        <a href="#" class="text-light text-decoration-none fs-5"  type="button" data-bs-toggle="collapse" data-bs-target="#xs-sub-nav-3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">College Counselor Hub <i class="fas fa-angle-right"></i> </a>
      </li>
      <!-- <li class="list-group-item bg-dark my-3">
        <div class="buttons dropdown mt-2">
          <div class="compact d-flex align-items-center" role="group" aria-label="Basic example">
            <i class="fas fa-search"></i>
            <input type="text" class="form-control btn text-white border-0 text-start" value="FIND A COLLEGE" placeholder="FIND A COLLEGE">
          </div>
        </div>
      </li> -->
    </ul>
  </div>

  
</div>

<div class="collapse text-light bg-dark xs-nav" id="xs-sub-nav-1">
  <div class="d-flex">
    <div class="col-6 d-flex justify-content-start">
      
        <button class="navbar-toggler d-block d-sm-none m-3 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#xs-sub-nav-1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-angle-left fa-2x text-light"></i>
        </button>
        
      </div>
  </div>

  <div class="col-xs-12">
    <ul class="list-group">
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/micro-internship.php">Micro-Internships Overview </a></li>
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/HUMAN-RESOURCES-MICRO-INTERNSHIPS.php">Human Resources Micro-Internship</a></li>
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/Accounting-Micro-Internships.php">Accounting Micro-Internship</a></li>
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/Architecture-Micro-Internships.php">Architecture Micro-Internship</a></li>
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/Information-Technology-Micro-Internships.php">Information Technology Micro-Internship</a></li>
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/ask-a-question.php">Ask a Question</a></li>
      
    </ul>
  </div>
</div>

<div class="collapse text-light bg-dark xs-nav" id="xs-sub-nav-2">
  <div class="d-flex">
    <div class="col-6 d-flex justify-content-start">
      
        <button class="navbar-toggler d-block d-sm-none m-3 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#xs-sub-nav-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-angle-left fa-2x text-light"></i>
        </button>
        
      </div>
  </div>

  <div class="col-xs-12">
    <ul class="list-group">
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/college-list-builder.php">College List Builder Overview</a></li>
      <!-- <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/college-list-builder.php">Find Colleges</a></li> -->
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="/guest_form.php">Build a College List</a></li>
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="#"  data-bs-toggle="modal" data-bs-target="#estimate-chance-of-acceptance">Estimated Chance of Acceptance</a></li>
      <li class="list-group-item bg-dark my-3"><a class="text-light text-decoration-none fs-5" href="#"  data-bs-toggle="modal" data-bs-target="#balance-college-list">Balance College List</a></li>
      <li class="list-group-item bg-dark my-3">
        <a class="text-light text-decoration-none fs-5" href="#" data-bs-toggle="collapse" data-bs-target="#find-college-nav-2" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">Find A College By Name</a>
        <form class="col-12 collapse" id="find-college-nav-2" method="POST" action="/guest_college-search.php">
          <div class="btn d-flex btn-info p-0 rounded-pill overflow-hidden" role="group" aria-label="Basic example">
            <input name="btnsearchschoolname" type="hidden" />
            <button type="submit" class="btn btn-info border-top-0 border-start-0 border-bottom-0"><i class="fas fa-search"></i></button>
            <input type="text" name="search_schoolname" class="form-control btn btn-info text-white border-0 height-52 text-start" value="FIND A COLLEGE BY NAME" >
          </div>
        </form>
        <div class="col-12 bg-info school-search-result position-absolute top-100" aria-labelledby="dropdownMenuClickableInside"></div>
      </li>
      
      
    </ul>
  </div>
</div>

<div class="collapse text-light bg-dark xs-nav" id="xs-sub-nav-3">
  <div class="d-flex">
    <div class="col-6 d-flex justify-content-start">
      
        <button class="navbar-toggler d-block d-sm-none m-3 border-0" type="button" data-bs-toggle="collapse" data-bs-target="#xs-sub-nav-3" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-angle-left fa-2x text-light"></i>
        </button>
        
      </div>
  </div>

  <div class="col-xs-12">
    <ul class="list-group">
      <li class="list-group-item bg-dark my-3"><a href="/college-counselor-hub.php" class="text-light text-decoration-none fs-5">College Counselor Hub Overview</a></li>
      <li class="list-group-item bg-dark my-3"><a href="/College-Admissions-Planning-Assistance.php" class="text-light text-decoration-none fs-5">College Admission Planning Assistance</a></li>
      <li class="list-group-item bg-dark my-3"><a href="/College-Applications-Assistance.php" class="text-light text-decoration-none fs-5">College Application Assistance</a></li>
      <li class="list-group-item bg-dark my-3"><a href="/College-Essays-Assistance.php" class="text-light text-decoration-none fs-5">College Essay Assistance</a></li>
      <li class="list-group-item bg-dark my-3"><a href="/College-Affordability-Assistance.php" class="text-light text-decoration-none fs-5">College Affordability Assistance</a></li>
      
    </ul>
  </div>
</div>

