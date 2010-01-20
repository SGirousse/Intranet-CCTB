<?php

/**
 * Utilisateur actions.
 *
 * @package    intranet-cctb
 * @subpackage utilisateur
 * @author     Sébastien MARCELLIN, Simeon GIROUSSE
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z  $
 */
class utilisateurActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeLogin(sfWebRequest $request)
  {   
    // Nous changeons de layout
    $this->setLayout('login');
    
    // Affichage du formulaire d'authentification
  }
}
?>
