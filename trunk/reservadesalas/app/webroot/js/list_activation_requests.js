$(document).ready(function() {
	function selectAll() {
		$('.selectableBySelectAll').each(function() {
			$(this).attr('checked', true);
		});
	}
	function unselectAll() {
		$('.selectableBySelectAll').each(function() {
			$(this).attr('checked', false);
		});
	}
	
	$('.selectAll').change(function() {
		var checked = $(this).attr('checked');
		if (checked) {
			selectAll();
		}
		else {
			unselectAll();
		}
	});
	
	$("#dialog-confirm").html("Essa operação não pode ser desfeita.");
	$("#dialog-confirm").dialog({
		autoOpen: false,
		resizable: false,
		height:180,
		modal: true,
		title: 'Deseja continuar?',
		buttons: {
			"Sim": function() {
				$('.submittableForm').submit();
				$(this).dialog("close");
			},
			"Não": function() {
				$(this).dialog("close");
			}
		}
	});
	
	$('.needConfirmation').click(function(e) {
		e.preventDefault();
		$('input[name="action"]').attr('value', $(this).attr('value'));
		$("#dialog-confirm").dialog("open");
	});
});