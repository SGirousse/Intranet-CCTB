<!--script javascript d'ajout de champs emails dynamiquement
	1. on récupère le nombre de champs emails présents
	2. 
	3. on met en place le bouton d'ajout de champs qui déclenche l'action addEmails et renvoir le résultat dans la div extraemails-->
<script type="text/javascript">
var emails = <?php print_r($form['newEmails']->count())?>;

function addEmails(num) {
  var r = $.ajax( {
	type: 'GET',
	url: '<?php echo url_for('utilisateur/addEmailForm')?>'+'<?php echo ($form->getObject()->isNew()?'':'?id='.$form->getObject()->getId()).($form->getObject()->isNew()?'?num=':'&num=')?>'+num,
	async: false
   }).responseText;
   return r;
}
$().ready(function() {
   $('button#add_email').click(function() {
	$("#extraemails").append(addEmails(emails));
	emails = emails + 1;
  });
});
</script>

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

		//champs du formulaire de téléphone
		//echo $form['newPhones'][0]['numero']->renderRow();
		
		//on ajoute la clé de manière cachée
		echo $form['_csrf_token']->render();
	?>
	<table>
	<div id="extraemails">
	</div>
	</table>
	<tr>
	<td>
		<div>
			<button id="add_email" type="button"><?php echo "Ajouter un email"?></button>
		</div>
	</td>
	</tr>
	<tr>
	  <td colspan="2">
	    <input type="submit">
	  </td>
	</tr>
	</table>
</form>
