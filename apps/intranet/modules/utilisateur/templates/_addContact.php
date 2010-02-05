<table>
<?php echo $form['newContacts'][$num]['fonction_id']->renderRow(); ?>
</table>
<a href="#" style="color:#000" onClick="popupAddGroup();" >Créer un groupe</a>
<div id="popupAddGroup" style="display:none;">
	<p id="validateTips">All form fields are required.</p>

	<form>
	<fieldset>
		<label for="name">Name</label>
		<input type="text" name="name" id="name" class="text ui-widget-content ui-corner-all" />
		<label for="email">Email</label>
		<input type="text" name="email" id="email" value="" class="text ui-widget-content ui-corner-all" />
		<label for="password">Password</label>
		<input type="password" name="password" id="password" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	</form>
</div>
