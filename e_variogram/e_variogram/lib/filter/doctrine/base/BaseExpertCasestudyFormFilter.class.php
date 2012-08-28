<?php

/**
 * ExpertCasestudy filter form base class.
 *
 * @package    eVar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseExpertCasestudyFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'expert_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Experts'), 'add_empty' => true)),
      'casestudy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'expert_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Experts'), 'column' => 'id')),
      'casestudy_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Casestudy'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('expert_casestudy_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ExpertCasestudy';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'expert_id'    => 'ForeignKey',
      'casestudy_id' => 'ForeignKey',
    );
  }
}
