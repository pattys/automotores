<br><br>
<h1>Lista de Autos</h1>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Id</th>
      <th>Modelo</th>
      <th>Color</th>
      <th>Anio auto</th>
      <th>Patente</th>
      <th>Chasis</th>
      <th>Venc seguro</th>
      <th>Categoria</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Autoss as $Autos): ?>
    <tr>
      <td><a href="<?php echo url_for('auto/edit?id='.$Autos->getId()) ?>"><?php echo $Autos->getId() ?></a></td>
      <td><?php echo $Autos->getModelo() ?></td>
      <td><?php echo $Autos->getColor() ?></td>
      <td><?php echo $Autos->getAnioAuto() ?></td>
      <td><?php echo $Autos->getPatente() ?></td>
      <td><?php echo $Autos->getChasis() ?></td>
      <td><?php echo $Autos->getVencSeguro() ?></td>
      <td><?php echo $Autos->getCategoria() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('auto/new') ?>"class="btn btn-inverse">Nuevo Auto</a>
