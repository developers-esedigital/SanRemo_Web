
var isOpera = !!window.opera || navigator.userAgent.indexOf(' OPR/') >= 0;
    // Opera 8.0+ (UA detection to detect Blink/v8-powered Opera)
var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+
var isSafari = Object.prototype.toString.call(window.HTMLElement).indexOf('Constructor') > 0;
    // At least Safari 3+: "[object HTMLElementConstructor]"
var isChrome = !!window.chrome && !isOpera;              // Chrome 1+
var isIE = /*@cc_on!@*/false || !!document.documentMode;   // At least IE6
// alert(isSafari);
if (isSafari == true) {
//	alert('entro');
	// $(".sanmenu").addClass("safari"); 
	// $(".sanmenuacc").addClass("safari"); 
	
}

$('#sanmenuacc').hover(function() {
	/* Stuff to do when the mouse enters the element */
	$('.sanmenuacc').css('display', 'block');
}, function() {
	/* Stuff to do when the mouse leaves the element */
	$('.sanmenuacc').css('display', 'none');
});

$('#sanmenu').hover(function() {
	/* Stuff to do when the mouse enters the element */
	$('.sanmenu').css('display', 'block');
}, function() {
	/* Stuff to do when the mouse leaves the element */
	$('.sanmenu').css('display', 'none');
});

$('#sanmenunegozi').hover(function() {
	/* Stuff to do when the mouse enters the element */
	$('.sanmenunegozi').css('display', 'block');
}, function() {
	/* Stuff to do when the mouse leaves the element */
	$('.sanmenunegozi').css('display', 'none');
});

var idioma = Tools.extraerUrls().idioma;
l = {
	en:{
		label:'Parking',
		url:'/en/mappa#parking'
	},
	it:{
		label:'Parking',
		url:'/it/mappa#parking'
	},
	fr:{
		label:'Parking',
		url:'/fr/mappa#parking'
	},
	ru:{
		label:'Parking',
		url:'/ru/mappa#parking'
	}
}




