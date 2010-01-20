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

		//validateur
		$this->setValidators(array(
			'nom' => new sfValidatorString(array('required' => true)) ,
			'prenom' => new sfValidatorString(array('required' => true)),
			'civ' => new sfValidatorString(array('required' => false)),
			'date_naissance' => new sfValidatorDateTime(array('required' => false)),
			'photo' => new sfValidatorString(array('required' => false)),
		));
  }
}
