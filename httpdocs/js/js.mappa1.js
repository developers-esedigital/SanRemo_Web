var templatePlace = '<div class="place"><div class="%marker%"><img src="%logo%" alt=""><span class="numero">%number%</span></div><div class="titulo"><a href="%href%" class="titulo-pop-map"><strong class="strong-1">%title%</strong></a></div><div class="tipo"><span class="logo %color%"><i class="%logocategoria% loguito"></i><span class="texto-cate">%categoria%</span></span></div><div class="contenido"><p class="direccion">%direccion%</p><p class="telefono"><i class="fa fa-phone"></i> %telefono%</p><p class="correo"><img src="/images/Arroba.png" alt=""><a class="link-naranja" href="mailto: %correo%"> %correo%</a></p></div></div>';
var map;
window.map = map;
var mcOptions = {gridSize: 80, maxZoom: 17};
var idiomass=Tools.extraerUrls().idioma;
var mapaMessages = {
    it:{
        'micrositeSinOferta':'Non ci sono Microsites con offerte',
        'sinMicrosites':'Non ci sono microsites',
        'sinMicrositesCategoria':'Non ci sono microsite presenti in questa categoria'
    },
    en:{
        'micrositeSinOferta':'There aren’t any microsites with offers',
        'sinMicrosites':'There aren’t any microsites',
        'sinMicrositesCategoria':'There aren’t any microsites in this category'
    },
     fr:{
        'micrositeSinOferta':'Il n\'ya pas des microsites avec offres',
        'sinMicrosites':'Il n\'ya pas des microsites',
        'sinMicrositesCategoria':'Il n\'ya pas des microsites dans cette catégorie'
    },
    ru:{
        'micrositeSinOferta':'Есть не любые микросайты с предложениями',
        'sinMicrosites':'Есть не любые микросайты',
        'sinMicrositesCategoria':'В этой категории нет каких-либо микросайты'
    }

}

function validaridioma(idioma){
    if (idioma==='ru'||idioma==='it'||idioma==='en'||idioma==='fr'){
         return idioma;
    }else {
       
          return 'it';
    }
}
var helper = {
    color: '',
    getTextTipo: function(p) {
        switch (p) {
            case 1:
            //alert(idiomass);

            switch(idiomass){
                case "it":
                    return "negozi";
                    break;

                    case "en":
                    return "shopping";
                    break;

                    case "fr":
                    return "shopping";
                    break;

                    case "ru":
                    return "Магазины";
                    break;


               
            }
            
                
            case 2:
            switch(idiomass){
                case "it":
                    return "ristoranti-bar";
                    break;

                    case "en":
                    return "restaurants";
                    break;

                    case "fr":
                    return "Restaurants";
                    break;

                    case "ru":
                    return "Рестораны";
                    break;


               
            }
                
            case 3:
                switch(idiomass){
                    case "it":
                        return "hotel";
                        break;

                        case "en":
                        return "hotel";
                        break;

                        case "fr":
                        return "Hôtel";
                        break;

                        case "ru":
                        return "Гостиница";
                        break;


                   
                }
            case 4:
                switch(idiomass){
                    case "it":
                        return "tempo-libero e benessere";
                        break;

                        case "en":
                        return "tempo-libero e benessere";
                        break;

                        case "fr":
                        return "LOISIRS ET BIEN-ETRE";
                        break;

                        case "ru":
                        return "СВОБОДНОЕ ВРЕМЯ И БЛАГОПОЛУЧИЕ";
                        break;


                   
                }
            case 5:
                switch(idiomass){
                    case "it":
                        return "spettacoli e cinema";
                        break;

                        case "en":
                        return "spettacoli e cinema";
                        break;

                        case "fr":
                        return "SPECTACLES ET CINEMA";
                        break;

                        case "ru":
                        return "СПЕКТАКЛИ И КИНО";
                        break;


                   
                }
        }
    },
    getClassTipo: function(tipo) {
        switch (tipo) {
            case 1:
                this.color = 'orange';
                break;
            case 2:
                this.color = 'red';
                break;
            case 3:
                this.color = 'purple';
                break;
            case 4:
                this.color = 'green';
                break;
        }
        return this.color;
    },

    getImgTipo: function(img, tipo) {
        var rr = '',
            r = '';
        switch (img) {
            case 1:
                rr = 'icon-negozi';
                break;
            case 2:
                rr = 'icon-food-drink';
                break;
            case 3:
                rr = 'icon-iconos-03';
                break;
            case 4:
                rr = 'icon-tempo-libero';
                break;
            case 5:
                rr = 'icon-cinema-e-spettacoli';
                break;
        }

        switch (tipo) {
            case 1:
                r = 'orange';
                break;
            case 2:
                r = 'red';
                break;
            case 3:
                r = 'purple';
                break;
            case 4:
                r = 'green';
                break;
        }
        return rr + ' ' + r;
        // return control == 0 ? rr + ' orange' : rr + ' red';
    }
};
var Microsites = {};
//saca el idioma de la url
var idioma = Tools.extraerUrls().idioma;
var tools = {
    isRetina: function() {
        if (window.devicePixelRatio > 1)
            return true;
        return false;
    }
}
var logoMarker = {
    retina: ['/images/Posicion-naranja@2.png', 'images/Posicion@2.png'],
    normal: ['/images/Posicion-naranja.png', 'images/Posicion.png'],
    logo: '/images/Posicion-naranja@2.png',
    getLogo: function(index) {
        return this.logo;
        // if(tools.isRetina())
        // 	return this.retina[index];
        // return this.normal[index];
    }
};
// Tools.corregirURL();
$('nav#mmovil').mmenu();

$('.selectpicker').selectpicker({
    size: '50%'
});

$("#categoria").on('change', function() {
    if ($(this).val() != '')
        pintarMicrosites($(this).val());
    $(this).prop('selectedIndex', 0)
    $(this).selectpicker('refresh');
})

