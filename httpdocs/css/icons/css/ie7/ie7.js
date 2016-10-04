/* To avoid CSS expressions while still supporting IE 7 and IE 6, use this script */
/* The script tag referencing this file must be placed before the ending body tag. */

/* Use conditional comments in order to target IE 7 and older:
	<!--[if lt IE 8]><!-->
	<script src="ie7/ie7.js"></script>
	<!--<![endif]-->
*/

(function() {
	function addIcon(el, entity) {
		var html = el.innerHTML;
		el.innerHTML = '<span style="font-family: \'icomoon\'">' + entity + '</span>' + html;
	}
	var icons = {
		'icon-iconosaereo': '&#xe60c;',
		'icon-iconosbussola': '&#xe60d;',
		'icon-iconoscar': '&#xe60e;',
		'icon-iconoslettera': '&#xe60f;',
		'icon-iconosmondo': '&#xe610;',
		'icon-iconosparking': '&#xe611;',
		'icon-iconostreno': '&#xe612;',
		'icon-iconoswebcam': '&#xe613;',
		'icon-negozi': '&#xe600;',
		'icon-food-drink': '&#xe601;',
		'icon-iconos-03': '&#xe602;',
		'icon-cinema-e-spettacoli': '&#xe603;',
		'icon-tempo-libero': '&#xe604;',
		'icon-user': '&#xe605;',
		'icon-mappa': '&#xe606;',
		'icon-calendario': '&#xe607;',
		'icon-categori': '&#xe608;',
		'icon-carta-di-credito': '&#xe609;',
		'icon-parking': '&#xe60a;',
		'icon-location': '&#xe60b;',
		'0': 0
		},
		els = document.getElementsByTagName('*'),
		i, c, el;
	for (i = 0; ; i += 1) {
		el = els[i];
		if(!el) {
			break;
		}
		c = el.className;
		c = c.match(/icon-[^\s'"]+/);
		if (c && icons[c[0]]) {
			addIcon(el, icons[c[0]]);
		}
	}
}());
