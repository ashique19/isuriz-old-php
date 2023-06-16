<?php


include('partials/layout-pre.php');
?>

<section class="row m-0 p-0">
    <section class="col-12 m-0 p-0 bg-dark">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/home-slider/slide-1.png" class="d-block w-100" alt="...">
            <span class="shadow-2 d-flex row m-0">
              <h1 class="col-12">
                Micro-Internships
              </h1>
              <p class="slide-text col-12">The answer that high school students have been looking for to research different career paths and gain valuable insight at a fair price.</p>
              <p class="buttons col-12">
                <a href="/micro-internship.php" class="btn btn-lg rounded-pill btn-info me-3 text-uppercase">Explore Micro-Internships</a>
              </p>

            </span>

            <div class="control">
              <button style="display: none;" class="btn text-light play"><i class="far fa-play-circle"></i></button>
              <button style="display: none;" class="btn text-light pause"><i class="far fa-pause-circle"></i></button>
              <button style="display: none;" class="btn text-light mute"><i class="fas fa-volume-mute"></i></button>
              <button style="display: none;" class="btn text-light volume"><i class="fas fa-volume-up"></i></button>
            </div>
          </div>
          <div class="carousel-item">
            <img src="/img/home-slider/slide-2.png" class="d-block w-100" alt="...">
            <span class="shadow-2 d-flex row m-0">
              <h1 class="col-12">
                College List Builder
              </h1>
              <p class="slide-text col-12">
                Leverage one of the best databases to build a college list with over 6,800 schools, and over 3,000,000 records and get a perspective on likelihood of acceptance at certain colleges.
              </p>
              <p class="buttons col-12">
                <a href="/college-list-builder.php" class="btn btn-lg rounded-pill btn-info me-3 text-uppercase">Explore College List Builder</a>
              </p>

            </span>
          </div>
          <div class="carousel-item">
            <img src="/img/home-slider/slide-3.png" class="d-block w-100" alt="...">
            <span class="shadow-2 d-flex row m-0">
              <h1 class="col-12">
                College Counselor Hub
              </h1>
              <p class="slide-text col-12">Changing the college counseling landscape with predefined flexible solutions for budget-oriented individuals.</p>
              <p class="buttons col-12">
                <a href="/college-counselor-hub.php" class="btn btn-lg rounded-pill btn-info me-3 text-uppercase">Explore College Counselor Hub</a>
              </p>

            </span>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
          <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
          <svg viewBox="0 0 26 19" role="img" width="70px" style="transform: rotate3d(0, 0, 1, 90deg);"><title>Chevron</title><path d="M13 12.49l-8-8M21 4.49l-8.35 8.35" style="stroke: white;"></path></svg>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
          <svg viewBox="0 0 26 19" role="img" width="70px" style="transform: rotate3d(0, 0, 1, -90deg);"><title>Chevron</title><path d="M13 12.49l-8-8M21 4.49l-8.35 8.35" style="stroke: white;"></path></svg>
          <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
          <span class="visually-hidden">Next</span>
        </button>
      </div>
  </section>
</section>

<div class="container py-3 d-flex justify-content-center">
  <div class="col-sm-10 d-flex justify-content-between">

    <a href="/micro-internship.php" class="col-sm-3 col-md-3 col-4 py-3 px-1 text-decoration-none text-dark">
      <div class="card shadow bg-body rounded">
        <span class="hover-effect-1 d-block overflow-hidden">
          <img src="/img/value.jpeg" class="card-img-top" alt="...">
          <!-- <img src="/img/nav/college-counselor-hub.jpeg" class="card-img-top" alt="..."> -->
        </span>
        <div class="card-body py-1 px-1">
          <h5 class="card-title text-center title-2">MICRO-INTERNSHIPS </h5>
        </div>
      
      </div>
    </a>
    <a href="/college-list-builder.php" class="col-sm-3 col-md-3 col-4 py-3 px-1 text-decoration-none text-dark">
      <div class="card shadow bg-body rounded">
        
        <span class="hover-effect-1 d-block overflow-hidden">
          <img src="/img/nav/college-list-builder.png" class="card-img-top" alt="...">
        </span>
        <div class="card-body py-1 px-1">
          <h5 class="card-title text-center  title-2">COLLEGE LIST BUILDER  </h5>
        </div>
      
      </div>
    </a>
    <a href="/college-counselor-hub.php" class="col-sm-3 col-md-3 col-4 py-3 px-1 text-decoration-none text-dark">
      <div class="card shadow bg-body rounded">
        
        <span class="hover-effect-1 d-block overflow-hidden">
          <img src="/img/1.jpeg" class="card-img-top" alt="...">
        </span>
        <div class="card-body py-1 px-1">
          <h5 class="card-title text-center title-2">COLLEGE COUNSELOR HUB </h5>
        </div>
      
      </div>
    </a>
  
  </div>
</div>


<div class="row p-0 m-0 shadow-lg d-flex justify-content-center">
  <div class="col-xs-12 col-sm-8 py-5 m-0">

    <h3 class="text-center title-1">Unlock your potential with practical insight in a prospective career path</h3>

    <p class="text-center  text-secondary text py-4">
      Harness Isuriz’s industry-leading micro-internship program to find the right one for you and make a more informed decision about your prospective major while potentially enhancing your college application.
    </p>

    <p class="text-center">
      <a href="/micro-internship.php" class="btn btn-info btn-lg rounded-pill text-uppercase fw-light">Explore Micro-Internships</a>
    </p>

  </div>
</div>


<div class="row p-0 m-0 shadow-lg d-flex justify-content-center">
  <div class="col-xs-12 col-sm-8 col-md-6 py-5 m-0">

    <h3 class="text-center title-3">Answers to frequently asked questions about micro-internships</h3>
  </div>
  <div class="col-12 col-sm-10 m-0 p-0 d-flex justify-content-center flex-wrap text-center">

    <div class="col-12 col-sm-4 p-2">
      <div class="card border-0 hover-effect-1">
        <div class="card-header p-0 overflow-hidden">
          <img src="/img/participate.jpeg" alt="" class="card-img-top">
        </div>
        <div class="card-body custom-card-body">
          <h6>WHO IS ELIGIBLE TO PARTICIPATE?</h6>
          <hr class="red">
          <p class="text-2">
            All students in high school or have graduated from high school within the last two years are eligible to participate.
          </p>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-4 p-2">
      <div class="card border-0 hover-effect-1">
        <div class="card-header p-0 overflow-hidden">
          <img src="/img/study-cost.jpeg" alt="" class="card-img-top">
        </div>
        <div class="card-body custom-card-body">
          <h6>HOW MUCH DOES IT COST?</h6>
          <hr class="red">
          <p class="text-2">
          Each Micro-Internship costs $99, and students can choose how many they want to take, and in what order to do them.
          </p>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-4 p-2">
      <div class="card border-0 hover-effect-1">
        <div class="card-header p-0 overflow-hidden">
          <img src="/img/nav/micro-internship.png" alt="" class="card-img-top">
          <!-- <img src="/img/value.jpeg" alt="" class="card-img-top"> -->
        </div>
        <div class="card-body custom-card-body">
          <h6>WHAT IS THE VALUE?</h6>
          <hr class="red">
          <p class="text-2">
          At a more affordable cost, you can get valuable insight from a professional in a particular career and possibly enhance your college application in the process.
          </p>
        </div>
      </div>
    </div>

  </div>
</div>


<?php
include('partials/layout-post.php');
?>