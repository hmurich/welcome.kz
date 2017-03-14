$(document).ready(function(){
	$('#container').perfectScrollbar();
	$('#content').perfectScrollbar();
	$('.show-filtr').on('click', function () {
		//console.log('show-filtr clicked');
		if($('.header-options').hasClass('header-options--active')){
			$('.header-options').removeClass('header-options--active');
			$('.show-filtr').removeClass('show-filtr--active');
			$('.show-filtr span').text($('.show-filtr span').data('open'));
		} else {
			$('.header-options').addClass('header-options--active');
			$('.show-filtr').addClass('show-filtr--active');
			$('.show-filtr span').text($('.show-filtr span').data('close'));
		}
	});
    $('.mob-start').on('click', function () {
      if($('.mob-start').hasClass('mob-start--active')){
          $('.mob-start').removeClass('mob-start--active');
          $('.header').removeClass('header--active');
      }else{
          $('.mob-start').addClass('mob-start--active');
          $('.header').addClass('header--active');
      }                           
  });
	  $('.slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows:false,
      asNavFor: '.right-photo'    
  });
	$('.right-photo').slick({
      slidesToShow: 3,
      vertical: true,
      slidesToScroll: 1,
      dots:false,
      arrows:false,
      asNavFor: '.slider',
      focusOnSelect: true,
      responsive: [
        {
          breakpoint: 780,
          settings: {
            vertical: false
          }
        }
    ]
   });
});
