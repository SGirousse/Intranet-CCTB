/**
 * Fonction javascript qui permet l'ajout dynamique de nouveaux champs dans un formulaire.
 * @param	int		num		nombres de champs déjà présents
 * @param	string		action		url contenant l'action à utiliser
 * @param	string		targetDiv	id de la div qui contiendra le nouveau champs
 * @param	string		field		nom du champs qui sera modifié
 * @author S. Marcellin
 */

function addFields(num, action, targetDiv, field){
	//on déclare une variable r qu recoit le résultat de l'action effectuée
	var r = $.ajax({
		type: 'GET',
		url: action+'?num='+num,
		async: false
   		}).responseText;

	//on ajoute dans la div le résultat r
	$(targetDiv).append(r);
	//on imcrémente le nombre de champs pour ce type de champs en particulier
	arrayFields[field] = arrayFields[field]+1;
}
