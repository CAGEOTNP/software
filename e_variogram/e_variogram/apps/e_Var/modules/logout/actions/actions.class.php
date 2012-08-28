
<?php

/**
 * logout actions.
 *
 * @package    eVar
 * @subpackage logout
 * @author     Phuong Truong
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class logoutActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
   if ($this->getUser()->isAuthenticated())
    {
      $this->getUser()->setAuthenticated(false);
    }
  }
}
