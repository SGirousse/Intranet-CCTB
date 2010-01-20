<?php

/**
 * accueil actions.
 *
 * @package    intranet-cctb
 * @subpackage accueil
 * @author     Sébastien MARCELLIN, Simeon GIROUSSE
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z  $
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
    $this->getUser()->setFlash('error', 'Ceci est la zone d\'affichage des messages flash "notice" et "error"'); 

	$user = new personneForm();
	$this->form = $user;

	if ($request->isMethod('post'))
	{
		$this->form->bind($request->getParameter('personne'));
		if ($this->form->isValid())
		{
			$this->form->save();
		}
	}
  }
}

?>
