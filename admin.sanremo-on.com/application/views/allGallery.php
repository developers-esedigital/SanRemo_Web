

<div class="box">
  <div class="box-header">
    <h3 class="box-title">Gallery</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
<!--     <a href="<?php echo base_url() ?>index.php/backg/index" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Fondo</a>
 -->    
 <a href="<?php echo base_url() ?>index.php/gall/add" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nueva Gallery</a>
  <?php if (count($gallerys) > 0): ?>
    
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
      <?php foreach ($gallerys as $key => $value): ?>
        <tr>
          <td><?php echo $value->getIdgallery() ?></td>
          <td style="width:50%;"><img style="width:30%;" src="<?php echo base_url() ?>public/uploads/gallery/<?php echo $value->getImgn() ?>"></td>
          <td><?php echo $value->getEstatus()== 1 ? 'Attivo' : 'Disattivo'?></td>
          <td>
            <a class="btn btn-info" href="<?php echo base_url() ?>index.php/gall/edit/<?php echo $value->getIdgallery() ?>" data-type="ajax" data-load="principal">Modificare</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>index.php/gall/borrar/<?php echo $value->getIdgallery() ?>" data-mensaje="¿Esta seguro que quiere borra el registro?" data-condicion-ajax>Elimina</a>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>No tiene Gallery dadas de alta</h2>
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