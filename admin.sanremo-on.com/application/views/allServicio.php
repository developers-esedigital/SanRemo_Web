<div class="box">
  <div class="box-header">
    <h3 class="box-title">Servizi</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?>servicios/add" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nuovo Servizio</a>
  <?php if (count($servicios) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Nome</th>
        <th>Indirizzo</th>
        <th>Azione</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($servicios as $key => $value): ?>
        <tr>
          <td><?php echo $value->getNombre() ?></td>
          <td><?php echo $value->getDireccion() ?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>servicios/edit/<?php echo $value->getIdservicio() ?>" data-type="ajax" data-load="principal">Modifica</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>servicios/borrar/<?php echo $value->getIdservicio() ?>" data-mensaje="Sei sicuro di voler eliminare il record?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>Nessun Servizio</h2>
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