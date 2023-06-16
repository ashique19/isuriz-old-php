<?php
include('partials/layout-pre.php');
?>

<section class="row m-0 p-0">
  <section class="col-12 m-0 p-0">
      <div class="cover about text-white">
        <div class="shadow-2"></div>
        <h1 class="text-center title-3 py-4">Select Tips for Finding the Right College</h1>
        <p class="text-center">
        ISURIZ | OCTOBER 30, 2020
        </p>
      </div>
  </section>
</section>

<section class="row m-0 py-5 d-flex justify-content-center">
  <section class="col-12 col-sm-10">
    
    <div class="card shadow p-4">

      <div class="card-header text-center bg-white border-0">
        <img src="/img/blog-5.jpeg" alt="" class="img-fluid">
      </div>

      <div class="card-body">
      
        <p class="text-3">

        is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum

        </p>
      
      </div>

      <div class="card-footer bg-white d-flex justify-content-between">
        <a href="/blogs.php" class="btn btn-outline-info">
          <i class="fas fa-arrow-left"></i> Back
        </a>

        <span class="text-right">
          <a href="facebook.com/sharer.php?u=https://isuriz.com"  target="_blank" rel="noopener" class="btn btn-outline-primary">
            <i class="fab fa-facebook-f"></i> Facebook
          </a>
          <a href="https://www.linkedin.com/shareArticle?mini=true&url=https://isuriz.com" class="btn btn-outline-secondary">
            <i class="fab fa-linkedin-in"></i> Linked In
          </a>
          <a href="https://twitter.com/intent/tweet/?text=titleToBeReplaced&amp;url=https://isuriz.com" target="_blank"  rel="noopener" class="btn btn-outline-warning">
            <i class="fab fa-twitter"></i> Twitter
          </a>
        </span>

      </div>

    </div>

  </section>
</section>

<!-- Newsletter Subscription -->
<div class="row m-0 shadow py-5 d-flex justify-content-center bg-info">

  <div class="col-12">
    <h3 class="text-center text-white title-3 mb-4">Subscribe For Newsletter</h3>
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