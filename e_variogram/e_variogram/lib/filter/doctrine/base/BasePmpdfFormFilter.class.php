<?php

/**
 * Pmpdf filter form base class.
 *
 * @package    eVar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePmpdfFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'max'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'min'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dist_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mean'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'std'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lsq'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'N_exp'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fQ'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tQ'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'casestudy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'max'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'min'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'dist_name'    => new sfValidatorPass(array('required' => false)),
      'mean'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'std'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lsq'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'N_exp'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fQ'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'tQ'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'casestudy_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Casestudy'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('pmpdf_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Pmpdf';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'max'          => 'Number',
      'min'          => 'Number',
      'dist_name'    => 'Text',
      'mean'         => 'Number',
      'std'          => 'Number',
      'lsq'          => 'Number',
      'N_exp'        => 'Number',
      'fQ'           => 'Number',
      'tQ'           => 'Number',
      'casestudy_id' => 'ForeignKey',
    );
  }
}
