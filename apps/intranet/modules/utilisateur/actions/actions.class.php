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
  	* @param sfWebRequest $request A request object
  	*/
	public function executeIndex(sfWebRequest $request)
	{

	}

	/**
	 * Execute AddUser action
	 * Affichage du formulaire d'ajout d'un utilisateur.
	 * Récupère les informations du formulaires pour exécuter la requête
	 * après avoir effectuer les vérifications nécessaires
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
		//nombre d'adresses
		$this->adressesNumber = count($parametres['newAdress']);
		//nombre de fiche contact pro
		$this->contactsNumber = count($parametres['newContact']);

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
				//$this->redirect('utilisateur/index');
			}
		}
	}

	/**
	 * Execute AddGroup action
	 * Affichage du formulaire d'ajout d'un groupe
	 * Récupère les informations du formulaire pour exécuter la requête
	 * après avoir vérifié la validité des champs.
	 * @param	sfWebRequest $request	A web request object
	 */
/*	public function executeAddGroup(sfWebRequest $request)
	{
		//creation d'un nouveau formulaire pour un groupe
		$this->form = new TypeForm()

		//récupération des parametres de la requête dans la variable $parametres

		//si la méthode d'envoie est bien post on continue les traitements
		if($request->isMethod('post')
		{
			//récupération des paramètres pour l'ajout au formulaire
			$this->form->bind($parametres);

			//si le formulaire est valide
			if ($this->form->isValid())
			{	
				//sauvegarde des informations
				$this->form->save();
				//redirection de l'utilisateur
				$this->redirect('utilisateur/index');
			}
		}
	}*/
	
	/****	Fonctions d'ajout dynamique de champs	****/

	/**
	 * Fonction d'exécution d'ajout d'un champ d'email
	 * @param sfWebRequest $request
	 * @return addEmail partial
	 */
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


	/**
	 * Fonction d'exécution d'ajout d'un nouveau champs numéro de téléphone
	 * @param sfWebRequest $request
	 * @return addNumero partial
	 */
	public function executeAddNumeroForm(sfWebRequest $request)
	{
		//on récupère le nombre de numéro de téléphones déjà présents (envoyés par la fonction javascript)
		$number = intval($request->getParameter('num'));

		//on fait une requête sur la table 'personne' pour vérifier si l'on retrouve ce numéro
		//puis on assigne la 'personne' récupérée à $personne
		if ($personne = Doctrine::getTable('Personne')->find($number))
		{
			//si on le retrouve on est en mode édition et l'on crée un formulaire en lui transmettant les informations de la personne
			$form = new PersonneForm($personne);
		}else{
			//sinon on crée un formulaire vide
			$form = new PersonneForm(null);
		}

		//on ajoute un champs téléphone à ce formulaire
		$form->addNumero($number);

		//on retourne un partiel
		return $this->renderPartial('addNumero', array('form' => $form, 'num' => $number));

	}

	/**
	 * Fonction d'exécution d'ajout des nouveaux champs d'adresses
	 * @param sfWebRequest $request
	 * return addAdresse partial
	 */
	public function executeAddAdresseForm(sfWebRequest $request)
	{
		//on récupère le nombre de formulaire d'adresse déjà présents
		$number = intval($request->getParameter('num'));

		//on fait une requête pour vérifier si cette personne existe déjà
		//si c'est le cas on assigne cette valeur à personne
		if ($personne = Doctrine::getTable('Personne')->find($number))
		{
			//on se retrouve alors dans un mode d'édition et on transmet les parametres de la personne au formulaire
			$form = new PersonneForm($personne);
		}else{
			//sinon c'est un formulaire 'simple'
			$form = new PersonneForm(null);
		}

		//on ajoute un formulaire d'adresse à l'aide de la fonction addAdresse
		$form->addAdresse($number);

		//on retourne le partiel pour l'affichage
		return $this->renderPartial( 'addAdresse', array('form' => $form, 'num' => $number ));
	}

	/**
	 * Fonction d'exécution d'ajout des nouveaux champs d'adresses
	 * @param sfWebRequest $request
	 * return addAdresse partial
	 */
	public function executeAddContactForm(sfWebRequest $request)
	{
		//on récupère le nombre de formulaire d'adresse déjà présents
		$number = intval($request->getParameter('num'));

		//on fait une requête pour vérifier si cette personne existe déjà
		//si c'est le cas on assigne cette valeur à personne
		if ($personne = Doctrine::getTable('Personne')->find($number))
		{
			//on se retrouve alors dans un mode d'édition et on transmet les parametres de la personne au formulaire
			$form = new PersonneForm($personne);
		}else{
			//sinon c'est un formulaire 'simple'
			$form = new PersonneForm(null);
		}

		//on ajoute un formulaire d'adresse à l'aide de la fonction addAdresse
		$form->addContactPro($number);

		//on retourne le partiel pour l'affichage
		return $this->renderPartial( 'addContact', array('form' => $form, 'num' => $number ));
	}
}
?>
