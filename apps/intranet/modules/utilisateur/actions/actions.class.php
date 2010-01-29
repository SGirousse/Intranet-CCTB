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
	public function executeAddUser($request)
	{
		//création d'un nouveau formulaire pour un utilisateur
		//partie 'Personne'
		$this->formulaire = new PersonneForm();

		//si la méthode d'envoi est bien 'post' alors onc ontinue les traitements
		if($request->isMethod('post'))
		{
			//on récupère les paramètres
			$this->formulaire->bind($request->getParameter('personne'));

			//si les paramètres sont valides
			if ($this->formulaire->isValid())
			{
				//on sauve les informations
				$this->formulaire->save();
				//on redirige l'utilisateur vers la page d'index du module utlisateur
				$this->redirect('utilisateur/index');
			}
		}
	}
}
?>
