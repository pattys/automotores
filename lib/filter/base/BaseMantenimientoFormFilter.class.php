<?php

/**
 * Mantenimiento filter form base class.
 *
 * @package    automotores
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseMantenimientoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Codigo_Mant'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Kilometraje'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Fecha_Service' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'Detalles'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Precio'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'Codigo_Mant'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Kilometraje'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'Fecha_Service' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'Detalles'      => new sfValidatorPass(array('required' => false)),
      'Precio'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('mantenimiento_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Mantenimiento';
  }

  public function getFields()
  {
    return array(
      'Id_Auto'       => 'ForeignKey',
      'Codigo_Mant'   => 'Number',
      'Kilometraje'   => 'Number',
      'Fecha_Service' => 'Date',
      'Detalles'      => 'Text',
      'Precio'        => 'Number',
    );
  }
}
