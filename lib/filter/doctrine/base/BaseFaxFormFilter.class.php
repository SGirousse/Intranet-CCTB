<?php

/**
 * Fax filter form base class.
 *
 * @package    intranet-cctb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseFaxFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'personne_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Personne'), 'add_empty' => true)),
      'groupe_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Groupe'), 'add_empty' => true)),
      'numero'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'personne_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Personne'), 'column' => 'id')),
      'groupe_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Groupe'), 'column' => 'id')),
      'numero'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('fax_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Fax';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'personne_id' => 'ForeignKey',
      'groupe_id'   => 'ForeignKey',
      'numero'      => 'Text',
    );
  }
}
