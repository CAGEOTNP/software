<?php

/**
 * e_semivar actions.
 *
 * @package    eVar
 * @subpackage e_semivar
 * @author     Truong Phuong
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class e_semivarActions extends sfActions
{
  private function calLags()
  {
	$script_name = sfConfig::get('sf_lib_dir').'/r/cal.lag.int.R';
	$rcmd        = "Rscript $script_name";
	$results     = array();
	exec($rcmd, $results);
	return array('l1'=>$results[0], 'l2'=>$results[1], 'l3'=>$results[2], 'l4'=>$results[3], 'l5'=>$results[4], 'l6'=>$results[5], 'l7'=>$results[6]);	
  }
  private function fitVariogram($lag1, $lag2, $lag3, $lag4, $lag5, $lag6, $lag7, $mean, $std, $distname)   {
	$script_name = sfConfig::get('sf_lib_dir').'/r/variogram.fitting.R';
	$rcmd = "Rscript $script_name ";
  	$rcmd .= $lag1.' ';
  	$rcmd .= $lag2.' ';
  	$rcmd .= $lag3.' ';
  	$rcmd .= $lag4.' ';
  	$rcmd .= $lag5.' ';
  	$rcmd .= $lag6.' ';
  	$rcmd .= $lag7.' ';
	$rcmd .= $mean.' ';
  	$rcmd .= $std.' ';
  	$rcmd .= $distname;
	$results = array();
	exec($rcmd, $results);
	return array('model'=>$results[1], 'nugget'=>$results[2], 'psill'=>$results[3], 'range'=>$results[4], 'kappa'=>$results[5], 'distance'=>$results[6], 'sim'=>$results[7], 'ncol'=>$results[8], 'err'=>$results[9]);	
  }
  private function PoolVariogram(){
	$temp_m = Doctrine_Query::create()
             ->select('*')
             ->from('Meds u')
			 ->where('u.casestudy_id = ?', $this->getUser()->getAttribute('caseid'))
			 ->execute();  
	$mlgone   = array();
    $mlgtwo   = array();
    $mlgthree = array();
    $mlgfour  = array();
    $mlgfive  = array();		 
	$mlgsix   = array();
    $mlgseven = array();
	$N=0;
	foreach($temp_m as $temp_m){
	$N=$N+1;
	$mlgone[]   = $temp_m->lag_one;
	$mlgtwo[]   = $temp_m->lag_two;
	$mlgthree[] = $temp_m->lag_three;
	$mlgfour[]  = $temp_m->lag_four;
	$mlgfive[]  = $temp_m->lag_five;
	$mlgsix[]   = $temp_m->lag_six;
	$mlgseven[] = $temp_m->lag_seven;
	}
	$pmlgone   = (array_sum($mlgone))/$N;
    $pmlgtwo   = (array_sum($mlgtwo))/$N;
    $pmlgthree = (array_sum($mlgthree))/$N;
    $pmlgfour  = (array_sum($mlgfour))/$N;
    $pmlgfive  = (array_sum($mlgfive))/$N;		 
	$pmlgsix   = (array_sum($mlgsix))/$N;
    $pmlgseven = (array_sum($mlgseven))/$N;
  	$temp = Doctrine_Query::create()
		  ->select('*')
		  ->from('Pmpdf u')
     	  ->where('u.casestudy_id = ?', $this->getUser()->getAttribute('caseid'))
		  ->fetchOne();
	$mean = $temp->mean;
	$std  = $temp->std;
	$dist = $temp->dist_name;
	$poolVariogram = $this->fitVariogram($pmlgone, $pmlgtwo, $pmlgthree, $pmlgfour, $pmlgfive, $pmlgsix, $pmlgseven, $mean, $std, $dist); 
	$model = $poolVariogram['model'];
	$nug   = $poolVariogram['nugget'];
	$psill = $poolVariogram['psill'];
	$r     = $poolVariogram['range'];
	$k     = $poolVariogram['kappa'];
	$d     = $poolVariogram['distance'];
	$s     = $poolVariogram['sim'];
	$nc    = $poolVariogram['ncol'];
	$pooling = Doctrine_Core::getTable('Poolvariogram')->findOneByCasestudy_id($this->getUser()->getAttribute('caseid'));
	if ($pooling!=NULL){
	  $pvari = Doctrine_Query::create()
		->select('*')
		->from('Poolvariogram u')
		->where('u.id = ?', $pooling) 
		->fetchOne();
	}else{
	  $pvari = new Poolvariogram();
	};
	$pvari->setLag_one($pmlgone);
	$pvari->setLag_two($pmlgtwo);
	$pvari->setLag_three($pmlgthree);
	$pvari->setLag_four($pmlgfour);
	$pvari->setLag_five($pmlgfive);
	$pvari->setLag_six($pmlgsix);
	$pvari->setLag_seven($pmlgseven);
	$pvari->setModel($model);
	$pvari->setNugget($nug);
	$pvari->setPsill($psill);
	$pvari->setPrange($r);
	$pvari->setKappa($k);
	$pvari->setN_exp($N);
	$pvari->setCasestudy_id($this->getUser()->getAttribute('caseid'));
	$pvari->save();
	$temp_e = Doctrine_Query::create()
		   ->from('Experts');
    $N2 = $temp_e->count(id);
  return array('Nexpert'=>$N, 'allExpert'=>$N2, 'pdistance'=>$d, 'psimulation'=>$s, 'col'=>$nc);	
  }
  public function executeIndex()
  {
   $temp = Doctrine_Query::create()
		->select('*')
		->from('Pmpdf u')
		->where('u.casestudy_id = ?', $this->getUser()->getAttribute('caseid')) 
		->fetchOne();
    $this->max = $temp->max;
	$this->min = $temp->min;
	$this->mean = $temp->mean;
	$this->std = $temp->std;
	$this->dist = $temp->dist_name;
  }
  public function executeNew(sfWebRequest $request)
  {
   $lags = $this->calLags();
   $lag1 = $lags['l1'];
   $lag2 = $lags['l2'];
   $lag3 = $lags['l3'];
   $lag4 = $lags['l4'];
   $lag5 = $lags['l5'];
   $lag6 = $lags['l6'];
   $lag7 = $lags['l7'];
   $caseid = $this->getUser()->getAttribute('caseid');
   $con = Doctrine_Core::getTable('Lags')->findOneByCasestudy_id($this->getUser()->getAttribute('caseid'));
	if ($con!=NULL){
	 $newlags = Doctrine_Query::create()
		      ->select('*')
		      ->from('Lags u')
		      ->where('u.id = ?', $con) 
		      ->fetchOne();
    }else{
     $newlags = new Lags();
    };
   $newlags -> setLag_one($lag1);
   $newlags -> setLag_two($lag2);
   $newlags -> setLag_three($lag3);
   $newlags -> setLag_four($lag4);
   $newlags -> setLag_five($lag5);
   $newlags -> setLag_six($lag6);
   $newlags -> setLag_seven($lag7);
   $newlags -> setCasestudy_id($caseid);
   $newlags -> save(); 
	$temp = Doctrine_Query::create()
		  ->select('*')
		  ->from('Meds u')
		  ->where('u.expert_id = ? AND u.casestudy_id = ?', array($this->getUser()->getAttribute('id'), $this->getUser()->getAttribute('caseid'))) 
		  ->fetchOne();
	if ($temp!=NULL){
	$this->form = new MedsForm($temp, array('caseid'=>$this->getUser()->getAttribute('caseid')));
	}else{
	$this->form = new MedsForm(null,array('caseid'=>$this->getUser()->getAttribute('caseid')));};
	$temp = Doctrine_Query::create()
		  ->select('*')
		  ->from('Pmpdf u')
		  ->where('u.casestudy_id=?', $this->getUser()->getAttribute('caseid'))  
		  ->fetchOne();
	$this->dist = $temp->dist_name;
	$cid = $this->getUser()->getAttribute('caseid');
	$this-> caseid = $cid;
  }
  public function executeStudyarea()
  {
  }
  public function executeBriefdoc()
  {
  }
  public function executeCreate(sfWebRequest $request)
  {
	$temp = Doctrine_Query::create()
		  ->select('*')
		  ->from('Pmpdf u')
		  ->where('u.casestudy_id=?', $this->getUser()->getAttribute('caseid'))  
		  ->fetchOne();
    $this->dist = $temp->dist_name;

	$this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new MedsForm(null,array('caseid'=>$this->getUser()->getAttribute('caseid')));

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($meds = Doctrine_Core::getTable('Meds')->find(array($request->getParameter('id'))), sprintf('Object meds does not exist (%s).', $request->getParameter('id')));
    $this->form = new MedsForm($meds,array('caseid'=>$this->getUser()->getAttribute('caseid')));
	$temp = Doctrine_Query::create()
		  ->select('*')
		  ->from('Pmpdf u')
		  ->where('u.casestudy_id=?', $this->getUser()->getAttribute('caseid'))  
		  ->fetchOne();
	$mean = $temp->mean;
	$std  = $temp->std;
	$dist = $temp->dist_name;
	$this->dist = $dist;
	$variogram = $this->fitVariogram($meds->getLag_one(), $meds->getLag_two(), $meds->getLag_three(), $meds->getLag_four(), $meds->getLag_five(), $meds->getLag_six(), $meds->getLag_seven(), $mean, $std, $dist);
	$this ->pdist = $variogram['distance'];
	$this ->psim  = $variogram['sim'];
    $this ->pncol = $variogram['ncol'];
	$cid = $this->getUser()->getAttribute('caseid');
	$this-> caseid = $cid;
    $this ->err = $variogram['err'];

  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($meds = Doctrine_Core::getTable('Meds')->find(array($request->getParameter('id'))), sprintf('Object meds does not exist (%s).', $request->getParameter('id')));
	$temp = Doctrine_Query::create()
	  ->select('*')
	  ->from('Pmpdf u')
	  ->where('u.casestudy_id=?', $this->getUser()->getAttribute('caseid'))  
	  ->fetchOne();
    $this->dist = $temp->dist_name;
	$this->form = new MedsForm($meds,array('caseid'=>$this->getUser()->getAttribute('caseid')));
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  public function executePoolvar(){
	$meds = Doctrine_Query::create()
	  ->select('*')
	  ->from('Meds u')
	  ->where('u.expert_id = ? AND u.casestudy_id = ?', array($this->getUser()->getAttribute('id'), $this->getUser()->getAttribute('caseid'))) 
	  ->fetchOne();
	$temp = Doctrine_Query::create()
		  ->select('*')
		  ->from('Pmpdf u')
		  ->where('u.casestudy_id=?', $this->getUser()->getAttribute('caseid'))  
		  ->fetchOne();
	$mean = $temp->mean;
	$std  = $temp->std;
	$dist = $temp->dist_name;
	$variogram = $this->fitVariogram($meds->lag_one, $meds->lag_two, $meds->lag_three, $meds->lag_four, $meds->lag_five, $meds->lag_six, $meds->lag_seven, $mean, $std, $dist);
	$this ->epdist = $variogram['distance'];
	$this ->epsim  = $variogram['sim'];
	$pvgm = $this ->PoolVariogram(); 
	$this ->Nexp     = $pvgm['Nexpert'];
	$this ->allE     = $pvgm['allExpert'];
	$this ->pdist    = $pvgm['pdistance'];
	$this ->psim     = $pvgm['psimulation'];
    $this ->pncol    = $pvgm['col'];
  }
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
	 if ($form->isNew()) {
		$form->getObject()->setExpert_id($this->getUser()->getAttribute('id'));
        $form->getObject()->setCasestudy_id($this->getUser()->getAttribute('caseid'));
     }
	$meds = $form->save();
	$temp = Doctrine_Query::create()
		  ->select('*')
		  ->from('Pmpdf u')
		  ->where('u.casestudy_id=?', $this->getUser()->getAttribute('caseid'))  
		  ->fetchOne();
	$mean = $temp->mean;
	$std  = $temp->std;
	$dist = $temp->dist_name;

	$variogram = $this->fitVariogram($meds->getLag_one(), $meds->getLag_two(), $meds->getLag_three(), $meds->getLag_four(), $meds->getLag_five(), $meds->getLag_six(), $meds->getLag_seven(), $mean, $std, $dist);
	$error = $variogram['err'];
	if ($error == 0){
	  $model = $variogram['model'];
	  $nug   = $variogram['nugget'];
	  $psill = $variogram['psill'];
	  $r     = $variogram['range'];
	  $k     = $variogram['kappa'];
	  $meds->setModel($model);
	  $meds->setNugget($nug);
	  $meds->setPsill($psill);
	  $meds->setPrange($r);
	  $meds->setKappa($k);
	  $meds->save();}
	  $this->redirect('e_semivar/edit?id='.$meds->getId());
	 }
  }
}
