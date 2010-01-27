<?php

/**
 * Personne filter form base class.
 *
 * @package    intranet-cctb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BasePersonneFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'              => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prenom'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'civ'              => new sfWidgetFormFilterInput(),
      'date_naissance'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'photo'            => new sfWidgetFormFilterInput(),
      'sf_guard_user_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('sfGuardUser'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'nom'              => new sfValidatorPass(array('required' => false)),
      'prenom'           => new sfValidatorPass(array('required' => false)),
      'civ'              => new sfValidatorPass(array('required' => false)),
      'date_naissance'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'photo'            => new sfValidatorPass(array('required' => false)),
      'sf_guard_user_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('sfGuardUser'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('personne_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Personne';
  }

  public function getFields()
  {
    return array(
      'id'               => 'Number',
      'nom'              => 'Text',
      'prenom'           => 'Text',
      'civ'              => 'Text',
      'date_naissance'   => 'Date',
      'photo'            => 'Text',
      'sf_guard_user_id' => 'ForeignKey',
    );
  }
}
