$('nav#mmovil').mmenu();

$('.selectpicker').selectpicker({
    size: '50%'
});

var template = '<div class="col-sm-3"><div><a href="microsite.html?id=%id%" class="enlace-grid-microsite"><img src="%imagenMicrosite%" class="img-responsive hidden-xs" alt=""></a><span class="visible-xs textoB"><strong>%nombreMicrosite%</strong></span><span class="text-left flechita visible-xs">></span><div class="clearfix"></div></div></div>';
var variables = Tools.textToCat(Tools.extraerCat());
if (variables == 3) {
    $('.mensaje-prenota.mensaje-blu.cinema').show();
}
if (variables == 5) {
    $('.mensaje-prenota.mensaje-blu.acodation').show();
}
Tools.cargarPrincipal({
    url: '//services.sanremo-on.com/service/microsite/url/' + Tools.extraerUrl().url + '/format/json',
    method: 'get',
    json: true,
    asyn: false,
    callback: function(data, textStatus, xhr) {
        window.idioma = Tools.extraerUrl().idioma;
        window.microsite = data;
        //var idioma = Tools.extraerUrls().idioma;
       // console.log(Tools.extraerCat());
        var ca = Tools.extraerCat();
       // console.log(idioma);
        var bread = '';
        switch (idioma) {
            case 'ru':
                switch (ca) {
                    case 'negozi':
                        bread = 'М�?Г�?ЗИ�?Ы';
                        break;
                    case 'ristoranti-bar':
                        bread = 'ЕД�?&�?�?ПИТКИ';
                        break;
                    case 'accomodation':
                        bread = 'УДОБСТВ�?';
                        break;
                    case 'tempo-libero-e-benessere':
                        bread = 'СВОБОД�?ОЕ ВРЕМЯ И БЛ�?ГОПОЛУЧИЕ';
                        break;
                    case 'spettacoli e cinema':
                        bread = 'СПЕКТ�?КЛИ И КИ�?О ';
                        break;
                }
                break;
            case 'fr':
                switch (ca) {
                    case 'negozi':
                        bread = 'Shopping';
                        break;
                    case 'ristoranti-bar':
                        bread = 'Food & Drink';
                        break;
                    case 'accomodation':
                        bread = 'Hébergements';
                        break;
                    case 'tempo-libero-e-benessere':
                        bread = 'Loisirs et Bien-Être';
                        break;
                    case 'spettacoli e cinema':
                        bread = 'Spectacles et Cinéma';
                        break;
                }
                break;
            case 'en':
                switch (ca) {
                    case 'negozi':
                        bread = 'Shop';
                        break;
                    case 'ristoranti-bar':
                        bread = 'Food & Drink';
                        break;
                    case 'accomodation':
                        bread = 'Accomodation';
                        break;
                    case 'tempo-libero-e-benessere':
                        bread = 'Free time and wellness';
                        break;
                    case 'spettacoli e cinema':
                        bread = 'Shows & cinema';
                        break;
                }
                break;
            default:
                switch (ca) {
                    case 'negozi':
                        bread = 'Negozi';
                        break;
                    case 'ristoranti-bar':
                        bread = 'Food & Drink';
                        break;
                    case 'accomodation':
                        bread = 'Accomodation';
                        break;
                    case 'tempo-libero-e-benessere':
                        bread = 'Tempo libero e benessere';
                        break;
                    case 'spettacoli e cinema':
                        bread = 'Spettacoli e Cinema ';
                        break;
                }
                break;
        }
       // console.log(Tools.extraerUrl());

        //Inicio de metatag según microsite

        switch (Tools.extraerUrl().url) {
            case 'abate':
                // statements_1
                $('head').prepend('<meta name="Title" content="Abate Sanremo, Concessionario Rolex, Patek Philippe Sanremo">');
                $('head').prepend('<meta name="description" content="Nel negozio Abate trovi le nuove collezioni dei più importanti marchi di orologeria oltre a una sala personalizzata Patek Philippe. Orologi e gioielli.">');
                break;

            case 'albero-blu':
                // statements_1
                $('head').prepend('<meta name="Title" content="Albero Blu. Abbigliamento bambino Sanremo. Marche made in italy">');
                $('head').prepend('<meta name="description" content="All´Albero Blu trovi le più prestigiose case di moda per vestire il tuo bambino. A Sanremo in via Matteotti il negozio d´abbigliamento per i più piccoli.">');
                break;

            case 'albert-real-estate':
                // statements_1
                $('head').prepend('<meta name="Title" content="Albert Real Estate agenzia immobiliare a Sanremo">');
                $('head').prepend('<meta name="description" content="Albert Real Estate agenzia immobiliare a Sanremo che offre assistenza al cliente in ogni aspetto della trattativa per comprare o vendere casa serenamente.">');
                break;

            case 'allservices':
                // statements_1
                $('head').prepend('<meta name="Title" content="All Services servizi per proprietari di barche e yacht">');
                $('head').prepend('<meta name="description" content="All Services servizi per proprietari di barche e yacht. Le migliori assistenze in Riviera  che garantiscono il meglio anche ai comandanti e agli equipaggi.">');
                break;

            case 'bonbonniere':
                // statements_1
                $('head').prepend('<meta name="Title" content="Galleria d´Arte Bonbonniére. Comprare quadri a Sanremo">');
                $('head').prepend('<meta name="description" content="Galleria d´Arte Bonbonniére. Se vuoi comprare quadri a Sanremo qui troverai opere d´autore di grande valore e bellezza. ">');
                break;

            case 'carlo-ramello':
                // statements_1
                $('head').prepend('<meta name="Title" content="Carlo Ramello - Comprare Pellicce di alta moda a Sanremo">');
                $('head').prepend('<meta name="description" content="Carlo Ramello offre collezioni di pellicce di alta moda a Sanremo. Scegli tra pellicce di visone, zibellino, cincilla´ e volpe. ">');
                break;

            case 'divani-divani':
                // statements_1
                $('head').prepend('<meta name="Title" content="Divani e Divani collezioni e promozioni per il tuo soggiorno">');
                $('head').prepend('<meta name="description" content="Divani e Divani collezioni e promozioni per il tuo soggiorno o salotto. Visita il negozio per comprare i migliori mobili per la tua casa.">');
                break;

            case 'emanuela-conti':
                // statements_1
                $('head').prepend('<meta name="Title" content="Emanuela Conti negozio di abbigliamento donna a Sanremo">');
                $('head').prepend('<meta name="description" content="Emanuela Conti negozio di abbigliamento donna a Sanremo. Gonne, pantaloni, camice e accessori per preparare il tuo look per ogni occasione.">');
                break;

            case 'espace-turquoise':
                // statements_1
                $('head').prepend('<meta name="Title" content="Espace Turquoise negozio di decorazione e arredamento casa">');
                $('head').prepend('<meta name="description" content="Espace Turquoise negozio di decorazione e arredamento per la casa a Sanremo. Oggetti regalo e complementi d´arredo unici e inusuali.">');
                break;

            case 'fashion-house':
                // statements_1
                $('head').prepend('<meta name="Title" content="Fashion House Lavorazioni a mano di stoffe pregiate per arredi">');
                $('head').prepend('<meta name="description" content="Fashion House. Lavorazioni a mano di stoffe di prima scelta per arredi. Realizzazione di opere artigianalli su misura: tendaggi, divani, poltrone.">');
                break;

            case 'fontanelli':
                // statements_1
                $('head').prepend('<meta name="Title" content="Fontanelli Negozio di abbigliamento per uomo. Boutique Sanremo">');
                $('head').prepend('<meta name="description" content="Fontanelli negozio di abbigliamento per uomo a Sanremo. Boutique con marche di moda, pantaloni, giacche, cappotti, camicie, maglie, maglioni e accessori.">');
                break;

            case 'franco-abbigliamento':
                // statements_1
                $('head').prepend('<meta name="Title" content="Franco abbigliamento e accessori a Sanremo in via Matteotti">');
                $('head').prepend('<meta name="description" content="Nella Boutique Franco Abbigliamento troverai le più importanti griffe del made in Italy. Accessori e abbigliamento nella centrale via Matteotti a Sanremo.">');
                break;

            case 'graziella-boutique':
                // statements_1
                $('head').prepend('<meta name="Title" content="Graziella boutique. Negozio di abbigliamento uomo e donna">');
                $('head').prepend('<meta name="description" content="Graziella boutique. Negozio di abbigliamento uomo e donna a Sanremo. Il meglio della moda italiana. Vestiti da cerimonia, jeans, accessori e pellicce.">');
                break;

            case 'hype':
                // statements_1
                $('head').prepend('<meta name="Title" content="Hype abbigliamento a Sanremo tutta la moda uomo.">');
                $('head').prepend('<meta name="description" content="Hype in via Carli a Sanremo per comprare abbigliamento e accessori per uomo. Moda giovane e di tendenza e grandi marchi degli anni ´70.">');
                break;

            case 'lacoste':
                // statements_1
                $('head').prepend('<meta name="Title" content="Lacoste negozio a Sanremo dove la moda è garanzia ">');
                $('head').prepend('<meta name="description" content="Nella boutique Lacoste di Sanremo le collezioni uomo e donna del celebre marchio. Polo, abiti e abbigliamento sportivo nel negozio in via Matteotti.">');
                break;

            case 'marelli':
                // statements_1
                $('head').prepend('<meta name="Title" content="Marelli Boutique negozio di scarpe artigianali Sanremo">');
                $('head').prepend('<meta name="description" content="Marelli Boutique produttori artigianali di calzature da montagna, e di scarpe da passeggio per uomo e donna. Scopri il negozio a Sanremo. ">');
                break;

            case 'mc2-saint-barth-sanremo':
                // statements_1
                $('head').prepend('<meta name="Title" content="Mc2 Saint Barth Sanremo. Moda mare con la collezione beachwear">');
                $('head').prepend('<meta name="description" content="Mc2 Saint Barth Sanremo, la migliore moda mare grazie alle collezioni beachwear. Scopri le collezioni per uomo, donna e bambino per il mare e la spiaggia.">');
                break;

            case 'nara-camicie':
                // statements_1
                $('head').prepend('<meta name="Title" content="Nara camicie, abbigliamento uomo e donna made in Italy">');
                $('head').prepend('<meta name="description" content="Nara camicie, negozio di abbigliamento per uomo e donna con prodotti 100% made in Italy. Camicie, foulard e maglie per donna. Scopri tutti i modelli!">');
                break;

            case 'ostanel':
                // statements_1
                $('head').prepend('<meta name="Title" content="Ostanel a Sanremo. Ricambi auto e moto e mezzi d´epoca">');
                $('head').prepend('<meta name="description" content="Compra i pezzi di ricambio per la tua auto, moto, vespa e mezzi d\'epoca. A Sanremo in via Roma trovi articoli delle migliori marche.">');
                break;

            case 'paul-shark':
                // statements_1
                $('head').prepend('<meta name="Title" content="Paul e Shark moda uomo, donna e bambino a Sanremo">');
                $('head').prepend('<meta name="description" content="In via Matteotti il negozio con tutte le collezioni del celebre marchio Paul e Shark. Rivenditore esclusivo per la provincia di Imperia.">');
                break;

            case 'replay':
                // statements_1
                $('head').prepend('<meta name="Title" content="Replay Store, vendita collezioni ed accessori Replay ">');
                $('head').prepend('<meta name="description" content="Replay Store, vendita collezioni ed accessori Replay. Aereonautica Militare, Blauer, Ciesse, La Martina, Coverce, SuperDry, Liu-Jo. ">');
                break;

            case 'saletta-real-estate':
                // statements_1
                $('head').prepend('<meta name="Title" content="Saletta Real Estate Agenzia immobiliare a Sanremo">');
                $('head').prepend('<meta name="description" content="Saletta Real Estate Agenzia immobiliare. Compravendita di appartamenti, edifici interi, ville, rustici, terreni, ville negozi ed uffici.">');
                break;

            case 'saphir':
                // statements_1
                $('head').prepend('<meta name="Title" content="Saphire abbigliamento luxury uomo a Sanremo">');
                $('head').prepend('<meta name="description" content="Saphire, negozio di abbigliamento e accessori per uomo. Scopri la boutique per rendere unico il tuo shopping a Sanremo. ">');
                break;

            case 'spinnaker':
                // statements_1
                $('head').prepend('<meta name="Title" content="Spinnaker boutique Sanremo. Negozio di alta moda uomo e donna">');
                $('head').prepend('<meta name="description" content="Spinnaker boutique Sanremo. Negozio di alta moda per uomo e donna. Vestiti da sera, cerimonia, scarpe accessori, grandi firme e nuovi stilisti. ">');
                break;

            case 'suma-immobiliare':
                // statements_1
                $('head').prepend('<meta name="Title" content="Immobiliare Su Ma Sanremo Case Vacanze Immobili di pregio">');
                $('head').prepend('<meta name="description" content="Immobiliare Su Ma Sanremo Case Vacanze Immobili di pregio. Vendita immobiliare, servizio amministrazione condominiale, gestione ristrutturazioni e altro.">');
                break;

            case 'trussardi':
                // statements_1
                $('head').prepend('<meta name="Title" content="Trussardi a Sanremo la boutique della celebre griffe italiana">');
                $('head').prepend('<meta name="description" content="Scopri nello store Trussardi di Sanremo le collezioni uomo e donna. Nel cuore dello shopping di via Matteotti i migliori negozi di abbigliamento.">');
                break;

            case 'franco-calzature':
                // statements_1
                $('head').prepend('<meta name="Title" content="Franco Calzature In via Matteotti a Sanremo - Comprare scarpe ">');
                $('head').prepend('<meta name="description" content="Vuoi coprare scarpe di alta qualità a Sanremo? Franco Calzature ti aspetta con i migliori prodotti italiani che puoi trovare in commercio.">');
                break;





            default:
                // statements_def

                break;
        }


        $('#bread-cat').html(bread.capitalize());
        $('#bread-cat').attr({
            'href': '//sanremo-on.com/' + idioma + '/' + Tools.extraerCat(),
        });


        // stWidget.addEntry({
        // 	"service": "sharethis",
        // 	"element": document.getElementById('button_1'),
        // 	"url": document.location,
        // 	"title": "sharethis",
        // 	"type": "large",
        // 	"text": "ShareThis",
        // 	"image": "http://www.softicons.com/download/internet-icons/social-superheros-icons-by-iconshock/png/256/sharethis_hulk.png",
        // 	"summary": "this is description1"
        // });
        $('#bread-nom').html(JSON.parse(data.nombre)[idioma]);
        $('[data-field="nombre"]').html('<h1 style="font-size: 16px;font-weight: 700;">' + JSON.parse(data.nombre)[idioma] + '</h1>');
        $('[data-field="direccion"]').html(data.direccion);
        $('[data-field="telefono"]').html(data.telefono);
        $('[data-field="horario"]').html(JSON.parse(data.apertura)[idioma]);
        $('[data-field="dias"]').html(JSON.parse(data.cierre)[idioma]);
        $('[data-field="url"]').html(data.pagina);
        $('[name="description"]').attr('content', JSON.parse(data.description)[idioma]);
        $('[property="og:image"]').attr('content', Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo).toString());
        $('[property="og:title"]').attr('content', JSON.parse(data.nombre)[idioma]);

        $('[property="og:description"]').attr('content', JSON.parse(data.description)[idioma]);
        $('[property="og:site_name"]').attr('content', JSON.parse(data.title)[idioma].capitalize());

        if (data.facebook !== '' && data.facebook !== null) {
            $('[data-field="facebook"]').attr('href', data.facebook);
            $('[data-field="facebook"]').css('display', 'block');
            $('[data-field="facebook"]').css('cursor', 'pointer');
        }
        if (data.twitter !== '' && data.twitter !== null) {
            $('[data-field="twitter"]').attr('href', data.twitter);
            $('[data-field="twitter"]').css('display', 'block');
            $('[data-field="twitter"]').css('cursor', 'pointer');
        }
        if (data.google !== '' && data.google !== null) {
            $('[data-field="google"]').attr('href', data.google);
            $('[data-field="google"]').css('display', 'block');
            $('[data-field="google"]').css('cursor', 'pointer');
        }
        if (data.pinterest !== '' && data.pinterest !== null) {
            $('[data-field="pinterest"]').attr('href', data.pinterest);
            $('[data-field="pinterest"]').css('display', 'block');
            $('[data-field="pinterest"]').css('cursor', 'pointer');
        }
        if (data.linkedin !== '' && data.linkedin !== null) {
            $('[data-field="linkedin"]').attr('href', data.linkedin);
            $('[data-field="linkedin"]').css('display', 'block');
            $('[data-field="linkedin"]').css('cursor', 'pointer');
        }
        if (data.instagram !== '' && data.instagram !== null) {
            $('[data-field="instagram"]').attr('href', data.instagram);
            $('[data-field="instagram"]').css('display', 'block');
            $('[data-field="instagram"]').css('cursor', 'pointer');
        }


        $('[data-field="mapaUrl"]').attr({
            'href': '/' + idioma + '/mappa#' + JSON.parse(data.url)[idioma],
            'target': '_black'
        });
        $('[data-field="urllink"]').attr({
            'href': '//' + data.pagina
        });
        $('[data-field="emaillink"]').attr({
            'href': 'mailto:' + data.email
        });
        var str = JSON.parse(data.descripcion)[idioma];
        var desc = str.replace(/(?:\r\n|\r|\n)/g, '<br />');

        $('[data-field="prenota"]').attr('href', data.ruta);
        $('[data-field="email"]').html(data.email);
        $('[data-field="logo"]').attr('src', Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo).toString());
        $('[data-field="descripcion"]').html(desc);
        $('[data-field="logoRes"]').attr('src', Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo).toString());
        $('[data-field="logo"]').css({
            width: '180px',
            height: '122px'
        });
        $('title').html(JSON.parse(data.title)[idioma].capitalize());

        var templateGaleria = '<div class="item" style="width:100%;max-height: 340px; overflow:hidden;"><img src="%src%" class="img-responsive" width="100%" height="100%"></div>';
        var templateGaleria1 = '<div class="item active" style="width:100%;max-height: 340px; overflow:hidden;"><img src="%src%" class="img-responsive" width="100%" height="100%"></div>';
        var templateGaleriaRes = '<div style="width:100%;max-height: 340px; overflow:hidden;" class="item next left"><img height="100%" width="100%" class="img-responsive" src="%src%"></div>';
        var templateGaleriaRes1 = '<div style="width:100%;max-height: 340px; overflow:hidden;" class="item next left"><img height="100%" width="100%" class="img-responsive" src="%src%"></div>';
        var html = '';
        var html2 = '';
        var gal = data.logoprincipal.split(',');
        var gal2 = data.imagenslider.split(',');
        for (var i = 0; i < gal.length; i++) {
            var img = gal[i];
            var img2 = gal2[i];
            if (i == 0) {
                html += templateGaleria1.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/main/' + img);
                html2 += templateGaleria1.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/galeria/' + img2);
            } else {
                html += templateGaleriaRes.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/main/' + img);
                html2 += templateGaleriaRes1.replace(/%src%/gi, Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/galeria/' + img2);
            }
        }
        ;


        $('#myCarousel2 .carousel-inner').html(html).promise().done(function() {
            $('#myCarousel2').carousel({
                interval: 2000,
            });
            //$('.carousel-inner').addClass('is-loading');
            $('.carousel-inner').css('display', 'none');
            $('#myCarousel2 .carousel-inner').imagesLoaded()
                    .always(function(instance) {
           //     console.log('all images loaded');
            })
                    .done(function(instance) {
         //       console.log('all images successfully loaded');
                // $('.carousel-inner').removeClass('is-loading');
                $('#pre-load').css('display', 'none');

                $('#loguis').css('z-index', '0');
                $('#logus').css('z-index', '0');
                //$('#logus').css('display', 'block').css('height', '152px');
                $('.row.imagen.hidden-xs').append('<img id="logus" src="' + Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo).toString() + '" alt="" class="logo-img hidden-xs" data-field="logo" style="	width:229px;height:152px;z-index:0">');
                $('.carousel-inner').css('display', 'block');

            });

            $('#myCarousel3').carousel('cycle');

        });
        $('#myCarousel3 .carousel-inner').html(html2).promise().done(function() {
            $('#myCarousel3').carousel({
                interval: 2000,
            });
            $('.carousel-inner').css('display', 'none');
            $('#myCarousel3 .carousel-inner').imagesLoaded()
                    .always(function(instance) {
 //               console.log('all images loaded');
            })
                    .done(function(instance) {
        //        console.log('all images successfully loaded');
                // $('.carousel-inner').removeClass('is-loading');
                $('#pre-loadres').css('display', 'none');
                $('.carousel-inner').css('display', 'block');
                $('#loguis').css('z-index', '0');
                $('#logus').css('z-index', '0');
                //$('#logus').css('display', 'block').css('height', '152px');
                $('.row.imagen.visible-xs').append('<img id="loguis" src="' + Tools.baseAdmin + 'public/uploads/' + Tools.clearStr(JSON.parse(data.nombre)['it']) + '/logo/' + CryptoJS.MD5(data.logo).toString() + '" alt="" class="logo-img-res visible-xs" data-field="logoRes" style="z-index:0">');

            });


            $('#myCarousel3').carousel('cycle');
        });
        var templateOferta = '<div class="col-sm-6 offer img-ofert-iz"><div><a href="%src%" class="enlace-oferta"><div class="col-sm-7 col-xs-7 imagen-ofertas visible-xs"><img src="%img-res%" alt="" class="img-responsive"></div><div class="col-sm-7 col-xs-7 imagen-ofertas hidden-xs"><img class="img-responsive" alt="" src="%img%"></div><div class="col-sm-5 col-xs-5"><p class="f1"><i class="fa fa-tag"></i> Offerte</p><p class="" style="font-size: 14px !important;color: #333 !important;margin-bottom: 0px !important;">%nombre%</p><p class="f3">%microsite%</p><p class="descuento f3"><span class="percentual">%descuento% %cuent%</span></p></div><div class="clearfix"></div></div></div>';
        var templateNoticia = '<div class="col-sm-4"><div><a class="enlace-noticia" href="%url%"><img alt="" class="img-responsive" src="%img%"><div style="margin-top:16px;"><span class=" textoB">%nombre%</span><br><span class="gris fecha">%fecha%</span><span class="text-left flechita "><img alt="" src="/images/dd.png"></span><div class="clearfix"></div></div></a></div></div>';
        var templateEvento = '<div class="col-sm-4"><div><a class="enlace-noticia" href="%url%"><img alt="" class="img-responsive" src="%img%"><div style="margin-top:16px;"><span class=" textoB">%nombre%</span><br><span class="gris fecha">%fecha%</span><span class="text-left flechita "><img alt="" src="/images/dd.png"></span><div class="clearfix"></div></div></a></div></div>';
        Tools.cargarPrincipal({
            url: '//services.sanremo-on.com/service/ofertas/format/json',
            method: 'get',
            json: true,
            callback: function(rr) {
                var elemento = '';
                for (var i = 0; i < rr.length; i++) {
                    var item = rr[i];
                    if (item.idmicrosite.idmicrosite == data.idmicrosite) {
                         /* Added Code and if condition to hide expired offers  */
                        serverdate=new Date(item.current_date);
                        offerdate=new Date(item.fechafin);
                        if(offerdate>serverdate){
                            /* SIPL VC 14-09-2016 */ 
                        elemento = templateOferta.replace('%img%', '//admin.sanremo-on.com/public/uploads/ofertas/' + item.imagengrid);
                        elemento = elemento.replace('%img-res%', '//admin.sanremo-on.com/public/uploads/ofertas/' + item.gridmovil);

                        elemento = elemento.replace('%src%', '//sanremo-on.com/' + idioma + '/news/offerte/' + Tools.clearStr(JSON.parse(data.nombre)[idioma]).toLowerCase() + '/' + JSON.parse(item.url)[idioma] + '.html');
                        elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[idioma]);
                        elemento = elemento.replace('%microsite%', JSON.parse(data.nombre)[idioma]);
                        elemento = elemento.replace('%descuento%', item.porcentaje !== '' ? item.porcentaje : '');
                        if (isNaN(item.porcentaje) || item.porcentaje == '')
                        {
                            //alert("no es numero");
                            elemento = elemento.replace('%cuent%', '');
                        } else if (!isNaN(item.porcentaje)) {
                            //alert("si es numero");
                            elemento = elemento.replace('%cuent%', '% Sconto');

                        }
                        elemento = elemento.replace('%tt%', item.porcentaje !== '' ? '' : 'hidden');

                        $('.row.offerandnew.ofertas').append(elemento);
                        }
                    }
                }
                
                if (elemento == '') {
                    $('.row.linea.orange.oferta').css('display', 'none');
                }

            },
            error: function() {
                $('.row.linea.orange.oferta').css('display', 'none');
            }
        });
        Tools.cargarPrincipal({
            url: '//services.sanremo-on.com/service/noticias/format/json',
            method: 'get',
            json: true,
            callback: function(rr) {
                var elemento = '';
                for (var i = 0; i < rr.length; i++) {
                    var item = rr[i];
                    fecha = item.fechainicio.trim();
                    f1 = fecha.trim().split('-');
                    f2 = fecha[1].trim().split('/');
                    newfecha = f1[2] + '/' + f1[1] + '/' + f1[0];


                    // fecha = item.fechainicio.trim();
                    // f1 = fecha.trim().split('/');
                    // // f2 = fecha[1].trim().split('/');
                    // newfecha = f1[1] + '/' + f1[0] + '/' + f1[2];

                    if (item.microsite == data.idmicrosite) {
                        //console.log(item.fechainicio);
                         /* Added Code and if condition to hide expired offers  */
                        serverdate=new Date(item.current_date);
                        newsdate=new Date(item.fechafin);
                       // if(newsdate>serverdate){
                        /* SIPL VC 14-09-2016 */ 
                            elemento = templateNoticia.replace('%img%', '//admin.sanremo-on.com/public/uploads/noticia/' + item.imagengrid);
                            elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[idioma]);
                            elemento = elemento.replace('%url%', '//sanremo-on.com/' + idioma + '/news/attualita/' + Tools.clearStr(JSON.parse(data.nombre)[idioma]).toLowerCase() + '/' + JSON.parse(item.url)[idioma] + '.html');
                            elemento = elemento.replace('%microsite%', JSON.parse(data.nombre)[idioma]);
                            elemento = elemento.replace('%fecha%', newfecha);
                            $('.row.offerandnew.noticias').append(elemento);
                        //}
                    }
                }
               
                if (elemento == '') {
                    $('.row.linea.orange.noticias').css('display', 'none');
                }
            },
            error: function() {
                $('.row.linea.orange.noticias').css('display', 'none');
            }
        });

        Tools.cargarPrincipal({
            url: '//services.sanremo-on.com/service/eventos/format/json',
            method: 'get',
            json: true,
            callback: function(rr) {
                var elemento = '';

                for (var i = 0; i < rr.length; i++) {
                    var item = rr[i];
                    fecha = item.fechainicio.trim();
                    f1 = fecha.trim().split('-');
                    f2 = fecha[1].trim().split('/');
                    newfecha = f1[2] + '/' + f1[1] + '/' + f1[0];


                    // fecha = item.fechainicio.trim();
                    // f1 = fecha.trim().split('/');
                    // // f2 = fecha[1].trim().split('/');
                    // newfecha = f1[1] + '/' + f1[0] + '/' + f1[2];
                   
                    if (item.microsite == data.idmicrosite) {
                        var dates =  item.fechafin.split("-");
                        var endDateArr = dates[1].split("/");
                        var endDate = endDateArr[2].trim()+'-'+endDateArr[0].trim()+"-"+endDateArr[1].trim();
                        serverdate=new Date(item.current_date);
                        offerdate=new Date(endDate);
                        if(offerdate>serverdate){
                        elemento = templateEvento.replace('%img%', '//admin.sanremo-on.com/public/uploads/evento/' + item.fotogrid);
                        elemento = elemento.replace('%nombre%', JSON.parse(item.nombre)[idioma]);
                        elemento = elemento.replace('%url%', '//sanremo-on.com/' + idioma + '/news/eventi/' + Tools.clearStr(JSON.parse(data.nombre)[idioma]).toLowerCase() + '/' + JSON.parse(item.url)[idioma] + '.html');
                        elemento = elemento.replace('%microsite%', JSON.parse(data.nombre)[idioma]);
                        elemento = elemento.replace('%fecha%', newfecha);
                        $('.row.offerandnew.eventos').append(elemento);
                        }
                    }
                }
                ;
                if (elemento == '') {
                    $('.row.linea.orange.eventos').css('display', 'none');
                }
            },
            error: function() {
                $('.row.linea.orange.eventos').css('display', 'none');
            }
        });
    },
    error: function() {
    }
});
// row offerandnew