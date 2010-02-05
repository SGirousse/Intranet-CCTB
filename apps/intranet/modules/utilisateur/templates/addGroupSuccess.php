<form action="<?php echo url_for('utilisateur/addGroup') ?>" method="POST" >
	<table>
	<?php
		
		echo $form['intitule']->renderRow();
		echo $form['description']->renderRow();
		echo $form['type_id']->renderRow();
		//on ajoute la clé de manière cachée
		echo $form['_csrf_token']->render();

	?>
	</table>
</form>
