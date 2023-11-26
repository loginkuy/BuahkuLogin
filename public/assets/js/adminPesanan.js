$(document).ready(function () {
    $('.cek').click(function () {
        var id = $(this).data('id');

        $.ajax({
            url: 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getPesananByNopes?nopes=' + id,
            type: 'GET',
            success: function (res) {
                $('#modalCek').modal('show');
                var row = res[0];

                $('#pembayaran').html(  '<div class="text-center">'+
                                            '<h3>'+row.pembayaran+'</h3>'+
                                            '<img src="../../assets/images/pesanan/'+row.foto+'" width="500"height="500">'+
                                        '</div>');
            },
            error: function (err) {
                console.log(err);
            }
        });

    });

    $('.edit').click(function () {
        var id = $(this).data('id');

        $.ajax({
            url: 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getPesananByNopes?nopes=' + id,
            type: 'GET',
            success: function (res) {
                $('#modalEdit').modal('show');
                var row = res[0];

                $('#status').val(row.status);
                $('#nopes').val(row.nopes);
                $('#nopes2').val(row.nopes);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });
});