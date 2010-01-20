<?php

class myUser extends sfBasicSecurityUser
{
	/*
		Cette méthode vérifie s'il s'agit d'une première visite
	*/
	public function isFirstRequest($boolean = null){
	  if (is_null($boolean))
	  {
	    return $this->getAttribute('first_request', true);
	  }
	  else
	  {
	    $this->setAttribute('first_request', $boolean);
	  }
	}
}
