
$(document).ready(function () {
    $('#cep').on('keyup', function () {
        const cep = $(this).val()
    
        if (cep.length == 9) {
            const cepCleaned = cep.replace(/[^\d]+/g, '');
            const endpoint = `https://viacep.com.br/ws/${cepCleaned}/json/`
            
            $.ajax({
                url: endpoint,
                type: 'GET',
                success: function (data) {
                    console.log(data);

                    if(data.erro) {
                        $('#cep-validation').removeClass('hidden');
                        $('#cep-validation').addClass('visible');
                        $('#cep-validation').html('CEP INVÁLIDO, TENTE NOVAMENTE');
                        $('#cep-validation').css('color', 'red');
                    } else {
                        $('#cep-validation').removeClass('hidden');
                        $('#cep-validation').addClass('visible');
                        $('#cep-validation').html('CEP VÁLIDO - ' + data.logradouro + ', ' + data.bairro + ', ' + data.localidade + ', ' + data.uf);
                        $('#cep-validation').css('color', 'green');
                    }
                },
                error: function (data) {
                    $('#cep-validation').removeClass('hidden');
                    $('#cep-validation').addClass('visible text-danger');
                    $('#cep-validation').html('CEP INVÁLIDO, TENTE NOVAMENTE');
                },
                complete: function () {
                    setTimeout(function () {
                        $('#cep-validation').removeClass('visible');
                        $('#cep-validation').addClass('hidden');
                        $('#cep-validation').html('');
                    }, 3000);
                }
            })
        }
    })
})