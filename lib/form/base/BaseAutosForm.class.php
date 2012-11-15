<?php

/**
 * Autos form base class.
 *
 * @method Autos getObject() Returns the current form's model object
 *
 * @package    automotores
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseAutosForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Modelo'      => new sfWidgetFormInputText(),
      'color'       => new sfWidgetFormInputText(),
      'anio_auto'   => new sfWidgetFormInputText(),
      'Id'          => new sfWidgetFormInputHidden(),
      'Patente'     => new sfWidgetFormInputText(),
      'Imagen'      => new sfWidgetFormInputText(),
      'chasis'      => new sfWidgetFormInputText(),
      'Venc_Seguro' => new sfWidgetFormDate(),
      'Categoria'   => new sfWidgetFormPropelChoice(array('model' => 'CategoriaAutos', 'add_empty' => false, 'key_method' => 'getClaseAuto')),
    ));

    $this->setValidators(array(
      'Modelo'      => new sfValidatorString(array('max_length' => 80)),
      'color'       => new sfValidatorString(array('max_length' => 30)),
      'anio_auto'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'Id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->getId()), 'empty_value' => $this->getObject()->getId(), 'required' => false)),
      'Patente'     => new sfValidatorString(array('max_length' => 15)),
      'Imagen'      => new sfValidatorPass(array('required' => false)),
      'chasis'      => new sfValidatorString(array('max_length' => 17)),
      'Venc_Seguro' => new sfValidatorDate(),
      'Categoria'   => new sfValidatorPropelChoice(array('model' => 'CategoriaAutos', 'column' => 'Clase_Auto')),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorPropelUnique(array('model' => 'Autos', 'column' => array('Patente'))),
        new sfValidatorPropelUnique(array('model' => 'Autos', 'column' => array('chasis'))),
      ))
    );

    $this->widgetSchema->setNameFormat('autos[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Autos';
  }


}
