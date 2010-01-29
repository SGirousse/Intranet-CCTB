<?php

class EmailCollectionForm extends sfForm
{
	public function configure()
	{
		//si on a affaire à une personne
		if (!$personne = $this->getOption('personne') )
		{
			throw new InvalidArgumentException('Vous devez lier cet email à une personne');
		}
	
		
		for ($i=0; $i < $this->getOption('size',2); $i++)
		{
			//on intancie un mail
			$email = new Email();
			$email->Personne = $personne;
			$form = new EmailForm($email);
			$this->embedForm($i,$form);
		}


		$this->mergePostValidator(new EmailValidatorSchema() );
	}
}
?>
