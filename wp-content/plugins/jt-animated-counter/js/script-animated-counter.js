( function($) {
	var inview = new Waypoint.Inview({
	  element: $('.counter-box')[0],
	  enter: function(direction) {
			$('.jsquare-counter-number').each(function () {
				$(this).prop('Counter',0).animate({
					Counter: $(this).text()
				}, {
					duration: 1500,
					easing: 'swing',
					step: function (now) {
						$(this).text(Math.ceil(now));
					}
				});
			});
		}
	})
} ) ( jQuery );