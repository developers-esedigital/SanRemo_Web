<?php 
$s = explode('/', $_SERVER["REQUEST_URI"]);
$r = $s[count($s)-1];
$r = substr($r,0,-5);
$ch = curl_init();
$url= "http://services.sanremo-on.com/service/microsite/url/".$r."/format/json";
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_URL,$url);
$result=curl_exec($ch);
curl_close($ch);
$micro = json_decode($result, true);
$idioma = 'en';
$micro['title'] = json_decode($micro['title'],true);
$micro['description'] = json_decode($micro['description'],true);
$micro['url'] = json_decode($micro['url'],true);
$micro['nombre'] = json_decode($micro['nombre'],true);
?>
<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
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
		<meta name="description" content="<?php echo $micro['description'][$idioma] ?>">

		<meta property="og:image" content="http://admin.sanremo-on.com/public/uploads/<?php echo clearStr($micro['nombre']['it']) ?>/logo/<?php echo md5($micro['logo']) ?>" />
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
		<link rel="stylesheet" href="/css/css.microsite.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
			<!-- ICONOS -->
			<link rel="stylesheet" href="/css/icons.css">
	        <link rel="stylesheet" href="/css/ie7/ie7.css">
	        <!-- FIN ICONOS -->
		<link rel="icon" type="image/png" href="/images/favicon.png" />
		<style>
		.cargando {
    background: #fff none repeat scroll 0 0;
    height: 100%;
    padding-top: 15%;
    position: fixed;
    top: 0;
    width: 100%;
    z-index: 9999999;
}

