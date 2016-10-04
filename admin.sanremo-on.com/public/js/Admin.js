var tools = {
	notificacion: function(layout, msg, type) {
		var n = noty({
			text: msg,
			type: type,
			// dismissQueue: true,
			timeout: '2000',
			layout: 'top',
			theme: 'defaultTheme'
		});
		console.log('html: ' + n.options.id);
	},
	scrollTo: function(selector) {
		$('html,body').animate({
				scrollTop: $(selector).offset().top - 300
			},
			'slow');
	},
	initCondicion: function() {
		$('[data-condicion]').each(function(index, el) {
			$(el).on('click', function(evt) {
				evt.preventDefault();
				if (confirm($(this).attr('data-mensaje')))
					window.location = $(this).attr('href');
				return false;
			});
		});
		$('[data-condicion-ajax]').each(function(index, el) {
			$(el).on('click', function(evt) {
				evt.preventDefault();
				if (confirm($(this).attr('data-mensaje'))) {
					tools.cargarPrincipal({
						url: $(this).attr('href'),
						json: true,
						callback: function(data) {
							if (data.code == 200)
								tools.cargarPrincipal({
									url: data.url
								});
							else if (data.code == 500)
								tools.notificacion('top', 'Error al borrar', 'alert')
						}
					});
					return false;
				}
				return false;
			});
		})
	},
	createLoader: function(div, append) {
		if (append)
			$(div).append('<div class="loader"><i class="fa fa-spinner fa-pulse"></i></div>');
		else
			$(div).html('<div class="loader"><i class="fa fa-spinner fa-pulse"></i></div>');
	},
	removeLoader: function(div) {
		$(div).find('.loader').remove();
	},
	initLinkMagicos: function() {
		$('[data-type="ajax"]').each(function(index, el) {
			$(el).unbind('click');
			$(el).on('click', function(evt) {
				evt.preventDefault();
				if ($(this).attr('data-load') == 'principal')
					tools.cargarPrincipal({
						url: this.href
					});
				else
					tools.cargarPrincipal({
						url: this.href,
						elemento: $(this).attr('data-load')
					});

				return false;
			});
		});
	},
	clearStr: function(cadena) {
		cadena = cadena.trim();
		cadena = cadena.replaceArray(
			['á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'], ['a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A']
		);

		cadena = cadena.replaceArray(
			['é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'], ['e', 'e', 'e', 'e', 'E', 'E', 'E', 'E']
		);

		cadena = cadena.replaceArray(
			['í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'], ['i', 'i', 'i', 'i', 'I', 'I', 'I', 'I']
		);

		cadena = cadena.replaceArray(
			['ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'], ['o', 'o', 'o', 'o', 'O', 'O', 'O', 'O']
		);

		cadena = cadena.replaceArray(
			['ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'], ['u', 'u', 'u', 'u', 'U', 'U', 'U', 'U']
		);

		cadena = cadena.replaceArray(
			['ñ', 'Ñ', 'ç', 'Ç'], ['n', 'N', 'c', 'C']
		);
		cadena = cadena.replaceArray([' '], ['-']);
		return cadena;
	},
	cargarPrincipal: function(params) {
		// params maximos { url , params, append, callback, json,elemento}
		if (!params.params)
			params.params = {};
		if (!params.append)
			params.append = false;
		if (!params.json)
			params.json = false;
		if (!params.elemento)
			params.elemento = '.mainSection';
		tools.createLoader(params.elemento);
		$.post(params.url, params.params, function(data, textStatus, xhr) {
			tools.removeLoader(params.elemento);
			console.log(params.url);
			if (params.json === false) {
				if (params.append) {
					$(params.elemento).append(data);
				} else {
					$(params.elemento).html(data);
				}
			}
			if (typeof(params.callback) == 'function') {
				params.callback(data, textStatus, xhr);
			}
		});
	}
}

String.prototype.capitalize = function() {
	return this.charAt(0).toUpperCase() + this.slice(1);
}
String.prototype.replaceArray = function(find, replace) {
	var replaceString = this;
	var regex;
	for (var i = 0; i < find.length; i++) {
		regex = new RegExp(find[i], "g");
		replaceString = replaceString.replace(regex, replace[i]);
	}
	return replaceString;
};
/*TEST of tools*/
tools.initLinkMagicos();
tools.initCondicion();
// tools.cargarPrincipal({
// 	url: base_url+'admin/dashboard'
// });
// tools.createLoader('.mainSection');
// setTimeout(function(){tools.removeLoader('.mainSection')},3000);