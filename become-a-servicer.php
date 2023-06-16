<?php
if( count($_POST) > 0 ) require('email-become-a-servicer.php');
include('partials/layout-pre.php');
?>

<section class="row m-0 p-0">
  <section class="col-12 m-0 p-0">
      <div class="cover join-professional-network text-white">
        <div class="shadow-2"></div>
        <h1 class="text-center title-3 py-4">Join our Professional Network</h1>
        <!-- <p class="text-center text-light">
        Fill out the form below
        </p> -->
      </div>
  </section>
</section>

<section class="row m-0 py-5 d-flex justify-content-center">
  <section class="col-12 col-sm-8 col-md-7">

    <?php echo( isset($error) ? $error : ''); ?>
    
    <div class="card shadow py-4 px-0">

      <div class="card-body collapse show base-1 base-2">

        <div class=" d-flex flex-wrap">

          <button type="button" class="col-12 col-sm-6 bg-info border-5 border-white border py-sm-5 position-relative btn btn-info fs-4"  data-bs-toggle="collapse" data-bs-target=".base-1" aria-expanded="false" aria-controls="multiCollapseExample2">
            Micro-Internship Professional Network
          </button>

          <button type="button" class="col-12 col-sm-6 bg-info border-5 border-white border py-sm-5 position-relative btn btn-info fs-4"  data-bs-toggle="collapse" data-bs-target=".base-2" aria-expanded="false" aria-controls="multiCollapseExample2">
            College Counselor Hub Professional Network
          </button>

        </div>
      
      </div>

      <form class="card-body collapse base-1" method="post" enctype="multipart/form-data">

        <div class="collapse toggle-1 show" id="multiCollapseExample1">
          <div class="row">

            <div class="col-12 mb-3">
              <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="position-relative">

                <hr class="position-absolute col-12">

                <ol class="breadcrumb d-flex justify-content-between position-relative">
                  <li class="breadcrumb-item">
                    <span class="btn rounded-circle btn-info">1</span>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    <span class="btn rounded-circle btn-outline-info bg-white">2</span>
                  </li>
                  <li class="breadcrumb-item text-end" aria-current="page">
                    <span class="btn rounded-circle btn-outline-info bg-white">3</span>
                  </li>
                </ol>

              </nav>
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="name" class="form-label">Name <small class="text-danger small">(REQUIRED)</small> </label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="email" class="form-label">Email address <small class="text-danger small">(REQUIRED)</small> </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="tel" class="form-label">Telephone <small class="text-danger small">(REQUIRED)</small> </label>
              <input type="tel" class="form-control" id="tel" name="tel" placeholder="Enter your telephone number" required>
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
            
            </div>
            
            <div class="col-12 mb-3 justify-content-end d-flex">
              
              <button disabled title="Fill the required fields to continue" class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target=".toggle-1" aria-expanded="false" aria-controls="multiCollapseExample2">Next ></button>
            
            </div>

          </div>
        </div>

        <div class="collapse toggle-1 toggle-2" id="multiCollapseExample1">
          <div class="row">

            <div class="col-12 mb-3">
              <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="position-relative">

                <hr class="position-absolute col-12">

                <ol class="breadcrumb d-flex justify-content-between position-relative">
                  <li class="breadcrumb-item">
                    <span class="btn rounded-circle btn-secondary">1</span>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    <span class="btn rounded-circle btn-info">2</span>
                  </li>
                  <li class="breadcrumb-item text-end" aria-current="page">
                    <span class="btn rounded-circle btn-outline-info bg-white">3</span>
                  </li>
                </ol>

              </nav>
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="photo" class="form-label">Photo</label>
              <div id="preview" class="position-relative"></div>
              <input class="form-control" type="file" id="photo" accept="image/*" name="photo" />
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="occupation" class="form-label">Occupation</label>
              <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter your profession">
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="bio" class="form-label">Short Bio</label>
              <textarea class="form-control" name="bio" id="bio" cols="30" rows="10" placeholder="Enter a short bio"></textarea>
            
            </div>
            
            <div class="col-12 mb-3 justify-content-between d-flex">
              
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target=".toggle-1" aria-expanded="false" aria-controls="multiCollapseExample2">< Previous</button>
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target=".toggle-2" aria-expanded="false" aria-controls="multiCollapseExample2">Next ></button>
              
            </div>

          </div>
        </div>

        <div class="collapse toggle-2" id="multiCollapseExample1">
          <div class="row">

            <div class="col-12 mb-3">
              <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="position-relative">

                <hr class="position-absolute col-12">

                <ol class="breadcrumb d-flex justify-content-between position-relative">
                  <li class="breadcrumb-item">
                    <span class="btn rounded-circle btn-secondary">1</span>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    <span class="btn rounded-circle btn-secondary">2</span>
                  </li>
                  <li class="breadcrumb-item text-end" aria-current="page">
                    <span class="btn rounded-circle btn-info">3</span>
                  </li>
                </ol>

              </nav>
            </div>
            
          
            
            <div class="col-12 mb-3">

              <label for="service" class="form-label">Types of Micro-internships:</label>
              <p>
                <input type="radio" id="service" name="service" value="HUMAN RESOURCES MICRO-INTERNSHIP"> HUMAN RESOURCES MICRO-INTERNSHIP
              </p>
              <p>
                <input type="radio" id="service" name="service" value="ACCOUNTING MICRO-INTERNSHIP"> ACCOUNTING MICRO-INTERNSHIP
              </p>
              <p>
                <input type="radio" id="service" name="service" value="ARCHITECTURE MICRO-INTERNSHIP"> ARCHITECTURE MICRO-INTERNSHIP
              </p>
              <p>
                <input type="radio" id="service" name="service" value="INFORMATION TECHNOLOGY MICRO-INTERNSHIP"> INFORMATION TECHNOLOGY MICRO-INTERNSHIP
              </p>
            </div>
            

            <div class="col-12 mb-3">

              <label for="hourly_rate" class="form-label">Hourly Rate:</label>
              <input type="number" class="form-control" id="hourly_rate" name="hourly_rate" placeholder="$" />
              
            </div>

            <div class="col-12 mb-3 justify-content-between d-flex">
              
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target=".toggle-2" aria-expanded="false" aria-controls="multiCollapseExample2">< Previous</button>
                <button class="btn btn-info" type="submit">Submit</button>
              
            </div>

          </div>
        </div>

      </form>

      <form class="card-body collapse base-2" method="post" enctype="multipart/form-data">

        <div class="collapse toggle-3 show" id="multiCollapseExample1">
          <div class="row">

            <div class="col-12 mb-3">
              <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="position-relative">

                <hr class="position-absolute col-12">

                <ol class="breadcrumb d-flex justify-content-between position-relative">
                  <li class="breadcrumb-item">
                    <span class="btn rounded-circle btn-info">1</span>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    <span class="btn rounded-circle btn-outline-info bg-white">2</span>
                  </li>
                  <li class="breadcrumb-item text-end" aria-current="page">
                    <span class="btn rounded-circle btn-outline-info bg-white">3</span>
                  </li>
                </ol>

              </nav>
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="name" class="form-label">Name <small class="text-danger small">(REQUIRED)</small> </label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="email" class="form-label">Email address <small class="text-danger small">(REQUIRED)</small> </label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address" required>
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="tel" class="form-label">Telephone <small class="text-danger small">(REQUIRED)</small> </label>
              <input type="tel" class="form-control" id="tel" name="tel" placeholder="Enter your telephone number" required>
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="address" class="form-label">Address</label>
              <input type="text" class="form-control" id="address" name="address" placeholder="Enter your address">
            
            </div>
            
            <div class="col-12 mb-3 justify-content-end d-flex">
              
              <button disabled class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target=".toggle-3" aria-expanded="false" aria-controls="multiCollapseExample2">Next ></button>
            
            </div>

          </div>
        </div>

        <div class="collapse toggle-3 toggle-4" id="multiCollapseExample1">
          <div class="row">

            <div class="col-12 mb-3">
              <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="position-relative">

                <hr class="position-absolute col-12">

                <ol class="breadcrumb d-flex justify-content-between position-relative">
                  <li class="breadcrumb-item">
                    <span class="btn rounded-circle btn-secondary">1</span>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    <span class="btn rounded-circle btn-info">2</span>
                  </li>
                  <li class="breadcrumb-item text-end" aria-current="page">
                    <span class="btn rounded-circle btn-outline-info bg-white">3</span>
                  </li>
                </ol>

              </nav>
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="photo" class="form-label">Photo</label>
              <div id="preview" class="position-relative"></div>
              <input class="form-control" type="file" id="photo" accept="image/*" name="photo">
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="occupation" class="form-label">Occupation</label>
              <input type="text" class="form-control" id="occupation" name="occupation" placeholder="Enter your profession">
            
            </div>
            
            <div class="col-12 mb-3">
              
              <label for="bio" class="form-label">Short Bio</label>
              <textarea class="form-control" name="bio" id="bio" cols="30" rows="10" placeholder="Enter a short bio"></textarea>
            
            </div>
            
            <div class="col-12 mb-3 justify-content-between d-flex">
              
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target=".toggle-3" aria-expanded="false" aria-controls="multiCollapseExample2">< Previous</button>
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target=".toggle-4" aria-expanded="false" aria-controls="multiCollapseExample2">Next ></button>
              
            </div>

          </div>
        </div>

        <div class="collapse toggle-4" id="multiCollapseExample1">
          <div class="row">

            <div class="col-12 mb-3">
              <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb" class="position-relative">

                <hr class="position-absolute col-12">

                <ol class="breadcrumb d-flex justify-content-between position-relative">
                  <li class="breadcrumb-item">
                    <span class="btn rounded-circle btn-secondary">1</span>
                  </li>
                  <li class="breadcrumb-item" aria-current="page">
                    <span class="btn rounded-circle btn-secondary">2</span>
                  </li>
                  <li class="breadcrumb-item text-end" aria-current="page">
                    <span class="btn rounded-circle btn-info">3</span>
                  </li>
                </ol>

              </nav>
            </div>
            
            <div class="col-12 mb-3">
            
              <label for="service" class="form-label">Click on Service to add detail</label>
              

              <div class="col-12 mb-3 p-0 d-flex flex-wrap" id="service-list">
                
                  <button type="button" class="col-12 col-sm-3 border-white btn btn-sm btn-info add-service">COLLEGE ADMISSION PLANNING ASSISTANCE</button>
                  <button type="button" class="col-12 col-sm-3 border-white btn btn-sm btn-info add-service">COLLEGE APPLICATION ASSISTANCE</button>
                  <button type="button" class="col-12 col-sm-3 border-white btn btn-sm btn-info add-service">COLLEGE ESSAY ASSISTANCE</button>
                  <button type="button" class="col-12 col-sm-3 border-white btn btn-sm btn-info add-service">COLLEGE AFFORDABILITY ASSISTANCE</button>
                
              </div>

              
              

              
            </div>

            
            <div class="col-12 mb-3 justify-content-between d-flex flex-wrap">
              <p class="text-3 col-12">
                <input type="checkbox" name="agree" id="agree" required> I understand and agree with all terms and conditions.
              </p>
              
                <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target=".toggle-4" aria-expanded="false" aria-controls="multiCollapseExample2">< Previous</button>
                <button class="btn btn-info" type="submit">Submit</button>
              
            </div>

          </div>
        </div>

      </form>

    </div>

  </section>
