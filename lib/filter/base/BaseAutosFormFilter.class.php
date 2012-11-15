<?php

/**
 * Autos filter form base class.
 *
 * @package    automotores
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseAutosFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Modelo'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'color'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'anio_auto'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Patente'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Imagen'      => new sfWidgetFormFilterInput(),
      'chasis'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Venc_Seguro' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'Categoria'   => new sfWidgetFormPropelChoice(array('model' => 'CategoriaAutos', 'add_empty' => true, 'key_method' => 'getClaseAuto')),
    ));

    $this->setValidators(array(
      'Modelo'      => new sfValidatorPass(array('required' => false)),
      'color'       => new sfValidatorPass(array('required' => false)),
      'anio_auto'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Patente'     => new sfValidatorPass(array('required' => false)),
      'Imagen'      => new sfValidatorPass(array('required' => false)),
      'chasis'      => new sfValidatorPass(array('required' => false)),
      'Venc_Seguro' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'Categoria'   => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CategoriaAutos', 'column' => 'Clase_Auto')),
    ));

    $this->widgetSchema->setNameFormat('autos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Autos';
  }

  public function getFields()
  {
    return array(
      'Modelo'      => 'Text',
      'color'       => 'Text',
      'anio_auto'   => 'Number',
      'Id'          => 'Number',
      'Patente'     => 'Text',
      'Imagen'      => 'Text',
      'chasis'      => 'Text',
      'Venc_Seguro' => 'Date',
      'Categoria'   => 'ForeignKey',
    );
  }
}
