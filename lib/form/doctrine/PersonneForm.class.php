<?php

/**
 * Personne form.
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PersonneForm extends BasePersonneForm
{
	/**
	 * Fonction de configuration du formulaire de base de 'personne'
	 */
	public function configure()
  	{
		unset($this['id']);

		//on lie le formulaire à d'autres sous-formulaires en créant des objets.
		//Cet objet sera en fait une collection d'objet (dont le nombre est
		//définis par défaut avec la variable size)
		//Puis en appelant la fonction embedForm et en lui passant les paramètres
		//du nouveau formulaire et du formulaire principal

		//Formulaire de mail
		$form = new EmailCollectionForm(null, array(
			'personne' => $this->getObject(),
			'size' => 1,
		));
		$this->embedForm('newEmails', $form);
		

		//Formulaire de téléphone
		$form = new TelephoneCollectionForm(null, array(
			'personne' => $this->getObject(),
			'size' => 1,
		));
		$this->embedForm('newPhones', $form);

		//Formulaire d'adresse
		$form = new AdresseCollectionForm(null, array(
			'personne' => $this->getObject(),
			'size' => 1,
		));
		$this->embedForm('newAdress', $form);

		//Formulaire de fiche de contact pro
		$form = new ContactProCollectionForm(null, array(
			'personne' => $this->getObject(),
			'size' => 1,		
		));
		$this->embedForm('newContacts', $form);

		//assignation de widget particulières au formulaire personne
		//on traitera les widgets une par une et non dans un tableau global pour éviter d'avoir à redéfinir toutes les widgets
		$this->setWidget('nom', new sfWidgetFormInputText() );
		$this->setWidget('prenom', new sfWidgetFormInputText() );
		$this->setWidget('civ', new sfWidgetFormInputText() );
		//date_naissance
		//$this->setWidget('photo', new sfWidgetFormInputFile() );
		//sf_guard_user_id

		//personnalisation des labels
		$this->widgetSchema->setLabel('prenom','Prénom');
		$this->widgetSchema->setLabel('civ','Civilité');
		$this->widgetSchema->setLabel('date_naissance','Date de naissance');
		$this->widgetSchema->setLabel('sf_guard_user_id','Permission');

		//validateurs
		$this->setValidator( 'nom', new sfValidatorString(
			array('trim' => true), array('required' => 'Il faut renseigner le nom')
		));
		$this->setValidator( 'prenom', new sfValidatorString(
			array('trim' => true)
		));
		$this->setValidator( 'civ', new sfValidatorString(
			array('required' => false , 'trim' => true)
		));
		$this->setValidator( 'date_naissance', new sfValidatorDateTime(
			array('required' => false)
		));
		$this->setValidator( 'photo', new sfValidatorString(
			array('required' =>false)
		));
		$this->setValidator( 'sf_guard_user_id', new sfValidatorInteger(
			array('required' => false)
		));
  }

	/****	Fonction d'ajouts dynamique	****/


	/**
	 * Fonction d'ajout d'un email dynamiquement
	 * @param int $num	numéro du champs à ajouter
	 */
	public function addEmail($num)
	{
		//ajout d'un email
		$unMail = new Email();
		$unMail->Personne = $this->getObject();
		//$unMail->setEmail($texte);
		$mail_form = new EmailForm($unMail);
		
		//ajout du mail dans le formulaire
		$this->embeddedForms['newEmails']->embedForm($num,$mail_form);
		//mise ne place du formulaire global
		$this->embedForm('newEmails', $this->embeddedForms['newEmails']);
	}

	/**
	 * Fonction d'ajout d'un numéro de téléphone dynamiquement
	 * @param int $num	numéro du champs à ajouter
	 */
	public function addNumero($num)
	{
		//ajout d'un numéro
		$unNum = new Telephone();
		$unNum->Personne = $this->getObject();
		$tel_form = new TelephoneForm($unNum);
	
		//ajout du téléphone dans le formulaire de téléphones
		$this->embeddedForms['newPhones']->embedForm($num,$tel_form);
		//remise ne place du formulaire global
		$this->embedForm('newPhones', $this->embeddedForms['newPhones']);

	}

	/**
	 * Fonction d'ajout d'un formulaire d'adresse dynamiquement
	 * @param int $num	numéro du formulaire à ajouter
	 */
	public function addAdresse($num)
	{
		//ajout d'une adresse
		$uneAdr = new Adresse();
		$uneAdr->Personne = $this->getObject();
		$adr_form = new AdresseForm($uneAdr);

		//ajout du formulaire dans l'ensemble des formulaires d'adresse
		$this->embeddedForms['newAdress']->embedForm($num,$adr_form);
		//réimbrication du formulaire d'adresses dans le formulaire global
		$this->embedForm('newAdress', $this->embeddedForms['newAdress']);
	}

	/**
	 * Fonction d'ajout d'un formulaire de contact professionel dynamiquement
	 * @param int $num	numéro du formulaire à ajouter
	 */
	public function addContactPro($num)
	{
		//ajout d'une adresse
		$unContact = new ContactPro();
		$unContact->Personne = $this->getObject();
		$ct_form = new ContactProForm($unContact);

		//ajout du formulaire dans l'ensemble des formulaires d'adresse
		$this->embeddedForms['newContacts']->embedForm($num,$ct_form);
		//réimbrication du formulaire d'adresses dans le formulaire global
		$this->embedForm('newContacts', $this->embeddedForms['newContacts']);
	}

	/****	Fonctions natives surchargées	****/
	
	/**
	 * Surcharge de la fonction bind afin d'ajouter au formulaire
	 * les champs ajoutés dynamiquement en ajax
	 */
	public function bind(array $taintedValues = null, array $taintedFiles = null)
	{
		//pour chaque valeur de newEmails
		foreach($taintedValues['newEmails'] as $key => $newEmail)
  		{
			//s'il n'y a pas de clé assignée
    			if (!isset($this['newEmails'][$key]))
    			{
				//on en ajoute une
     			 	$this->addEmail($key);
	    		}
	  	}

		//pour chaque valeur de newPhones
		foreach($taintedValues['newPhones'] as $key => $newPhone)
		{
			//s'il n'y a pas de clé
			if (!isset($this['newPhones'][$key]))
			{
				//on ajoute un clé
				$this->addNumero($key);
			}
		}

		//pour chaque valeur de newAdress
		foreach($taintedValues['newAdress'] as $key => $newAdress)
		{
			if (!isset($this['newAdress'][$key]))
			{
				$this->addAdresse($key);
			}
		}

		//pour chaque fiche de contact pro
		foreach($taintedValues['newContacts'] as $key => $newContact)
		{
			if (!isset($this['newContacts'][$key]))
			{
				$this->addContact($key);
			}
		}
		//on appel la fonction bind() parent
	  	parent::bind($taintedValues, $taintedFiles);
	}

	/**
	 * Surcharge de la fonction saveEmbeddedForms
	 * afin de permettre la sauvegarde des champs d'autres formulaires
	 * tout en évitant d'enregistrer des champs vides
	 */
	public function saveEmbeddedForms($con = null, $forms = null)
  	{
   		if (null === $forms)
    		{
			//on récupère les infos des formulaires imbriqués
     			$emails = $this->getValue('newEmails');
			$numeros = $this->getValue('newPhones');
			$adresses = $this->getValue('newAdress');
			$contacts = $this->getValue('newContacts');

			//on récupère le formulaire complet (un ensemble)
      			$forms = $this->embeddedForms;
	
			//pour chaque valeur d'un formulaire imbriqué
			//s'il n'y a pas de valeur
			//on vide (unset) ce champs

			//Formulaire de mails
      			foreach ($this->embeddedForms['newEmails'] as $email => $form)
      			{
        			if (!isset($emails[$email]))
        			{
          				unset($forms['newEmails'][$email]);
        			}
      			}

    			//Formulaire de numéros de téléphones 
		        foreach($this->embeddedForms['newPhones'] as $numero => $form)
     			{
				if (!isset($numeros[$numero]))
				{
	   				unset($forms['newPhones'][$numero]);
				}
	
			}

			//Formulaire d'adresses
			foreach($this->embeddedForms['newAdress'] as $value => $form)
			{
				if(!isset($adresses[$value]))
				{
					unset($forms['newAdress'][$value]);
				}
			}

			//Formulaire de contacts
			foreach($this->embeddedForms['newContacts'] as $value => $form)
			{
				if(!isset($contacts[$value]))
				{
					unset($forms['newContacts'][$value]);
				}
			}

    		}
 
    		return parent::saveEmbeddedForms($con, $forms);
  	}

}

