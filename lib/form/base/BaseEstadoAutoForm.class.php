<?php

/**
 * EstadoAuto form base class.
 *
 * @method EstadoAuto getObject() Returns the current form's model object
 *
 * @package    automotores
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseEstadoAutoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Auto'           => new sfWidgetFormInputHidden(),
      'Conductor'      => new sfWidgetFormPropelChoice(array('model' => 'Choferes', 'add_empty' => true, 'key_method' => 'getLicencia')),
      'Disponibilidad' => new sfWidgetFormInputText(),
      'Destino'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'Auto'           => new sfValidatorPropelChoice(array('model' => 'Autos', 'column' => 'Id', 'required' => false)),
      'Conductor'      => new sfValidatorPropelChoice(array('model' => 'Choferes', 'column' => 'Licencia', 'required' => false)),
      'Disponibilidad' => new sfValidatorString(),
      'Destino'        => new sfValidatorString(array('max_length' => 50, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('estado_auto[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'EstadoAuto';
  }


}