</style>
	<!-- paloma****Codigo analitics-->
		<script>
				  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				  ga('create', 'UA-64835947-1', 'auto');
				  ga('send', 'pageview');
		</script>
		<!-- end-->
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
		<style>
		#header-container {
		    position: absolute;
		    top: 0 !important;
		    width: 100%;
		}
		</style>
		
		<div id="header-container" class="Fixed">
			<header id="header">
				<div class="menu-movil visible-xs">
					<!-- <img src="/images/responsive/Menu-Lineas.png" alt=""> -->
					<a href="#mmovil" class="mm"><i class="fa fa-bars"></i></a>
				</div>
				<div class="logo" title="" ><a href="/fr" class="enlace-logotipo" id="logo-full"><img class="hidden-xs" src="/images/Logo-Sanremo-On.png" alt=""></a>
					                       <a href="/fr" class="enlace-logotipo" id="logo-resp"><img class="visible-xs" src="/images/responsive/Logo.png" alt=""></a>
			    </div>
				<div id="global">
					<ul class="membership">
						<li>
							<a data-target="#login_panel" data-toggle="modal" title="" href="#" data-original-title="Login" class="dropdown cambio" title="Registro ">
								<span class="hidden-xs">¿Vous avez un compte? S'identifier &nbsp;</span> 
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
								<span class="lingua-text">Languages </span>
								<span class="icon-iconosmondo ico-mapa-nav3"></span>
								<!-- <div class="idiomaIcono"></div> -->
							</a>
							<div class="idioma-ul">
								<ul class="idiomas">
									<li class="pt-br">
										<a title="Inglés" href="/en">
											<img src="/images/UK.png" alt="">
											Anglais
										</a>
									</li>
									<li class="pt-br">
										<a title="Italiano" href="/it">
											<img src="/images/Italiano.png" alt="">
											Italien
										</a>
									</li>
									 <li class="pt-br">
										<a title="Frances" href="/fr">
											<img src="/images/FRench.png" alt="">
											Francese
										</a>
									</li>
									<li class="pt-br">
										<a title="Ruso" href="/ru">
											<img src="/images/RUssian.png" alt="">
											Russe
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
					</ul>				</div>
				<div id="navigation">
					<nav>
						<ul class="main">
							<li class="home">
								<a class="dropdown" title="" href="/fr"><span><i class="fa fa-home ico-casa-nav"></i>ACCUEIL</span></a>
							</li>
							<li class="brands">

								<a class="dropdown" title="Mapa Interactivo" href="/fr/mappa"><span><img src="/images/Mappa.png" alt=""> PLAN DU SITE </span></a>

								<a class="dropdown" title="Mapa Interactivo" href="/fr/mappa"><span><span class="icon-mappa blanco ico-mapa-nav"></span> PLAN DU SITE </span></a>

								<a class="dropdown-mobile" title="" href=""><i class="icon-circle-arrow-right icon-white"></i></a>
							</li>
							<li class="offers">
								<a class="dropdown" title="" href="/fr/negozi"><span>SHOPPING</span></a>
							</li>
							<li class="your-visit">
								<a class="dropdown" title="" href="/fr/ristoranti-bar"><span>FOOD & DRINK</span></a>
							</li>
							<li class="guest-services">
								<a class="dropdown" title="" href="/fr/hotel"><span>HÉBERGEMENTS</span></a>
								<a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
							</li>
							<!--// .guest-services -->
							<li class="chic-travel">
								<a class="dropdown" title="" href="/fr/tempo-libero-e-benessere"><span>LOISIRS ET BIEN-ÊTRE</span></a>
								<a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
							</li>
							<li class="chic-travel">
								<a class="dropdown" title="" href="/fr/spettacoli-cinema"><span>SPECTACLES ET CINÉMA</span></a>
								<a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
							</li>
							<li class="chic-travel">
								<a class="dropdown" title="" href="/fr/news.html"><span>NEWS</span></a>
								<a class="dropdown-mobile" title="/fr/news.html" href=""><i class="icon-circle-arrow-right icon-white"></i></a>
							</li>
							<li class="whats-on">
								<a class="dropdown" title="" href="/fr/servizi.html"><span>SERVICES</span></a>
								<a class="dropdown-mobile" title="" href="/fr/servizi.html"><i class="icon-circle-arrow-right icon-white"></i></a>
							</li>
							<li class="whats-on">
								<a class="dropdown" title="" href="/fr/la-citta.html"><span>SANREMO</span></a>
								<a class="dropdown-mobile" title="" href="/fr/la-citta.html"><i class="icon-circle-arrow-right icon-white"></i></a>
							</li>
							<!-- <li class="membership sign-in visible-phone">
								<a class="dropdown" title="Registro / Inicia sesión" href="/membership"><span>ATTUALITÀ </span></a>
							</li> -->
						</ul>
					</nav>
					<nav id="mmovil">
						<ul>
							<li>
								<a href="/fr">
									<i class="fa fa-home"></i>
									<span class="menusito">ACCUEIL</span>
								</a>
							</li>
							<li>
								<a href="/fr/mappa">
									<span class="icon-mappa blanco size-icon2"></span>
									<span class="menusito">PLAN DU SITE</span>
								</a>
							</li>
							<li>
								<a href="/fr/negozi">
									<span class="icon-negozi blanco size-icon2"></span>
									<span class="menusito">SHOPPING</span>
								</a>
							</li>
							<li>
								<a href="/fr/ristoranti-bar">
									<span class="icon-food-drink blanco size-icon2"></span>
									<span class="menusito">FOOD & DRINK</span>
								</a>
							</li>
							<li>
								<a href="/fr/hotel">
									<span class="icon-iconos-03 blanco size-icon2"></span>
									<span class="menusito">HÉBERGEMENTS</span>
								</a>
							</li>
							<li>
								<a href="/fr/tempo-libero-e-benessere">
									<span class="icon-tempo-libero blanco size-icon2"></span>
									<span class="menusito">LOISIRS ET BIEN-ÊTRE</span>
								</a>
							</li>
							<li>
								<a href="/fr/spettacoli-cinema">
									<span class="icon-cinema-e-spettacoli blanco size-icon2"></span>
									<span class="menusito">SPECTACLES ET CINÉMA</span>
								</a>
							</li>
							<li>
								<a href="/fr/news/offerte.html">
									<i class="fa fa-tags"></i>
									<span class="menusito">NOS OFFRES</span>
								</a>
							</li>
							<li>
								<a href="/fr/news/eventi.html">
									<i class="fa fa-calendar-o"></i>
									<span class="menusito">ÉVÉNEMENTS</span>
								</a>
							</li>
							<li>
								<a href="/fr/news/attualita.html">
									<i class="fa fa-bullhorn"></i>
									<span class="menusito">ACTUALITÉS</span>
								</a>
							</li>
							<li>
								<a href="/fr/servizi.html">
									<i class="fa fa-info-circle"></i>
									<span class="menusito">Service</span>
								</a>
							</li>
							<li>
								<a href="/fr/la-citta.html">
									<i class="fa fa-sun-o"></i>
									<span class="menusito">Sanremo</span>
								</a>
							</li>
							<li>
								<a href="/fr/come-arrivare.html">
									<span class="icon-iconosbussola blanco size-icon2"></span>
									<span class="menusito">Getting Here</span>
								</a>
							</li>
							<li>
								<a href="/fr/chi-siamo.html">
									<i class="fa fa-user"></i>
									<span class="menusito">Nous connaître</span>
								</a>
							</li>
							<li>
								<a href="/fr/privacy.html">
									<i class="fa fa-copyright"></i>
									<span class="menusito">Politique de sécurité et de confidentialité</span>
								</a>
							</li>
							<li>
								<a href="/fr/cookies.html">
									<i class="fa fa-exclamation-triangle"></i>
									<span class="menusito">Cookies</span>
								</a>
							</li>
							<li>
								<a href="/fr/contatto.html">
									<span class="icon-iconoslettera blanco size-icon2"></span>
									<span class="menusito">Contact</span>
								</a>
							</li>
							<li>
								<a href="/fr/note-legali.html">
									<i class="fa fa-gavel"></i>
									<span class="menusito">Mentions légales </span>
								</a>
							</li>
							<li>
								<a href="#mm-2">
									<i class="fa fa-language"></i>
									<span class="menusito">Langues</span>
								</a>
								<ul>
									<li class="en">
										<a title="Inglés" href="/en">
											<img src="/images/UK.png" alt="">
											English
										</a>
									</li>
									<li class="es">
										<a title="Italiano" href="/it">
											<img src="/images/Italiano.png" alt="">
											Italian
										</a>
									</li>
									 <li class="en">
										<a title="Frances" href="/fr">
											<img src="/images/FRench.png" alt="">
											Francese
										</a>
									</li>
									<li class="ru">
										<a title="Ruso" href="/ru">
											<img src="/images/RUssian.png" alt="">
											Russe
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
								<li><a href="/en/index.html">Home</a></li>
								<li><a href="/en/" id="bread-cat"></a></li>
								<li class="active" id="bread-nom"></li>
							</ol>
						</div>
						<div class="row filtros">
							<div class="col-sm-3">
								<span class="orange pull-left"><strong data-field="nombre">Teatro Ariston</strong></span>
							</div>
							<div class="derecha pull-right">
									<a href="#" class="botonNegro2">	
										<div class="favoriti pull-right" id="agrega-favorito">
											<i class="fa fa-heart-o naranja pull-right posicion-heart"></i>
											<span class="orange font-13 margen-derecho hidden-xs hidden-md ocultar"><strong>SALVA NEI FAVORITI</strong></span>
										    <i class="fa fa-plus naranja2 pull-right"></i>
									    </div>
									</a>
							</div>
						</div>
						
							   
						<div class="row resultados">
							<!-- INICIO SLIDER -->
							<div class="row imagen hidden-xs">
							    <div id="myCarousel2" class="carousel slide">
							      <div class="carousel-inner">
							      </div>
							    </div>
								<img src="" alt="" class="logo-img hidden-xs" data-field="logo" style="	width:229px;height:152px">
							</div>
							<div class="row imagen visible-xs">
							    <div id="myCarousel3" class="carousel slide">
							      <div class="carousel-inner">
							      	<div style="width:100%;max-height: 340px; overflow:hidden;" class="item active">
										<img height="100%" width="100%" class="img-responsive" src="/images/responsive/Slider2.png">
									</div>
							      </div>
							    </div>
								<img class="logo-img-res visible-xs" alt="" data-field="logoRes"  src="">
							</div>

						</div>
						</div>
						<div class="row cuerpo">
							<div class="col-sm-4 izquierda-mi">
								<p>
									<a href="" data-field="mapaUrl" target="_blank" class="link-naranja">
										<i class="fa fa-map-marker"></i>
										<span class="cc" data-field="direccion"></span>
									</a>
								</p>
								<p>
									<i class="fa fa-phone"></i>
									<span class="cc" data-field="telefono"></span>
								</p>
								<p>
									<i class="fa fa-clock-o"></i>
									<span class="cc" data-field="horario"></span>
								</p>
								<p>
									<i class="fa fa-calendar"></i>
									<span class="cc" data-field="dias"></span>
								</p>
								<p>
									<a href="" data-field="urllink" target="_blank" class="link-naranja">
										<i class="fa fa-globe"></i>
										<span class="cc" data-field="url"></span>
									</a>
								</p>
								<p>
									<a href="" data-field="emaillink" class="link-naranja">
										<i class="fa fa-envelope-o"></i>
										<span class="cc" data-field="email"></span>
									</a>
								</p>