$('.mmenuSec').on('click', function(evt) {
    evt.preventDefault();
    var me = $(this);
    if ($(this).hasClass('mmenuSecHovered')) {
        $('.mmenuSecHovered').toggleClass('mmenuSecHovered');
        $('.extras.container.active').removeClass('active');
        $('.extras.container').fadeOut('normal');
    } else {
        $('.mmenuSecHovered').toggleClass('mmenuSecHovered');
        $(this).toggleClass('mmenuSecHovered');
        if ($(this).hasClass('mmenuSecHovered')) {
            $('.extras.container.active').removeClass('active');
            $('.extras.container').fadeOut('normal')
            $('#' + $(this).data('submenu')).fadeIn('normal');
            $('#' + me.data('submenu')).addClass('active');
        } else {
            $('.extras.container.active').removeClass('active');
            $('.extras.container').fadeOut('normal');
        }
    }
    return false;
});



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
$('#whereiam').on('click', function(evt) {
    navigator.geolocation.getCurrentPosition(function(lugar) {
        // tuposicio@2
        var icono = new google.maps.MarkerImage('/images/tuposicio@2.png', null, null, null, new google.maps.Size(32, 41));
        var latitude = lugar.coords.latitude;
        var longitude = lugar.coords.longitude;
        var posicion = new google.maps.LatLng(latitude, longitude);
        var me = new google.maps.Marker({
            position: posicion,
            map: window.map,
            title: 'Yo',
            icon: icono
        });
        google.maps.event.trigger(window.map, 'resize');
        console.log(window.map.getMarkers());
        var mc = new MarkerClusterer(window.map,window.map.getMarkers(),mcOptions);
        window.map.setCenter(posicion);
        window.map.setZoom(17);
    });
});

