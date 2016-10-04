<!DOCTYPE html>
<div class="register-box">
	<div class="register-box-body" ng-controller="DatepickerDemoCtrl">
		<p class="login-box-msg">Nuova Sottocategoria </p>
		<form action="cat/add" method="post" enctype="multipart/form-data" id="registerCategoria">
			<input type="hidden" name="registro" value="1">
			<div class="form-group has-feedback">
				<label for="exampleInputEmail1">Categorie</label>
				<select name="parent" data-chosen="1" data-placeholder="Seleziona categorie" id="" class="form-control" required>
					<option value=""></option>
					<?php foreach ($categorias as $key => $value): ?>
					<?php $u = json_decode($value); ?>
					<option value="<?php echo $key?>"><?php echo $u->it ?></option>
				<?php endforeach ?>
			</select>
		</div>
		<div class="form-group has-feedback">
			<?php foreach ($config->idiomas as $key => $value): ?>
				<label for="">Nome <?php echo $value->nombre ?></label>
				<input type="text" class="form-control" placeholder="Nome <?php echo $value->nombre ?>" name="nombre-<?php echo $value->letras ?>" <?php echo $key==0 ? 'required' : '' ?>/>
				<br>
			<?php endforeach ?>
			<!-- <input type="text" class="form-control" placeholder="Nome" name="nombre" required/> -->
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

$.validator.setDefaults({ ignore: ":hidden:not(select)" });
$('[data-chosen="1"]').chosen({
	allow_single_deselect: true,
	width:"100%"
});
$("#registerCategoria").validate({
	errorPlacement: function(error, element) {
        if(element.parent('.form-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});
$('#registerCategoria').on('submit',function(evt){
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
				// window.location = data.url;
			}, 1000)
		}
	});
	
	return false;
});
</script>

