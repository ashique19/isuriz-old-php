<?php
  session_start(); 
  if ( ! isset($_SESSION['userid'])) {
    $_SESSION[ 'redirect' ] = 'checkout.php' ;
    header("location: login.php"); 
  } 
?>



<?php
include('partials/layout-pre.php');
?>

<!-- <link rel="stylesheet" href="/css/stripe.css"> -->

<section class="row mx-0 p-0 mb-5">
  <section class="col-12 m-0 p-0">
      <div class="cover about text-white">
        <div class="shadow-2"></div>
        <h1 class="text-center title-3 py-4 text-white">CHECKOUT</h1>
      </div>
  </section>
</section>


<section class="row m-0 p-3 d-flex justify-content justify-content-center">

  <div class="col-12 col-sm-10 col-md-8">
    <form action="/payment.php" method="POST">
      <div class="card shadow">
        <div class="card-body cart-items cart-item-seperated">
        
        <p class="py-3">
          <span class="btn btn-info">Total: ($<span class="cart-total">0</span>) </span>
        </p>
        </div>
        <div class="card-footer text-end">
          <button type="submit" class="btn btn-info" >CHECKOUT</button>
        </div>
      </div>
    </form>
  </div>



</section>


<?php
include('partials/layout-post.php');
?>


