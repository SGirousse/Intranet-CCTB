<script type="text/javascript">
var emails = <?php print_r($formulaire['newEmails']->count())?>;

function addEmails(num) {
  var r = $.ajax({
    type: 'GET',
    url: '<?php echo url_for('utilisateur/addEmailForm')?>'+'<?php echo ($formulaire->getObject()->isNew()?'':'?id='.$formulaire->getObject()->getId()).($formulaire->getObject()->isNew()?'?num=':'&num=')?>'+num,
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
		echo $formulaire;
	?>
	</table>
	<div id="extraemails">
        </div>
        <table>
        <tr>
		<td>
			<div>
				<button id="add_email" type="button"><?php echo "Ajouter un email ?"?></button>
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
