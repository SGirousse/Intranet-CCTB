<?php
/*
* Gestion des menus
* Sébastien MARCELLIN
*
*
*/

class menuComponents extends sfComponents
{
	/*
	 *	Affiche le menu principal en fonction de l'utilisateur connecté
	 */
	public function executeMenuPrincipal()
	{
		/* 	Nous récupérons le nom du module afin de ne pas afficher de lien cliquable le concerant dans le menu
		 * 	!! Attention, ne pas utiliser moduleName ou actionName comme nom de variable !!
		 */
		$moduleNom = $this->getContext()->getModuleName();
		
		/*	Récupérer les modules dans la base SQL accessibles par l'utilisateur
		 *
		 *
		 */
		 $this->menu = array(
		 			array('lien' => 'http://google.fr', 'titre' => 'Google' ),
		 			array('lien' => 'http://yahoo.fr', 'titre' => 'Yahoo' ),
					array('lien' => url_for('accueil/index'), 'titre' => 'Accueil'),
					array('lien' => url_for('utilisateur/index'), 'titre' => 'Gestion utilisateur')
		 );
	}
	
	/*
	 *	Affiche le sous menu en fonction de l'utilisateur connecté et du module courant
	 */
	public function executeSousMenu()
	{
		/* 	Nous récupérons le nom du module et de l'action courant
		 * 	!! Attention, ne pas utiliser moduleName ou actionName comme nom de variable !!
		 */
		$moduleNom = $this->getContext()->getModuleName();
		$actionNom = $this->getContext()->getActionName();
		
		/*	Récupérer les actions dans la base SQL accessibles par l'utilisateur
		 *
		 *
		 */
		 $this->menu = array(
		 			array('lien' => 'http://google.fr', 'titre' => 'Google' ),
		 			array('lien' => 'http://yahoo.fr', 'titre' => 'Yahoo' ),
					array('lien' => url_for('utilisateur/addUser'), 'titre' => 'Ajout utlisateur' )
		 );
	}
}
?>
