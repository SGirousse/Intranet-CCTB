<?php

/**
 *Classe de collection d'adresses héritant de sfForm
 *@author  S. Girousse
 */

class AdresseCollectionForm extends sfForm
{
	/**
	 *Fonction des configurations de base d'un objet AdresseCollection
	 */
	public function configure()
	{
		//on vérifie que cette adresse est bien liée à une personne
		//on assigne à la variable $personne la valeur 'personne'
		if (!$personne = $this->getOption('personne') )
		{
			//sinon on renvoie une erreur
			throw new InvalidArgumentException('Vous devez lier ce numéro de téléphone à une personne');
		}
	
		//pour une collection d'un nombre d'éléments précis
		for ($i=0; $i < $this->getOption('size',2); $i++)
		{
			//on intancie une adresse
			$adr = new Adresse();
			$adr->Personne = $personne;
			$adr_form = new AdresseForm($adr);
			$this->embedForm($i,$adr_form);
		}


		$this->mergePostValidator(new AdresseValidatorSchema() );
	}
}
?>
