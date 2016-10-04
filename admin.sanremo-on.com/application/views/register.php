<!DOCTYPE html>
<script type="text/javascript">
	window.location.replace("http://admin.sanremo-on.com/admin/login");
</script>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Register | Sanremo ON</title>
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/bootstrap.css">
	
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/font-opensanslight.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/admin.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/all-skins.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/style.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/animate.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/js/plugins/daterangepicker/daterangepicker-bs3.css">
	<link rel="stylesheet" href="<?php echo base_url();?>public/css/fileinput.css">
</head>
<body class="register-page">
<div class="register-box">
<!-- 	<div class="register-logo">
		<a href="#login"><b>Admin</b>Sanremo ON</a>
	</div> -->
	<div class="register-box-body" ng-controller="DatepickerDemoCtrl">
		<p class="login-box-msg"><img src="<?php echo base_url().'public/images/login.png' ?>" alt=""></p>
		<p class="login-box-msg">Nuevo Usuario Registrese</p>
		<form action="register" method="post" enctype="multipart/form-data" id="register">
			<div class="form-group has-feedback">
				<input type="file" class="form-control" name="foto" placeholder="Seleziona Foto" required/>
			</div>
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="username" name="username" required/>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="email" class="form-control" placeholder="Email" name="email" required/>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Password" name="password" required/>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Ripeti Password" name="repassword" required/>
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			</div>

			<div class="row">
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Salva</button>
				</div><!-- /.col -->
			</div>
			<input type="hidden" name="registro" value="1">
		</form>        
		<a href="login" class="text-center">Hai un account??</a>
	</div><!-- /.form-box -->
</div><!-- /.register-box -->
	
	<script src="<?php echo base_url();?>public/js/plugins/jQuery/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url();?>public/js/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/plugins/moment.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/plugins/typeahead.jquery.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>public/js/fileinput.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/fileinput_locale_es.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/plugins/noty/packaged/jquery.noty.packaged.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/plugins/noty/themes/default.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>public/js/chosen.jquery.js" type="text/javascript"></script>
    <script>
      window.base_url = '<?php echo json_encode(base_url()); ?>';
    </script>
    <script src="<?php echo base_url();?>public/js/js.js" type="text/javascript"></script>
<style>
	body{
		background:none repeat scroll 0 0 #d2d6de;
	}
	.profile-img{
    width: 96px;
    height: 96px;
    margin: 0 auto 10px;
    display: block;
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
}
</style>
</body>
</html>

