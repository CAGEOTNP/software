<?php

/**
 * Lags form base class.
 *
 * @method Lags getObject() Returns the current form's model object
 *
 * @package    eVar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseLagsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'lag_one'      => new sfWidgetFormInputText(),
      'lag_two'      => new sfWidgetFormInputText(),
      'lag_three'    => new sfWidgetFormInputText(),
      'lag_four'     => new sfWidgetFormInputText(),
      'lag_five'     => new sfWidgetFormInputText(),
      'lag_six'      => new sfWidgetFormInputText(),
      'lag_seven'    => new sfWidgetFormInputText(),
      'casestudy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'lag_one'      => new sfValidatorNumber(),
      'lag_two'      => new sfValidatorNumber(),
      'lag_three'    => new sfValidatorNumber(),
      'lag_four'     => new sfValidatorNumber(),
      'lag_five'     => new sfValidatorNumber(),
      'lag_six'      => new sfValidatorNumber(),
      'lag_seven'    => new sfValidatorNumber(),
      'casestudy_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'))),
    ));

    $this->widgetSchema->setNameFormat('lags[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Lags';
  }

}
