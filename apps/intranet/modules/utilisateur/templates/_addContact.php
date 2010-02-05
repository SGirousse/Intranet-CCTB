<?php echo $form['newContacts'][$num]['fonction_id']->renderRow(); ?>
	<tr>
	<td>
		<div>
			<a href="#" style="color:#000" onClick="addFields(<?php print_r($form['newContacts']->count()); ?>, '<?php echo url_for('utilisateur/addContactForm') ?>', '#extracontacts', 'contacts');" >Créer un groupe</a>
		</div>
	</td>
	</tr>

