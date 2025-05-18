/**
 * validate formate date in birth date input
 */
document.getElementById('birth_date').addEventListener('keyup', function () {
	let btnSubmit = document.getElementById('btn-submit-form-client');
	let validate = /^\d{2}\/\d{2}\/\d{4}$/;

	if(validate.test(this.value) || this.value === '') {
		btnSubmit.removeAttribute('disabled');
		this.classList.remove('is-invalid');
	} else {
		btnSubmit.setAttribute('disabled', 'disabled');
		this.classList.add('is-invalid');
	}
});

function getCompanyDataAPI() {
	var cnpj = $('#cnpj_cpf').val()

	if (cnpj.length == 18) {
		$('#loading-cnpj').fadeIn()
		var cleanCNJP = cnpj.replace(/[^\d]+/g, '');

		$.ajax({
			url: 'https://www.receitaws.com.br/v1/cnpj/' + cleanCNJP,
			type: 'GET',
			dataType: 'jsonp',
			success: function (data) {
				$('#corporate_name').val(data.nome)
				$('#fantasy_name').val(data.fantasia)
				$('#address').val(data.logradouro)
				$('#address_number').val(data.numero)
				$('#district').val(data.bairro)
				$('#city').val(data.municipio)
				$('#country').val(data.uf)
				$('#zip_code').val(data.cep)
				$('#email').val(data.email)
				$('#cel').val(data.telefone)
			},
			error: function (data) {
				console.log(data.textStatus);
			},
			complete: function () {
				$('#loading-cnpj').fadeOut()
			}
		})
	}
}

function getAddressDataAPI() {
	var zipCode = $('#zip_code').val()

	if (zipCode.length == 9) {
		$('#loading-zipcode').fadeIn()
		var cleanZipCode = zipCode.replace(/[^\d]+/g, '');

		$.ajax({
			url: 'https://viacep.com.br/ws/' + cleanZipCode + '/json/',
			type: 'GET',
			dataType: 'jsonp',
			success: function (data) {
				data.logradouro != '' && $('#address').val(data.logradouro)
				data.bairro != '' && $('#district').val(data.bairro)
				$('#city').val(data.localidade)
				$('#country').val(data.uf)
			},
			error: function (data) {
				console.log(data.textStatus);
			},
			complete: function () {
				$('#loading-zipcode').fadeOut()
			}
		})
	}
}

document.addEventListener('DOMContentLoaded', function() {
	document.getElementById('cnpj_cpf').addEventListener('keyup', function() {

		let number = (this.value).replace(/\D/g, '');
		let message = document.getElementById('message');

		if (number.length <= 11) {
			message.innerHTML = isCPF(number) ? '' : 'Inválido';
		}

		if (number.length > 11) {

			let isValid = isCNPJ(number);

			if (isValid) {
				getCompanyDataAPI();
				message.innerHTML = "";
			} else {
				message.innerHTML = "Inválido";
			}
		}
	});
});

// To validate a CPF
function isCPF(cpf) {
	cpf = cpf.replace(/[^\d]/g, '');

	if (cpf.length !== 11) {
		return false;
	}

	if (/^(\d)\1+$/.test(cpf)) {
		return false;
	}

	let soma = 0;
	for (let i = 0; i < 9; i++) {
		soma += parseInt(cpf.charAt(i)) * (10 - i);
	}
	let primeiroDigito = 11 - (soma % 11);
	if (primeiroDigito >= 10) {
		primeiroDigito = 0;
	}

	if (parseInt(cpf.charAt(9)) !== primeiroDigito) {
		return false;
	}

	soma = 0;
	for (let i = 0; i < 10; i++) {
		soma += parseInt(cpf.charAt(i)) * (11 - i);
	}
	let segundoDigito = 11 - (soma % 11);
	if (segundoDigito >= 10) {
		segundoDigito = 0;
	}

	if (parseInt(cpf.charAt(10)) !== segundoDigito) {
		return false;
	}

	return true;
}

// To validate a CNPJ
function isCNPJ(cnpj) {
	cnpj = cnpj.replace(/[^\d]+/g, '');

	if (cnpj === '') return false;

	if (cnpj.length !== 14) return false;

	if (/^(\d)\1+$/.test(cnpj)) return false;

	let tamanho = cnpj.length - 2;
	let numeros = cnpj.substring(0, tamanho);
	let digitos = cnpj.substring(tamanho);
	let soma = 0;
	let pos = tamanho - 7;
	for (let i = tamanho; i >= 1; i--) {
		soma += numeros.charAt(tamanho - i) * pos--;
		if (pos < 2)
			pos = 9;
	}
	let resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	if (resultado !== parseInt(digitos.charAt(0))) return false;

	tamanho = tamanho + 1;
	numeros = cnpj.substring(0, tamanho);
	soma = 0;
	pos = tamanho - 7;
	for (let i = tamanho; i >= 1; i--) {
		soma += numeros.charAt(tamanho - i) * pos--;
		if (pos < 2)
			pos = 9;
	}
	resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
	if (resultado !== parseInt(digitos.charAt(1))) return false;

	return true;
}
