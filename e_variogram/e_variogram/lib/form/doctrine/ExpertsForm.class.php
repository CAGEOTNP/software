<?php

/**
 * Experts form.
 *
 * @package    eVar
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ExpertsForm extends BaseExpertsForm
{
  public function configure()
  {
	  unset(
	  $this ['expert_id'],
	  $this ['expert_name'],
	  $this ['casestudy_id'],
	  $this ['created_at'],
	  $this ['updated_at']
	  );
  }
}
