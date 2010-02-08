<?php

/**
 * Groupe form base class.
 *
 * @method Groupe getObject() Returns the current form's model object
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseGroupeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'parent_id'    => new sfWidgetFormInputText(),
      'type_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Type'), 'add_empty' => false)),
      'intitule'     => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormTextarea(),
      'categorie_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Categorie'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'parent_id'    => new sfValidatorInteger(array('required' => false)),
      'type_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Type'))),
      'intitule'     => new sfValidatorString(array('max_length' => 45)),
      'description'  => new sfValidatorString(array('required' => false)),
      'categorie_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Categorie'))),
    ));

    $this->widgetSchema->setNameFormat('groupe[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Groupe';
  }

}
