<?php session_start(); if ( ! isset($_SESSION['userid'])) {   header("location: login.php"); } ?>

<?php

$total = 0;

if( count( $_POST ) > 0 )
{

    $names = $_POST['name'];
    $prices = $_POST['price'];

    if( count( $names ) > 0 && count($prices) > 0 && count( $names ) == count($prices) )
    {

        foreach( $prices as $price )
        {

            $total += $price;

        }

    }

}

if( $total == 0 )
{

    exit("<h1>YOUR CART IS EMPTY. GO BACK TO ADD SERVICES TO YOUR CART.</h1>");

}

$_SESSION['cart'] = ['names' => $names, 'prices' => $prices];


?>

<?php
include('partials/layout-pre.php');
?>

<link rel="stylesheet" href="/css/stripe.css">
<!-- <link rel="stylesheet" type="text/css" href="/css/example2.css" data-rel-css="" /> -->

<section class="row mx-0 p-0 mb-5">
  <section class="col-12 m-0 p-0">
      <div class="cover about text-white">
        <div class="shadow-2"></div>
        <h1 class="text-center title-3 py-4 text-white">Payment</h1>
      </div>
  </section>
</section>


<section class="row m-0 p-3 d-flex justify-content justify-content-center flex-wrap">

  <div class="col-12 col-sm-8">
    <form id="payment-form" class="d-flex  p-0 m-0">
      <div class="card shadow col-12">
        <div class="card-header">
            <h3 class="title-3" cart-total="<?php echo($total); ?>" >Total: $<?php echo($total); ?></h3>
        </div>
        <div class="card-body">
            <!-- Display a payment form -->
            <form id="payment-form">
                <div id="card-element"></div>
                <button id="submit">
                    <div class="spinner hidden" id="spinner"></div>
                    <span id="button-text">Pay Now</span>
                </button>
                <p id="card-error" role="alert"></p>
                <p class="result-message hidden text-center">
                Your payment processed successfully.
                </p>
            </form>

            </div>

      </div>
    </form>
  </div>



</section>


<?php

$stripe_key = "pk_test_51J1T3lGiJA0hQtTiAEaKtiZ8hvAgLFXqz17ak1cl4C0840IqyLpICmJCiPf5Hn5REnYQEHZPAQjlGtQKMuf1PaTe00ZU6U6yCC";
$stripe_secret = "sk_test_51J1T3lGiJA0hQtTiXyjhsghnGPTHjNCiXwYZgAECJSH7CKxMccuHhHQNIT9baMWCAG973KlwFTTFkc40fLiw3GfH006wIwCkkF";

?>
<script src="https://js.stripe.com/v3/"></script>
<script src="https://polyfill.io/v3/polyfill.min.js?version=3.52.1&features=fetch"></script>
<script src="/js/stripe.js" defer></script>

<script>

</script>


<?php
include('partials/layout-post.php');
?>


