<div class="box">
  <div class="box-header">
    <h3 class="box-title">Notizie</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?><?php echo isset($micros) ? 'not/add/1' : 'not/add' ?>" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nuova Notizia</a>
  <?php if (count($Noticias) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Nome Microsito</th>
        <th>Titolo</th>
        <th>Data</th>
        <th>Azione</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($Noticias as $key => $value): ?>
        <tr>
          <td>
            <?php $a = json_decode($micro[$value->getMicrosite()]); ?>
            <?php echo $a->it ?>
          </td>
          <td>
            <?php $a = json_decode($value->getNombre()); ?>
            <?php echo $a->it ?>
          </td>
          <td>
            <?php echo $value->getCreado(); ?>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>not/edit/<?php echo $value->getIdnoticia() ?><?php echo isset($micros) ? '/1' : '' ?>" data-type="ajax" data-load="principal">Modifica</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>not/borrar/<?php echo $value->getIdnoticia() ?><?php echo isset($micros) ? '/1' : '' ?>" data-mensaje="Sei sicuro di voler eliminare il record?" data-condicion-ajax>Annulla</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>Nessun Notizia scaricate</h2>
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