Tools.cargarPrincipal({
    url: '//services.sanremo-on.com/service/microsites/format/json',
    method: 'get',
    json: true,
    callback: function(data, textStatus, xhr) {
        window.Microsites = data;
        idioma = Tools.extraerUrls().idioma;
        idiomass = idioma;
        var mapa = [];
        var aux = 0;
        data.mezclar();
        for (var i = 0; i < data.length; i++) {
            var item = data[i];
            if (item.estatus == 1) {
                aux++;
                var elemento = {};
                elemento.latlon = new google.maps.LatLng(item.puntogoogle.split(',')[0], item.puntogoogle.split(',')[1]);
                //cuando es fr le reasignamos el idioma

                elemento.title = JSON.parse(item.nombre)[validaridioma(idioma)];



                elemento.icon = logoMarker.getLogo(control);
                elemento.num = aux;
                noms = JSON.parse(item.nombre);
                //paloma
                console.log(JSON.parse(item.descripcion)[validaridioma(idioma)]);
                elemento.contenido = {
                    imagen: '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logo + 'gris').toString(),
                    tipo: $.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk))),
                    tipoImage: helper.getImgTipo(parseInt(item.categoriafk[0].categoriafk)),
                    descripcion: JSON.parse(item.descripcion)[validaridioma(idioma)].substring(0, 100) + '...',
                    direccion: item.direccion,
                    colorCategoria: helper.getClassTipo(1),
                    telefono: item.telefono,
                    correo: item.email,
                    href: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html',
                    micro: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html'
                }
                //cambio para solucionar problema de idiomas creamos la variable en blanco para el frances y para it y en el codigo anterior
               /* if(idioma==='fr'){
                    elemento.contenido['descripcion']='';
                    elemento.contenido['href']= '//sanremo-on.com/it/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)['it'] + '.html';
                    elemento.contenido['micro']='//sanremo-on.com/it/'  + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)['it'] + '.html';
                }
                else{

                    elemento.contenido['descripcion']=JSON.parse(item.descripcion)[idioma].substring(0, 100) + '...';
                    elemento.contenido['href']='//sanremo-on.com/' + idioma + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)[idioma] + '.html';
                    elemento.contenido['micro']='//sanremo-on.com/' + idioma + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)[idioma] + '.html';

                }*/


                mapa.push(elemento);

            }
        };
        $('[data-field="numeroTotal"]').html(aux);
        window.places = mapa;
        // window.map.clearMarkers();
        initialize();

        //se crean las  categorias segun el idioma  
        micro = [];
        for (var i = 0; i < data.length; i++) {
            item = data[i];

            micro.push({
                ids: item.idmicrosite,
                name: JSON.parse(item.nombre)[validaridioma(idioma)],
                categoria: item.categoriafk[0].categoriafk,
                logo: JSON.parse(item.url)[validaridioma(idioma)]

            });
            /*if(idioma==='fr'){
                micro.push['name']=JSON.parse(item.nombre)['it'];
                micro.push['logo']=JSON.parse(item.url)['it'];
            }else{
                micro.push['name']=JSON.parse(item.nombre)[idioma];
                micro.push['logo']=JSON.parse(item.url)[idioma];

            }
            console.log(micro);*/
        };

        $('.search.form-control').typeahead({
            source: micro,
            valueKey: 'label',
            updater: function(items) {
                // window.location = '//doffice.com.mx/' + idioma + '/' + helper.getTextTipo(parseInt(item.categoria)) + '/' + item.logo + '.html';
                window.map.clearMarkers();
                $('.lugares > .resMapa').html('');
                Tools.cargarPrincipal({
                    url: '//services.sanremo-on.com/service/microsite/id/' + items.ids + '/format/json',
                    method: 'get',
                    json: true,
                    callback: function(data, textStatus, xhr) {
                        var item = data;
                        var myLatlng = new google.maps.LatLng(43.818448, 7.770756);
                        var mapOptions = {
                            zoom: 13,
                            center: myLatlng
                        }
                        map = new google.maps.Map(document.querySelector('.mapaG'), mapOptions);
                        window.map = map;
                        window.map.clearMarkers();
                        logoMarker.logo = '/images/Posicion-naranja@2.png';
                        var icono = new google.maps.MarkerImage(logoMarker.getLogo(control), null, null, null, new google.maps.Size(32, 41));
                        // var marker = new google.maps.Marker({
                        // 	position: new google.maps.LatLng(data.puntogoogle.split(',')[0], data.puntogoogle.split(',')[1]),
                        // 	map: window.map,
                        // 	title: JSON.parse(data.nombre)[idioma],
                        // 	icon: icono
                        // });
                        var markers = [];
                        var marker = new MarkerWithLabel({
                            position: new google.maps.LatLng(data.puntogoogle.split(',')[0], data.puntogoogle.split(',')[1]),
                            map: window.map,
                            icon: icono,
                            draggable: false,
                            raiseOnDrag: false,
                            labelContent: 1,
                            labelAnchor: new google.maps.Point(3, 30),
                            labelClass: "labels", // the CSS class for the label
                            labelInBackground: false
                        });
                        var infowindow = new google.maps.InfoWindow();
                        google.maps.event.addListener(marker, 'click', function() {
                            var contenido = '<div class="marker"><img src="%logo%" alt="%title%" /><div class="contenedor-pop"><span class="titulo"><a href="%microsite%" class="titulo-pop-map"><strong clas="strong-2">%title%</strong></a></span><div class="tipo %className%"><span class="%logoTipo% %color% size-icon tipoI"></span> %nombreTipo%</div><p class="contenido-mapa"><div class="cont-izq">%contenido%</div></p> </div><a href="%microsite%" class="btn boton-pop %colorBoton%">'+(idioma == 'it' ?  'GUARDA' : 'VIEW') + '</a></div>';
                            var nContenido = contenido.replace('%logo%', '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo + 'gris').toString());
                            nContenido = nContenido.replace(/%title%/gi, JSON.parse(data.nombre)[validaridioma(idioma)]);
                            nContenido = nContenido.replace('%logoTipo%', helper.getImgTipo(parseInt(item.categoriafk[0].categoriafk)));
                            nContenido = nContenido.replace('%nombreTipo%', $.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk))));
                            nContenido = nContenido.replace('%contenido%', JSON.parse(item.descripcion)[validaridioma(idioma)].substring(0, 100) + '...');
                            nContenido = nContenido.replace('%className%', helper.getClassTipo(1));
                            nContenido = nContenido.replace(/%color%/gi, helper.getClassTipo(1));
                            nContenido = nContenido.replace(/%colorBoton%/gi, helper.getClassTipo(1));
                            nContenido = nContenido.replace(/%microsite%/gi, '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html');

                            infowindow.setContent(nContenido);
                            infowindow.close();
                            infowindow.open(window.map, marker);
                        });

                        markers.push(marker);
                        var contenido = templatePlace.replace('%logo%', logoMarker.getLogo(control));
                        contenido = contenido.replace('%number%', 1);
                        contenido = contenido.replace('%marker%','markerr');
                        contenido = contenido.replace('%href%', '//sanremo-on.com/' + idioma + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html');
                        console.log(item.nombre);
                        contenido = contenido.replace(/%title%/gi, JSON.parse(item.nombre)[validaridioma(idioma)]);
                        contenido = contenido.replace('%telefono%', item.telefono);
                        contenido = contenido.replace(/%correo%/gi, item.email);
                        contenido = contenido.replace('%logocategoria%', helper.getImgTipo(parseInt(item.categoriafk[0].categoriafk)));
                        contenido = contenido.replace('%categoria%', $.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))+"hola");
                        contenido = contenido.replace('%direccion%', item.direccion);
                        contenido = contenido.replace('%color%', helper.getClassTipo(1));
                        document.querySelector('.lugares > .resMapa').innerHTML = document.querySelector('.lugares > .resMapa').innerHTML + contenido;

                    }
                });
                mc = new MarkerClusterer(window.map,window.map.getMarkers(),mcOptions);
                $('[data-field="numeroTotal"]').html('1');
                return items;
            },
            matcher: function(item) {

                // r = JSON.parse(item).label.toLocaleLowerCase().indexOf(this.query.toLocaleLowerCase()) != -1;
                return true;
            }
        });
        // $('#bread-cat').html(Tools.extraerCat());
        // $('#bread-nom').html(JSON.parse(data.nombre)[idioma]);

    },
    error: function() {}

});


