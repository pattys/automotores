<?php

/**
 * Choferes form base class.
 *
 * @method Choferes getObject() Returns the current form's model object
 *
 * @package    automotores
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseChoferesForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Nombre'          => new sfWidgetFormInputText(),
      'Licencia'        => new sfWidgetFormInputHidden(),
      'Domicilio'       => new sfWidgetFormInputText(),
      'Vencimiento_Lic' => new sfWidgetFormDate(),
      'Clase'           => new sfWidgetFormPropelChoice(array('model' => 'CategoriaAutos', 'add_empty' => false, 'key_method' => 'getClaseAuto')),
    ));

    $this->setValidators(array(
      'Nombre'          => new sfValidatorString(array('max_length' => 50)),
      'Licencia'        => new sfValidatorChoice(array('choices' => array($this->getObject()->getLicencia()), 'empty_value' => $this->getObject()->getLicencia(), 'required' => false)),
      'Domicilio'       => new sfValidatorString(array('max_length' => 50)),
      'Vencimiento_Lic' => new sfValidatorDate(),
      'Clase'           => new sfValidatorPropelChoice(array('model' => 'CategoriaAutos', 'column' => 'Clase_Auto')),
    ));

    $this->widgetSchema->setNameFormat('choferes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Choferes';
  }


}
