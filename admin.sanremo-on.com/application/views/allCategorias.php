<div class="box">
  <div class="box-header">
    <h3 class="box-title">Categorie</h3>
  </div><!-- /.box-header -->
  <div class="box-body">
    <a href="<?php echo base_url() ?>cat/add" data-type="ajax" data-load="principal" class="btn btn-default pull-right">Nuova Subcategoria</a>
  <?php if (count($categorias) > 0): ?>
    
  <table class="table table-bordered table-hover dataTable" id="example2">
    <thead>
      <tr>
        <th>Categoria Principale</th>
        <th>Categoria</th>
        <th>Data</th>
        <th>Azioni</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($categorias as $key => $value): ?>
        <tr>
          <td>
            <?php if ($value->getParent() != ''): ?>
              
              <?php $a = json_decode($padres[$value->getParent()]); ?>
              <?php echo $a->it ?>
            <?php else: ?>
              <?php $a = json_decode($value->getNombre()); ?>
              <?php echo $a->it ?>
              
            <?php endif ?>
          </td>
          <td>
            <?php $a = json_decode($value->getNombre()); ?>
            <?php echo $a->it ?>
          </td>
          <td><?php echo $value->getCreado() ?></td>
          <td>
          <?php if ($value->getParent() != ''): ?>
            <a class="btn btn-info" href="<?php echo base_url() ?>cat/edit/<?php echo $value->getIdcategoria() ?>" data-type="ajax" data-load="principal">Modifica</a>
            <a class="btn btn-danger"  href="<?php echo base_url() ?>cat/borrar/<?php echo $value->getIdcategoria() ?>" data-mensaje="Sei sicuro di voler eliminare il record ?" data-condicion-ajax>Elimina</a>
          <?php endif ?>
          </td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>
  <?php else: ?>
    <h2>Nessuna categoria scaricate</h2>
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