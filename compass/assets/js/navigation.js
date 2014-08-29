/**
 * navigation.js
 *
 * Handles toggling the navigation menu for small screens.
 */
jQuery(function( $ ){

	$('header .nav-menu, .nav-primary .nav-menu').addClass('responsive-menu').before('<div class="responsive-menu-icon"></div>');

	$('.responsive-menu-icon').click(function(){
		$(this).next('header .nav-menu, .nav-primary .nav-menu').slideToggle();
	});

	$(window).resize(function(){
		if(window.innerWidth > 768) {
			$('header .nav-menu, .nav-primary .nav-menu, nav .sub-menu').removeAttr('style');
			$('.responsive-menu > .menu-item').removeClass('menu-open');
		}
	});

	$('.responsive-menu > .menu-item').click(function(event){
		if (event.target !== this)
		return;
			$(this).find('.sub-menu:first').slideToggle(function() {
			$(this).parent().toggleClass('menu-open');
		});
	});

});