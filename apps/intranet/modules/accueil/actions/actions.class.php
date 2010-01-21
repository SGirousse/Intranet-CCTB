<?php

/**
 * accueil actions.
 *
 * @package    intranet-cctb
 * @subpackage accueil
 * @author     Sébastien MARCELLIN, Simeon GIROUSSE
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z  $
 */
class accueilActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeIndex(sfWebRequest $request)
  {   
    $this->getUser()->setFlash('notice', 'Ceci est la zone d\'affichage des messages flash "notice" et "error"'); 

	$user = new TypeForm();
	$this->form = $user;

	if ($request->isMethod('post'))
	{
		$this->form->bind($request->getParameter('type'), array());
		if ($this->form->isValid()){
			$con = Doctrine_Manager::connection();

                        try{
                                $con->beginTransaction();

                                $newDocument = $this->form->save($con);

                                $con->commit();
                        }
                        catch(Exception $e){
                                echo $e;//$con->rollback();
                        throw $e;
			}
		}
  	}
   }
}
?>
