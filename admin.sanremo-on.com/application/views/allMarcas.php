<div class="box">
  <div class="box-header">
    <h3 class="box-title">Marche</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?>marc/add" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nuova Brand</a>
  <?php if (count($Marcas) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Brand</th>
        <th>Data</th>
        <th>Azione</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($Marcas as $key => $value): ?>
        <tr>
          <td><?php echo $value->getNombre() ?></td>
          <td><?php echo $value->getCreado() ?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>marc/edit/<?php echo $value->getIdmarca() ?>" data-type="ajax" data-load="principal">Modifica</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>marc/borrar/<?php echo $value->getIdmarca() ?>" data-mensaje="Sei sicuro di voler eliminare il record?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>Nessun Marca scaricate</h2>
  <?php endif ?>
  </div><!-- /.box-body -->
</div>
<script>
tools.initLinkMagicos();
tools.initCondicion();
</script>
<style>
  table .img-responsive {
    border-radius: 50%;
    height: 50px;
}
</style>