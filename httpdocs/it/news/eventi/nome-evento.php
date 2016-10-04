<?php 
$s = explode('/', $_SERVER["REQUEST_URI"]);
$r = $s[count($s)-1];
$r = substr($r,0,-5);
$ch = curl_init();
$url= "http://services.sanremo-on.com/service/evento/url/".$r."/format/json";
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
$micro = json_decode($result, true);
$idioma = 'it';
$micro['title'] = json_decode($micro['title'],true);
$micro['description'] = json_decode($micro['description'],true);
$micro['url'] = json_decode($micro['url'],true);
?>
<!DOCTYPE html>
<html lang="it">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="">
		<meta name="google-site-verification" content="sotszM6wSuLJtsV44WJhI8AfCwiQlc2fkb0Zc4RF6ag" />
		<meta name="robots" content="INDEX,FOLLOW" />
		<meta name="DC.title" content="Sanremo ON" />
		<meta name="DC.Identifier" content="http://www.sanremo-on.com/"/>
		<meta name="DC.Publisher" content="ciao[at]esedigital.com" />
		<meta name="geo.region" content="IT-IM" />
		<meta name="geo.placename" content="Sanremo" />
		<meta name="DC.Language" content="it" />
		<meta name="Generator" content="Esedigital " />
		<meta name="author" content="Esedigital" />
		<meta name="distribution" content="global" />
		<meta name="Revisit" content="7 days" />
		<meta name="category" content="Ristoranti, alberghi, negozi, cinema" />
		<meta name="rating" content="Safe For Kids" />
		<meta name="copyright" content="*" />
		<link rel="icon" type="image/ico" href="sanremo-on.com/images/favicon.png">
		<link rel="shortcut icon" href="sanremo-on.com/images/favicon.png" type="image/x-icon">

		<meta property="og:image" content="http://admin.sanremo-on.com/public/uploads/evento/<?php echo $micro['fotobody'] ?>" />
		<meta name="description" content="<?php echo $micro['description'][$idioma] ?>">
		<meta property="og:title" content="<?php echo $micro['title'][$idioma] ?>" />
		<meta property="og:description" content="<?php echo $micro['description'][$idioma] ?>" />
		<meta property="og:site_name" content="<?php echo $micro['url'][$idioma] ?>" />
		<title><?php echo $micro['title'][$idioma] ?></title>


		<link href="/css/bootstraps.min.css" rel="stylesheet">
		<link href="/css/bootstrap-select.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="/fonts/stylesheet.css">
		<link rel="stylesheet" type="text/css" href="/css/fractionslider.css" />
		<link rel="stylesheet" type="text/css" href="/css/jquery.mmenu.all.css" />
		<link rel="stylesheet" href="/css/css.css">
		<link rel="stylesheet" href="/css/responsive.css">
		<link rel="stylesheet" href="/css/css.eventi.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
			<!-- ICONOS -->
			<link rel="stylesheet" href="/css/icons/css/icons.css">
	        <link rel="stylesheet" href="/css/icons/css/ie7/ie7.css">
	        <!-- FIN ICONOS -->
		<link rel="icon" type="image/png" href="/images/favicon.png" />
		<script>
				  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				  ga('create', 'UA-64835947-1', 'auto');
				  ga('send', 'pageview');
		</script>
	</head>
	<body>
		<!-- PRECARGA -->
		<script>
			(function(){
				// document.querySelector('.membership').style.display = 'none';
			    document.getElementsByTagName('body')[0].innerHTML = document.getElementsByTagName('body')[0].innerHTML+'<div class="cargando"><figure style="padding:0 3em;overflow:visible;"><div class="spinner"></div></figure></div>';
			   })();
		</script>
		<!-- FIN PRECARGA -->
		
		<div id="header-container" class="Fixed">
		                    <header id="header">
		                        <div class="menu-movil visible-xs">
		                            <!-- <img src="/images/responsive/Menu-Lineas.png" alt=""> -->
		                            <a href="#mmovil" class="mm"><i class="fa fa-bars"></i></a>
		                        </div>
		                        <div class="logo" title="" ><a href="/it" class="enlace-logotipo" id="logo-full"><img class="hidden-xs" src="/images/Logo-Sanremo-On.png" alt=""></a>
		                                                   <a href="/it" class="enlace-logotipo" id="logo-resp"><img class="visible-xs" src="/images/responsive/Logo.png" alt=""></a>
		                        </div>
		                        <div id="global">
		                            <ul class="membership">
		                                <li>
		                                    <a data-target="#login_panel" data-toggle="modal" title="" href="#" data-original-title="Login" class="dropdown cambio" title="Registro ">
		                                        <span class="hidden-xs">Hai un account? Login &nbsp;</span>
		                                        <span class="icon-user ico-mapa-nav2"></span>
		                                        <!-- <div class="usuarioIcono"></div> -->
		                                    </a>
		                                </li>
		                                <!--// .membership.sign lzv -->
		                            </ul>
		                            <!--// .membership -->
		                            <ul class="languages">
		                                <li class="cambio" data-imgClass="idioma showIdiomas">
		                                    <a class="dropdown" href="#">
		                                        <span class="lingua-text">Lingua </span>
		                                        <span class="icon-iconosmondo ico-mapa-nav3"></span>
		                                        <!-- <div class="idiomaIcono"></div> -->
		                                    </a>
		                                    <div class="idioma-ul">
		                                        <ul class="idiomas">
		                                            <li class="pt-br">
		                                                <a title="Inglés" href="http://sanremo-on.com/en">
		                                                    <img src="/images/UK.png" alt="">
		                                                    Inglese
		                                                </a>
		                                            </li>
		                                            <li class="pt-br">
		                                                <a title="Italiano" href="http://sanremo-on.com/it">
		                                                    <img src="/images/italiano.png" alt="">
		                                                    Italiano
		                                                </a>
		                                            </li>
		                                             <li class="pt-br">
		                                                <a title="Frances" href="http://sanremo-on.com/fr">
		                                                    <img src="/images/FRench.png" alt="">
		                                                    Francese
		                                                </a>
		                                            </li>
		                                            <li class="pt-br">
		                                                <a title="Ruso" href="http://sanremo-on.com/ru">
		                                                    <img src="/images/RUssian.png" alt="">
		                                                    Russo
		                                                </a>
		                                            </li>
		                                            <!--<li class="zh-cn">
		                                                <a title="Chino" href="#">
		                                                    <img src="/images/China.png" alt="">
		                                                    Chino
		                                                </a>
		                                            </li> -->
		                                        </ul>
		                                        <div class="clearfix"></div>
		                                    </div>
		                                </li>
		                            </ul>

		                           
		                        </div>
		                        <div id="navigation">
		                            <nav>
		                                <ul class="main" style="    float: left;
		    left: 52%;
		    margin: 0 auto;
		    padding-left: 0;
		    position: relative;
		    max-width: 936.1px;
		    width: 100%;">
		                                    <li class="home" style="    padding-top: 12px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it"><span><i class="fa fa-home ico-casa-nav"></i> Home</span></a>
		                                    </li>
		                                    <li class="brands" style="    padding-top: 14px;">

		                                        <a class="dropdown" title="Mapa Interactivo" href="http://sanremo-on.com/it/mappa"><span><img src="/images/Mappa.png" alt=""> MAPPA</span></a>

		                                        <!-- <a class="dropdown" title="Mapa Interactivo" href="http://sanremo-on.com/it/mappa"><span><span class="icon-mappa blanco ico-mapa-nav"></span> MAPPA</span></a>

		                                        <a class="dropdown-mobile" title="" href=""><i class="icon-circle-arrow-right icon-white"></i></a> -->
		                                    </li>
		                                    <li id="sanmenunegozi" class="offers" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/negozi"><span>NEGOZI</span></a>
                                                         <ul class="sanmenunegozi" style="position:absolute; z-index:999999; display:none">
                                                    <li ><a class="sananegozi" title="" href="http://sanremo-on.com/it/news/offerte-immobiliari.html"><span>Offerte Immobiliari</span></a></li>
                                                   
                                                </ul>
		                                    </li>
		                                    <li class="your-visit" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/ristoranti-bar"><span>Food & Drink</span></a>
		                                    </li>
		                                    <li id="sanmenuacc" class="guest-services" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/hotel"><span>Accomodation</span></a>
		                                        <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                        <ul class="sanmenuacc" style="position:absolute; z-index:999999; display:none">
		                                            <li ><a class="sanaacc" title="" href="http://sanremo-on.com/it/news/offerte-soggiorno.html"><span>Offerte Soggiorno</span></a></li>
		                                           
		                                        </ul>
		                                    </li>
		                                    <!--// .guest-services -->
		                                    <li class="chic-travel" style=" padding-top: 12px;   width: 100px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/tempo-libero-e-benessere"><span>TEMPO LIBERO E BENESSERE</span></a>
		                                        <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>
		                                    <li class="chic-travel" style=" padding-top: 12px;   width: 100px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/spettacoli-cinema"><span>SPETTACOLI E CINEMA </span></a>
		                                        <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>
		                                    <li class="chic-travel" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/news.html"><span>NEWS</span></a>
		                                        <a class="dropdown-mobile" title="http://sanremo-on.com/it/news.html" href=""><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>
		                                    <li class="whats-on" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/servizi.html"><span>SERVIZI</span></a>
		                                        <a class="dropdown-mobile" title="" href="http://sanremo-on.com/it/servizi.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>
		                                    <li id="sanmenu" class="whats-on" style="width: 75px; padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/la-citta.html"><span>SANREMO</span></a>
		                                        <a class="dropdown-mobile" title="" href="http://sanremo-on.com/it/la-citta.html"><i class="icon-circle-arrow-right icon-white"></i></a>

		                                        <ul class="sanmenu" style="position:absolute; z-index:99999999; display:none">
		                                            <li ><a class="sana" title="" href="http://sanremo-on.com/it/la-citta.html"><span>La Città</span></a></li>
		                                            <li ><a class="sana" title="" href="http://sanremo-on.com/it/gallery.php"><span>Foto</span></a></li>
		                                            <li ><a class="sana" title="" href="http://sanremo-on.com/it/galleryVideo.php"><span>Video</span></a></li>
		                                        </ul>
		                                       
		                                    </li>
		                                    <li class="whats-on" style="width: 85px;  background: #c9840d; padding-top: 14px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/sanremo-on-air/"><span><img src="http://sanremo-on.com/images/sanremoonair.png"></span></a>
		                                        <a class="dropdown-mobile" title="" href="http://sanremo-on.com/it/servizi.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>

		                                   
		                                       
		                                    <!-- <li class="whats-on">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/it/gallery.php"><span>Gallery</span></a>
		                                        <a class="dropdown-mobile" title="" href="http://sanremo-on.com/it/gallery.php"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li> -->
		                                    <!-- <li class="membership sign-in visible-phone">
		                                        <a class="dropdown" title="Registro / Inicia sesión" href="/membership"><span>ATTUALITÀ </span></a>
		                                    </li> -->
		                                </ul>
		                            </nav>
		                            <nav id="mmovil">
		                                <ul>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it">
		                                            <i class="fa fa-home"></i>
		                                            <span class="menusito">Home</span>
		                                        </a>
		                                    </li>
		                                    <li >
		                                        <a href="http://sanremo-on.com/sanremo-on-air/">
		                                            <i class="fa fa-bullhorn"></i>
		                                            <span class="menusito"><!-- <img style="padding-left: 5px; padding-top: 3px; width:100%; height:100%;" src="http://sanremo-on.com/images/festival.png"> -->Sanremo ON Air</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/mappa">
		                                            <span class="icon-mappa blanco size-icon2"></span>
		                                            <span class="menusito">Mappa</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/negozi">
		                                            <span class="icon-negozi blanco size-icon2"></span>
		                                            <span class="menusito">Negozi</span>
		                                        </a>
                                                        <ul>
		                                            <li><a class="" title="" href="http://sanremo-on.com/it/news/offerte-immobiliari.html"><span>Offerte Immobiliari</span></a></li> 
		                                        </ul>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/ristoranti-bar">
		                                            <span class="icon-food-drink blanco size-icon2"></span>
		                                            <span class="menusito">Food & Drink</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/hotel">
		                                            <span class="icon-iconos-03 blanco size-icon2"></span>
		                                            <span class="menusito">Accomodation</span>
		                                        </a>
		                                        <ul>

		                                            <li><a class="" title="" href="http://sanremo-on.com/it/news/offerte-soggiorno.html"><span>Offerte Soggiorno</span></a></li>

		                                                                                        
		                                        </ul>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/tempo-libero-e-benessere">
		                                            <span class="icon-tempo-libero blanco size-icon2"></span>
		                                            <span class="menusito">Tempo Libero e Benessere</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/spettacoli-cinema">
		                                            <span class="icon-cinema-e-spettacoli blanco size-icon2"></span>
		                                            <span class="menusito">Spettacoli e Cinema</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/news/offerte.html">
		                                            <i class="fa fa-tags"></i>
		                                            <span class="menusito">Offerte</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/news/eventi.html">
		                                            <i class="fa fa-calendar-o"></i>
		                                            <span class="menusito">Eventi</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/news.html">
		                                            <i class="fa fa-bullhorn"></i>
		                                            <span class="menusito">News</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/servizi.html">
		                                            <i class="fa fa-info-circle"></i>
		                                            <span class="menusito">Servizi</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="#mm-3">
		                                            <i class="fa fa-sun-o"></i>
		                                            <span class="menusito">Sanremo</span>
		                                        </a>
		                                        <ul>
		                                            <li><a class="" title="" href="http://sanremo-on.com/it/la-citta.html"><span>La Città</span></a></li>
		                                                                                        <li ><a class="" title="" href="http://sanremo-on.com/it/gallery.php">Foto</span></a></li>
		                                                                                        <li ><a class="" title="" href="http://sanremo-on.com/it/galleryVideo.php">Video</span></a></li>
		                                        </ul>
		                                    </li>
		                                    <!-- <li>
		                                        <a href="http://sanremo-on.com/it/gallery.php">
		                                            <i class="fa fa-sun-o"></i>
		                                            <span class="menusito">Gallery</span>
		                                        </a>
		                                    </li> -->
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/come-arrivare.html">
		                                            <span class="icon-iconosbussola blanco size-icon2"></span>
		                                            <span class="menusito">Raggiungi Sanremo</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/it/chi-siamo.html">
		                                            <i class="fa fa-user"></i>
		                                            <span class="menusito">Chi Siamo</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="privacy.html">
		                                            <i class="fa fa-copyright"></i>
		                                            <span class="menusito">Politica di Privacy</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="cookies.html">
		                                            <i class="fa fa-exclamation-triangle"></i>
		                                            <span class="menusito">Cookie</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="contatto.html">
		                                            <span class="icon-iconoslettera blanco size-icon2"></span>
		                                            <span class="menusito">Contatti</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="note-legali.html">
		                                            <i class="fa fa-gavel"></i>
		                                            <span class="menusito">Note Legali</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="#mm-4">
		                                            <i class="fa fa-language"></i>
		                                            <span class="menusito">Lingua</span>
		                                        </a>
		                                        <ul>
		                                            <li class="en">
		                                                <a title="Inglés" href="/en">
		                                                    <img src="/images/UK.png" alt="">
		                                                    English
		                                                </a>
		                                            </li>
		                                            <li class="en">
		                                                <a title="Italiano" href="http://sanremo-on.com/it">
		                                                    <img src="/images/italiano.png" alt="">
		                                                    Italiano
		                                                </a>
		                                            </li>
		                                            <li class="en">
		                                                <a title="Frances" href="/fr">
		                                                    <img src="/images/FRench.png" alt="">
		                                                    Francese
		                                                </a>
		                                            </li>
		                                            <li class="en">
		                                                <a title="Ruso" href="/ru">
		                                                    <img src="/images/RUssian.png" alt="">
		                                                    Russo
		                                                </a>
		                                            </li>
		                                        </ul>
		                                    </li>
		                                </ul>
		                            </nav>
		                        </div>
		                    </header>
		                </div>
		<div class="wrapper">
			<div class="container">
				<div class="content">
					<div class="cuerpo">
						<div class="row hidden-xs">
							<ol class="breadcrumb">
								<li><a href="/it/">Home</a></li>
								<li><a href="/it/news.html">News</a></li>
								<li><a href="/it/news/eventi.html">Eventi</a></li>
								<li class="active" data-field="nombre">Nome Evento</li>
							</ol>
						</div>
						<div class="row filtros">
							<div class="col-sm-12 noticia margen-inferior">
								<span class="orange font-16"><strong data-field="nombre">NOME EVENTO</strong></span>
								<span class="orange pull-right font-16"><strong data-field="fecha">24-07-2015</strong></span>
							</div>
							
						</div>
						<div class="row superior">
							<img src="/images/Slide.png" alt="" data-field="body" class="img-responsive">
						</div>

						<div class="row cuerpo2">
							<div class="col-sm-12">
							<span class="orange titulo-secundario"><strong data-field="nombre">SUBTITULO EVENTO</strong></span>
							
								<p class="text-justify margen-sobre cuerpo-de-texto" data-field="descripcion">
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo magnam doloremque nihil tenetur, illo saepe vero, numquam, ullam iusto commodi soluta laborum itaque est. Accusamus iste, dicta voluptatibus nostrum ea exercitationem rem quod, dolor vero repudiandae, facilis ab omnis nesciunt neque at corporis repellendus consequuntur libero quasi, natus. Aut ullam quisquam at architecto deserunt necessitatibus quibusdam praesentium aliquid, dicta possimus natus eligendi nemo ratione obcaecati quis cupiditate earum explicabo nesciunt ipsum laboriosam? Odit neque, in labore suscipit nostrum nihil, vero, velit, repudiandae alias consequatur accusamus consectetur cum quidem. Cupiditate nemo ut culpa ullam, in quaerat autem excepturi dolorum ducimus labore suscipit nostrum nihil, vero, velit, repudiandae alias consequatur.
								</p>
								

							</div>
						</div>
						<div class="row compartir">
							<span class='st_sharethis_large' displayText='ShareThis'></span>
							<span class='st_facebook_large' displayText='Facebook'></span>
							<span class='st_twitter_large' displayText='Tweet'></span>
							<span class='st_pinterest_large' displayText='Pinterest'></span>
							<span class='st_email_large' displayText='Email'></span>
							<script type="text/javascript">var switchTo5x=true;</script>
							<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
							
						</div>
						<div class="row mensaje">
							
								<div>
									<a data-target="#panel-mailchimp" data-toggle="modal" title="" href="#" data-original-title="Login" class="dropdown cambio" title="Registro">
										<div class="col-sm-1">
											<div>
												<img src="/images/Your-On.png" alt="">
											</div>
										</div>
										<div class="col-sm-7">
											<div>
												<p class="text-justify dark-orange">Vuoi essere sempre informato, su eventi, offerte e promozioni della città dei Fiori? 
												Registrati e sarai sempre ON su Sanremo.</p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="col-sm-4">
											<div>
												<div class="buttonOrange">REGiSTRATI IN SANREMO ON &nbsp;</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</a>
								</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="footer-container">
									<footer>
										<div class="container">
											<div class="row primero">
												<div class="logoF"><img src="/images/Sanremo-On-Footer.png" alt=""></div>
												<div class="mapaLogo"><span class="icon-mappa blanco ico-mapa-nav"></span> <a href="http://sanremo-on.com/it/mappa" class="footer-link">Mappa Interattiva</a> </div>
											</div>
											<div class="row segundo">
												<div class="menu col-sm-7">
													<div class="col-sm-3">
														<span class="orange"><strong>Categorie</strong></span>
														<ul>
															<li><a href="http://sanremo-on.com/it/negozi">Negozi</a></li>
															<li><a href="http://sanremo-on.com/it/ristoranti-bar">Food & Drink</a></li>
															<li><a href="http://sanremo-on.com/it/hotel">Accomodation</a></li>
															<li><a href="http://sanremo-on.com/it/tempo-libero-e-benessere">Tempo Libero e Benessere</a></li>
															<li><a href="http://sanremo-on.com/it/spettacoli-cinema">Spettacoli e Cinema</a></li>
														</ul>
													</div>
													<div class="col-sm-3">
														<span class="orange"><strong>News</strong></span>
														<ul>
															<li><a href="http://sanremo-on.com/it/news/attualita.html">Attualità</a></li>
															<li><a href="http://sanremo-on.com/it/news/eventi.html">Eventi</a></li>
															<li><a href="http://sanremo-on.com/it/news/offerte.html">Offerte</a></li>
														</ul>
													</div>
													<div class="col-sm-3">
														<span class="orange"><strong>Rete Impresa</strong></span>
														<ul>
															<li><a href="http://sanremo-on.com/it/chi-siamo.html">Chi Siamo</a></li>
														</ul>
													</div>
													<div class="col-sm-3">
														<span class="orange"><strong>Sanremo</strong></span>
														<ul>
															<li><a href="http://sanremo-on.com/it/come-arrivare.html">Come raggiungere Sanremo</a></li>
															<li><a href="http://sanremo-on.com/it/la-citta.html">Conosci Sanremo</a></li>
														</ul>
													</div>
												</div>
												<div class="social col-sm-5">
													<div class="col-sm-12">
													<p>Seguici su:</p>
													<a href="https://www.facebook.com/sanremoon" target="_blank"><img src="/images/Fb.png" alt=""></a>
													<a href="https://twitter.com/SanremoOn" target="_blank"><img src="/images/Twitter.png" alt=""></a>
													<a href="https://www.youtube.com/channel/UCz0kZtT62QKyhFB_Hk24jrw" target="_blank"><img src="/images/Youtube.png" alt=""></a>
													<a href="https://plus.google.com/u/0/105050793970673159877/posts" target="_blank"><img src="/images/Google-+.png" alt=""></a>
													<!-- <a href="#" target="_blank"><img src="/images/Pinterest.
													png" alt=""></a> -->
												</div>
													<div>	
														<div class="col-sm-8" style="padding-left:0px;">
																									<p class="maginApp"> Scaricati l'app:</p>
																																			
																										<img class="col-sm-5" src="/images/sr-icon-app.png" alt="" style="border-radius: 10px !important; padding:0px !important;width: 80px;">
																										<div style="width: 90px;float: right;transform:translate(-50px);" class="col-sm-5">
																											<a href="https://geo.itunes.apple.comhttp://sanremo-on.com/it/app/sanremo-on/id1031320757?mt=8" target="_blank"><img src="http://sanremo-on.com/images/AppleStorelogoOn@2.png" alt="" width="87" height="33" style="
														    left: -20px;
														"></a>
																											<a href="https://play.google.com/store/apps/details?id=com.ionicframework.myapp802908" target="_blank"><img src="http://sanremo-on.com/images/Playstorelogowhite@2.png" alt="" width="87" height="33"></a>
																										</div>
																										<div style="width: 90px;float: right;height: 20px;"></div>
																																			
																																			
																								</div>
													</div>
												</div>
											</div>
											<div class="row ultimo">
												<div class="copyright">
													© Copyright - Sanremo On Rete di Impresa - p.iva 01615270087 - 2015 Tutti i diritti riservati
													<div class="menuBottom">
														<ul>
															<li><a href="http://sanremo-on.com/it/contatto.html">Contatti</a></li>
															<li><a href="http://sanremo-on.com/it/privacy.html">Politica di privacy</a></li>
															<li><a href="http://sanremo-on.com/it/note-legali.html">Note Legali</a></li>
															<li><a href="http://sanremo-on.com/it/cookies.html">Cookie</a></li>
														</ul>
														<div class="clearfix"></div>
													</div>
													<div class="powered">
													  Powered by: <a href="http://www.esedigital.com/" target="_blank" class="link-naranja">©Esedigital</a> 
													</div>
													<div class="clearfix"></div>
												</div>
											</div>
										</div>
									</footer>
								</div>



		<div id="login_panel" class="modal fade in" style="display: none; ">
			<div class="sombra" data-dismiss="modal" style="position:fixed,width:100%,height:100%;background:rgba(0,0,0,0.8)"></div>
			<div class="modal-dialog modal-middle col-xs-12 col-sm-3 no-padding">
				<div class="modal-content no-padding">
					<div class="modal-header text-center">
						<h4 id="myModalLabel" class="modal-title">
							<span class="icon-user ico-user-nav"></span>
							<span class="texto-popup">SIGN INTO YOUR ACCOUNT</span>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" name="login_form" id="login_form" action="#">
								<div class="form-group">
									<button class="btn btn-block btn-navy facebook_connect" type="button">
										<i class="fa fa-facebook"></i> &nbsp;
										<strong>Login with Facebook</strong>
									</button>
								</div>
								<div class="form-group separator-text text-center">
									<span>OR</span>
								</div>
							<div class="form-group">
								<input type="text" required="" placeholder="Username" class="form-control" value="" id="username" name="log">
							</div>
							<div class="form-group">
								<input type="password" required="" placeholder="Password" class="form-control" value="" id="password" name="pwd">
							</div>
							<!-- Login Button -->
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<span class="descrip"><p class="centrar">Your privacy is important to us and we will never rent or sell your information.</p></span>
									</div><!-- /.col-md-12 -->
									<div class="col-md-12">
										<span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso">Sottoscrivo le <a href="/privacy.html" id="permiso">regole sulla privacy del sito.</a></p></span>
									</div><!-- /.col-md-12 -->
								</div><!-- /.row -->
								<div class="row">
									<div class="col-md-12">
										<input type="hidden" value="/directory/demo1/" name="redirect_to">
										<button class="btn btn-block btn-danger" type="submit">
											<strong>Login</strong>
										</button>
									</div><!-- /.col-md-12 -->
								</div><!-- /.row -->
							</div>

							<hr class="padding-5px">

							<!-- Sign up Button -->
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">

																	<div class="well well-sm">
											<small><p class="texto-pop">Non sei ancora collegato, registrati.</p></small>
										</div>
																</div>
								</div><!-- /.row -->
							</div>

						</form>
					</div><!-- /.modal-body -->

				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
		<div id="panel-mailchimp" class="modal fade in" style="display: none; ">
			<div class="sombra" data-dismiss="modal" style="position:fixed,width:100%,height:100%;background:rgba(0,0,0,0.8)"></div>
			<div class="modal-dialog modal-middle col-xs-12 col-sm-3 no-padding">
				<div class="modal-content no-padding">
					<div class="modal-header text-center">
						<h4 id="myModalLabel" class="modal-title">
							
							<span class="texto-popup">ISCRIBITI ALLA NEWSLETTER</span>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</h4>
					</div>
					<div class="modal-body">
						
						<!-- CODIGO INSCRIPCION NEWSLETTER -->
							<!-- Begin MailChimp Signup Form -->
						<link href="//cdn-images.mailchimp.com/embedcode/classic-081711.css" rel="stylesheet" type="text/css">
						<style type="text/css">
							#mc_embed_signup{background:#fff; clear:left; font:14px Helvetica,Arial,sans-serif; }
							#mc_embed_signup .asterisk {color: #c9840d;}
							
						</style>
						<div id="mc_embed_signup">
						<form action="//sanremo-on.us11.list-manage.com/subscribe/post?u=3b12de7dfc06adc80e1304567&amp;id=4aff248680" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						    <div id="mc_embed_signup_scroll">
							
							
								<div class="mc-field-group">

								</label>
									<input type="email" value="" name="EMAIL" class="required email form-control input-iscri"  placeholder="Email" >
								</div>
								<div class="mc-field-group">
									<input type="text" value="" name="FNAME" class="form-control input-iscri" placeholder="Nome">
								</div>
								<div class="mc-field-group">
									<input type="text" value="" name="LNAME" class="form-control input-iscri" placeholder="Cognome">
								</div>
									<div id="mce-responses" class="clear">
										<div class="response" id="mce-error-response" style="display:none"></div>
										<div class="response" id="mce-success-response" style="display:none"></div>
									</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
								    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c112f8fba63a3d016c6b7aeab_8c75a7a0e0" tabindex="-1" value=""></div>
								    <div class="clear"><input type="submit" value="ISCRIBITI" name="subscribe" class="btn btn-block btn-danger boton-iscri"></div>
						    </div>
						</form>
						</div>
						<script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
						<!--End mc_embed_signup-->

						<!-- FIN CODIGO INSCRIPCION NEWSLETTER -->


					</div><!-- /.modal-body -->

				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>	
		<script src="/js/jquery-1.11.2.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/bootstrap-select.js"></script>
		<script type="text/javascript" src="/js/jquery.mmenu.min.all.js"></script>
		<script src="/js/jquery.mmenu.fixedelements.min.js"></script>
		<script type="text/javascript" src="/js/retina.js"></script>
		<script type="text/javascript" src="/js/jquery.fractionslider.min.js"></script>
		<script src="/js/Tools.js"></script>
		<script type="text/javascript" src="/js/js.all.js"></script>
		<script src="/js/js.evento.js"></script>
		<script type="text/javascript">stLight.options({publisher: "93d1884f-b0e3-4904-a0d4-b8211962a3f9", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
                                <!-- Inizio Codice ShinyStat -->
                                <script type="text/javascript" language="JavaScript" src="http://codiceisp.shinystat.com/cgi-bin/getcod.cgi?USER=SanremoON&NODW=yes&P=4" async="async"></script>
                                <!-- Fine Codice ShinyStat -->
	</body>
</html>