var ModalGenerico = {
	it: '<div class="modal fade bs-example-modal-sm" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="Mensaje"><div class="modal-dialog modal-sm"><div class="modal-content">HOla</div></div></div>',
	en:'<div class="modal fade bs-example-modal-sm" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="Mensaje"><div class="modal-dialog modal-sm"><div class="modal-content">HOla</div></div></div>',
	fr:'<div class="modal fade bs-example-modal-sm" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="Mensaje"><div class="modal-dialog modal-sm"><div class="modal-content">HOla</div></div></div>',
	ru:'<div class="modal fade bs-example-modal-sm" id="mensajeModal" tabindex="-1" role="dialog" aria-labelledby="Mensaje"><div class="modal-dialog modal-sm"><div class="modal-content">HOla</div></div></div>'
};
var ModalRegistro = {
	it:'<div id="login_registrate" class="modal fade in" style="display: none; "><div class="sombra" data-dismiss="modal" style="position:fixed,width:100%,height:100%;background:rgba(0,0,0,0.8)"></div><div class="modal-dialog modal-middle col-xs-12 col-sm-3 no-padding"><div class="modal-content no-padding"><div class="modal-header text-center"><h4 id="myModalLabel" class="modal-title"><!-- <img src="/images/responsive/Login.png"> --><span class="icon-user ico-user-nav"></span><span class="texto-popup">REGISTRATI</span><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></h4></div><div class="modal-body"><form role="form" method="post" name="login_form" id="login_form" action="#"><div class="form-group"><button class="btn btn-block btn-navy facebook_connect" type="button"><i class="fa fa-facebook"></i> &nbsp;<strong>Login with Facebook</strong></button></div><div class="form-group separator-text text-center"><span>OR</span></div><div class="form-group"><input type="text" required="" placeholder="Username" class="form-control" value="" id="username" name="log" required></div><div class="form-group"><input type="email" required="" placeholder="Mail" class="form-control" value="" id="mail" name="log"></div><div class="form-group"><input type="password" required="" placeholder="Password" class="form-control" value="" id="password" name="pwd" required></div><!-- Login Button --><div class="form-group"><div class="row"><div class="col-md-12"><span class="descrip"><p class="centrar">Your privacy is important to us and we will never rent or sell your information.</p></span></div><!-- /.col-md-12 --><div class="col-md-12"><span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso" required>Sottoscrivo le <a href="privacy.html" id="permiso">regole sulla privacy del sito.</a></p></span></div><!-- /.col-md-12 --></div><!-- /.row --><div class="row"><div class="col-md-12"><input type="hidden" value="/directory/demo1/" name="redirect_to"><button class="btn btn-block btn-danger" type="submit"><strong>INVIA REGISTRAZIONE</strong></button></div><!-- /.col-md-12 --></div><!-- /.row --></div></form></div><!-- /.modal-body --></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div>',
	en:'<div id="login_registrate" class="modal fade in" style="display: none; "><div class="sombra" data-dismiss="modal" style="position:fixed,width:100%,height:100%;background:rgba(0,0,0,0.8)"></div><div class="modal-dialog modal-middle col-xs-12 col-sm-3 no-padding"><div class="modal-content no-padding"><div class="modal-header text-center"><h4 id="myModalLabel" class="modal-title"><!-- <img src="/images/responsive/Login.png"> --><span class="icon-user ico-user-nav"></span><span class="texto-popup">REGISTRATI</span><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></h4></div><div class="modal-body"><form role="form" method="post" name="login_form" id="login_form" action="#"><div class="form-group"><button class="btn btn-block btn-navy facebook_connect" type="button"><i class="fa fa-facebook"></i> &nbsp;<strong>Login with Facebook</strong></button></div><div class="form-group separator-text text-center"><span>OR</span></div><div class="form-group"><input type="text" required="" placeholder="Username" class="form-control" value="" id="username" name="log" required></div><div class="form-group"><input type="email" required="" placeholder="Mail" class="form-control" value="" id="mail" name="log"></div><div class="form-group"><input type="password" required="" placeholder="Password" class="form-control" value="" id="password" name="pwd" required></div><!-- Login Button --><div class="form-group"><div class="row"><div class="col-md-12"><span class="descrip"><p class="centrar">Your privacy is important to us and we will never rent or sell your information.</p></span></div><!-- /.col-md-12 --><div class="col-md-12"><span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso" required>Sottoscrivo le <a href="privacy.html" id="permiso">regole sulla privacy del sito.</a></p></span></div><!-- /.col-md-12 --></div><!-- /.row --><div class="row"><div class="col-md-12"><input type="hidden" value="/directory/demo1/" name="redirect_to"><button class="btn btn-block btn-danger" type="submit"><strong>INVIA REGISTRAZIONE</strong></button></div><!-- /.col-md-12 --></div><!-- /.row --></div></form></div><!-- /.modal-body --></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div>',
	fr:'<div id="login_registrate" class="modal fade in" style="display: none; "><div class="sombra" data-dismiss="modal" style="position:fixed,width:100%,height:100%;background:rgba(0,0,0,0.8)"></div><div class="modal-dialog modal-middle col-xs-12 col-sm-3 no-padding"><div class="modal-content no-padding"><div class="modal-header text-center"><h4 id="myModalLabel" class="modal-title"><!-- <img src="/images/responsive/Login.png"> --><span class="icon-user ico-user-nav"></span><span class="texto-popup">REGISTRATI</span><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></h4></div><div class="modal-body"><form role="form" method="post" name="login_form" id="login_form" action="#"><div class="form-group"><button class="btn btn-block btn-navy facebook_connect" type="button"><i class="fa fa-facebook"></i> &nbsp;<strong>Login with Facebook</strong></button></div><div class="form-group separator-text text-center"><span>OR</span></div><div class="form-group"><input type="text" required="" placeholder="Username" class="form-control" value="" id="username" name="log" required></div><div class="form-group"><input type="email" required="" placeholder="Mail" class="form-control" value="" id="mail" name="log"></div><div class="form-group"><input type="password" required="" placeholder="Password" class="form-control" value="" id="password" name="pwd" required></div><!-- Login Button --><div class="form-group"><div class="row"><div class="col-md-12"><span class="descrip"><p class="centrar">Your privacy is important to us and we will never rent or sell your information.</p></span></div><!-- /.col-md-12 --><div class="col-md-12"><span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso" required>Sottoscrivo le <a href="privacy.html" id="permiso">regole sulla privacy del sito.</a></p></span></div><!-- /.col-md-12 --></div><!-- /.row --><div class="row"><div class="col-md-12"><input type="hidden" value="/directory/demo1/" name="redirect_to"><button class="btn btn-block btn-danger" type="submit"><strong>INVIA REGISTRAZIONE</strong></button></div><!-- /.col-md-12 --></div><!-- /.row --></div></form></div><!-- /.modal-body --></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div>',
	ru:'<div id="login_registrate" class="modal fade in" style="display: none; "><div class="sombra" data-dismiss="modal" style="position:fixed,width:100%,height:100%;background:rgba(0,0,0,0.8)"></div><div class="modal-dialog modal-middle col-xs-12 col-sm-3 no-padding"><div class="modal-content no-padding"><div class="modal-header text-center"><h4 id="myModalLabel" class="modal-title"><!-- <img src="/images/responsive/Login.png"> --><span class="icon-user ico-user-nav"></span><span class="texto-popup">REGISTRATI</span><button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button></h4></div><div class="modal-body"><form role="form" method="post" name="login_form" id="login_form" action="#"><div class="form-group"><button class="btn btn-block btn-navy facebook_connect" type="button"><i class="fa fa-facebook"></i> &nbsp;<strong>Login with Facebook</strong></button></div><div class="form-group separator-text text-center"><span>OR</span></div><div class="form-group"><input type="text" required="" placeholder="Username" class="form-control" value="" id="username" name="log" required></div><div class="form-group"><input type="email" required="" placeholder="Mail" class="form-control" value="" id="mail" name="log"></div><div class="form-group"><input type="password" required="" placeholder="Password" class="form-control" value="" id="password" name="pwd" required></div><!-- Login Button --><div class="form-group"><div class="row"><div class="col-md-12"><span class="descrip"><p class="centrar">Your privacy is important to us and we will never rent or sell your information.</p></span></div><!-- /.col-md-12 --><div class="col-md-12"><span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso" required>Sottoscrivo le <a href="privacy.html" id="permiso">regole sulla privacy del sito.</a></p></span></div><!-- /.col-md-12 --></div><!-- /.row --><div class="row"><div class="col-md-12"><input type="hidden" value="/directory/demo1/" name="redirect_to"><button class="btn btn-block btn-danger" type="submit"><strong>INVIA REGISTRAZIONE</strong></button></div><!-- /.col-md-12 --></div><!-- /.row --></div></form></div><!-- /.modal-body --></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div>'};
