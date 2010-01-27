<?php

/**
 * Module filter form base class.
 *
 * @package    intranet-cctb
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseModuleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'nom' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('module_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Module';
  }

  public function getFields()
  {
    return array(
      'id'  => 'Number',
      'nom' => 'Text',
    );
  }
}
