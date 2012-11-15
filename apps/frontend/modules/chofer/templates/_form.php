<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('chofer/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?licencia='.$form->getObject()->getLicencia() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('chofer/index') ?>">Lista de Choferes</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'chofer/delete?licencia='.$form->getObject()->getLicencia(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['Nombre']->renderLabel() ?></th>
        <td>
          <?php echo $form['Nombre']->renderError() ?>
          <?php echo $form['Nombre'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Domicilio']->renderLabel() ?></th>
        <td>
          <?php echo $form['Domicilio']->renderError() ?>
          <?php echo $form['Domicilio'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Vencimiento_Lic']->renderLabel() ?></th>
        <td>
          <?php echo $form['Vencimiento_Lic']->renderError() ?>
          <?php echo $form['Vencimiento_Lic'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Clase']->renderLabel() ?></th>
        <td>
          <?php echo $form['Clase']->renderError() ?>
          <?php echo $form['Clase'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
