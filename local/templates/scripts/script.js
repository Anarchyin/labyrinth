$(document).ready(function() {
	$('.update').click(function () {
		$.ajax({
			type: "POST",
			url: "/ajax/ajax.php",
			dataType: 'html',
			data: ({'action': 'update' }),
			success: function(data){
				$('.weather').html(data);

			}
		});

		return false;
	});
});