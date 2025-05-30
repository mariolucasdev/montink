<script>
function removeItem(index) {
	$('#modalRemoveItem').modal('show');

	$('#modalRemoveItem').on('click', '#removeItem', function() {		
		$.ajax({
			url: '<?= base_url('cart/removeItem') ?>',
			cache: false,
			type: 'POST',
			data: {
				index: index
			},
			success: function(response) {
				if (response.success) {
					setTimeout(() => {
						elTargetButton.attr('class', 'btn btn-sm btn-outline');
					}, 3000);
				}
			},
			error: function(error) {
				window.location.reload();
			},
			complete: function() {
				$('#modalRemoveItem').modal('hide');

				window.location.reload();
			}
		});
	});
}

function cleanCart() {
	$('#modalCleanCart').modal('show');

	$('#modalCleanCart').on('click', '#cleanCart', function() {
		$.ajax({
			url: '<?= base_url('cart/clean') ?>',
			cache: false,
			type: 'POST',
			success: function(response) {},
			error: function(error) {},
			complete: function() {
				$('#modalCleanCart').modal('hide');

				window.location.reload();
			}
		});
	});
}
</script>