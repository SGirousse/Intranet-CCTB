<?php

/**
 * Email form.
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class EmailForm extends BaseEmailForm
{
  public function configure()
  {
	unset($this['id']);
	//champs affichés dans le formulaire
	$this->useFields(array('email'));

	//nom du formulaire
	//$this->widgetSchema->setNameFormat('mail[%s]');

	//mise en place de la widget
	$this->setWidget('email', new sfWidgetFormInput());

	//validateur
	//$this->setValidator('email', new sfValidatorEmail(array('required' => false), array('invalid' => 'L\'adresse email est invalide')));

  }
}
