<?php

/**
 * ContactPro form.
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContactProForm extends BaseContactProForm
{
  public function configure()
  {
	unset($this['id']);

	//champs à utiliser
	$this->useFields(array('fonction_id'));

	//
	$this->setWidget('fonction_id', new sfWidgetFormInput);

	//
	$this->setValidator('fonction_id', new sfValidatorInteger(
		array('required' => false)
	));
	
  }
}
