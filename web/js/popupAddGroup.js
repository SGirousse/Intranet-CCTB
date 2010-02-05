function popupAddGroup(){
		$("#popupAddGroup").dialog({
			bgiframe: true,
			autoOpen: true,
			height: 300,
			modal: true,
			buttons: {
				'Create an account': function() {
					alert('ok');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
				allFields.val('').removeClass('ui-state-error');
			}
		});
}
