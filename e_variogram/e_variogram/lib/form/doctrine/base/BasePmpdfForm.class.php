<?php

/**
 * Pmpdf form base class.
 *
 * @method Pmpdf getObject() Returns the current form's model object
 *
 * @package    eVar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePmpdfForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'max'          => new sfWidgetFormInputText(),
      'min'          => new sfWidgetFormInputText(),
      'dist_name'    => new sfWidgetFormInputText(),
      'mean'         => new sfWidgetFormInputText(),
      'std'          => new sfWidgetFormInputText(),
      'lsq'          => new sfWidgetFormInputText(),
      'N_exp'        => new sfWidgetFormInputText(),
      'fQ'           => new sfWidgetFormInputText(),
      'tQ'           => new sfWidgetFormInputText(),
      'casestudy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'max'          => new sfValidatorNumber(),
      'min'          => new sfValidatorNumber(),
      'dist_name'    => new sfValidatorString(array('max_length' => 255)),
      'mean'         => new sfValidatorNumber(),
      'std'          => new sfValidatorNumber(),
      'lsq'          => new sfValidatorNumber(),
      'N_exp'        => new sfValidatorNumber(),
      'fQ'           => new sfValidatorNumber(),
      'tQ'           => new sfValidatorNumber(),
      'casestudy_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'))),
    ));

    $this->widgetSchema->setNameFormat('pmpdf[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pmpdf';
  }

}
