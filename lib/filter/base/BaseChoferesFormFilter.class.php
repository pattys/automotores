<?php

/**
 * Choferes filter form base class.
 *
 * @package    automotores
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseChoferesFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Nombre'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Domicilio'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Vencimiento_Lic' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'Clase'           => new sfWidgetFormPropelChoice(array('model' => 'CategoriaAutos', 'add_empty' => true, 'key_method' => 'getClaseAuto')),
    ));

    $this->setValidators(array(
      'Nombre'          => new sfValidatorPass(array('required' => false)),
      'Domicilio'       => new sfValidatorPass(array('required' => false)),
      'Vencimiento_Lic' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDate(array('required' => false)))),
      'Clase'           => new sfValidatorPropelChoice(array('required' => false, 'model' => 'CategoriaAutos', 'column' => 'Clase_Auto')),
    ));

    $this->widgetSchema->setNameFormat('choferes_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Choferes';
  }

  public function getFields()
  {
    return array(
      'Nombre'          => 'Text',
      'Licencia'        => 'Number',
      'Domicilio'       => 'Text',
      'Vencimiento_Lic' => 'Date',
      'Clase'           => 'ForeignKey',
    );
  }
}
