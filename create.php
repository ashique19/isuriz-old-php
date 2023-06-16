<?php
session_start();

require 'stripe/init.php';

// This is your real test secret API key.
\Stripe\Stripe::setApiKey('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');


function calculateOrderAmount(): int {
  // Replace this constant with a calculation of the order's amount
  // Calculate the order total on the server to prevent
  // customers from directly manipulating the amount on the client
  // return 1400;
  if( array_key_exists('cart', $_SESSION ) )
  {

    $cart = $_SESSION['cart'];

    $prices = $cart['prices'];

    $total = 0;

    foreach( $prices as $price )
    {

        $total += $price;

    }

    return $total * 100;

  }
}

header('Content-Type: application/json');

try {
  // retrieve JSON from POST body
  $json_str = file_get_contents('php://input');
  $json_obj = json_decode($json_str);

  $paymentIntent = \Stripe\PaymentIntent::create([
    'amount' => calculateOrderAmount(),
    'currency' => 'usd',
  ]);

  $output = [
    'clientSecret' => $paymentIntent->client_secret,
  ];

  echo json_encode($output);
} catch (Error $e) {
  http_response_code(500);
  echo json_encode(['error' => $e->getMessage()]);
}