var etiquetasLogin = {
	en:{
		'tituloLogin':' Please sign in to your account',
		'contenidoLogin':'Your privacy is of the utmost importance for us: we will never give nor sell your personal data to third parties'
	},
	it:{
		'tituloLogin':'Accedi al tuo account',
		'contenidoLogin':'La tua privacy è molto importante per noi, non cederemo ne venderemo a terzi i tuoi dati personali'
	},
	fr:{
		'tituloLogin':'Accéder à mon compte',
		'contenidoLogin':'Votre vie privée est très importante pour nous , nous ne le donneront pas vendre à des tiers vos informations personnelles'
	},
	ru:{
		'tituloLogin':'Пожалуй�?та войдите в ваши �?лектро�?нергии',
		'contenidoLogin':'Ваша конфиденциально�?ть имеет перво�?тепенное значение дл�? на�?: мы никогда не дают ни продавать ваши личные данные третьим лицам'
	}
};

$('body').append(ModalRegistro[idioma]);
$('body').append(ModalGenerico[idioma]);
$('#login_registrate #login_form').on('submit', function(e) {
	e.preventDefault();
	$("#login_registrate").modal('show');
	$.post('http://services.sanremo-on.com/service/user/format/json', {
		username: $('#login_registrate #username').val(),
		password: $('#login_registrate #password').val(),
		email: $('#login_registrate #mail').val()
	}, function(data, textStatus, xhr) {
		$("#login_registrate").modal('hide');
		if (data.msg == 'Exito') {
			$('#mensajeModal .modal-content').html('Registro effettuato correttamente');
			$('#mensajeModal').modal('show');
		} else {
			$('#mensajeModal .modal-content').html('Error al registrarse intente más tarde');
			$('#mensajeModal').modal('show');
		}
	});
	// document.querySelector('#login_registrate #login_form').reset();
	return false;
});

