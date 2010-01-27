<?php

/**
 * ContactPro filter form base class.
 *
 * @package    intranet-cctb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseContactProFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'personne_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Personne'), 'add_empty' => true)),
      'groupe_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Groupe'), 'add_empty' => true)),
      'fonction_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Fonction'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'personne_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Personne'), 'column' => 'id')),
      'groupe_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Groupe'), 'column' => 'id')),
      'fonction_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Fonction'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('contact_pro_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ContactPro';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'personne_id' => 'ForeignKey',
      'groupe_id'   => 'ForeignKey',
      'fonction_id' => 'ForeignKey',
    );
  }
}
