$(document).ready(function() {

    $('.colorpicker-rgba').colorpicker();
    $(".select2").select2();
    $('.timepicker').timepicker({
        icons: {
            up: 'mdi mdi-chevron-up',
            down: 'mdi mdi-chevron-down'
        }
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.qty, .qty_delivery, .num-only').keypress(function(e) {
        if(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });

    $('#brand_code').keydown(function (e) {
        if (e.shiftKey || e.ctrlKey || e.altKey) {
            e.preventDefault();
        } else {
            var key = e.keyCode;
            if (!((key == 8) || (key == 32) || (key == 46) || (key >= 35 && key <= 40) || (key >= 65 && key <= 90))) {
                e.preventDefault();
            }
        }
    });

    var baseurl=window.location.protocol + "//" + window.location.host + "/";

    function ifValid(data) {
		if(data) {
            $('#addStoreBtn').attr('disabled', 'disabled');
			$('#brandpartnerBtn').attr('disabled', 'disabled');
			$('#addCatBtn').attr('disabled', 'disabled');
			$('#addCustomerBtn').attr('disabled', 'disabled');
		} else {
            $('#addStoreBtn').removeAttr('disabled');
			$('#brandpartnerBtn').removeAttr('disabled');
			$('#addCatBtn').removeAttr('disabled');
			$('#addCustomerBtn').removeAttr('disabled');
		}
    };

    function checkusername(username) {
        $.ajax({
            type: 'POST',
            url: baseurl + '/checkusername',
            data: {'username':username},
            success: function(data) {
                if(data) {
                    $('.usercheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Username has been taken"> <small>Username has been taken</small></i>');
                    $('#store_username').removeClass('validuser');
                    ifValid(data);
                } else {
                    $('.usercheck').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Username is available"></i>');
                    $('#store_username').addClass('validuser');
                    ifValid();
                }
            }
        })
    };

    function checkbrandcode(brandcode) {
        $.ajax({
            type: 'POST',
            url: baseurl + 'store-manager/brand-partners/checkbrandcode',
            data: {'brand_code':brandcode},
            success: function(data) {
                if(data) {
                    $('.brandcodecheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Brand code has been taken"> <small>Brand code has been taken</small></i>');
                    $('#brand_code').removeClass('validbrandcode');
                    ifValid(data);
                } else {
                    $('.brandcodecheck').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Brand code is available"></i>');
                    $('#brand_code').addClass('validbrandcode');
                    ifValid();
                }
            }
        })
    };

    function checkemail(email) {
        $.ajax({
            type: 'POST',
            url: baseurl + 'checkemail',
            data: {'email':email},
            success: function(data) {
				if(data) {
					$('.emailcheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Email has been taken"> <small>Email has been taken</small></i>');
					$('#email').removeClass('validbrandcode');
					ifValid(data);
				} else {
					$('.emailcheck').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Email is available"></i>');
					$('#email').addClass('validbrandcode');
					ifValid();
				}
            }
        })
    };

    function checkcat(cat) {
        $.ajax({
            type: 'POST',
            url: baseurl + 'checkcat',
            data: {'name':cat},
            success: function(data) {
				if(data) {
					$('.catcheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Duplicate category"> <small>Duplicate category</small></i>');
					$('#cat').removeClass('validbrandcode');
					ifValid(data);
				} else {
					$('.catcheck').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Category is available"></i>');
					$('#cat').addClass('validbrandcode');
					ifValid();
				}
            }
        })
    };

    function checksuki(suki) {
        $.ajax({
            type: 'POST',
            url: baseurl + 'checksuki',
            data: {'suki':suki},
            success: function(data) {
				if(data) {
					$('.codecheck').html('<i class="mdi mdi-close-circle text-danger" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Code not available"> <small>Code not available</small></i>');
					$('#suki_code').removeClass('validbrandcode');
					ifValid(data);
				} else {
					$('.codecheck').html('<i class="mdi mdi-checkbox-marked-circle text-success" aria-hidden="true" data-toggle="tooltip" data-placement="right" data-original-title="Code is available"></i>');
					$('#suki_code').addClass('validbrandcode');
					ifValid();
				}
            }
        })
    };
    
    $('#store_username').on('blur keyup change', function() {
        var username = $(this).val();
        checkusername(username);
    });

    $('#brand_code').on('blur keyup change', function() {
        var brandcode = $(this).val();
        checkbrandcode(brandcode);
    });

    $('#emails').on('blur keyup change', function() {
        var email = $(this).val();
        checkemail(email);
    });

    $('#cat').on('blur keyup change', function() {
        var cat = $(this).val();
        checkcat(cat);
    });

    $('#suki_code').on('blur keyup change', function() {
        var suki = $(this).val();
        checksuki(suki);
    });

    $('.btn-delete-store').on('click', function(e) {
        e.preventDefault();

        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this information!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if(result.value) {
                var id = $(e.currentTarget).attr('id');
                var module = $(e.currentTarget).attr('data-module');
                var name = $(e.currentTarget).attr('data-name');
                var datatable = "table";

                if(module == 'brand') {
                    var url = document.location.origin + "/store-manager/brand-partners/delete/" + id;
                } else if(module == 'cat') {
                    var url = document.location.origin + "/store-manager/category/delete/" + id;
                } else if(module == 'user') {
                    var url = document.location.origin + "/store-manager/user/delete/" + id;
                } else if(module == 'transaction_request') {
                    var url = document.location.origin + "/store-manager/transaction_request/delete/" + id;
                } else if(module == 'transaction') {
                    var url = document.location.origin + "/store-manager/transaction/delete/" + id;
                } else if(module == 'rental') {
                    var url = document.location.origin + "/store-manager/rentals/payment/delete/" + id;
                }

                var data = "id="+id;
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: data,
                    success: function(data) {
                        $('.' + datatable).DataTable().row($(e.currentTarget).parents('tr')).remove().draw(false);
                    }
                });
                swal('Deleted!', name + ' has been deleted', 'success');
            }
        });
    });

    $('.btn-hide-store').on('click', function(e) {
        e.preventDefault();

        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this information!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if(result.value) {
                var id = $(e.currentTarget).attr('id');
                var module = $(e.currentTarget).attr('data-module');
                var name = $(e.currentTarget).attr('data-name');
                var datatable = "table";

                if(module == 'inventory') {
                    var url = document.location.origin + "/store-manager/inventory/hide/" + id;
                } else if(module == 'transaction') {
                    var url = document.location.origin + "/store-manager/reserve/delete/" + id;
                }

                var data = "id="+id;
                $.ajax({
                    type: "POST",
                    url: url,
                    data: data,
                    success: function(data) {
                        $('.' + datatable).DataTable().row($(e.currentTarget).parents('tr')).remove().draw(false);
                    }
                });
                swal('Deleted!', name + ' has been deleted', 'success');
            }
        });
    });

    $('.btn-delete-partner').on('click', function(e) {
        e.preventDefault();

        swal({
            title: 'Are you sure?',
            text: 'You will not be able to recover this information!',
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
        }).then((result) => {
            if(result.value) {
                var id = $(e.currentTarget).attr('id');
                var module = $(e.currentTarget).attr('data-module');
                var name = $(e.currentTarget).attr('data-name');
                var datatable = "table";

                if(module == 'inventory') {
                    var url = document.location.origin + "/partner/inventory/delete/" + id;
                }

                var data = "id="+id;
                $.ajax({
                    type: "DELETE",
                    url: url,
                    data: data,
                    success: function(data) {
                        $('.' + datatable).DataTable().row($(e.currentTarget).parents('tr')).remove().draw(false);
                    }
                });
                swal('Deleted!', name + ' has been deleted', 'success');
            }
        });
    });

    $('#contract').dropzone({
        paramName: 'file',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {
                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'Contract Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
            })
        }
    });

    // $('#layaway').dropzone({
    //     paramName: 'file',
    //     addRemoveLinks: false,
    //     thumbnail: false,
    //     createImageThumbnails: false,
    //     uploadMultiple: false,
    //     init: function() {
    //         this.on("complete", function (file) {
    //             this.removeFile(file);
    //         }),
    //         this.on("queuecomplete", function (file) {
    //             swal({
    //                 position: 'middle-center',
    //                 type: 'success',
    //                 title: 'Lay Away Form Uploaded',
    //                 showConfirmButton: false,
    //                 timer: 1000
    //             });
    //         })
    //     }
    // });

    $('#petty_cash').dropzone({
        paramName: 'file',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {
                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'Petty Cash Voucher Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
            })
        }
    });

    $('#reciepts').dropzone({
        paramName: 'file',
        addRemoveLinks: false,
        thumbnail: false,
        createImageThumbnails: false,
        uploadMultiple: false,
        init: function() {
            this.on("complete", function (file) {
                this.removeFile(file);
            }),
            this.on("queuecomplete", function (file) {
                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'Reciepts Uploaded',
                    showConfirmButton: false,
                    timer: 1000
                });
            })
        }
    });

    $('.qty_inventory_view').on('keyup', function(e) {

        var qty = $(this).val();
        var id = $(this).attr('data-id');

        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: window.location.protocol + "//" + window.location.host + "/" + "store-manager/inventory/viewqtyupdate/" + id,
            data: {'id':id,'qty':qty},
            success: function(data) {
                $('#inventory_container').load(document.URL + ' #inventory_container');
            }
        });
    });

    $('.bday-greeting').on('click', function() {
        var name = $(this).attr('data-name');
        var email = $(this).attr('data-email');

        $.ajax({
            type: 'POST',
            url: window.location.protocol + "//" + window.location.host + "/" + "store-manager/bday",
            data: {'name':name,'email':email},
            beforeSend: function() {
                $('#customer_table').LoadingOverlay('show');
            },
            success: function(data) {
                swal({
                    position: 'middle-center',
                    type: 'success',
                    title: 'Bday greeting sent',
                    showConfirmButton: false,
                    timer: 1000
                });
                $('#customer_table').LoadingOverlay('hide', true);
            }
        });
    });

});