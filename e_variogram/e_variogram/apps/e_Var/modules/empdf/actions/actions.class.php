<?php

/**
* empdf actions.
*
* @package    eVar
* @subpackage empdf
* @author     Phuong Truong
* @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/
class empdfActions extends sfActions
{
  private function fitPdf($max, $min, $med, $fq, $tq) {
	$script_name = sfConfig::get('sf_lib_dir').'/r/mpdf.R';
	$rcmd = "Rscript $script_name ";
	$rcmd .= $max . ' ';
	$rcmd .= $min . ' ';
	$rcmd .= $med . ' ';
	$rcmd .= $fq . ' ';
	$rcmd .= $tq ;
	$results = array();
	exec($rcmd, $results);
	return array ('dist' => $results[0], 'par1' => $results[1], 'par2' => $results[2], 'lsq' => $results[3]); 	
  }
  private function pdffeeback($dist, $par1, $par2, $lsq)
  {
	$script_name = sfConfig::get('sf_lib_dir').'/r/fb.pdf.R';
	$rcmd = "Rscript $script_name ";
	$rcmd .= $dist . ' ';
	$rcmd .= $par1 . ' ';
	$rcmd .= $par2 . ' ';
	$rcmd .= $lsq ;
	$results = array();
	exec($rcmd, $results);
	return array('percentile' => $results[0], 'probability' => $results[1], 'p25' => $results[2], 'p75' => $results[3], 'p50' => $results[4], 'p10'=>$results[5], 'p90'=>$results[6])  ;	
  }
  private function poolingPdf()
  {
	$temp_q = Doctrine_Query::create()
	 ->select('*')
	 ->from('EQs u')
	 ->where('u.casestudy_id = ?', $this->getUser()->getAttribute('caseid'))
	 ->execute();
	$q = $temp_q;
	$max_tr = 'max=c(';
	$min_tr = 'min=c(';
	$dist_tr = 'dist=c(';
	$par1_tr = 'par1=c(';
	$par2_tr = 'par2=c(';
	$N = $temp_q->count(id);
	$i = 0;
	foreach($q as $q) {
	$i = $i+1;
	$max_tr  .= $q->max;
	$min_tr  .= $q->min;
	$dist_tr .= "'".$q->dist_name."'";
	$par1_tr .= $q->mean;
	$par2_tr .= $q->std;
	if ($i < $N){
	$max_tr  .=',';
	$min_tr  .=',';
	$dist_tr .=',';
	$par1_tr .=',';
	$par2_tr .=',';
	}
	}
	$max_tr  .=')';
	$min_tr  .=')';
	$dist_tr .=')';
	$par1_tr .=')';
	$par2_tr .=')';
	$all = '"all=list('.$max_tr.','.$min_tr.','.$par1_tr.','.$par2_tr.','.$dist_tr.',N.experts=c('.$N.'))"';	
	$b = $all;
	$script_name = sfConfig::get('sf_lib_dir').'/r/pooling.mpdf.R';
	$rcmd = "Rscript $script_name ";
	$rcmd .= $b;
	$results = array();
	exec($rcmd, $results);
	return array ('dist' => $results[0], 'par1' => $results[1], 'par2' => $results[2], 'lsq' => $results[3], 'min' =>$results[4], 'max' =>$results[5], 'Nexp'=>$results[6], 'fQ' =>$results[7], 'tQ' =>$results[8]); 	     
  } 
  private function calLags()
  {
	$script_name = sfConfig::get('sf_lib_dir').'/r/cal.lag.int.R';
	$rcmd        = "Rscript $script_name";
	$results = array();
	exec($rcmd, $results);
	return array('l1'=>$results[0], 'l2'=>$results[1], 'l3'=>$results[2], 'l4'=>$results[3], 'l5'=>$results[4], 'l6'=>$results[5], 'l7'=>$results[6]);	
  }
  public function executeBriefdoc()
  {
  }
  public function executeStudyarea()
  {
  } 
  public function executeNew(sfWebRequest $request)
  {
	$temp = Doctrine_Query::create()
	  ->select('*')
	  ->from('EQs u')
	  ->where('u.expert_id = ? AND u.casestudy_id = ?', array($this->getUser()->getAttribute('id'), $this->getUser()->getAttribute('caseid'))) 
	  ->fetchOne();
	if ($temp!=NULL){
	  $this->form = new EQsForm($temp);
	}else{
	  $this->form = new EQsForm();};
  }
  public function executeCreate(sfWebRequest $request)
  {
	$this->forward404Unless($request->isMethod(sfRequest::POST));
	$this->form = new EQsForm();
	$this->processForm($request, $this->form);
	$this->setTemplate('new');
  }
  public function executeEdit(sfWebRequest $request)
  {
	$this->forward404Unless($e_qs = Doctrine_Core::getTable('EQs')->find(array($request->getParameter('id'))), sprintf('Object e_qs does not exist (%s).', $request->getParameter('id')));
	$this->form = new EQsForm($e_qs);
	$feedback = $this-> pdffeeback($e_qs->getDist_name(), $e_qs->getMean(), $e_qs->getStd(), $e_qs->getLsq(), $e_qs->getId());
	$a = $feedback['percentile'];
	$b = $feedback['probability'];
	$c = $feedback['p25'];
	$d = $feedback['p75'];
	$g = $feedback['p50'];
	$h = $feedback['p10'];
	$l = $feedback['p90'];
	$e = $e_qs->getDist_name();
	$f = $e_qs->getMean();
	$m = $e_qs->getMed();
	$n = $e_qs->getFq();
	$o = $e_qs->getTq();
	$this -> pro = $b;
	$this -> per = $a;
	$this->getUser()->setAttribute('pro',$b);
	$this->getUser()->setAttribute('per',$a);
	$this -> p1  = $c;
	$this -> p2  = $d;
	$this -> p10 = $h;
	$this -> p90 = $l;
	$this -> jmed = $m;
	$this -> jfq = $n;
	$this -> jtq = $o;
	$this -> distname  = $e;
	$this -> median    = $g;
  }
  public function executeUpdate(sfWebRequest $request)
  {
	$this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
	$this->forward404Unless($e_qs = Doctrine_Core::getTable('EQs')->find(array($request->getParameter('id'))), sprintf('Object e_qs does not exist (%s).', $request->getParameter('id')));
	$this->form = new EQsForm($e_qs);
	$this->processForm($request, $this->form);
	$this->setTemplate('new');
  }
  public function executeDelete(sfWebRequest $request)
  {
	$request->checkCSRFProtection();
	$this->forward404Unless($e_qs = Doctrine_Core::getTable('EQs')->find(array($request->getParameter('id'))), sprintf('Object e_qs does not exist (%s).', $request->getParameter('id')));
	$e_qs->delete();
	$this->redirect('empdf/index');
  }
  public function executePoolmpdf()
  {
	$pooledmpdf = $this->poolingPdf();  
	$pname = $pooledmpdf['dist'];
	$ppar1 = $pooledmpdf['par1'];
	$ppar2 = $pooledmpdf['par2'];
	$plsq  = $pooledmpdf['lsq']; 
	$pmax  = $pooledmpdf['max'];
	$pmin  = $pooledmpdf['min'];  
	$Nexp  = $pooledmpdf['Nexp']; 
	$pfQ   = $pooledmpdf['fQ'];
	$ptQ   = $pooledmpdf['tQ'];
	$pooling = Doctrine_Core::getTable('Pmpdf')->findOneByCasestudy_id($this->getUser()->getAttribute('caseid'));
	if ($pooling!=NULL){
	  $pmpdf = Doctrine_Query::create()
		->select('*')
		->from('Pmpdf u')
		->where('u.id = ?', $pooling) 
		->fetchOne();
	}else{
	  $pmpdf = new Pmpdf();
	};
	$pmpdf->setMax($pmax);
	$pmpdf->setMin($pmin);
	$pmpdf->setDist_name($pname);
	$pmpdf->setMean($ppar1);
	$pmpdf->setStd($ppar2);
	$pmpdf->setLsq($plsq);
	$pmpdf->setN_exp($Nexp);
	$pmpdf->setFQ($pfQ);
	$pmpdf->setTQ($ptQ);
	$pmpdf->setCasestudy_id($this->getUser()->getAttribute('caseid'));
	$pmpdf->save();
	$feedback = $this-> pdffeeback($pname, $ppar1, $ppar2, $plsq); 
	$a = $feedback['percentile'];
	$b = $feedback['probability'];
	$c = $feedback['p25'];
	$d = $feedback['p75'];
	$g = $feedback['p50'];
	$temp_e = Doctrine_Query::create()
	  ->from('Experts');
	$this ->N2 = $temp_e->count(id);
	$this -> pro = $b;
	$this ->per = $a;
	$this -> N1 = $Nexp; 
	$this -> p1  = $c;
	$this -> p2  = $d;
	$this -> median = $g;
	$this -> distname  = $pname;
	$this -> epro = $this->getUser()->getAttribute('pro');
	$this -> eper = $this->getUser()->getAttribute('per');
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
	$e_qs = $form->save();
	$pdf = $this->fitPdf($e_qs->getMax(), $e_qs->getMin(), $e_qs->getMed(), $e_qs->getFq(), $e_qs->getTq());
	$name = $pdf['dist'];
	$par1 = $pdf['par1'];
	$par2 = $pdf['par2'];
	$lsq = $pdf['lsq'];
	$e_qs->setDist_name($name);
	$e_qs->setMean($par1);
	$e_qs->setStd($par2);
	$e_qs->setLsq($lsq);
	$e_qs->save();
	$feedback = $this-> pdffeeback($e_qs->getDist_name(), $e_qs->getMean(), $e_qs->getStd(), $e_qs->getLsq());
	$this->redirect('empdf/edit?id='.$e_qs->getId());
	}
  }
}
