<?php

/**
 * casestudy actions.
 *
 * @package    eVar
 * @subpackage casestudy
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class casestudyActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
    public function executeCasestudy(sfWebRequest $request)
  {
    $this->form = new CasestudyForm();
    $eid= $this->getUser()->getAttribute('id');
	$exp = Doctrine_Core::getTable('Experts')->find(array($eid));
   if ($request->isMethod('post'))
	{
	$temp = $request->getParameter('casestudy');
	$case = $temp['case_name'];
	if ($case == 0)
	{
    $exp -> setCasestudy_Id(1);
    $this->getUser()->setAttribute('caseid',1);
	$exp -> save();
    $this->redirect('empdf/studyarea');
	}
	};
  }
}
