( function($) {
	"use strict";
	$(document).ready(function loadCssFiles() {
		if ($("div").hasClass("fade-animation")) {
			$(".fade-animation").attr("data-uk-scrollspy", "{cls:'uk-animation-fade', delay: 500}");
		}
		if ($("div").hasClass("scale-up-animation")) {
			$(".scale-up-animation").attr("data-uk-scrollspy", "{cls:'uk-animation-scale-up', delay: 500}");
		}
		if ($("div").hasClass("scale-down-animation")) {
			$(".scale-down-animation").attr("data-uk-scrollspy", "{cls:'uk-animation-scale-down', delay: 500}");
		}
		if ($("div").hasClass("slide-top-animation")) {
			$(".slide-top-animation").attr("data-uk-scrollspy", "{cls:'uk-animation-slide-top', delay: 500}");
		}
		if ($("div").hasClass("slide-bottom-animation")) {
			$(".slide-bottom-animation").attr("data-uk-scrollspy", "{cls:'uk-animation-slide-bottom', delay: 500}");
		}
		if ($("div").hasClass("slide-left-animation")) {
			$(".slide-left-animation").attr("data-uk-scrollspy", "{cls:'uk-animation-slide-left', delay: 500}");
		}
		if ($("div").hasClass("slide-right-animation")) {
			$(".slide-right-animation").attr("data-uk-scrollspy", "{cls:'uk-animation-slide-right', delay: 500}");
		}
	});
} ) ( jQuery );