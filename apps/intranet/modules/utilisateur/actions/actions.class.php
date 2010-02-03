<?php

/**
 * Utilisateur actions.
 *
 * @package    intranet-cctb
 * @subpackage utilisateur
 * @author     Sébastien MARCELLIN, Simeon GIROUSSE
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z  $
 */
class utilisateurActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
	public function executeIndex(sfWebRequest $request)
	{

	}

	/**
	 *execute AddUser()
	 *Affichage du formulaire d'ajout d'un utilisateur.
	 *Récupère les informations du formulaires pour exécuter la requête
	 *après avoir effectuer les vérifications nécessaires
	 * @param	sfWebRequest $request  A web request object

	 */
	public function executeAddUser(sfWebRequest $request)
	{
		//création d'un nouveau formulaire pour un utilisateur
		//partie 'Personne'
		$this->form = new PersonneForm();

		print_r($request->getParameter('personne'));

		$this->executeAddEmailForm($request);
		/*$number = intval($request->getParameter("num"));

		  if($personne = Doctrine::getTable('Personne')->find($number))
		 {
  	 		 $this->form = new PersonneForm($personne);
	 	 }else{
   			 $this->form = new PersonneForm(null);
 	 	 }

	 	$this->form->addEmail(1,'henry');

 		$this->renderPartial('addEmail',array('form' => $this->form, 'num' => 1));*/


		//si la méthode d'envoi est bien 'post' alors onc ontinue les traitements
		if($request->isMethod('post'))
		{
			//on récupère les paramètres
			$this->form->bind($request->getParameter('personne'));

			//si les paramètres sont valides
			if ($this->form->isValid())
			{
				//on sauve les informations
				$this->form->save();
				//on redirige l'utilisateur vers la page d'index du module utlisateur
				//$this->redirect('utilisateur/index');
			}/*else{
					$this->executeAddEmailForm($request);
			}*/
		}
	}

	public function executeAddEmailForm(sfWebRequest $request)
	{
	  //$this->forward404unless($request->isXmlHttpRequest());
	  $number = intval($request->getParameter("num"));

	  if($personne = Doctrine::getTable('Personne')->find($number))
	  {
  	 	 $form = new PersonneForm($personne);
	  }else{
   		 $form = new PersonneForm(null);
 	  }

 	 $form->addEmail($number);

 	 return $this->renderPartial('addEmail',array('form' => $form, 'num' => $number));
}
}
?>
