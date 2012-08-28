<?php

/**
 * EQs form base class.
 *
 * @method EQs getObject() Returns the current form's model object
 *
 * @package    eVar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseEQsForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'min'          => new sfWidgetFormInputText(),
      'max'          => new sfWidgetFormInputText(),
      'med'          => new sfWidgetFormInputText(),
      'fQ'           => new sfWidgetFormInputText(),
      'tQ'           => new sfWidgetFormInputText(),
      'dist_name'    => new sfWidgetFormInputText(),
      'mean'         => new sfWidgetFormInputText(),
      'std'          => new sfWidgetFormInputText(),
      'lsq'          => new sfWidgetFormInputText(),
      'expert_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Experts'), 'add_empty' => false)),
      'casestudy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'), 'add_empty' => false)),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'max'          => new sfValidatorNumber(),
      'min'          => new sfValidatorNumber(),
      'med'          => new sfValidatorNumber(),
      'fQ'           => new sfValidatorNumber(),
      'tQ'           => new sfValidatorNumber(),
      'dist_name'    => new sfValidatorString(array('max_length' => 255)),
      'mean'         => new sfValidatorNumber(),
      'std'          => new sfValidatorNumber(),
      'lsq'          => new sfValidatorNumber(),
      'expert_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Experts'))),
      'casestudy_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'))),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('e_qs[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EQs';
  }

}