function initialize() {

    var contenido = '<div class="marker"><img src="%logo%" alt="%title%" /><div class="contenedor-pop"><span class="titulo"><a href="%microsite%" class="titulo-pop-map"><strong class="strong-3">%title%</strong></a></span><div class="tipo %className%"><span class="%logocategoria% %color% size-icon tipoI"></span> %nombreTipo%</div><p class="contenido-mapa"><div class="cont-izq">%contenido%</div></p> </div><a href="%microsite%" class="btn boton-pop %colorBoton%">'
    +(idioma == 'it' ? 'GUARDA' :
      idioma == 'fr' ? 'VUE' : 
      idioma == 'ru' ? 'смотреть' : 'VIEW') + '</a></div>';

    var myLatlng = new google.maps.LatLng(43.818448, 7.770756);
    var mapOptions = {
        zoom: 13,
        center: myLatlng
    }
    map = new google.maps.Map(document.querySelector('.mapaG'), mapOptions);
    window.map = map;
    window.map.clearMarkers();
    var infowindow = new google.maps.InfoWindow();
    var createMarker = function(params, mapa) {
        var icono = new google.maps.MarkerImage(params.icon, null, null, null, new google.maps.Size(32, 41));
        // var marker = new google.maps.Marker({
        // 	position: params.latlon,
        // 	map: mapa,
        // 	title: params.title,
        // 	icon: icono
        // });

        var marker = new MarkerWithLabel({
            position: params.latlon,
            map: mapa,
            icon: icono,
            draggable: false,
            raiseOnDrag: false,
            labelContent: params.num,
            labelAnchor: new google.maps.Point(3, 30),
            labelClass: params.num > 9 ? 'labels2' : "labels", // the CSS class for the label
            labelInBackground: false
        });
        /*var label = new Label({
			map: map,
			value: params.num
		});*/
        /*label.bindTo('position', marker, 'position');
		label.bindTo('text', marker, 'position');*/

        google.maps.event.addListener(marker, 'click', function() {
            var nContenido = contenido.replace('%logo%', params.contenido.imagen);
            nContenido = nContenido.replace(/%title%/gi, params.title);
            nContenido = nContenido.replace('%logoTipo%', params.contenido.tipoImage);
            nContenido = nContenido.replace('%nombreTipo%', params.contenido.tipo);
            nContenido = nContenido.replace('%contenido%', params.contenido.descripcion);
            nContenido = nContenido.replace('%className%', params.contenido.colorCategoria);
            nContenido = nContenido.replace(/%microsite%/gi, params.contenido.micro);
            nContenido = nContenido.replace('%color%', params.contenido.colorCategoria);
            nContenido = nContenido.replace('%colorBoton%', params.contenido.colorCategoria);
            nContenido = nContenido.replace('%logocategoria%', params.contenido.tipoImage);
            infowindow.setContent(nContenido);
            infowindow.close();
            infowindow.open(map, marker);
        });
        markers.push(marker);
    }
    var createLista = function(elemento, lugar) {
        var contenido = templatePlace.replace('%logo%', elemento.icon);
        contenido = contenido.replace('%number%', elemento.num);
        contenido = contenido.replace('%href%', elemento.contenido.href);
        contenido = contenido.replace(/%title%/gi, elemento.title);
        contenido = contenido.replace('%telefono%', elemento.contenido.telefono);
        contenido = contenido.replace('%marker%',elemento.num > 9 ? 'markerrr' : 'markerr');
        contenido = contenido.replace(/%correo%/gi, elemento.contenido.correo);
        contenido = contenido.replace('%logocategoria%', elemento.contenido.tipoImage);
        contenido = contenido.replace('%categoria%', elemento.contenido.tipo.replace('-', ' ').capitalize());
        contenido = contenido.replace('%direccion%', elemento.contenido.direccion);
        contenido = contenido.replace('%color%', elemento.contenido.colorCategoria);
        document.querySelector(lugar).innerHTML = document.querySelector(lugar).innerHTML + contenido;
    }
    var markers = [];
    window.map.clearMarkers();
    for (var i = 0; i < places.length; i++) {
        createMarker(places[i], window.map);
        createLista(places[i], '.lugares > .resMapa');
    };

    mc = new MarkerClusterer(window.map,window.map.getMarkers(),mcOptions);
    google.maps.event.trigger(window.map, 'resize');
    if($('.texto-cate').html() == 'Tempo libero-e-benessere')
        $('.texto-cate').html('Tempo libero')
        }
// google.maps.event.addDomListener(window, 'load', initialize);



cambia = function(posicion) {
    for (var f = 1; f < 6; f++) {
        $("#sub" + f).css('display', 'none');
    }
    $(".barraMenu ul li").each(function(index) {
        $(this).removeClass("mmenuSecHovered");
        if (index === posicion) {
            $(this).addClass("mmenuSecHovered");
        }
    });

};

modifica = function(valor) {
    var mithis;
    var midata;
    if (valor > 0 && valor < 6) {
        var limite = 6;
        var inicio = 1;
    } else {
        var limite = 11;
        var inicio = 6;
    }

    for (var f = inicio; f < limite; f++) {
        $('#opcion' + f).css('display', 'none');

    }

    $('div.opcion').each(function(index) {
        //if (valor<6){
        if (index < 5) {
            $(this).attr('indice', index + 1);
        }
        // }else {
        if (index > 4) {
            $(this).attr('indice', index - 4);
        }
        // }

        if (index === (valor - 1)) {
            mithis = $(this);
            midata = mithis.data('opcion');
        } else {
            if (valor < 6) {
                if (index < 5) {
                    $(this).removeClass('orange');
                    $(this).children('img').attr('src', 'images/' + $(this).attr('indice') + 'nero.png');
                }
            } else {
                if (index > 4) {
                    $(this).removeClass('orange');
                    $(this).children('img').attr('src', 'images/' + $(this).attr('indice') + 'nero.png');
                }
            }
        }
    });

    $("#" + midata).css('display', 'block');
    mithis.addClass('orange');
    mithis.children('.size-icon-mapa').removeClass('ico-black').addClass('ico-orange');

}
var tsubcat = '<div class="checkbox"><label><input type="checkbox" value="%id%" name="subcats[]">%texto%</label></div>';
Tools.cargarPrincipal({
    url: '//services.sanremo-on.com/service/categorias/format/json',
    method: 'get',
    json: true,
    callback: function(data, textStatus, xhr) {

        for (var i = 0; i < data.length; i++) {
            item = data[i];
            switch (parseInt(item.parent)) {
                case 1:
                    $('.subcat[data-cat="1"]').append(tsubcat.replace('%texto%', JSON.parse(item.nombre)[validaridioma(idioma)]).replace('%id%', item.idcategoria));
                    break;
                case 2:
                    $('.subcat[data-cat="2"]').append(tsubcat.replace('%texto%', JSON.parse(item.nombre)[validaridioma(idioma)]).replace('%id%', item.idcategoria));
                    break;
                case 3:
                    $('.subcat[data-cat="3"]').append(tsubcat.replace('%texto%', JSON.parse(item.nombre)[validaridioma(idioma)]).replace('%id%', item.idcategoria));
                    break;
                case 4:
                    $('.subcat[data-cat="4"]').append(tsubcat.replace('%texto%', JSON.parse(item.nombre)[validaridioma(idioma)]).replace('%id%', item.idcategoria));
                    break;
                case 5:
                    $('.subcat[data-cat="5"]').append(tsubcat.replace('%texto%', JSON.parse(item.nombre)[validaridioma(idioma)]).replace('%id%', item.idcategoria));
                    break;
            }
        };
    },
    error: function() {}
});
Tools.cargarPrincipal({
    url: '//services.sanremo-on.com/service/banners/format/json',
    method: 'get',
    json: true,
    callback: function(data, textStatus, xhr) {
        window.idioma = Tools.extraerUrl().idioma;
        var html = '';

        var qq = '<img src="%src%" class="img-responsive" width="100%" height="100%"/>';

        var templateGaleria = '<div class="item" style="width:100%;max-height: 340px; overflow:hidden;">%pp%</div>';

        var templateGaleria1 = '<div class="item active" style="width:100%;max-height: 340px; overflow:hidden;">%pp%</div>';

        var button = '<li data-target="#myCarousel" data-slide-to="%nn%" class="active"></li>';
        var button2 = '<li data-target="#myCarousel" data-slide-to="%nn%"></li>';
        var html = '';
        var html2 = '';

        limite = Math.ceil(data.length / 2) * 2;
        for (var i = 0, j = 0; i < limite; i = i + 2, j++) {
            var img = data[i];
            var imagenes = '';
            var slide = '';
            if (data[i])
                imagenes += qq.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/banners/' + data[i].imgnormal);
            if (data[i + 1])
                imagenes += qq.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/banners/' + data[i + 1].imgnormal);

            if (i == 0) {

                slide = templateGaleria1.replace(/%pp%/gi, imagenes);
            } else {
                slide = templateGaleria.replace(/%pp%/gi, imagenes);
            }
            if (j == 0)
                html2 += button.replace(/%nn%/gi, j.toString());
            else
                html2 += button2.replace(/%nn%/gi, j.toString());
            html += slide;
        };

        $('#myCarousel .carousel-indicators').html(html2).promise().done(function() {
            $('#myCarousel .carousel-inner').html(html).promise().done(function() {
                $('#myCarousel').carousel('cycle');
            });
        });

    },
    error: function() {}
});



