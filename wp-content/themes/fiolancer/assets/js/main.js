(function ($) {
	"use strict";

/*=============================================
	=    		 Preloader			      =
=============================================*/
function preloader() {
	$('#preloader').delay(0).fadeOut();
};

$(window).on('load', function () {
	preloader();
	wowAnimation();
	odometerAnimation();
});



/*=============================================
	=    		Mobile Menu			      =
=============================================*/
//SubMenu Dropdown Toggle
if ($('.menu-area li.menu-item-has-children ul').length) {
	$('.menu-area .navigation li.menu-item-has-children').append('<div class="dropdown-btn"><i class="far fa-plus"></i></div>');

}

//Mobile Nav Hide Show
if ($('.mobile-menu').length) {

	var mobileMenuContent = $('.menu-area .main-menu').html();
	$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);

	//Dropdown Button
	$('.mobile-menu li.menu-item-has-children .dropdown-btn').on('click', function () {
		$(this).toggleClass('open');
		$(this).prev('ul').slideToggle(500);
	});
	//Menu Toggle Btn
	$('.mobile-nav-toggler').on('click', function () {
		$('body').addClass('mobile-menu-visible');
	});

	//Menu Toggle Btn
	$('.menu-backdrop, .mobile-menu .close-btn').on('click', function () {
		$('body').removeClass('mobile-menu-visible');
	});
}


/*=============================================
	=     Menu sticky & Scroll to top      =
=============================================*/
$(window).on('scroll', function () {
	var scroll = $(window).scrollTop();
	if (scroll < 245) {
		$("#sticky-header").removeClass("sticky-menu");
		$('.scroll-to-target').removeClass('open');
		$("#header-top-fixed").removeClass("header-fixed-position");

	} else {
		$("#sticky-header").addClass("sticky-menu");
		$('.scroll-to-target').addClass('open');
		$("#header-top-fixed").addClass("header-fixed-position");
	}
});


/*=============================================
	=    		 Scroll Up  	         =
=============================================*/
if ($('.scroll-to-target').length) {
  $(".scroll-to-target").on('click', function () {
    var target = $(this).attr('data-target');
    // animate
    $('html, body').animate({
      scrollTop: $(target).offset().top
    }, 1000);

  });
}


/*=============================================
	=          Data Background               =
=============================================*/
$("[data-background]").each(function () {
	$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
})


/*=============================================
	=        Wishlist Active 	       =
=============================================*/
$('.wish-act > a').on('click', function () {
	$(this).css('color','#5f4bdb');
	return false
});

$('.wish-btn').on('click', function () {
	$(this).css({
		"background": "#5f4bdb",
		"border-color": "#5f4bdb",
		"color": "#fff",
	});
	return false
});


/*=============================================
	=        Search Active 	       =
=============================================*/
$('.header-search-icon').on('click', function () {
	$('.header-search-form > form').slideToggle(400);
	return false;
});

$('.header-search-icon').on('click', function () {
	$(this).find('i').toggleClass('fa-times');
	return false;
});


/*=============================================
	=          OffCanvas Active            =
=============================================*/
$('.navSidebar-button').on('click', function () {
	$('body').addClass('offCanvas-menu-visible');
	return false;
});

$('.offCanvas-overlay, .offCanvas-toggle').on('click', function () {
	$('body').removeClass('offCanvas-menu-visible');
});


/*=============================================
	=        Team Social Active 	       =
=============================================*/
$('.social-toggle-icon').on('click', function () {
	$(this).parent().find('ul').slideToggle(400);
	$(this).find('i').toggleClass('fa-times');
	return false;
});


$(document).ready(function() {
	$('select').niceSelect();
  });

/*=============================================
	=          Freelancer Active           =
=============================================*/
$('.f-freelancer-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	slidesToShow: 4,
	slidesToScroll: 2,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=          Testimonial Active           =
=============================================*/
$('.testimonial-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	slidesToShow: 3,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=         Testimonial Two Active        =
=============================================*/
$('.testimonial-two-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplaySpeed: 3500,
	autoplay: true,
	arrows: false,
	centerMode: true,
	centerPadding: '0',
	slidesToShow: 3,
	slidesToScroll: 1,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=    		Brand Active		      =
=============================================*/
$('.brand-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	slidesToShow: 5,
	slidesToScroll: 2,
	responsive: [
		{
			breakpoint: 1500,
			settings: {
				slidesToShow: 5,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=    		Team Active		      =
=============================================*/
$('.team-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: false,
	arrows: true,
	slidesToShow: 2,
	slidesToScroll: 1,
	prevArrow: '<span class="slick-prev"><i class="fal fa-long-arrow-left"></i></span>',
	nextArrow: '<span class="slick-next"><i class="fal fa-long-arrow-right"></i></span>',
	appendArrows: ".team-nav",
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
			}
		},
	]
});


/*=============================================
	=    		Gallery Active		      =
=============================================*/
$('.xio-gallery-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: false,
	draggable: false,
	slidesToShow: 5,
	slidesToScroll: 3,
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 4,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=    	Freelancer Active		      =
=============================================*/
$('.related-freelancer-active').slick({
	dots: false,
	infinite: true,
	speed: 1000,
	autoplay: true,
	arrows: true,
	slidesToShow: 4,
	slidesToScroll: 1,
	prevArrow: '<span class="slick-prev"><i class="fal fa-long-arrow-left"></i></span>',
	nextArrow: '<span class="slick-next"><i class="fal fa-long-arrow-right"></i></span>',
	appendArrows: ".related-freelancer-nav",
	responsive: [
		{
			breakpoint: 1200,
			settings: {
				slidesToShow: 3,
				slidesToScroll: 1,
				infinite: true,
			}
		},
		{
			breakpoint: 992,
			settings: {
				slidesToShow: 2,
				slidesToScroll: 1
			}
		},
		{
			breakpoint: 767,
			settings: {
				slidesToShow: 1,
				centerMode: true,
				centerPadding: '100px',
				slidesToScroll: 1,
				arrows: false,
			}
		},
		{
			breakpoint: 575,
			settings: {
				slidesToShow: 1,
				slidesToScroll: 1,
				centerMode: false,
				arrows: false,
			}
		},
	]
});


/*=============================================
	=          Services Active           =
=============================================*/
var serviceSwiper = new Swiper('.home-services-active', {
	// Optional parameters
	loop: true,
	slidesPerView: 4,
	spaceBetween: 30,
	autoplay: {
		delay: 5000,
		disableOnInteraction: true,
	},
	breakpoints: {
		'1500': {
			slidesPerView: 4,
		},
		'1200': {
			slidesPerView: 4,
		},
		'992': {
			slidesPerView: 3,
		},
		'768': {
			slidesPerView: 3,
		},
		'576': {
			slidesPerView: 2,
		},
		'0': {
			slidesPerView: 1,
		},
	},
	// Navigation arrows
	navigation: {
		nextEl: '.services-n',
		prevEl: '.services-p',
	},
});


/*=============================================
	=          Services Active           =
=============================================*/
var serviceSwiper = new Swiper('.related-services-active', {
	// Optional parameters
	loop: true,
	slidesPerView: 4,
	spaceBetween: 30,
	autoplay: {
		delay: 5000,
		disableOnInteraction: true,
	},
	breakpoints: {
		'1500': {
			slidesPerView: 4,
		},
		'1200': {
			slidesPerView: 4,
		},
		'992': {
			slidesPerView: 3,
		},
		'768': {
			slidesPerView: 3,
		},
		'576': {
			slidesPerView: 2,
		},
		'0': {
			slidesPerView: 1,
		},
	},
	// Navigation arrows
	navigation: {
		nextEl: '.services-next',
		prevEl: '.services-prev',
	},
});


/*=============================================
	=            Blog Active               =
=============================================*/
$('.tg-blog-thumb-active').slick({
	dots: false,
	infinite: true,
	arrows: true,
	speed: 1500,
	slidesToShow: 1,
	slidesToScroll: 1,
	fade: true,
	prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
	nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
});


/*=============================================
	=        parallaxMouse Active          =
=============================================*/
function parallaxMouse() {
	if ($('.parallax').length) {
		var scene = document.querySelectorAll('.parallax');
		for (var i = 0; i < scene.length; i++) {
			var parallaxInstance = new Parallax(scene[i], {
				relativeInput: true,
				hoverOnly: true,
				selector: '.layer',
				pointerEvents: true,
			});
		}
	};
};
parallaxMouse();


/*=============================================
	    =           Partical JS        =
=============================================*/
if ($('.banner-two-content-wrap').length) {
	const colors = ["#1a9777", "#ffc146", "#33a7e0", "#f4f4f4", "#5f4bdb"];

	const numBalls = 30;
	const balls = [];

	for (let i = 0; i < numBalls; i++) {
		let ball = document.createElement("div");
		ball.classList.add("ball");
		ball.style.background = colors[Math.floor(Math.random() * colors.length)];
		ball.style.left = `${Math.floor(Math.random() * 100)}%`;
		ball.style.top = `${Math.floor(Math.random() * 100)}%`;
		ball.style.transform = `scale(${Math.random()})`;
		ball.style.width = `${Math.random() * 10}px`;
		ball.style.height = ball.style.width;
		balls.push(ball);

		$('.banner-two-content-wrap').append(ball);
	}

	balls.forEach((el, i, ra) => {
		let to = {
			x: Math.random() * (i % 2 === 0 ? -10 : 11),
			y: Math.random() * 12
		};

		let anim = el.animate(
			[
				{ transform: "translate(0, 0)" },
				{ transform: `translate(${to.x}rem, ${to.y}rem)` }
			],
			{
				duration: (Math.random() + 1) * 2000,
				direction: "alternate",
				fill: "both",
				iterations: Infinity,
				easing: "ease-in-out"
			}
		);
	});
}


/*=============================================
	=    		Odometer Active  	       =
=============================================*/
function odometerAnimation() {
	var odo = $(".odometer");
	odo.each(function () {
		var countNumber = $(this).attr("data-count");
		$(this).html(countNumber);
	});
};


/*=============================================
	=    		Magnific Popup		      =
=============================================*/
$('.popup-image').magnificPopup({
	type: 'image',
	gallery: {
		enabled: true
	}
});

/* magnificPopup video view */
$('.popup-video').magnificPopup({
	type: 'iframe'
});


/*=============================================
	=    		Isotope	Active  	      =
=============================================*/
$('.freelancer-isotope-active').imagesLoaded(function () {
	// init Isotope
	var $grid = $('.freelancer-isotope-active').isotope({
		itemSelector: '.grid-item',
		percentPosition: true,
		masonry: {
			columnWidth: '.grid-sizer',
		}
	});
	// filter items on button click
	$('.freelancer-filter-nav').on('click', 'button', function () {
		var filterValue = $(this).attr('data-filter');
		$grid.isotope({ filter: filterValue });
	});

});
//for menu active class
$('.freelancer-filter-nav button').on('click', function (event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});


/*=============================================
	=          easyPieChart Active          =
=============================================*/
$('.seller-skill-item').appear(function (e) {
	$('.skill-chart').easyPieChart({
		scaleLength: 0,
		lineWidth: 5,
		trackWidth: 2,
		size: 80,
		lineCap: 'round',
		rotate: 360,
		trackColor: '#ebebeb',
		barColor: '#5f4bdb',
	});
});


/*=============================================
	=    	 Slider Range Active  	         =
=============================================*/
$("#slider-range").slider({
	range: true,
	min: 20,
	max: 400,
	values: [120, 280],
	slide: function (event, ui) {
		$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
	}
});
$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));


/*=============================================
	=         Tooltip Active 	        =
=============================================*/
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
	return new bootstrap.Tooltip(tooltipTriggerEl)
})


/*=============================================
	=    		 Proposal Active  	         =
=============================================*/
$('.proposal-price-wrap [class*="col-"]').on('click', function() {
	$(this).addClass('active').siblings().removeClass('active');
})


/*=============================================
	=    		 Wow Active  	         =
=============================================*/
function wowAnimation() {
	var wow = new WOW({
		boxClass: 'wow',
		animateClass: 'animated',
		offset: 0,
		mobile: false,
		live: true
	});
	wow.init();
}


/*=============================================
	=    		 InView Active  	         =
=============================================*/
$.fn.visible = function(partial) {

	var $t            = $(this),
		$w            = $(window),
		viewTop       = $w.scrollTop(),
		viewBottom    = viewTop + $w.height(),
		_top          = $t.offset().top,
		_bottom       = _top + $t.height(),
		compareTop    = partial === true ? _bottom : _top,
		compareBottom = partial === true ? _top : _bottom;

	return ((compareBottom <= viewBottom) && (compareTop >= viewTop));

};

$(window).on('scroll', function() {
  $(".cta-img-list li").each(function(i, el) {
		var el = $(el);
		if (el.visible(true)) {
			el.addClass("now-in-view");
		} else {
			el.removeClass("now-in-view");
		}
  });
});


})(jQuery);