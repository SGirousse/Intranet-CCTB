<script language="text/javascript" >
$(function() {
	$("#formAddGroup").submit(function() {
		dataString = $("#formAddGroup").serialize();

	
		$.ajax({
			type: 'POST',
			url: "<?php echo url_for("utilisateur/popupAddGroup"); ?>",
			data: dataString,
			success: function(data){
				alert(data);
			},
			dataTye: "json"
	});

	return false;
});
});

	
</script>
<table>
<?php
	echo $form['newContacts'][$num]['fonction_id']->renderRow();
	echo $form['newContacts'][$num]['groupe_id']->renderRow();
?>
</table>
<a href="#" style="color:#000" onClick="popupAddGroup();" >Créer un groupe</a>
<div id="popupAddGroup" style="display:none;">

	<form id="formAddGroup" >

		<?php echo $form_Grp; ?>

	<input type="submit" value="save" />

	</form>
</div>
