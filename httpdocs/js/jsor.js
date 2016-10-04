

$('nav#mmovil').mmenu();

$('.selectpicker').selectpicker({
	size: '50%'
});
$('.Mextras').on('click', function(evt) {
	evt.preventDefault();

	if ($(this).hasClass('mmenuSecHovered')) {
		$('#' + $(this).data('submenu')).fadeOut('normal');
		$(this).toggleClass('mmenuSecHovered');
	}else{
		$('#' + $(this).data('submenu')).fadeOut('normal');
		$('.Mextras.mmenuSecHovered').toggleClass('mmenuSecHovered');
		$('#' + $(this).data('submenu')).fadeIn('normal');
		// $(this).toggleClass('mmenuSecHovered');
	}
	return false;
});
$('.otro').on('click',function(){
	$('.mmenuSecHovered').toggleClass('mmenuSecHovered');
	$('#extras').fadeOut('normal');
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

/*$('.botonera > div').on('click',function(){
	$(this).each(function(index, el) {
		$(el).toggleClass('active');
		console.log(el);
	});
});*/
$('.botonera div').click(function(event) {
	console.log($(this).hasClass('active'));
	if (!$(this).hasClass('active')) {
		$(this).parent().find('div').toggleClass('active');
	};
});
$(function() {
	$('.slider-principal').fractionSlider({
		'fullWidth': false,
		'controls': false,
		'pager': false,
		'responsive': true,
		'dimensions': "1700,390",
		'timeout': 3000, // default timeout before switching slides
		'speedIn': 1000, // default in - transition speed
		// 'speedOut' : 0, // default out - transition speed
		'increase': false,
		'pauseOnHover': false,
		'slideEndAnimation': true,
		'backgroundAnimation': false
		// 'backgroundElement' : 
	});
	$('.slider-principal-movil').fractionSlider({
		'fullWidth': false,
		'controls': false,
		'pager': false,
		'responsive': true,
		'dimensions': "100%,179",
		'timeout': 3000, // default timeout before switching slides
		'speedIn': 1000, // default in - transition speed
		// 'speedOut' : 0, // default out - transition speed
		'increase': false,
		'pauseOnHover': false,
		'slideEndAnimation': true,
		'backgroundAnimation': false
		// 'backgroundElement' : 
	});
	/*$('.slider-banner').fractionSlider({
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
	});*/
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
	
});


Tools.cargarPrincipal({
	url:'//services.sanremo-on.com/service/banners/format/json',
	method : 'get',
	json : true,
	callback : function(data, textStatus, xhr){
		window.idioma = Tools.extraerUrl().idioma;
		var html = '';

		var qq = '<img src="%src%" class="img-responsive" width="100%" height="100%"/>';

		var templateGaleria = '<div class="item" style="width:100%;max-height: 340px; overflow:hidden;">%pp%</div>';

		var templateGaleria1 = '<div class="item active" style="width:100%;max-height: 340px; overflow:hidden;">%pp%</div>';

		var button = '<li data-target="#myCarousel" data-slide-to="%nn%" class="active"></li>';
		var button2 = '<li data-target="#myCarousel" data-slide-to="%nn%"></li>';
		var html = '';
		var html2 = '';
		console.log(data);
		data = Tools.mezclar(data);
		limite = Math.ceil(data.length/2) * 2; 
		for (var i = 0,j = 0; i < limite; i = i +2,j++) {
			var img = data[i];
			var imagenes = ''; 
			var slide = '';
			if(data[i])
				imagenes+=qq.replace(/%src%/gi,Tools.baseAdmin+'public/uploads/banners/'+data[i].imgnormal);
			if(data[i+1])
				imagenes+=qq.replace(/%src%/gi,Tools.baseAdmin+'public/uploads/banners/'+data[i+1].imgnormal);
			
			if(i == 0){
				console.log(imagenes);
				slide = templateGaleria1.replace(/%pp%/gi,imagenes);
			}else{
				slide = templateGaleria.replace(/%pp%/gi,imagenes);
			}
			if(j == 0)
				html2 += button.replace(/%nn%/gi,j.toString());
			else
				html2 += button2.replace(/%nn%/gi,j.toString());				
			html+=slide;
		};

		$('#myCarousel .carousel-indicators').html(html2).promise().done(function(){
			$('#myCarousel .carousel-inner').html(html).promise().done(function(){
				$('#myCarousel').carousel('cycle');
			});
		});

	},
	error: function(){
	}
});

//paloma-> creo funcion para que el slider tenga un url version normal y version movil
jQuery(".slider-principal").on("click",function(){ var url = "http://sanremo-on.com/it/news/eventi/wine-in-sanremo-2015.html";
window.open(url, "_blank"); });
jQuery(".slider-principal-movil").on("click",function(){ var url = "http://sanremo-on.com/it/news/eventi/wine-in-sanremo-2015.html";
window.open(url, "_blank"); });