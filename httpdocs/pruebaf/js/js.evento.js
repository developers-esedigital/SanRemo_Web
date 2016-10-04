function validaridioma(idioma){
    if (idioma==='ru'||idioma==='it'||idioma==='en'||idioma==='fr'){
         return idioma;
    }else {
       
          return 'it';
    }
}
alert("entro evento");
var d ="";
//paloma-> instancio la funcion validaridioma() donde esta idioma lo sustituyo por la funcion que hemos creado
$('nav#mmovil').mmenu();
var idioma = Tools.extraerUrl().idioma;
Tools.cargarPrincipal({
	url:'//services.sanremo-on.com/service/evento/url/'+Tools.extraerUrl().url+'/format/json',
	method : 'get',
	json : true,
	callback : function(data, textStatus, xhr){
		fecha = data.fechainicio.trim().split('-');
		f1 = fecha[0].trim().split('/');
		f2 = fecha[1].trim().split('/');
		newfecha = f1[1]+'/'+f1[0]+'/'+f1[2] + ' - '+f2[1]+'/'+f2[0]+'/'+f2[2];
		$('title').html(JSON.parse(data.title)[validaridioma(idioma)].capitalize());
		//$('#dir').html(JSON.parse(data.dir).capitalize());
		$('[data-field="nombre"]').html(' Indirizzo: '+data.dir+JSON.parse(data.nombre)[validaridioma(idioma)]);
		$('[data-field="fecha"]').html(newfecha);
		$('[data-field="descripcion"]').html(JSON.parse(data.descripcion)[validaridioma(idioma)]);
		$('[data-field="body"]').attr('src', Tools.baseAdmin+'public/uploads/evento/'+data.fotobody);
		$('[name="description"]').attr('content', JSON.parse(data.description)[validaridioma(idioma)]);
		//$('[data-field="direccion"]').html( JSON.parse(data.dir));

			console.log(data.dir);
	},
	error: function(){
	}
});
