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
	
	$this->useFields(array('numero'));

	$this->setWidget('numero', new sfWidgetFormInput() );

	$this->setValidator('numero', new sfValidatorString(
		array('required' => false)
	));
  }
}
