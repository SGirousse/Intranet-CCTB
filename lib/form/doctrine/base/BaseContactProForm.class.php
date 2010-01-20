<?php

/**
 * ContactPro form base class.
 *
 * @method ContactPro getObject() Returns the current form's model object
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactProForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'personne_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Personne'), 'add_empty' => false)),
      'groupe_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Groupe'), 'add_empty' => false)),
      'fonction_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Fonction'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'personne_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Personne'))),
      'groupe_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Groupe'))),
      'fonction_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Fonction'))),
    ));

    $this->widgetSchema->setNameFormat('contact_pro[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactPro';
  }

}
