<?php

/**
 * Adresse filter form base class.
 *
 * @package    intranet-cctb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseAdresseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'ville_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Ville'), 'add_empty' => true)),
      'personne_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Personne'), 'add_empty' => true)),
      'groupe_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Groupe'), 'add_empty' => true)),
      'rue'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'rue_cptl'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'cp'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'ville'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'ville_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Ville'), 'column' => 'id')),
      'personne_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Personne'), 'column' => 'id')),
      'groupe_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Groupe'), 'column' => 'id')),
      'rue'         => new sfValidatorPass(array('required' => false)),
      'rue_cptl'    => new sfValidatorPass(array('required' => false)),
      'cp'          => new sfValidatorPass(array('required' => false)),
      'ville'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('adresse_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Adresse';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'ville_id'    => 'ForeignKey',
      'personne_id' => 'ForeignKey',
      'groupe_id'   => 'ForeignKey',
      'rue'         => 'Text',
      'rue_cptl'    => 'Text',
      'cp'          => 'Text',
      'ville'       => 'Text',
    );
  }
}
