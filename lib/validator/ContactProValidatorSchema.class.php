<?php

/**
 *Classe de validateur de fiche contact pro qui hérite du sfValidatorSchema
 *@author : siméon girousse
 *@see sfValidatorSchema
 */
class ContactProValidatorSchema extends sfValidatorSchema
{
	protected function configure($option = array(), $message = array() )
	{
		$this->addMessage('fonction_id', 'Vous devez renseigner la fonction');
	}

	protected function doClean($values)
	{
		foreach ($values as $key => $value)
		{
			//s'il n'y a pas d'email de saisi
			if (!$value['fonction_id'])
			{
				unset($values[$key]);
			}
	
			return $values;	
		}
	}
}



?>
