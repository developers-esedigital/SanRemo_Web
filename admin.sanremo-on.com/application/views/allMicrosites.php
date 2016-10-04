
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Micrositi</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <div class="row">
      <div class="col-sm-3">
        <input type="text" class="form-control" name="NombreMicrosite" placeholder ="Nome del Microsito" id="nombreMicrosite">
      </div>
      <div class="col-sm-3">
          <select name="parent" data-chosen="1" data-placeholder="Seleziona Categoria" id="" class="form-control" required>
            <option value="">Tutti</option>
            <?php foreach ($categorias as $key => $value): ?>
            <?php $u = json_decode($value) ?>
            <option value="<?php echo $u->it?>"><?php echo $u->it?></option>
          <?php endforeach ?>
      </select>
      </div>
      <div class="col-sm-3"></div>
      <div class="col-sm-3"><a data-toggle="modal" data-target="#newUser" class="btn btn-default pull-right">Nuovo Microsito</a>
      </div>
      
    </div>
    
    
  <?php if (count($microsites) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Categorie</th>
        <th>Data</th>
        <th>Azione</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($microsites as $key => $value): ?>
        <tr>
          <td>
            <?php $u = json_decode($value->getNombre()) ?>
              <?php echo $u->it ?>
          </td>
          <?php $v = $value->getCategoriafk();
          $r = $v[0]; ?>
          <?php $u = json_decode($r->getNombre()) ?>
          <td><?php echo $u->it?></td>
          <td><?php echo $value->getCreado() ?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>micro/edit/<?php echo $value->getIdmicrosite() ?>" data-type="ajax" data-load="principal">Modifica</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>micro/borrar/<?php echo $value->getIdmicrosite() ?>" data-mensaje="Sei sicuro di voler eliminare il record?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h4 class="danger">Nessun Microsites scaricate</h4 class="danger">
  <?php endif ?>
  </div><!-- /.box-body -->
</div>

<!-- MODALES -->

<div class="modal fade" id="newUser">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="<?php echo base_url() ?>micro/createUser" method="post" enctype="multipart/form-data" id="register">
        <input type="hidden" name="registro" value="1">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Crea un utente per il Microsito</h4>
      </div>
      <div class="modal-body">
          <input type="hidden" name="nivelUsuario" value="0">
      <div class="form-group has-feedback">
        <input type="file" class="form-control" name="foto" placeholder="Seleziona Fotooto" required/>
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
        <input type="password" class="form-control" placeholder="Repeti Password" name="repassword" required/>
        <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Salva</button>
      </div>
    </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- MODALES -->

<script>
tools.initLinkMagicos();
tools.initCondicion();
// $('[data-chosen="1"]').chosen({
//   allow_single_deselect: true,
//   width:"100%"
// });

$('input[name="foto"]').fileinput({
  showUpload: false,
  browseClass: "btn btn-primary",
  language: 'es',
  allowedFileExtensions: ['jpg', 'png', 'gif'],
  previewFileIcon: "<i class='glyphicon glyphicon-king'></i>"
});

$('input[name="repassword"]').on('change', function() {
  if ($('input[name="password"]').val() != $('input[name="repassword"]').val()) {
    tools.notificacion('top', 'El password no coincide', 'alert');
    $('input[name="repassword"]').focus();
    $('input[name="repassword"]').val('');

  }
});


$('#register input[name="email"]').on('change', function() {
  var elem = $(this);
  $.ajax({
      url: 'admin/getUserByEmail',
      type: 'POST',
      dataType: 'json',
      data: {
        email: elem.val()
      },
      async: true
    })
    .done(function(data, textStatus, xhr) {
      if (data) {
        tools.notificacion('top', 'Existe un usuario con el email: '+elem.val(), 'alert');
        elem.val('');
        setTimeout(elem.focus(),0);
      }
    });
});
$('#register').on('submit', function(evt) {
  evt.preventDefault();
  if ($('input[name="password"]').val() != $('input[name="repassword"]').val()) {
    tools.notificacion('top', 'El password no coincide', 'alert');
    $('input[name="repassword"]').val('');
    $.ajax({
        url: 'admin/getUserByEmail',
        type: 'POST',
        dataType: 'json',
        data: {
          email: $(this).val()
        },
        async: true
      })
      .done(function(data, textStatus, xhr) {
        console.log(data);
        if (data) {
          tools.notificacion('top', 'Existe un usuario con ese email', 'alert');
          return false;
        }
      });
    return false;
  }
  var postData = new FormData();
  var files = $('input[name="foto"]').prop('files')[0];
  postData.append('image', files);



  $('input[type="email"],input[type="text"],input[type="password"],input[type="hidden"]').each(function(index, el) {
    postData.append(el.name, el.value.trim());
  });

  $.ajax({
    url: $('#register').attr('action'),
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
        tools.notificacion('top', 'Ya hay un usuario registrado con ese email, por favor agregue otro o solicite un nuevo password con el administrador.', 'alert');
      }
    },
    error: function(jqXHR, textStatus, errorThrown) {
      tools.notificacion('top', 'Error al procesar intente más tarde', 'alert');
      //if fails     
    }
  });
  /*$.post(,{contenttype:false, processdata:false,data : data}, function(data, textStatus, xhr) {
    console.log(data);
  });*/
  return false;
})

// var td = new tablaDinamica({
// });
tablaDinamica.init({
  tabla:'#example2',
  cuadroBuscar:'#nombreMicrosite',
  categorias:'[name="parent"]'
});

</script>
<style>
  table .img-responsive {
    border-radius: 50%;
    height: 50px;
}
</style>