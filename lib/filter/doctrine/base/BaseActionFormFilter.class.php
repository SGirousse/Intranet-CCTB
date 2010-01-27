<?php

/**
 * Action filter form base class.
 *
 * @package    intranet-cctb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseActionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'intitule'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'module_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Module'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'intitule'  => new sfValidatorPass(array('required' => false)),
      'module_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Module'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('action_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Action';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'intitule'  => 'Text',
      'module_id' => 'ForeignKey',
    );
  }
}
