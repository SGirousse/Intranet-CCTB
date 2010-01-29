<?

/*
 *Classe email validator schema qui hérite du sfValidatorSchema
 *@author : siméon girousse
 */
class TelephoneValidatorSchema extends sfValidatorSchema
{
	protected function configure($option = array(), $message = array() )
	{
		$this->addMessage('numero', 'Vous devez renseigner le numéro');
	}

	protected function doClean($values)
	{
		foreach ($values as $key => $value)
		{
			//s'il n'y a pas d'email de saisi
			if (!$value['numero'])
			{
				unset($values[$key]);
			}
	
			return $values;	
		}
	}
}



?>
