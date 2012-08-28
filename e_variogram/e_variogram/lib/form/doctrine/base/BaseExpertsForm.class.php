<?php

/**
 * Experts form base class.
 *
 * @method Experts getObject() Returns the current form's model object
 *
 * @package    eVar
 * @subpackage form
 * @author     Phuong Truong
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseExpertsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'expert_name' => new sfWidgetFormInputText(),
      'username'    => new sfWidgetFormInputText(),
      'password'    => new sfWidgetFormInputPassword(),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'expert_name' => new sfValidatorString(array('max_length' => 255)),
      'username'    => new sfValidatorString(array('max_length' => 255)),
      'password'    => new sfValidatorString(array('max_length' => 255)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('experts[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Experts';
  }

}
