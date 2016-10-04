<div class="register-box">
	<div class="register-box-body" ng-controller="DatepickerDemoCtrl">
		<p class="login-box-msg"> Modifica Utente</p>
		<form action="register" method="post" enctype="multipart/form-data" id="register">
			<input type="hidden" name="iduser" value="<?php echo $user->getIduser() ?>">
			<input type="hidden" name="urlPost" value="<?php echo $post ?>">
      <input type="hidden" name="microuser" value="1">
			<div class="form-group has-feedback">
				<input type="text" class="form-control" placeholder="username" value="<?php echo $user->getUsername() ?>" name="username" required/>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="email" readonly class="form-control" value="<?php echo $user->getEmail() ?>" placeholder="Email" name="email" required/>
				<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" placeholder="Password" value="" name="password" required/>
				<span class="glyphicon glyphicon-lock form-control-feedback"></span>
			</div>
			<div class="form-group has-feedback">
				<input type="password" class="form-control" value="" placeholder="Ripeti Password" name="repassword" required/>
				<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
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
	$('input[name="repassword"]').on('change', function() {
  if ($('input[name="password"]').val() != $('input[name="repassword"]').val()) {
    tools.notificacion('top', 'El password no coincide', 'alert');
    $('input[name="repassword"]').focus();
    $('input[name="repassword"]').val('');

  }
});


// $('#register input[name="email"]').on('change', function() {
//   var elem = $(this);
//   $.ajax({
//       url: 'admin/getUserByEmail',
//       type: 'POST',
//       dataType: 'json',
//       data: {
//         email: elem.val()
//       },
//       async: true
//     })
//     .done(function(data, textStatus, xhr) {
//       if (data) {
//         tools.notificacion('top', 'Existe un usuario con el email: '+elem.val(), 'alert');
//         elem.val('');
//         setTimeout(elem.focus(),0);
//       }
//     });
// });
$('#register').on('submit', function(evt) {
  evt.preventDefault();
  if ($('input[name="password"]').val() != $('input[name="repassword"]').val()) {
    tools.notificacion('top', 'El password no coincide', 'alert');
    $('input[name="repassword"]').val('');
    // $.ajax({
    //     url: 'admin/getUserByEmail',
    //     type: 'POST',
    //     dataType: 'json',
    //     data: {
    //       email: $(this).val()
    //     },
    //     async: true
    //   })
    //   .done(function(data, textStatus, xhr) {
    //     console.log(data);
    //     if (data) {
    //       tools.notificacion('top', 'Existe un usuario con ese email', 'alert');
    //       return false;
    //     }
    //   });
    return false;
  }
  var postData = new FormData();
  // var files = $('input[name="foto"]').prop('files')[0];
  // postData.append('image', files);



  $('input[type="email"],input[type="text"],input[type="password"],input[type="hidden"]').each(function(index, el) {
    postData.append(el.name, el.value.trim());
  });

  $.ajax({
    url: $('[name="urlPost"]').val(),
    type: "POST",
    data: postData,
    processData: false,
    contentType: false,
    success: function(data, textStatus, jqXHR) {
      console.log(data);
      if (typeof(data) == 'object') {
        if (data.code == 200) {
          $('#newUser').modal('hide');
          setTimeout(function() {
            tools.cargarPrincipal({url:data.url});
          }, 500);
        } else {
          tools.notificacion('top', data.msg, 'alert');
        }
      } else {
        tools.notificacion('top', 'L´indirizzo email è già stato registrato. Inserisci un nuovo indirizzo email', 'alert');
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      tools.notificacion('top', 'Siamo spiacenti si è verificato un errore, riprovi più tardi', 'alert');
      //if fails     
    }
  });
  /*$.post(,{contenttype:false, processdata:false,data : data}, function(data, textStatus, xhr) {
    console.log(data);
  });*/
  return false;
})
</script>