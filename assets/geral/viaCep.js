
$(document).ready(function () {
    $('#cep').on('keyup', function () {
        const cep = $(this).val()
    
        if (cep.length == 9) {
            const cepCleaned = cep.replace(/[^\d]+/g, '');
            const endpoint = `https://viacep.com.br/ws/${cepCleaned}/json/`
            
            const form = $(this).closest('form');

            form.find('button[type="submit"]').prop('disabled', true);

            $.ajax({
                url: endpoint,
                success: function (data) {
                    if(data.erro) {
                        $('#cep-validation').removeClass('hidden');
                        $('#cep-validation').addClass('visible');
                        $('#cep-validation').html('CEP INVÁLIDO, TENTE NOVAMENTE');
                        $('#cep-validation').css('color', 'red');

                        form.find('button[type="submit"]').prop('disabled', true);
                    } else {
                        const fullAddress = data.logradouro + ', ' + data.bairro + ', ' + data.localidade + ', ' + data.uf;
                        form.find('input[name="address"]').val(fullAddress);
                        form.find('button[type="submit"]').prop('disabled', false);
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