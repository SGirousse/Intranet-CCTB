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
  public function configure()
  {
		unset($this['id']);

		//mise en place d'un nom pour le formulaire
		//$this->widgetSchema->setNameFormat('personne[%s]');

		//on lie le formulaire à un formulaire de mail
		$form = new EmailCollectionForm(null, array(
			'personne' => $this->getObject(),
			'size' => 1,
		));/*
 		$subForm = new sfForm();
 		 for ($i = 0; $i < 2; $i++)
  		{
    			$people = new Email();
    			$people->Personne = $this->getObject();
 
 			$form = new EmailForm($people);
 
    			$subForm->embedForm($i, $form);
  		}*/
		$this->embedForm('newEmails', $form);

		//assignation de widget particulières
		//on traitera les widgets une par une et non dans un tableau global pour éviter d'avoir à redéfinir toutes les widgets
		$this->setWidget('nom', new sfWidgetFormInputText() );
		$this->setWidget('prenom', new sfWidgetFormInputText() );
		$this->setWidget('civ', new sfWidgetFormInputText() );
		//date_naissance
		//$this->setWidget('photo', new sfWidgetFormInputFile() );
		//sf_guard_user_id

		//personnalisation des labels
		$this->widgetSchema->setLabel('sf_guard_user_id','Permission');

		//aide
		//$this->setDefault('nom', 'Votre nom ici');

		//format du formulaire
		//$this->widgetSchema->setFormFormatterName('list');

		//validateurs
		$this->setValidators(array(
			'nom' => new sfValidatorString(array('trim' => true), array('required' => 'Il faut renseigner le nom')) ,
			'prenom' => new sfValidatorString(array('trim' => true)),
			'civ' => new sfValidatorString(array('required' => false , 'trim' => true)),
			'date_naissance' => new sfValidatorDateTime(array('required' => false)),
			'photo' => new sfValidatorString(array('required' =>false)),
			'sf_guard_user_id' => new sfValidatorInteger(array('required' => false)),
		));

		//post validateur (vérifications supplémentaires, entre deux champs par exemple)
		/*$this->validatorSchema->setPostValidator(
			new sfValidatorSchemaCompare('nom', '==', 'prenom' ,
				array('throw_global_error' => true), //si ce champs est vide = false
				array('invalid' => 'Refus de personnes ayant un nom et un prenom différent ??')
			)

		);*/
  }

 /* public function saveEmbeddedForms($con = null, $form = null)
  {
	if ($forms == null)
	{
		$mails = $this->getValue('AjoutMail');
		$forms = $this->embeddedForms;

		//$this->embeddedForms['AjoutMail'][0];	

		if (!isset($mails[0]))
		{
			unset($forms['ajoutMail'][0]);
		}
	}

	return parent::saveEmbeddedForms($con, $forms);
  }*/
}
