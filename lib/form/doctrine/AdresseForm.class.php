<?php

/**
 * Adresse form.
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     S. Girousse
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AdresseForm extends BaseAdresseForm
{
  public function configure()
  {
	unset($this['id']);
	
	//champs affichés dans le formulaire
	$this->useFields(array('rue', 'rue_cptl', 'cp', 'ville'));
	//mise en place des widgets
	$this->setWidget('rue', new sfWidgetFormInput() );
	$this->setWidget('rue_cptl', new sfWidgetFormInput() );
	$this->setWidget('cp', new sfWidgetFormInput() );
	$this->setWidget('ville', new sfWidgetFormInput() );

	//personnalisation des labels
	$this->widgetSchema->setLabel('rue_cptl', 'Rue (complément)');
	$this->widgetSchema->setLabel('cp', 'Code postal');

	//mise en place des validateurs
	$this->setValidator('rue', new sfValidatorString(
		array('required' => false)
	));
	$this->setValidator('rue_cptl', new sfValidatorString(
		array('required' => false)
	));
	$this->setValidator('cp', new sfValidatorString(
		array('required' => false)
	));
	$this->setValidator('ville', new sfValidatorString(
		array('required' => false)
	));

	
  }
}
