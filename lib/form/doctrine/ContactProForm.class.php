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

	//on récupère dans la base de donnée les noms de groupes et l'id qui leur est associé
	/*$request = Doctrine::getTable('groupe')
		->createQuery('q')
		->execute();


	for ($nbGroup = 0; $nbGroup < $request->count(); $nbGroup++)
	{
		$subjects[] += $request[$nbGroup]->getIntitule();
	//	echo $request[$nbGroup]->getIntitule();
	}*/

	
	//$subjects = array('c1','c2','c3');
	//champs à utiliser
	$this->useFields(array('fonction_id', 'groupe_id'));

	$this->setWidget('fonction_id', new sfWidgetFormInput() );

	$this->setWidget('groupe_id', new sfWidgetFormDoctrineChoice(
		array ('model' => 'groupe', 'add_empty' => false)
	));

	//
	//$this->setWidget('fonction_id', new sfWidgetFormInput() );

//	$this->widgetSchema->setLabel('groupe_id', 'NumGrp');
/*	$this->setWidget('groupe_id', new sfWidgetFormSelect(
		array('choices' => $subjects )
	));*/
//	$this->setWidget('groupe_id', new sfWidgetFormInput() );

	//
	$this->setValidator('fonction_id', new sfValidatorString(
		array('required' => false)
	));
/*	$this->setValidator('groupe_id', new sfValidatorChoice(
		array('choices' => array_keys($subjects)),
		array('required' => false)
	));*/
		$this->setValidator( 'groupe_id', new sfValidatorInteger(
			array('required' => false)
		));
	
  }
}
