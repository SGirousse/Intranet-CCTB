<?php

/**
 * SfGuardUser form base class.
 *
 * @method SfGuardUser getObject() Returns the current form's model object
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseSfGuardUserForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'username'       => new sfWidgetFormInputText(),
      'algorithm'      => new sfWidgetFormInputText(),
      'salt'           => new sfWidgetFormInputText(),
      'password'       => new sfWidgetFormInputText(),
      'is_active'      => new sfWidgetFormInputText(),
      'is_super_admin' => new sfWidgetFormInputText(),
      'last_login'     => new sfWidgetFormDateTime(),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'username'       => new sfValidatorString(array('max_length' => 128)),
      'algorithm'      => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'salt'           => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'password'       => new sfValidatorString(array('max_length' => 128, 'required' => false)),
      'is_active'      => new sfValidatorInteger(array('required' => false)),
      'is_super_admin' => new sfValidatorInteger(array('required' => false)),
      'last_login'     => new sfValidatorDateTime(array('required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('sf_guard_user[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SfGuardUser';
  }

}