$('.row.activaciones > div').on('click', function() {
    $('.row.activaciones > div').each(function(index, el) {
        $(el).removeClass('orange');
        $(el).removeClass('active');
        $(el).find('img').attr('src', '/images/Negozi-negro.png');
        $('.subcat[data-cat]').hide();
    });
    $(this).addClass('active');
    $(this).addClass('orange');
    $(this).find('img').attr('src', '/images/Negozi-naranja.png');
    $('.subcat[data-cat="' + $(this).data('cat') + '"]').show('slow');
})

$('#ofertaButton').on('click', function(e) {
    e.preventDefault();
    Tools.cargarPrincipal({
        url: '//services.sanremo-on.com/service/ofertas/format/json',
        method: 'get',
        json: true,
        callback: function(data, textStatus, xhr) {
            // console.log(data);
            var microsi = [];
            idioma = Tools.extraerUrls().idioma;
            var mapa = [];
            var aux = 0;
            var aux2 = [];
            data.mezclar();
            for (var i = 0; i < data.length; i++) {

                var item = data[i].idmicrosite;
                if (item.estatus == 1) {
                    aux++;
                    if (aux2.indexOf(item.idmicrosite) != -1) {
                        aux--;
                        continue;
                    }
                    microsi.push(item);
                    aux2.push(item.idmicrosite);
                    var elemento = {};
                    elemento.latlon = new google.maps.LatLng(item.puntogoogle.split(',')[0], item.puntogoogle.split(',')[1]);
                    elemento.title = JSON.parse(item.nombre)[validaridioma(idioma)];
                    elemento.icon = '/images/Posicion-morado@2.png';
                    elemento.num = aux;
                    logoMarker.logo = '/images/Posicion-morado@2.png';
                    noms = JSON.parse(item.nombre);
                    elemento.contenido = {
                        imagen: '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logo + 'gris').toString(),
                        tipo: $.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk))),
                        tipoImage: helper.getImgTipo(parseInt(item.categoriafk[0].categoriafk)), //   helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)),
                        descripcion: JSON.parse(item.descripcion)[validaridioma(idioma)].substring(0, 100) + '...',
                        direccion: item.direccion,
                        colorCategoria: helper.getClassTipo(3),
                        telefono: item.telefono,
                        href: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html',
                        correo: item.email,
                        micro: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html'
                    }
                    mapa.push(elemento);

                }
            };

            if (aux == 0) {
                $('#mensajeModal .modal-content').html(mapaMessages[idioma].micrositeSinOferta);
                $('#mensajeModal').modal('show');
                return;
            }
            window.Microsites = microsi;
            window.map.clearMarkers();
            $('.lugares > .resMapa').html('');
            $('[data-field="numeroTotal"]').html(aux);
            window.places = mapa;
            initialize();


            micro = [];
            for (var i = 0; i < data.length; i++) {
                item = data[i];

                micro.push({
                    name: JSON.parse(item.nombre)[validaridioma(idioma)],
                    categoria: 1,
                    logo: JSON.parse(item.url)[validaridioma(idioma)]
                });
            };
        },
        error: function() {
            $('#mensajeModal .modal-content').html(mapaMessages[idioma].micrositeSinOferta);
            $('#mensajeModal').modal('show');
        }

    });

    return false;
});



