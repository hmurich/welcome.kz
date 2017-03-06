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
	  $('.slider').slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows:false,
      asNavFor: '.right-photo'    
  });
	$('.right-photo').slick({
      slidesToShow: 3,
      slidesToScroll: 1,
      dots:false,
      asNavFor: '.slider',
      focusOnSelect: true
   });
});
