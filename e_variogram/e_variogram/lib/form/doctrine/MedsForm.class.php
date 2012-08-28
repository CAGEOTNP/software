<?php

/**
 * Meds form.
 *
 * @package    eVar
 * @subpackage form
 * @author     Phuong Truong
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MedsForm extends BaseMedsForm
{
  public function configure()
  {
   unset(
			$this['created_at'],
			$this['updated_at'],
			$this['model'],
			$this['nugget'],
			$this['psill'],
			$this['prange'],
			$this['kappa'],
			$this['id']
		);
	 $t = Doctrine_Query::create()
		->select('*')
		->from('Lags u')
		->where('u.casestudy_id = ?', $this->getOption('caseid'))
		->fetchOne();
	$lag = array();
	$lag[1] = 'At distance '.round($t['lag_one'],0).' meter apart';
	$lag[2] = 'At distance '.round($t['lag_two'],0).' meter apart';
	$lag[3] = 'At distance '.round($t['lag_three'],0).' meter apart';
	$lag[4] = 'At distance '.round($t['lag_four'],0).' meter apart';
	$lag[5] = 'At distance '.round($t['lag_five'],0).' meter apart';
	$lag[6] = 'At distance '.round($t['lag_six'],0).' meter apart';
	$lag[7] = 'At distance '.round($t['lag_seven'],0).' meter apart';
	$this->widgetSchema->setLabels(array(
	  'lag_one'    => $lag[1],
	  'lag_two'    => $lag[2],
	  'lag_three'  => $lag[3],
	  'lag_four'   => $lag[4],
	  'lag_five'   => $lag[5],
	  'lag_six'    => $lag[6],
	  'lag_seven'  => $lag[7],
	  ));
	$temp = Doctrine_Query::create()
          ->select('*')
		  ->from  ('Pmpdf u')
		  ->where ('u.casestudy_id = ?', $this->getOption('caseid')) 
		  ->fetchOne();
	$t_dist = $temp->dist_name; 
    $this->dist = $t_dist;
	$fQ = $temp->fQ;
	$tQ = $temp->tQ;
    
	$con = 0.709*($tQ - $fQ);
	$log_con = pow(($tQ/$fQ),0.709);
	
	if ($t_dist == 'Normal')
	{
	$this->setValidators(array(
    'lag_one'    => new sfValidatorNumber(array('max'=>$con, 'min'=>0)), 
    'lag_two'    => new sfValidatorNumber(array('max'=>$con, 'min'=>0)),
    'lag_three'  => new sfValidatorNumber(array('max'=>$con, 'min'=>0)),
    'lag_four'   => new sfValidatorNumber(array('max'=>$con, 'min'=>0)),
	'lag_five'   => new sfValidatorNumber(array('max'=>$con, 'min'=>0)),
    'lag_six'    => new sfValidatorNumber(array('max'=>$con, 'min'=>0)),
    'lag_seven'  => new sfValidatorNumber(array('max'=>$con, 'min'=>0)),
	));
	};
	
	if ($t_dist == 'Lognormal')
	{
	$this->setValidators(array(
    'lag_one'    => new sfValidatorNumber(array('max'=>$log_con, 'min'=>1)), 
    'lag_two'    => new sfValidatorNumber(array('max'=>$log_con, 'min'=>1)),
    'lag_three'  => new sfValidatorNumber(array('max'=>$log_con, 'min'=>1)),
    'lag_four'   => new sfValidatorNumber(array('max'=>$log_con, 'min'=>1)),
	'lag_five'   => new sfValidatorNumber(array('max'=>$log_con, 'min'=>1)),
    'lag_six'    => new sfValidatorNumber(array('max'=>$log_con, 'min'=>1)),
    'lag_seven'  => new sfValidatorNumber(array('max'=>$log_con, 'min'=>1)),
	));
	};
  $this->validatorSchema->setPostValidator(new sfValidatorAnd(array(
  new sfValidatorSchemaCompare('lag_one', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'lag_two', array(), array('invalid' => 'Inappropriate value')),
  new sfValidatorSchemaCompare('lag_two', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'lag_three', array(), array('invalid' => 'Inappropriate value')),
  new sfValidatorSchemaCompare('lag_three', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'lag_four', array(), array('invalid' => 'Inappropriate value')),
  new sfValidatorSchemaCompare('lag_four', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'lag_five', array(), array('invalid' => 'Inappropriate value')),
  new sfValidatorSchemaCompare('lag_five', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'lag_six', array(), array('invalid' => 'Inappropriate value')),
  new sfValidatorSchemaCompare('lag_six', sfValidatorSchemaCompare::LESS_THAN_EQUAL, 'lag_seven', array(), array('invalid' => 'Inappropriate value'))
  )));
  }
}
