;(function () {
	

	'use strict';

	// Placeholder 
	var placeholderFunction = function() {
		$('input, textarea').placeholder({ customClass: 'my-placeholder' });
	}

	var mobileMenuOutsideClick = function() {

		$(document).click(function (e) {
	    var container = $("#fh5co-offcanvas, .js-fh5co-nav-toggle");
	    if (!container.is(e.target) && container.has(e.target).length === 0) {

	    	if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
	    
	    	
	    }
		});

	};


	var offcanvasMenu = function() {

		$('#page').prepend('<div id="fh5co-offcanvas" />');
		$('#page').prepend('<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle fh5co-nav-white"><i></i></a>');
		$('#fh5co-offcanvas').append("<dl><li><a style='color: rgb(255,187,0); font-size:16px;' href='/perfil/index.php'>Perfil</a></li><li><a style='color: rgb(255,187,0); font-size:16px;' href='/calendario/index.php'>Calendário</a></li><li><a style='color: rgb(255,187,0); font-size:16px;' href='/competicoes/index.htmlphp'>Competições</a></li><li><a style='color: rgb(255,187,0); font-size:16px;' href='/perfomances/index.php'>Performances</a></li><li><a style='color: rgb(255,187,0); font-size:16px;' href='/treinos/index.php'>Treinos</a></li><?php	if ($_SESSION['Nivel'] == 2){echo \"<li><a style='color: rgb(255,187,0); font-size:16px;' href='/gerenciamento_tecnico/index.php'>Gerenciamento</a></li>\";} elseif ($_SESSION['Nivel'] == 3) {echo \"<li><a style='color: rgb(255,187,0); font-size:16px;' href='/gerenciamento_dm/index.php'>Gerenciamento</a></li>\";}?><li><a style='color: rgb(255,187,0); font-size:16px;' href='../logout.php'>Logout</a></li></dl>");
		$('#fh5co-offcanvas .has-dropdown').addClass('offcanvas-has-dropdown');
		$('#fh5co-offcanvas')
			.find('li')
			.removeClass('has-dropdown');

		// Hover dropdown menu on mobile
		$('.offcanvas-has-dropdown').mouseenter(function(){
			var $this = $(this);

			$this
				.addClass('active')
				.find('ul')
				.slideDown(500, 'easeOutExpo');				
		}).mouseleave(function(){

			var $this = $(this);
			$this
				.removeClass('active')
				.find('ul')
				.slideUp(500, 'easeOutExpo');				
		});


		$(window).resize(function(){

			if ( $('body').hasClass('offcanvas') ) {

    			$('body').removeClass('offcanvas');
    			$('.js-fh5co-nav-toggle').removeClass('active');
				
	    	}
		});
	};
	
	// Placeholder 
	var contentWayPoint = function() {
		var i = 0;
		$('.animate-box').waypoint( function( direction ) {

			if( direction === 'down' && !$(this.element).hasClass('animated-fast') ) {
				
				i++;

				$(this.element).addClass('item-animate');
				setTimeout(function(){

					$('body .animate-box.item-animate').each(function(k){
						var el = $(this);
						setTimeout( function () {
							var effect = el.data('animate-effect');
							if ( effect === 'fadeIn') {
								el.addClass('fadeIn animated-fast');
							} else if ( effect === 'fadeInLeft') {
								el.addClass('fadeInLeft animated');
							} else if ( effect === 'fadeInRight') {
								el.addClass('fadeInRight animated-fast');
							} else {
								el.addClass('fadeInUp animated-fast');
							}

							el.removeClass('item-animate');
						},  k * 200, 'easeInOutExpo' );
					});
					
				}, 100);
				
			}

		} , { offset: '85%' } );
	};
	// On load
	$(function(){
		placeholderFunction();
		contentWayPoint();

	});

}());