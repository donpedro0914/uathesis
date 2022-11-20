$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    var baseurl=window.location.protocol + "//" + window.location.host + "/";

    function ifValid(data) {
		if(data) {
            $('#checkoutBtn').removeAttr('disabled');
			$('#addCustomerBtn').attr('disabled', 'disabled');
		} else {
            $('#checkoutBtn').attr('disabled', 'disabled');
			$('#addCustomerBtn').removeAttr('disabled');
		}
    };

    function checksuki(suki) {
        $.ajax({
            type: 'POST',
            url: baseurl + 'checksuki',
            data: {'suki':suki},
            success: function(data) {
				if(data) {
					$('.codecheck').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Code is available"></i>');
					$('#suki_code').addClass('validbrandcode');
					ifValid(data);
				} else {
					$('.codecheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Code not available"> <small>Code not available</small></i>');
					$('#suki_code').removeClass('validbrandcode');
                    ifValid();
				}
            }
        })
    };

    $('#suki_code').on('blur keyup change', function() {
        var suki = $(this).val();
        if(!suki) {
            $('#checkoutBtn').removeAttr('disabled');
            $('.codecheck').empty();
        } else {
            checksuki(suki);
        }
    });

    function checksuki(suki) {
        $.ajax({
            type: 'POST',
            url: baseurl + 'checksuki',
            data: {'suki':suki},
            success: function(data) {
				if(data) {
					$('.codecheck_new').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Code not available"> <small>Code not available</small></i>');
					$('#suki_code_new').removeClass('validbrandcode');
					ifValid(data);
				} else {
					$('.codecheck_new').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Code is available"></i>');
					$('#suki_code_new').addClass('validbrandcode');
					ifValid();
				}
            }
        })
    };

    $('#suki_code_new').on('blur keyup change', function() {
        var suki = $(this).val();
        checksuki(suki);
    });
});