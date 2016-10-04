<?php $h = array(-1=>'Invitado',0=>'Microsite',1=>'Administrador') ?>
<div class="box">
  <div class="box-header">
    <h3 class="box-title">Utenti Microsito</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Tipo Utente</th>
        <th>Username</th>
        <th>Data</th>
        <th>Azioni</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuariosMicrosite as $key => $value): ?>
        <tr>
          <td><?php echo $h[$value->getNivelusuario()] ?></td>
          <td><?php echo $value->getUsername() ?></td>
          <td><?php echo $value->getCreado() ?></td>
          <td>
            <a data-load="principal" data-type="ajax" href="<?php echo base_url() ?>admin/editar/0/<?php echo $value->getIduser() ?>" class="btn btn-info">Modifica</a>
            <a class="btn btn-danger" href="<?php echo base_url() ?>admin/borrar/<?php echo $value->getIduser() ?>" data-mensaje="Sei sicuro di voler eliminare il record?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Utenti Amministratore</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?>admin/addT1" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nuovo Amministratore</a>
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Tipo Utente</th>
        <th>Username</th>
        <th>Data</th>
        <th>Azioni</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuariosAdmin as $key => $value): ?>
        <tr>
          <td><?php echo $h[$value->getNivelusuario()] ?></td>
          <td><?php echo $value->getUsername() ?></td>
          <td><?php echo $value->getCreado() ?></td>
          <td>
            <a data-load="principal" data-type="ajax" href="<?php echo base_url() ?>admin/editar/1/<?php echo $value->getIduser() ?>" class="btn btn-info">Modifica</a>
            <a class="btn btn-danger" href="<?php echo base_url() ?>admin/borrar/<?php echo $value->getIduser() ?>" data-mensaje="Sei sicuro di voler eliminare il record?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Utenti Invitati</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?>admin/addT2" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nuovo Invitato</a>
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Tipo Utente</th>
        <th>Username</th>
        <th>Data</th>
        <th>Azioni</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuariosInvitados as $key => $value): ?>
        <tr>
          <td><?php echo $h[$value->getNivelusuario()] ?></td>
          <td><?php echo $value->getUsername() ?></td>
          <td><?php echo $value->getCreado() ?></td>
          <td>
            <a data-load="principal" data-type="ajax" href="<?php echo base_url() ?>admin/editar/-1/<?php echo $value->getIduser() ?>" class="btn btn-info">Modifica</a>
            <a class="btn btn-danger" href="<?php echo base_url() ?>admin/borrar/<?php echo $value->getIduser() ?>" data-mensaje="Sei sicuro di voler eliminare il record?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  </div><!-- /.box-body -->
</div>

<style>
  table .img-responsive {
    border-radius: 50%;
    height: 50px;
}
</style>
<script>
  tools.initLinkMagicos();
  tools.initCondicion();
</script>