<?php

/**
 * CategoriaAutos filter form base class.
 *
 * @package    automotores
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseCategoriaAutosFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Tipo_Auto'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Clase_Auto' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'Tipo_Auto'  => new sfValidatorPass(array('required' => false)),
      'Clase_Auto' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('categoria_autos_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategoriaAutos';
  }

  public function getFields()
  {
    return array(
      'Id'         => 'Number',
      'Tipo_Auto'  => 'Text',
      'Clase_Auto' => 'Text',
    );
  }
}
