

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Sliders Txt</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <!-- <a href="<?php echo base_url() ?>index.php/backg/index" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Fondo</a> -->
    <a href="<?php echo base_url() ?>index.php/texto/add" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nueva Slider Txt</a>
  <?php 
  if (count($sliders) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Id</th>
        <th>Titulo</th>
        <th>Boton</th>
        <th>Url</th>
        <th>Stato</th>
        <th>Azioni</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($sliders as $key => $value):

      //print_r($value->idtexto); ?>
        <tr>
          <td><?php echo $value->idtexto; ?></td>
          <td><?php echo $value->titulo; ?></td>
          <td><?php echo $value->tboton; ?></td>
          <td><?php echo $value->turl; ?></td>
          <td><?php echo $value->estatus== 1 ? 'Attivo' : 'Disattivo'?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>index.php/texto/edit/<?php echo $value->idtexto; ?>" data-type="ajax" data-load="principal">Modificare</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>index.php/texto/borrar/<?php echo $value->idtexto; ?>" data-mensaje="¿Esta seguro que quiere borra el registro?" data-condicion-ajax>Elimina</a>
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