$(document).ready(function() {

    
	var baseurl=window.location.protocol + "//" + window.location.host + "/";

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.approve_btn').on('click', function(e) {
        e.preventDefault();

        var id = $(this).attr('data-id');

        swal({
			title: 'Are you sure you want to approve this?',
			text: 'You can not undo once approved',
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes!'
		}).then((result) => {
            if (result.value) {
                $.ajax({
                  type:'POST',
                  url: baseurl + 'approve',
                  data:{'id':id},
                  success: function(data) {
                      swal(
                          'Done!',
                          'You have successfully approved this application!',
                          'success'
                        )
                      setTimeout(function() {
                          window.location.href = '/applications';
                      }, 500)
                  }
              });
            }
        });
    })


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

});