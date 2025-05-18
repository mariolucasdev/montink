var options = {
    onKeyPress: maskConditional
}

function maskConditional() {
	$('.cnpj_cpf').each(function () {
		var value = $(this).val().replace(/\D/g, '');

		if(value.length <= 11) {
			$('#set_physical_person').click();
		} else {
			$('#set_juridical_person').click();
		}

		var mask = value.length < 12 ? '000.000.000-00#' : '00.000.000/0000-00';
		$(this).mask(mask, options);
	});
}

$(document).ready(maskConditional);

$('.cel').mask('(00) 00000-0000', {
	onKeyPress: function (cel, ev, el, op) {
		let masks = ['(00) 0000-00009', '(00) 0 0000-0000'];
		$('.cel').mask((cel.replace(/\D/g, '').length < 11) ? masks[0] : masks[1], op);
	}
});

$('.zip_code').mask('00000-000')
$('.birth_date').mask('00/00/0000');
