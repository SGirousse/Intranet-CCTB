<?php

/**
 *Classe de validateur d'email qui hérite du sfValidatorSchema
 *@author : siméon girousse
 *@see 
 */
class EmailValidatorSchema extends sfValidatorSchema
{
	protected function configure($option = array(), $message = array() )
	{
		$this->addMessage('email', 'Vous devez renseigner l\'email');
	}

	protected function doClean($values)
	{
		foreach ($values as $key => $value)
		{
			//s'il n'y a pas d'email de saisi
			if (!$value['email'])
			{
				unset($values[$key]);
			}
	
			return $values;	
		}
	}
}



?>
