<?php

/**
 * Personne form base class.
 *
 * @method Personne getObject() Returns the current form's model object
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePersonneForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'nom'              => new sfWidgetFormInputText(),
      'prenom'           => new sfWidgetFormInputText(),
      'civ'              => new sfWidgetFormInputText(),
      'date_naissance'   => new sfWidgetFormDate(),
      'photo'            => new sfWidgetFormInputText(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'nom'              => new sfValidatorString(array('max_length' => 45)),
      'prenom'           => new sfValidatorString(array('max_length' => 45)),
      'civ'              => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'date_naissance'   => new sfValidatorDate(array('required' => false)),
      'photo'            => new sfValidatorString(array('max_length' => 45, 'required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('personne[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Personne';
  }

}
