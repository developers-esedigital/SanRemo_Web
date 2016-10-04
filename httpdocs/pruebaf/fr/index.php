<script type="text/javascript" src="/js/md5.js"></script>

<?php
//print_r(phpinfo());
$servername = "sanremo-on.com";
$username = "sr_grubio";
$password = "3s3d1g1t@al123";
$dbname = "sanremoonPrueba";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";

?> 

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Sanremo On- Le site dédié aux vacances à Sanremo</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="Scopri i migliori negozi, hotel, ristoranti e cinema di Sanremo per una vacanza a cinque stelle. Regalati un sogno con Sanremo On" />
		<meta name="keywords" content="Hotel, negozi, ristoranti, cinema" />
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
		<link rel="canonical" href="http://www.sanremo-on.com/">
		<!-- end paloma-> metadatos-->

		<!--paloma smart brand-->
		<meta name="apple-itunes-app" content="app-id=1031320757"> 
		<meta name="google-play-app" content="app-id=com.ionicframework.myapp802908">
		<!---->

		<link href="http://sanremo-on.com/pruebaf/css/bootstraps.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="http://sanremo-on.com/pruebaf/fonts/stylesheet.css">
		<link rel="stylesheet" type="text/css" href="http://sanremo-on.com/pruebaf/css/fractionslider.css" />
		<link rel="stylesheet" type="text/css" href="http://sanremo-on.com/pruebaf/css/jquery.mmenu.all.css" />
		<link rel="stylesheet" href="http://sanremo-on.com/pruebaf/css/css.css">
		<link rel="stylesheet" href="http://sanremo-on.com/pruebaf/css/slick.css">
		<link rel="stylesheet" href="http://sanremo-on.com/pruebaf/css/slick-theme.css">
		<link rel="stylesheet" href="http://sanremo-on.com/pruebaf/css/responsive.css">
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<!-- css para el smartbanner android-->
		<link rel="stylesheet" href="http://sanremo-on.com/pruebaf/css/jquery.smartbanner.css" type="text/css" media="screen"> 

		<!-- No cargaba slick.css ni slick-theme.css debido a un error 302, por eso el style lo puse aqui [pendiente arreglar] -->
		<style>

				@charset 'UTF-8';
				/* Slider */
				.slick-loading .slick-list
				{
				    background: #fff url('./ajax-loader.gif') center center no-repeat;
				}

				/* Icons */
				@font-face
				{
				    font-family: 'slick';
				    font-weight: normal;
				    font-style: normal;

				    src: url('./fonts/slick.eot');
				    src: url('./fonts/slick.eot?#iefix') format('embedded-opentype'), url('./fonts/slick.woff') format('woff'), url('./fonts/slick.ttf') format('truetype'), url('./fonts/slick.svg#slick') format('svg');
				}
				/* Arrows */
				.slick-prev,
				.slick-next
				{
				    font-size: 0;
				    line-height: 0;

				    position: absolute;
				    

				    display: block;

				    width: 20px;
				    height: 20px;
				    margin-top: -10px;
				    padding: 0;

				    cursor: pointer;

				    color: transparent;
				    border: none;
				    outline: none;
				    background: transparent;
				}
				.slick-prev:hover,
				.slick-prev:focus,
				.slick-next:hover,
				.slick-next:focus
				{
				    color: transparent;
				    outline: none;
				    background: transparent;
				}
				.slick-prev:hover:before,
				.slick-prev:focus:before,
				.slick-next:hover:before,
				.slick-next:focus:before
				{
				    opacity: 1;
				}
				.slick-prev.slick-disabled:before,
				.slick-next.slick-disabled:before
				{
				    opacity: .25;
				}

				.slick-prev:before,
				.slick-next:before
				{
				    font-family: 'slick';
				    font-size: 20px;
				    line-height: 1;

				    opacity: .75;
				    color: gray;

				    -webkit-font-smoothing: antialiased;
				    -moz-osx-font-smoothing: grayscale;
				    right: 20px;
				    height: 135px;
				}

				.slick-prev
				{
					visibility: hidden;
					top: 7% !important;
				    left: -3px;
				    z-index:99;
				    height: 135px;
				}
				[dir='rtl'] .slick-prev
				{
				    right: -25px;
				    left: auto;
				}
				.slick-prev:before
				{
				    content: url(/images/ddAl.png);
				    background-color: #ddd;
				}
				[dir='rtl'] .slick-prev:before
				{
				    content: url(/images/dd.png);
				    background-color: #ddd;
				}
				.slick-slide 
				{
					outline: none !important;
				}

				.slick-next
				{
					visibility: hidden;
					top: 8% !important;
				    right: 20px;
				    height: 135px;
				}
				#logosCarousel:hover .slick-next
				{
					visibility: visible !important;
				}
				#logosCarousel:hover .slick-prev
				{
					visibility: visible !important;
				}
				[dir='rtl'] .slick-next
				{
				    right: auto;
				    left: -25px;
				}
				.slick-next:before
				{
				    content: url(/images/dd.png);
				    background-color: #ddd;
				}
				[dir='rtl'] .slick-next:before
				{
				    content: url(/images/ddAl.png);
				    background-color: #ddd;
				}

				/* Dots */
				.slick-slider
				{
				    margin-bottom: 30px;
				}

				.slick-dots
				{
				    position: absolute;
				    bottom: -45px;

				    display: block;

				    width: 100%;
				    padding: 0;

				    list-style: none;

				    text-align: center;
				}
				.slick-dots li
				{
				    position: relative;

				    display: inline-block;

				    width: 20px;
				    height: 20px;
				    margin: 0 5px;
				    padding: 0;

				    cursor: pointer;
				}
				.slick-dots li button
				{
				    font-size: 0;
				    line-height: 0;

				    display: block;

				    width: 20px;
				    height: 20px;
				    padding: 5px;

				    cursor: pointer;

				    color: transparent;
				    border: 0;
				    outline: none;
				    background: transparent;
				}
				.slick-dots li button:hover,
				.slick-dots li button:focus
				{
				    outline: none;
				}
				.slick-dots li button:hover:before,
				.slick-dots li button:focus:before
				{
				    opacity: 1;
				}
				.slick-dots li button:before
				{
				    font-family: 'slick';
				    font-size: 6px;
				    line-height: 20px;

				    position: absolute;
				    top: 0;
				    left: 0;

				    width: 20px;
				    height: 20px;

				    content: '•';
				    text-align: center;

				    opacity: .25;
				    color: black;

				    -webkit-font-smoothing: antialiased;
				    -moz-osx-font-smoothing: grayscale;
				}
				.slick-dots li.slick-active button:before
				{
				    opacity: .75;
				    color: black;
				}


				.slick-slide{
					height: 30% !important;
				}

				.slick-list.draggable
				{
					height:144px;
				}

				</style>

			<!-- ICONOS -->
			<link rel="stylesheet" href="/css/icons/css/icons.css">
	        <link rel="stylesheet" href="/css/icons/css/ie7/ie7.css">
	        <!-- FIN ICONOS -->
		<link rel="icon" type="image/png" href="/images/favicon.png" />
		<!-- paloma****Codigo analitics-->
		<script>
				  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
				  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

				  ga('create', 'UA-64835947-1', 'auto');
				  ga('send', 'pageview');
		</script>
		<!--paloma*****cookies alert-->
			<!-- Include jQuery -->
			<script src="/js/jquery-1.11.2.min.js"></script>
        <script src="/js/jquery.smartbanner.js"></script>
		<!--end cookies-->

	</head>
	<body>
		<div style="background:url(/images/Orange-Circle.png);"></div>
		<!-- PRECARGA -->
		<script>
			(function(){
				// document.querySelector('.membership').style.display = 'none';
			    document.getElementsByTagName('body')[0].innerHTML = document.getElementsByTagName('body')[0].innerHTML+'<div class="cargando"><figure style="padding:0 3em;overflow:visible;"><div class="spinner"></div></figure></div>';
			   })();
	</script>
		<!-- FIN PRECARGA -->
			<!--Cookies-->
	<div id="eantics"></div>
			<script type="text/javascript">
				// Using $(document).ready never hurts
				$(document).ready(function(){

					// Cookie setting script wrapper
					var cookieScripts = function () {
						// Internal javascript called
						console.log("Running");
					
						/*// Loading external javascript file
						$.cookiesDirective.loadScript({
							uri:'/js/external.js',
							appendTo: 'eantics'
						});*/
					}
						/*$.cookiesDirective({
						privacyPolicyUri: 'http://sanremo-on.com/pruebaf/it/cookies.html',
						explicitConsent: false,
						position : 'bottom',
						scriptWrapper: cookieScripts, 
						cookieScripts: 'Google Analytics, My Stats Ultimate ', 
						backgroundColor: '#52B54A',
						linkColor: '#ffffff'
							});*/
						});
			</script>

		<!--end cookies-->
		<!--smart banner codigo de llamada-->
    	
    	<script type="text/javascript">
       			 $(function () { $.smartbanner({ daysHidden: 0, daysReminder: 0, title:'Sanremo On' }) });
    </script>
		<!--end smart banner-->

		<div id="header-container" class="Fixed">
			<header id="header">
				<div class="menu-movil visible-xs">
					<!-- <img src="/images/responsive/Menu-Lineas.png" alt=""> -->
					<a href="#mmovil" class="mm"><i class="fa fa-bars"></i></a>
				</div>
				<div class="logo" title="" ><a href="/pruebaf/it" class="enlace-logotipo" id="logo-full"><img class="hidden-xs" src="/images/Logo-Sanremo-On.png" alt=""></a>
					                       <a href="/pruebaf/it" class="enlace-logotipo" id="logo-resp"><img class="visible-xs" src="/images/responsive/Logo.png" alt=""></a>
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
										<a title="Inglés" href="http://sanremo-on.com/pruebaf/en">
											<img src="/images/UK.png" alt="">
											Anglais
										</a>
									</li>
									<li class="pt-br">
										<a title="Italiano" href="http://sanremo-on.com/pruebaf/it">
											<img src="/images/Italiano.png" alt="">
											Italien
										</a>
									</li>
									 <li class="pt-br">
										<a title="Frances" href="http://sanremo-on.com/pruebaf/fr">
											<img src="/images/FRench.png" alt="">
											Francese
										</a>
									</li>
									<li class="pt-br">
										<a title="Ruso" href="http://sanremo-on.com/pruebaf/ru">
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
					</ul>
				</div>
				<div id="navigation">
									<nav>
										<ul class="main" style="left:52%;">
											<li class="home">
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/"><span><i class="fa fa-home ico-casa-nav"></i>ACCUEIL</span></a>
											</li>
											<li class="brands">

												<a class="dropdown" title="Mapa Interactivo" href="http://sanremo-on.com/pruebaf/fr/mappa.html"><span><img src="/images/Mappa.png" alt=""> PLAN DU SITE </span></a>

												<a class="dropdown" title="Mapa Interactivo" href="http://sanremo-on.com/pruebaf/fr/mappa.html"><span><span class="icon-mappa blanco ico-mapa-nav"></span> PLAN DU SITE </span></a>

												<a class="dropdown-mobile" title="" href=""><i class="icon-circle-arrow-right icon-white"></i></a>
											</li>
											<li class="offers">
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/negozi"><span>SHOPPING</span></a>
											</li>
											<li class="your-visit">
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/ristoranti-bar"><span>FOOD & DRINK</span></a>
											</li>
											<li class="guest-services" >
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/hotel"><span class="al">HÉBERGEMENTS</span></a>
												<a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
											</li>
											<!--// .guest-services -->
											<li class="chic-travel">
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/tempo-libero-e-benessere"><span>LOISIRS ET BIEN-ÊTRE</span></a>
												<a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
											</li>
											<li class="chic-travel">
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/spettacoli-cinema"><span>SPECTACLES ET CINÉMA</span></a>
												<a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
											</li>
											<li class="chic-travel">
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/news.html"><span>NEWS</span></a>
												<a class="dropdown-mobile" title="/fr/news.html" href=""><i class="icon-circle-arrow-right icon-white"></i></a>
											</li>
											<li class="whats-on">
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/servizi.html"><span>SERVICES</span></a>
												<a class="dropdown-mobile" title="" href="/fr/servizi.html"><i class="icon-circle-arrow-right icon-white"></i></a>
											</li>
											<li class="chic-travel">
												<a class="dropdown" title="" href="http://sanremo-on.com/pruebaf/fr/la-citta.html"><span>SANREMO</span></a>
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
								<a href="http://sanremo-on.com/pruebaf/fr">
									<i class="fa fa-home"></i>
									<span class="menusito">ACCUEIL</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/mappa">
									<span class="icon-mappa blanco size-icon2"></span>
									<span class="menusito">PLAN DU SITE</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/negozi">
									<span class="icon-negozi blanco size-icon2"></span>
									<span class="menusito">SHOPPING</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/ristoranti-bar">
									<span class="icon-food-drink blanco size-icon2"></span>
									<span class="menusito">FOOD & DRINK</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/hotel">
									<span class="icon-iconos-03 blanco size-icon2"></span>
									<span class="menusito">HÉBERGEMENTS</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/tempo-libero-e-benessere">
									<span class="icon-tempo-libero blanco size-icon2"></span>
									<span class="menusito">LOISIRS ET BIEN-ÊTRE</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/spettacoli-cinema">
									<span class="icon-cinema-e-spettacoli blanco size-icon2"></span>
									<span class="menusito">SPECTACLES ET CINÉMA</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/news/offerte.html">
									<i class="fa fa-tags"></i>
									<span class="menusito">NOS OFFRES</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/news/eventi.html">
									<i class="fa fa-calendar-o"></i>
									<span class="menusito">ÉVÉNEMENTS</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/news/attualita.html">
									<i class="fa fa-bullhorn"></i>
									<span class="menusito">ACTUALITÉS</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/servizi.html">
									<i class="fa fa-info-circle"></i>
									<span class="menusito">Service</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/la-citta.html">
									<i class="fa fa-sun-o"></i>
									<span class="menusito">Sanremo</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/come-arrivare.html">
									<span class="icon-iconosbussola blanco size-icon2"></span>
									<span class="menusito">Getting Here</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/chi-siamo.html">
									<i class="fa fa-user"></i>
									<span class="menusito">Nous connaître</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/privacy.html">
									<i class="fa fa-copyright"></i>
									<span class="menusito">Politique de sécurité et de confidentialité</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/cookies.html">
									<i class="fa fa-exclamation-triangle"></i>
									<span class="menusito">Cookies</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/contatto.html">
									<span class="icon-iconoslettera blanco size-icon2"></span>
									<span class="menusito">Contact</span>
								</a>
							</li>
							<li>
								<a href="http://sanremo-on.com/pruebaf/fr/note-legali.html">
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
										<a title="Frances" href="http://sanremo-on.com/pruebaf/fr">
											<img src="/imageshttp://sanremo-on.com/pruebaf/french.png" alt="">
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
		<!-- Slider Home -->

				<div class="slider-principal hidden-xs">
					<?php

						$sql = "SELECT idslider, imgNormal, estatus from slider";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
						    // output data of each row
						    while($row = $result->fetch_assoc()) {
						    	if($row['estatus'] == 1)
						    	{
						    		
						    	$rutaSlides="<div class='slide'><img value='".$row['idslider']."' src='http://doffice.com.mx/sanremoOn/A/public/uploads/sliders/".$row['imgNormal']."' alt=''></div>";
						    	

						        //echo "<h5>". $row['logogris'] ."</h5>";
						        echo $rutaSlides;
						        }
						    }
						} else {
						    echo "0 results";
						}
					 ?>
					<!--<div class="slide">
						<img src="/images/altra-musica@2.png" alt="">
					</div>
					<div class="slide">
						<img src="/images/tuffati@2.png" alt="">
					</div>
					<div class="slide">
						<img src="/images/una-volta@2.png" alt="">
					</div>
				</div>
				<div class="slider-principal-movil visible-xs">
					<div class="slide">
						<img src="/images/mensaje1.png" alt="">
					</div>
					<div class="slide">
						<img src="/images/mensaje2.png" alt="">
					</div>
					<div class="slide">
						<img src="/images/mensaje3.png" alt="">
					</div>-->
				</div>
		<div class="wrapper">
			<div class="container">
				<div class="content">
					<div class="cuerpo">
						<div class="menu row">
							
								<div class="col-sm-15 caja">
									<a href="http://sanremo-on.com/pruebaf/fr/negozi" class="enlace-home">
										<div class="b-negro">
											<!-- <img src="/images/Negozi.png" alt=""> -->
											<span class="icon-negozi blanco size-icon"></span>
										</div>
										<p>Shopping</p>
								    </a>
								</div>
								<div class="col-sm-15 caja">
									<a href="http://sanremo-on.com/pruebaf/fr/ristoranti-bar" class="enlace-home">
										<div class="b-negro">
											<!-- <img src="/images/Food-and-Drink.png" alt=""> -->
											<span class="icon-food-drink blanco size-icon left-1"></span>
											
										</div>
										<p>Food & Drink</p>
									</a>
								</div>
								<div class="col-sm-15 caja">
									<a href="/fr/hotel" class="enlace-home">
										<div class="b-negro">
											<!-- <img src="/images/Accomodation.png" alt=""> -->
											<span class="icon-iconos-03 blanco size-icon"></span>
											
										</div>
										<p>Hébergements</p>
								    </a>
								</div>
								<div class="col-sm-15 caja">
									<a href="http://sanremo-on.com/pruebaf/fr/tempo-libero-e-benessere" class="enlace-home">
										<div class="b-negro">
											<!-- <img src="/images/Tempo-Libero.png" alt=""> -->
											<span class="icon-tempo-libero blanco size-icon"></span>
										</div>
										<p>Loisirs et bien-être</p>
									</a>
								</div>
								<div class="col-sm-15 caja">
									<a href="http://sanremo-on.com/pruebaf/fr/spettacoli-cinema" class="enlace-home">
										<div class="b-negro">
											<!-- <img src="/images/Cinema-e-Spectacoli.png" alt=""> -->
											<span class="icon-cinema-e-spettacoli blanco size-icon"></span>
										</div>
										<p>Spectacles et Cinéma</p>
									</a>
								</div>
							
						</div>
						<div class="row texto">
							<h1>C'est une tout autre histoire... <span class="orange sanremo">Allumez Sanremo</span></h1>
							<p class="text-center texto-home">
								“Sanremo On” né à partir de l'initiative des commerçants, des hôteliers et des entrepreneurs de la ville de Sanremo pour offrir aux touristes nationaux et internationaux  un service de très haut niveau. Sur le portail vous trouverez  tout ce qu'il vous faut  pour passer un très beau séjour à Sanremo.  En un clic vous pourrez voir les collections  des boutiques les plus cool de la “Ville des fleurs” tout en vous tenant au courant des  <a href="news/offerte.html" class="link-home">promotions </a> et des initiatives  faites exprès pour vous.   Une section considérable du portail est consacrée à la découverte des beautés  de la ville sans oublier les  <a href="news/eventi.html" class="link-home">événements </a> et  les manifestations culturelles organisés à Sanremo, la “perle de la Riviera”. Sur le portail “Sanremo On” vous êtes à même de  réserver votre hébergement et d'obtenir des renseignements sur les pubs, les cafés, les brasseries ou les boîtes de nuit de la ville pour un séjour planifié dans les moindres détails.  On vous souhaite la bienvenue à Sanremo...On.  </p>
						</div>
						
						<div class="row cuadros-abajo">
							<div class="cuadros col-sm-4">
								<div> <!-- Cambio de imagenes por la mas reciente en eventos -->

									<!-- <a href="news/attualita.html">
										<img src="/images/img-referenza-attualita.png" class="img-responsive" alt="">
										<p class="text-right">ATTUALITÀ &nbsp; ></p>
									</a> -->
									<?php
										

										$sql = "SELECT fechaInicio,imagenGrid FROM noticia ORDER BY fechaInicio DESC";
										$result = $conn->query($sql);

										$imagen = mysqli_fetch_array($result, MYSQLI_ASSOC);
										//printf ("%s (%s)\n", $imagen["fechaInicio"], $imagen["imagenGrid"]);
										echo '<a href="news/attualita.html">
										<img style="width:301px; height:161px;" src="http://admin.sanremo-on.com/public/uploads/noticia/'.$imagen['imagenGrid'].'"class="img-responsive" alt="">
										<p class="text-right">ACTUALITÉS &nbsp; ></p>
									</a>';



									?>
								</div>
							</div>
							<div class="cuadros col-sm-4">
								<div><!--paloma,cambio las  imagenes-->
									<!-- Cambio de imagenes por la mas reciente en eventos -->
									<?php
										

										$sql = "SELECT fechaInicio,fotoGrid FROM evento ORDER BY fechaInicio DESC";
										$result = $conn->query($sql);

										$imagen = mysqli_fetch_array($result, MYSQLI_ASSOC);
										//printf ("%s (%s)\n", $imagen["fechaInicio"], $imagen["imagenGrid"]);
										echo '<a href="news/eventi.html">
										<img style="width:301px; height:161px;" src="http://admin.sanremo-on.com/public/uploads/evento/'.$imagen['fotoGrid'].'"class="img-responsive" alt="">
										<p class="text-right">ÉVÉNEMENTS &nbsp; ></p>
									</a>';



									?>
									
								</div>
							</div>
							<div class="cuadros col-sm-4">
								<div>
									<a href="news/offerte.html">
										<img src="/images/img-referenza-offerte.png" style="width:301px; height:161px;" class="img-responsive" alt="">
										<p class="text-right">NOS OFFRES &nbsp; ></p>
								    </a>
								</div>
							</div>
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
												<p class="text-justify dark-orange"> Pour plus de renseignements sur les événements, les offres et les promotions de la “Ville des fleurs”, enregistrez-vous sur le portail “Sanremo On” et vous serez toujours “ON” sur Sanremo</p>
											</div>
											<div class="clearfix"></div>
										</div>
										<div class="col-sm-4">
											<div>
												<div class="buttonOrange">ENREGISTREZ-VOUS SUR SANREMO ON &nbsp;</div>
											</div>
										</div>
										<div class="clearfix"></div>
									</a>
								</div>
							
						</div>
						<!-- conecta con BD y saca el nombre y las imagenes de cada marca -->
						<div id="logosCarousel" class="slick menuinferior" style="margin-top: 95px; margin-left: -16px; height: 135px; width: 105.5%">
													<?php
													$sql = "SELECT logo,logogris, url FROM microsite";
													$result = $conn->query($sql);

													if ($result->num_rows > 0) {
													    // output data of each row
													    while($row = $result->fetch_assoc()) {
													    	
													    		$enlace = explode('"',$row['url']);
													    		//print_r($enlace[3]);
													    		$rutaLogos="<div style='margin-right:0px;'><a href='http://www.sanremo-on.com/it/negozi/".$enlace[3].".html'><img style='border: 1px solid #CCC;margin-right:0px; width: 90%;' src='//admin.sanremo-on.com/public/uploads/". $row['logo']."/logo/".md5($row['logogris']);
													    		$rutaCom=str_replace('gris', '', $rutaLogos);

													    	    //echo "<h5>". $row['logogris'] ."</h5>";
													    	    echo $rutaCom."'/></a></div>";
													        
													    }
													} else {
													    echo "0 results";
													}
													?>
													
												

												</div>
						<!-- <div class="row menuinferior">
							<div class="pequenoMenu col-sm-3">
								<div><span class="icon-iconosbussola blanco size-icon-big"></span><a href="come-arrivare.html" class="enlace-como-llegar">&nbsp;&nbsp; RAGGIUNGI SANREMO</a></div>
							</div>
							<div class="pequenoMenu col-sm-3">
								<div><span class="icon-iconosparking blanco size-icon-med"></span><a href="/pruebaf/it/mappa#parking" class="enlace-como-llegar2">&nbsp;&nbsp; PARKING</a></div>
							</div>
							<div class="pequenoMenu col-sm-3">
								<div><span class="icon-iconoswebcam blanco size-icon-big"></span><a href="web-cam.html" class="enlace-como-llegar">&nbsp;&nbsp; WEBCAM</a></div>
							</div>
							<div class="pequenoMenu col-sm-3">
								<div><span class="icon-iconoslettera blanco size-icon-big"></span><a href="contatto.html" class="enlace-como-llegar">&nbsp;&nbsp; CONTATTI</a></div>
							</div> 
						</div>-->
						<div class="row menuinferior" style="margin-bottom:10px;">

							<div class="pequenoMenu col-sm-3">
								<div><span class="icon-iconosbussola blanco size-icon-big"></span><a href="http://sanremo-on.com/pruebaf/fr/come-arrivare.html" class="enlace-como-llegar">&nbsp;&nbsp;ARRIVER À SANREMO</a></div>
							</div>
							<div class="pequenoMenu col-sm-3">
								<div><span class="icon-iconosparking blanco size-icon-med"></span><a href="http://sanremo-on.com/pruebaf/fr/mappa#parking" class="enlace-como-llegar2">&nbsp;&nbsp; PARKINGS</a></div>
							</div>
							<div class="pequenoMenu col-sm-3">
								<div><span class="icon-iconoswebcam blanco size-icon-big"></span><a href="http://sanremo-on.com/pruebaf/fr/web-cam.html" class="enlace-como-llegar">&nbsp;&nbsp; WEBCAM</a></div>
							</div>
							<div class="pequenoMenu col-sm-3">
								<div><span class="icon-iconoslettera blanco size-icon-big"></span><a href="http://sanremo-on.com/pruebaf/fr/contatto.html" class="enlace-como-llegar">&nbsp;&nbsp; CONTACTS</a></div>
							</div>
						</div>

							
						</div>
						<div class="row menuinferior">


							<div id="myCarousel" class="carousel slide col-sm-12">
								<ol class="carousel-indicators">
									
								</ol>
								<div class="carousel-inner">

								</div>
						    </div>

						<div class='row-banner' >
						  
						</div>




							<!-- <div class="slider-banner-movil visible-xs col-sm-12">
								<div class="slide">
									<img data-position="0,0" data-out="left" src="/images/responsive/banner.png" alt="">
									<img data-position="230,0" data-out="left" src="/images/responsive/banner.png" alt="">
								</div>
								<div class="slide">
									<img data-position="0,0"  src="/images/responsive/banner.png" alt="">
									<img data-position="230,0"   src="/images/responsive/banner.png" alt="">
								</div>
							</div> -->
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
								<div class="mapaLogo"><span class="icon-mappa blanco ico-mapa-nav"></span> <a href="http://sanremo-on.com/pruebaf/fr/mappa" class="footer-link">Carte interactive</a> </div>
							</div>
							<div class="row segundo">
								<div class="menu col-sm-7">
									<div class="col-sm-3">
										<span class="orange"><strong>Catégories</strong></span>
										<ul>
											<li><a href="http://sanremo-on.com/pruebaf/fr/negozi">Commerces</a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/ristoranti-bar">Food & Drink</a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/hotel">Hébergement</a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/tempo-libero-e-benessere">Loisirs et Bien-être</a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/spettacoli-cinema">Spectacles et Cinéma</a></li>
										</ul>
									</div>
									<div class="col-sm-3">
										<span class="orange"><strong>News</strong></span>
										<ul>
											<li><a href="http://sanremo-on.com/pruebaf/fr/news/attualita.html">Actualités</a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/news/eventi.html">Evénements</a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/news/offerte.html">Nos offres</a></li>
										</ul>
									</div>
									<div class="col-sm-3">
										<span class="orange"><strong>Réseau Pro</strong></span>
										<ul>
											<li><a href="http://sanremo-on.com/pruebaf/fr/chi-siamo.html">Nous connaître</a></li>
										</ul>
									</div>
									<div class="col-sm-3">
										<span class="orange"><strong>Sanremo</strong></span>
										<ul>
											<li><a href="http://sanremo-on.com/pruebaf/fr/come-arrivare.html">Comment arriver à Sanremo</a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/la-citta.html">Découvrir Sanremo</a></li>
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
											<li><a href="http://sanremo-on.com/pruebaf/fr/contatto.html">Contacts</a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/privacy.html">Politique de sécurité et de confidentialité </a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/note-legali.html">Mentions légales </a></li>
											<li><a href="http://sanremo-on.com/pruebaf/fr/cookies.html">Cookies</a></li>
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
				<div id="panel-mailchimp" class="modal fade in" style="display: none; ">
					<div class="sombra" data-dismiss="modal" style="position:fixed,width:100%,height:100%;background:rgba(0,0,0,0.8)"></div>
					<div class="modal-dialog modal-middle col-xs-12 col-sm-3 no-padding">
						<div class="modal-content no-padding">
							<div class="modal-header text-center">
								<h4 id="myModalLabel" class="modal-title">
									
									<span class="texto-popup">INSCRIVEZ-VOUS À NOSTRE NEWSLETTER</span>
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
											<input type="text" value="" name="FNAME" class="form-control input-iscri" placeholder="Prénom">
										</div>
										<div class="mc-field-group">
											<input type="text" value="" name="LNAME" class="form-control input-iscri" placeholder="Nom">
										</div>
											<div id="mce-responses" class="clear">
												<div class="response" id="mce-error-response" style="display:none"></div>
												<div class="response" id="mce-success-response" style="display:none"></div>
											</div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
										    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c112f8fba63a3d016c6b7aeab_8c75a7a0e0" tabindex="-1" value=""></div>
										   
											<span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso">J'accepte les règles sur<a href="fr/privacy.html" id="permiso">la politique de sécurité et de confidentialité du site.</a></p></span>
											
										    <div class="clear"><input type="submit" value="INSCRIVEZ-VOUS" name="subscribe" class="btn btn-block btn-danger boton-iscri"></div>
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
		<style>
			
		</style>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.css"/>

		

		<script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.7/slick.min.js"></script>
						
		<script src="http://sanremo-on.com/pruebaf/js/bootstrap.min.js"></script>
		<script src="http://sanremo-on.com/pruebaf/js/bootstrap-select.js"></script>
		<script type="text/javascript" src="http://sanremo-on.com/pruebaf/js/jquery.mmenu.min.all.js"></script>
		<script type="text/javascript" src="http://sanremo-on.com/pruebaf/js/retina.js"></script>
		<script src="http://sanremo-on.com/pruebaf/js/jquery.mmenu.fixedelements.min.js"></script>
		<script type="text/javascript" src="http://sanremo-on.com/pruebaf/js/jquery.fractionslider.min.js"></script>
		<script type="text/javascript" src="http://sanremo-on.com/pruebaf/js/md5.js"></script>
		<script src="http://sanremo-on.com/pruebaf/js/Tools.js"></script>
		<script src="http://sanremo-on.com/pruebaf/js/js.js"></script>
		<script type="text/javascript" src="http://sanremo-on.com/pruebaf/js/js.all.js"></script>
		<!--<script type="text/javascript" src="/js/slick.min.js"></script>
		 Include you know cookiesDirective.js plugin -->
		 <!--<script type="text/javascript" src="/js/jquery.cookiesdirective.js"></script>-->

		<script>
		$(document).ready(function() {

		   $('.slick').slick({
		           slidesToShow: 4,
		            slidesToScroll: 4,
		            autoplay: true,
		            autoplaySpeed: 2000,
		            responsive: [{
		                        breakpoint: 1024,
		                        settings: {
		                            slidesToShow: 4,
		                            slidesToScroll: 1,
		                            // centerMode: true,

		                        }

		                    }, {
		                        breakpoint: 800,
		                        settings: {
		                            slidesToShow: 3,
		                            slidesToScroll: 2,
		                            //dots: true,
		                            infinite: true,

		                        }


		                    }, {
		                        breakpoint: 600,
		                        settings: {
		                            slidesToShow: 2,
		                            slidesToScroll: 2,
		                           // dots: true,
		                            infinite: true,
		                            
		                        }
		                    }, {
		                        breakpoint: 480,
		                        settings: {
		                            slidesToShow: 2,
		                            slidesToScroll: 2,
		                           // dots: true,
		                            infinite: true,
		                            autoplay: true,
		                            autoplaySpeed: 2000,
		                        }
		                    },
		                        {
		                        	 breakpoint: 380,
		                     		 settings: {
		                        	slidesToShow: 1,
		                        	 slidesToScroll: 1,
		                        	// dots: true,
		                        	infinite: true,
		                        	autoplay: true,
		                        	autoplaySpeed: 2000,
		                        		                       }
		                        		                   
		                    }]

		            });
		});
		</script>

	</body>

</html>