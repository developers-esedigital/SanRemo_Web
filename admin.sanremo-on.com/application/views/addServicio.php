<!DOCTYPE html>
<div class="register-box">
	<div class="register-box-body" ng-controller="DatepickerDemoCtrl">
		<p class="login-box-msg">Nuovo Servizio</p>
		<form action="<?php echo $post ?>" method="post" enctype="multipart/form-data" id="registerMarca">
		<div class="form-group has-feedback">
			<select name="tipo" id="" class="form-control">
				<option value="1">Parking</option>
				<option value="2">Bancomat </option>
				<!--<option value="3">Centro informazione</option>-->
			</select>
		</div>
		<div class="form-group has-feedback">
			<div class="mapa"></div>
			<div class="input-group">
				<input type="text" class="form-control" placeholder="Cerca in Google Maps" name="punto" required/>
		      <span class="input-group-btn">
		        <button class="btn btn-default" type="button" id="findDir">Cerca</button>
		      </span>
		    </div>
			<input type="hidden" name="Lat">
			<input type="hidden" name="Long">
		</div>
		<div class="form-group has-feedback">
			<input type="text" class="form-control" placeholder="Indirizzo" name="direccion" required/>
		</div>
		<div class="form-group has-feedback">
			<input type="text" class="form-control" placeholder="Nome" name="nombre" required/>
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

<style>
	.mapa {
	    height: 250px;
	    width: 100%;
	}
</style>

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


$('#findDir').on('click',function(){
	codeAddress();
});
var geocoder;
var map;
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
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location,
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
      $('[name="Lat"]').val(results[0].geometry.location.A);
      $('[name="Long"]').val(results[0].geometry.location.F);
      console.log(results[0].geometry.location.A);
      map.setZoom(15);
    } else {
      alert('No se encontro el punto: ' + status);
    }
  });
}
initialize();
$('[name="punto"]').keydown(function(event){
	if(event.keyCode == 13) {
		event.preventDefault();
		$('#findDir').click();
		return false;
	}
});

</script>

