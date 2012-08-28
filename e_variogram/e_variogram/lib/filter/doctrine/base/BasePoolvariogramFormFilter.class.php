<?php

/**
 * Poolvariogram filter form base class.
 *
 * @package    eVar
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePoolvariogramFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'lag_one'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lag_two'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lag_three'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lag_four'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lag_five'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lag_six'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'lag_seven'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'model'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nugget'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'psill'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prange'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'kappa'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'N_exp'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'casestudy_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Casestudy'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'lag_one'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lag_two'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lag_three'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lag_four'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lag_five'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lag_six'      => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lag_seven'    => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'model'        => new sfValidatorPass(array('required' => false)),
      'nugget'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'psill'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'prange'       => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'kappa'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'N_exp'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'casestudy_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Casestudy'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('poolvariogram_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Poolvariogram';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'lag_one'      => 'Number',
      'lag_two'      => 'Number',
      'lag_three'    => 'Number',
      'lag_four'     => 'Number',
      'lag_five'     => 'Number',
      'lag_six'      => 'Number',
      'lag_seven'    => 'Number',
      'model'        => 'Text',
      'nugget'       => 'Number',
      'psill'        => 'Number',
      'prange'       => 'Number',
      'kappa'        => 'Number',
      'N_exp'        => 'Number',
      'casestudy_id' => 'ForeignKey',
    );
  }
}
