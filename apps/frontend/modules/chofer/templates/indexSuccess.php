<br><br>
<h1>Lista de Choferes</h1>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Licencia</th>
      <th>Domicilio</th>
      <th>Vencimiento lic</th>
      <th>Clase</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Choferess as $Choferes): ?>
    <tr>
      <td><?php echo $Choferes->getNombre() ?></td>
      <td><a href="<?php echo url_for('chofer/edit?licencia='.$Choferes->getLicencia()) ?>"><?php echo $Choferes->getLicencia() ?></a></td>
      <td><?php echo $Choferes->getDomicilio() ?></td>
      <td><?php echo $Choferes->getVencimientoLic() ?></td>
      <td><?php echo $Choferes->getClase() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('chofer/new') ?>" class="btn btn-primary">Nuevo Chofer</a>
