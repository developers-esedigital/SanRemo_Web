<!DOCTYPE html>
<div class="register-box">
	<div class="register-box-body" ng-controller="DatepickerDemoCtrl">
		<p class="login-box-msg">Modifica Evento</p>
		<?php if ($evento->getEstatus() == 0 || $evento->getEstatus() == -1): ?>
			<div class="callout callout-info">
            <h4><i class="fa fa-info"></i> Nota:</h4>
            Questo evento è in fase di realizzazione , non sarà visibile sul sito web.
          </div>
		<?php endif ?>
		<form action="<?php echo $post ?>" method="post" enctype="multipart/form-data" id="registerR">
			<input type="hidden" name="registro" value="1">
			<input type="hidden" name="idevento" value="<?php echo $evento->getIdevento() ?>">
			<input type="hidden" name="idmicrosite" value="<?php echo $evento->getMicrosite() ?>">
			<div class="form-group has-feedback">
				<label for="exampleInputEmail1">Microsito:</label>
				<?php $u = json_decode($microsite[$evento->getMicrosite()]) ?>
				<?php echo $u->it ?>
		</div>
		<div class="form-group has-feedback">
			<?php $u = json_decode($evento->getNombre()); ?>
			<?php foreach ($config->idiomas as $key => $value): ?>
				<label for="">Nome <?php echo $value->nombre ?></label>
				<input type="text" class="form-control" placeholder="Nome <?php echo $value->nombre ?>" value="<?php echo $u->{$value->letras} ?>" name="nombre-<?php echo $value->letras ?>" <?php echo $key==0 ? 'required' : '' ?>/>
				<br>
			<?php endforeach ?>
			
		</div>

		<div class="form-group has-feedback">
			<?php
			if ($_SESSION['usuario']->getNivelusuario() == 0) {
			 	# code...
			 	?>
			 <input type="hidden" class="form-control"  name="idus" value="<?php echo $_SESSION["usuario"]->getIduser();?>"/>
			 <input type="hidden" class="form-control"  name="idmicro" value="<?php echo $idmicro['id'];?>"/>
			 <?php
			 } else{
			 	?>
			 	<input type="hidden" class="form-control"  name="idus" value=""/>
			 	<?php
			 }
			
			?>
			<input type="text" class="form-control" placeholder="Data" value="<?php echo $evento->getFechafin() ?>" name="rango" required/>
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
		<div class="form-group has-feedback">
			<label for="exampleInputEmail1">Seleziona l'immagine principale per la Grid (514*292)</label>
			<input type="file" class="form-control" name="fotoPrincipal" placeholder="Seleziona Foto" />
			<div id="errorBlock44" class="help-block"></div>
		</div>
		<div class="form-group has-feedback">
			<label for="exampleInputEmail1">Seleziona l'immagine principale per l'Evento (1876*720)</label>
			<input type="file" class="form-control" name="foto" placeholder="Seleziona Foto" />
			<div id="errorBlock43" class="help-block"></div>
		</div>
		<div class="form-group has-feedback">
			<?php $u = json_decode($evento->getDescripcion()); ?>
			<?php foreach ($config->idiomas as $key => $value): ?>
				<label for="">Descrizione <?php echo $value->nombre ?></label>
				<textarea name="descripcion-<?php echo $value->letras ?>" id="descripcion" placeholder="Descrizione <?php echo $value->nombre ?>" class="form-control" cols="30" rows="10"  <?php echo $key==0 ? 'required' : '' ?>><?php echo $u->{$value->letras} ?></textarea>
				<br>
			<?php endforeach ?>
			
		</div>
			
		<h3>SEO BOX</h3>
		<div class="form-group has-feedback">
			<?php $u = json_decode($evento->getTitle()); ?>

			<?php foreach ($config->idiomas as $key => $value): ?>
				<label for="">Title <?php echo $value->nombre ?></label>
				<input type="text" class="form-control" placeholder="Title <?php echo $value->nombre ?>" value="<?php echo $u->{$value->letras} ?>" name="title-<?php echo $value->letras ?>" <?php echo $key==0 ? 'required' : '' ?>/>
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				<br>
			<?php endforeach ?>
		</div>
		<div class="form-group has-feedback">
			<?php $u = json_decode($evento->getUrl()); ?>
			<?php foreach ($config->idiomas as $key => $value): ?>
				<div class="input-group">
					<span class="input-group-addon" id="basic-addon">http://www.sanremo-on.com/<?php echo $value->letras ?>/news/eventi/<span class="uu"></span></span>
					<input type="text" class="form-control" placeholder="URL <?php echo $value->nombre ?>" value="<?php echo $u->{$value->letras} ?>" name="url-<?php echo $value->letras ?>" <?php echo $key==0 ? 'required' : '' ?>/>
					<span class="input-group-addon" id="basic-addon2">.html</span>
				</div>
				<br>
			<?php endforeach ?>
		</div>
		<div class="form-group has-feedback">
			<?php $u = json_decode($evento->getDescription()); ?>
			<?php foreach ($config->idiomas as $key => $value): ?>
				<label for="">Description <?php echo $value->nombre ?></label>
				<textarea name="description-<?php echo $value->letras ?>" id="description" placeholder="Description <?php echo $value->nombre ?>" class="form-control" cols="30" rows="10"  <?php echo $key==0 ? 'required' : '' ?>><?php echo $u->{$value->letras} ?></textarea>
				<br>
			<?php endforeach ?>
		</div>
