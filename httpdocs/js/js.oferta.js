
//paloma-> funcion que controla el idioma de las paginas si no es uno de los instanciados pone por defecto italiano
function validaridioma(idioma){
    if (idioma==='ru'||idioma==='it'||idioma==='en'||idioma==='fr'){
         return idioma;
    }else {
       
          return 'it';
    }
}

$('nav#mmovil').mmenu();
var idioma = Tools.extraerUrl().idioma;
Tools.cargarPrincipal({
	url:'//services.sanremo-on.com/service/oferta/url/'+Tools.extraerUrl().url+'/format/json',
	method : 'get',
	json : true,
	callback : function(data, textStatus, xhr){

		//Campos tipo VARCHAR

		// fecha = data.fechainicio.trim().split('-');
		// f1 = fecha[0].trim().split('/');
		// f2 = fecha[1].trim().split('/');
		// newfecha = f1[1]+'/'+f1[0]+'/'+f1[2] + ' - '+f2[1]+'/'+f2[0]+'/'+f2[2];

		//Campos tipo DATE

		f1 = data.fechainicio.trim().split('-');
		f2 = data.fechafin.trim().split('-');
		newfecha = f1[2]+'/'+f1[1]+'/'+f1[0] + ' - '+f2[2]+'/'+f2[1]+'/'+f2[0];
		
		$('title').html(JSON.parse(data.title)[validaridioma(idioma)].capitalize());
		$('[data-field="nombre"]').html(JSON.parse(data.nombre)[validaridioma(idioma)]);
		$('[data-field="fecha"]').html(newfecha);
		$('[data-field="oferta"]').html(data.porcentaje !== '' ?  data.porcentaje + '% SCONTO' : '');
		$('[data-field="descripcion"]').html(JSON.parse(data.descripcion)[validaridioma(idioma)]);
		$('[data-field="body"]').attr('src', Tools.baseAdmin+'public/uploads/ofertas/'+data.imagenbody);
		$('[name="description"]').attr('content', JSON.parse(data.description)[validaridioma(idioma)]);
	},
	error: function(){
	}
});