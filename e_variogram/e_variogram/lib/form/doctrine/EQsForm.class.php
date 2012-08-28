<?php

/**
 * EQs form.
 *
 * @package    e_variogram
 * @subpackage form
 * @author     Phuong Truong
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EQsForm extends BaseEQsForm
{
  public function configure()
  {
	  unset(
                $this ['dist_name'],  
				$this['mean'],       
                $this['std'],
				$this['lsq'],
				$this['created_at'],
                $this['updated_at'],
				$this['casestudy_id'],
				$this['expert_id'],
                $this['id']
            );
	  $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
	  new sfValidatorSchemaCompare('min', sfValidatorSchemaCompare::LESS_THAN, 'fQ', array(), array('invalid' => 'Inappropriate value: the minimum should be smaller than the first quartile')),
	  new sfValidatorSchemaCompare('fQ', sfValidatorSchemaCompare::LESS_THAN, 'med', array(), array('invalid' => 'Inappropriate value: the first quartile should be smaller than the median')),
	  new sfValidatorSchemaCompare('med', sfValidatorSchemaCompare::LESS_THAN, 'tQ', array(), array('invalid' => 'Inappropriate value: the median should be smaller than the third quartile')),
	  new sfValidatorSchemaCompare('tQ', sfValidatorSchemaCompare::LESS_THAN, 'max', array(), array('invalid' => 'Inappropriate value: the third quartile should be smaller than the maximum'))
	  )));
  }
}
