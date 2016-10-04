<div class="box">
  <div class="box-header">
    <h3 class="box-title"> Offerte</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?><?php echo isset($micros) ? 'ofer/add/1' : 'ofer/add' ?>" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nuova Offerta </a>
  <?php if (count($Ofertas) > 0): ?>
    
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
      <?php foreach ($Ofertas as $key => $value): ?>
        <tr>
          <td>
            <?php $u = json_decode($value->getIdmicrosite()->getNombre()) ?>
            <?php echo $u->it ?>
          </td>
          <td>
            <?php $u = json_decode($value->getNombre()) ?>
            <?php echo $u->it ?>
          <td>
            <?php echo $value->getCreado() ?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>ofer/edit/<?php echo $value->getIdoferta() ?><?php echo isset($micros) ? '/1' : '' ?>" data-type="ajax" data-load="principal">Modifica</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>ofer/borrar/<?php echo $value->getIdoferta() ?><?php echo isset($micros) ? '/1' : '' ?>" data-mensaje="Sei sicuro di voler eliminare il record?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>Non ci sono offerte scaricate</h2>
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