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
    ));

    $this->setValidators(array(
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
      'personne_id' => 'Number',
      'groupe_id'   => 'Number',
      'fonction_id' => 'Number',
    );
  }
}
