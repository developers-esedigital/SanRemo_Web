<div class="box">
  <div class="box-header">
    <h3 class="box-title">Eventi</h3>

  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?>evt/add" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nuovo Evento</a>
  <?php if (count($Eventos) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
          <th>Nome Microsito</th>
        <th>Nome</th>
        <th>Data</th>
        <th>Azione</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($Eventos as $key => $value): ?>
        <tr>
             <td>
            <?php $a = json_decode($micro[$value->getMicrosite()]); ?>
            <?php echo $a->it ?>
          </td>
          <td>
            <?php $a = json_decode($value->getNombre()); ?>
            <?php echo $a->it ?>
          </td>
          <td><?php echo $value->getCreado() ?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>evt/edit/<?php echo $value->getIdEvento() ?>" data-type="ajax" data-load="principal">Modifica</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>evt/borrar/<?php echo $value->getIdEvento() ?>" data-mensaje="¿Esta seguro que quiere borra el registro?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>Nessun evento scaricate </h2>
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