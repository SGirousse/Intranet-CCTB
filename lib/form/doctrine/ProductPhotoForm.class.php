<?php

/**
 * ProductPhoto form.
 *
 * @package    intranet-cctb
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ProductPhotoForm extends BaseProductPhotoForm
{
  public function configure()
  {
	  $this->useFields(array('filename', 'caption'));
 
	  $this->setWidget('filename', new sfWidgetFormInput());
	  $this->setValidator('filename', new sfValidatorString(array('required' => false)));
  }
}
