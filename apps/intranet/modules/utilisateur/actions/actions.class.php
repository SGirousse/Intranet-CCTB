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
		$this->form = new PersonneForm();

		//on récupère les paramètres de la requête
		$parametres = $request->getParameter('personne');
		//on compte le nombre de champs des formulaires associés
		//nombre d'emails	
	       	$this->emailsNumber = count($parametres['newEmails']);
		//nombre de numéro de téléphone
		$this->numerosNumber = count($parametres['newPhones']);

		//si la méthode d'envoi est bien 'post' alors on continue les traitements
		if($request->isMethod('post'))
		{
			//on récupère les paramètres
			$this->form->bind($parametres);

			//si les paramètres sont valides
			if ($this->form->isValid())
			{
				//on sauve les informations
				$this->form->save();
				//on redirige l'utilisateur vers la page d'index du module utlisateur
				$this->redirect('utilisateur/index');
			}
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
