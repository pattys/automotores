<?php

/**
 * Usuarios form base class.
 *
 * @method Usuarios getObject() Returns the current form's model object
 *
 * @package    automotores
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseUsuariosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Nombre'      => new sfWidgetFormInputText(),
      'Contrasenia' => new sfWidgetFormInputText(),
      'Cargo'       => new sfWidgetFormInputText(),
      'id'          => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'Nombre'      => new sfValidatorString(array('max_length' => 50)),
      'Contrasenia' => new sfValidatorString(array('max_length' => 15)),
      'Cargo'       => new sfValidatorString(array('max_length' => 30)),
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuarios[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuarios';
  }


}
