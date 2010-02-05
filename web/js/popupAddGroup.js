function popupAddGroup(){
		$("#popupAddGroup").dialog({
			bgiframe: true,
			autoOpen: false,
			height: 300,
			modal: true,
			buttons: {
				'Create an account': function() {
					$(this).dialog('close');
				},
				Cancel: function() {
					$(this).dialog('close');
				}
			},
			close: function() {
			}
		});

		$("#popupAddGroup").dialog('open');
}
