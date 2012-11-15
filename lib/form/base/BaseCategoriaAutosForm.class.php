<?php

/**
 * CategoriaAutos form base class.
 *
 * @method CategoriaAutos getObject() Returns the current form's model object
 *
 * @package    automotores
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseCategoriaAutosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Id'         => new sfWidgetFormInputHidden(),
      'Tipo_Auto'  => new sfWidgetFormInputText(),
      'Clase_Auto' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'Id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'Tipo_Auto'  => new sfValidatorString(array('max_length' => 30)),
      'Clase_Auto' => new sfValidatorString(),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorPropelUnique(array('model' => 'CategoriaAutos', 'column' => array('Clase_Auto')))
    );

    $this->widgetSchema->setNameFormat('categoria_autos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'CategoriaAutos';
  }


}
