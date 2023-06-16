<?php
include('partials/layout-pre.php');
?>

<section class="row m-0 p-0">
  <section class="col-12 m-0 p-0">
      <div class="cover blogs text-white">
        <div class="shadow-2"></div>
        <h1 class="text-center title-3 py-4 position-relative text-uppercase">BLOG</h1>
        <!-- <p class="text-center position-relative">
        Please read thoroughly
        </p> -->
      </div>
  </section>
</section>

<div class="row m-0 shadow-lg p-5 d-flex">

  <div class="col-12 col-sm-4 p-2 mb-5">
    <div class="card border-0 hover-effect-1">
      <div class="card-header p-0 overflow-hidden">
        <img src="/img/blog-1.jpeg" alt="" class="card-img-top">
      </div>
      <div class="card-body custom-card-body pb-5">
        <h4 class="text-left text-center">Testing</h4>
        <small class="small text-center">ADMIN | DECEMBER 04, 2020</small>
        <hr class="red">
        <p class="text-2">
          is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard d...
          <br>
          <br>
          <a href="/blog-1.php" class="text-info text-decoration-none stretched-link">Read More <i class="fas fa-arrow-right"></i></a>
        </p>
        
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-4 p-2 mb-5">
    <div class="card border-0 hover-effect-1">
      <div class="card-header p-0 overflow-hidden">
        <img src="/img/blog-2.jpeg" alt="" class="card-img-top">
      </div>
      <div class="card-body custom-card-body pb-5">
        <h4 class="text-left text-center">Some Illustrious Universities Worth Considering</h4>
        <small class="small text-center">ISURIZ | NOVEMBER 11, 2020</small>
        <hr class="red">
        <p class="text-2">
          For those who are who starting to think about college planning, you might be stuck on the question of which university ...
          <br>
          <br>
          <a href="/blog-2.php" class="text-info text-decoration-none stretched-link">Read More <i class="fas fa-arrow-right"></i></a>
        </p>
        
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-4 p-2 mb-5">
    <div class="card border-0 hover-effect-1">
      <div class="card-header p-0 overflow-hidden">
        <img src="/img/blog-3.jpeg" alt="" class="card-img-top">
      </div>
      <div class="card-body custom-card-body pb-5">
        <h4 class="text-left text-center">More Tips for Finding the Right College</h4>
        <small class="small text-center">ISURIZ | NOVEMBER 13, 2020</small>
        <hr class="red">
        <p class="text-2">
        Are you worried that you may not land the best college out of the thousands of available options? Well, you are not alon...
          <br>
          <br>
          <a href="/blog-3.php" class="text-info text-decoration-none stretched-link">Read More <i class="fas fa-arrow-right"></i></a>
        </p>
        
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-4 p-2 mb-5">
    <div class="card border-0 hover-effect-1">
      <div class="card-header p-0 overflow-hidden">
        <img src="/img/blog-4.jpeg" alt="" class="card-img-top">
      </div>
      <div class="card-body custom-card-body pb-5">
        <h4 class="text-left text-center">Potential Mistakes to Avoid When Choosing a College</h4>
        <small class="small text-center">ISURIZ | NOVEMBER 05, 2020</small>
        <hr class="red">
        <p class="text-2">
          Choosing the right college is a daunting task that typically requires a lot of research. Many students start considerin...
          <br>
          <br>
          <a href="/blog-4.php" class="text-info text-decoration-none stretched-link">Read More <i class="fas fa-arrow-right"></i></a>
        </p>
        
      </div>
    </div>
  </div>

  <div class="col-12 col-sm-4 p-2 mb-5">
    <div class="card border-0 hover-effect-1">
      <div class="card-header p-0 overflow-hidden">
        <img src="/img/blog-5.jpeg" alt="" class="card-img-top">
      </div>
      <div class="card-body custom-card-body pb-5">
        <h4 class="text-left text-center">Select Tips for Finding the Right College</h4>
        <small class="small text-center">ISURIZ | OCTOBER 30, 2020</small>
        <hr class="red">
        <p class="text-2">
          Choosing a college can prove to be an overwhelming proposition, particularly with so many options. Making the right cho...
          <br>
          <br>
          <a href="/blog-5.php" class="text-info text-decoration-none stretched-link">Read More <i class="fas fa-arrow-right"></i></a>
        </p>
        
      </div>
    </div>
  </div>


</div>

<!-- Newsletter Subscription -->
<div class="row m-0 shadow py-5 d-flex justify-content-center bg-info">

  <div class="col-12">
    <h3 class="text-center text-white title-3">JOIN THE LIST</h3>
    <p class="text-center text-3 text-white">
    Subscribe today to receive news from Isuriz emailed to you
    </p>
  </div>

  <?php
    $msg = "";
    if( !empty($_POST['newsletter_subscription_email']) )
    {
      include_once('includes/config.php');
      $con->query("INSERT INTO `newsletter_subscribers` (`email`) VALUES ('".$_POST['newsletter_subscription_email']."')");
      if ($mysqli→errno) {
        $msg = '<p class="alert alert-danger">Could not insert record into table: %s<br />", '.$mysqli→error.'</p>';
      } else{
        $msg = '<p class="alert alert-danger">Subscribed Successfully.</p>';
      }
    }
  ?>
  <form action="" method="post" class="col-12 col-sm-4">
    <div class="input-group mb-3">
      <input name="newsletter_subscription_email" type="email" class="form-control" placeholder="Enter your email address" aria-label="subscribers email address" aria-describedby="basic-addon2" required >
      <input type="submit" class="input-group-text" id="basic-addon2" value="SUBSCRIBE" />
    </div>
    <?php
      if( ! empty( $msg ) )
      {
        echo( $msg );
      }
    ?>
  </form>

</div>
<!-- END | Newsletter Subscription -->



<?php
include('partials/layout-post.php');
?>