<div class="box">
  <div class="box-header">
    <h3 class="box-title">Fondos</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?>index.php/backg/add2" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nueva Fondo</a>
  <?php if (count($backg) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Id</th>
        <th>Immagine</th>
      
        <th>Azioni</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($backg as $key => $value): ?>
        <tr>
          <td><?php echo $value->getIdbackg() ?></td>
          <td style="width:50%;"><img style="width:60%;" src="<?php echo base_url() ?>public/uploads/backg/<?php echo $value->getImgnormal() ?>"></td>
       
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>index.php/backg/edit/<?php echo $value->getIdbackg() ?>" data-type="ajax" data-load="principal">Modificare</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>index.php/backg/borrar/<?php echo $value->getIdbackg() ?>" data-mensaje="¿Esta seguro que quiere borra el registro?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>No tiene Fondos dadas de alta</h2>
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