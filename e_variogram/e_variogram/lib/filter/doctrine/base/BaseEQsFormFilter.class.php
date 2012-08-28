<?php

/**
 * EQs filter form base class.
 *
 * @package    eVar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseEQsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'max'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'min'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'med'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fQ'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tQ'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dist_name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'mean'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'std'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lsq'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'expert_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Experts'), 'add_empty' => true)),
      'casestudy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'), 'add_empty' => true)),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'max'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'min'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'med'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'fQ'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'tQ'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'dist_name'    => new sfValidatorPass(array('required' => false)),
      'mean'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'std'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lsq'          => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'expert_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Experts'), 'column' => 'id')),
      'casestudy_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Casestudy'), 'column' => 'id')),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('e_qs_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'EQs';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'max'          => 'Number',
      'min'          => 'Number',
      'med'          => 'Number',
      'fQ'           => 'Number',
      'tQ'           => 'Number',
      'dist_name'    => 'Text',
      'mean'         => 'Number',
      'std'          => 'Number',
      'lsq'          => 'Number',
      'expert_id'    => 'ForeignKey',
      'casestudy_id' => 'ForeignKey',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
