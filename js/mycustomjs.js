$(document).ready(function() {  
$(".navtoggle").click(function(){
    if ($('.collapse').hasClass('navbar-collapse')) {
        	$(".navbar").toggleClass("fixed-top");
			$("body").toggleClass("paddingtop60");
    	}
	});
	
	
	
	$(".headernavtoggle").click(function(){
    if ($('.collapse').hasClass('navbar-collapse')) {
        	$(".navbar").toggleClass("fixed-header");
			$(".navbar-collapse").toggleClass("show");
			$("body").toggleClass("paddingtop60");
			$(".navbar-toggle").toggleClass("collapsed");
    	}
	});
	
	//enable tooltip
  $('[data-toggle="tooltip"]').tooltip();
	
	//enable popover
	 $('[data-toggle="popover"]').popover();
	
	//
	
$('.tablinks').click(function(){
    if ($('.tabbtn1').hasClass('active')) {
            $('.longcontent').addClass('centersection');   
    }
	else{
		$('.longcontent').removeClass('centersection');
	}
});
	
	$('.tablinks').click(function(){
    if ($('.tabbtn2').hasClass('active')) {
            $('.reachcontent').addClass('centersection');   
    }
	else{
		$('.reachcontent').removeClass('centersection');
	}
});
	$('.tablinks').click(function(){
    if ($('.tabbtn3').hasClass('active')) {
            $('.matchcontent').addClass('centersection');   
    }
	else{
		$('.matchcontent').removeClass('centersection');
	}
});
	$('.tablinks').click(function(){
    if ($('.tabbtn4').hasClass('active')) {
            $('.safetycontent').addClass('centersection');   
    }
	else{
		$('.safetycontent').removeClass('centersection');
	}
});
	$('.tablinks').click(function(){
    if ($('.tabbtn5').hasClass('active')) {
            $('.researchcontent').addClass('centersection');   
    }
	else{
		$('.researchcontent').removeClass('centersection');
	}
});
	
	
	//result scroll height alert
	$(function() {
	if($(".longList").height() > 167 && ($(window).width() <= 992) )	
	{
 		$('.LongScroll').addClass('showscroll').removeClass('hidescroll');
	}
	});
	
	$(function() {
	if($(".reachList").height() > 167 && ($(window).width() <= 992) )	
	{
 		$('.reachScroll').addClass('showscroll').removeClass('hidescroll');
	}
	});
	
	$(function() {
	if($(".matchList").height() > 167 && ($(window).width() <= 992) )	
	{
 		$('.matchScroll').addClass('showscroll').removeClass('hidescroll');
	}
	});
	
	$(function() {
	if($(".safetyList").height() > 167 && ($(window).width() <= 992) )	
	{
 		$('.safetyScroll').addClass('showscroll').removeClass('hidescroll');
	}
	});
	
	$(function() {
		
	if($(".researchList").height() > 167 && ($(window).width() <= 992) )	
	{
 		$('.researchScroll').addClass('showscroll').removeClass('hidescroll');
	}
	});
	
	//end result scroll height alert
	
	//college result sorting toggle
	
 $("#sort-btn").click(function(){
  $("#sort-content").addClass("show");
  });
	
	$("#close-btn").click(function(){
  $("#sort-content").removeClass("show");
  });

	//end college result sorting toggle
	
	
	//search btn mobile toggle
 $("#searchBtnXs").click(function(){
  $(".search-section").addClass("show");
  });
	
	$("#close-search").click(function(){
  $(".search-section").removeClass("show");
  });
	//end search btn mobile toggle
	
	
$('[rel="popover"]').popover({
        container: 'body',
        html: true,
        content: function () {
            var clone = $($(this).data('popover-content')).clone(true).removeClass('hide');
            return clone;
        }
    }).click(function(e) {
        e.preventDefault();
    });	

	//homepage testimonial section
	$(function() {
		$('.testimonial .carousel-inner .carousel-item:first-child').addClass('active');
	  });

	  //dashboard counselor page slider arrow wrapper
	  $(function() {
	  $(".arrow-counselor").wrapAll("<div class='counselor-slider-arrow-wrap' />");
	});

	//hide show counselor popup connect form
	$(".counselorformhideshow").click(function(){
		$(".hideshowcounselorform").slideToggle();
	  });
	  
	  
	  //hide show counselor popup connect form
	$(".user-status").click(function(){
		$(".header-notification").slideToggle();
	  });

	  
	  
	  /*
	  //homepage hero slider
	  'use strict';

	  var owl = $('.home-hero-slider'),
		  item,
		  itemsBgArray = [], // to store items background-image
		  itemBGImg;
	
	  owl.owlCarousel({  
		  items: 1,
		  smartSpeed: 1000,
		  autoplay: false,
		  autoplayTimeout: 8000,
		  autoplaySpeed: 1000,
		  loop: true,
		  nav: false,
		  dots:true,
		  navText: false, 
	  });
	
	

	  $('.active').addClass('anim');
	
	  var owlItem = $('.owl-item'),
		  owlLen = owlItem.length;
		  
		  
		  */
	  /* --------------------------------
		* store items bg images into array
	  --------------------------------- */
	  
	  
	  /*
	  $.each(owlItem, function( i, e ) {
		  itemBGImg = $(e).find('.owl-item-bg').attr('src');
		  itemsBgArray.push(itemBGImg);
	  });
	  
	  */
	  
	  
	  
	  /* --------------------------------------------
		* nav control thump
		* nav control icon
	  --------------------------------------------- */
	  
	  
	  
	  
	  /*
	  var owlNav = $('.owl-nav'),
		  el;
	  
	  $.each(owlNav.children(), function (i,e) {
		  el = $(e);
		  // append navs thump/icon with control pattern(owl-prev/owl-next)
		  el.append('<div class="'+ el.attr('class').match(/owl-\w{4}/) +'-thump">');
		  el.append('<div class="'+ el.attr('class').match(/owl-\w{4}/) +'-icon">');
	  });

		*/





	  
	  

});//end document.ready