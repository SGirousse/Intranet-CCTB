<?php

/*
 *Classe de validateur de formulaire d'adresse
 *@author 	S. Girousse
 *@see		sfValidatorSchema
 */
class AdresseValidatorSchema extends sfValidatorSchema
{
	protected function configure($option = array(), $message = array() )
	{
		$this->addMessage('rue', 'Vous devez renseigner la rue');
		$this->addMessage('cp', 'Vous devez renseigner le code postal');
		$this->addMessage('ville', 'Vous devez renseigner la ville');
	}

	protected function doClean($values)
	{
		foreach ($values as $key => $value)
		{
			//s'il n'y a pas de rue, ni de code postal, ni de ville saisie alors on vide les champs
			if (!$value['rue'] && !$value['cp'] && !$value['ville'])
			{
				unset($values[$key]);
			}
	
			return $values;	
		}
	}
}

?>
