// var tablaDinamica = function(params) {

// }
tablaDinamica = {
	selectorTabla: '',
	tablaOriginal: {},
	filasOriginal: {},
	filas: {},
	columnaCategoria: {},
	columnaNombre: {},
	params: {},
	init: function(params) {
		if (!params)
			return;
		if (!params.tabla)
			return;
		this.selectorTabla = params.tabla + ' tbody';
		this.tablaOriginal = document.querySelector(params.tabla);
		this.filasOriginal = this.tablaOriginal.querySelectorAll('tbody tr');
		this.filas = this.filasOriginal;
		this.columnaCategoria = 2;
		this.columnaNombre = 1;
		this.params = params;
		document.querySelector(params.cuadroBuscar).addEventListener('keyup', this.handler);
		document.querySelector(params.categorias).addEventListener('change', this.handler2);
	},
	handler: function() {
		tablaDinamica.filtrar(this.value, document.querySelector(tablaDinamica.params.categorias).value);
	},
	handler2: function() {
		tablaDinamica.filtrar(document.querySelector(tablaDinamica.params.cuadroBuscar).value, this.value);
	},
	filtrar: function(nombre, categoria) {
		if (!nombre)
			nombre = '';
		if (!categoria)
			categoria = '';
		if (nombre != '' && categoria != '') {
			this.filterByAll(nombre, categoria);
		} else if (nombre != '') {
			this.filterByName(nombre);
		} else {
			this.filterByCategory(categoria);
		}
	},
	filterByAll: function(nombre, categoriaNombre) {
		var nuevaTabla = [];
		var tablaDocument = document.querySelector(this.selectorTabla);
		tablaDocument.innerHTML = '';
		if (nombre == '') {
			for (var i = 0; i < this.filasOriginal.length; i++) {
				var r = this.filasOriginal[i];
				tablaDocument.appendChild(r);
			};
		} else {
			for (var i = 0; i < this.filasOriginal.length; i++) {
				var fila = this.filasOriginal[i];
				var val = fila.querySelector('td:nth-child(' + this.columnaNombre + ')');
				var val2 = fila.querySelector('td:nth-child(' + this.columnaCategoria + ')')
				if (val)
					if (val.innerHTML.toLowerCase().indexOf(nombre.toLowerCase()) != -1 && val2.innerHTML.toLowerCase() == categoriaNombre.toLowerCase()) {
						tablaDocument.appendChild(fila);
					}
			};
		}
	},
	filterByName: function(nombre) {
		var nuevaTabla = [];
		var tablaDocument = document.querySelector(this.selectorTabla);
		tablaDocument.innerHTML = '';
		if (nombre == '') {
			for (var i = 0; i < this.filasOriginal.length; i++) {
				var r = this.filasOriginal[i];
				tablaDocument.appendChild(r);
			};
		} else {
			for (var i = 0; i < this.filasOriginal.length; i++) {
				var fila = this.filasOriginal[i];
				var val = fila.querySelector('td:nth-child(' + this.columnaNombre + ')');
				if (val)
					if (val.innerHTML.toLowerCase().indexOf(nombre.toLowerCase()) != -1) {
						tablaDocument.appendChild(fila);
					}
			};
		}
	},
	filterByCategory: function(categoriaNombre) {
		var nuevaTabla = [];
		var tablaDocument = document.querySelector(this.selectorTabla);
		tablaDocument.innerHTML = '';
		if (categoriaNombre == '') {
			for (var i = 0; i < this.filasOriginal.length; i++) {
				var r = this.filasOriginal[i];
				tablaDocument.appendChild(r);
			};
		} else {
			for (var i = 0; i < this.filasOriginal.length; i++) {
				var fila = this.filasOriginal[i];
				var val = fila.querySelector('td:nth-child(' + this.columnaCategoria + ')');
				if (val)
					if (val.innerHTML.toLowerCase() == categoriaNombre.toLowerCase()) {
						tablaDocument.appendChild(fila);
					}
			};
		}
	}
}