<div class="form-group has-feedback">
			<div class="mapa"></div>
			<?php $dir = $evento->getDir(); ?>
			<div class="input-group">
				<input type="text" class="form-control" value="<?php echo $dir; ?>" placeholder="Cerca in Google Maps" name="punto" />
		      <span class="input-group-btn">
		        <button class="btn btn-default"  type="button" id="findDir">Cerca</button>
		      </span>
		    </div>
			<?php 
			$pon=$evento->getPuntogoogle();
			if (strlen($pon)<4) $pon="43.8163749,7.7750793";	
			$ggg = explode(',',$pon); ?>
			<input type="hidden" name="Lat" value="<?php echo $ggg[0] ?>">
			<input type="hidden" name="Long" value="<?php echo $ggg[1] ?>">
			<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
		</div>
		<!--Direccion del evento -->
		<div class="form-group has-feedback">
				<?php $dir = $evento->getDir();  ?>
				<label for="">Direccion</label>
				<input type="text" class="form-control" placeholder="Direccion" name="dir" value="<?php echo $dir; ?>" />
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
				<br>
			
		</div>
		
		<input type="hidden" name="estatus" value="0">
		<div class="row">
			<div class="col-xs-4">
				<button type="button" class="btn btn-primary btn-block btn-flat" data-value="0">Salva</button>
			</div><!-- /.col -->
			<div class="col-xs-4">
				<button type="button" class="btn btn-primary btn-block btn-flat" data-value="1">Pubblica</button>
			</div>
			<div class="col-xs-4">
				<button type="button" class="btn btn-primary btn-block btn-flat" data-value="-1">Anteprima</button>
			</div>
		</div>
		<input type="hidden" name="registro" value="1">
	</form>   
	</div>     
</div><!-- /.form-box -->
</div><!-- /.register-box -->
<style>
	.mapa {
	    height: 250px;
	    width: 100%;
	}
</style>
<script>
$('input[name="rango"]').daterangepicker();

