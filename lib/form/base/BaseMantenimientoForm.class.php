<?php

/**
 * Mantenimiento form base class.
 *
 * @method Mantenimiento getObject() Returns the current form's model object
 *
 * @package    automotores
 * @subpackage form
 * @author     Your name here
 */
abstract class BaseMantenimientoForm extends BaseFormPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Id_Auto'       => new sfWidgetFormInputHidden(),
      'Codigo_Mant'   => new sfWidgetFormInputText(),
      'Kilometraje'   => new sfWidgetFormInputText(),
      'Fecha_Service' => new sfWidgetFormDate(),
      'Detalles'      => new sfWidgetFormInputText(),
      'Precio'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'Id_Auto'       => new sfValidatorPropelChoice(array('model' => 'Autos', 'column' => 'Id', 'required' => false)),
      'Codigo_Mant'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'Kilometraje'   => new sfValidatorInteger(array('min' => -2147483648, 'max' => 2147483647)),
      'Fecha_Service' => new sfValidatorDate(),
      'Detalles'      => new sfValidatorString(array('max_length' => 500)),
      'Precio'        => new sfValidatorNumber(),
    ));

    $this->widgetSchema->setNameFormat('mantenimiento[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Mantenimiento';
  }


}