<div class="izquierda pull-left">
	<a href="" class="botonNegro2" style="display:none" data-field="facebook">
		<i class="fa fa-facebook-square negro pull-left social-i"></i><div class="separador pull-left"></div>
	</a>
	<a href="" class="botonNegro2" style="display:none" data-field="twitter">
		<i class="fa fa-twitter-square negro pull-left social-i"></i><div class="separador pull-left"></div>
	</a>
	<a href="" class="botonNegro2" style="display:none" data-field="google">
		<i class="fa fa-google-plus-square negro pull-left social-i"></i><div class="separador pull-left"></div>
    </a>
	<a href="" class="botonNegro2" style="display:none" data-field="linkedin">
		<i class="fa fa-linkedin-square negro pull-left social-i"></i><div class="separador pull-left"></div>
	</a>
	<a href="" class="botonNegro2" style="display:none" data-field="pinterest">
		<i class="fa fa-pinterest-square negro pull-left social-i"></i><div class="separador pull-left"></div>
    </a>
	<a href="" class="botonNegro2" style="display:none" data-field="instagram">
		<i class="fa fa-instagram negro pull-left social-i"></i>
	</a>
</div>
									<a href="#" data-field="mapaUrl" class="botonNegro ">
										<img src="/images/Location.png" alt="">
										SEE ON THE MAP
									</a>
								<span class='st_sharethis_large' displayText='ShareThis'></span>
								<span class='st_facebook_large' displayText='Facebook'></span>
								<span class='st_twitter_large' displayText='Tweet'></span>
								<span class='st_pinterest_large' displayText='Pinterest'></span>
								<span class='st_email_large' displayText='Email'></span>
								<script type="text/javascript">var switchTo5x=true;</script>
							</div>
							<div class="col-sm-8 derecha-mi">
								<p class="text-justify" data-field="descripcion">
									
								</p>
								
							</div>
						</div>



						<div class="row mensaje mensaje-prenota mensaje-blu acodation" style="display:none">
							
								<div>
									<a  data-field="prenota"  title="" href="#" target="_blank" class="dropdown cambio" title="Registro">
										<div class="col-sm-1">
											<div>
												<img src="/images/Check-On.png" alt="">
											</div>
										</div>
										<div class="col-sm-7">
											<div>
												<p class="text-justify blu">Do you want to book your holiday in Sanremo? Click here to know about hotels availability and prices…as well as cinemas’ and theatres’in the Town of Flowers.</p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="col-sm-4">
											<div>
												<div class="buttonBlue">BOOK NOW</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</a>
								</div>
							
						</div>

						<div class="row mensaje mensaje-prenota mensaje-blu cinema" style="display:none">
							
								<div>
									<a  data-field="prenota"  title="" href="#" target="_blank" class="dropdown cambio" title="Registro">
										<div class="col-sm-1">
											<div>
												<img src="/images/Check-On.png" alt="">
											</div>
										</div>
										<div class="col-sm-7">
											<div>
												<p class="text-justify blu">Do you want to book your holiday in Sanremo? Click here to know about hotels availability and prices…as well as cinemas’ and theatres’in the Town of Flowers.</p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="col-sm-4">
											<div>
												<div class="buttonBlue">BOOK NOW</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</a>
								</div>
							
						</div>







						<div class="row linea orange oferta">
							<strong>OFFERS</strong>
							<div class="raya"></div>
						</div>
						<div class="row offerandnew ofertas">

						</div>
						<div class="row linea orange noticias">
							<strong>NEWS</strong>
							<div class="raya"></div>
						</div>
						<div class="row offerandnew resultados noticias">

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
						<div class="mapaLogo"><span class="icon-mappa blanco ico-mapa-nav"></span> <a href="/fr/mappa" class="footer-link">Carte interactive</a> </div>
					</div>
					<div class="row segundo">
						<div class="menu col-sm-7">
							<div class="col-sm-3">
								<span class="orange"><strong>Catégories</strong></span>
								<ul>
									<li><a href="/fr/negozi">Commerces</a></li>
									<li><a href="/fr/ristoranti-bar">Food & Drink</a></li>
									<li><a href="/fr/hotel">Hébergement</a></li>
									<li><a href="/fr/tempo-libero-e-benessere">Loisirs et Bien-être</a></li>
									<li><a href="/fr/spettacoli-cinema">Spectacles et Cinéma</a></li>
								</ul>
							</div>
							<div class="col-sm-3">
								<span class="orange"><strong>News</strong></span>
								<ul>
									<li><a href="/fr/news/attualita.html">Actualités</a></li>
									<li><a href="/fr/news/eventi.html">Evénements</a></li>
									<li><a href="/fr/news/offerte.html">Nos offres</a></li>
								</ul>
							</div>
							<div class="col-sm-3">
								<span class="orange"><strong>Réseau Pro</strong></span>
								<ul>
									<li><a href="/fr/chi-siamo.html">Nous connaître</a></li>
								</ul>
							</div>
							<div class="col-sm-3">
								<span class="orange"><strong>Sanremo</strong></span>
								<ul>
									<li><a href="/fr/come-arrivare.html">Comment arriver à Sanremo</a></li>
									<li><a href="/fr/la-citta.html">Découvrir Sanremo</a></li>
								</ul>
							</div>
						</div>
						<div class="social">
							<p>Followed in:</p>
							<a href="https://www.facebook.com/sanremoon" target="_blank"><img src="/images/Fb.png" alt=""></a>
							<a href="https://twitter.com/SanremoOn" target="_blank"><img src="/images/Twitter.png" alt=""></a>
							<a href="https://www.youtube.com/channel/UCz0kZtT62QKyhFB_Hk24jrw" target="_blank"><img src="/images/Youtube.png" alt=""></a>
							<a href="https://plus.google.com/u/0/105050793970673159877/posts" target="_blank"><img src="/images/Google-+.png" alt=""></a>
							<!-- <a href="#" target="_blank"><img src="/images/Pinterest.png" alt=""></a> -->
								<div>
									    <p class="maginApp"> Télécharger l'application:</p>
									    <a href="https://geo.itunes.apple.com/it/app/sanremo-on/id1031320757?mt=8" target="_blank"><img src="/images/AppleStorelogoOn.png" alt=""></a>
									    <a href="https://play.google.com/store/apps/details?id=com.ionicframework.myapp802908" target="_blank"><img src="/images/Playstorelogowhite.png" alt=""></a>
								</div>
						</div>
					</div>
					<div class="row ultimo" >
						<div class="copyright">
							© Copyright – Réseau Pro -TVA 01615270087 – 2015 Tous droits réservés
							<div class="menuBottom ">
								<ul class="clase-footer-fr">
									<li><a href="/fr/contatto.html">Contacts</a></li>
									<li><a href="/fr/privacy.html">Politique de sécurité et de confidentialité </a></li>
									<li><a href="/fr/note-legali.html">Mentions légales </a></li>
									<li><a href="/fr/cookies.html">Cookies</a></li>
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
							<!-- <img src="/images/responsive/Login.png"> -->
							<span class="icon-user ico-user-nav"></span>
							<span class="texto-popup">ACCÉDEZ À VOTRE COMPTE</span>
							<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
						</h4>
					</div>
					<div class="modal-body">
						<form role="form" method="post" name="login_form" id="login_form" action="#">
								<div class="form-group">
									<button class="btn btn-block btn-navy facebook_connect" type="button">
										<i class="fa fa-facebook"></i> &nbsp;
										<strong>S'identifier avec Facebook</strong>
									</button>
								</div>
								<div class="form-group separator-text text-center">
									<span>OU</span>
								</div>
							<div class="form-group">
								<input type="text" required="" placeholder="Identifiant" class="form-control" value="" id="username" name="log">
							</div>
							<div class="form-group">
								<input type="password" required="" placeholder="Mot de passe" class="form-control" value="" id="password" name="pwd">
							</div>
							<!-- Login Button -->
							<div class="form-group">
								<div class="row">
									<div class="col-md-12">
										<span class="descrip"><p class="centrar">La protection de vos données à caractère personnel est très importante pour nous. Nous ne céderons ni vendrons à des parties tierces vos données à caractère personnel</p></span>
									</div><!-- /.col-md-12 -->
									<div class="col-md-12">
										<span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso">J'accepte les règles sur <a href="privacy.html" id="permiso">la politique de sécurité et de confidentialité du site.</a></p></span>
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
											<small><p class="texto-pop">Non connecté, s'il vous plaît inscrivez.</p></small>
										</div>
																</div>
								</div><!-- /.row -->
							</div>

						</form>
					</div><!-- /.modal-body -->

				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
		<script src="/js/jquery-1.11.2.min.js"></script>
		<script src="/js/bootstrap.min.js"></script>
		<script src="/js/bootstrap-select.js"></script>
		<script type="text/javascript" src="/js/jquery.mmenu.min.all.js"></script>
		<script src="/js/jquery.mmenu.fixedelements.min.js"></script>
		<script src="http://w.sharethis.com/button/buttons.js"></script>
		<script>
					stLight.options({
						publisher: "93d1884f-b0e3-4904-a0d4-b8211962a3f9",
						doNotHash: false,
						doNotCopy: false,
						hashAddressBar: false
					});
				</script>
		<script type="text/javascript" src="/js/retina.js"></script>
		<script type="text/javascript" src="/js/jquery.fractionslider.min.js"></script>
		<script type="text/javascript" src="/js/md5.js"></script>
		<script type="text/javascript" src="/js/Tools.js"></script>
        <script type="text/javascript" src="/js/js.js"></script>
		<script type="text/javascript" src="/js/js.all.js"></script>
		<script type="text/javascript" src="/js/js.microsite.js"></script>
	</body>
</html>

<?php 
function clearStr($string){
    $string = trim($string);
    $string = str_replace(
        array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),
        array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),
        $string
    );
    $string = str_replace(
        array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),
        array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),
        $string
    );
    $string = str_replace(
        array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),
        array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),
        $string
    );
    $string = str_replace(
        array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),
        array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),
        $string
    );
    $string = str_replace(
        array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),
        array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),
        $string
    );
    $string = str_replace(
        array('ñ', 'Ñ', 'ç', 'Ç'),
        array('n', 'N', 'c', 'C',),
        $string
    );
    $string = str_replace(
        array("\\", "¨", "º", "-", "~",
             "#", "@", "|", "!", "\"",
             "·", "$", "%", "&", "/",
             "(", ")", "?", "'", "¡",
             "¿", "[", "^", "`", "]",
             "+", "}", "{", "¨", "´",
             ">", "< ", ";", ",", ":",
             ".", ),
        '',
        $string
    );
    $string = str_replace(' ','-',$string);
    return $string;
} ?>