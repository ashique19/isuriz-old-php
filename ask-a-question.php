<?php
include('ask-a-question-email.php');
include('partials/layout-pre.php');
?>

<section class="row m-0 p-0">
  <section class="col-12 m-0 p-0">
      <div class="cover ask-a-question text-white">
        <div class="shadow-2"></div>
        <h1 class="text-center title-3 py-4">ASK ISURIZ'S NETWORK OF PROFESSIONALS</h1>

        <form class="position-relative z-1 justify-content-center collapse show ask-a-question" action="" method="post">
          <div class="card border-0 square-border">
            <div class="card-header bg-info square-border">
              <h4 class="m-0 py-2">GET ANSWERS TO YOUR CAREER QUESTIONS</h4>
            </div>
            <div class="card-body py-4">
                <?php if($error) echo $error; ?>
                <input type="text" class="form-control q" placeholder="Ask a question..."  />
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-info rounded-pill" disabled type="button" data-bs-toggle="collapse" data-bs-target=".ask-a-question" aria-expanded="false" aria-controls="collapseExample">
                Submit
                <span class="badge bg-white rounded-pill">
                  <i class="fa fa-angle-right text-info"></i>
                </span>
              </button>
            </div>
          </div>
        </form>

        <form class="position-relative z-1 justify-content-center collapse ask-a-question" action="" method="post">
          <div class="card border-0 square-border">
            <div class="card-header bg-info square-border">
              <h4 class="m-0 py-2">Finalize Submission</h4>
            </div>
            <div class="card-body py-4 text-dark">
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Name: <span class="small text-danger">(required)</span> </label>
                <input type="text" class="form-control" placeholder="Name" name="name" required />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email: <span class="small text-danger">(required)</span></label>
                <input type="email" class="form-control" placeholder="Email" name="email" required />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Telephone:</label>
                <input type="tel" class="form-control" placeholder="Telephone" name="tel"  />
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Micro-Internship Taken:</label>
                <select name="micro" id="micro" class="form-control">
                  <option value="">-Select-</option>
                  <option value="HUMAN RESOURCES MICRO-INTERNSHIP">HUMAN RESOURCES MICRO-INTERNSHIP</option>
                  <option value="ACCOUNTING MICRO-INTERNSHIP">ACCOUNTING MICRO-INTERNSHIP</option>
                  <option value="ARCHITECTURE MICRO-INTERNSHIP">ARCHITECTURE MICRO-INTERNSHIP</option>
                  <option value="INFORMATION TECHNOLOGY MICRO-INTERNSHIP">INFORMATION TECHNOLOGY MICRO-INTERNSHIP</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Question: <span class="small text-danger">(required)</span></label>
                <input type="text" class="form-control q" placeholder="Ask a question..." name="q" required />
              </div>
            </div>
            <div class="card-footer text-end">
              <button class="btn btn-info rounded-pill" disabled type="submit">
                Finalize Submission
                <span class="badge bg-white rounded-pill">
                  <i class="fa fa-angle-right text-info"></i>
                </span>
              </button>
            </div>
          </div>
        </form>

      </div>
  </section>
</section>




<section class="row mx-0 my-5 p-3 d-flex flex-wrap justify-content-center bg-info text-white">

  <div class="col-12 col-sm-10 mt-3">
    <h3>GET THE ANSWER</h3>
    <p class="text-3">
    After you have completed a micro-internship with Isuriz, you may find that there is a burning question that you need an answer to in your college planning efforts. Isuriz is here to help. You can now submit your career question concerning your micro-internship above. Isuriz can then reach out to its network of professionals for an answer, and get back to you.
    </p>
  </div>

</section>


<script>
  $(document).ready(function(){
    $('.q').on('keyup change', function(){
      $('.q').val( $(this).val() )

      if( $(this).val().length == 0 ){
        $('button').prop('disabled', true)
      } else{
        $('button').removeAttr('disabled')
      }

    })
  })
</script>


<?php
include('partials/layout-post.php');
?>