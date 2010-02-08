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
      'personne_id' => new sfWidgetFormInputHidden(),
      'groupe_id'   => new sfWidgetFormInputHidden(),
      'fonction_id' => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'personne_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'personne_id', 'required' => false)),
      'groupe_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'groupe_id', 'required' => false)),
      'fonction_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'fonction_id', 'required' => false)),
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
