<?php use_stylesheets_for_form($form) ?>
<?php use_javascripts_for_form($form) ?>

<form action="<?php echo url_for('auto/'.($form->getObject()->isNew() ? 'create' : 'update').(!$form->getObject()->isNew() ? '?id='.$form->getObject()->getId() : '')) ?>" method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>
<?php if (!$form->getObject()->isNew()): ?>
<input type="hidden" name="sf_method" value="put" />
<?php endif; ?>
  <table>
    <tfoot>
      <tr>
        <td colspan="2">
          <?php echo $form->renderHiddenFields(false) ?>
          &nbsp;<a href="<?php echo url_for('auto/index') ?>">Ver lista</a>
          <?php if (!$form->getObject()->isNew()): ?>
            &nbsp;<?php echo link_to('Borrar', 'auto/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Are you sure?')) ?>
          <?php endif; ?>
          <input type="submit" value="Guardar" />
        </td>
      </tr>
    </tfoot>
    <tbody>
      <?php echo $form->renderGlobalErrors() ?>
      <tr>
        <th><?php echo $form['Modelo']->renderLabel() ?></th>
        <td>
          <?php echo $form['Modelo']->renderError() ?>
          <?php echo $form['Modelo'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['color']->renderLabel() ?></th>
        <td>
          <?php echo $form['color']->renderError() ?>
          <?php echo $form['color'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['anio_auto']->renderLabel() ?></th>
        <td>
          <?php echo $form['anio_auto']->renderError() ?>
          <?php echo $form['anio_auto'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Patente']->renderLabel() ?></th>
        <td>
          <?php echo $form['Patente']->renderError() ?>
          <?php echo $form['Patente'] ?>
        </td>
      </tr>
      <tr>
        <!--<th><?php echo $form['Imagen']->renderLabel() ?></th>
        <td>
          <?php echo $form['Imagen']->renderError() ?>
          <?php echo $form['Imagen'] ?>
        </td>-->
      </tr>
      <tr>
        <th><?php echo $form['chasis']->renderLabel() ?></th>
        <td>
          <?php echo $form['chasis']->renderError() ?>
          <?php echo $form['chasis'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Venc_Seguro']->renderLabel() ?></th>
        <td>
          <?php echo $form['Venc_Seguro']->renderError() ?>
          <?php echo $form['Venc_Seguro'] ?>
        </td>
      </tr>
      <tr>
        <th><?php echo $form['Categoria']->renderLabel() ?></th>
        <td>
          <?php echo $form['Categoria']->renderError() ?>
          <?php echo $form['Categoria'] ?>
        </td>
      </tr>
    </tbody>
  </table>
</form>
