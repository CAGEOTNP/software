<?php

/**
 * login actions.
 *
 * @package    eVar
 * @subpackage login
 * @author     Phuong Truong
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class loginActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
  $this->form = new ExpertsForm();
  
  if ($request->isMethod('post'))
	{
	$temp = $request->getParameter('experts');
	$username = $temp['username'];
	$password = $temp['password'];
	$user = Doctrine_Query::create()
		  ->select('u.id,u.password')
		  ->from('Experts u')
		  ->where('u.username = ?', $username)
		  ->limit(1)
		  ->fetchOne();
  	if ($user && $user->password === $password){
	 if (!$this->getUser()->isAuthenticated()){
	  $this->getUser()->setAuthenticated(true);
	  $this->getUser()->addCredential('user');
	 };
	 $id = $user->id;
	 $this->getUser()->setAttribute('id',$id);
	 $this->redirect('casestudy/casestudy');
	}
	}
  }
}
