<?php

class TelephoneCollectionForm extends sfForm
{
	public function configure()
	{
		//si on a affaire à une personne
		if (!$personne = $this->getOption('personne') )
		{
			throw new InvalidArgumentException('Vous devez lier ce numéro de téléphone à une personne');
		}
	
		
		for ($i=0; $i < $this->getOption('size',2); $i++)
		{
			//on intancie un téléphone
			$tel = new Telephone();
			$tel->Personne = $personne;
			$form = new TelephoneForm($tel);
			$this->embedForm($i,$form);
		}


		$this->mergePostValidator(new TelephoneValidatorSchema() );
	}
}
?>
