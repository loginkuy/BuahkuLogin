$(document).ready(function () {
    $('#addTips').click(function () {
        $('#modalTips').modal('show');

        $('#id').val('');
        $('#judul').val('');
        $('#isi').val('');
    });

    $('.edit').click(function () {
        var id = $(this).data('id');
        // alert(id);

        $.ajax({
            url: 'https://asia-south1.gcp.data.mongodb-api.com/app/admin-ukadi/endpoint/getTipsById?id=' + id,
            type: 'GET',
            success: function (res) {
                $('#modalTips').modal('show');
                var row = res[0];

                $('#id').val(row._id);
                $('#judul').val(row.judul);
                $('#isi').val(row.isi);
            },
            error: function (err) {
                console.log(err);
            }
        });
    });

});