$("#formularioMail").on('submit', function(e) {
	e.preventDefault();
	var datos = $(this).serialize();
	r = $(this);
	$.post('/service/sendEmail.php', datos, function(data, textStatus, xhr) {
		console.log(data);
		$('#mensajeModal .modal-content').html('Mensaje enviado, Gracias.');
		$('#mensajeModal').modal('show');
		r.get(0).reset();
	});
	return false;
})
$(function() {
	$.get('/service/file.php?method=getLogin', function(data) {
		var data = JSON.parse(data);
		if (data.code) {} else {
			window.usuario = data;
			$(".membership a .hidden-xs").html('Log Out ' + usuario.username);
			// $(".membership a").css('top', '9px');
			// $(".icon-user.ico-mapa-nav2").remove();
			$(".membership a").attr('href', '/service/file.php?method=logout');
			$(".membership a").unbind('click');
			$(".membership a").on('click', function(e) {
				e.preventDefault();
				$.get($(this).attr('href'), function(data) {
					location.reload();
				});

				return false;
			})
			$(".membership a .icon-user").css('color', '#c9840d');
		}

		$('#botonNegro2').on('click', function() {
			return false;
		})
		if (window.usuario) {
			$('#agrega-favorito').show();
			// console.log(microsite);
			setTimeout(function() {
				try {
					$.getJSON('http://services.sanremo-on.com/service/isFavorito/user/' + window.usuario.iduser + '/micro/' + window.microsite.idmicrosite + '/format/json', {}, function(json, textStatus) {
						if (json.res == '1') {
							$('.fa.posicion-heart').removeClass('fa-heart-o');
							$('.fa.posicion-heart').addClass('fa-heart');
						}
					})
				} catch (e) {
					console.log(e);
				}
			}, 500);

			$('.botonNegro2').on('click', function(e) {
				e.preventDefault();
				console.log(usuario);
				if ($('.fa.posicion-heart').hasClass('fa-heart-o')) {
					$.get('http://services.sanremo-on.com/service/addFavorito/user/' + window.usuario.iduser + '/micro/' + window.microsite.idmicrosite, function(data) {
						console.log('Agregado a Favoritos');
						$('#mensajeModal .modal-content').html('Aggiunto ai favoriti');
						$('#mensajeModal').modal('show');

					});
					$('.fa.posicion-heart').removeClass('fa-heart-o');
					$('.fa.posicion-heart').addClass('fa-heart');
				} else {
					$.get('http://services.sanremo-on.com/service/removeFavorito/user/' + window.usuario.iduser + '/micro/' + window.microsite.idmicrosite, function(data) {
						console.log('Eliminado de Favoritos');
						$('#mensajeModal .modal-content').html('Eliminato dai Favoriti');
						$('#mensajeModal').modal('show');
					});
					$('.fa.posicion-heart').removeClass('fa-heart');
					$('.fa.posicion-heart').addClass('fa-heart-o');
				}
				return false;
			});
		} else {
			$('#agrega-favorito').hide();
		}
	});
	$('#login_form').on('submit', function(e) {
		e.preventDefault();
		$.ajax({
				url: '/service/file.php?method=login',
				type: 'POST',
				dataType: 'json',
				data: {
					user: $('#username').val(),
					password: $('#password').val()
				},
			})
			.done(function(data) {
				$("#myModalLabel .close").click();
				if (data.code == 500) {
					$('#mensajeModal .modal-content').html('Error de usuario o contraseña');
					$('#mensajeModal').modal('show');

				} else {
					if (data.code == 200) {
						// alert('Bienvenido ' + data.usuario.username);
						window.usuario = data.usuario;
						$(".membership a .hidden-xs").html('Log Out');
						$(".membership a").attr('href', '/service/file.php?method=logout');
						$(".membership a .icon-user").css('color', '#c9840d');
						location.reload();
					}

				}
			});
		return false;
	});
	$('.well.well-sm').css('cursor', 'pointer');
	$('.well.well-sm').on('click', function() {
		$("#login_panel").modal('hide');
		$("#login_registrate").modal('show');
	})
});
setTimeout(function() {
	$('.cargando').fadeOut('slow', function() {
		$('.membership').show()
	})
}, 1500);



