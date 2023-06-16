<?php
include('partials/layout-pre.php');
?>

<section class="row m-0 p-0">
    <section class="col-12 m-0 p-0 bg-dark">
      <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="/img/college-list-builder/slide-1.png" class="d-block w-100" alt="...">
            <span class="shadow-2 college d-flex row m-0">
              <h1 class="col-12 text-center">
              MAKING IT EASIER TO BUILD A COLLEGE LIST
              </h1>
              <!-- <p class="slide-text col-12">The best online college list builder available today.</p> -->

              <div class="col-12 p-0 mb-1 d-flex flex-wrap whitish-bg border border-5 border-info px-3 px-sm-0 align-items-center middle-divider position-relative justify-content-around">

                <div class=" col-12 col-sm-6 col-sm-5 my-1 px-3 px-sm-3" data-bs-toggle="tooltip" data-placement="bottom" title="Use Filters to Build a College List">
                  <div class="btn d-flex btn-info p-0 rounded-pill overflow-hidden" role="group" aria-label="Basic example">
                    <!-- <button type="button" class="btn btn-info border-top-0 border-start-0 border-bottom-0"><i class="far fa-building"></i></button> -->
                    <a href="/guest_form.php" class="form-control btn btn-info text-white border-0 height-52 d-flex align-items-center justify-content-center" >BUILD A COLLEGE LIST</a>
                    
                  </div>
                  
                </div>

                <div class=" col-12 col-sm-6 col-sm-5 my-1 px-3 px-sm-3 position-relative">
                  <form class="col-12" method="POST" action="/guest_college-search.php">
                    <div class="btn d-flex btn-info p-0 rounded-pill overflow-hidden" role="group" aria-label="Basic example">
                      <input name="btnsearchschoolname" type="hidden" />
                      <button type="submit" class="btn btn-info border-top-0 border-start-0 border-bottom-0"><i class="fas fa-search"></i></button>
                      <input type="text" name="search_schoolname" class="text-start form-control btn btn-info text-white border-0 height-52 xs-search-call" value="FIND A COLLEGE BY NAME" autofocus>
                    </div>
                  </form>
                  
                  <div class="col-12 bg-info school-search-result position-absolute top-100"></div>
                  
                </div>

              </div>


            </span>

          </div>
          
        </div>
      </div>
  </section>
</section>

<div class="row p-5 bg-info m-0">
  <div class="container d-flex flex-wrap justify-content-center">

    <div class="col-12">
      <p class="lead text-white text-center">Isuriz offers a voluminous database for building a US college list.</p>
    </div>

    <div class="col-12 col-sm-4 pe-4">
      <div class="card mb-3 bg-info border-0 square-border border-right-2-white" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-3 col-4 justify-content-end d-flex align-items-center">
            <img src="/img/college-list-builder/icon1.png" alt="...">
          </div>
          <div class="col-md-9 col-8">
            <div class="card-body text-white">
              <h5 class="card-title title-1">6,800+</h5>
              <p class="card-text">COLLEGES</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-12 col-sm-4">
      <div class="card mb-3 bg-info border-0" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-3 col-4 justify-content-end d-flex align-items-center">
            <img src="/img/college-list-builder/icon2.png" alt="...">
          </div>
          <div class="col-md-9 col-8">
            <div class="card-body text-white">
              <h5 class="card-title title-1">3,000,000+</h5>
              <p class="card-text">RECORDS</p>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
</div>


<div class="row m-0 shadow-lg shadow-3 p-1 position-relative">

  <div class="conteiner d-flex justify-content-center p-5 flex-wrap">

    <div class="col-12 col-sm-4 border-after position-relative text-end">
        <img src="/img/college-list-builder/service-img1.jpeg" width="85%" alt="" class="">
    </div>

    <div class="col-12 col-sm-8 py-5 m-0 ps-5 xs-padding-x-0">

      <h3 class="text-left title-1 ms-3">THE MOTIVATION</h3>

      <p class="text-left text-secondary text-3 py-4 ms-3">
      When you want to build a college list today, you probably go online, select your search criteria, and the database produces results. Then, you research the individual schools to see which ones you like, and try to figure out your chances of being accepted. Once that is done, you probably organize the list based on the likelihood of being accepted, and then develop a strategy for how many schools should be included on your list. This can be time consuming, and hard to do. As a result, Isuriz saw an opportunity to make an improvement.
      </p>

    </div>
    
  </div>
</div>


<div class="row m-0 shadow-lg shadow-4 p-1 position-relative">

  <div class="conteiner d-flex justify-content-center p-5 flex-wrap">

    <div class="col-12 col-sm-8 py-5 m-0 pe-5 xs-padding-x-0">

      <h3 class="text-left title-1 ms-3">THE SOLUTION</h3>

      <p class="text-left text-secondary text-3 py-4 ms-3">
      Isuriz offers a database of more than 6,800 colleges, and over 3,000,000 records that includes a number of filters for narrowing down your college search results. After building a college list, Isuriz makes it easier to get a perspective on the likelihood of acceptance by using proprietary algorithms. The student can simply click on Estimated Chances of Acceptance, provide certain information about himself or herself and Isuriz will organize the selected colleges in categories based on the likelihood of acceptance. Once the schools are organized by likelihood of acceptance, Isuriz offers customized recommendations on how many colleges should on the college list within each category. In the end, students now have a solution that makes it easier for building a college list using an online list builder.
      </p>

    </div>

    <div class="col-12 col-sm-4 text-start">
        <span class="border-before position-relative d-block">
          <img src="/img/college-list-builder/service-img2.jpeg" width="85%" alt="" class="">
        </span>
    </div>
    
  </div>
