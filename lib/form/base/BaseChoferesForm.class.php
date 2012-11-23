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
      'Licencia'        => new sfWidgetFormInputText(),
      'Domicilio'       => new sfWidgetFormInputText(),
      'Vencimiento_Lic' => new sfWidgetFormDate(),
      'Clase'           => new sfWidgetFormPropelChoice(array('model' => 'CategoriaAutos', 'add_empty' => false, 'key_method' => 'getClaseAuto')),
      'Id'              => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'Nombre'          => new sfValidatorString(array('max_length' => 50)),
      'Licencia'        => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'Domicilio'       => new sfValidatorString(array('max_length' => 50)),
      'Vencimiento_Lic' => new sfValidatorDate(),
      'Clase'           => new sfValidatorPropelChoice(array('model' => 'CategoriaAutos', 'column' => 'Clase_Auto')),
      'Id'              => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'Choferes', 'column' => array('Licencia')))
    );

    $this->widgetSchema->setNameFormat('choferes[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Choferes';
  }


}