</section>

<script>
$(document).ready(function(){
  $('#photo').change(function(e){
    e.preventDefault();
    $('#preview').html(`<img width="100" src="${ URL.createObjectURL(e.target.files[0])}" /> <span class="fa fa-trash"></span>`);
  })

  $(document).on({
    click: function(e){
      $(this).next().val("");
      $(this).parent().empty();
    }
  },'#preview .fa-trash')

  $(document).on({

    click: function(e){
      e.preventDefault();
      let that = $(this),
          parent = $('#service-list');

      parent.after(`
      <div class="row mx-0 mb-3 p-2 shadow">
                    
        <h6>
          ${that.text()}
          <input type="hidden" name="service_type[]" value="${that.text()}" />
          <a href="#" class="fa fa-trash del-service float-end text-danger text-decoration-none"></a>
          <a href="#" class="add-service add-service-button float-end text-decoration-none badge rounded-pill bg-info mx-2"><i class="fa fa-plus text-white"></i> ${that.text()}</a>
        </h6>
        
        <div class="col-12 col-sm-6 mb-3">
          <label for="service_title" class="form-label">Title</label>
          <input type="text" class="form-control" id="service_title" name="service_title[]" placeholder="" />
        </div>
        
        <div class="col-12 col-sm-3 mb-3" data-toggle="tooltip" title="Isuriz charges a 50% service fee that is taken as a percentage of the Project Rate. For example, if the Project Rate is $50, the client is charged $50, Isuriz would receive $25 and your net earnings would be $25." >
          <label for="project_rate" class="form-label">Project Rate</label>
          <input type="number" class="form-control" id="project_rate" name="project_rate[]" placeholder="$" />
        </div>
        
        <div class="col-12 col-sm-3 mb-3">
          <label for="service_delivery_days" class="form-label">Days for Delivery</label>
          <input type="number" class="form-control" id="service_delivery_days" name="service_delivery_days[]" placeholder="" />
        </div>
        
        <div class="col-12 mb-3">
          <label for="service_description" class="form-label">Description of Service</label>
          <textarea class="form-control" name="service_description[]" id="service_description" cols="30" rows="10"></textarea>
        </div>

      </div>
      `);

      $('[data-toggle="tooltip"]').tooltip('show');

    }
    
  },'.add-service');  

  $(document).on({
    click: function(){
      $(this).parent().parent().remove();
    }
  },'.del-service')


  
  $('.collapse.toggle-1.show input[required]').on('keyup change', function(e){
    let next = true;
    $('.collapse.toggle-1.show input[required]').each(function(k,v){
      if( $(this).val().length == 0 ) next = false;
    })
    console.log(next);
    if( next == true ){
      $('.collapse.toggle-1.show [data-bs-toggle="collapse"]').removeAttr('disabled');
    } else{
      $('.collapse.toggle-1.show [data-bs-toggle="collapse"]').attr('disabled', true);
    }
  })
  
  $('.collapse.toggle-3.show input[required]').on('keyup change', function(e){
    let next = true;
    $('.collapse.toggle-3.show input[required]').each(function(k,v){
      if( $(this).val().length == 0 ) next = false;
    })
    console.log(next);
    if( next == true ){
      $('.collapse.toggle-3.show [data-bs-toggle="collapse"]').removeAttr('disabled');
    } else{
      $('.collapse.toggle-3.show [data-bs-toggle="collapse"]').attr('disabled', true);
    }
  })



})




</script>

<?php
include('partials/layout-post.php');
?>