</div>



<div class="row m-0 bg-light px-5 position-relative">

  <div class="conteiner d-flex justify-content-center p-5 flex-wrap xs-padding-0">

    <div class="col-12">
      <h2 class="title-1 text-center my-5">Why Should You Choose Us</h2>
    </div>

    <div class="col-12 col-sm-4 p-3 xs-padding-x-0">
      <div class="card shadow">
        <div class="card-body">
          <p class="text-center">
          <img src="/img/college-list-builder/round-icon1.png" alt="" class="round img-fluid">
          </p>
          <h4 class="text-center text-dark text-uppercase fw-bold py-2">Sophisticated</h4>
          <p class="text-center text-3">
          An online solution that can produce a custom list of schools organized by the likelihood of acceptance and can then analyze how many colleges should be in different categories on the college list.
          </p>
        </div>
      </div>
    </div>
    
    <div class="col-12 col-sm-4 p-3 xs-padding-x-0">
      <div class="card shadow">
        <div class="card-body">
          <p class="text-center">
          <img src="/img/college-list-builder/round-icon2.png" alt="" class="round img-fluid">
          </p>
          <h4 class="text-center text-dark text-uppercase fw-bold py-2">Robust</h4>
          <p class="text-center text-3">
          Data compiled from the Integrated Postsecondary Education Data System (IPEDS) comprising over 6,800 colleges, and over 3,000,000 records.
          </p>
        </div>
      </div>
    </div>
    
    <div class="col-12 col-sm-4 p-3 xs-padding-x-0">
      <div class="card shadow">
        <div class="card-body">
          <p class="text-center">
          <img src="/img/college-list-builder/round-icon3.png" alt="" class="round img-fluid">
          </p>
          <h4 class="text-center text-dark text-uppercase fw-bold py-2">VALUE</h4>
          <p class="text-center text-3">
          Isuriz's college list builder is free to students to give back to the community, and hopefully make a difference in the college planning process.
          </p>
        </div>
      </div>
    </div>
    
  </div>
</div>


<!-- Modal -->
<div class="modal fade bg-dark" id="xs-search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark">
      <div class="modal-header border-0">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body bg-dark">

        <div class="position-relative text-white">
          <form class="col-12" method="POST" action="/guest_college-search.php">
            <div class="btn d-flex btn-info p-0 rounded-pill overflow-hidden" role="group" aria-label="Basic example">
              <input name="btnsearchschoolname" type="hidden" />
              <button type="submit" class="btn btn-info border-top-0 border-start-0 border-bottom-0"><i class="fas fa-search"></i></button>
              <input type="text" name="search_schoolname" class="form-control btn btn-info text-white border-0 height-52" value="FIND A COLLEGE BY NAME" autofocus>
            </div>
          </form>
          
          <div class="col-12 bg-info school-search-result position-absolute top-100"></div>
          
        </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal / Disclaimer -->
<div class="modal fade" id="disclaimer-modal"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content  p-sm-3">
      <div class="modal-header border-0">
        <h5 class="modal-title text-uppercase" id="exampleModalLabel">Disclaimer</h5>
        <!-- <button type="button" class="btn-close bg-light" data-bs-dismiss="modal" aria-label="Close"></button> -->
      </div>
      <div class="modal-body">

        <p class="text-3">
        Isuriz's College List Builder is provided free for the public to use to giveback to the community and is provided "AS IS." Isuriz makes no warranties, express or implied, and hereby disclaims all implied warranties, including any warranty of merchantability and warranty of fitness for a particular purpose. By click the "I Understand" button you acknowledge that you have fully read and understand this disclaimer and assume all risk for using Isuriz's College List Builder.
        </p>

      </div>
      <div class="modal-footer border-0">
        <span class="float-start me-3 position-relative">
          <input type="checkbox" id="dont-show-disclaimer" class="stretched-link"> Don't Show Me Again
        </span>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="i-agree-with-disclaimer">I Agree</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){

  // if( localStorage.getItem('college_list_builder_disclaimer') != 0 ){
  //   $('#disclaimer-modal').modal('show');
  // }

  // $('#i-agree-with-disclaimer').click(function(e){
  //   if( $('#dont-show-disclaimer').is(':checked') ){
  //     localStorage.setItem('college_list_builder_disclaimer', 0);
  //   }
  // })

  $('[data-bs-toggle="tooltip"]').tooltip();

  $('.xs-search-call').on('click mouseenter',function(e){
    if( $(window).width() < 600 ){
      e.preventDefault();
      $('#xs-search').modal('show');
    }
  })

})
</script>

<?php
include('partials/layout-post.php');
?>