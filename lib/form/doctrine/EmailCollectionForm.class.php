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
			/*$email->Personne = $entiteLiee;
		}else{
			if ($entiteLiee == $this->getOption('groupe'))
			{
				$email->Groupe = $entiteLiee;
			}else{
				//sinon on renvoie une erreur
				throw new InvalidArgumentException('Vous devez lier cet email à une personne ou un groupe.');
			}*/
		for ($i=0; $i < $this->getOption('size'); $i++)
		{
			//on intancie un mail
			$email = new Email();
			$email->Personne = $personne;
			$form = new EmailForm($email);
			$this->embedForm($i,$form);
		}


		//$this->mergePostValidator(new EmailValidatorSchema() );
	}
}
