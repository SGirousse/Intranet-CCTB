<?php

/**
 * accueil actions.
 *
 * @package    intranet-cctb
 * @subpackage accueil
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class accueilActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {
    /*
    	Ici se trouve la première action éxecutée par notre application
    */
    $this->getUser()->setCulture('fr');

    //$this->forward('default', 'module');
  }
}
