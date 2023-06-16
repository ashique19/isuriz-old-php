<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Isuriz is a cutting-edge college planning technology company that aims to deliver breakthrough innovations at a more affordable cost for the mass-market.">
    <meta name="author" content="Jay Lefkivitz, Isuriz">
    <meta name="generator" content="MD ASHIQUL ISLAM | ashique19@gmail.com">
    <title>ISURIZ - Innovative College Counseling Solutions</title>
    <!-- Favicons -->
    <link rel="apple-touch-icon" href="/img/logo.png" sizes="180x180">
    <link rel="icon" href="/img/logo.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/img/logo.png" sizes="16x16" type="image/png">
    <link rel="mask-icon" href="/img/logo.png" color="#7952b3">
    <link rel="icon" href="/img/favicon.ico">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-ZZM7SCNDNY"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-ZZM7SCNDNY');
    </script>

    <link rel="prerender" href="/college-counselor-hub.php">
    <link rel="prerender" href="/micro-internship.php">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>


    <!-- Bootstrap core CSS -->
    <link href="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="/asset-css/custom.css?q=xasdasxcdsd<?php echo(rand()); ?>">
    <link rel="stylesheet" href="/asset-css/custom-xs.css?q=xasdasxcdsdasddd<?php echo(rand()); ?>">


    <script src="//code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <script>
          
      var cart, total;

      function update_cart_view(){

        total = 0;

        cart = JSON.parse( window.localStorage.getItem('cart') || "[]" );

        $('.cart-number').text(cart.length);

        $('.cart-item').remove();
        cart.forEach((i,k)=>{
          
          total += i.price * 1;

          $('.cart-items').prepend(`
          <div class="dropdown-item my-3 px-3 d-flex justify-content-between cart-item">
            <div class="col-11 text-wrap">
              <p class="m-0">${i.name}</p>
              <small class="text-secondary text-italic">$${i.price}</small>
            </div>
            <div class="col-auto d-flex align-items-center">
              <button class="badge border-0 remove-cart-item" index="${k}">
                <i class="fa fa-times text-danger"></i>
                <input type="hidden" name="name[]" value="${i.name}" />
                <input type="hidden" name="price[]" value="${i.price}" />
              </button>
            </div>
          </div>

          `)
        })

        $('.cart-total').text(total);

      }

      

      $(document).ready(function(){

        update_cart_view();


        $('.add-to-cart').click(function(e){
          e.preventDefault();

          let name = $(this).attr('name'),
              price = $(this).attr('price');

          cart.push({
            name: name,
            price: price
          })

          window.localStorage.setItem('cart', JSON.stringify(cart));

          setTimeout(() => {
            $('.cart-dropdown').dropdown('show');
          }, 500);

          update_cart_view();

        })

        $(document).on({
          click: function(e){
            e.preventDefault();
            
            let index = $(this).attr('index');
            console.log(index);

            cart.splice(index, 1);

            window.localStorage.setItem('cart', JSON.stringify(cart));

            update_cart_view();

          }
        }, '.remove-cart-item')

        $('.cart-close').click(function(e){
          e.preventDefault();
          $('.cart-dropdown').dropdown('hide');
        })

      })

    </script>
  </head>
<body>

<?php include('partials/header.php'); ?>

<main>




