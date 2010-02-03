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
	/*
	 *Fonction de configuration du formulaire de base de 'personne'
	 */
	public function configure()
  	{
		unset($this['id']);

		//on lie le formulaire à un formulaire de mail
		$form = new EmailCollectionForm(null, array(
			'personne' => $this->getObject(),
			'size' => 1,
		));
		$this->embedForm('newEmails', $form);
		
		$form = new TelephoneCollectionForm(null, array(
			'personne' => $this->getObject(),
			'size' => 1,
		));

		$this->embedForm('newPhones', $form);
		

		//assignation de widget particulières
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

	/**** Fonction d'ajouts dynamique ****/


	/*
	 *Fonction d'ajout d'un email dynamiquement
	 */
	public function addEmail($num , $texte = '')
	{
		//ajout d'un email
		$unMail = new Email();
		$unMail->Personne = $this->getObject();
		$unMail->setEmail($texte);
		$mail_form = new EmailForm($unMail);
		
		//ajout du mail dans le formulaire
		$this->embeddedForms['newEmails']->embedForm($num,$mail_form);
		//mise ne place du formulaire global
		$this->embedForm('newEmails', $this->embeddedForms['newEmails']);
	}

	
	/*
	 *Surcharge de la fonction bind
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
	  	parent::bind($taintedValues, $taintedFiles);
	}

	/*
	 *surcharge de la fonction saveEmbeddedForms
	 */
	public function saveEmbeddedForms($con = null, $forms = null)
  	{
   		if (null === $forms)
    		{
     			$emails = $this->getValue('newEmails');
      			$forms = $this->embeddedForms;

      			foreach ($this->embeddedForms['newEmails'] as $email => $form)
      			{
        			if (!isset($emails[$email]))
        			{
          				unset($forms['newEmails'][$email]);
        			}
      			}

     			$numeros = $this->getValue('newPhones');
     
		        foreach($this->embeddedForms['newPhones'] as $numero => $form)
     			{
				if (!isset($numeros[$numero]))
				{
	   				unset($forms['newPhones'][$numero]);
				}
	
			}

    		}
 
    		return parent::saveEmbeddedForms($con, $forms);
  	}

}

