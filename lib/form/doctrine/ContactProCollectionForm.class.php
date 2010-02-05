<?php

class ContactProCollectionForm extends sfForm
{
	public function configure()
	{
		//si on n'a pas affaire à une personne
		if (!$personne = $this->getOption('personne') )
		{
			//on affiche une erreur d'argument
			throw new InvalidArgumentException('Vous devez lier cette fiche contact à une personne');
		}
	
		//on instancie autant de mail que nécessaire (selon la taille) avec 2 si aucun paramètre n'est passé
		for ($i=0; $i < $this->getOption('size',2); $i++)
		{
			//on intancie un mail
			$contact = new ContactPro();
			$contact->Personne = $personne;
			$form = new ContactProForm($contact);
			$this->embedForm($i,$form);
		}

		//on met en place un post validateur 
		$this->mergePostValidator(new ContactProValidatorSchema() );
	}
}
?>
