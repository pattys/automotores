<?php

/**
 * Usuarios filter form base class.
 *
 * @package    automotores
 * @subpackage filter
 * @author     Your name here
 */
abstract class BaseUsuariosFormFilter extends BaseFormFilterPropel
{
  public function setup()
  {
    $this->setWidgets(array(
      'Nombre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Contrasenia' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'Cargo'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'Nombre'      => new sfValidatorPass(array('required' => false)),
      'Contrasenia' => new sfValidatorPass(array('required' => false)),
      'Cargo'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('usuarios_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    parent::setup();
  }

  public function getModelName()
  {
    return 'Usuarios';
  }

  public function getFields()
  {
    return array(
      'Nombre'      => 'Text',
      'Contrasenia' => 'Text',
      'Cargo'       => 'Text',
      'id'          => 'Number',
    );
  }
}
