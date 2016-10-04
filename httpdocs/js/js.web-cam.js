$('nav#mmovil').mmenu();

$('.selectpicker').selectpicker({
	size: '50%'
});
$('.mmenuSec.Mextras').on('click', function(evt) {
	evt.preventDefault();
	if ($(this).hasClass('mmenuSecHovered')) {
		$('#' + $(this).data('submenu')).hide('slow');
		$(this).toggleClass('mmenuSecHovered');
	} else {
		$('#' + $(this).data('submenu')).show('slow');
		$(this).toggleClass('mmenuSecHovered');
	}
	return false;
});

// $('.Mextras').on('mouseover', function() {
// 	$('.extras').show('fast');
// 	$(this).toggleClass('mmenuSecHovered');
// }).on('mouseleave', function() {
// 	if (!$('.extras').is(':hover')) {
// 		$('.extras').hide('fast');
// 	}
// });

// $('.extras').on('mouseenter', function() {
// 	$('.Mextras').toggleClass('mmenuSecHovered');
// }).on('mouseleave', function() {
// 	if (!$('.Mextras').is(':hover')) {
// 		$('.Mextras').toggleClass('mmenuSecHovered');
// 		$(this).slideUp('fast');
// 	}
// });

$('.slider-principal').fractionSlider({
	'fullWidth': true,
	'controls': false,
	'pager': false,
	'responsive': true,
	'dimensions': "1214,390",
	'timeout': 3000, // default timeout before switching slides
	'speedIn': 1000, // default in - transition speed
	// 'speedOut' : 0, // default out - transition speed
	'increase': false,
	'pauseOnHover': false,
	'slideEndAnimation': true,
	'backgroundAnimation': false,
	// 'backgroundElement' : 
});
$('.slider-principal-movil').fractionSlider({
	'fullWidth': true,
	'controls': false,
	'pager': false,
	'responsive': true,
	'dimensions': "402,179",
	'timeout': 3000, // default timeout before switching slides
	'speedIn': 1000, // default in - transition speed
	// 'speedOut' : 0, // default out - transition speed
	'increase': false,
	'pauseOnHover': false,
	'slideEndAnimation': true,
	'backgroundAnimation': false,
	// 'backgroundElement' : 
});
$('.slider-banner').fractionSlider({
	'fullWidth': true,
	'controls': true,
	'pager': true,
	'responsive': true,
	'dimensions': "940,195",
	'increase': true,
	// 'slideTransitionSpeed' : 10,
	// 'timeout' : 3000, // default timeout before switching slides
	'speedIn': 500, // default in - transition speed
	// 'speedOut' : 500, // default out - transition speed
	'pauseOnHover': true,
	'slideEndAnimation': true,
	'backgroundAnimation': false,
	'autoChange': false
		// 'backgroundElement' : 
});
$('.slider-banner-movil').fractionSlider({
	'fullWidth': false,
	'controls': true,
	'pager': true,
	'responsive': true,
	'dimensions': "300,500",
	'increase': true,
	// 'slideTransitionSpeed' : 10,
	// 'timeout' : 3000, // default timeout before switching slides
	'speedIn': 500, // default in - transition speed
	// 'speedOut' : 500, // default out - transition speed
	'pauseOnHover': true,
	'slideEndAnimation': true,
	'backgroundAnimation': false,
	'autoChange': false
		// 'backgroundElement' : 
});

activawebcam = function(posicion) {
	var objeto = jQuery('img[data-imagen=' + posicion + ']');
	objeto.attr('src', "/images/loading.gif");

	if (objeto.data('actual') === 'imagen') {
		if (posicion === 0) {
			setTimeout(function() {
				objeto.attr('src', "http://85.31.165.140/axis-cgi/mjpg/video.cgi?resolution=480x270&amp;dummy=1432905778996");
			}, 500);
		} else if(posicion === 1) {
			setTimeout(function() {

				objeto.attr('src', "http://www.dueporti.it/webcam/dueporti.jpg");
			}, 500);
		}else if(posicion === 2) {
			setTimeout(function() {

				objeto.attr('src', "http://www.aristonlinesanremo.com/webcamframenew.aspx");
			}, 500);
		}else if(posicion === 3) {
			setTimeout(function() {

				objeto.attr('src', "http://82.215.181.133:82/mjpg/video.mjpg");
			}, 500);
		}
		objeto.data('actual', 'webcam');
	} else {

		objeto.attr('src', "/images/webcam-en.jpg");
		objeto.data('actual', 'imagen');
	}
}

function esconder()
{
	$("#aris").css('display', 'none');
	$("#frame").css('display', 'block');
}


setInterval(function() {
	var objeto = jQuery('img[data-imagen=1]');
	objeto.attr('src', objeto.attr('src'));
}, 1300);