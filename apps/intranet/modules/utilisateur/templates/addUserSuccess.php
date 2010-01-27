<form action="<?php echo url_for('utilisateur/addUser') ?>" method="POST" >
	<table>
	<?php
		echo $formulaire;
		/*echo $form['nom']->renderRow();
		echo $form['prenom']->renderRow();
		echo $form['civ']->renderRow();
		echo $form['date_naissance']->renderRow();
		echo $form['sf_guard_user_id']->renderRow();
		//echo $formMail['email']->renderRow();
		echo $form->renderHiddenFields();*/
	?>
	<tr>
	  <td colspan="2">
	    <input type="submit">
	  </td>
	</tr>
	</table>
</form>
