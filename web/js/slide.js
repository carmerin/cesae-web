

jQuery.fn.simpleSlide = function(a){

	a				= a || {};
	a.duration		= a.duration || 6000;
	a.transition	= a.transition || 3000;
	var	c	= jQuery(this);
	jQuery(c).css("position","relative");

	jQuery("img",jQuery(c))
		.css({
			'position'	: 'absolute',
			'top'		: '0px',
			'left'		: '0px',
			'z-index'	: '8'
			})
		.find(":first")
			.addClass("slide-active")
			.css('z-index','10');

	setInterval(function(){


				//	if ($active[0].src!='http://www.cesae.es/images/BANNER_Bienvenidos_2.jpg')
				//		document.getElementById('texto_banner').style.display='none';
				//	else
				//		document.getElementById('texto_banner').style.display='block';

			
			var $active = jQuery("img.slide-active",jQuery(c));

			if($active.length == 0)
				document.getElementById('texto_banner').style.display='none';
			else
			{
				if ($active[0].src!='http://www.cesae.es/images/BANNER_Cursos.jpg')
					document.getElementById('texto_banner').style.display='none';
					
			}
			if($active.length == 0) $active = jQuery("img:last",jQuery(c));

			var $next	= $active.next().length ? $active.next() : jQuery("img:first",jQuery(c));

			

			$active
				.addClass("slide-last-active")
				.css('z-index','9');

			$next
				.css({opacity: 0.0})
				.addClass("slide-active")
				.css('z-index','10')
				.animate({opacity: 1.0}, a.transition, function(){
					if ($active[0].src=='http://www.cesae.es/images/BANNER_Cursos.jpg')
						document.getElementById('texto_banner').style.display='block';
					else
						document.getElementById('texto_banner').style.display='none';

					$active
						.removeClass('slide-active slide-last-active')
						.css('z-index','8');
			

					//alert(	$active.length);		

			
				});
		}, a.duration);

}