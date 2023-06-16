



</main>

<?php include('partials/footer.php'); ?>


<script>

var play = true;

/**
 * Sticky Header start
 * */ 
$(document).scroll(function(e){
    let distance = $(this).scrollTop(),
        gradient_1 = 0 + distance /2 / 100,
        gradient_2 = 0.3 + distance /2 / 100;

    if( gradient_1 > 1 ){
      gradient_1 = 1;
      gradient_2 = 1;
    } 
    
    $('.main-header').css({
      // 'margin-top': marginTop,
      'background': `linear-gradient(to top, rgba(24, 26, 29, ${gradient_1}), rgba(24, 26, 29, ${gradient_2}))`
    });
})
/**
 * End: Sticky Header
 * */


/**
 * Video autoplay starts
 * */ 

if( $('video').length > 0 ){

  $('video').height( $(window).width() * 0.5625 < 220 ? 220 : $(window).width() * 0.5625 );


  var video = document.querySelector('video');
  var promise = video.play();

  if (promise !== undefined) {
    promise.then(_ => {
      // Autoplay started!
      $('.pause, .volume').show();
      $('.play, .mute').hide();
    }).catch(error => {
      // Autoplay was prevented.
      // Show a "Play" button so that user can start playback.
      $('.pause, .volume').hide();
      $('.play, .mute').show();
    });
  }

  $('.play').click(function(e){
    e.preventDefault();
    promise = video.play();

    $('.pause').show();
    $('.play').hide();
  })

  $('.pause').click(function(e){
    e.preventDefault();

    video.pause();

    play = false;

    $('.pause').hide();
    $('.play').show();

  })

  $('.volume').click(function(e){
    e.preventDefault();
    video.muted = false;
    $('.volume').hide()
    $('.mute').show();
  })

  $('.mute').click(function(e){
    e.preventDefault();
    video.muted = true;
    $('.volume').show()
    $('.mute').hide();
  })

  setInterval(() => {
    if( play == true && video.paused == true ){
      
      video.play();
    }
  }, 500);

}
/**
 * End: Video autoplay
*/



</script>



<script>
$('[name="search_schoolname"]').mouseenter(function(){
  if( $(this).val() == 'FIND A COLLEGE BY NAME' ){
    $(this).val("");
  }
  
})
</script>

<script>
var pre_val = "";
$('[name="search_schoolname"]').on('keyup change', function(){
  let val = $(this).val(),
      container = $(this).parent().parent().next();
  
  if( val.length == 0 ){
    $('.school-search-result').empty();
  }

  if( val.length > 0 && val != pre_val ){
    pre_val = val;
    
    container
    .html(`<div class="spinner-border text-light spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>`)
    .load('/school-search.php?q='+encodeURI(val) )
  }

})
</script>
      
  </body>
</html>
