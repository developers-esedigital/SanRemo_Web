var Tools = {
	base: 'http://sanremo-on.com/',
	baseAdmin: 'http://admin.sanremo-on.com/',
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
	corregirURL: function() {
		$('img').each(function(index, el) {
			$(el).attr('src', Tools.base + $(el).attr('src'));
		});
	},
	getIdioma: function(){
		var currentUrl = window.location.href;
		return{
			idioma : currentUrl.split('/')[3]
		}
	},
	extraerUrls: function() {
		var currentUrl = window.location.href;
		var variables = currentUrl.split('/');
		return {
			idioma: variables[3],
			url: variables[variables.length - 1].split('.')[0]
		};
	},
	extraerUrl: function() {
		var currentUrl = window.location.href;
		var variables = currentUrl.split('/');
		return {
			idioma: variables[3],
			url: variables[variables.length - 1].split('.')[0]
		};
	},
	extraerCat: function() {
		var currentUrl = window.location.href;
		var variables = currentUrl.split('/');
		return variables[variables.length - 2];
	},
	catToText: function(number) {
		switch (number) {
			case 1:
				return 'Negozi';
			case 2:
				return 'ristoranti-bar';
			case 3:
				return 'tempo-libero-e-benessere';
			case 4:
				return 'spettacoli-cinema';
			case 5:
				return 'hotel';
		}
	},
	textToCat: function(cat) {
		if (cat == 'negozi')
			return 1;
		if (cat == 'ristoranti-bar')
			return 2;
		if (cat == 'tempo-libero-e-benessere')
			return 4;
		if (cat == 'spettacoli-cinema')
			return 5;
		if (cat == 'hotel')
			return 3;
	},
	extraerCategoria: function() {
		var currentUrl = window.location.href;
		var variables = currentUrl.split('/');
		var urlVars = {};
		if (variables[variables.length - 1] == 'negozi')
			urlVars.categoria = 1
		if (variables[variables.length - 1] == 'ristoranti-bar')
			urlVars.categoria = 2
		if (variables[variables.length - 1] == 'tempo-libero-e-benessere')
			urlVars.categoria = 4
		if (variables[variables.length - 1] == 'spettacoli-cinema')
			urlVars.categoria = 5
		if (variables[variables.length - 1] == 'hotel')
			urlVars.categoria = 3
		return urlVars;
	},
	getCategoria: function() {
		var currentUrl = window.location.href;
		var variables = currentUrl.split('/');
		return variables[variables.length - 1];
	},
	getCategoriaLabel : function(){
		var currentUrl = window.location.href;
		var variables = currentUrl.split('/');
		var id = variables[3];
		//alert(currentUrl);
		console.log(currentUrl.split('/'));
		switch(id){
			case 'fr':
				if(variables[variables.length - 1] == 'negozi')
					return 'shopping';
				if(variables[variables.length - 1] == 'ristoranti-bar')
					return 'food & drink';
				if(variables[variables.length - 1] == 'hotel')
					return 'HÉBERGEMENTS';
				if(variables[variables.length - 1] == 'tempo-libero-e-benessere')
					return 'LOISIRS ET BIEN-ÊTRE';
				if(variables[variables.length - 1] == 'spettacoli-cinema')
					return 'SPECTACLES ET CINÉMA';
				return variables[variables.length - 1];	
				break;

				case 'ru':
					if(variables[variables.length - 1] == 'negozi')
						return 'МАГАЗИНЫ';
					if(variables[variables.length - 1] == 'ristoranti-bar')
						return 'ЕДА&НАПИТКИ';
					if(variables[variables.length - 1] == 'hotel')
						return 'УДОБСТВА';
					if(variables[variables.length - 1] == 'tempo-libero-e-benessere')
						return 'СВОБОДНОЕ ВРЕМЯ И БЛАГОПОЛУЧИЕ';
					if(variables[variables.length - 1] == 'spettacoli-cinema')
						return 'СПЕКТАКЛИ И КИНО';
					return variables[variables.length - 1];	
					break;

					case 'en':
						if(variables[variables.length - 1] == 'negozi')
							return 'shopping';
						if(variables[variables.length - 1] == 'ristoranti-bar')
							return 'Restaurant Bar';
						if(variables[variables.length - 1] == 'hotel')
							return 'Accomodation';
						if(variables[variables.length - 1] == 'tempo-libero-e-benessere')
							return 'free time and wellness';
						if(variables[variables.length - 1] == 'spettacoli-cinema')
							return 'shows & cinema';
						return variables[variables.length - 1];	
						break;
			default:
				if(variables[variables.length - 1] == 'hotel')
					return 'accomodation';
				if(variables[variables.length - 1] == 'ristoranti-bar')
					return 'food & drink';
				if(variables[variables.length - 1] == 'spettacoli-cinema')
					return 'spettacoli e cinema';
				return variables[variables.length - 1];	
				break;
		}
		/*if(variables[variables.length - 1] == 'hotel')
			return 'accomodation';
		if(variables[variables.length - 1] == 'ristoranti-bar')
			return 'food & drink';
		if(variables[variables.length - 1] == 'spettacoli-cinema')
			return 'spettacoli e cinema';
		return variables[variables.length - 1];	*/
	},
	extraerVariables: function() {
		var currentUrl = window.location.hash.substr(1);
		var variables = currentUrl.split('&');
		var urlVars = {};
		for (var i = 0; i < variables.length; i++) {
			var item = variables[i];
			eval('urlVars.' + item);
		};
		return urlVars;
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
					Tools.cargarPrincipal({
						url: $(this).attr('href'),
						json: true,
						callback: function(data) {
							if (data.code == 200)
								Tools.cargarPrincipal({
									url: data.url
								});
							else if (data.code == 500)
								Tools.notificacion('top', 'Error al borrar', 'alert')
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
					Tools.cargarPrincipal({
						url: this.href
					});
				else
					Tools.cargarPrincipal({
						url: this.href,
						elemento: $(this).attr('data-load')
					});

				return false;
			});
		});
	},
	clearStr: function(cadena) {
		if (cadena) {
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
			cadena = cadena.replaceArray(
				['&','\''], ['','']
			);
			cadena = cadena.replaceArray([' '], ['-']);
		}
		return cadena;
	},
	mezclar: function(o) {
		for (var j, x, i = o.length; i; j = Math.floor(Math.random() * i), x = o[--i], o[i] = o[j], o[j] = x);
		return o;
	},
	cargarPrincipal: function(params) {
		// params maximos { url , params, append, callback, json,elemento,method}
		if (!params.params)
			params.params = {};
		if (!params.append)
			params.append = false;
		if (!params.json)
			params.json = false;
		if (!params.method)
			params.method = 'post';
		if (!params.elemento)
			params.elemento = '.mainSection';
		if (!params.asyn)
			params.asyn = true;
		Tools.createLoader(params.elemento);

		$.ajaxSetup({
			async: params.asyn
		});
		switch (params.method) {
			case 'post':
				$.post(params.url, params.params, function(data, textStatus, xhr) {
					Tools.removeLoader(params.elemento);
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
				}).fail(function() {
					if (typeof(params.error) == 'function') {
						params.error();
					}
				});
				break;
			case 'get':
				$.get(params.url, params.params, function(data, textStatus, xhr) {
					Tools.removeLoader(params.elemento);
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
				}).fail(function() {
					if (typeof(params.error) == 'function') {
						params.error();
					}
				});
				break;
		}
	}
}
// Sort para microsites
function ascendente(a, b) {

	if (JSON.parse(a.nombre).it.toLowerCase() < JSON.parse(b.nombre).it.toLowerCase())
		return -1;
	if (JSON.parse(a.nombre).it.toLowerCase() > JSON.parse(b.nombre).it.toLowerCase())
		return 1;
	return 0;
}
function descendente(a, b) {
	if (JSON.parse(a.nombre).it.toLowerCase() < JSON.parse(b.nombre).it.toLowerCase())
		return 1;
	if (JSON.parse(a.nombre).it.toLowerCase() > JSON.parse(b.nombre).it.toLowerCase())
		return -1;
	return 0;
}
Array.prototype.mezclar = function() {
    var input = this;
     
    for (var i = input.length-1; i >=0; i--) {
     
        var randomIndex = Math.floor(Math.random()*(i+1)); 
        var itemAtIndex = input[randomIndex]; 
         
        input[randomIndex] = input[i]; 
        input[i] = itemAtIndex;
    }
    return input;
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
Array.prototype.unique = function(inputArr) {
	var key = '',
		tmp_arr2 = {},
		val = '';

	var __array_search = function(needle, haystack) {
		var fkey = '';
		for (fkey in haystack) {
			if (haystack.hasOwnProperty(fkey)) {
				if ((haystack[fkey] + '') === (needle + '')) {
					return fkey;
				}
			}
		}
		return false;
	};

	for (key in inputArr) {
		if (inputArr.hasOwnProperty(key)) {
			val = inputArr[key];
			if (false === __array_search(val, tmp_arr2)) {
				tmp_arr2[key] = val;
			}
		}
	}

	return tmp_arr2;
};