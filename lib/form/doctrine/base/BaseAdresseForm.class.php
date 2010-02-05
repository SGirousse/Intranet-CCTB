<?php

/**
 * Adresse form base class.
 *
 * @method Adresse getObject() Returns the current form's model object
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdresseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'ville_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ville'), 'add_empty' => true)),
      'personne_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Personne'), 'add_empty' => true)),
      'groupe_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Groupe'), 'add_empty' => true)),
      'rue'         => new sfWidgetFormInputText(),
      'rue_cptl'    => new sfWidgetFormInputText(),
      'cp'          => new sfWidgetFormInputText(),
      'ville'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'ville_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Ville'), 'required' => false)),
      'personne_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Personne'), 'required' => false)),
      'groupe_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Groupe'), 'required' => false)),
      'rue'         => new sfValidatorString(array('max_length' => 45)),
      'rue_cptl'    => new sfValidatorString(array('max_length' => 45)),
      'cp'          => new sfValidatorString(array('max_length' => 5)),
      'ville'       => new sfValidatorString(array('max_length' => 45)),
    ));

    $this->widgetSchema->setNameFormat('adresse[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Adresse';
  }

}
