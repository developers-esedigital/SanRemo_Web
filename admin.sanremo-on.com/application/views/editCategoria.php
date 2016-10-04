<!DOCTYPE html>
<div class="register-box">
	<div class="register-box-body" ng-controller="DatepickerDemoCtrl">
		<p class="login-box-msg">Modifica Categoria</p>
		<form action="cat/edit/<?php echo $categoria->getIdcategoria() ?>" method="post" enctype="multipart/form-data" id="editCategoria">
			<input type="hidden" name="registro" value="1">
			<input type="hidden" name="idcategoria" value="<?php echo $categoria->getIdcategoria() ?>">
			<div class="form-group has-feedback">
				<?php $u = json_decode($padre) ?>
				<label for="exampleInputEmail1"><?php echo $u->it; ?></label>
				<input type="hidden" name="parent" value="<?php echo $categoria->getParent() ?>">
			</div>
			<div class="form-group has-feedback">
				<?php foreach ($config->idiomas as $key => $value): ?>
					<?php $u = json_decode($categoria->getNombre()); ?>
					<input type="text" class="form-control" placeholder="Nome <?php echo $value->nombre ?>" value="<?php echo $u->{$value->letras} ?>" name="nombre-<?php echo $value->letras ?>" <?php echo $key==0 ? 'required' : '' ?>/>
					<br>
				<?php endforeach ?>
			</div>
			<div class="row">
				<div class="col-xs-4">
					<button type="submit" class="btn btn-primary btn-block btn-flat">Salva</button>
				</div><!-- /.col -->
			</div>
			<input type="hidden" name="registro" value="1">
		</form>        
	</div><!-- /.form-box -->
</div><!-- /.register-box -->
<script>
	$("#editCategoria").validate({
		errorPlacement: function(error, element) {
	        if(element.parent('.form-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});
	$('#editCategoria').on('submit',function(evt){
	evt.preventDefault();
	var isvalidate=$(this).valid();
    if(!isvalidate){
        return false;
    }
	$.ajax({
		url: $(this).attr('action'),
		type: 'POST',
		dataType: 'json',
		data: $(this).serialize(),
	}).done(function(data) {
		if (data.code == 500)
			tools.notificacion('top', data.msg, 'alert');
		else {
			tools.notificacion('top', data.msg, 'success');
			setTimeout(function(){
				tools.cargarPrincipal({url:data.url});
			}, 1000)
		}
	});
	
	return false;
	});
</script>
</body>
</html>

