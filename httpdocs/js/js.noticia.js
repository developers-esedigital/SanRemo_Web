//paloma-> funcion que controla el idioma de las paginas si no es uno de los instanciados pone por defecto italiano
function validaridioma(idioma){
    if (idioma==='ru'||idioma==='it'||idioma==='en'||idioma==='fr'){
    	//alert(idioma);
         return idioma;

    }else {
       
          return 'it';
    }
}

$('nav#mmovil').mmenu();
var idioma = Tools.extraerUrl().idioma;
console.log(Tools.extraerUrl().url);
Tools.cargarPrincipal({
	url:'//services.sanremo-on.com/service/noticia/url/'+Tools.extraerUrl().url+'/format/json',
	method : 'get',
	json : true,
	callback : function(data, textStatus, xhr){

		//Campos tipo DATE

		fecha = data.fechainicio.trim();
		f1 = fecha.trim().split('-');
		newfecha = f1[2]+'/'+f1[1]+'/'+f1[0];

		//Campos tipo VARCHAR

		// fecha = data.fechainicio.trim();
		// f1 = fecha.trim().split('/');
		// //f2 = fecha[1].trim().split('/');
		// newfecha = f1[1] + '/' + f1[0] + '/' + f1[2];

		$('title').html(JSON.parse(data.title)[validaridioma(idioma)].capitalize());
		$('[data-field="nombre"]').html(JSON.parse(data.nombre)[validaridioma(idioma)]);
		$('[data-field="fecha"]').html(newfecha);
		//console.log(JSON.parse(data.descripcion));
		$('[data-field="descripcion"]').html(JSON.parse(data.descripcion)[validaridioma(idioma)]);
		$('[data-field="body"]').attr('src', Tools.baseAdmin+'public/uploads/noticia/'+data.imagenbody);
		$('[name="description"]').attr('content', JSON.parse(data.description)[validaridioma(idioma)]);
	},
	error: function(){
	}
});