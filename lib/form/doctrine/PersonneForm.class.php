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
		$this->widgetSchema->setLabel('sf_guard_user_id','Permission');

		//aide
		//$this->setDefault('nom', 'Votre nom ici');

		//format du formulaire
		//$this->widgetSchema->setFormFormatterName('list');

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

  public function saveEmbeddedForms($con = null, $forms = null)
  {
    if (null === $forms)
    {
      $emails = $this->getValue('newEmails');
      $forms = $this->embeddedForms;

      foreach ($this->embeddedForms['newEmails'] as $email => $formulaire)
      {
        if (!isset($emails[$email]))
        {
          unset($forms['newEmails'][$email]);
        }
      }

     $numeros = $this->getValue('newPhones');
     
     foreach($this->embeddedForms['newPhones'] as $numero => $formulaire)
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
