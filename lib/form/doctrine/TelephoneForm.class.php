<?php

/**
 * Telephone form.
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class TelephoneForm extends BaseTelephoneForm
{
  public function configure()
  {
	unset($this['id']);
	//champs affichés dans le formulaire
	$this->useFields(array('numero'));
	//mise en place de la widget
	$this->setWidget('numero', new sfWidgetFormInput() );
	//mise en place du validateur
	$this->setValidator('numero', new sfValidatorString(
		array('required' => false)
	));
  }
}
