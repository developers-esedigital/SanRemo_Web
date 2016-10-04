<div class="box">
  <div class="box-header">
    <h3 class="box-title">Utenti</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Immagine</th>
        <th>Email</th>
        <th>Nome</th>
        <th>Azione</th>

      </tr>
    </thead>
    <tbody>
      <?php foreach ($usuarios as $key => $value): ?>
        <tr>
          <td><img src="<?php echo base_url() ?>public/uploads/<?php echo $value->getFoto() ?>" alt="" class="img-responsive"></td>
          <td><?php echo $value->getEmail() ?></td>
          <td><?php echo $value->getNombre() ?></td>
          <td><a href="<?php echo base_url() ?>admin/borrar/<?php echo $value->getIduser() ?>">Elimina</a></td>
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