$('#mostrarTodo').on('click', function() {
    Tools.cargarPrincipal({
        url: '//services.sanremo-on.com/service/microsites/format/json',
        method: 'get',
        json: true,
        callback: function(data, textStatus, xhr) {
            window.Microsites = data;
            logoMarker.logo = '/images/Posicion-naranja@2.png';
            helper.getClassTipo(1);
            pintarMicrosites();
            $('.col-sm-15 input[type="checkbox"]:checked').each(function() {
                this.checked = false;
            });
            $('.mmenuSec.Mextras.mmenuSecHovered').click();
        },
        error: function() {}

    });
});

$('#favoritosButton').on('click', function(e) {
    e.preventDefault();
    if (typeof window.usuario === "undefined") {
        $('[data-target="#login_panel"]').click();
        // alert('No puede entrar a favoritos si no esta logueado.');
        return false;
    }
    Tools.cargarPrincipal({
        url: '//services.sanremo-on.com/service/micrositefavoritos/user/' + window.usuario.iduser + '/format/json',
        method: 'get',
        json: true,
        callback: function(data, textStatus, xhr) {
            window.Microsites = data;
            idioma = Tools.extraerUrls().idioma;
            var mapa = [];
            var aux = 0;
            var aux2 = [];
            console.log(data);

            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                if (item.estatus == '1') {
                    aux++;
                    if (aux2.indexOf(item.idmicrosite) != -1) {
                        aux--;
                        continue;
                    }
                    aux2.push(item.idmicrosite);
                    var elemento = {};
                    elemento.latlon = new google.maps.LatLng(item.puntoGoogle.split(',')[0], item.puntoGoogle.split(',')[1]);
                    elemento.title = JSON.parse(item.nombre)[validaridioma(idioma)];
                    elemento.icon = '/images/Posicion-rojo@2.png'; /*logoMarker.getLogo(control);*/
                    logoMarker.logo = '/images/Posicion-rojo@2.png';
                    elemento.num = aux;
                    noms = JSON.parse(item.nombre);
                    elemento.contenido = {
                        imagen: '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logo + 'gris').toString(),
                        tipo: $.trim(helper.getTextTipo(parseInt(item.categoria))),
                        tipoImage: helper.getImgTipo(parseInt(item.categoria)), //   helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)),
                        descripcion: JSON.parse(item.descripcion)[validaridioma(idioma)].substring(0, 100) + '...',
                        direccion: item.direccion,
                        colorCategoria: helper.getClassTipo(2),
                        telefono: item.telefono,
                        correo: item.email,
                        href: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoria)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html',
                        micro: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoria)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html'
                    }
                    mapa.push(elemento);

                }
            };
            if (aux == 0) {
                $('#mensajeModal .modal-content').html(mapaMessages[idioma].sinMicrosite);
                $('#mensajeModal').modal('show');
                return;
            }
            map.clearMarkers();
            $('.lugares > .resMapa').html('');
            $('[data-field="numeroTotal"]').html(aux);
            window.places = mapa;
            initialize();


            micro = [];
            for (var i = 0; i < data.length; i++) {
                item = data[i];

                micro.push({
                    name: JSON.parse(item.nombre)[validaridioma(idioma)],
                    categoria: 1,
                    logo: JSON.parse(item.url)[validaridioma(idioma)]
                });
            };
        },
        error: function() {
            $('#mensajeModal .modal-content').html(mapaMessages[idioma].sinMicrositesCategoria);
            $('#mensajeModal').modal('show');
        }

    });
    return false;
});

var templateServicio = '<div class="place"><div class="%claseMarker%"><img alt="" src="/images/Posicion-verde@2.png"><span class="numero">%number%</span></div><div class="titulo"><a href="#" class="enlace-microsite"><strong>%title%</strong></a></div><div class="contenido-servicio"><p class="direccion">%direccion%</p></div></div>';
var servicioMapa = '<div class="direccion"><div class="titulo"><strong>%title%</strong></div><div class="direccion"><p class="direccion">%direccion%</p></div></div>';
$('#servicioButton').on('click', function(e) {
    e.preventDefault();
    Tools.cargarPrincipal({
        url: '//services.sanremo-on.com/service/servicios/format/json',
        method: 'get',
        json: true,
        callback: function(data, textStatus, xhr) {
            var myLatlng = new google.maps.LatLng(43.818448, 7.770756);
            var mapOptions = {
                zoom: 13,
                center: myLatlng
            }

            map = new google.maps.Map(document.querySelector('.mapaG'), mapOptions);
            window.map = map;
            window.map.clearMarkers();
            $('.lugares > .resMapa').html('');
            $('[data-field="numeroTotal"]').html(data.length);
            window.map.clearMarkers
            for (var i = 0; i < data.length; i++) {
                item = data[i];
                toolsMapa.servicioCreateMarker({
                    icon: '/images/Posicion-verde@2.png',
                    latlon: new google.maps.LatLng(item.punto.split(',')[0], item.punto.split(',')[1]),
                    title: item.nombre,
                    direccion:item.direccion,
                    num: i + 1
                }, window.map);
                toolsMapa.servicioCreateCuadro({
                    num: i + 1,
                    title: item.nombre,
                    href: '#',
                    direccion: item.direccion
                }, '.lugares > .resMapa')
            };
            mc = new MarkerClusterer(window.map,window.map.getMarkers(),mcOptions);
            // window.places = mapa;

        },
        error: function() {
            $('#mensajeModal .modal-content').html('Non ci sono servizi disponibili');
            $('#mensajeModal').modal('show');
        }

    });
    $('[data-submenu="sub2"]').click();
    return false;
})



