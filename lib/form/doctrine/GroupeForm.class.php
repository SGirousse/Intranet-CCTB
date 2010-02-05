<?php

/**
 * Groupe form.
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GroupeForm extends BaseGroupeForm
{
  public function configure()
  {
	unset($this['id']);

	//liaison avec des sous-formulaires


	//mise en place des caractéristiques particulières du formulaire de groupe
	$this->setWidget('intitule', new sfWidgetFormInput() );
	$this->setWidget('description', new sfWidgetFormTextArea() );

	//mise en place des validateurs
	$this->setValidator('intitule', new sfValidatorString(
		array('required' => true, 'trim' => true), array('required' => 'Vous devez nommer ce groupe')
	));
	$this->setValidator('description', new sfValidatorString(
		array('required' => false)
	));
		
  }
}
