<br><br>
<h1> Lista de Choferess</h1>

<table class="table table-striped table-bordered">
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Licencia</th>
      <th>Domicilio</th>
      <th>Vencimiento lic</th>
      <th>Clase</th>
      <th>Id</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($Choferess as $Choferes): ?>
    <tr>
      <td><?php echo $Choferes->getNombre() ?></td>
      <td><?php echo $Choferes->getLicencia() ?></td>
      <td><?php echo $Choferes->getDomicilio() ?></td>
      <td><?php echo $Choferes->getVencimientoLic() ?></td>
      <td><?php echo $Choferes->getClase() ?></td>
      <td><a href="<?php echo url_for('chofer/edit?id='.$Choferes->getId()) ?>"><?php echo $Choferes->getId() ?></a></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('chofer/new') ?>">New</a>
