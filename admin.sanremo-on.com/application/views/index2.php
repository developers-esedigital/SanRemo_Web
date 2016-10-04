<!DOCTYPE html>
<html lang="en" ng-app="travelTale" ng-controller="homeController as homeCtrl">
<head>
	<meta charset="UTF-8">
	<title>Sanremo On | Admin</title>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/font-opensanslight.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/all-skins.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/js/plugins/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin.css">
	<link href="<?php echo base_url();?>public/js/plugins/iCheck/all.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/fileinput.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/multi-select.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/summernote.css">
	
	<style>
	.register-logo{
		display: none;
	}
	.register-box {
	    margin-top: 0 !important;
	}
	</style>
</head>
<body class="skin-blue fixed">
	<div class="wrapper">
		<header class="main-header">
			<!-- Logo -->
			<a href="#" class="logo"><b>Sanremo-On</b></a>
			<nav class="navbar navbar-static-top" role="navigation">
				<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
				</a>
				<div class="navbar-custom-menu">
					<ul class="nav navbar-nav">
						<!-- Notifications: style can be found in dropdown.less -->
						<!-- User Account: style can be found in dropdown.less -->
						<li class="dropdown user user-menu">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">
								<img src="<?php echo base_url();?><?php echo $usuario->getFoto() == '' ? 'public/images/user.png' : 'public/uploads/'.$usuario->getFoto() ?>" class="user-image" alt="User Image"/>
								<span class="hidden-xs"><?php echo $usuario->getUsername() ?></span>
							</a>
							<ul class="dropdown-menu">
								<!-- User image -->
								<li class="user-header">
									<img src="<?php echo base_url();?><?php echo $usuario->getFoto() == '' ? 'public/images/user.png' : 'public/uploads/'.$usuario->getFoto() ?>" class="img-circle" alt="User Image" />
									<p>
										<?php echo $usuario->getUsername() ?>
									</p>
								</li>
								<!-- Menu Body -->
								<!-- <li class="user-body">
									<div class="col-xs-4 text-center">
										<a href="#">Friends</a>
									</div>
								</li> -->
								<!-- Menu Footer-->
								<li class="user-footer">
<!-- 									<div class="pull-left">
	<a href="#" class="btn btn-default btn-flat">Perfil</a>
</div> -->
									<div class="pull-right">
										<a href="<?php echo base_url().'admin/logout' ?>" class="btn btn-default btn-flat">Log Out</a>
									</div>
								</li>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</header>
		<!-- Left side column. contains the logo and sidebar -->
		<aside class="main-sidebar">
			<!-- sidebar: style can be found in sidebar.less -->
			<section class="sidebar">
				<!-- Sidebar user panel -->
				<div class="user-panel">
					<div class="pull-left image">
						<img src="<?php echo base_url();?><?php echo $usuario->getFoto() == '' ? 'public/images/user.png' : 'public/uploads/'.$usuario->getFoto() ?>" class="img-circle" alt="User Image" />
					</div>
					<div class="pull-left info">
						<p><?php echo $usuario->getUsername(); ?></p>
						<a href="#"><i class="fa fa-circle text-success"></i> Online</a>
					</div>
				</div>
				<!-- search form -->
<!-- 				<form action="#" method="get" class="sidebar-form">
	<div class="input-group">
		<input type="text" name="q" class="form-control" placeholder="Search..."/>
		<span class="input-group-btn">
			<button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
		</span>
	</div>
</form> -->
				<!-- /.search form -->
				<!-- sidebar menu: : style can be found in sidebar.less -->





				<ul class="sidebar-menu" ng-controller="menuController as menu">
					<li class="header">Menu Principale</li>
					<li>
						<a href="" >
							<i class="fa fa-home" ></i><span>Benvenuto</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'micro' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-map-marker"></i> <span>Microsites</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'ofer' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-tags"></i> <span>Offerte</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'not' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-newspaper-o"></i> <span>Notizie</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'evt' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-flag"></i> <span>Eventi</span>
						</a>
					</li>
					<!-- <li>
						<a href="<?php echo base_url().'admin/invitados' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-user-plus"></i> <span>Invitati</span>
						</a>
					</li> -->
					<li>
						<a href="<?php echo base_url().'admin/categorias' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-thumb-tack"></i> <span>Categorie</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'marc' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-copyright"></i> <span>Brands</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'admin/config' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-users"></i> <span>Config Utente</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'servicios' ?>" data-type="ajax" data-load="principal">
							<i class="fa  fa-info-circle"></i> <span>Servizi</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'ban' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-picture-o"></i> <span>Banners</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'slid' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-picture-o"></i> <span>Sliders</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'texto' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-picture-o"></i> <span>Sliders Txt</span>
						</a>
					</li>
					<li>
						<a href="<?php echo base_url().'gall' ?>" data-type="ajax" data-load="principal">
							<i class="fa fa-picture-o"></i> <span>Gallery</span>
						</a>
					</li>
				</ul>
			</section>
			<!-- /.sidebar -->
		</aside>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Benvenuti
					<small></small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="active">Dashboard</li>
				</ol>
			</section>
			<section class="content" >
				<div class="mainSection">
					<img src="<?php echo base_url() ?>public/images/Back-Admin.png" alt="" style="width: 100%;">
				</div>
			</section>
			<!-- right col -->
		</div>
		<!-- /.row (main row) -->
		<footer class="main-footer">
			<strong>Copyright &copy; 2015 </a></strong> All rights reserved.
		</footer>
	</div>
	<script src="<?php echo base_url();?>public/js/plugins/jQuery/jquery-2.1.4.min.js"></script>
	<script src="<?php echo base_url();?>public/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/js/plugins/slimScroll/jquery.slimscroll.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/js/plugins/moment.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/js/plugins/typeahead.jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/js/plugins/noty/packaged/jquery.noty.packaged.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/js/plugins/noty/themes/default.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/js/chosen.jquery.js" type="text/javascript"></script>	
	<script src="<?php echo base_url();?>public/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/fileinput_locale_es.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/bootstrap-tagsinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/typeahead.bundle.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/plugins/validate/jquery.validate.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <script src="<?php echo base_url();?>public/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/jquery.multi-select.js" type="text/javascript"></script>
    
	<script>
		window.base_url = '<?php echo json_encode(base_url()); ?>';
    </script>
    <script src="<?php echo base_url();?>public/js/summernote.js"></script>
	<script src="<?php echo base_url();?>public/js/tabla.js"></script>
	<script src="<?php echo base_url();?>public/js/app.js"></script>
	<script src="<?php echo base_url();?>public/js/Admin.js"></script>
</body>
</html>
