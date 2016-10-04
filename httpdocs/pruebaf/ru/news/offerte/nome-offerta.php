<?php 
$s = explode('/', $_SERVER["REQUEST_URI"]);
$r = $s[count($s)-1];
$r = substr($r,0,-5);
$ch = curl_init();
$url= "http://services.sanremo-on.com/service/oferta/url/".$r."/format/json";
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
<html lang="ru">
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
		
		<meta property="og:image" content="http://admin.sanremo-on.com/public/uploads/ofertas/<?php echo $micro['imagenbody']?>" />
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
		<link rel="stylesheet" href="/css/css.offerte.css">
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
		<style>
		.row.cuerpo2 {
		    margin-bottom: 0;
		}
		</style>
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
				<div class="logo" title="" ><a href="/ru" class="enlace-logotipo" id="logo-full"><img class="hidden-xs" src="/images/Logo-Sanremo-On.png" alt=""></a>
					                       <a href="/ru" class="enlace-logotipo" id="logo-resp"><img class="visible-xs" src="/images/responsive/Logo.png" alt=""></a>
			    </div>
				<div id="global">
					<ul class="membership">
						<li>
							<a data-target="#login_panel" data-toggle="modal" title="" href="#" data-original-title="Login" class="dropdown cambio" title="Registro ">
								<span class="hidden-xs">есть аккаунт? Логин &nbsp;</span> 
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
                                <span class="lingua-text"> язык </span>
                                <span class="icon-iconosmondo ico-mapa-nav3"></span>
                                <!-- <div class="idiomaIcono"></div> -->
                            </a>
                            <div class="idioma-ul">
                                <ul class="idiomas">
                                    <li class="en">
                                        <a title="Inglés" href="/en">
                                            <img src="/images/UK.png" alt="">
                                            английский
                                        </a>
                                    </li>
                                    <li class="es">
                                        <a title="Italiano" href="/it">
                                            <img src="/images/Italiano.png" alt="">
                                            итальянский
                                        </a>
                                    </li>
                                     <li class="pt-br">
                                        <a title="Frances" href="/fr">
                                            <img src="/images/FRench.png" alt="">
                                            французский
                                        </a>
                                    </li>
                                    <li class="ru">
                                        <a title="Ruso" href="/ru">
                                            <img src="/images/RUssian.png" alt="">
                                            русский
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
                        <ul class="main">
                            <li class="home">
                                <a class="dropdown" title="" href="/ru"><span><i class="fa fa-home ico-casa-nav"></i> ДОМ</span></a>
                            </li>
                            <li class="brands">

                                <a class="dropdown" title="Mapa Interactivo" href="/ru/mappa"><span><img src="/images/Mappa.png" alt=""> КАРТА</span></a>

                                <a class="dropdown" title="Mapa Interactivo" href="/ru/mappa"><span><span class="icon-mappa blanco ico-mapa-nav"></span> КАРТА</span></a>

                                <a class="dropdown-mobile" title="" href=""><i class="icon-circle-arrow-right icon-white"></i></a>
                            </li>
                            <li class="offers">
                                <a class="dropdown" title="" href="/ru/negozi"><span>МАГАЗИНЫ</span></a>
                            </li>
                            <li class="your-visit">
                                <a class="dropdown" title="" href="/ru/ristoranti-bar"><span>ЕДА&НАПИТКИ</span></a>
                            </li>
                            <li class="guest-services">
                                <a class="dropdown" title="" href="/ru/hotel"><span>УДОБСТВА</span></a>
                                <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
                            </li>
                            <!--// .guest-services -->
                            <li class="chic-travel">
                                <a class="dropdown" title="" href="/ru/tempo-libero-e-benessere"><span>СВОБОДНОЕ ВРЕМЯ И БЛАГОПОЛУЧИЕ</span></a>
                                <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
                            </li>
                            <li class="chic-travel">
                                <a class="dropdown" title="" href="/ru/spettacoli-cinema"><span>СПЕКТАКЛИ И КИНО </span></a>
                                <a class="dropdown-mobile" title="" href="grid.html"><i class="icon-circle-arrow-right icon-white"></i></a>
                            </li>
                            <li class="chic-travel">
                                <a class="dropdown" title="" href="/ru/news.html"><span>НОВОСТИ</span></a>
                                <a class="dropdown-mobile" title="/ru/news.html" href=""><i class="icon-circle-arrow-right icon-white"></i></a>
                            </li>
                            <li class="whats-on">
                                <a class="dropdown" title="" href="/ru/servizi.html"><span>УСЛУГИ</span></a>
                                <a class="dropdown-mobile" title="" href="/ru/servizi.html"><i class="icon-circle-arrow-right icon-white"></i></a>
                            </li>
                            <li class="whats-on">
                                <a class="dropdown" title="" href="/ru/la-citta.html"><span>САНРЕМО</span></a>
                                <a class="dropdown-mobile" title="" href="/ru/la-citta.html"><i class="icon-circle-arrow-right icon-white"></i></a>
                            </li>
                            <!-- <li class="membership sign-in visible-phone">
                                <a class="dropdown" title="Registro / Inicia sesión" href="/membership"><span>ATTUALITÀ </span></a>
                            </li> -->
                        </ul>
                    </nav>
                    <nav id="mmovil">
                        <ul>
                            <li>
                                <a href="/ru">
                                    <i class="fa fa-home"></i>
                                    <span class="menusito">дом</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/mappa">
                                    <span class="icon-mappa blanco size-icon2"></span>
                                    <span class="menusito">карта</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/negozi">
                                    <span class="icon-negozi blanco size-icon2"></span>
                                    <span class="menusito">магазины</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/ristoranti-bar">
                                    <span class="icon-food-drink blanco size-icon2"></span>
                                    <span class="menusito">еда&напитки</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/hotel">
                                    <span class="icon-iconos-03 blanco size-icon2"></span>
                                    <span class="menusito">удобства</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/tempo-libero-e-benessere">
                                    <span class="icon-tempo-libero blanco size-icon2"></span>
                                    <span class="menusito">свободное время и благополучие</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/spettacoli-cinema">
                                    <span class="icon-cinema-e-spettacoli blanco size-icon2"></span>
                                    <span class="menusito">спектакли и кино</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/news/offerte.html">
                                    <i class="fa fa-tags"></i>
                                    <span class="menusito">новости</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/news/eventi.html">
                                    <i class="fa fa-calendar-o"></i>
                                    <span class="menusito">услуги</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/news/attualita.html">
                                    <i class="fa fa-bullhorn"></i>
                                    <span class="menusito">Новости</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/servizi.html">
                                    <i class="fa fa-info-circle"></i>
                                    <span class="menusito">услуги</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/la-citta.html">
                                    <i class="fa fa-sun-o"></i>
                                    <span class="menusito">санремо</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/come-arrivare.html">
                                    <span class="icon-iconosbussola blanco size-icon2"></span>
                                    <span class="menusito">Приходи к Санремо</span>
                                </a>
                            </li>
                            <li>
                                <a href="/ru/chi-siamo.html">
                                    <i class="fa fa-user"></i>
                                    <span class="menusito">Кто мы</span>
                                </a>
                            </li>
                            <li>
                                <a href="privacy.html">
                                    <i class="fa fa-copyright"></i>
                                    <span class="menusito">политика сохранения тайны</span>
                                </a>
                            </li>
                            <li>
                                <a href="cookies.html">
                                    <i class="fa fa-exclamation-triangle"></i>
                                    <span class="menusito">КУКИ</span>
                                </a>
                            </li>
                            <li>
                                <a href="contatto.html">
                                    <span class="icon-iconoslettera blanco size-icon2"></span>
                                    <span class="menusito">Контакты</span>
                                </a>
                            </li>
                            <li>
                                <a href="note-legali.html">
                                    <i class="fa fa-gavel"></i>
                                    <span class="menusito">ЮРИДИЧЕСКИЕ ОТМЕТКИ</span>
                                </a>
                            </li>
                            <li>
                                <a href="#mm-2">
                                    <i class="fa fa-language"></i>
                                    <span class="menusito">язык</span>
                                </a>
                                <ul>
                                    <li class="en">
                                        <a title="Inglés" href="/en">
                                            <img src="/images/UK.png" alt="">
                                            английский
                                        </a>
                                    </li>
                                    <li class="en">
                                        <a title="Italiano" href="/it">
                                            <img src="/images/Italiano.png" alt="">
                                            итальянский
                                        </a>
                                     <li class="en">
                                        <a title="Frances" href="/fr">
                                            <img src="/images/FRench.png" alt="">
                                            французский
                                        </a>
                                    </li>
                                    <li class="en">
                                        <a title="Ruso" href="/ru">
                                            <img src="/images/RUssian.png" alt="">
                                            русский
                                        </a>
                                    </li>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>			</header>
		</div>
		<div class="wrapper">
			<div class="container">
				<div class="content">
					<div class="cuerpo">
						<div class="row hidden-xs">
							<ol class="breadcrumb">
								<li><a href="/ru">ДОМ</a></li>
								<li><a href="http://sanremo-on.com/ru/news.html">Новости</a></li>
								<li><a href="http://sanremo-on.com/ru/news/offerte.html">Предложения</a></li>
								<li class="active" data-field="nombre">Nome Offerta</li>
							</ol>
						</div>
						<div class="row filtros">
							<div class="col-sm-12 noticia margen-inferior">
								<span class="orange font-16"><strong data-field="nombre">NOME OFFERTA</strong></span>
								<span class="orange pull-right font-16"><strong data-field="fecha">24-07-2015</strong></span>
							</div>
							
						</div>
						<div class="row superior">
							<img src="/images/Slide.png" alt="" data-field="body" class="img-responsive">
						</div>

						<div class="row cuerpo2">
							<div class="col-sm-12">
							<span class="orange titulo-secundario"><strong data-field="nombre">SUBTITULO OFFERTA</strong><span class="percentual-dentro" data-field="oferta"></span></span>

							
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
                        <div class="mapaLogo"><span class="icon-mappa blanco ico-mapa-nav"></span> <a href="/ru/mappa" class="footer-link"> Интерактивная карта</a> </div>
                    </div>
                    <div class="row segundo">
                        <div class="menu col-sm-7">
                            <div class="col-sm-3">
                                <span class="orange"><strong>Категории</strong></span>
                                <ul>
                                    <li><a href="/ru/negozi">Магазины </a></li>
                                    <li><a href="/ru/ristoranti-bar">Еда&Напитки </a></li>
                                    <li><a href="/ru/hotel">Удобства </a></li>
                                    <li><a href="/ru/tempo-libero-e-benessere">Свободное время и благополучие</a></li>
                                    <li><a href="/ru/spettacoli-cinema">Спектакли и кино</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <span class="orange"><strong>Новости</strong></span>
                                <ul>
                                    <li><a href="/ru/news/attualita.html">Актуальность</a></li>
                                    <li><a href="/ru/news/eventi.html">События</a></li>
                                    <li><a href="/ru/news/offerte.html">Предложения</a></li>

                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <span class="orange"><strong>Rete Impresa</strong></span>
                                <ul>
                                    <li><a href="/ru/chi-siamo.html">Кто мы</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-3">
                                <span class="orange"><strong> Санремо</strong></span>
                                <ul>
                                    <li><a href="/ru/come-arrivare.html">Приходи к Санремо </a></li>
                                    <li><a href="/ru/la-citta.html">Узнай Санремо</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="social">
                            <p>Ищи в:</p>
                            <a href="https://www.facebook.com/sanremoon" target="_blank"><img src="/images/Fb.png" alt=""></a>
                            <a href="https://twitter.com/SanremoOn" target="_blank"><img src="/images/Twitter.png" alt=""></a>
                            <a href="https://www.youtube.com/channel/UCz0kZtT62QKyhFB_Hk24jrw" target="_blank"><img src="/images/Youtube.png" alt=""></a>
                            <a href="https://plus.google.com/u/0/105050793970673159877/posts" target="_blank"><img src="/images/Google-+.png" alt=""></a>
                            <!-- <a href="#" target="_blank"><img src="/images/Pinterest.png" alt=""></a> -->
                            <div>
                            <p class="maginApp">Получите его на:</p>
                            <a href="https://geo.itunes.apple.com/it/app/sanremo-on/id1031320757?mt=8" target="_blank"><img src="/images/AppleStorelogoOn.png" alt=""></a>
                            <a href="https://play.google.com/store/apps/details?id=com.ionicframework.myapp802908" target="_blank"><img src="/images/Playstorelogowhite.png" alt=""></a>
                            </div>
                        </div>
                    </div>
                    <div class="row ultimo">
                        <div class="copyright">
                            Копирайт-Санремо Он сеть предприятий-налог ива 01615270087-2015 все права конфиденциальны
                            <div class="menuBottom">
                                <ul class="clase-footer-fr">
                                    <li><a href="/ru/contatto.html">Контракты</a></li>
                                    <li><a href="/ru/privacy.html">Политика частной жизни</a></li>
                                    <li><a href="/ru/note-legali.html">Юридические выписки</a></li>
                                    <li><a href="/ru/cookies.html">Куки</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="powered">
                              питаться от: <a href="http://www.esedigital.com/" target="_blank" class="link-naranja">©Esedigital</a> 
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
                            <span class="texto-popup">ДОСТУП В ТВОЙ АККАУНТ</span>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="post" name="login_form" id="login_form" action="#">
                                <div class="form-group">
                                    <button class="btn btn-block btn-navy facebook_connect" type="button">
                                        <i class="fa fa-facebook"></i> &nbsp;
                                        <strong> WЛОГИН С ФЕЙСБУК</strong>
                                    </button>
                                </div>
                                <div class="form-group separator-text text-center">
                                    <span>ИЛИ</span>
                                </div>
                            <div class="form-group">
                                <input type="text" required="" placeholder="ИМЯ ПОЛЬЗОВАТЕЛЯ" class="form-control" value="" id="username" name="log">
                            </div>
                            <div class="form-group">
                                <input type="password" required="" placeholder="ПАССВОРД" class="form-control" value="" id="password" name="pwd">
                            </div>
                            <!-- Login Button -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-12">
                                        <span class="descrip"><p class="centrar">Твоя частная жизнь очень важна для нас, не передадим и не продадим третьим лицам твои персональные данные</p></span>
                                    </div><!-- /.col-md-12 -->
                                    <div class="col-md-12">
                                        <span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso">Описываю правила о<a href="privacy.html" id="permiso">личной жизни на сито</a></p></span>
                                    </div><!-- /.col-md-12 -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="hidden" value="/directory/demo1/" name="redirect_to">
                                        <button class="btn btn-block btn-danger" type="submit">
                                            <strong> ЛОГИН</strong>
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
                                            <small><p class="texto-pop">Ещё не на связи, регистрируйся.</p></small>
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
                            
                            <span class="texto-popup">ЗАРЕГИСТРИРУЙСЯ НА НЬЮСЛЕТТЕР</span>
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
                                    <input type="email" value="" name="EMAIL" class="required email form-control input-iscri"  placeholder="Е-мейл" >
                                </div>
                                <div class="mc-field-group">
                                    <input type="text" value="" name="FNAME" class="form-control input-iscri" placeholder="Имя">
                                </div>
                                <div class="mc-field-group">
                                    <input type="text" value="" name="LNAME" class="form-control input-iscri" placeholder="Фамилия">
                                </div>
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;"><input type="text" name="b_c112f8fba63a3d016c6b7aeab_8c75a7a0e0" tabindex="-1" value=""></div>
                                   
                                    <span class="descrip"><p class="centrar"><input type="checkbox" value="" id="check-permiso">Подпись под правилами о <a href="privacy.html" id="permiso">частной жизни на сито.</a></p></span>
                                    
                                    <div class="clear"><input type="submit" value="ЗАРЕГИСТРИРУЙСЯ" name="subscribe" class="btn btn-block btn-danger boton-iscri"></div>
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
		<script src="/js/js.oferta.js"></script>
		<script type="text/javascript">stLight.options({publisher: "93d1884f-b0e3-4904-a0d4-b8211962a3f9", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	</body>
</html>