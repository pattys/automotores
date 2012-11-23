<?php

/**
 * EstadoAuto filter form base class.
 *
 * @package    automotores
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseEstadoAutoFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Conductor'      => new sfWidgetFormPropelChoice(array('model' => 'Choferes', 'add_empty' => true, 'key_method' => 'getLicencia')),
      'Disponibilidad' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Destino'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'Conductor'      => new sfValidatorPropelChoice(array('required' => false, 'model' => 'Choferes', 'column' => 'Licencia')),
      'Disponibilidad' => new sfValidatorPass(array('required' => false)),
      'Destino'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_auto_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoAuto';
  }

  public function getFields()
  {
    return array(
      'Auto'           => 'ForeignKey',
      'Conductor'      => 'ForeignKey',
      'Disponibilidad' => 'Text',
      'Destino'        => 'Text',
    );
  }
}
