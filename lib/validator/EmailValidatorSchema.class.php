<?

/*
 *Classe email clidaor schema qui hérite du sfValidatorSchema
 *@author : siméon girousse
 */
class EmailValidatorSchema extends sfValidatorSchema
{
	protected function configure($option = array(), $message = array() )
	{
		$this->addMessage('email', 'Vous devez renseigner l\'email');
	}

	protected function doClean($values)
	{
		//$errorSchema = new sfValidatorErrorSchema($this);
		
		//s'il n'y a pas d'email de saisi
		if (!$value['email'])
		{
			unset($value[$key]);
		}

		return $values;	
	}
}



?>
