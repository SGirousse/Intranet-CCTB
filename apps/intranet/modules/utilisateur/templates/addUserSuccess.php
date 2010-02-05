<?php use_javascript('addFields.js'); ?>
<?php use_javascript('popupAddGroup.js'); ?>




<script language="text/javascript">

var arrayFields = new Array();
arrayFields['emails'] = <?php print_r($form['newEmails']->count()); ?>;
arrayFields['numeros'] = <?php print_r($form['newPhones']->count()); ?>;
arrayFields['adresses'] = <?php print_r($form['newAdress']->count()); ?>;
arrayFields['contacts'] = <?php print_r($form['newContacts']->count()); ?>;

</script>


<!--Mise en place du formulaire d'ajout d'utilisateur-->
<form action="<?php echo url_for('utilisateur/addUser') ?>" method="POST" >
	<table>
	<?php

		//on affiche les champs un par un
		//champs du formulaire personne
		echo $form['nom']->renderRow();
		echo $form['prenom']->renderRow();
		echo $form['date_naissance']->renderRow();
		echo $form['civ']->renderRow();
		//champs du formulaire d'email
		echo $form['newEmails'][0]['email']->renderRow();
		for ($num = 1 ; $num < $emailsNumber ; $num++)
		{
			echo $form['newEmails'][$num]['email']->renderRow();
		}
		//champs du formulaire de téléphone
		echo $form['newPhones'][0]['numero']->renderRow();
		for ($num = 1 ; $num < $numerosNumber ; $num++)
		{
			echo $form['newPhones'][$num]['numero']->renderRow();
		}
		//champs du formulaire d'adresse
		echo $form['newAdress'][0]['rue']->renderRow();
		echo $form['newAdress'][0]['rue_cptl']->renderRow();
		echo $form['newAdress'][0]['cp']->renderRow();
		echo $form['newAdress'][0]['ville']->renderRow();
		for ($num = 1; $num < $adressesNumber ; $num++ )
		{
			echo $form['newAdress'][$num]['rue']->renderRow();
			echo $form['newAdress'][$num]['rue_cptl']->renderRow();
			echo $form['newAdress'][$num]['cp']->renderRow();
			echo $form['newAdress'][$num]['ville']->renderRow();
		}

		//on ajoute la clé de manière cachée
		echo $form['_csrf_token']->render();
	?>
	<table>
	<div id="extraadresses">
	</div>
	<div id="extraemails">
	</div>
	<div id="extranumeros">
	</div>
	<div id="extracontacts">
	</div>
	</table>
	<tr>
	<td>
		<div>
			<a href="#" style="color:#000" onClick="addFields(<?php print_r($form['newEmails']->count()); ?>, '<?php echo url_for('utilisateur/addEmailForm') ?>', '#extraemails', 'emails');" >Ajouter un email</a>
		</div>
	</td>
	</tr>
	<tr>
	<td>
		<div>
			<a href="#" style="color:#000" onClick="addFields(<?php print_r($form['newPhones']->count()); ?>, '<?php echo url_for('utilisateur/addNumeroForm') ?>', '#extranumeros', 'numeros');">Ajouter un numéro</a>
		</div>
	</td>
	</tr>
	<tr>
	<tr>
	<td>
		<div>	
			<a href="#"  style="color:#000" onClick="addFields(<?php print_r($form['newAdress']->count()); ?>, '<?php echo url_for('utilisateur/addAdresseForm') ?>', '#extraadresses', 'adresses');">Ajouter une adresse</a>
		</div>
	</td>
	</tr>
	<tr>
	<td>
		<div>
			<a href="#" style="color:#000" onClick="addFields(<?php print_r($form['newContacts']->count()); ?>, '<?php echo url_for('utilisateur/addContactForm') ?>', '#extracontacts', 'contacts');" >Assigner comme contact professionel</a>
		</div>
	</td>
	</tr>

	  <td colspan="2">
	    <input type="submit">
	  </td>
	</tr>
	</table>
</form>
<!--Fin du formulaire d'ajout d'utilisateur-->
