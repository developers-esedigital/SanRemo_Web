<!DOCTYPE html>
<div class="register-box">
	<div class="register-box-body" ng-controller="DatepickerDemoCtrl">
		<p class="login-box-msg">Modifica Brand</p>
		<form action="<?php echo $post ?>" method="post" enctype="multipart/form-data" id="registerMarca">
		<div class="form-group has-feedback">
			<input type="hidden" name="registro" value="1">
			<input type="hidden" name="idmarca" value="<?php echo $marca->getIdmarca() ?>">
			<input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $marca->getNombre() ?>" required/>
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
		<input type="hidden" name="estatus" value="0">
		<div class="row">
			<div class="col-xs-4">
				<button type="button" class="btn btn-primary btn-block btn-flat" data-value="1">Salva</button>
			</div><!-- /.col -->
		</div>
		<input type="hidden" name="registro" value="1">
	</form> 
	</div>       
</div><!-- /.form-box -->
</div><!-- /.register-box -->
<script>
$("#registerMarca").validate({
		errorPlacement: function(error, element) {
	        if(element.parent('.form-group').length) {
	            error.insertAfter(element.parent());
	        } else {
	            error.insertAfter(element);
	        }
	    }
	});
$('button[data-value]').on('click',function(){
	$('input[name="estatus"]').val($(this).data('value'));
	$('#registerMarca').submit();
})
$('#registerMarca').on('submit', function(evt) {
    evt.preventDefault();
    var isvalidate=$(this).valid();
    if(!isvalidate){
        return false;
    }
	var postData = new FormData();
	$('input[type="email"],input[type="text"],input[type="password"],input[type="hidden"],textarea,input[type="checkbox"]:checked,select').each(function(index, el) {
		postData.append(el.name, el.value.trim());
	});

	$.ajax({
		url: $('#registerMarca').attr('action'),
		type: "POST",
		data: postData,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			console.log(data);
			if (typeof(data) == 'object') {
				if (data.code == 200) {
					tools.cargarPrincipal({url:data.url});
				} else {
					tools.notificacion('top', data.msg, 'alert');
				}
			} else {
				
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
		}
	});
	return false;
})
</script>

