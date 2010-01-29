<form action="<?php echo url_for('utilisateur/addUser') ?>" method="POST" >
	<table>
	<?php
		echo $formulaire;
	?>
	<tr>
	  <td colspan="2">
	    <input type="submit">
	  </td>
	</tr>
	</table>
</form>