$('input[name="foto"]').fileinput({
	showUpload: false,
	browseClass: "btn btn-primary",
	language: 'es',
	uploadAsync: false,
	initialPreview: [
            "<img src='<?php echo base_url() ?>public/uploads/evento/<?php echo $evento->getFotobody()?>' class='file-preview-image'>"
        ],
    maxImageWidth: 1877,
    minImageWidth: 1875,
    maxImageHeight:721,
    minImageHeight:719,
	allowedFileExtensions: ['jpg', 'png', 'gif'],
    elErrorContainer: "#errorBlock43",
	previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
});
$('[name="fotoPrincipal"]').fileinput({
	showUpload: false,
	browseClass: "btn btn-primary",
	language: 'es',
	initialPreview: [
	        "<img src='<?php echo base_url() ?>public/uploads/evento/<?php echo $evento->getFotogrid()?>' class='file-preview-image'>"
	    ],
	uploadAsync: false,
	maxImageWidth: 515,
	minImageWidth: 513,
	maxImageHeight:293,
	minImageHeight:291,
	allowedFileExtensions: ['jpg', 'png', 'gif'],
    elErrorContainer: "#errorBlock44",
	previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
});
$('[name="title"]').on('keydown',function(e){
	if(e.keyCode != 8){
		if($(this).val().length > 155 ){
			return false;
		}
	}
});
$('[name="description"]').on('keydown',function(e){
	if(e.keyCode != 8){
		if($(this).val().length > 155 ){
			return false;
		}
	}
})
$('[name="url"]').on('keydown',function(e){
	console.log(e.keyCode);
	if ( (e.keyCode >= 65 && e.keyCode <=90) || (e.keyCode >= 48 && e.keyCode <=57) || (e.keyCode >= 96 && e.keyCode <=105) || e.keyCode == 173 || e.keyCode == 189 || e.keyCode == 8 ) {
        $(this).val($(this).val().toLowerCase())
        return;
    }else{
    	e.preventDefault();
    	return false;
    }
})
$('button[data-value]').on('click',function(){
	$('input[name="estatus"]').val($(this).data('value'));
	if($(this).data('value') == '-1'){
		tools.notificacion('top', 'Previsualizando...', 'success');
	}
	$('#registerR').submit();
})
$("#registerR").validate({
	errorPlacement: function(error, element) {
        if(element.parent('.form-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});
$('#registerR').on('submit', function(evt) {
	evt.preventDefault();
	var isvalidate=$(this).valid();
    if(!isvalidate){
        return false;
    }

	$('[required]').each(function(){
	    if(!this.validity.valid){
	        $(this).focus();
	        return false;
	    }
	});
	var pru = false;
	var ele;
	$('.file-error-message').each(function(i,e){
		console.log(i);
		if( !$(e).is(':hidden')) {
			pru = true;
			ele = e;
		}
	})
	if(pru){
		tools.scrollTo('#'+ele.id);
		return false;
	}
    evt.preventDefault();
	var postData = new FormData();
	var files = $('input[name="foto"]').prop('files');//[0];
	var principal = $('input[name="fotoPrincipal"]').prop('files')[0];//[0];
	for (var i = 0; i < files.length; i++) {
		postData.append('galeria'+i, files[i]);
	};
	postData.append('imagePrincipal', principal);

	$('input[type="email"],input[type="text"],input[type="password"],input[type="hidden"],textarea,input[type="checkbox"]:checked,select').each(function(index, el) {
		postData.append(el.name, el.value.trim());
	});

	$.ajax({
		url: $('#registerR').attr('action'),
		type: "POST",
		data: postData,
		processData: false,
		contentType: false,
		success: function(data, textStatus, jqXHR) {
			console.log(data);
			if (typeof(data) == 'object') {
				if (data.code == 200) {
					if(data.prev){
						window.open('//doffice.com.mx/sanremoOn/it/news/eventi/'+$('[name="url-it"]').val()+'.html', '_blank');
					}else{
						tools.notificacion('top', data.msg, 'success');
						tools.cargarPrincipal({url:data.url});
					}
					// window.location = data.url;
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
$('[name^="descripcion-"]').each(function(index, el) {
	text = $(el);
	text.summernote({
		height: 300, 
		toolbar: [
		    ['font', ['bold', 'italic', 'underline', 'clear']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['insert', ['link']],
		    ['view', ['codeview']],
		]
	}).on('summernote.change', function(customEvent, contents, $editable) {
		$('[name="'+$(this).attr('name')+'"]').val(contents);
		$('[name="'+$(this).attr('name')+'"]').html(contents);
    })
});

$('#findDir').on('click',function(){
	codeAddress();
});
var geocoder;
var map;
var marker;
function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(43.81596709999999, 7.7760567000000265);
  var mapOptions = {
    zoom: 8,
    center: latlng
  }
  map = new google.maps.Map(document.querySelector('.mapa'), mapOptions);
}
function codeAddress() {
  var address = $('[name="punto"]').val();
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {

      map.setCenter(results[0].geometry.location);
      marker.setMap(null);
      marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
          draggable:true
      });
		google.maps.event.addListener(marker,'drag',function(event) {
			$('[name="Lat"]').val(event.latLng.lat());
			$('[name="Long"]').val(event.latLng.lng());
			console.log(event.latLng.lat()+','+event.latLng.lng());
		});

		google.maps.event.addListener(marker,'dragend',function(event) {
			$('[name="Lat"]').val(event.latLng.lat());
			$('[name="Long"]').val(event.latLng.lng());
			console.log(event.latLng.lat()+','+event.latLng.lng());
		});
      $('[name="Lat"]').val(results[0].geometry.location.lat);
      $('[name="Long"]').val(results[0].geometry.location.lng);
      map.setZoom(15);
    } else {
      alert('No se encontro el punto: ' + status);
    }
  });
}
function cargarPunto(){
	console.log($('[name="Lat"]').val()+','+$('[name="Long"]').val());
	var centro = new google.maps.LatLng($('[name="Lat"]').val(),$('[name="Long"]').val());
	map.setCenter(centro);
	map.setZoom(15);
	marker = new google.maps.Marker({
		map: map,
		position: centro,
		draggable:true
	});
	google.maps.event.addListener(marker,'drag',function(event) {
		$('[name="Lat"]').val(event.latLng.lat());
		$('[name="Long"]').val(event.latLng.lng());
	});

	google.maps.event.addListener(marker,'dragend',function(event) {
		$('[name="Lat"]').val(event.latLng.lat());
		$('[name="Long"]').val(event.latLng.lng());
	});
}
initialize();
$(function() {
	cargarPunto();
});
$('[name="punto"]').keydown(function(event){
	if(event.keyCode == 13) {
		event.preventDefault();
		$('#findDir').click();
		return false;
	}
});
</script>