$('#buquedaPuntos').on('submit', function(e) {
    e.preventDefault();

    $('.mmenuSec.Mextras.mmenuSecHovered').click();
    var categoria = $('.col-sm-15.col-xs-15.active.orange').data('cat');
    var subcats = [];
    $('.col-sm-15.subcat[data-cat="' + categoria + '"] input[type="checkbox"]:checked').each(function(index, el) {
        subcats.push($(el).val());
    });
    var url = '';
    if (subcats.length == 0) {
        url = '//services.sanremo-on.com/service/micrositeCategoria/cat/' + categoria + '/format/json';
    } else {
        url = '//services.sanremo-on.com/service/micrositeCategoriaSubcategoria/cat/' + categoria + '/subCat/' + subcats.join('-') + '/format/json';
    }
    Tools.cargarPrincipal({
        url: url,
        method: 'get',
        json: true,
        callback: function(data, textStatus, xhr) {
            // window.Microsites = data;
            var mm = [];
            // console.log(data);
            // window.map.clearMarkers();
            $('.lugares > .resMapa').html('');
            idioma = Tools.extraerUrls().idioma;
            var mapa = [];
            var aux = 0;
            data.mezclar();
            for (var i = 0; i < data.length; i++) {
                var item = data[i];
                if (item.estatus == 1) {
                    mm.push(item);
                    aux++;
                    var elemento = {};
                    elemento.latlon = new google.maps.LatLng(item.puntoGoogle.split(',')[0], item.puntoGoogle.split(',')[1]);
                    elemento.title = JSON.parse(item.nombre)[validaridioma(idioma)];
                    logoMarker.logo = '/images/Posicion-naranja@2.png';
                    elemento.icon = logoMarker.getLogo(control);
                    elemento.num = aux;
                    noms = JSON.parse(item.nombre);
                    elemento.contenido = {
                        imagen: '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logo + 'gris').toString(),
                        tipo: $.trim(helper.getTextTipo(parseInt(categoria))),
                        tipoImage: helper.getImgTipo(categoria), //   helper.getTextTipo(parseInt(item.categoriafk[0].categoriafk)),
                        descripcion: JSON.parse(item.descripcion)[validaridioma(idioma)].substring(0, 100) + '...',
                        direccion: item.direccion,
                        colorCategoria: helper.getClassTipo(1),
                        telefono: item.telefono,
                        correo: item.email,
                        href: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(categoria)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html',
                        micro: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(categoria)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html'
                    }
                    mapa.push(elemento);

                }
            };
            $('[data-field="numeroTotal"]').html(aux);
            window.places = mapa;
            window.Microsites = mm;
            window.map.clearMarkers();
            initialize();


            micro = [];
            for (var i = 0; i < data.length; i++) {
                item = data[i];

                micro.push({
                    name: JSON.parse(item.nombre)[validaridioma(idioma)],
                    categoria: categoria,
                    logo: JSON.parse(item.url)[validaridioma(idioma)]
                });
            };
        },
        error: function() {
            $('#mensajeModal .modal-content').html(mapaMessages[idioma].sinMicrositesCategoria);
            $('#mensajeModal').modal('show');
        }


    });
    $('.col-sm-15 input[type="checkbox"]:checked').each(function() {
        this.checked = false;
    });
    return false;
})



$('#buquedaServicios').on('submit', function(e) {
    e.preventDefault();

    $('.mmenuSec.otro.mmenuSecHovered').click();

    if ($('#buquedaServicios input[type="checkbox"]:checked').get().length == 2 || $('#buquedaServicios input[type="checkbox"]:checked').get().length == 0) {
        $('#servicioButton').click();
        return false;
    }
    Tools.cargarPrincipal({
        url: '//services.sanremo-on.com/service/servicios/format/json',
        method: 'get',
        json: true,
        callback: function(data, textStatus, xhr) {
            var myLatlng = new google.maps.LatLng(43.818448, 7.770756);
            var mapOptions = {
                zoom: 13,
                center: myLatlng
            }

            map = new google.maps.Map(document.querySelector('.mapaG'), mapOptions);
            window.map = map;
            window.map.clearMarkers();
            // map.clearMarkers();
            $('.lugares > .resMapa').html('');
            // $('.lugares > .resMapa').html('');
            tipos = [];

            $('#buquedaServicios input[type="checkbox"]:checked').each(function(index, el) {
                tipos.push($(el).val());
            });
            console.log(tipos);
            aux = 0;

            window.map.clearMarkers();
            for (var i = 0; i < data.length; i++) {
                item = data[i];
                if ((item.tipo == tipos[0])) {
                    aux++;
                    toolsMapa.servicioCreateMarker({
                        icon: '/images/Posicion-verde@2.png',
                        latlon: new google.maps.LatLng(item.punto.split(',')[0], item.punto.split(',')[1]),
                        title: item.nombre,
                        direccion: item.direccion,
                        num: aux
                    }, window.map);
                    toolsMapa.servicioCreateCuadro({
                        num: aux,
                        title: item.nombre,
                        href: '#',
                        direccion: item.direccion
                    }, '.lugares > .resMapa')
                }
            };
            mc = new MarkerClusterer(window.map,window.map.getMarkers(),mcOptions);
            $('[data-field="numeroTotal"]').html(aux);
        }
    });

    return false;
})



