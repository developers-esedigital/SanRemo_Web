

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Sliders</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?>index.php/backg/index" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Fondo</a>
    <a href="<?php echo base_url() ?>index.php/slid/add" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nueva Slider</a>
  <?php if (count($sliders) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Id</th>
        <th>Immagine</th>
        <th>Stato</th>
        <th>Azioni</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($sliders as $key => $value): ?>
        <tr>
          <td><?php echo $value->getIdslider() ?></td>
          <td><img src="<?php echo base_url() ?>public/uploads/sliders/<?php echo $value->getImgnormal() ?>"></td>
          <td><?php echo $value->getEstatus()== 1 ? 'Attivo' : 'Disattivo'?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>index.php/slid/edit/<?php echo $value->getIdslider() ?>" data-type="ajax" data-load="principal">Modificare</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>index.php/slid/borrar/<?php echo $value->getIdslider() ?>" data-mensaje="¿Esta seguro que quiere borra el registro?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>No tiene Sliders dadas de alta</h2>
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