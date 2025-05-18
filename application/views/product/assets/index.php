<script>
	let table = $("#productDatatable");

    function deleteProduct(id) {
        $('#modalDeleteProduct').modal('show');

        $('#modalDeleteProduct').on('click', '#deleteProduct', function() {
            $.ajax({
                url: '<?= base_url('product/delete/') ?>' + id,
                success: function(response) {
                    if (response.success) {
                        $('#modalDeleteProduct').modal('hide');
                    }
                },
                error: function(error) {
                },
				complete: function() {
					window.location.reload();
				}
            });
        });
    }

	function editProduct(id) {
		const modal = $('#modalEditProduct');
		const target = '<?= base_url('product/update/') ?>';
		
		modal.on('hide.bs.modal', function() {
			modal.find('form').removeAttr('action');

			modal.find('#id').val('');
			modal.find('#name').val('');
			modal.find('#price').val('');
			modal.find('#stock').val('');
		});

		$.ajax({
			url: '<?= base_url('product/show/') ?>' + id,
			success: function(response) {
				if (response.success) {
					modal.find('form').attr('action', `${target}${response.data.id}`);

					modal.find('#id').val(response.data.id);
					modal.find('#name').val(response.data.name);
					modal.find('#price').val(response.data.price);
					modal.find('#stock').val(response.data.stock);

					modal.modal('show');
				}
			},
			error: function(error) {
			}
		});
	}

	function openProductForm(element) {
		element.innerHTML = 'Voltar';
		element.setAttribute('onclick', 'closeProductForm(this)');

		$('#tableListProducts').hide();
		$('#createProductForm').fadeIn();
	}

	function closeProductForm(element) {
		element.innerHTML = 'Cadastrar';
		element.setAttribute('onclick', 'openProductForm(this)');

		$('#createProductForm').hide();
		$('#tableListProducts').fadeIn();
	}
</script>