var pintarMicrosites = function(order) {
    var micro = window.Microsites;
    if (order == 'asc')
        micro.sort(ascendente);
    else if (order == 'desc')
        micro.sort(descendente);
    idioma = Tools.extraerUrls().idioma;
    var mapa = [];
    var aux = 0;
    for (var i = 0; i < micro.length; i++) {
        var item = micro[i];
        if (item.estatus == 1) {
            aux++;
            var elemento = {};
            elemento.latlon = new google.maps.LatLng((item.puntogoogle || item.puntoGoogle).split(',')[0], (item.puntogoogle || item.puntoGoogle).split(',')[1]);
            elemento.title = JSON.parse(item.nombre)[validaridioma(idioma)];
            elemento.icon = logoMarker.getLogo(control);
            elemento.colorBoton =
                elemento.num = aux;
            noms = JSON.parse(item.nombre);
            elemento.contenido = {
                imagen: '//admin.sanremo-on.com/public/uploads/' + Tools.clearStr(noms['it']) + '/logo/' + CryptoJS.MD5(item.logo + 'gris').toString(),
                tipo: $.trim(helper.getTextTipo(parseInt((item.categoriafk ? item.categoriafk[0].categoriafk : item.categoria)))),
                tipoImage: helper.getImgTipo(parseInt(((item.categoriafk ? item.categoriafk[0].categoriafk : item.categoria)))),
                descripcion: JSON.parse(item.descripcion)[validaridioma(idioma)].substring(0, 100) + '...',
                direccion: item.direccion,
                colorCategoria: helper.getClassTipo(),
                color: helper.getClassTipo(),
                colorBoton: helper.getClassTipo(),
                telefono: item.telefono,
                correo: item.email,
                href: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk ? item.categoriafk[0].categoriafk : item.categoria)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html',
                micro: '//sanremo-on.com/' + validaridioma(idioma) + '/' + Tools.clearStr($.trim(helper.getTextTipo(parseInt(item.categoriafk ? item.categoriafk[0].categoriafk : item.categoria)))) + '/' + JSON.parse(item.url)[validaridioma(idioma)] + '.html'
            }
            mapa.push(elemento);

        }
    };
    $('.lugares > .resMapa').html('');
    $('[data-field="numeroTotal"]').html(aux);
    window.places = mapa;
    initialize();

}

var toolsMapa = {
    infowindow : new google.maps.InfoWindow(),
    servicioCreateMarker: function(params, mapa) {
        var icono = new google.maps.MarkerImage(params.icon, null, null, null, new google.maps.Size(32, 41));
        var marker = new MarkerWithLabel({
            position: params.latlon,
            map: mapa,
            icon: icono,
            draggable: false,
            raiseOnDrag: false,
            labelContent: params.num,
            labelAnchor: new google.maps.Point(3, 30),
            labelClass: params.num > 9 ? 'labels2' : "labels", // the CSS class for the label
            labelInBackground: false
        });
        // var infowindow = new google.maps.InfoWindow();
        console.log(params);
        google.maps.event.addListener(marker, 'click', function() {
            var nContenido = servicioMapa.replace(/%title%/gi, params.title);
            nContenido = nContenido.replace('%direccion%', params.direccion);
            toolsMapa.infowindow.setContent(nContenido);
            toolsMapa.infowindow.close();
            toolsMapa.infowindow.open(map, marker);
        });

    },
    servicioCreateCuadro: function(elemento, lugar) {
        var contenido = templateServicio.replace('%number%', elemento.num);
        contenido = contenido.replace(/%title%/gi, elemento.title);
        contenido = contenido.replace('%href%', elemento.href);
        contenido = contenido.replace('%claseMarker%', elemento.num > 9 ? 'markerrr' : 'markerr');
        contenido = contenido.replace('%direccion%', elemento.direccion);
        document.querySelector(lugar).innerHTML = document.querySelector(lugar).innerHTML + contenido;
    }
}

google.maps.Map.prototype.markers = [];
google.maps.Map.prototype.getMarkers = function() {
    return this.markers
};
google.maps.Map.prototype.clearMarkers = function() {
    for (var i = 0; i < this.markers.length; i++) {
        this.markers[i].setMap(null);
    }
    this.markers = [];
};
google.maps.Marker.prototype._setMap = google.maps.Marker.prototype.setMap;
google.maps.Marker.prototype.setMap = function(map) {
    if (map) {
        map.markers[map.markers.length] = this;
    }
    this._setMap(map);
}

function Label(opt_options) {
    this.setValues(opt_options);
    var span = this.span_ = document.createElement('span');
    span.style.cssText = 'position: relative; left: -40%; top: -8px; ' +
        'white-space: nowrap;' +
        'color:#ffffff;font-weight:bold;z-index:999999 !important;top:-35px;font-size:17px;';
    var div = this.div_ = document.createElement('div');
    div.appendChild(span);
    div.style.cssText = 'position: absolute; display: block';
};
Label.prototype = new google.maps.OverlayView;
Label.prototype.onAdd = function() {
    var pane = this.getPanes().overlayLayer;

    pane.style = {
        'z-index': '999998;'
    };
    pane.appendChild(this.div_);
    var me = this;
    this.listeners_ = [
        google.maps.event.addListener(this, 'position_changed',
                                      function() {
            me.draw();
        }),
        google.maps.event.addListener(this, 'text_changed',
                                      function() {
            me.draw();
        })
    ];
};

Label.prototype.onRemove = function() {
    this.div_.parentNode.removeChild(this.div_);
    for (var i = 0, I = this.listeners_.length; i < I; ++i) {
        google.maps.event.removeListener(this.listeners_[i]);
    }
};
Label.prototype.draw = function() {
    var projection = this.getProjection();
    var position = projection.fromLatLngToDivPixel(this.get('position'));
    var div = this.div_;
    div.style.left = position.x + 'px';
    div.style.top = position.y + 'px';
    div.style.display = 'block';
    this.span_.innerHTML = this.value;
};


setTimeout(function() {
    if (window.location.hash.substr(1) == 'parking') {
        document.querySelector('#parking').checked = true;
        $('#buquedaServicios').submit();
        setTimeout(function() {
            document.querySelector('#parking').checked = false;
        }, 3000);
        $('#sub2').css('display', 'none');

    } else if (window.location.hash.substr(1) != '') {
        var micro = window.location.hash.substr(1);
        Tools.cargarPrincipal({
            url: '//services.sanremo-on.com/service/microsite/url/'+micro+'/format/json',
            method: 'get',
            json: true,
            callback: function(data, textStatus, xhr) {
                helper.getClassTipo(1);
                window.Microsites = [data];
                pintarMicrosites();
                if($('.texto-cate').html() == 'Tempo libero-e-benessere')
                    $('.texto-cate').html('Tempo libero')
                    },
            error: function() {}

        });
    }
}, 3000);

