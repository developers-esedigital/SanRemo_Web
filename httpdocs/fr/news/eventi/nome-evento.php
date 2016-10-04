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
<html lang="fr">
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
		                   				<div class="logo" title="" ><a href="/fr" class="enlace-logotipo" id="logo-full"><img class="hidden-xs" src="/images/Logo-Sanremo-On.png" alt=""></a>
		                   					                       <a href="/fr" class="enlace-logotipo" id="logo-resp"><img class="visible-xs" src="/images/responsive/Logo.png" alt=""></a>
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
		                   					</ul>
		                   				</div>
		                        <div id="navigation">
		                            <nav>
		                                <ul class="main fr" style="    float: left;
		    left: 52%;
		    margin: 0 auto;
		    padding-left: 0;
		    position: relative;
		    max-width: 950.1px;
		    width: 100%;">
		                                    <li class="home" style="    padding-top: 12px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr"><span><i class="fa fa-home ico-casa-nav"></i> ACCUEIL</span></a>
		                                    </li>
		                                    <li class="brands" style="    padding-top: 14px;">

		                                        <a class="dropdown" title="Mapa Interactivo" href="http://sanremo-on.com/fr/mappa"><span><img src="/images/Mappa.png" alt=""> PLAN DU SITE</span></a>

		                                        <!-- <a class="dropdown" title="Mapa Interactivo" href="http://sanremo-on.com/it/mappa"><span><span class="icon-mappa blanco ico-mapa-nav"></span> MAPPA</span></a>

		                                        <a class="dropdown-mobile" title="" href=""><i class="icon-circle-arrow-right icon-white"></i></a> -->
		                                    </li>
		                                    <li id="sanmenunegozi" class="offers" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr/negozi"><span>SHOPPING</span></a>
                                                        <ul class="sanmenunegozi" style="position:absolute; z-index:999999; display:none">
													<li>
														<a class="sananegozi" title="" href="http://sanremo-on.com/fr/news/offerte-immobiliari.html">
															<span>Offres immobili�res</span>
														</a>
													</li>
												</ul>
		                                    </li>
		                                    <li class="your-visit" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr/ristoranti-bar"><span>Food & Drink</span></a>
		                                    </li>
		                                    <li id="sanmenuacc" class="" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr/hotel"><span>HÉBERGEMENTS</span></a>
		                                        <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                        <ul class="sanmenuacc" style="position:absolute; z-index:999999; display:none">
		                                            <li ><a class="sanaacc" title="" href="http://sanremo-on.com/fr/news/offerte-soggiorno.html"><span>Offerte Soggiorno</span></a></li>
		                                           
		                                        </ul>
		                                    </li>
		                                    <!--// .guest-services -->
		                                    <li class="chic-travel" style=" padding-top: 12px;   width: 100px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr/tempo-libero-e-benessere"><span>LOISIRS ET BIEN-ÊTRE</span></a>
		                                        <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>
		                                    <li class="chic-travel" style=" padding-top: 12px;   width: 100px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr/spettacoli-cinema"><span>SPECTACLES ET CINÉMA</span></a>
		                                        <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>
		                                    <li class="chic-travel" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr/news.html"><span>NEWS</span></a>
		                                        <a class="dropdown-mobile" title="http://sanremo-on.com/fr/news.html" href=""><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>
		                                    <li class="whats-on" style="    padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr/servizi.html"><span>SERVICES</span></a>
		                                        <a class="dropdown-mobile" title="" href="http://sanremo-on.com/fr/servizi.html"><i class="icon-circle-arrow-right icon-white"></i></a>
		                                    </li>
		                                    <li id="sanmenu" class="whats-on" style="width: 75px; padding-top: 17px;">
		                                        <a class="dropdown" title="" href="http://sanremo-on.com/fr/la-citta.html"><span>SANREMO</span></a>
		                                        <a class="dropdown-mobile" title="" href="http://sanremo-on.com/fr/la-citta.html"><i class="icon-circle-arrow-right icon-white"></i></a>

		                                        <ul class="sanmenu" style="position:absolute; z-index:9999; display:none;">
		                                        	<li ><a class="sana" title="" href="http://sanremo-on.com/fr/la-citta.html"><span>La Ville</span></a></li>
		                                        	<li ><a class="sana" title="" href="http://sanremo-on.com/fr/gallery.php"><span>Photo</span></a></li>
		                                        	<li ><a class="sana" title="" href="http://sanremo-on.com/fr/galleryVideo.php"><span>Vidéo</span></a></li>
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
		                                        <a href="http://sanremo-on.com/fr">
		                                            <i class="fa fa-home"></i>
		                                            <span class="menusito">Accueil</span>
		                                        </a>
		                                    </li>
		                                    <li >
		                                        <a href="http://sanremo-on.com/sanremo-on-air/">
		                                            <i class="fa fa-bullhorn"></i>
		                                            <span class="menusito"><!-- <img style="padding-left: 5px; padding-top: 3px; width:100%; height:100%;" src="http://sanremo-on.com/images/festival.png"> -->Sanremo ON Air</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/mappa">
		                                            <span class="icon-mappa blanco size-icon2"></span>
		                                            <span class="menusito">Plan Du Site</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/negozi">
		                                            <span class="icon-negozi blanco size-icon2"></span>
		                                            <span class="menusito">Shopping</span>
		                                        </a>
                                                        <ul>
		                                            <li>
														<a class="" title="" href="http://sanremo-on.com/fr/news/offerte-immobiliari.html">
															<span>Offres immobili�res</span>
														</a>
													</li> 
		                                        </ul>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/ristoranti-bar">
		                                            <span class="icon-food-drink blanco size-icon2"></span>
		                                            <span class="menusito">Food & Drink</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/hotel">
		                                            <span class="icon-iconos-03 blanco size-icon2"></span>
		                                            <span class="menusito">Hébergements</span>
		                                        </a>
		                                        <ul>

		                                            <li><a class="" title="" href="http://sanremo-on.com/fr/news/offerte-soggiorno.html"><span>Offerte Soggiorno</span></a></li>

		                                                                                        
		                                        </ul>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/tempo-libero-e-benessere">
		                                            <span class="icon-tempo-libero blanco size-icon2"></span>
		                                            <span class="menusito">LOISIRS ET BIEN-ÊTRE</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/spettacoli-cinema">
		                                            <span class="icon-cinema-e-spettacoli blanco size-icon2"></span>
		                                            <span class="menusito">SPECTACLES ET CINÉMA</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/news/offerte.html">
		                                            <i class="fa fa-tags"></i>
		                                            <span class="menusito">NOS OFFRES</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/news/eventi.html">
		                                            <i class="fa fa-calendar-o"></i>
		                                            <span class="menusito">ÉVÉNEMENTS</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/news.html">
		                                            <i class="fa fa-bullhorn"></i>
		                                            <span class="menusito">ACTUALITÉS</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/servizi.html">
		                                            <i class="fa fa-info-circle"></i>
		                                            <span class="menusito">Service</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="#mm-3">
		                                            <i class="fa fa-sun-o"></i>
		                                            <span class="menusito">Sanremo</span>
		                                        </a>
		                                        <ul>
		                                        									<li><a class="" title="" href="http://sanremo-on.com/fr/la-citta.html"><span>La Ville</span></a></li>
		                                        							<li><a class="" title="" href="http://sanremo-on.com/fr/gallery.php"><span>Photo</span></a></li>
		                                        							<li><a class="" title="" href="http://sanremo-on.com/fr/galleryVideo.php"><span>Vidéo</span></a></li>
		                                        											
		                                        								</ul>
		                                    </li>
		                                    <!-- <li>
		                                        <a href="http://sanremo-on.com/it/gallery.php">
		                                            <i class="fa fa-sun-o"></i>
		                                            <span class="menusito">Gallery</span>
		                                        </a>
		                                    </li> -->
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/come-arrivare.html">
		                                            <span class="icon-iconosbussola blanco size-icon2"></span>
		                                            <span class="menusito">Getting Here</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="http://sanremo-on.com/fr/chi-siamo.html">
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
		                                        <a href="cookies.html">
		                                            <i class="fa fa-exclamation-triangle"></i>
		                                            <span class="menusito">Cookie</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="contatto.html">
		                                            <span class="icon-iconoslettera blanco size-icon2"></span>
		                                            <span class="menusito">Contact</span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="note-legali.html">
		                                            <i class="fa fa-gavel"></i>
		                                            <span class="menusito">Mentions légales </span>
		                                        </a>
		                                    </li>
		                                    <li>
		                                        <a href="#mm-4">
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
		                                            <li class="en">
		                                                <a title="Italiano" href="http://sanremo-on.com/it">
		                                                    <img src="/images/italiano.png" alt="">
		                                                    Italian
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
								<li><a href="/fr/">Accueil</a></li>
								<li><a href="/fr/news.html">News</a></li>
								<li><a href="/fr/news/eventi.html">événements</a></li>
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
												<p class="text-justify dark-orange"> Pour plus de renseignements sur les événements, les offres et les promotions de la “Ville des fleurs�?, enregistrez-vous sur le portail “Sanremo On�? et vous serez toujours “ON�? sur Sanremo</p>
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
					</div>
				</div>
			</div>
		</div>
	<div class="footer-container">
	            <footer>
	                <div class="container">
	                    <div class="row primero">
	                        <div class="logoF"><img src="/images/Sanremo-On-Footer.png" alt=""></div>
	                        <div class="mapaLogo"><span class="icon-mappa blanco ico-mapa-nav"></span> <a href="http://sanremo-on.com/fr/mappa" class="footer-link">Carte interactive</a> </div>
	                    </div>
	                    <div class="row segundo">
	                        <div class="menu col-sm-7">
	                            <div class="col-sm-3">
	                                <span class="orange"><strong>Catégories</strong></span>
	                                <ul>
	                                    <li><a href="http://sanremo-on.com/fr/negozi">Commerces</a></li>
	                                    <li><a href="http://sanremo-on.com/fr/ristoranti-bar">Food & Drink</a></li>
	                                    <li><a href="http://sanremo-on.com/fr/hotel">Hébergement</a></li>
	                                    <li><a href="http://sanremo-on.com/fr/tempo-libero-e-benessere">Loisirs et Bien-être</a></li>
	                                    <li><a href="http://sanremo-on.com/fr/spettacoli-cinema">Spectacles et Cinéma</a></li>
	                                </ul>
	                            </div>
	                            <div class="col-sm-3">
	                                <span class="orange"><strong>News</strong></span>
	                                <ul>
	                                    <li><a href="http://sanremo-on.com/fr/news/attualita.html">Actualités</a></li>
	                                    <li><a href="http://sanremo-on.com/fr/news/eventi.html">Evénements</a></li>
	                                    <li><a href="http://sanremo-on.com/fr/news/offerte.html">Nos offres</a></li>
	                                </ul>
	                            </div>
	                            <div class="col-sm-3">
	                                <span class="orange"><strong>Réseau Pro</strong></span>
	                                <ul>
	                                    <li><a href="http://sanremo-on.com/fr/chi-siamo.html">Nous connaître</a></li>
	                                </ul>
	                            </div>
	                            <div class="col-sm-3">
	                                <span class="orange"><strong>Sanremo</strong></span>
	                                <ul>
	                                    <li><a href="http://sanremo-on.com/fr/come-arrivare.html">Comment arriver à Sanremo</a></li>
	                                    <li><a href="http://sanremo-on.com/fr/la-citta.html">Découvrir Sanremo</a></li>
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
	                    <div class="row ultimo" >
	                        <div class="copyright">
	                            © Copyright – Réseau Pro -TVA 01615270087 – 2015 Tous droits réservés
	                            <div class="menuBottom ">
	                                <ul class="clase-footer-fr">
	                                    <li><a href="http://sanremo-on.com/fr/contatto.html">Contacts</a></li>
	                                    <li><a href="http://sanremo-on.com/fr/privacy.html">Politique de sécurité et de confidentialité </a></li>
	                                    <li><a href="http://sanremo-on.com/fr/note-legali.html">Mentions légales </a></li>
	                                    <li><a href="http://sanremo-on.com/fr/cookies.html">Cookies</a></li>
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