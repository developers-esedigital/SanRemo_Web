<!DOCTYPE html>
<div class="register-box">
	<div class="register-box-body" ng-controller="DatepickerDemoCtrl">
		<p class="login-box-msg">Nuovo Slider Txt</p>
		<form action="<?php echo base_url() ?>index.php/texto/add" method="post" enctype="multipart/form-data" id="registerCategoria">
			<!-- <input type="hidden" name="registro" value="1"> -->
			<div class="form-group has-feedback">
				<label for="exampleInputEmail1">Nome</label>
				<input class="form-control" name="titulo" placeholder="Titulo" required/>
				<div id="errorBlock43" class="help-block"></div>
			</div>
			<div class="form-group has-feedback">
				<label for="exampleInputEmail1">Pulsante</label>
				<input class="form-control" name="tboton" placeholder="Boton" required/>
				
			</div>
			<div class="form-group has-feedback">
				<label for="exampleInputEmail1">Url</label>
				<input class="form-control" name="turl" placeholder="Url" required/>
				
			</div>
			<!-- <div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="Url" name="url"/>
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
			</div> -->
			<div class="input-group">
		      <span class="input-group-addon">
		        <input type="checkbox" aria-label="" value="activado" name="estatus">Attivato

		      </span>
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
//$.validator.setDefaults({ ignore: ":hidden:not(select)" });
// $('[data-chosen="1"]').chosen({
// 	allow_single_deselect: true,
// 	width:"100%"
// });
// $("#registerCategoria").validate({
// 	errorPlacement: function(error, element) {
//         if(element.parent('.form-group').length) {
//             error.insertAfter(element.parent());
//         } else {
//             error.insertAfter(element);
//         }
//     }
// });
// $('input[type="file"]').fileinput({
// 	showUpload: false,
// 	browseClass: "btn btn-primary",
// 	language: 'es',
// 	uploadAsync: false,
//     minFileCount: 1,
// 	allowedFileExtensions: ['jpg', 'png', 'gif'],
//     elErrorContainer: "#errorBlock43",
// 	previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
// });
// $('#registerCategoria').on('submit',function(evt){
// 	evt.preventDefault();
// 	var postData = new FormData();
// 	var principal = $('input[name="principal"]').prop('files')[0];
// 	var fondo = $('input[name="fondo"]').prop('files')[0];
// 	postData.append('principal', principal);
// 	postData.append('fondo', fondo);

// 	$('input[type="email"],input[type="text"],input[type="password"],input[type="hidden"],textarea,input[type="checkbox"]:checked,select').
// 		each(function(index, el) {
// 			if($(el).is('select')){
// 				for (var i = 0; i < $(el).val().length; i++) {
// 					postData.append(el.name,$(el).val()[i]);
// 				};
// 			}else{
// 				postData.append(el.name, el.value.trim());
// 			}
// 	});
	var postData = new FormData();

	$.ajax({
		url: $('#registerCategoria').attr('action'),
		type: "POST",
		data: postData,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			console.log(data);
			if (typeof(data) == 'object') {
				if (data.code == 200) {
					// tools.cargarPrincipal({url:data.url});
					//  window.location = data.url;
					tools.notificacion('top', data.msg, 'success');
					window.location = data.url
				} else {
					tools.notificacion('top', data.msg, 'alert');
				}
			} else {
				
			}
		},
		error: function(jqXHR, textStatus, errorThrown) {
			//if fails     
		}
	});
	return false;
})
</script>