(function(d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/en_US/sdk.js";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// This is called with the results from from FB.getLoginStatus().
function statusChangeCallback(response) {
	console.log('statusChangeCallback');
	console.log(response);
	// The response object is returned with a status field that lets the
	// app know the current login status of the person.
	// Full docs on the response object can be found in the documentation
	// for FB.getLoginStatus().
	if (response.status === 'connected') {
		// Logged into your app and Facebook.
		testAPI();
	} else if (response.status === 'not_authorized') {
		// The person is logged into Facebook, but not your app.
		// document.getElementById('status').innerHTML = 'Please log ' +
		// 	'into this app.';

	} else {

		// The person is not logged into Facebook, so we're not sure if
		// they are logged into this app or not.
		// document.getElementById('status').innerHTML = 'Please log ' +
		// 	'into Facebook.';
	}
}

// This function is called when someone finishes with the Login
// Button.  See the onlogin handler attached to it in the sample
// code below.
function checkLoginState() {
	FB.getLoginStatus(function(response) {
		statusChangeCallback(response);
	});
}
window.fbAsyncInit = function() {
	FB.init({
		appId: '460211527480855',
		cookie: true, // enable cookies to allow the server to access the session
		xfbml: true, // parse social plugins on this page
		version: 'v2.3'
	});

	// Now that we've initialized the JavaScript SDK, we call 
	// FB.getLoginStatus().  This function gets the state of the
	// person visiting this page and can return one of three states to
	// the callback you provide.  They can be:
	//
	// 1. Logged into your app ('connected')
	// 2. Logged into Facebook, but not your app ('not_authorized')
	// 3. Not logged into Facebook and can't tell if they are logged into
	//    your app or not.
	//
	// These three cases are handled in the callback function.
	// FB.getLoginStatus(function(response) {
	// 	statusChangeCallback(response);
	// });
};
$('.btn.btn-block.btn-navy.facebook_connect').on('click', function() {
	FB.getLoginStatus(function(response) {
		if (response.status === 'connected') {
			testAPI();
		} else if (response.status === 'not_authorized') {
			FB.login(function(response) {
				if (response.authResponse) {
					testAPI();
				} else {
					console.log('User cancelled login or did not fully authorize.');
				}
			});
		} else {
			FB.login(function(response) {
				if (response.authResponse) {
					testAPI();
				} else {
					console.log('User cancelled login or did not fully authorize.');
				}
			});
		}
	});

});
// Load the SDK asynchronously


// Here we run a very simple test of the Graph API after login is
// successful.  See statusChangeCallback() for when this call is made.
function testAPI() {
	console.log('Welcome!  Fetching your information.... ');
	FB.api('/me', function(response) {
		// document.getElementById('todo').innerHML = response.stringify();
		console.log(response);
		console.log('Successful login for: ' + response.name);
		console.log('Iniciando sesión en sanremo-On ');
		$.ajax({
				url: '/service/file.php?method=login',
				type: 'POST',
				dataType: 'json',
				data: {
					'user': response.id,
					'password': response.id
				},
			})
			.done(function(data) {
				$("#myModalLabel .close").click();
				if (data.code == 500) {
					$.post('http://services.sanremo-on.com/service/user/format/json', {
						'username': response.name,
						'password': response.id,
						'email': response.id
					}, function(data, textStatus, xhr) {
						$("#login_registrate").modal('hide');
						if (data.msg == 'Exito') {
							$.ajax({
									url: '/service/file.php?method=login',
									type: 'POST',
									dataType: 'json',
									data: {
										'user': response.id,
										'password': response.id
									}
								})
								.done(function(data) {
									$("#myModalLabel .close").click();
									window.usuario = data.usuario;
									$(".membership a .hidden-xs").html('Log Out');
									$(".membership a").attr('href', '/service/file.php?method=logout');
									$(".membership a .icon-user").css('color', '#c9840d');
									location.reload();
								});
						}
					});
				} else {
					if (data.code == 200) {
						// alert('Bienvenido ' + data.usuario.username);
						window.usuario = data.usuario;
						$(".membership a .hidden-xs").html('Log Out');
						$(".membership a").attr('href', '/service/file.php?method=logout');
						$(".membership a .icon-user").css('color', '#c9840d');
						location.reload();
					}

				}
			});


		// document.getElementById('status').innerHTML =
		// 	'Thanks for logging in, ' + response.name + '!';
	});
}

$('#login_panel .texto-popup').html(etiquetasLogin[idioma].tituloLogin);
$('#login_panel .col-md-12:first-child .descrip').html(etiquetasLogin[idioma].contenidoLogin);
// $('.idiomas .en').css('display', 'none');
if(idioma == 'it'){
	$('.idiomas .en').html('<a href="/en" title="English"><img alt="" src="/images/UK.png">English</a>');
}
if(idioma == 'en'){
	$('body').append('<style>#navigation .main li a.dropdown{padding:0 13.5px!important}.guest-services{padding:5 22px!important}</style>');
}


setTimeout(function() {
	$('#mmovil > div#mm-1 > ul.mm-listview.mm-first.mm-last li:last-child').before('<li><a href="'+l[idioma].url+'"><i class="icon-iconosparking blanco size-icon-med"></i><span class="menusito">'+l[idioma].label+'</span></a></li>')
}, 2000);
// // Correcciones URL
// $('.fa.fa-tags').parent().attr('href','/it/news/offerte.html');
// $('.fa.fa-calendar-o').parent().attr('href','/it/news/eventi.html');
// $('.fa.fa-bullhorn').parent().attr('href','/it/news/attualita.html');



